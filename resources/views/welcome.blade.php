<!DOCTYPE html>
<html lang="en" ng-app="myApp">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>ReverseAdvisor</title>
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
            var companyUrl = "{!! asset('/') !!}";
        </script>

        
        <script src="{!! asset('/js/jquery.min.js') !!}"></script>
        <script src="{!! asset('/js/jquery-ui.js') !!}"></script>
        <script src="{!! asset('/js/bootstrap.js') !!}"></script>
        <script src="{!! asset('/js/bootstrap-collapse.js') !!}"></script>
        <script src="{!! asset('/js/icheck.js') !!}"></script>
        <script src="{!! asset('/js/bootstrap-select.js') !!}"></script>
        <script src="{!! asset('/js/jquery.bxslider.js') !!}"></script>
        <script src="{!! asset('/js/sweetalert.min.js') !!}"></script>
        <script src="{!! asset('/js/jquery.mCustomScrollbar.js') !!}"></script>
        <script src="{!! asset('/js/moment.js') !!}"></script>
        <script src="{!! asset('/js/bootstrap-datetimepicker.js') !!}"></script>
        <script src="{!! asset('/js/jquery.ajax.form.min.js') !!}"></script>
        <script src="{!! asset('/js/basic.js') !!}"></script>
        <script src="{!! asset('/js/jquery.mask.js') !!}"></script>
        <script src="{!! asset('/js/formatting.js') !!}"></script>
        <script src="{!! asset('/js/sidebar_nav.js') !!}"></script>
        <script src="{!! asset('/js/reverse_main.js') !!}"></script>
        
        
        
        <script src="https://cdn.datatables.net/1.10.11/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.10.11/js/dataTables.bootstrap.min.js"></script>

        <!-- 'company_custom.js', -->
    </head>
    <body ng-controller="dataCtrl" nv-file-drop="" uploader="uploader">
        <div class="Middle_website" ng-controller="empCtrl" >
            
            @include('layouts/cheader'); <!-- app/views/angular-stuff.php -->
            @include('layouts/csidebar'); <!-- app/views/angular-stuff.php -->

            


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
        
        
        @include('layouts/cfooter'); <!-- app/views/angular-stuff.php -->

        
