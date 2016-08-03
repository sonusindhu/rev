<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <title>ReverseAdvisor</title>
        <link rel="shortcut icon" href="favicon.ico" type="image/x-icon" />

        <!-- Bootstrap -->

        <link href="{!! asset('/css/bootstrap.css') !!}" media="all" rel="stylesheet" type="text/css" />
        <link href="{!! asset('/css/style.css') !!}" media="all" rel="stylesheet" type="text/css" />
        <link href="{!! asset('/css/font-awesome.css') !!}" media="all" rel="stylesheet" type="text/css" />
        <link href="{!! asset('/css/square/_all.css') !!}" media="all" rel="stylesheet" type="text/css" />
        <link href="{!! asset('/css/sweetalert.css') !!}" media="all" rel="stylesheet" type="text/css" />

        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body>
        <div class="wrapper">
            <section class="hdr res_padd">
                <div class="container_fluid">
                    <div class="">
                        <div class="col-md-12 ">
                            <div class="col-md-4 col-sm-4  col-xs-6 logo_new  spc">
                                <a href="">

                                    <img src="{!! asset('/images/logo_1.png') !!}" alt="Logo" />
                                </a>
                            </div>
                            <div class="col-md-6 col-sm-6 col-xs-6 ryt_btns spc">
                                <ul>
                                    <li><a href="/login">Login</a> </li>
                                    <li><a href="/signup">Sign Up</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <section class="login_frm">


                @yield('content')
                
                
            </section>

        </div>

        <section class=" ftr footer">
            <p>Copyright ReverseAdvisor.com</p>
        </section>



        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

        <?php //echo $this->element('front_validate'); ?>

        <script src="{!! asset('/js/bootstrap.js') !!}"></script>
        <script src="{!! asset('/js/icheck.js') !!}"></script>
        <script src="{!! asset('/js/sweetalert.min.js') !!}"></script>
        <script src="{!! asset('/js/basic.js') !!}"></script>

        <script>
                    function setCookie(cname, cvalue) {
                        var exdays = 30;
                        var d = new Date();
                        d.setTime(d.getTime() + (exdays * 24 * 60 * 60 * 1000));
                        var expires = "expires=" + d.toUTCString();
                        document.cookie = cname + "=" + cvalue + "; " + expires;
                    }
            $(document).ready(function () {

                // cookie create and get
                $('.terms').on('click', function () {
                    alert("1");
                    var check = $(this).is(':checked');
                    if (check == true) {
                        $(this).val(1);
                    } else {
                        $(this).val(0);
                    }
                });
            });
        </script>
        <script>
            $(document).ready(function () {
                $('input').iCheck({
                    checkboxClass: 'icheckbox_square-orange',
                    radioClass: 'iradio_square-orange',
                    increaseArea: '20%' // optional
                });

                // 
                $("body").on('click', '#email', function () {
                    var a = $(this).next().children();
                    $(a).addClass('addone');
                });
                $("body").on('click', '#password', function () {
                    var a = $(this).next().children();
                    $(a).addClass('addone');
                });


                /*$( ".login-dv" ).mouseout(function() {
                 alert('a');
                 });*/
                // Document Ready closed
            });
        </script>

    </body>
</html>