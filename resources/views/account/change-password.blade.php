@extends('layouts.app')

@push('style')
    <link href="{{ asset('css/account.css') }}" rel="stylesheet">
@endpush

@section('content')

    <div class="container" id="main">

       <!--account menu sidebar-->
       @include('layouts.account-sidebar')
       <!-- End account menu sidebar-->

        <div class="my_account change_your_password p-0 m-0">
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            <div class="hoz_card py-4 ">
                <h5 class="account_section_title">Change Your Password</h5>
                <div class="change_your_password_form_container">
                    <form action="{{Route('account-change-password')}}" method="post">
                        @csrf
                        <div class="form-row">
                            <div class="col-md-6 mb-3">
                                <label for="current-password">Current Password</label>
                                <input type="password" class="form-control " id="current-password"
                                       name="current-password" value="" required>
                                @if ($errors->has('current-password'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('current-password') }}</strong>
                                    </span>
                                @endif
                                @if (session('error'))
                                    <div class="invalid-feedback">
                                        {{ session('error') }}
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="form-row mt-3">
                            <div class="col-md-6 mb-3">
                                <label for="new-password">New Password</label>
                                <input id="new-password" type="password" class="form-control"
                                       name="new-password" value="">
                                <span toggle="#new-password"
                                      class="fa fa-fw fa-eye field-icon toggle-password"></span>

                                @if ($errors->has('new-password'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('new-password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-row mt-3">
                            <div class="col-md-6 mb-3">
                                <label for="new-password-confirm">Confirm New Password</label>
                                <input id="new-password-confirm" type="password" class="form-control"
                                       name="new-password_confirmation" value="">
                                <span toggle="#new-password-confirm"
                                      class="fa fa-fw fa-eye field-icon toggle-password"></span>
                            </div>
                        </div>
                        <a href="#0" class="forget_password_link">Forgot your password?</a>
                        <button class="btn btn-primary mt-5 float-right" data-toggle="modal"
                                data-target="#exampleModalCenter" type="submit">SAVE</button>
                        <div class="clearfix"></div>
                    </form>
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
    </script>
@endpush