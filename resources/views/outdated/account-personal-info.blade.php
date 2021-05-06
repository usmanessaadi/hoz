@extends('layouts.app')

@push('style')
    <link href="{{ asset('css/account.css') }}" rel="stylesheet">
@endpush

@section('content')
    <div class="container" id="main">

        <!--account menu sidebar-->
        @include('layouts.account-sidebar')
        <!-- End account menu sidebar-->

        <div class="my_account account_personal_information p-0 m-0">
            <div class="hoz_card py-4 ">
                <h5 class="account_section_title">Personal Information</h5>
                <div class="personal_information_form_container">
                    <form action="{{Route('update-personal-info')}}" method="post">
                        @csrf
                        <div class="form-row">
                            <div class="col-md-6 mb-3">
                                <label for="first_name">First Name</label>
                                <input type="text" class="form-control Dis-valid" id="first_name"
                                       placeholder="First name" name="first_name" value="{{Auth::user()->first_name}}" required>
                                <div class="valid-feedback">
                                    Looks good!
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="last_name">Family Name</label>
                                <input type="text" class="form-control Dis-valid" id="last_name"
                                       placeholder="Last name" name="last_name" value="{{Auth::user()->last_name}}" required>

                            </div>
                        </div>
                        <div class="form-row mt-3">
                            <div class="col-md-6 mb-3">
                                <label for="email">Email Address</label>
                                <input type="email" class="form-control Dis-invalid" id="email"
                                       placeholder="Email Address" value="{{Auth::user()->email}}" name="email" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="phone_number">Mobile Phone Number</label>
                                <input type="text" class="form-control Dis-invalid" id="phone_number"
                                       placeholder="Mobile Phone Number" name="phone_number" value="{{Auth::user()->phone_number}}" required>

                            </div>
                        </div>

                        <div class="social_media_links">
                            <div class="so_link">
                                <div class="title">
                                    <img src="{{asset('/assets/logos/facebook.png')}}" alt="facebook logo">
                                    Facebook account
                                </div>
                                <a href="#0" class="disabled">Linked</a>
                            </div>
                            <div class="line"></div>
                            <div class="so_link">
                                <div class="title">
                                    <img src="{{asset('/assets/logos/google.png')}}" alt="google logo">
                                    Google account
                                </div>
                                <a href="#0">Link</a>
                            </div>
                        </div>
                        <button class="btn btn-primary mt-5 float-right" type="submit">SAVE</button>
                        <div class="clearfix"></div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection