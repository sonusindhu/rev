var myApp = angular.module('myApp', ['ui.bootstrap', 'ngSanitize', 'ngRoute']);
var BASE_URL = "http://reverseadvisor.picnframes.info/developer/";
myApp.controller('parasample-tabs', ['$scope', function ($scope) {
        $scope.activeState = [];
        $scope.delTab = function (idx) {
            var list = $scope.page.data.list;
            if (list.length > 0) {
                $scope.page.delItem(idx);
                $scope.activeState.splice(idx, 1);
            }
        };
        $scope.activeStateCheck = function (idx) {
            if ($scope.page.tabsExists.indexOf(idx) !== -1) {
                $scope.activeState[$scope.page.tabsExists.indexOf(idx)] = true;
            }
        };
        $scope.$watch(
                "page.data.list.length",
                function (newLen, oldLen) {
                    if (!newLen)
                        return;
                    // new item => new tab, make active
                    if (newLen > oldLen)
                        $scope.activeState.push("true");
                });


    }]);
myApp.controller('dataCtrl', ['$scope', '$http', '$sce', '$compile', '$modal', '$window',
    function ($scope, $http, $sce, $compile, $modal, $window) {
        $scope.page = {
            data: {
                list: [] // this is the list we want to have tabs for
            },
            tabsExists: [],
            addTab: function (title, url, name) {
                $this = this;
                if ($scope.page.tabsExists.indexOf(name) === -1) {
                    $http({
                        method: 'GET',
                        url: url,
                    }).then(function successCallback(response) {
                        tempData = $sce.trustAsHtml(response.data);
                        $this.data.list.push({
                            "title": title,
                            "content": tempData,
                            "name": name,
                            "url": url,
                        })
                        $scope.page.tabsExists.push(name);
                    }, function errorCallback(response) {
                    });
                }
//                if($state.title === 'Company License') {
//            $state.go('company_license', {}, { reload: true });
//        }
            },
            delItem: function (event, idx) {
                if (undefined === idx) {
                    idx = $scope.page.tabsExists.indexOf(event.target.attributes['tab-name'].nodeValue);
                }
                event.preventDefault();
                event.stopPropagation();
                this.data.list.splice(idx, 1);
                $scope.page.tabsExists.splice(idx, 1);
                if (this.data.list.length === 0) {
                    $scope.page.addTab('Company License', BASE_URL + 'superadmin/superadmin/ajaxdashboard', 'company_license');
                }
            }
        };
        $scope.page.addTab('Company License', BASE_URL + 'superadmin/superadmin/ajaxdashboard', 'company_license');


        $scope.activeState = [];
        $scope.deleteTab = function (idx) {
            var list = $scope.page.data.list;
            if (list.length > 0) {
                $scope.page.data.list.splice(idx, 1);
                $scope.page.tabsExists.splice(idx, 1);
                $scope.activeState[idx] = true;
            }
        };
        $scope.openPopUp = function (method, url, classpopup) {
            $http({
                method: method,
                url: url + "?rand=" + Math.random(),
                data: {rand: Math.random()}
            }).then(function (resp) {
                tempData = $sce.trustAsHtml(resp.data);
                $scope.createCompanyLicensePopup = tempData;
                $scope.classpopup = classpopup;
                $("#showpopup").on('shown.bs.modal', function () {
                    $(".selectpicker").val('');
                    $("#saveStatesUnderRegionForm .filter-option").html("--Select Region--");
                    $('.icheckbox_square-orange ').removeClass('checked');
                    $(".modal-backdrop").css({height: "100%", 'z-index': '11'});
                }).modal({keyboard: false, backdrop: 'static'}).removeClass('fade');
            });


        }
        //submit the  company license form
        $scope.addCompanyLicense = function (url) {
            var options = {
                url: url,
                type: 'POST',
                dataType: 'json',
                success: function (response) {
                    $(".error-message").remove();
                    $(".alert").remove();
                    if (response.status == true) {
                        $scope.refreshTab('Edit ' + response.license_name, 'edit_license', BASE_URL + 'superadmin/superadmin/manage_added_license/' + response.last_id + "?rand=" + Math.random());
                        $("#showpopup").modal('hide');


                    } else {

                        $.each(response.errors, function (index, ele) {
                            $scope.validation(index, ele[0], 'LicenseDetail');
                        });
//                        var errorMesgs = '<div class="alert alert-danger fade in"><a title="close" aria-label="close" data-dismiss="alert" class="close" href="#">×</a><strong>Error!</strong>'
//                        $.each(response.errors, function (index, ele) {
//                            errorMesgs += '<br>' + ele[0];
//                        });
//                         errorMesgs += '</div>';

                        //$(".modal-footer").after(errorMesgs);
                    }
                }
            };
            $('#createCompanyLicenseForm').ajaxSubmit(options);
            return false;
        };
        //submit the company admin form
        $scope.addCompanyAdminData = function (url) {
            var options = {
                url: url,
                type: 'POST',
                dataType: 'json',
                success: function (response) {
                    $(".error-message").remove();
                    if (response.status == true) {
                        //$scope.refreshTab('Company License', 'company_license', BASE_URL + 'superadmin/superadmin/ajaxdashboard');
                        swal("Success!", response.message, "success")
                        $("#showpopup").modal('hide');
                        $("#noData").remove();
                        $(".adminHere").html("");
                        $(".adminHere").append($compile(response.htmldata)($scope));
                    }
                    else {

                        $.each(response.errors, function (index, ele) {
                            $scope.validation(index, ele[0], 'User');
                        });
                        //swal("Oops...", "Something went wrong!", "error")
                    }
                }
            };
            $('#createCompanyAdminForm').ajaxSubmit(options);
            return false;
        };
        //edit the company admin form
        $scope.editCompanyAdminData = function (url) {
            var options = {
                url: url,
                type: 'POST',
                dataType: 'json',
                success: function (response) {
                    $(".error-message").remove();
                    if (response.status == true) {
                        $scope.refreshTab('Company License', 'company_license', BASE_URL + 'superadmin/superadmin/ajaxdashboard');
                        swal("Success!", response.message, "success")
                        $("#showpopup").modal('hide');
                        $("#noData").remove();
                        $(".adminHere").html("");
                        $(".adminHere").append(response.htmldata)
                    }
                    else {
                        //login first name related error
                        if (response.errors.first_name) {
                            errorDiv = '<div class="error-message">' + response.errors.first_name[0] + '</div>';
                            $('input[name="data[User][first_name]"]').after(errorDiv);
                        }
                        //login last name related error
                        if (response.errors.last_name) {
                            errorDiv = '<div class="error-message">' + response.errors.last_name[0] + '</div>';
                            $('input[name="data[User][last_name]"]').after(errorDiv);
                        }
                        //login last name related error
                        if (response.errors.title) {
                            errorDiv = '<div class="error-message">' + response.errors.title[0] + '</div>';
                            $('input[name="data[User][title]"]').after(errorDiv);
                        }
                        //login last name related error
                        if (response.errors.phone_no) {
                            errorDiv = '<div class="error-message">' + response.errors.phone_no[0] + '</div>';
                            $('input[name="data[User][phone_no]"]').after(errorDiv);
                        }
                        //login email id  related error
                        if (response.errors.email) {
                            errorDiv = '<div class="error-message">' + response.errors.email[0] + '</div>';
                            $('input[name="data[User][email]"]').after(errorDiv);
                        }

                        //swal("Oops...", "Something went wrong!", "error")
                    }
                }
            };
            $('#createCompanyAdminForm').ajaxSubmit(options);
            return false;
        };
        //apply the fees to companty license
        $scope.applyFeesToLicense = function (url) {

            var options = {
                url: url,
                type: 'POST',
                dataType: 'json',
                success: function (response) {
                    //$(".success_div").remove();
                    if (response.status == "success") {
                        $(".success_div").removeClass('hide');
                        $(".success_mesg").text(response.message);
                    }
                    else {
                        swal("Oops...", "Something went wrong!", "error")
                    }
                }
            };
            $('#licenseApplicableFeesForm').ajaxSubmit(options);
            return false;
        };
        //for opening the  new tab after adding the license and open the new manage tab
        $scope.refreshTab = function (title, name, url) {
            indexTabs = $scope.page.tabsExists.indexOf(name);
            if (indexTabs !== -1) {
                $scope.deleteTab(indexTabs, 1);
            }
            $scope.page.addTab(title, url, name);
        };
        //submit the fees defaults on keyup
        $scope.keyPressSubmit = function (event, id, key, val, url) {
            var value = event.target.value;
            var options = {
                url: url,
                type: 'POST',
                dataType: 'json',
                data: {id: id, key: key, value: value},
                success: function (response) {
                    if (response.status == false)
                    {
                        if (event.target.attributes['class'].nodeValue.match(/validationBorder/g) == true)
                        {
                            return false;
                        }
                        else
                        {
                            event.target.attributes['class'].nodeValue = event.target.attributes['class'].nodeValue + " validationBorder";
                        }
                    }

                }
            };
            $('#feeDefaultsForm').ajaxSubmit(options);
            return false;
        };
        //submit the HUD input(first part of software inputs)
        $scope.hudInputsSubmit = function (event, key, val, url) {
            var value = event.target.value;
            var options = {
                url: url,
                type: 'POST',
                dataType: 'json',
                data: {key: key, value: value},
                success: function (response) {
                    if (response.status == false)
                    {
                        if (event.target.attributes['class'].nodeValue.match(/validationBorder/g) == true)
                        {
                            return false;
                        }
                        else
                        {
                            event.target.attributes['class'].nodeValue = event.target.attributes['class'].nodeValue + " validationBorder";
                        }

                    }
                }
            };
            $('#hudInputsForm').ajaxSubmit(options);
            return false;
        };
        //submit the superadmin settings
        $scope.superadminSettingsSubmit = function (event, key, val, url){
            var time_value = event.target.value;
               $("#logoutSetting").val(time_value);
                var options = {
                    url: url,
                    type: 'POST',
                    dataType: 'json',
                    data: {key: key, time_value: time_value},
                    success: function (response) {
                        if (response.status == false)
                        {
                            if (event.target.attributes['class'].nodeValue.match(/validationBorder/g) == true)
                            {
                                return false;
                            }
                            else
                            {
                                event.target.attributes['class'].nodeValue = event.target.attributes['class'].nodeValue + " validationBorder";
                            }

                        }
                    }
                };
                $('#superadminSettingsForm').ajaxSubmit(options);
                return false;
           
        }
        //submit the residual income by regions and family size(fourth part of software inputs)
        $scope.residualIncomeRegions = function (event, id, key, val, url) {
            //console.log(event);
            var value = event.target.value;
            var options = {
                url: url,
                type: 'POST',
                dataType: 'json',
                data: {id: id, key: key, value: value},
                success: function (response) {
                    if (response.status == false)
                    {
                        if (event.target.attributes['class'].nodeValue.match(/validationBorder/g) == true)
                        {
                            return false;
                        }
                        else
                        {
                            event.target.attributes['class'].nodeValue = event.target.attributes['class'].nodeValue + " validationBorder";
                        }

                    }

                }
            };
            $('#residualIncomeForm').ajaxSubmit(options);
            return false;
        };
        //saving the states under regions under residual income table(third part of software inputs)
        $scope.saveResidualRegions = function (url) {
            var options = {
                url: url,
                type: 'POST',
                dataType: 'json',
                success: function (response) {
                    if (response.status == true) {
                        //console.log(response.htmlResponse);
                        $('#saveStatesUnderRegionForm')[0].reset();
                        $('.res_states_dv .checkbox .icheckbox_square-orange').removeClass('checked');
                        $('.bootstrap-select .dropdown-toggle').attr('title', '--Select Region--');
                        $(".pull-left").text("--Select Region--");
                        $(".error-msg").addClass('hide');
                        // $(".success_div").removeClass('hide');
                        // $(".success_mesg").text(response.message);
                        $("#forRegionAndStates").html("");
                        $("#forRegionAndStates").append($compile(response.htmlResponse)($scope));
                        $("#showpopup").modal('hide');
                    }
                    else if (response.status == "error")
                    {
                        $(".success_div").addClass('hide');
                        $(".errros_are").removeClass('hide');
                        $(".error-msg").text(response.message);
                    }
                    else {

                        if (response.errors) {
                            $(".success_div").addClass('hide');
                            $(".errros_are").removeClass('hide');
                            $(".error-msg").text(response.errors.region_id);
                        }
                    }
                }
            };
            $('#saveStatesUnderRegionForm').ajaxSubmit(options);
            return false;
        };
        //get the checked state on change of the region on the edit states popup
        $scope.getStates = function (id) {
            console.log(id);
            $http({
                method: 'POST',
                dataType: 'json',
                url: BASE_URL + 'superadmin/superadmin/getStates/' + id,
                data: $.param({id: id}),
                headers: {
                    "Content-Type": "application/x-www-form-urlencoded;charset=utf-8"
                }
            }).then(function successCallback(response) {
                $("#forCheckedStates").html("");
                $("#forCheckedStates").append($compile(response.data.htmlCheckedStates)($scope));
                $('input').iCheck({
                    checkboxClass: 'icheckbox_square-orange',
                    radioClass: 'iradio_square-orange',
                    increaseArea: '20%' // optional
                });
            }, function errorCallback(response) {
            });

            return false;
        };
        //save the edit menus data in database
        $scope.saveEditMenus = function (url) {
            $("#editMenusForm .success_div_is").addClass('hide');
            var options = {
                url: url,
                type: 'POST',
                dataType: 'json',
                success: function (response) {
                    if (response.status == "success") {
                        $("#editMenusForm .success_div_is").removeClass('hide');
                        $("#editMenusForm .success_mesg_is").text(response.message);
                    }
                    else {
                        swal("Oops...", "Something went wrong!", "error")
                    }
                }
            };
            $('#editMenusForm').ajaxSubmit(options);
            return false;
        };
         //get the checked state on change of the region on the edit states popup
        $scope.getTheList = function (search) {
            var search_filter = search.filter;
            var search_ind_user = search.ind_user;
            if (search_filter == "")
            {
                console.log("select the user's type filter first.");
            }
            if (search_filter != "") {
                $http({
                    method: 'POST',
                    dataType: 'json',
                    url: 'getUsersList',
                    data: $.param({search_filter: search_filter, search_ind_user: search_ind_user}),
                    headers: {
                        "Content-Type": "application/x-www-form-urlencoded;charset=utf-8"
                    }
                }).then(function successCallback(response) {
                    $(".showUsersList").html("");
                    $(".showUsersList").append($compile(response.data.htmlResponse)($scope));
                    $('.selectpicker').selectpicker();
                }, function errorCallback(response) {
                });

                return false;
            }
        };
        //save the send message functionaliy
        $scope.sendSystemMesg = function (search, url) {
            var options = {
                url: url,
                type: 'POST',
                dataType: 'json',
                success: function (response) {
                    $(".error-message").remove();
                    if (response.status == "success") {
                        $("#showpopup").modal('hide');
                        swal("Success!", response.message, "success")
                    }
                    else {
                        //filter error
                        if (response.filter) {
                            $('div .bootstrap-select button').closest('.btn-default').css("border", "1px solid red");
                        }
                        //subject error
                        if (response.subject) {
                            $('input[name="data[SystemMessage][subject]"]').css("border", "1px solid red");
                        }
                        //subject error
                        if (response.message_body) {
                            $('textarea[name="data[SystemMessage][message_body]"]').css("border", "1px solid red");
                        }

                    }
                }
            };
            $('#sendSystemMesgForm').ajaxSubmit(options);
            return false;
        };
         //for showing validation error
        $scope.validations = function (index, element, model) {
            $('input[name="data[' + model + '][' + index + ']"]').addClass('validationBorder');
            $('textarea[name="data[' + model + '][' + index + ']"]').addClass('validationBorder');
            $('select[name="data[' + model + '][' + index + ']"]').addClass('validationBorder');
            $('radio[name="data[' + model + '][' + index + ']"]').addClass('validationBorder');

        }//
         //for showing validation error
        $scope.validation = function (index, element, model) {
            $('input[name="data[' + model + '][' + index + ']"]').addClass('validationBorder').attr('placeholder', element).val("");
            $('textarea[name="data[' + model + '][' + index + ']"]').addClass('validationBorder');
            $('select[name="data[' + model + '][' + index + ']"]').addClass('validationBorder');
            $('radio[name="data[' + model + '][' + index + ']"]').addClass('validationBorder');

        }//


    }]);
