@extends('layouts.app')

@section('content')
>




<section class="login_frm">

    <div class="container">
        <div class="row">
            <div class="col-md-12 margn ">

                <img src="/developer/images/login_img.png" alt="" class="img-responsive"/>
                <div class="login-dv col-md-7 col-md-offset-3 col-sm-8 col-sm-offset-4">

                    <div class="errorMessages"></div>  
                    <h3>LOGIN</h3>

                    <form class="form-horizontal" role="form" method="POST" action="<% url('/login') %>">
                        <% csrf_field() %>

                        <div class="form-group<% $errors->has('email') ? ' has-error' : '' %>">

                            <div class="input text">
                                <input id="UserEmail1" placeholder="Email" type="email" class="form-control" name="email" value="<% old('email') %>">

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
                                <input id="password" placeholder="Password" type="password" class="form-control" name="password">

                                @if ($errors->has('password'))
                                <span class="help-block">
                                    <strong><% $errors->first('password') %></strong>
                                </span>
                                @endif
                            </div>
                            <span class="star">*</span>

                        </div>


                        <div class="form-group"> 
                            <div class="checkbox"> <label> 
                                    <input type="checkbox" class="terms" name="remember" >
                                    Remember me
                                </label>     
                                <span>
                                    <a href="<% url('/password/reset') %>">
                                        Forgot Password ?</a>
                                </span>
                            </div>
                        </div>
                        <button class="btn btn-default login_btn1" type="submit">LOGIN</button>

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
