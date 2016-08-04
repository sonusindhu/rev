@extends('layouts.app')

@section('content')


<section class="login_frm">

    <div class="container">
        <div class="row">
            <div class="col-md-12 margn ">

                <img src="/developer/images/login_img.png" alt="" class="img-responsive"/>
                <div class="login-dv col-md-7 col-md-offset-3 col-sm-8 col-sm-offset-4">

                    <div class="errorMessages"></div>  
                    <h3>RESET PASSWORD</h3>

                    <form class="form-horizontal" role="form" method="POST" action="<% url('/password/reset') %>">
                        <% csrf_field() %>

                        <input type="hidden" name="token" value="<% $token %>">

                        <div class="form-group<% $errors->has('email') ? ' has-error' : '' %>">
                            <div class="input text">
                                <input readonly="" placeholder="Email" id="email" type="email" class="form-control" name="email" value="<% $email or old('email') %>">

                                @if ($errors->has('email'))
                                <span class="help-block">
                                    <strong><% $errors->first('email') %></strong>
                                </span>
                                @endif
                            </div>
                            <span class="star">*</span>
                        </div>

                        <div class="form-group<% $errors->has('password') ? ' has-error' : '' %>">
                            <div class="input text">
                                <input placeholder="New password" id="password" type="password" class="form-control" name="password">

                                @if ($errors->has('password'))
                                <span class="help-block">
                                    <strong><% $errors->first('password') %></strong>
                                </span>
                                @endif
                            </div>
                            <span class="star">*</span>
                        </div>

                        <div class="form-group<% $errors->has('password_confirmation') ? ' has-error' : '' %>">
                            <div class="input text">
                                <input placeholder="Confirm password" id="password-confirm" type="password" class="form-control" name="password_confirmation">

                                @if ($errors->has('password_confirmation'))
                                <span class="help-block">
                                    <strong><% $errors->first('password_confirmation') %></strong>
                                </span>
                                @endif
                            </div>
                            <span class="star">*</span>
                        </div>

                        <button class="btn btn-default login_btn1" type="submit">RESET PASSWORD</button>
                    </form>

                    <div class="clearfix"></div>


                </div>
                <p>  Don’t have an account ?<a href="<% url('/register') %>"> Create New</a></p>


            </div>

        </div>
    </div>
</section>
<div class="push"></div>
</div> 


@endsection
