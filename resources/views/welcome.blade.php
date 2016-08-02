<!DOCTYPE html>
<html lang="en" ng-app="myApp">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>ReverseAdvisor </title>
        <link rel="shortcut icon" href="favicon.ico" type="image/x-icon" />
           
        <link href="{!! asset('/css/bootstrap.css') !!}" media="all" rel="stylesheet" type="text/css" />
        <link href="{!! asset('/css/style.css') !!}" media="all" rel="stylesheet" type="text/css" />
        <link href="{!! asset('/css/font-awesome.css') !!}" media="all" rel="stylesheet" type="text/css" />
        <link href="{!! asset('/css/square/_all.css') !!}" media="all" rel="stylesheet" type="text/css" />
        <link href="{!! asset('/css/bootstrap-select.css') !!}" media="all" rel="stylesheet" type="text/css" />
        <link href="{!! asset('/css/bootstrap-datetimepicker.css') !!}" media="all" rel="stylesheet" type="text/css" />
        <link href="{!! asset('/css/jquery.bxslider.css') !!}" media="all" rel="stylesheet" type="text/css" />
        <link href="{!! asset('/css/query.mCustomScrollbar.css') !!}" media="all" rel="stylesheet" type="text/css" />
        <link href="{!! asset('/css/sweetalert.css') !!}" media="all" rel="stylesheet" type="text/css" />
        <link href="{!! asset('/css/style_dev_new.css') !!}" media="all" rel="stylesheet" type="text/css" />
      
        
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.11/css/dataTables.bootstrap.min.css">
        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script>
            //var companyUrl = "/";
        </script>

        <?php //echo $this->Html->script(array('jquery.min.js', 'jquery-ui.js', 'bootstrap.js', 'bootstrap-collapse.js', 'icheck.js', 'bootstrap-select.js', 'jquery.bxslider.js', 'sweetalert.min.js', 'jquery.mCustomScrollbar.js', 'moment.js', 'bootstrap-datetimepicker.js', 'jquery.ajax.form.min.js', 'basic.js', 'jquery.mask', 'formatting', 'sidebar_nav.js', 'reverse_main.js')); ?>
        <script src="https://cdn.datatables.net/1.10.11/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.10.11/js/dataTables.bootstrap.min.js"></script>

        <!-- 'company_custom.js', -->
    </head>
    <body ng-controller="dataCtrl" nv-file-drop="" uploader="uploader">
        <div class="Middle_website" ng-controller="empCtrl" >
            <?php //echo $this->element('company_header'); ?>

            <?php //echo $this->element('company_sidebar'); ?>

            <section class="ryt_maindv com_ryt_dv">
                <div class="col-md-12 popbox clearfix" ng-bind-html="">

                </div>
                <div class="col-md-12 spc outer_padding clearfix form_tab" >
                    <tabset>
                        <tab ng-repeat="item in page.data.list" active="activeState[$index]">
                            <tab-heading> {{item.title}}
                                <span class="close_tab">
                                    <img ng-click="delTab($event, $index)"  class="close_shape" alt="" src="images/close_shape.png" tab-name="{{item.name}}">
                                    
                                </span>
                            </tab-heading>
                            <div ng-bind-html="item.content" compile-template></div>
                        </tab>
                    </tabset>
                </div>
            </section>

            <!-- Newrole -->
            <!--        <div class="modal fade {{classpopup}}" id="showpopup" tabindex="-1" role="dialog" addpopup>
                    </div>-->


            <div class="modal fade {{classpopup}}" ng-bind-html="createProfilePopup" id="showpopup" tabindex="-1" role="dialog" addpopup>
            </div>
            <!-- Newrole end -->

        </div>

        <script>
                    $(document).ready(function () {
                        //$('#myTabs').tabCollapse();
                        $(document).ajaxComplete(function (event, request, settings) {
                            $('input').iCheck({
                                checkboxClass: 'icheckbox_square-orange',
                                radioClass: 'iradio_square-orange',
                                increaseArea: '20%' // optional
                            });
                        });

                        $(".flip").click(function () {
                            $(this).next().slideToggle('fast');
                            $(this).next().next().slideToggle('fast');
                            $(this).children(':first').children(':first').toggleClass('fa-minus').toggleClass('fa-plus');
                        });


                    });
        </script>
        <script src="{!! asset('/js/angular.min.js') !!}"></script>
        <script src="{!! asset('/js/angular-file-upload.js') !!}"></script>
        <script src="{!! asset('/js/angular-sanitize.min.js') !!}"></script>
        <script src="{!! asset('/js/ckeditor/ckeditor.js') !!}"></script>
        
        
        <!-- include our JavaScript -->
        <script src="{!! asset('/js/app.js') !!}"></script>
        <script src="{!! asset('/js/role.js') !!}"></script>
        <script src="{!! asset('/js/employee.js') !!}"></script>
        <script src="{!! asset('/js/company_custom.js') !!}"></script>

        
        <style>
            .error-message {
                color: #ff0f14;
                font-size: 14px;
                margin-top: -13px;
                position: absolute;
                top: 50px;
            }
            .error_border{
                border: 1px solid red !important;
            }
            input.ng-invalid-pattern{
                border: 1px solid red !important;
            }
            .portfolioloader {
                background: rgba(255, 255, 255, 0.5) none repeat scroll 0 0;
                border-radius: 50%;
                bottom: 48%;
                height: 94px;
                left: 0;
                margin: 0 auto;
                position: fixed;
                right: 0;
                top: 48%;
                width: 100px;
                z-index: 1000001;
            }

        </style>
        <div class="portfolioloader" style="display: none;"><img src="/img/loaderimage.gif"></div>
        
 <input id="logoutSetting" type="hidden" value="<?php echo @$settingsAre['SuperadminSetting']['logout_time']; ?>"  not_auto_logout_users="<?php echo @$settingsAre['SuperadminSetting']['not_auto_logout_users'] ?>"/>
        <script src="https://code.highcharts.com/highcharts.js"></script>
        <script src="https://code.highcharts.com/modules/exporting.js"></script>

    </body>
</html>