//function setCookie(cname, cvalue, second) {
//        var d = new Date();
//        d.setTime(d.getTime() + (second));
//        var expires = "expires="+ d.toUTCString();
//        document.cookie = cname + "=" + cvalue + "; " + expires+"; path=/";
//    }
//    setInterval(function(){ 
//        setCookie('testingTimeOut' , 'true' , 3000);
//        
//    }, 2000); 

myApp.directive('compileTemplate', function ($compile, $parse) {
    return {
        link: function (scope, element, attr) {
            scope.$watch(attr.content, function () {
                element.html($parse(attr.content)(scope));
                $compile(element.contents())(scope);
                $('#datetimepicker1').datetimepicker();
                $('#datetimepicker1').datetimepicker({format: 'DD/MM/YYYY'});
                $('.selectpicker').selectpicker()
                // $(".phoneNo").mask("(999) 999-9999");
                $('#example').DataTable();
                $('#employeeTable').DataTable();
                $('input').iCheck({
                    checkboxClass: 'icheckbox_square-orange',
                    radioClass: 'iradio_square-orange',
                    increaseArea: '20%' // optional
                });
                $(".modal").draggable({
                    handle: ".modal-header"

                });
            }, true);
        }
    }
});
myApp.directive('addpopup', function ($compile, $parse, $timeout) {
    return {
        restrict: 'A',
        link: function (scope, element, attr) {
            var parsed = $parse(attr.ngBindHtml);
            scope.$watch(
                    function () {
                        return (parsed(scope) || '').toString();
                    },
                    function () {
                        $compile(element, null, -9999)(scope);
                        $('.selectpicker').selectpicker()

                        $timeout(function () {
                            $('#example').DataTable();
                            $('#employeeTable').DataTable();
                        });

                        $('input').iCheck({
                            checkboxClass: 'icheckbox_square-orange',
                            radioClass: 'iradio_square-orange',
                            increaseArea: '20%' // optional
                        });


                    }

            );

        }
    };
});
myApp.config(['$httpProvider', function ($httpProvider) {
$httpProvider.interceptors.push(function ($q) {
            return {
                'request': function (config) {
                    $('.portfolioloader').show();
                    return config;
                },
                'response': function (response) {
                    $('.portfolioloader').hide();
                    return response;
                }
            };

        });
    }
]);

