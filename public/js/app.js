$('.portfolioloader').show();
var myApp = angular.module('myApp', ['ui.bootstrap', 'ngSanitize', 'angularFileUpload']);
var BASE_URL = "http://reverseadvisor.picnframes.info/developer/";
var secondsToWaitBeforeSave = 1;

myApp.controller('dataCtrl', ['$scope', '$http', '$sce', '$compile', 'FileUploader', '$timeout', '$window', function ($scope, $http, $sce, $compile, FileUploader, $timeout, $window) {

        $scope.uplaodURL = BASE_URL + 'company/lenders/upload';
        var uploader = $scope.uploader = new FileUploader({url: $scope.uplaodURL});

        uploader.onBeforeUploadItem = function (item) {
            console.info('onBeforeUploadItem', item);
            item.url = $scope.uplaodURL;
        };

        $scope.t_active = false;
        $scope.tw_active = true;
        $scope.one_active = true;
        $scope.pl_active = false;

        $scope.classpopup = '';
        $scope.formData = {};
        $scope.page = {
            data: {
                list: [] // this is the list we want to have tabs for
            },
            tabsExists: [],
            addTab: function (title, url, name) {
                $this = this;
                if ($scope.page.tabsExists.indexOf(name) === -1) {
                    console.log(name);
                    $http({
                        method: 'GET',
                        url: url,
                        data: {rand: Math.random()}
                    }).then(function successCallback(response) {
                        tempData = $sce.trustAsHtml(response.data);
                        $this.data.list.push({
                            "title": title,
                            "content": tempData,
                            "name": name,
                            "url": url
                        });
                        $scope.page.tabsExists.push(name);
                        $('#myTabs1').tabCollapse();
                    }, function errorCallback(response) {
                    });
                }
                return false;
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
                    $scope.page.addTab('Software Licenses ', BASE_URL + 'company/software_licensing/json', 'software_licensing');
                }
            }
        };

        $scope.loanProgram = {};
        $scope.loanfee = {};

        $scope.activeState = [];
        $scope.activeClass = 'software_licensing';
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
            $scope.activeClass = idx;
        };

        $scope.isActiveClass = function (item) {
            return $scope.activeClass === item;
        };

        $scope.$watch(
                "page.data.list.length",
                function (newLen, oldLen) {
                    if (!newLen)
                        return;
                    if (newLen > oldLen)
                        $scope.activeState.push("true");
                });

        $scope.deleteTab = function (idx) {

            var list = $scope.page.data.list;
            if (list.length > 0) {
                $scope.page.data.list.splice(idx, 1);
                $scope.page.tabsExists.splice(idx, 1);
                $scope.activeState[idx] = true;
            }
            console.log(list.length);
        };

        $scope.deleteTabByName = function (name) {

            idx = $scope.page.tabsExists.indexOf(name);
            if (idx === -1)
                return false;
            console.log(idx);
            console.log($scope.page.tabsExists);
            var list = $scope.page.data.list;
            if (list.length > 0) {
                $scope.page.data.list.splice(idx, 1);
                $scope.page.tabsExists.splice(idx, 1);
                $scope.activeState[idx] = true;
            }
            console.log(list.length);
        };

        $scope.deleteEmployeePermanently = function (id) {
            swal({
                title: "Are you sure to delete your account Permanently?",
                text: "All the relationships will be permanently deleted, To Confirm enter YES ",
                type: "input",
                showCancelButton: true,
                closeOnConfirm: true,
                animation: "slide-from-top",
                inputPlaceholder: "Write something"
            },
            function (inputValue) {
                if (inputValue == 'YES') {
                    $http({
                        method: "post",
                        url: 'employee/delete_permanently/' + id,
                        dataType: 'json',
                    }).then(function (response) {
                        if (response.data.status == 'true') {
                            indexTabs = $scope.page.tabsExists.indexOf('Employemanagement');
                            if (indexTabs !== -1) {
                                $scope.deleteTab(indexTabs, 1);
                            }
                            $http({
                                method: "post",
                                url: 'employee/getAllEmployees',
                                headers: {'Content-Type': 'application/x-www-form-urlencoded'}
                            }).then(function (responsesss) {
                                tempDataS = $sce.trustAsHtml(responsesss.data);
                                $scope.getAllEmployeeData = tempDataS;
                            });
                            swal("Success!", "Your account deleted permanently. ", "success");

                        }
                    });
                } else {
                    swal("Oops", "You have typed something else.", "error");
                }

            });
        }//
        $scope.page.addTab('Software Licenses ', BASE_URL + 'company/software_licensing/json', 'software_licensing');



        /* Start Add Lender Functions */
        $scope.getAllLendersRecordsFun = function () {
            $http({
                method: 'POST',
                url: BASE_URL + 'company/loans/getlenders',
                headers: {
                    "Content-Type": "application/x-www-form-urlencoded;charset=utf-8"
                }
            }).then(function successCallback(response) {
                $scope.getAllLendersRecords = $sce.trustAsHtml(response.data);
            }, function errorCallback(response) {
            });
            return false;
        },
                $scope.addLender = function (url) {
                    var options = {
                        url: url,
                        type: 'POST',
                        dataType: 'json',
                        success: function (response) {
                            if (response.status === true) {
                                swal({title: "Wait", text: "One moment while I create this new lender for you.", timer: 3000, showConfirmButton: false});


                                $scope.refreshTab('Manage Lenders', 'manage_lenders', BASE_URL + 'company/lenders');
                                $scope.refreshTab('Edit Lender - ' + response.name, 'edit_license', BASE_URL + 'company/lenders/edit/' + response.id + "?rand=" + Math.random());
                                $("#showpopup").modal('hide');
                                $('#addLenderForm')[0].reset();
                            } else {
                                swal("Oops...", "Something went wrong!", "error");
                            }
                        }
                    };
                    $('#addLenderForm').ajaxSubmit(options);
                    return false;
                };
        /* End Add Lender Functions */

        /* Start Lender Contact Functions */
        $scope.addLenderContact = function (url) {
            var options = {
                url: url,
                type: 'POST',
                dataType: 'json',
                success: function (response) {
                    if (response.status === true) {
                        $("#nolendercontact").remove();
                        $testing = $compile(response.data)($scope);
                        $("#allcontacts").append($testing);
                        $("#showpopup").modal('hide');
                        $('#addLenderContactForm')[0].reset();
                    } else {
                        swal("Oops...", "Something went wrong!", "error");
                    }
                }
            };
            $('#addLenderContactForm').ajaxSubmit(options);
            return false;
        };
        $scope.editLenderContact = function (url) {
            var options = {
                url: url,
                type: 'POST',
                dataType: 'json',
                success: function (response) {
                    if (response.status === true) {
                        $("#lenderContactUnit" + response.data.id).find('.name').html(response.data.firstname + ' ' + response.data.lastname);
                        $("#lenderContactUnit" + response.data.id).find('.types').html(response.data.types);
                        $("#lenderContactUnit" + response.data.id).find('.title').html(response.data.title);
                        $("#lenderContactUnit" + response.data.id).find('.cellphone').html(response.data.cellphone);
                        $("#showpopup").modal('hide');
//                        swal("Success", "This contact has been updated!", "success");
                    } else {
                        swal("Oops...", "Something went wrong!", "error");
                    }
                }
            };
            $('#editLenderContactForm').ajaxSubmit(options);
            return false;
        };
        /* End Lender Contact Functions */


        /* Start Lender Mortgagee Contact Functions */
        $scope.addLenderMortgageContact = function (url) {
            var options = {
                url: url,
                type: 'POST',
                dataType: 'json',
                success: function (response) {
                    if (response.status === true) {
                        $("#nolendermortgagecontact").remove();
                        $testing = $compile(response.data)($scope);
                        $("#allmortgagecontacts").append($testing);
                        $("#showpopup").modal('hide');
                        $('#addLenderMortgageContactForm')[0].reset();
                    } else {
                        swal("Oops...", "Something went wrong!", "error");
                    }
                }
            };
            $('#addLenderMortgageContactForm').ajaxSubmit(options);
            return false;
        };
        $scope.editLenderMortgageContact = function (url) {
            var options = {
                url: url,
                type: 'POST',
                dataType: 'json',
                success: function (response) {
                    if (response.status === true) {
                        $("#lenderMortgageContactsUnit" + response.data.id).find('.fullname').html(response.data.fullname);
                        $("#showpopup").modal('hide');
//                        swal("Success", "This contact has been updated!", "success");
                    } else {
                        swal("Oops...", "Something went wrong!", "error");
                    }
                }
            };
            $('#editLenderMortgageContactForm').ajaxSubmit(options);
            return false;
        };
        /* End Lender Mortgagee Contact Functions */


        /* Start Lender Notice Functions */
        $scope.addLenderNotice = function (url) {
            var options = {
                url: url,
                type: 'POST',
                dataType: 'json',
                success: function (response) {
                    if (response.status === true) {
                        $("#nolendernotice").remove();
                        $testing = $compile(response.data)($scope);
                        $scope.uplaodURL = BASE_URL + "company/lenders/upload/LenderNotice/" + response.id;
                        uploader.uploadAll();
                        $("#allnotices").append($testing);
                        $("#showpopup").modal('hide');
                        $('#addLenderNoticeForm')[0].reset();
                    } else {
                        swal("Oops...", "Something went wrong!", "error");
                    }
                }
            };
            $('#addLenderNoticeForm').ajaxSubmit(options);
            return false;
        };
        $scope.editLenderNotice = function (url) {
            var options = {
                url: url,
                type: 'POST',
                dataType: 'json',
                success: function (response) {
                    if (response.status === true) {
                        $("#lenderNoticeUnit" + response.data.id).find('.date').html();
                        $("#lenderContactUnit" + response.data.id).find('.subject').html(response.data.subject);
                        $scope.uplaodURL = BASE_URL + "company/lenders/upload/LenderNotice/" + response.data.id;
                        uploader.uploadAll();
                        $("#showpopup").modal('hide');
                        swal("Success", "This notice has been updated!", "success");
                    } else {
                        swal("Oops...", "Something went wrong!", "error");
                    }
                }
            };
            $('#editLenderNoticeForm').ajaxSubmit(options);
            return false;
        };
        /* End Lender Notice Functions */


        /* Start Lender Tips Functions */
        $scope.addLenderTips = function (url) {
            var options = {
                url: url,
                type: 'POST',
                dataType: 'json',
                success: function (response) {
                    if (response.status === true) {
                        $scope.uplaodURL = BASE_URL + "company/lenders/upload/LenderTip/" + response.id;
                        uploader.uploadAll();
                        $("#nolendertips").remove();
                        $testing = $compile(response.data)($scope);
                        $("#alltips").append($testing);
                        $("#showpopup").modal('hide');
                        $('#addLenderTipsForm')[0].reset();
                    } else {
                        swal("Oops...", "Something went wrong!", "error");
                    }
                }
            };
            $('#addLenderTipsForm').ajaxSubmit(options);
            return false;
        };
        $scope.editLenderTips = function (url) {
            var options = {
                url: url,
                type: 'POST',
                dataType: 'json',
                success: function (response) {
                    if (response.status === true) {
                        $("#lenderTipsUnit" + response.data.id).find('.date').html(response.data.created);
                        $("#lenderTipsUnit" + response.data.id).find('.message').html(response.data.message);
                        $scope.uplaodURL = BASE_URL + "company/lenders/upload/LenderTip/" + response.data.id;
                        uploader.uploadAll();
                        $("#showpopup").modal('hide');
                        swal("Success", "This Tips has been updated!", "success");
                    } else {
                        swal("Oops...", "Something went wrong!", "error");
                    }
                }
            };
            $('#editLenderTipsForm').ajaxSubmit(options);
            return false;
        };
        /* End Lender Tips Functions */


        /* Start Lender Notes Functions */
        $scope.addLenderNotes = function (url) {
            var options = {
                url: url,
                type: 'POST',
                dataType: 'json',
                success: function (response) {
                    if (response.status === true) {
                        $scope.uplaodURL = BASE_URL + "company/lenders/upload/LenderNote/" + response.id;
                        uploader.uploadAll();
                        $("#nolendernotes").remove();
                        $testing = $compile(response.data)($scope);
                        $("#allnotes").append($testing);
                        $("#showpopup").modal('hide');
                        $('#addLenderNotesForm')[0].reset();
                    } else {
                        swal("Oops...", "Something went wrong!", "error");
                    }
                }
            };
            $('#addLenderNotesForm').ajaxSubmit(options);
            return false;
        };
        $scope.editLenderNotes = function (url) {
            var options = {
                url: url,
                type: 'POST',
                dataType: 'json',
                success: function (response) {
                    if (response.status === true) {
                        $scope.uplaodURL = BASE_URL + "company/lenders/upload/LenderNote/" + response.data.id;
                        uploader.uploadAll();

                        $("#lenderNotesUnit" + response.data.id).find('.date').html(response.data.created);
                        $("#lenderNotesUnit" + response.data.id).find('.tips').html(response.data.tips);
                        $("#showpopup").modal('hide');
                        swal("Success", "This Note has been updated!", "success");
                    } else {
                        swal("Oops...", "Something went wrong!", "error");
                    }
                }
            };
            $('#editLenderNotesForm').ajaxSubmit(options);
            return false;
        };
        /* End Lender Notes Functions */

        /* Start Lender Document Functions */
        $scope.addLenderDocument = function (url) {
            var options = {
                url: url,
                type: 'POST',
                dataType: 'json',
                success: function (response) {
                    if (response.status === true) {
                        $("#nolenderdoc").remove();
                        $testing = $compile(response.data)($scope);
                        $("#alldocuments").append($testing);
                        $("#showpopup").modal('hide');
                        $('#addLenderDocumentForm')[0].reset();
                    } else {
                        swal("Oops...", "Something went wrong!", "error");
                    }
                }
            };
            $('#addLenderDocumentForm').ajaxSubmit(options);
            return false;
        };
        $scope.openFiles = function (url) {
            $http({
                method: 'POST',
                url: url
            }).then(function successCallback(response) {
                if (response.data.status === true) {
                    //swal("Success", "Lender successfully activated.", "success");
                } else {
                    swal("Oops...", "Something went wrong!", "error");
                }
            }, function errorCallback(response) {
                swal("Oops...", "Something went wrong!", "error");
            });

        };
        /* End Lender Document Functions */


        /* Start Loan Fees Functions */
        $scope.addLenderLoanFee = function (url) {
            var options = {
                url: url,
                type: 'POST',
                dataType: 'json',
                success: function (response) {
                    if (response.status === true) {
                        $scope.getHudLenderFee(response.lenderid);
                        $("#showpopup").modal('hide');
                    } else {
                        swal("Oops...", "Something went wrong!", "error");
                    }
                }
            };
            $('#addLenderLoanFeeForm').ajaxSubmit(options);
            return false;
        };
        $scope.getHudLenderFee = function (lenderid) {
            $http({
                method: 'POST',
                url: BASE_URL + 'company/loanfees/getfee/' + lenderid,
                headers: {
                    "Content-Type": "application/x-www-form-urlencoded;charset=utf-8"
                }
            }).then(function successCallback(response) {
                $scope.lenderHudFees = $sce.trustAsHtml(response.data);
            }, function errorCallback(response) {
            });

            return false;
        };
        $scope.updateFees = function (itm, id) {
            $http({
                method: 'POST',
                url: BASE_URL + 'company/loanfees/update/' + id,
                data: $.param({value: itm, id: id}),
                headers: {
                    "Content-Type": "application/x-www-form-urlencoded;charset=utf-8"
                }
            }).then(function successCallback(response) {
                //$scope.getHudLenderFee(response.lenderid);
                //$("#showpopup").modal('hide');
            }, function errorCallback(response) {
            });

            return false;
        };
        $scope.updateHudLoanFees = function (itm, id, field) {
            $http({
                method: 'POST',
                url: BASE_URL + 'company/loanfees/updatehudfees/' + id,
                data: $.param({value: itm, id: id, field: field}),
                headers: {
                    "Content-Type": "application/x-www-form-urlencoded;charset=utf-8"
                }
            }).then(function successCallback(response) {
            }, function errorCallback(response) {
            });

            return false;
        };
        /* End Loan Fees Functions */


        /* Start Loan Programs Update Functions */
        $scope.updateLoanProgram = function (url) {
            var options = {
                url: url,
                type: 'POST',
                dataType: 'json',
                success: function (response) {
                    if (response.status === true) {
                        console.log(response);
                        $scope.getAllLoanProgram(response.lender_id);
                        $("#showpopup").modal('hide');
                    } else {
                        swal("Oops...", "Something went wrong!", "error");
                    }
                }
            };
            $('#updateLoanProgram').ajaxSubmit(options);
            return false;
        };

        $scope.uploadRateSheet = function (url) {
            var options = {
                url: url,
                type: 'POST',
                dataType: 'json',
                success: function (response) {
                    if (response.status === true) {
                        $("#updateSheetTime").html(response.time);
                        $("#showpopup").modal('hide');
                    } else {
                        swal("Oops...", "Something went wrong!", "error");
                    }
                }
            };
            $('#lenderRateSheet').ajaxSubmit(options);
            return false;
        };



        /* Start Some Common Functions */
        $scope.openPopUp = function (method, url, classpopup) {
            $http({
                method: method,
                url: url,
                data: {rand: Math.random()}
            }).then(function (resp) {
                uploader.clearQueue();
                tempData = $sce.trustAsHtml(resp.data);
                $scope.createProfilePopup = tempData;
                $scope.classpopup = classpopup;
                $("#showpopup").on('shown.bs.modal', function (e) {
                    setTimeout(function () {
                        $(".content").mCustomScrollbar({updateOnContentResize: true});
                        $('.selectpicker').selectpicker();
                        $(".modal").draggable({handle: ".modal-header"});
                        $('.datetimepicker').datetimepicker();
                        $('.datepicker').datetimepicker({format: 'MM/DD/YYYY'});
                        $('.datepickerCs').datetimepicker({
                            format: 'MM/DD/YYYY',
                            //maxDate: new Date,
                        }).on('dp.change', function (ev) {
                             var swapCategory = $(".category .selectpicker").val();
                            var limit = $(".limitval .selectpicker").val();
                            var fromDate = $(".frm_date").val();
                            var toDate = $(".str_date").val();
                            // do what you want here
                            $scope.getAllFunnyTrends(swapCategory, limit, fromDate, toDate);
                        });
                        $('.datepickerCst').datetimepicker({
                            format: 'MM/DD/YYYY',
                            //minDate: new Date,
                        }).on('dp.change', function (ev) {
                             var swapCategory = $(".category .selectpicker").val();
                            var limit = $(".limitval .selectpicker").val();
                            var fromDate = $(".frm_date").val();
                            var toDate = $(".str_date").val();
                            // do what you want here
                            $scope.getAllFunnyTrends(swapCategory, limit, fromDate, toDate);
                        });
                    });
                    
                    $(".modal-backdrop").css({height: "100%", 'z-index': '11'});
                }).modal({keyboard: false, backdrop: 'static'}).removeClass('fade');

            });
        };
        $scope.submitFormData = function (url, formid) {
            var options = {
                url: url,
                type: 'POST',
                dataType: 'json',
                success: function (response) {
                    if (response.status === true) {
                        swal("Success", "Record successfully updated.", "success");
                    } else {
                        swal("Oops...", "Something went wrong!", "error");
                    }
                }
            };
            $('#' + formid).ajaxSubmit(options);
            return false;
        };
        $scope.updateStatus = function (url, statusid) {
            status = $("#" + statusid).attr('statusid');
            $http({
                method: 'POST',
                url: url,
                data: $.param({rand: Math.random(), status: status}),
                headers: {
                    "Content-Type": "application/x-www-form-urlencoded;charset=utf-8"
                }
            }).then(function successCallback(response) {

                if (response.data.status === true) {
                    if (response.data.updated === '1') {
                        $("#" + statusid).attr('statusid', 0).addClass('active');
                        swal("Success", "Lender successfully activated.", "success");
                    } else {
                        $("#" + statusid).attr('statusid', 1).removeClass('active');
                        swal("Success", "Lender successfully de-activated", "success");
                    }

                } else {
                    swal("Oops...", "Something went wrong!", "error");
                }
            }, function errorCallback(response) {
                swal("Oops...", "Something went wrong!", "error");
            });
            return false;
        };
        $scope.updateLoanPricing = function (field, url) {
            $http({
                method: 'POST',
                url: url,
                data: $.param({rand: Math.random(), LenderRateSheet: field, url: url}),
                headers: {
                    "Content-Type": "application/x-www-form-urlencoded;charset=utf-8"
                }
            }).then(function successCallback(response) {
                if (response.data.status === true) {
                    $scope.getAllLoanProgram(response.data.data.LenderRateSheet.lender_id);
                }
            }, function errorCallback(response) {
                swal("Oops...", "Something went wrong!", "error");
            });
            return false;
        };
        $scope.clearFormValue = function (form) {
            $("form[name='" + form + "']").closest('form').find("input[type=text]").val("");
        };
        $scope.changePricing = function (set_value, margin, price, lender, program, event) {
//            console.log(event);
//            return false;
            $http({
                method: 'POST',
                url: BASE_URL + "company/loans/changeprice",
                data: $.param({
                    rand: Math.random(),
                    set_value: set_value,
                    m_id: margin,
                    p_id: price,
                    lender_id: lender,
                    program_id: program
                }),
                headers: {
                    "Content-Type": "application/x-www-form-urlencoded;charset=utf-8"
                }
            }).then(function successCallback(response) {
               // console.log(response.data);
                if (response.data.status === true) {
//                    $scope.getAllLoanProgram(response.data.data.LenderRateSheet.lender_id);
                }
            }, function errorCallback(response) {
                swal("Oops...", "Something went wrong!", "error");
            });
            return false;
        };
        $scope.changeFPricing = function (set_value, id, field) {
            $http({
                method: 'POST',
                url: BASE_URL + "company/loans/changefprice",
                data: $.param({
                    rand: Math.random(),
                    set_value: set_value,
                    id: id,
                    field: field
                }),
                headers: {
                    "Content-Type": "application/x-www-form-urlencoded;charset=utf-8"
                }
            }).then(function successCallback(response) {
               // console.log(response.data);
                if (response.data.status === true) {
//                    $scope.getAllLoanProgram(response.data.data.LenderRateSheet.lender_id);
                }
            }, function errorCallback(response) {
                swal("Oops...", "Something went wrong!", "error");
            });
            return false;
        };
        $scope.updateCE = function (value, id, field) {
            $http({
                method: 'POST',
                url: BASE_URL + "company/loans/changece",
                data: $.param({
                    rand: Math.random(),
                    id: id,
                    value: value,
                    field: field
                }),
                headers: {
                    "Content-Type": "application/x-www-form-urlencoded;charset=utf-8"
                }
            }).then(function successCallback(response) {
                if (response.data.status === true) {
                }
            }, function errorCallback(response) {
                swal("Oops...", "Something went wrong!", "error");
            });
            return false;
        };
        $scope.updateFCE = function (value, id, field) {
            $http({
                method: 'POST',
                url: BASE_URL + "company/loans/changfece",
                data: $.param({
                    rand: Math.random(),
                    id: id,
                    value: value,
                    field: field
                }),
                headers: {
                    "Content-Type": "application/x-www-form-urlencoded;charset=utf-8"
                }
            }).then(function successCallback(response) {
                if (response.data.status === true) {
                }
            }, function errorCallback(response) {
                swal("Oops...", "Something went wrong!", "error");
            });
            return false;
        };
        $scope.updateAS = function (value, id, field) {
            $http({
                method: 'POST',
                url: BASE_URL + "company/loans/changeas",
                data: $.param({
                    rand: Math.random(),
                    id: id,
                    value: value,
                    field: field
                }),
                headers: {
                    "Content-Type": "application/x-www-form-urlencoded;charset=utf-8"
                }
            }).then(function successCallback(response) {
                if (response.data.status === true) {
                }
            }, function errorCallback(response) {
                swal("Oops...", "Something went wrong!", "error");
            });
            return false;
        };
        $scope.refreshTab = function (title, name, url) {
            indexTabs = $scope.page.tabsExists.indexOf(name);
            if (indexTabs !== -1) {
                $scope.deleteTab(indexTabs, 1);
            }
            $scope.page.addTab(title, url, name);
        };
        $scope.deleteRecords = function (unit_id, url) {
            swal({
                title: "Are you sure?",
                text: "You will not be able to recover this record!",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Yes, delete it!",
                closeOnConfirm: false
            },
            function () {
                $.ajax({
                    url: url,
                    type: 'POST',
                    dataType: 'json',
                    success: function (response) {
                        if (response.status === true) {
                            $("#" + unit_id).remove();
                            swal("Deleted!", "This record has been deleted.", "success");
                        } else {
                            swal("Oops...", "Something went wrong!", "error");
                        }
                    }
                });
            });
            return false;
        };
        $scope.removeResources = function (id) {
            swal({
                title: "Are you sure?",
                text: "You will not be able to recover this record!",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Yes, remove it!",
                closeOnConfirm: false
            },
            function () {
                $.ajax({
                    url: BASE_URL + 'company/lenders/removeresources/' + id,
                    type: 'POST',
                    dataType: 'json',
                    success: function (response) {
                        if (response.status === true) {
                            $("#resources_" + id).remove();
                            swal("Deleted!", "This record has been deleted.", "success");
                        } else {
                            swal("Oops...", "Something went wrong!", "error");
                        }
                    }
                });
            });
            return false;
        };

        $scope.getMaxMar = function (margin, id) {

            $scope.loanfee.maxplmargin = margin;
         //   console.log($scope.loanfee);

            $http({
                method: 'POST',
                url: BASE_URL + "company/loans/updatepricing/" + id,
                data: $.param({rand: Math.random(), LenderRateSheet: $scope.loanfee}),
                headers: {
                    "Content-Type": "application/x-www-form-urlencoded;charset=utf-8"
                }
            }).then(function successCallback(response) {
                if (response.data.status === true) {

                    $scope.t_active = response.data.diff.ten_year;
                    $scope.tw_active = response.data.diff.tw_month;
                    $scope.one_active = response.data.diff.one_month;
                    $scope.pl_active = response.data.diff.pl_margin;
                    console.log($scope.t_active);
                    console.log($scope.tw_active);
                    console.log($scope.one_active);
                    console.log($scope.pl_active);

                    $scope.getAllLendersRecordsFun();
                }
            }, function errorCallback(response) {
                swal("Oops...", "Something went wrong!", "error");
            });
            return false;

        };

        $scope.getAllFunnyTrends = function (swapOption, filterOption, fromDate, toDate) {
            if (filterOption == "custom")
            {
                $(".customDateRanger").removeClass('hide');
            }
            if ((fromDate == "undefined") && (toDate == "undefined"))
            {
                var params = {swapOption: swapOption, filterOption: filterOption}
            }
            else {
                var params = {swapOption: swapOption, filterOption: filterOption, fromDate: fromDate, toDate: toDate}
            }
            $http({
                method: 'POST',
                url: BASE_URL + 'company/loans/gettrends/',
                data: $.param(params),
                headers: {
                    "Content-Type": "application/x-www-form-urlencoded;charset=utf-8"
                }
            }).then(function successCallback(response) {
                $scope.allTrendData = $sce.trustAsHtml(response.data);
            }, function errorCallback(response) {

            });
        };
        $scope.showDatePickers = function ()
        {
            alert("hello");
        }

        $scope.getAllLoanProgram = function (id) {
            $http({
                method: 'POST',
                url: BASE_URL + 'company/loans/allloanprogram/' + id,
                data: $.param({id: id}),
                headers: {
                    "Content-Type": "application/x-www-form-urlencoded;charset=utf-8"
                }
            }).then(function successCallback(response) {
                $scope.getAllLoanProgramData = $sce.trustAsHtml(response.data);
            }, function errorCallback(response) {
            });

            return false;
        };
        $scope.getAllLoanProgramNew = function (id) {
            $http({
                method: 'POST',
                url: BASE_URL + 'company/loans/allloanprogramnew/' + id,
                data: $.param({id: id}),
                headers: {
                    "Content-Type": "application/x-www-form-urlencoded;charset=utf-8"
                }
            }).then(function successCallback(response) {
                $scope.getAllLoanProgramDataNew = $sce.trustAsHtml(response.data);
            }, function errorCallback(response) {
            });

            return false;
        };

        /* End Some Common Functions */

        $scope.autoSelected = function (id, value) {

            if (value !== undefined) {
                console.log(value);
                $("#" + id).attr('selected', true);
            }
        };

        $scope.testing = function () {
            console.log("hey");
            $location.skipReload().path("testing");
        };



    }]);

