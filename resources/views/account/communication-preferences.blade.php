@extends('layouts.app')

@push('style')
    <link href="{{ asset('css/account.css') }}" rel="stylesheet">
@endpush

@section('content')

    <div class="container" id="main">

       <!--account menu sidebar-->
       @include('layouts.account-sidebar')
       <!-- End account menu sidebar-->

        <div class="my_account  communication_preferences p-0 m-0">
            <div class="hoz_card py-4 ">
                <h5 class="account_section_title">Communication Preferences</h5>
                <div class="communication_preferences_container">
                    <div class="card mt-3 ">
                        <div class="card-header  bg-white" id="headingOne">
                            <div class="card_header_text d-flex align-items-center">
                                Email Subscription
                                <p class="if_no_email_provided"><span class="mx-3">&bull; </span> Email adress not
                                    provided</p>
                            </div>
                            <a href="#0" class="add_email_address_link if_no_email_provided">
                                Add An Email Address
                            </a>
                        </div>
                        <div class="card-body">
                            <div class="custom-control custom-checkbox mr-sm-2 mt-3">
                                <input type="checkbox" class="custom-control-input" id="notif_checkbox" />
                                <label class="custom-control-label product_requirement pl-2" for="notif_checkbox">
                                    Notify me about future promotions, discounts, deals, and rewards.
                                </label>
                            </div>
                            <div class="custom-control custom-checkbox mr-sm-2 mt-3">
                                <input type="checkbox" checked class="custom-control-input" id="notif_checkbox_2" />
                                <label class="custom-control-label product_requirement pl-2" for="notif_checkbox_2">
                                    Only notify me about account management and recovery, order status, <br>
                                    and basic functionalities of the website.
                                </label>
                            </div>
                        </div>
                    </div>
                    <a href="#0" class="btn btn-primary save-btn mt-5 float-right" type="submit">SAVE</a>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>

    </div>

@endsection