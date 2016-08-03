@extends('layouts.app')

@section('content')


<section class="login_frm signupfrm">

    <div class="container">
        <div class="row">
            <div class="col-md-12 margn ">

                <img src="/images/login_img.png" alt="" class="img-responsive"/>
                <div class="login-dv col-md-7 col-md-offset-3 col-sm-8 col-sm-offset-4">
                    <h3>Create an Account<small>Free To Consumers</small></h3>



                    <form class="form-horizontal" role="form" method="POST" action="<% url('/register') %>">
                        <% csrf_field() %>

                        <div class="form-group usr_img <% $errors->has('name') ? ' has-error' : '' %>">
                            <div class="input text">
                                <input id="name" type="text" placeholder="Username" class="form-control" name="name" value="<% old('username') %>">

                                @if ($errors->has('name'))
                                <span class="help-block">
                                    <strong><% $errors->first('usermame') %></strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group<% $errors->has('email') ? ' has-error' : '' %>">

                            <div class="input text">
                                <input id="UserEmail" placeholder="Email" type="email" class="form-control" name="email" value="<% old('email') %>">

                                @if ($errors->has('email'))
                                <span class="help-block">
                                    <strong><% $errors->first('email') %></strong>
                                </span>
                                @endif
                            </div>

                        </div>

                        <div class="form-group<% $errors->has('password') ? ' has-error' : '' %>">
                            <div class="input text">
                                <input id="password" type="password" placeholder="Password" class="form-control" name="password">

                                @if ($errors->has('password'))
                                <span class="help-block">
                                    <strong><% $errors->first('password') %></strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group<% $errors->has('password_confirmation') ? ' has-error' : '' %>">
                            <div class="input text">
                                <input id="password-confirm" type="password" placeholder="Confirm password" class="form-control" name="password_confirmation">

                                @if ($errors->has('password_confirmation'))
                                <span class="help-block">
                                    <strong><% $errors->first('password_confirmation') %></strong>
                                </span>
                                @endif
                            </div>
                        </div>


                        <div class="form-group frm_txt">

                            <p>ReverseAdvisor gives everyone the same features with ability to evalute unlimited scenarios for up to 3 different people, such as a parent, a friend, or yourself. Lenders and financial advisors are offered powerful tools to help individual clients with unlimited profiles and scenarios. Visit  ReverseAdvisorPro.com for all options for retirement planning professionals.</p>

                        </div>
                        <div class="form-group"> 
                            <div class="checkbox this_is_for_term"> <label> 
                                    <input type="checkbox" name='terms' class='terms'>
                                    <span class="forTerms"> I agree to ReverseAdvisor's  </span> 
                                    <span>
                                        <a href="#" data-toggle="modal" data-target="#myModal"> Terms of Service</a>
                                    </span>
                                </label>  
                                
                                @if ($errors->has('terms'))
                                <span class="help-block">
                                    <strong><% $errors->first('terms') %></strong>
                                </span>
                                @endif
                                
                            </div>
                        </div>
                        <button class="btn btn-default" type="submit">Sign Up Free</button>


                </div>
                <div class="clearfix"></div>




                <p >  I already have an account  <a href="<?php echo 'login' ?>"> Login</a></p>
            </div>

        </div>
    </div>
</section>
<div class="push"></div>
</div>

@endsection