function setCookie(cname, cvalue, second) {
    var d = new Date();
    d.setTime(d.getTime() + (second));
    var expires = "expires=" + d.toUTCString();
    document.cookie = cname + "=" + cvalue + "; " + expires + "; path=/";
}
setInterval(function () {
    setCookie('testingTimeOut', 'true', 2000);

}, 2000);



// inactive state ended here
myApp.directive('compileTemplate', function ($compile, $parse, $timeout) {
    return {
        restrict: 'A',
        replace: true,
        link: function (scope, element, attr) {
            scope.$watch(attr.content, function () {
                element.html($parse(attr.content)(scope));
                $compile(element.contents())(scope);

                $('input').iCheck({
                    checkboxClass: 'icheckbox_square-orange',
                    radioClass: 'iradio_square-orange',
                    increaseArea: '20%' // optional
                });
                $timeout(function () {
                    $('#example').DataTable();
                    $('.datetimepicker').datetimepicker();
                    $('.datepicker').datetimepicker({
                        format: 'MM/DD/YYYY',
                    });
                    $('.datepicker1').datetimepicker({
                        format: 'MM/DD/YYYY',
                    });
                    $('.datepicker2').datetimepicker({
                        format: 'MM/DD/YYYY',
                    });
                    $('.selectpicker').selectpicker();
//                    $('input').iCheck({
//                        checkboxClass: 'icheckbox_square-orange',
//                        radioClass: 'iradio_square-orange',
//                        increaseArea: '20%' // optional
//                    });

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
                        $timeout(function () {
                            $compile(element, null, -9999)(scope);
                            $('.selectpicker').selectpicker()
                            $('.datepicker1').datetimepicker({
                                format: 'MM/DD/YYYY',
                            });
                            $('.datepicker2').datetimepicker({
                                format: 'MM/DD/YYYY',
                            });
                            $('input').iCheck({
                                checkboxClass: 'icheckbox_square-orange',
                                radioClass: 'iradio_square-orange',
                                increaseArea: '20%' // optional
                            });
                        })


                    }
            );
        }
    };
});


myApp.directive('ckEditor', function ($sce) {
    return {
        require: '?ngModel',
        link: function (scope, elm, attr, ngModel) {
            for (name in CKEDITOR.instances) {
                CKEDITOR.instances[name].destroy(true);
            }
            var ck = CKEDITOR.replace(elm[0]);
            ck.setData("");
            function testCheck() {
                $datataa = $("#ckeditordefault").val();
                if ($datataa != '') {
                    ck.setData($datataa);
                } else {
                    //ck.setData(ngModel.$viewValue);
                    ck.setData("")
                }
            }


//            if (!ngModel)
//                return;
//            ck.on('instanceReady', function () {
//                $datataa = $("#ckeditordefault").val();
//                if ($datataa != '') {
//                    ck.setData($datataa);
//                    $("#ckeditordefault").val('');
//                } else {
//                    ck.setData(ngModel.$viewValue);
//                }
//
//            });
            function updateModel() {
                scope.$apply(function () {
//                    ngModel.$setViewValue(ck.getData());
                    $dataAreaAll = $sce.trustAsHtml(ck.getData());
                    scope.showPreview = $dataAreaAll;
                });
            }
            ck.on('change', updateModel);
//            ck.on('key', updateModel);
//            ck.on('dataReady', updateModel);
//
            ngModel.$render = function (value) {
//                ck.setData(ngModel.$viewValue);
                testCheck();
            };

        }
    };
});

myApp.directive('icheck', function ($timeout, $parse) {
    return {
        require: 'ngModel',
        link: function ($scope, element, $attrs, ngModel) {
            return $timeout(function () {
                var value;
                value = $attrs['value'];

                $scope.$watch($attrs['ngModel'], function (newValue) {
                    $(element).iCheck('update');
                });

                $scope.$watch($attrs['ngDisabled'], function (newValue) {
                    $(element).iCheck(newValue ? 'disable' : 'enable');
                    $(element).iCheck('update');
                })

                return $(element).iCheck({
                    checkboxClass: 'icheckbox_square-orange',
                    radioClass: 'iradio_square-orange',
                    increaseArea: '20%' // optional

                }).on('ifChanged', function (event) {
                    if ($(element).attr('type') === 'checkbox' && $attrs['ngModel']) {
                        $scope.$apply(function () {
                            return ngModel.$setViewValue(event.target.checked);
                        })
                    }
                }).on('ifClicked', function (event) {
                    if ($(element).attr('type') === 'radio' && $attrs['ngModel']) {
                        return $scope.$apply(function () {
                            //set up for radio buttons to be de-selectable
                            if (ngModel.$viewValue != value)
                                return ngModel.$setViewValue(value);
                            else
                                ngModel.$setViewValue(null);
                            ngModel.$render();
                            return
                        });
                    }
                });
            });
        }
    };
});

myApp.directive('icheckgreen', function ($timeout, $parse) {
    return {
        require: 'ngModel',
        link: function ($scope, element, $attrs, ngModel) {

            return $timeout(function () {
                var value;
                value = $attrs['value'];

                $scope.$watch($attrs['ngModel'], function (newValue) {
                    $(element).iCheck('update');
                });

                $scope.$watch($attrs['ngDisabled'], function (newValue) {
                    $(element).iCheck(newValue ? 'disable' : 'enable');
                    $(element).iCheck('update');
                })

                return $(element).iCheck({
                    checkboxClass: 'icheckbox_square-green',
                    radioClass: 'iradio_square-green',
                    increaseArea: '20%' // optional

                }).on('ifChanged', function (event) {
                    if ($(element).attr('type') === 'checkbox' && $attrs['ngModel']) {
                        $scope.$apply(function () {
                            return ngModel.$setViewValue(event.target.checked);
                        })
                    }
                }).on('ifClicked', function (event) {
                    if ($(element).attr('type') === 'radio' && $attrs['ngModel']) {
                        return $scope.$apply(function () {
                            //set up for radio buttons to be de-selectable
                            if (ngModel.$viewValue != value)
                                return ngModel.$setViewValue(value);
                            else
                                ngModel.$setViewValue(null);
                            ngModel.$render();
                            return
                        });
                    }
                });
            });

        }
    };
});

myApp.directive('bindIf', function () {
    return {
        restrict: 'A',
        require: 'ngModel',
        link: function (scope, element, attrs, ngModel) {
            function parser(value) {
                var show = scope.$eval(attrs.bindIf);
                return show ? value : '';
            }

            ngModel.$parsers.push(parser);
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
