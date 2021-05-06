@extends('layouts.app')
@push('style')
    <link href="{{ asset('css/SignInUp.css') }}" rel="stylesheet">
@endpush
@section('content')
{{--<div class="container">--}}
    {{--<div class="row justify-content-center">--}}
        {{--<div class="col-md-8">--}}
            {{--<div class="card">--}}
                {{--<div class="card-header">{{ __('Login') }}</div>--}}

                {{--<div class="card-body">--}}
                    {{--<form method="POST" action="{{ route('login') }}">--}}
                        {{--@csrf--}}

                        {{--<div class="form-group row">--}}
                            {{--<label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>--}}

                            {{--<div class="col-md-6">--}}
                                {{--<input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>--}}

                                {{--@error('email')--}}
                                    {{--<span class="invalid-feedback" role="alert">--}}
                                        {{--<strong>{{ $message }}</strong>--}}
                                    {{--</span>--}}
                                {{--@enderror--}}
                            {{--</div>--}}
                        {{--</div>--}}

                        {{--<div class="form-group row">--}}
                            {{--<label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>--}}

                            {{--<div class="col-md-6">--}}
                                {{--<input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">--}}

                                {{--@error('password')--}}
                                    {{--<span class="invalid-feedback" role="alert">--}}
                                        {{--<strong>{{ $message }}</strong>--}}
                                    {{--</span>--}}
                                {{--@enderror--}}
                            {{--</div>--}}
                        {{--</div>--}}

                        {{--<div class="form-group row">--}}
                            {{--<div class="col-md-6 offset-md-4">--}}
                                {{--<div class="form-check">--}}
                                    {{--<input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>--}}

                                    {{--<label class="form-check-label" for="remember">--}}
                                        {{--{{ __('Remember Me') }}--}}
                                    {{--</label>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                        {{--</div>--}}

                        {{--<div class="form-group row mb-0">--}}
                            {{--<div class="col-md-8 offset-md-4">--}}
                                {{--<button type="submit" class="btn btn-primary">--}}
                                    {{--{{ __('Login') }}--}}
                                {{--</button>--}}

                                {{--@if (Route::has('password.request'))--}}
                                    {{--<a class="btn btn-link" href="{{ route('password.request') }}">--}}
                                        {{--{{ __('Forgot Your Password?') }}--}}
                                    {{--</a>--}}
                                {{--@endif--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</form>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}
{{--</div>--}}


<div class="container signinup_page" id="main">
    <div class="hoz_card">
        <div class="lefty_container">
            <div class="content sign-in-lefty">
                <h5>Sign in</h5>
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="form-group">
                        {{--<input type="email" class="form-control" name="email" id="emailInput"--}}
                               {{--aria-describedby="emailHelp" placeholder="Email Address">--}}

                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}"
                               required
                               autocomplete="email"
                               autofocus
                               aria-describedby="emailHelp"
                               placeholder="Email Address" >

                        @error('email')
                        <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                        </span>
                        @enderror

                    </div>
                    <div class="form-group mt-4">
                        {{--<input id="password-field" type="password" class="form-control" name="password"--}}
                               {{--placeholder="Password">--}}
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password"
                               required
                               autocomplete="current-password"
                               placeholder="Password" >
                        @error('password')
                        <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                        </span>
                        @enderror

                        <span toggle="#password" class="fa fa-fw fa-eye field-icon toggle-password"></span>

                    </div>
                    <a href="#0" data-toggle="modal" data-target="#forgotPasswordModal"
                       class="forgot-password-link">Forgot Password?</a>
                    <div class="clearfix"></div>

                    <input type="submit" value="Sign In" class="btn sign-up-btn d-block w-100">
                </form>
                <p class="my-4 text-center">Or Connect Using</p>
                <div class="social-login-buttons">
                    <a href="#0" class="btn facebook-btn">
                        <i class="fa fa-facebook mr-1" aria-hidden="true"></i>
                        Facebook</a>
                    <a href="#0" class="btn google-btn">
                        <i class="fa fa-google mr-1" aria-hidden="true"></i>
                        Google</a>
                </div>
            </div>
            <div class="content sign-up-lefty">
                <h5>Sign Up</h5>
                <form method="POST" action="{{ Route('register') }}">
                    @csrf
                    <div class="form-group">
                        <div class="row">
                            <div class="col-6">
                                <input type="text" class="form-control" name="first_name" id="firstnameInput"
                                aria-describedby="firstnameHelp" placeholder="First Name">
                                @error('first_name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror                           </div>
                            <div class="col-6">
                                <input type="text" class="form-control" name="last_name" id="lastnameInput"
                                aria-describedby="lastnameHelp" placeholder="Last Name">
                                @error('last_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                            </div>
                        </div>

                    </div>
                    <div class="form-group">
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                             name="email" value="{{ old('email') }}"
                             required autocomplete="email" placeholder="Email Address">
                            @error('email')
                               <span class="invalid-feedback" role="alert">
                                   <strong>{{ $message }}</strong>
                               </span>
                           @enderror
                    </div>
                    <div class="form-group mt-4">
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                               name="password"
                               required autocomplete="new-password" placeholder="Password">
                               @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                               @enderror
                        <span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span>

                    </div>
                    <div class="form-group">
                        <input placeholder="Confirm password" id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" name="phone_number" id="phoneInput"
                               aria-describedby="phonenumberHelp" value="+212 " placeholder="Phone Number">
                        @error('phone_number')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror

                    </div>
                    <a href="#0" data-toggle="modal" data-target="#forgotPasswordModal"
                       class="forgot-password-link">Forgot Password?</a>
                    <div class="clearfix"></div>
                    <input type="submit" value="Sign Up" class="btn sign-up-btn d-block">
                </form>
                <p class="my-4 text-center">Or Connect Using</p>
                <div class="social-login-buttons">
                    <a href="#0" class="btn facebook-btn">
                        <i class="fa fa-facebook mr-1" aria-hidden="true"></i>
                        Facebook</a>
                    <a href="#0" class="btn google-btn">
                        <i class="fa fa-google mr-1" aria-hidden="true"></i>
                        Google</a>
                </div>
            </div>
        </div>
        <div class="righty_container sign-in-righty">
            <div class="content">
                <h5>New Customer?</h5>
                <p>Welcome to HOZ! You can create your account today and start shopping for your next digital lock,
                    door, gate and accessories right away!</p>
                <a href="#0" class="btn sign-up-btn switcher">
                    Sign Up
                </a>
            </div>
        </div>
        <div class="righty_container sign-up-righty">
            <div class="content">
                <h5>Already Signed Up?</h5>
                <p>If you're already signed up, you can access you account by clicking below. </p>
                <a href="#0" class="btn sign-up-btn switcher">
                    Sign In
                </a>
            </div>
        </div>
    </div>
</div>



<!-- Modal -->
<div class="modal fade confirmation_modal forgot_password_modal" id="forgotPasswordModal" tabindex="-1"
     role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Forgot Your Password?</h5>
            </div>
            <div class="modal-body">
                Enter your email address and we'll send you <br>
                a link to reset your password.
                <form action="#0">
                    <div class="form-group">
                        <input type="email" class="form-control" name="email" id="emailInputReset"
                               aria-describedby="emailHelp" placeholder="Email Address">

                    </div>
                </form>

            </div>
            <div class="modal-footer">
                <a href="#0" class="btn btn-exit" data-dismiss="modal">Cancel</a>
                <a href="#0" class="btn btn-resit " data-toggle="modal"
                   data-target="#forgotPasswordConfirmationModal">Reset</a>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade confirmation_modal forgot_password_confirmation_modal" id="forgotPasswordConfirmationModal"
     tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Password Recovery?</h5>
            </div>
            <div class="modal-body">
                Instructions have been sent to <b class="password_email">email@email.com</b> . <br>
                Please, check your email.
            </div>
            <div class="modal-footer">
                <a href="#0" class="btn btn-exit w-100" data-dismiss="modal">Close</a>
            </div>
        </div>
    </div>
</div>


@endsection
@push('script')

    <script>

        $(".toggle-password").click(function () {

            $(this).toggleClass("fa-eye fa-eye-slash clicked");
            var input = $($(this).attr("toggle"));
            if (input.attr("type") == "password") {
                input.attr("type", "text");
            } else {
                input.attr("type", "password");
            }
        });

        $(".switcher").click(function () {
            $('.sign-up-lefty').toggleClass("show");
            $('.sign-in-lefty').toggleClass("hide");
            $('.sign-up-righty').toggleClass("show");
            $('.sign-in-righty').toggleClass("hide");

        })
    </script>
@endpush
