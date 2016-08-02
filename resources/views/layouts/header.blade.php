
@if(Auth::check())

<section class="hdr navbar-fixed-top">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="col-xs-12 col-sm-5 col-md-5 hdr_logo ">
                    <a href="/"><img src="/images/club-vouchers-logo.png" alt="logo"/></a>
                </div>
                <div class="col-xs-12 col-sm-7 col-md-7 pull-right hdr_ryt-bx">
                    <p>Hello&nbsp;:&nbsp;<b>{{Auth::user()->firstname}}</b></p>
                    <ul>
                        <li><a href="/contact">Contact Us</a></li>
                        <li><a href="/logout">Sign Out</a></li>
                    </ul>


                </div>
            </div>
        </div>
    </div>
</section>

@else


<section class="hdr navbar-fixed-top">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="col-xs-12 col-sm-5 col-md-5 hdr_logo ">
                    <a href="/"><img src="images/club-vouchers-logo.png" alt="logo"/></a>
                </div>
                <div class="col-xs-12 col-sm-7 col-md-7 pull-right hdr_ryt-bx">
                    <p>Hello&nbsp;:&nbsp;<b>Sign in</b></p>
                    <ul>
                        <li><a href="/signup">Sign Up</a></li>
                        <li><a href="/login">Sign in</a></li>
                        <li><a href="/business">Business</a></li>
                        <li><a href="/contact">Contact Us</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

@endif

<section class="club_navigation_bar theme-showcase">
    <div class="container">
        <div class="row">
            <div class="col-md-12">

                <nav class="navbar navbar-default">
                    <div class="container-fluid ">
                        <!-- Brand and toggle get grouped for better mobile display -->
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>

                        </div>

                        <!-- Collect the nav links, forms, and other content for toggling -->
                        <div class="collapse navbar-collapse spc" id="bs-example-navbar-collapse-1">
                            <div class="col-xs-12 col-sm-8 col-md-8 pdn">
                                <ul class="nav navbar-nav">
                                    <li class="active"><a href="/">Home <span class="sr-only">(current)</span></a></li>
                                    <li class="dropdown" >
                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">eVouchers<span class="caret"></span></a>
                                        <ul class="dropdown-menu" role="menu">
                                            <li><a href="/vouchers">All Vouchers</a></li>
                                            <li><a href="/deals">Deal vouchers</a></li>
                                            <li><a href="/gift">Gift Vouchers</a></li>
                                            <li><a href="/discount">Discount vouchers</a></li>
                                            <li><a href="/offers">Offer Vouchers</a></li>
                                            <li><a href="/groups">Group Discount</a></li>

                                        </ul>
                                    </li>
                                    <li class="dropdown" >
                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Location<span class="caret"></span></a>
                                        <ul class="dropdown-menu" role="menu">
                                            <li><a href="#">Chandigarh</a></li>
                                            <li><a href="#">Mohali</a></li>
                                            <li><a href="#">Dehradoon</a></li>
                                            <li><a href="#">Bengaluru</a></li>
                                        </ul>
                                    </li>
                                    <li class="dropdown">
                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Categories<span class="caret"></span></a>
                                        <ul class="dropdown-menu" role="menu">
                                            <li><a href="#">Food & Drink</a></li>
                                            <li><a href="#">Health & Beauty</a></li>
                                            <li><a href="#">Hotels & Holidays</a></li>
                                            <li><a href="#">Occasions</a></li>
                                            <li><a href="#">General Interest</a></li>
                                        </ul>
                                    </li>
                                    <li class="dropdown">
                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Find out<span class="caret"></span></a>
                                        <ul class="dropdown-menu" role="menu">
                                            <li><a href="/about">About Club Vouchers</a></li>
                                            <li><a href="/vouchertypes">Vouchers Types</a></li>
                                            <li class="divider"></li>
                                            <li><a href="/business">For Businesses</a></li>
                                            <li class="divider"></li>
                                            <li><a href="/privacy">Privacy & Security</a></li>
                                            <li><a href="/redemption">Redemption</a></li>
                                            <li><a href="/refund">Refund policy</a></li>



                                        </ul>
                                    </li>
                                </ul>
                                <div class="clearfix"></div>
                            </div>
                            <div class="col-xs-12 col-sm-4 col-md-4 pdn">

                                <form class="navbar-form navbar-left pull-right pdn" role="search">
                                    <div class="input-group">
                                        <input type="text" placeholder="Search Vouchers" class="form-control">
                                        <span class="input-group-btn">
                                            <button type="button" class="btn btn-default"><img src="images/search-20.png" alt="search icon"/></button>
                                        </span>
                                    </div>
                                    <div class="clearfix"></div>
                                </form>
                                <div class="clearfix"></div>
                            </div>
                        </div><!-- /.navbar-collapse -->
                    </div><!-- /.container-fluid -->
                </nav>




            </div>
        </div>
    </div>
</section>


