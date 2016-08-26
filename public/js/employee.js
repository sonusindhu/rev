var BASE_URL = "http://localhost/revad/public/";
myApp.controller('empCtrl', ['$scope', '$http', '$sce', '$compile', function ($scope, $http, $sce, $compile) {
        $scope.employee_id = 0; //
        $scope.emp_clicked = 0; //
        $scope.showLooks = 'Lookup Branch'; //
        $scope.addUrlHtml = ''; //
        $scope.addSpouseData = ''; //
        $scope.messageNotifications = ''; //
        $scope.updateNmlsId = function (id) {
            var nmls = $('.nmlsid').val();
            if (id == '') {
                var url = BASE_URL + 'company/software_licensing/updateNmlsId';
            } else {
                var url = BASE_URL + 'company/software_licensing/updateNmlsId/' + id;
            }
            $http({
                method: "post",
                url: url,
                dataType: 'json',
                data: $.param({
                    nmls: nmls,
                    _token: csrf_token
                }),
                headers: {'Content-Type': 'application/x-www-form-urlencoded'}
            }).then(function (response) {
            });
        }//
        $scope.spouseOuter = function () {
            $scope.addSpouseData = '';
        }//
        $scope.showAlert = function () {
            alert('No file uploaded yet.');
            return false;
        }//
        $scope.messageNotification = function () {
            $('.portfolioloader').hide();
            $http({
                method: "post",
                dataType: 'json',
                url: 'message/notification',
                data: $.param({
                    test: 'data'
                }),
                headers: {'Content-Type': 'application/x-www-form-urlencoded'}
            }).then(function (response) {
                $('.portfolioloader').hide();
                tempData = $sce.trustAsHtml(response.data);
                $scope.messageNotifications = tempData;
            });
        }//
        $scope.licensePrice = function (event) {
            var price = $(event.currentTarget).val();
            $http({
                method: "post",
                url: BASE_URL + 'company/employee/addLicensePrice',
                dataType: 'json',
                data: $.param({
                    price: price,
                }),
                headers: {'Content-Type': 'application/x-www-form-urlencoded'}
            }).then(function (response) {
                if (response.data.status == 'true') {
                    $('#adedValue').val(response.data.amount);
                    $('#timing').val(response.data.timing);
                    $('#adedValue1').html(response.data.amount);
                    $('#labl').html('Amount Billed ' + response.data.time);
                }
            });
        }//
        $scope.termination = function (event, emp_id) {
            var employee_id = $('.employee_id').val();
            var date = $(event.currentTarget).val();
            $http({
                method: "post",
                url: 'employee/termination/' + employee_id,
                dataType: 'json',
                data: $.param({
                    id: employee_id,
                    date: date,
                    status: 'no',
                }),
                headers: {'Content-Type': 'application/x-www-form-urlencoded'}
            }).then(function (response) {
                if (response.data.status == 'active') {
                    swal({
                        title: "Do you want to deactivate this employee account now?",
                        text: "Your client and partners will be reassigned to any other employee.",
                        type: "warning",
                        showCancelButton: true,
                        confirmButtonColor: "#DD6B55",
                        confirmButtonText: "OK",
                        closeOnConfirm: true
                    }, function () {
                        $http({
                            method: "post",
                            url: 'employee/termination/' + employee_id,
                            dataType: 'json',
                            data: $.param({
                                id: employee_id,
                                date: date,
                                status: 'yes',
                            }),
                            headers: {'Content-Type': 'application/x-www-form-urlencoded'}}).then(function (response) {
                            $('.ResponseDiv').show().fadeOut(3500);
                        });

                    });
                } else {
                    // $('.ResponseDiv').show();
                }
//swal('Success', response.message, 'success');

            });
        }//
        $scope.openByDefault = function () {
            $scope.employee_id = '';
            $('.employee_id').val('');
            $http({
                method: "post",
                url: 'employee/personel_info',
                data: "personel_info"
            }).then(function (response) {
                tempData = $sce.trustAsHtml(response.data);
                $scope.addTabsData = tempData;
            });
        }//
        $scope.addTabMenu = function (ids, url, type) {
            $http({
                method: "post",
                url: url,
                data: $.param({
                    id: ids,
                    type: type
                }),
                headers: {'Content-Type': 'application/x-www-form-urlencoded'}
            }).then(function (response) {
                tempData = $sce.trustAsHtml(response.data);
                $scope.addTabsData = tempData;
                $('input').iCheck({
                    checkboxClass: 'icheckbox_square-orange',
                    radioClass: 'iradio_square-orange',
                    increaseArea: '20%' // optional
                });
                if (ids == 'activity') {
                    $('#admin_tab').parent().removeClass('active');
                    $('#Generalinfo_tab').parent().addClass('active');
                }
                $('.selectpicker').selectpicker();
                $('.datepicker4').datetimepicker({format: 'MM/DD/YYYY'});
                $('.datepicker5').datetimepicker({format: 'm/d/y'});
                var tempVar = 1;
                setInterval(function () {
                    if (tempVar == 1) {
                        $('.employe_li li').removeClass('active');
                        $('#' + ids).parent().addClass('active');
                        tempVar = 2;
                    } else {
                        return false;
                    }
                }, 500);
            });
        }//
        $scope.AddEmployee = function (id) {
            if ($scope.emp_clicked != 0)
                return false;
            $scope.emp_clicked = 1;
            $('.error-message').remove();
            if (id == undefined) {
                var url = 'employee/personel_info';
            } else {
                var url = 'employee/personel_info/' + id;
            }
            var options = {
                url: url,
                dataType: 'json',
                type: 'POST',
                success: function (response) {
                    $scope.emp_clicked = 0;
                    if (response.status == 'error') {
                        if (response.error) {
                            $.each(response.error, function (index, ele) {
                                if (index == 'emp_image') {
                                    $('#image_upload_preview').addClass('error_border');
                                }
                                if (index == 'spouse_image') {
                                    $('#showimage').addClass('error_border');
                                }
                                $scope.validation(index, ele[0], 'EmployeeDetail');
                            });
                        }
                        if (response.error) {
                            $.each(response.error, function (index, ele) {
                                $scope.validation(index, ele[0], 'EmployeeAssignment');
                            });
                        }
                        $(response.errorChild).each(function (index, element) {
                            $.each(element, function (key, val) {
                                if ($.type(val) == 'object') {
                                    $.each(val, function (keys, vals) {
                                        if (response.modelname == "EmployeeLender") {
                                            $scope.validationErrorNew(keys, keys, 'EmployeeLender', key);
                                        }
                                        if (response.modelname == "EmployeeCredit") {
                                            $scope.validationErrorNew(keys, keys, 'EmployeeCredit', key);
                                        }
                                        if (response.modelname == "EmployeeHiring") {
                                            $scope.validationErrorNew(keys, keys, 'EmployeeHiring', key);
                                        }
                                        if (response.modelname == "EmployeeOnboarding") {
                                            $scope.validationErrorNew(keys, keys, 'EmployeeOnboarding', key);
                                        }
                                    });
                                } else {
                                    if (response.modelname == "EmployeeLender") {
                                        $scope.validationErrorNew(key, val, 'EmployeeLender', index);
                                    }
                                    if (response.modelname == "EmployeeCredit") {
                                        $scope.validationErrorNew(key, val, 'EmployeeCredit', index);
                                    }
                                    if (response.modelname == "EmployeeHiring") {
                                        $scope.validationErrorNewForHiring(val, val, 'EmployeeHiring', key);
                                    }
                                    if (response.modelname == "EmployeeOnboarding") {
                                        $scope.validationErrorNewForHiring(val, val, 'EmployeeOnboarding', key);
                                    }
                                }
                            });
                        });
                        $(response.errorChild).each(function (index, element) {
                            $.each(element, function (key, val) {
                                if ($.type(val) == 'object') {
                                    $.each(val, function (newkey, newval) {
                                        if (response.modelname == "EmployeeLicense") {
                                            $scope.validationErrorNewLicense(key, newval, 'EmployeeLicense', newkey);
                                        }
                                    });
                                } else {
                                    if (response.modelname == "EmployeeLicense") {
                                        $scope.validationErrorNewLicense(index, val, 'EmployeeLicense', key);
                                    }
                                }

                            });
                        });
                        $(response.errorChild).each(function (indexs, elements) {
                            if (response.errorChild.EmployeeChildren) {
                                $(response.errorChild.EmployeeChildren).each(function (index, element) {
                                    $.each(element, function (key, val) {
                                        if ($.type(val) == 'object') {
                                            $.each(val, function (newkey, newval) {
                                                $scope.validationError(newkey, newkey, 'EmployeeChildren', key);
                                            });
                                        } else {
                                            $scope.validationError(key, val, 'EmployeeChildren', index);
                                        }
                                    });
                                });
                            }
                            if (response.errorChild.EmployeeCertification) {
                                $(response.errorChild.EmployeeCertification).each(function (index, element) {
                                    $.each(element, function (key, val) {
                                        if ($.type(val) == 'object') {
                                            $.each(val, function (newkey, newval) {
                                                $scope.validationError(newkey, newkey, 'EmployeeCertification', key);
                                            });
                                        } else {
                                            $scope.validationError(key, val, 'EmployeeCertification', index);
                                        }

                                    });
                                });
                            }


                        });
                    } else {
                        $('input').removeClass('error_border');
                        $('select').removeClass('error_border');
                        $('file').removeClass('error_border');
                        $('textarea').removeClass('error_border');
                        $('#image_upload_preview').removeClass('error_border');
                        $('#showimage').removeClass('error_border');
                        if (response.employee_id) {
                            $scope.employee_id = response.employee_id;
                            $('.employee_id').val(response.employee_id);
                        }
                        if (response.spouseStatus == 'true') {
                            var te = 'add';
                        } else {
                            var te = 'remove';
                        }
                        if (response.saved) {
                            var savedModel = response.saved;
                            console.log(savedModel);
                            if (savedModel == 'EmployeeOnboarding') {
                                $scope.addTabMenu('onboarding', 'employee/onboarding/' + response.employee_id, 'onboarding');
                            }
                            if (savedModel == 'EmployeeLicense') {
                                $scope.addTabMenu('licenses', 'employee/licenses/' + response.employee_id, 'licenses');
                            }
                            if (savedModel == 'EmployeeHiring') {

                                console.log('test');
                                $scope.addTabMenu('humanresourse_tab', 'employee/humanresourse_tab/' + response.employee_id, 'humanresourse_tab');
                            }
                            if (savedModel == 'EmployeeLender') {
                                $scope.addTabMenu('lenders', 'employee/lenders/' + response.employee_id, 'lenders');
                            }
                            if (savedModel == 'EmployeeCredit') {
                                $scope.addTabMenu('credit_bureas', 'employee/credit_bureas/' + response.employee_id, 'credit_bureas');
                            }
                            if (savedModel == 'EmployeeChildren') {
                                $scope.addTabMenu('personel_info', 'employee/personel_info/' + response.employee_id, 'personel_info');
                            }
                            if (savedModel == 'EmployeeCertification') {
                                $scope.addTabMenu('professional_info', 'employee/personel_info/' + response.employee_id, 'professional_info');
                            }
                            $('.ResponseDiv').show().fadeOut(3500);
                        }
                        if (response.very_first == 1) {
                            indexTabs = $scope.page.tabsExists.indexOf('Employemanagement');
                            if (indexTabs != -1) {
                                $scope.deleteTab(indexTabs, 1);
                            }
                            $scope.getAllEmployees();
                            $scope.page.addTab(response.emp_name, 'employee/add/' + response.employee_id, 'Employemanagement');
                            $scope.activeStateCheck('Employemanagement');
                            $scope.editEmployeeRecord(response.employee_id);
                            $scope.addSpouse(response.employee_id, te);
                            $('.ResponseDiv').show().fadeOut(3500);
                            return false;
                        }
                        $('.ResponseDiv').show().fadeOut(3500);

                    }
                },
                error: function (error) {
                    $scope.emp_clicked = 0;
                }
            }
            $('#idforForm').ajaxSubmit(options);
            // return false;
        }//
        $scope.freshHtml = function (savedModel, emp_id) {
            $http({
                method: "post",
                url: 'employee/freshHtml/' + savedModel + '/' + emp_id,
            }).then(function (response) {
                tempData = $sce.trustAsHtml(response.data);
                if (savedModel == 'EmployeeLicense') {
                    $scope.addTabMenu('licenses', 'employee/licenses/' + emp_id, 'licenses');
                    // $scope.addLicenseMore = tempData;
                }
                if (savedModel == 'EmployeeLender') {
// $scope.display = tempData;
                    $scope.addTabMenu('lenders', 'employee/lenders/' + emp_id, 'lenders')
                }
                if (savedModel == 'EmployeeCredit') {
//$(".addCredit").html(response.data);
                    $scope.addTabMenu('credit_bureas', 'employee/credit_bureas/' + emp_id, 'credit_bureas')
                }
            });
        }
        $scope.editEmail = function (email) {
            var options = {
                url: 'employee/edit_email/' + email,
                dataType: 'json',
                type: 'POST',
                success: function (response) {
                    if (response.status == 'true') {
                        swal('Success', response.message, 'success');
                        $('#showpopup').modal('hide');
                    } else {
                        $('.form-control').css('border', '2px solid red');
                    }
                }
            }
            $('#editEmail').ajaxSubmit(options);
        }
        $scope.editEmployeeRecord = function (editId) {
            var temp = 1;
            setInterval(function () {
                if (temp == 1) {
                    $('.employee_id').val(editId);
                    $scope.employee_id = editId;
                    temp = 2;
                    $http({
                        method: "post",
                        url: 'employee/personel_info/' + editId,
                        data: "personel_info"
                    }).then(function (response) {
                        tempData = $sce.trustAsHtml(response.data);
                        $scope.addTabsData = tempData;
                        $scope.employee_id = editId;
//                        $('.employee_id').val(editId);

                    });
                }
            }, 1000);
        }//
        $scope.addQualification = function (id) {
            console.log(id);
            var options = {
                url: 'employee/add_qualification',
                dataType: 'json',
                type: 'POST',
                success: function (response) {
                    if (response.status == 'false') {
                        if (response.error) {
                            $.each(response.error, function (index, ele) {
                                $scope.validation(index, ele[0], 'HiringRequirement');
                            });
                        }
                    } else {
                        $('input').removeClass('error_border');
                        $('#' + id)[0].reset();
                        // swal('Success', response.message, 'success');
                        $('#showpopup').modal('hide');
                        $scope.openPopUp('get', 'employee/qualification/' + response.type, 'hiring_popups');
                    }
                }
            }
            $('#' + id).ajaxSubmit(options);
        }//
        $scope.checkRoles = function (event, role_id, role_name) {
            $('.role_id').val(role_id);
            $('.role_name').val(role_name);
            $('.loan_orgin').html(role_name);
            $('#showpopup').modal('hide');
            var emp_id = $('.employee_id').val();
            var ob = $('.loan_orgin').html(role_name);
            var test = $('span').hasClass('loan_orgin');
            if (test == true) {
                $http({
                    method: "post",
                    url: 'employee/update_role/' + role_id + '/' + emp_id,
                    data: $.param({
                        role_id: role_id, emp_id: emp_id
                    }),
                    headers: {'Content-Type': 'application/x-www-form-urlencoded'}
                }).then(function (response) {
                    if (response.data.status == 'true') {
                        $(event.currentTarget).parent().parent().remove();
                        swal('Success', response.message, 'success');
                    }
                });
            }
        }//
        $scope.virtualLogin = function (emp_id) {
            $http({
                method: "post",
                url: 'employee/virtualLogin',
                data: $.param({
                    emp_id: emp_id,
                }),
                headers: {'Content-Type': 'application/x-www-form-urlencoded'}
            }).then(function (response) {
                if (response.data.status == 'true') {
                    window.location.href = BASE_URL + "employee";
                } else {
                    alert('Firstly,Set Contact Details for the employee appropriately, to get access as employee.');
                    return false;
                }
            });
        }//
        $scope.logoutVitual = function (employee_id) {
            $http({
                method: "post",
                url: 'employee/employee/logoutVitual',
                data: $.param({
                    employee_id: employee_id,
                }),
                headers: {'Content-Type': 'application/x-www-form-urlencoded'}
            }).then(function (response) {
                if (response.data.status == 'true') {
                    window.location.href = BASE_URL + "company/software_licensing";
                }
            });
        }//
        $scope.inactiveRow = function (event, id) {
            $http({
                method: "post",
                url: 'employee/deleteQualification',
                data: $.param({
                    id: id,
                }),
                headers: {'Content-Type': 'application/x-www-form-urlencoded'}
            }).then(function (response) {
                if (response.data.status == 'true') {
                    $(event.currentTarget).parent().parent().remove();
                    // swal('Success', response.message, 'success');
                }
            });
        }//
        $scope.deleteOnboarding = function (event, id) {
            $http({
                method: "post",
                url: 'employee/deleteOnboarding',
                data: $.param({
                    id: id,
                }),
                headers: {'Content-Type': 'application/x-www-form-urlencoded'}
            }).then(function (response) {
                if (response.data.status == 'true') {
                    $(event.currentTarget).parent().parent().remove();
                    swal('Success', response.message, 'success');
                }
            });
        }//
        $scope.addChild = function () {
            var Employee = $('#childValue').val();
            var myEl = angular.element(document.querySelector('.childrn_sec'));
            $http({
                method: "post",
                url: 'employee/addChild',
                data: $.param({
                    child: Employee
                }),
                headers: {'Content-Type': 'application/x-www-form-urlencoded'}
            }).then(function (response) {
                if (response.data) {
                    employee = parseInt(Employee) + 1;
                    $scope.Employee = employee;
                    $('#childValue').val(employee);
                    tempData = $sce.trustAsHtml(response.data);
                    myEl.append($compile(response.data)($scope));
//                    myEl.append($compile(response.data)($scope));
                    $('.selectpicker').selectpicker();
                    $('.datepicker2').datetimepicker({
                        format: 'MM/DD/YYYY',
                    });
                }

            });
            return false;
        }//
        $scope.deleteChild = function (id, reCid) {
            if (reCid == undefined) {
                var url = 'employee/delete_child/';
            } else {
                var url = 'employee/delete_child/' + reCid;
            }
            $http({
                method: 'post',
                url: url,
                data: $.param({
                    recId: reCid
                }),
                headers: {'Content-Type': 'application/x-www-form-urlencoded'}
            }).then(function (response) {
                if (response.status == 'true') {

                }

            });
            var myEl = angular.element(document.querySelector('#' + id));
            myEl.parent().parent().remove();
        }//
        $scope.addCertificate = function (certificate) {
            var myEl = angular.element(document.querySelector('.addCerti'));
            var certificate = $('#certiVal').val();
            $http({
                method: 'post',
                url: 'employee/add_certificate',
                data: $.param({
                    certificate: certificate
                }),
                headers: {'Content-Type': 'application/x-www-form-urlencoded'}
            }).then(function (response) {
                CertiVal = parseInt(certificate) + 1;
                $('#certiVal').val(CertiVal);
                $scope.certificate = CertiVal;
                tempData = $sce.trustAsHtml(response.data);
                myEl.append($compile(response.data)($scope));
                $('.datepicker1').datetimepicker({
                    format: 'MM/DD/YYYY',
                });
            });
        }//
        $scope.deleteCerti = function (id, recId) {
            $http({
                method: 'post',
                url: 'employee/delete_certificate',
                data: $.param({
                    recId: recId
                }),
                headers: {'Content-Type': 'application/x-www-form-urlencoded'}
            }).then(function (response) {
                if (response.status == 'true') {

                }

            });
            var myEl = angular.element(document.querySelector('#' + id));
            myEl.parent().parent().remove();
        }//
        $scope.download = function (filename) {
            $http({
                method: 'post',
                url: 'employee/download/' + filename,
                data: $.param({
                    filename: filename
                }),
                headers: {'Content-Type': 'application/x-www-form-urlencoded'}
            }).then(function (response) {
                if (response.status == 'true') {

                }

            });
        }
        $scope.addCertificationDetail = function () {
            $('.error-message').remove();
            var options = {
                url: 'employee/professional_info',
                dataType: 'json',
                type: 'POST',
                success: function (response) {
                    if (response.status == 'error') {
                        if (response.error.professional_bio) {
                            $('textarea[name="data[EmployeeDetail][professional_bio]"]').after('<div class="error-message">' + response.error.professional_bio[0] + '</div>');
                        }
                        $(response.errorChild).each(function (index, element) {

                            if (element.name) {
                                $('input[name="data[EmployeeCertification][' + index + '][name]"]').after('<div class="error-message">' + element.name + '</div>');
                            } else {
                                $('input[name="data[EmployeeCertification][' + index + '][name]"]').next().remove();
                            }
                            if (element.since) {
                                $('input[name="data[EmployeeCertification][' + index + '][since]"]').after('<div class="error-message">' + element.since + '</div>');
                            } else {
                                $('input[name="data[EmployeeCertification][' + index + '][last_name]"]').next().remove();
                            }
                            if (element.acronym) {
                                $('input[name="data[EmployeeCertification][' + index + '][acronym]"]').after('<div class="error-message">' + element.acronym + '</div>');
                            }
                        });
                    } else {
                        swal('Success', response.message, 'success');
                    }
                }
            }
            $('#addCertificationDetail').ajaxSubmit(options);
        }//
        $scope.validation = function (index, element, model) {
            
//            alert('input[name="data[' + model + '][' + index + ']"]');
            $('input[name="data[' + model + '][' + index + ']"]').addClass('error_border');
//            $('input[name="data[' + model + '][' + index + ']"]').addClass('error_border');
            $('textarea[name="data[' + model + '][' + index + ']"]').addClass('error_border');
            $('select[name="data[' + model + '][' + index + ']"]').addClass('error_border');
            $('radio[name="data[' + model + '][' + index + ']"]').addClass('error_border');
//            $('input[name="data[' + model + '][' + index + ']"]').after('<div class="error-message">' + element + '</div>');
        }//
        $scope.validationForState = function (index, element, value, model) {
            //  alert('input[name="data[' + index + '][' + model + '][' + value + ']"]');
            $('input[name="data[' + index + '][' + model + '][' + value + ']"]').addClass('error_border');
            $('textarea[name="data[' + index + '][' + model + '][' + value + ']"]').addClass('error_border');
            $('select[name="data[' + index + '][' + model + '][' + value + ']"]').addClass('error_border');
            $('radio[name="data[' + index + '][' + model + '][' + value + ']"').addClass('error_border');
//            $('input[name="data[' + model + '][' + index + ']"]').after('<div class="error-message">' + element + '</div>');
        }//
        $scope.validationError = function (index, element, model, key) {
            $('input[name="data[' + model + '][' + key + '][' + index + ']"]').addClass('error_border');
            $('textarea[name="data[' + model + '][' + index + ']"]').addClass('error_border');
            $('select[name="data[' + model + '][' + index + ']"]').addClass('error_border');
            $('radio[name="data[' + model + '][' + index + ']"]').addClass('error_border');
        }//
        $scope.validationErrorCreditSetting = function (index, element, model, key) {
            $('input[name="data[' + key + '][' + model + '][' + index + ']"]').addClass('error_border');
        }//
        $scope.validationErrorNew = function (key, element, model, index) {

            $('input[name="data[' + index + '][' + model + '][' + key + ']"]').addClass('error_border');
            $('textarea[name="data[' + index + '][' + model + '][' + key + ']"]').addClass('error_border');
            $('select[name="data[' + index + '][' + model + '][' + key + ']"]').addClass('error_border');
            $('radio[name="data[' + index + '][' + model + '][' + key + ']"]').addClass('error_border');
//            $('radio[name="data[' + key + '][' + model + '][' + index + ']"]').addClass('error_border');
//            $('input[name="data[' + model + ']['+key+'][' + index + ']"]').after('<div class="error-message">' + element + '</div>');
        }//
        $scope.validationErrorNewLicense = function (index, element, model, key) {
            $('input[name="data[' + index + '][' + model + '][' + key + ']"]').addClass('error_border');
            $('textarea[name="data[' + index + '][' + model + '][' + key + ']"]').addClass('error_border');
            $('select[name="data[' + index + '][' + model + '][' + key + ']"]').addClass('error_border');
            $('radio[name="data[' + index + '][' + model + '][' + key + ']"]').addClass('error_border');
//            $('radio[name="data[' + key + '][' + model + '][' + index + ']"]').addClass('error_border');
//            $('input[name="data[' + model + ']['+key+'][' + index + ']"]').after('<div class="error-message">' + element + '</div>');
        }//
        $scope.validationErrorNewForHiring = function (index, element, model, key) {
            $('input[name="data[' + index + '][' + model + '][' + key + ']"]').addClass('error_border');
            $('textarea[name="data[' + index + '][' + model + '][' + key + ']"]').addClass('error_border');
            $('select[name="data[' + index + '][' + model + '][' + key + ']"]').addClass('error_border');
            $('radio[name="data[' + index + '][' + model + '][' + key + ']"]').addClass('error_border');
//            $('input[name="data[' + model + ']['+key+'][' + index + ']"]').after('<div class="error-message">' + element + '</div>');
        }//
        $scope.addTabModule = function (id, url) {
            $http({
                method: "post",
                url: url,
                data: $.param({
                    id: id,
                }),
                headers: {'Content-Type': 'application/x-www-form-urlencoded'}
            }).then(function (response) {
                tempData = $sce.trustAsHtml(response.data);
                $scope.addTabsData = tempData;
                $('#myTabs1 li').removeClass('active');
                $('#' + id).parent().addClass('active');
                $('.selectpicker').selectpicker();
                $('.datepicker1').datetimepicker({
                    format: 'MM/DD/YYYY',
                });
            });
        }//
        $scope.addNote = function (url, form_id, model) {
            $('.error-message').remove();
            var options = {
                url: url,
                dataType: 'json',
                type: 'POST',
                success: function (response) {
                    if (response.status == 'false') {
                        if (response.error) {
                            $.each(response.error, function (index, ele) {
                                if ($.type(ele) == 'object') {
                                    $.each(ele, function (newkey, newval) {
                                        $scope.validationForState(index, newval, newkey, model);
                                    });
                                } else {
                                    $scope.validation(index, ele[0], model);
                                }
                            });
                        }
                    } else {
                        if (form_id == 'addBranch') {
                            $scope.getAllBranches();
                        }
                        $('#' + form_id)[0].reset();
                        $('#showpopup').modal('hide');
                        $scope.refreshAllnotes('Note');
                        $('#notes').parent().addClass('active');
                    }
                }
            }
            $('#' + form_id).ajaxSubmit(options);
            if (form_id == 'updateLicense') {
                $scope.getAllActiveStates();
            }
            $('input').iCheck({
                checkboxClass: 'icheckbox_square-orange',
                radioClass: 'iradio_square-orange',
                increaseArea: '20%' // optional
            });
        }//
        $scope.showLookup = function (url, form_id, showId) {
            var string = $('#' + form_id).serialize();
            var array = string.split("=");
            $http({
                method: "post",
                url: url,
                data: $('#' + form_id).serialize(),
                headers: {'Content-Type': 'application/x-www-form-urlencoded'}
            }).then(function (response) {
                tempData = $sce.trustAsHtml(response.data);
                $scope.showLooks = tempData;
                $scope.branch_id = array[1];
                $('#showpopup').modal('hide');
            }); //

        }//
        $scope.addSpouse = function (id, statusSpouse) {
            if (id == undefined) {
                var url = 'employee/add_spouse/';
            } else {
                var url = 'employee/add_spouse/' + id;
            }
            $http({
                method: "post",
                url: url,
            }).then(function (response) {
                tempData = $sce.trustAsHtml(response.data);
                if (statusSpouse == 'remove') {
                    $scope.addSpouseData = '';
                } else {
                    $scope.addSpouseData = tempData;
                }
                $('#spouseouter').css('display', 'block');
//                $('.spReset').val('');
                $('.selectpicker').selectpicker();
                $('.datepicker1').datetimepicker({
                    format: 'MM/DD/YYYY',
                });
                $('.datepicker2').datetimepicker({
                    format: 'MM/DD/YYYY',
                });
                return false;
            });
        }//
        $scope.addDescription = function (id) {
            var description = $('#popupDesc').val();
            $('.' + id).val(description);
            $('#showpopup').modal('hide');
        }//
        $scope.addCompanyPolicy = function () {
            var description = $('#popupDesc').val();
            var employee_id = $('.employee_id').val();
            $http({
                method: 'post',
                url: 'employee/policy',
                dataType: 'json',
                data: $.param({
                    description: description,
                    employee_id: employee_id,
                }),
                headers: {'Content-Type': 'application/x-www-form-urlencoded'}
            }).then(function (response) {
                if (response.data.status == 'true') {
                    $('#showpopup').modal('hide');
                }

            });
        }//
        $scope.addTerminationPolicy = function () {
            var description = $('#popupDesc').val();
            var employee_id = $('.employee_id').val();
            $http({
                method: 'post',
                url: 'employee/termination_policy',
                dataType: 'json',
                data: $.param({
                    description: description,
                    employee_id: employee_id,
                }),
                headers: {'Content-Type': 'application/x-www-form-urlencoded'}
            }).then(function (response) {
                if (response.data.status == 'true') {
                    $('#showpopup').modal('hide');
                }

            });
        }//
        $scope.addMoreLicence = function () {
            var licenseKey = $('#LicenseValues').val();
            var myEl = angular.element(document.querySelector('.addLicenseMore'));
            $http({
                method: "post",
                url: 'employee/addLicense',
                data: $.param({
                    child: licenseKey
                }),
                headers: {'Content-Type': 'application/x-www-form-urlencoded'}
            }).then(function (response) {
                if (response.data) {
                    $('.table').css('display', 'block');
                    countVal = parseInt(licenseKey) + 1;
                    $('#LicenseValues').val(countVal);
                    tempData = $sce.trustAsHtml(response.data);
                    myEl.append($compile(response.data)($scope));
                    $('.selectpicker').selectpicker();
                    $('.datepicker2').datetimepicker({
                        format: 'MM/DD/YYYY',
                    });
                    $('input').iCheck({
                        checkboxClass: 'icheckbox_square-orange',
                        radioClass: 'iradio_square-orange',
                        increaseArea: '20%' // optional
                    });
                }

            });
        }//
        $scope.deleteLicense = function (event, recId) {
            $http({
                method: 'post',
                url: 'employee/delete_license',
                data: $.param({
                    recId: recId
                }),
                headers: {'Content-Type': 'application/x-www-form-urlencoded'}
            }).then(function (response) {
                if (response.status == 'true') {

                }

            });
            $(event.currentTarget).parent().parent().remove();
        }//
        $scope.addMoreLender = function () {
            var licenseKey = $('#LicenseValues').val();
            var myEl = angular.element(document.querySelector('.addLender'));
            $http({
                method: "post",
                url: 'employee/addLender',
                data: $.param({
                    child: licenseKey
                }),
                headers: {'Content-Type': 'application/x-www-form-urlencoded'}
            }).then(function (response) {
                if (response.data) {
                    $('.table').css('display', 'block');
                    countVal = parseInt(licenseKey) + 1;
                    $('#LicenseValues').val(countVal);
                    tempData = $sce.trustAsHtml(response.data);
                    myEl.append($compile(response.data)($scope));
                    $('.selectpicker').selectpicker();
                    $('.datepicker2').datetimepicker({
                        format: 'MM/DD/YYYY',
                    });
                    $('input').iCheck({
                        checkboxClass: 'icheckbox_square-orange',
                        radioClass: 'iradio_square-orange',
                        increaseArea: '20%' // optional
                    });
                }

            });
        }//
        $scope.deleteLender = function (event, id) {
            $http({
                method: 'post',
                url: 'employee/delete_lender',
                data: $.param({
                    recId: id
                }),
                headers: {'Content-Type': 'application/x-www-form-urlencoded'}
            }).then(function (response) {
                if (response.status == 'true') {

                }

            });
            $(event.currentTarget).parent().parent().remove();
        }
        $scope.addCreditBureaus = function () {
            var licenseKey = $('#LicenseValues').val();
            var myEl = angular.element(document.querySelector('.addCredit'));
            $http({
                method: "post",
                url: 'employee/addCredit',
                data: $.param({
                    child: licenseKey
                }),
                headers: {'Content-Type': 'application/x-www-form-urlencoded'}
            }).then(function (response) {
                if (response.data) {
                    $('.table').css('display', 'block');
                    countVal = parseInt(licenseKey) + 1;
                    $('#LicenseValues').val(countVal);
                    tempData = $sce.trustAsHtml(response.data);
                    myEl.append($compile(response.data)($scope));
                    $('.selectpicker').selectpicker();
                    $('.datepicker2').datetimepicker({
                        format: 'MM/DD/YYYY',
                    });
                    $('input').iCheck({
                        checkboxClass: 'icheckbox_square-orange',
                        radioClass: 'iradio_square-orange',
                        increaseArea: '20%' // optional
                    });
                }

            });
        }//
        $scope.deleteCredit = function (event, id) {
            if (id != undefined) {
                $http({
                    method: 'post',
                    url: 'employee/delete_credit',
                    data: $.param({
                        recId: id
                    }),
                    headers: {'Content-Type': 'application/x-www-form-urlencoded'}
                }).then(function (response) {
                    if (response.status == 'true') {

                    }

                });
            }
            $(event.currentTarget).parent().parent().remove();
        }//
        $scope.deleteCreditSetting = function (event, id) {
            if (id != undefined) {
                $http({
                    method: 'post',
                    url: 'employee/delete_credit_setting',
                    data: $.param({
                        recId: id
                    }),
                    headers: {'Content-Type': 'application/x-www-form-urlencoded'}
                }).then(function (response) {
                    if (response.status == 'true') {

                    }

                });
            }
            $(event.currentTarget).parent().parent().remove();
        }//
        $scope.addLicenseData = function () {
            var options = {
                method: 'post',
                url: 'emplyee/personal_info',
                success: function (response) {

                }
            }
            $('#licenseData').ajaxSubmit(options);
        }//
        $scope.removeSpouse = function (id) {
            if (id == undefined) {
                $scope.addSpouseData = ''; //
            } else {
                $scope.addSpouseData = ''; //
                $http({
                    method: "post",
                    url: 'employee/removeSpouse/' + id,
                    data: $.param({
                        id: id,
                    }),
                    headers: {'Content-Type': 'application/x-www-form-urlencoded'}
                }).then(function (response) {

                });
            }
        }//
        $scope.addcreditSetting = function () {
            var options = {
                url: 'employee/addCreditSetting',
                dataType: 'json',
                type: 'POST',
                success: function (response) {
                    if (response.status == 'false') {
                        if (response.error) {
                            $(response.error).each(function (index, element) {
                                $.each(element, function (key, val) {
                                    if ($.type(val) == 'object') {
                                        $.each(val, function (keys, vals) {
                                            $scope.validationErrorCreditSetting(keys, key, 'EmployeeCreditSetting', key);
                                        });
                                    } else {
                                        $scope.validationErrorCreditSetting(key, key, 'EmployeeCreditSetting', index);
                                    }

                                });
                            });
                        }
                    } else {
                        $('input').removeClass('error_border');
                        $('select').removeClass('error_border');
                        $('file').removeClass('error_border');
                        $('.ResponseDiv').show().fadeOut(3500);
                    }
                },
            }
            $('#creditSetting').ajaxSubmit(options);
        }//
        $scope.employeeByState = function (selectedItem) {
            var myEl = angular.element(document.querySelector('.addEMp'));
            $http({
                method: "post",
                url: 'company/software_licensing/employeeByState/' + selectedItem,
            }).then(function (response) {
                tempData = $sce.trustAsHtml(response.data);
                myEl.html($compile(response.data)($scope));
                $('.selectpicker').selectpicker();
            });
        }
        /* Role Management start */
        $scope.showDiv = function (status) {
            console.log(status);
            if (status == 'hide') {
                $('.newrecords_sec').addClass('show');
            } else {
                $('.newrecords_sec').removeClass('show').addClass('hide');
            }
        }//
        $scope.addUrl = function (child) {
            var myEl = angular.element(document.querySelector('.addUrlHtml'));
            var id = angular.element(document.querySelector('#testestet'));
            var getVal = id.val();
            $http({
                method: "post",
                url: 'role/addUrl',
                data: $.param({
                    child: getVal
                }),
                headers: {'Content-Type': 'application/x-www-form-urlencoded'}
            }).then(function (response) {
                binded = parseInt(getVal) + 1;
                id.val(binded);
                tempData = $sce.trustAsHtml(response.data);
                myEl.append($compile(response.data)($scope));
            });
        }//
        $scope.addRole = function (role_id) {
            if (role_id == undefined) {
                role_id = '';
            }
            $('.error-message').remove();
            var options = {
                url: 'role/new_role/' + role_id,
                dataType: 'json',
                type: 'POST',
                success: function (response) {
                    if (response.status == 'false') {
                        if (response.error) {
                            $.each(response.error, function (index, ele) {
                                $scope.validation(index, ele[0], 'Role');
                            });
                        }
                        $(response.errors).each(function (index, element) {
                            $.each(element, function (key, val) {
                                $scope.validationError(key, val, 'RoleSource', index);
                            });
                        });
                    } else {
                        $('#addRole')[0].reset();
                        $scope.refreshAllroles('Role');
                        // swal('Success', response.message, 'success');
                        $('#showpopup').modal('hide');
                        $scope.refreshTab('Manage Role', 'manage_role', BASE_URL + 'company/role');
                    }

                }
            }
            $('#addRole').ajaxSubmit(options);
        }//
        $scope.showAllRoles = function () {
            $('#test_profile').typeahead({
                prefetch: 'role/all_profiles_json',
            });
        }//
        $scope.check_availabiliy = function (event, availability) {
            var availability = $(event.currentTarget).parent().parent().prev().children().val();
            if (availability == '') {
                return false;
            }
            var text = availability;
            $http({
                method: "post",
                dataType: 'json',
                url: 'role/check_availablity',
                data: $.param({
                    text: text
                }),
                headers: {'Content-Type': 'application/x-www-form-urlencoded'}
            }).then(function (response) {
                if (response.data.status == 'false') {
                    swal('error', 'No availablity', 'error');
                } else {
                    $(event.currentTarget).parent().parent().next().children().children().children().addClass('checked');
//                    swal('Success', 'Available', 'success');
                }

            });
        }//    
        $scope.ShowAllSources = function (last_insert_id) {
            $http({
                method: "post",
                url: 'role/show_sources',
                data: $.param({last_insert_id: last_insert_id}),
            }).then(function (response) {
                tempData = $sce.trustAsHtml(response.data);
                $scope.showRoleSources = tempData;
            });
            console.log(last_insert_id);
        }//
        $scope.saveSource = function (event, Role, status) {
            var id = angular.element(document.querySelector('#testestet'));
            var getVal = id.val();
            var sources = 'source' + getVal;
            var neTest = 'source' + getVal;
            finalVal = $(event.currentTarget).parent().prev().prev().prev().children().val();
            if (finalVal == '') {
                return false;
            }
            htmltt = '<li class="svelink  fixed_width ' + 'source' + getVal + '">' + finalVal + '</li><li class="fxed_txtwidth"><p><input name="data[RoleSource][' + getVal + '][source]" type="hidden" value="' + finalVal + '"> <a href="javascript:void(0)" ng-click="editSource($event,' + "'" + finalVal + "'" + ",'" + neTest + "'" + ')"><img src="' + companyUrl + 'images/edit.png" alt=""/></a></p></li><li><a href="#"><img src="' + companyUrl + 'images/refresh.png" alt=""/> </a> </li><li><a ng-click="updateSource($event,' + "'" + finalVal + "'," + "'" + neTest + "'" + ')" href="javascript:void(0)"><img src="' + companyUrl + 'images/save.png" alt=""/></a></li>';
            // var myEl = angular.element(document.querySelector('.output_dv'));
            $('.output_dv').append($compile(htmltt)($scope));
            $(event.currentTarget).parent().prev().prev().prev().remove();
            $(event.currentTarget).parent().prev().prev().remove();
            $(event.currentTarget).parent().prev().remove();
            $(event.currentTarget).parent().remove();
        }//
        $scope.allActiveRoles = function (id) {
            $http({
                method: "post",
                url: 'role/active_source/' + id,
            }).then(function (response) {
                tempData = $sce.trustAsHtml(response.data);
                $scope.roleSources = tempData;
            });

        }
        $scope.editSource = function (event, test, classChange) {
            var ttt = $(event.currentTarget).parent().parent().prev().html();
            $(event.currentTarget).parent().parent().prev().html('<input class="form-control new ' + classChange + '" type="text" value="' + test + '"/>');
        }//
        $scope.updateSource = function (event, test, classChange) {
            var newobj = $(event.currentTarget).parent().prev().prev().prev().find('.new').val();
            $('.' + classChange).html(newobj);
            $('.' + classChange).val(newobj);
        }
        $scope.editDbSource = function (event, source) {
            $(event.currentTarget).parent().parent().prev().html('<input class="form-control" type="text" value="' + source + '" />');
        }//
        $scope.updateDbSource = function (event, id) {
            var roleSource = $(event.currentTarget).parent().prev().prev().prev().children().val();
            $http({
                method: "post",
                url: 'role/updateRoleSource',
                data: $.param({
                    source: roleSource,
                    id: id,
                }),
                headers: {'Content-Type': 'application/x-www-form-urlencoded'}
            }).then(function (response) {
                $(event.currentTarget).parent().prev().prev().prev().html(roleSource);
            });
        }//
        $scope.refreshAllroles = function (Model) {
            $http({
                method: "post",
                url: 'role/index',
                data: $.param({Model: Model}),
            }).then(function (response) {
                tempData = $sce.trustAsHtml(response.data);
                $scope.showRoleSources = tempData;
            });
        }//
        $scope.refreshAllnotes = function (Model) {
            var employee_id = $('.employee_id').val();
            $http({
                method: "post",
                url: 'employee/notes/' + employee_id,
                data: $.param({Model: Model}),
            }).then(function (response) {
                tempData = $sce.trustAsHtml(response.data);
                $scope.addTabsData = tempData;
            });
        }//
        $scope.changeList = function (userlist) {
            $http({
                method: "post",
                url: 'role/changeUsersList',
                data: $.param({
                    userlist: userlist
                }),
                headers: {'Content-Type': 'application/x-www-form-urlencoded'}
            }).then(function (response) {
                $('.showList').html($compile(response.data)($scope));
            });
        }//
        $scope.assignRole = function (id) {
            var form = $('#' + id).serialize();
            var option = {
                method: 'post',
                url: 'role/assign_role',
                dataType: 'json',
                success: function (response) {
                    if (response.status == 'false') {
                        if (response.message) {
                            $('#select-to').css('border', '2px solid red');
                        }

                    } else {
                        $('#assignrole')[0].reset();
                        swal('Success', response.message, 'success');
                        $('#showpopup').modal('hide');
                    }

                }
            }
            $('#' + id).ajaxSubmit(option);
        }//
        $scope.setPassword = function (id) {
            $('.error-message').remove();
            var options = {
                url: 'employee/set_password/' + id,
                dataType: 'json',
                type: 'POST',
                success: function (response) {
                    if (response.status == 'false') {
                        if (response.error) {
                            $.each(response.error, function (index, ele) {
                                $scope.validation(index, ele[0], 'EmployeeDetail');
                            });
                        }
                    } else {
                        $('#setPassword')[0].reset();
                        swal('Success', response.message, 'success');
                        $('#showpopup').modal('hide');
                    }
                }
            }
            $('#setPassword').ajaxSubmit(options);
        }//
        $scope.actual_set_password = function (id) {
            $http({
                method: "post",
                url: 'employee/actual_set_password/' + id,
                data: "personel_info"
            }).then(function (response) {
                if (response.data.status == 'true') {
                    swal('Success', response.data.message, 'success');
                }
            });
        }//
        $scope.sendMesg = function (id) {
            $('.error-message').remove();
            if (id == undefined) {
                var url = 'employee/send_message/';
            } else {
                var url = 'employee/send_message/' + id;
            }

            var options = {
                url: url,
                dataType: 'json',
                type: 'POST',
                success: function (response) {
                    if (response.status == 'false') {
                        if (response.error) {
                            $.each(response.error, function (index, ele) {
                                $scope.validation(index, ele[0], 'SendMessage');
                            });
                        }
                    } else {
                        $('#sendSystemMesgToEmploee')[0].reset();
                        swal('Success', response.message, 'success');
                        $('#showpopup').modal('hide');
                    }
                }
            }
            $('#sendSystemMesgToEmploee').ajaxSubmit(options);
        }//
        $scope.showHide = function (show, hide) {

            $('.' + show).show();
            $('.' + hide).hide();
            if (show == 'show_credits') {
                $('#admin_tab').parent().addClass('active');
                $('#Humanresourse_tab').parent().removeClass('active');
            }
        }//
        $scope.addCreditBureausSetting = function () {
            var creditval = $('#CreditSettingVal').val();
            var myEl = angular.element(document.querySelector('.addCredit'));
            $('.table').show();
            $http({
                method: "post",
                url: 'employee/addCreditSetting',
                data: $.param({
                    child: creditval
                }),
                headers: {'Content-Type': 'application/x-www-form-urlencoded'}
            }).then(function (response) {
                if (response.data) {
                    count = parseInt(creditval) + 1;
                    $('#CreditSettingVal').val(count);
                    tempData = $sce.trustAsHtml(response.data);
                    myEl.append($compile(response.data)($scope));
                    $('.selectpicker').selectpicker();
                    $('.datepicker2').datetimepicker({
                        format: 'MM/DD/YYYY',
                    });
                    $('input').iCheck({
                        checkboxClass: 'icheckbox_square-orange',
                        radioClass: 'iradio_square-orange',
                        increaseArea: '20%' // optional
                    });
                }

            });
            return false;
        }//
        $scope.getAllEmployees = function () {
            $http({
                method: "post",
                url: 'employee/getAllEmployees',
                headers: {'Content-Type': 'application/x-www-form-urlencoded'}
            }).then(function (response) {
                tempData = $sce.trustAsHtml(response.data);
                $scope.getAllEmployeeData = tempData;
            });
        }//
        $scope.getAllActiveStates = function () {
            $http({
                method: "post",
                url: BASE_URL + 'company/software_licensing/getAllActiveState',
                headers: {'Content-Type': 'application/x-www-form-urlencoded'}
            }).then(function (response) {
                tempData = $sce.trustAsHtml(response.data);
                $scope.getAllActiveState = tempData;
            });
        }//
        $scope.getAllBranches = function () {
            $http({
                method: "post",
                url: BASE_URL + 'company/software_licensing/getAllBranches',
                headers: {'Content-Type': 'application/x-www-form-urlencoded'}
            }).then(function (response) {
                tempData = $sce.trustAsHtml(response.data);
                $scope.getAllBranche = tempData;
            });
        }//
        $scope.addUserLicense = function (id) {
            $('.error-message').remove();
            if (id == '') {
                url = BASE_URL + 'company/employee/add_user_license';
            } else {
                url = BASE_URL + 'company/employee/add_user_license/' + id;
            }
            var options = {
                url: url,
                dataType: 'json',
                type: 'POST',
                success: function (response) {
                    if (response.status == 'true') {
                        $('#showpopup').modal('hide');
                        $('.ResponseDiv').show().fadeOut(3500);
                    } else {
                        $.each(response.error, function (index, ele) {
                            $scope.validation(index, ele[0], 'EmployeeDetail');
                        });
                    }
                }
            }
            $('#addUserLicense').ajaxSubmit(options);
        }//
        $scope.testac = function (test) {
            console.log(test);
        }//
//        setInterval(function () {
//            $scope.messageNotification();
//        }, 10000);
        /* Role Management End */
    }]);
$(document).on('click', '#btn-add', function () {
    $('#select-from option:selected').each(function () {
        $('#select-to').append("<option selected value='" + $(this).val() + "'>" + $(this).text() + "</option>");
        $(this).remove();
    });
}); //
$(document).on('click', '#btn-remove', function () {
    $('#select-to option:selected').each(function () {
        $('#select-from').append("<option value='" + $(this).val() + "'>" + $(this).text() + "</option>");
        $(this).remove();
    });
}); //









