@extends('layouts.app')

<!-- Main Content -->
@section('content')



<section class="login_frm">

    <div class="container">
        <div class="row">
            <div class="col-md-12 margn ">

                <img src="/images/login_img.png" alt="" class="img-responsive"/>
                <div class="login-dv col-md-7 col-md-offset-3 col-sm-8 col-sm-offset-4">
                    <div class="errorMessages"></div>  
                    <h3>Forgot Password</h3>



                    @if (session('status'))
                    <div class="alert alert-success">
                        <% session('status') %>
                    </div>
                    @endif

                    <form class="form-horizontal" role="form" method="POST" action="<% url('/password/email') %>">
                        <% csrf_field() %>
                        <div class="form-group<% $errors->has('email') ? ' has-error' : '' %>">
                            <div class="input text">
                                <input id="email" type="email" class="form-control" name="email" value="<% old('email') %>">
                                @if ($errors->has('email'))
                                <span class="help-block">
                                    <strong><% $errors->first('email') %></strong>
                                </span>
                                @endif
                            </div>
                            <span class="star">*</span>
                        </div>
                        <button class="btn btn-default login_btn1" type="submit">SEND REQUEST</button>


                    </form>



                    <div class="clearfix"></div>


                </div>
                <p>   Already have an account ?<a href="<% url('/login') %>"> Login</a></p>


            </div>

        </div>
    </div>
</section>
<div class="push"></div>
</div> 


@endsection
