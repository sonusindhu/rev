myApp.controller('empCtrl', ['$scope', '$http', '$sce', '$compile', function ($scope, $http, $sce, $compile) {
        $scope.employee_id = 0;
        $http({
            method: "post",
            url: 'employee/personel_info',
            data: "personel_info"
        }).then(function (response) {
            tempData = $sce.trustAsHtml(response.data);
            $scope.addTabsData = tempData;
        });//
        $scope.addTab = function (ids, url, type) {
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
            });
        }//
        $scope.AddEmployee = function () {
            $('.error-message').remove();
            var options = {
                url: 'employee/personel_info',
                dataType: 'json',
                type: 'POST',
                success: function (response) {
                    if (response.status == 'error') {
                        if (response.error) {
                            $.each(response.error, function (index, ele) {
                                $scope.validation(index, ele[0], 'EmployeeDetail');
                            });
                        }
                        $(response.errorChild).each(function (index, element) {
                            $.each(element, function (key, val) {
                                $scope.validationError(key, val, 'EmployeeChildren', index);
                            });
                        });
                        $(response.errorChild).each(function (index, element) {
                            $.each(element, function (key, val) {
                                $scope.validationError(key, val, 'EmployeeCertification', index);
                            });
                        });
                    } else {
                        if (response.employee_id) {
                            $scope.employee_id = response.employee_id;
                        }
                        swal('Success', response.message, 'success');
                    }
                }
            }
            $('#idforForm').ajaxSubmit(options);

        }//
        $scope.addChild = function (Employee) {
            var myEl = angular.element(document.querySelector('.childrn_sec'));
            $http({
                method: "post",
                url: 'employee/addChild',
                data: $.param({
                    child: Employee
                }),
                headers: {'Content-Type': 'application/x-www-form-urlencoded'}
            }).then(function (response) {
                $scope.Employee = parseInt(Employee) + 1;
                tempData = $sce.trustAsHtml(response.data);
                myEl.append($compile(response.data)($scope));
                $('.selectpicker').selectpicker();
                $('.datepicker2').datetimepicker({
                    format: 'DD/MM/YYYY',
                });
            });
        }//
        $scope.deleteChild = function (id) {
            var myEl = angular.element(document.querySelector('#' + id));
            myEl.parent().parent().remove();
        }//
        $scope.addCertificate = function (certificate) {
            var myEl = angular.element(document.querySelector('.addCerti'));
            $http({
                method: 'post',
                url: 'employee/add_certificate',
                data: $.param({
                    certificate: certificate
                }),
                headers: {'Content-Type': 'application/x-www-form-urlencoded'}
            }).then(function (response) {
                CertiVal = parseInt(certificate) + 1;
                $scope.certificate = CertiVal;
                tempData = $sce.trustAsHtml(response.data);
                $('.datepicker3').datetimepicker({
                    format: 'DD/MM/YYYY',
                });
                myEl.append($compile(response.data)($scope));
            });
        }//
        $scope.deleteCerti = function (id) {
            var myEl = angular.element(document.querySelector('#' + id));
            myEl.parent().parent().remove();
        }//
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
            $('input[name="data[' + model + '][' + index + ']"]').addClass('error_border');
            $('textarea[name="data[' + model + '][' + index + ']"]').addClass('error_border');
            $('select[name="data[' + model + '][' + index + ']"]').addClass('error_border');
//            $('input[name="data[' + model + '][' + index + ']"]').after('<div class="error-message">' + element + '</div>');
        }//
        $scope.validationError = function (index, element, model, key) {
            $('input[name="data[' + model + '][' + key + '][' + index + ']"]').addClass('error_border');
            $('textarea[name="data[' + model + '][' + index + ']"]').addClass('error_border');
            $('select[name="data[' + model + '][' + index + ']"]').addClass('error_border');
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
                $('.selectpicker').selectpicker();
                $('.datepicker5').datetimepicker({
                    format: 'DD/MM/YYYY',
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
                                $scope.validation(index, ele[0], model);
                            });
                        }
                    } else {
                        $('#' + form_id)[0].reset();
                        swal('Success', response.message, 'success');
                        $('#showpopup').modal('hide');
                    }
                }
            }
            $('#' + form_id).ajaxSubmit(options);
            $('input').iCheck({
                checkboxClass: 'icheckbox_square-orange',
                radioClass: 'iradio_square-orange',
                increaseArea: '20%' // optional
            });
        }//





    }]);