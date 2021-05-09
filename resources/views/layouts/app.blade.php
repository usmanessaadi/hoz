<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'HOZ') }}</title>

    <!-- Scripts -->
    {{--<script src="{{ asset('js/app.js') }}" defer></script>--}}

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"
            integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <!-- Styles -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
          integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous" />
    <script src="https://kit.fontawesome.com/226435baa8.js" crossorigin="anonymous"></script>
    {{--<link href="{{ asset('css/app.css') }}" rel="stylesheet">--}}
    <link href="{{ asset('css/main.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    {{--<link href="{{ asset('css/account.css') }}" rel="stylesheet">--}}
    <style>
        .def-href{
            color: inherit;text-decoration: inherit;display: flex;
        }
        .prd-page-select{
            border: 2px solid #0e95ff;
        }
        .img-card-prd{
         height: 120px;
         object-fit: cover;
        }
        .img-card-order{
            height: 50px;
           object-fit: contain;
        }
        .back-to-shop-btn{
            width: 40%;
         margin: 50px auto;
        }
    </style>
    @stack('style')

</head>
<body>
    <div id="app">
        <header class="sticky-top">
            <nav class="navbar navbar-expand-lg navbar-light bg-white main-nav">
                <div class="container relative-container">
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <a class="navbar-brand" href="{{Route('home-page')}}">
                        <svg xmlns="http://www.w3.org/2000/svg" width="130.5" height="41.007" viewBox="0 0 130.5 41.007">
                            <path
                                    d="M1094.686,78.992c-.128,0-.342.086-.641.128s-.726.128-1.239.214v22.43c.513.085.94.171,1.239.213s.513.128.641.128a1.529,1.529,0,0,1,.256.042,1.228,1.228,0,0,1,1.068,1.325v2.521h-12.219v-2.521a1.227,1.227,0,0,1,1.068-1.325.757.757,0,0,0,.256-.042,3.966,3.966,0,0,1,.641-.128c.3-.043.726-.128,1.239-.213V92.493h-14.483v9.271c.513.085.982.171,1.282.213s.513.128.641.128a.756.756,0,0,0,.256.042,1.227,1.227,0,0,1,1.068,1.325v2.521H1063.5v-2.521a1.227,1.227,0,0,1,1.068-1.325,1.522,1.522,0,0,1,.256-.042c.128,0,.342-.086.641-.128s.769-.128,1.281-.213V79.334c-.513-.086-.983-.172-1.281-.214s-.513-.128-.641-.128a.755.755,0,0,0-.256-.042,1.227,1.227,0,0,1-1.068-1.325v-2.52h12.261v2.52a1.227,1.227,0,0,1-1.068,1.325.756.756,0,0,0-.256.042c-.128,0-.342.086-.641.128s-.769.128-1.282.214v9.057H1087V79.334c-.513-.086-.94-.172-1.239-.214a4.035,4.035,0,0,1-.641-.128,1.531,1.531,0,0,1-.256-.042,1.228,1.228,0,0,1-1.068-1.325v-2.52h12.219v2.52a1.228,1.228,0,0,1-1.068,1.325,1.528,1.528,0,0,1-.256.042"
                                    transform="translate(-1020.369 -70.045)" />
                            <path
                                    d="M1149.174,96.61a15.111,15.111,0,0,1-3.162,5,14.186,14.186,0,0,1-4.956,3.289,16.888,16.888,0,0,1-6.365,1.2,17.12,17.12,0,0,1-6.409-1.2,14.187,14.187,0,0,1-4.956-3.289,15.206,15.206,0,0,1-3.2-5,16.974,16.974,0,0,1-1.11-6.323,16.752,16.752,0,0,1,1.11-6.28,15.2,15.2,0,0,1,3.2-5,14.18,14.18,0,0,1,4.956-3.29,17.12,17.12,0,0,1,6.409-1.2,16.1,16.1,0,0,1,6.365,1.2,14.794,14.794,0,0,1,4.956,3.29,15.108,15.108,0,0,1,3.162,5,16.751,16.751,0,0,1,1.153,6.28,16.973,16.973,0,0,1-1.153,6.323m-5.426-10.851a8.907,8.907,0,0,0-1.923-3.417,8.773,8.773,0,0,0-3.076-2.179,10.249,10.249,0,0,0-4.059-.726,10.46,10.46,0,0,0-4.1.726,8.766,8.766,0,0,0-3.076,2.179,9.562,9.562,0,0,0-1.966,3.417,13.636,13.636,0,0,0-.683,4.529,13.9,13.9,0,0,0,.683,4.572,9.567,9.567,0,0,0,1.966,3.417,8.766,8.766,0,0,0,3.076,2.179,10.47,10.47,0,0,0,4.1.726,10.26,10.26,0,0,0,4.059-.726,8.773,8.773,0,0,0,3.076-2.179,8.912,8.912,0,0,0,1.923-3.417,15.11,15.11,0,0,0,.683-4.572,14.821,14.821,0,0,0-.683-4.529"
                                    transform="translate(-1043.241 -69.806)" />
                            <path
                                    d="M1178.98,101.421h12.39c.213-1.837.384-2.819.384-2.948a.937.937,0,0,1,.983-.812H1195v8.331h-23.455v-2.264a2.492,2.492,0,0,1,.128-.811,2.581,2.581,0,0,1,.385-.77l15.893-22.471H1176.2c-.214,1.922-.385,2.9-.385,3.033a.937.937,0,0,1-.982.812h-2.264l-.043-8.417h22.857V77.24a3.071,3.071,0,0,1-.556,1.795Z"
                                    transform="translate(-1064.886 -70.045)" />
                            <path
                                    d="M1034.378,76.811V95.084a3.372,3.372,0,0,1-6.743,0V76.811a3.569,3.569,0,0,0-7.137,0v4.823a3.372,3.372,0,0,1-2.76,3.318,3.488,3.488,0,0,1-.609.055,3.372,3.372,0,0,1-3.373-3.373V76.811a10.311,10.311,0,1,1,20.623,0"
                                    transform="translate(-999.875 -66.5)" fill="#0e95ff" />
                            <path
                                    d="M1007.4,95.3a3.6,3.6,0,0,0-.661.063,3.376,3.376,0,0,0-2.712,3.309v4.872a3.569,3.569,0,1,1-7.138,0V85.279a3.371,3.371,0,0,0-6.743,0v18.27a10.311,10.311,0,1,0,20.623,0V98.677A3.371,3.371,0,0,0,1007.4,95.3"
                                    transform="translate(-990.149 -72.849)" fill="#0e95ff" />
                        </svg>
                    </a>
                    <div class="collapse navbar-collapse bg-white" id="navbarNava">
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link active" href="{{Route('main-shop')}}">Shop <span class="sr-only">(current)</span></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Promotions</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{Route('shop','digital_locks')}}">Digital Locks</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{Route('shop','doors_gates')}}">Doors & Gates</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{Route('shop','accessories')}}">Accessories</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{Route('contact')}}">Contact</a>
                            </li>
                        </ul>
                    </div>
                    <div class="right_box d-flex">
                        <div class="box_item d-flex align-items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" width="34" height="34" viewBox="0 0 34 34">
                                <g id="search_ic" data-name="Group 311" transform="translate(10 10)">
                                    <g id="Ellipse_39" data-name="Ellipse 39" transform="translate(-10 -10)" fill="none"
                                       stroke="#dedede" stroke-width="2">

                                       <circle cx="17" cy="17" r="17" stroke="none" />
                                        <circle cx="17" cy="17" r="16" fill="none" />
                                    </g>
                                    <g id="Path_162" data-name="Path 162" transform="translate(0 0)" fill="none"
                                       stroke-linecap="round">
                                        <path d="M6.2,0A6.2,6.2,0,1,1,0,6.2,6.2,6.2,0,0,1,6.2,0Z" stroke="none" />
                                        <path   class="fill_white"
                                                d="M 6.200663089752197 1.999999046325684 C 3.88441276550293 1.999999046325684 2.000002861022949 3.884419441223145 2.000002861022949 6.200689315795898 C 2.000002861022949 8.516959190368652 3.88441276550293 10.40137958526611 6.200663089752197 10.40137958526611 C 8.516913414001465 10.40137958526611 10.40132331848145 8.516959190368652 10.40132331848145 6.200689315795898 C 10.40132331848145 3.884419441223145 8.516913414001465 1.999999046325684 6.200663089752197 1.999999046325684 M 6.200663089752197 -9.5367431640625e-07 C 9.625192642211914 -9.5367431640625e-07 12.40132331848145 2.776139259338379 12.40132331848145 6.200689315795898 C 12.40132331848145 9.625239372253418 9.625192642211914 12.40137958526611 6.200663089752197 12.40137958526611 C 2.77613353729248 12.40137958526611 2.86102294921875e-06 9.625239372253418 2.86102294921875e-06 6.200689315795898 C 2.86102294921875e-06 2.776139259338379 2.77613353729248 -9.5367431640625e-07 6.200663089752197 -9.5367431640625e-07 Z"
                                                fill="#000" stroke="none" />
                                    </g>
                                    <path id="Path_161" data-name="Path 161" d="M0,0,3.875,3.1"
                                          transform="translate(10.076 10.851)" fill="none" stroke="#000"
                                          stroke-linecap="round" stroke-width="2" />
                                </g>
                            </svg>
                            <div class="line"></div>
                        </div>
                        <div class="box_item d-flex align-items-center">
                        <a href="{{route('account')}}" class=" def-href px-2">
                            <svg xmlns="http://www.w3.org/2000/svg" width="34" height="34" viewBox="0 0 34 34">
                                <g id="user_ic" transform="translate(-1431 -35)">
                                    <g id="Group_323" data-name="Group 323" transform="translate(27 -1)">
                                        <g  id="Ellipse_39" data-name="Ellipse 39" transform="translate(1404 36)" fill="none"
                                           stroke="#dedede" stroke-width="2">
                                            <circle cx="17" cy="17" r="17" stroke="none" />
                                            <circle cx="17" cy="17" r="16" fill="none" />
                                        </g>
                                    </g>
                                    <g id="Group_325" data-name="Group 325" transform="translate(1442 45)">
                                        <g id="Group_393" data-name="Group 393">
                                            <path class="stroke_white"  id="Path_160" data-name="Path 160" d="M12.4,0A6.2,6.2,0,1,1,0,0"
                                                  transform="translate(11.901 14.86) rotate(180)" fill="none" stroke="#000"
                                                  stroke-linecap="round" stroke-width="2" />
                                            <g  id="Path_163" data-name="Path 163" transform="translate(3)" fill="none">
                                                <path class="stroke_white" d="M3.1,0A3.1,3.1,0,1,1,0,3.1,3.1,3.1,0,0,1,3.1,0Z" stroke="#000" />
                                                <path
                                                        d="M 3.100331544876099 2.000004768371582 C 2.493611574172974 2.000004768371582 2.000001430511475 2.493614673614502 2.000001430511475 3.100344657897949 C 2.000001430511475 3.707074642181396 2.493611574172974 4.200684547424316 3.100331544876099 4.200684547424316 C 3.707051515579224 4.200684547424316 4.200661659240723 3.707074642181396 4.200661659240723 3.100344657897949 C 4.200661659240723 2.493614673614502 3.707051515579224 2.000004768371582 3.100331544876099 2.000004768371582 M 3.100331544876099 4.76837158203125e-06 C 4.812601566314697 4.76837158203125e-06 6.200661659240723 1.38807487487793 6.200661659240723 3.100344657897949 C 6.200661659240723 4.812614440917969 4.812601566314697 6.200684547424316 3.100331544876099 6.200684547424316 C 1.3880615234375 6.200684547424316 1.430511474609375e-06 4.812614440917969 1.430511474609375e-06 3.100344657897949 C 1.430511474609375e-06 1.38807487487793 1.3880615234375 4.76837158203125e-06 3.100331544876099 4.76837158203125e-06 Z"
                                                        stroke="none" />
                                            </g>
                                        </g>
                                    </g>
                                </g>
                            </svg>
                            @if(!Auth::user())

                            <a class="nav-link link_white" href="{{Route('login')}}">
                                Sign In
                            </a>
                            <div class="line"></div>
                                @else
                                <span class="pl-1 pt-2" > Hello,
                                {{Auth::user()->first_name}}</span>
                            @endif
                           </a>
                        </div>
                        <div class="box_item d-flex align-items-center nav-cart">
                            <div class="cart_icon">
                                <svg xmlns="http://www.w3.org/2000/svg" width="34" height="34" viewBox="0 0 34 34">
                                    <g id="cart_ic" transform="translate(-1305 -35)">
                                        <g id="Group_324" data-name="Group 324" transform="translate(-99 -1)">
                                            <g id="Ellipse_39" data-name="Ellipse 39" transform="translate(1404 36)"
                                               fill="none" stroke="#dedede" stroke-width="2">
                                                <circle cx="17" cy="17" r="17" stroke="none" />
                                                <circle cx="17" cy="17" r="16" fill="none" />
                                            </g>
                                        </g>
                                        <g id="The-Icons" transform="translate(1314 45)">
                                            <path id="Combined-Shape"
                                                  d="M5.9,13.13l.538,1.98h10.6l.541-1.98Zm12.968-1.584a.573.573,0,0,1,.582.766l-1.959,7.182a1.1,1.1,0,0,1-1,.766H6.984a1.092,1.092,0,0,1-1-.766L4.027,12.311a.573.573,0,0,1,.582-.766H6.527L9.468,6.4a.792.792,0,1,1,1.376.786l-2.491,4.36h6.776l-2.491-4.36A.792.792,0,1,1,14.012,6.4l2.941,5.146ZM7.409,18.675h8.662l.541-1.98H6.871Z"
                                                  transform="translate(-4 -6)" class="fill_white" fill="" fill-rule="evenodd" />
                                        </g>
                                    </g>
                                </svg>
                                <div class="cart_items_number_badge">2</div>
                            </div>

                            <p class="my_cart_amount">
                                MY CART <br />
                                <span class="cart_price total" id="cart-total">$0</span>
                            </p>
                            <div class="line"></div>



                        </div>
                    </div>

                    <div id="cart-element">
                        @include('elements.cart')
                    </div>
                </div>
            </nav>

            <!-- mobile navbr  -->
            <div class="mobile_nav ">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a href="#0" class="nav-link mobile_logo">
                            <svg xmlns="http://www.w3.org/2000/svg" width="130.5" height="41.007"
                                 viewBox="0 0 130.5 41.007">
                                <path
                                        d="M1034.378,76.811V95.084a3.372,3.372,0,0,1-6.743,0V76.811a3.569,3.569,0,0,0-7.137,0v4.823a3.372,3.372,0,0,1-2.76,3.318,3.488,3.488,0,0,1-.609.055,3.372,3.372,0,0,1-3.373-3.373V76.811a10.311,10.311,0,1,1,20.623,0"
                                        transform="translate(-999.875 -66.5)" fill="#0e95ff" />
                                <path
                                        d="M1007.4,95.3a3.6,3.6,0,0,0-.661.063,3.376,3.376,0,0,0-2.712,3.309v4.872a3.569,3.569,0,1,1-7.138,0V85.279a3.371,3.371,0,0,0-6.743,0v18.27a10.311,10.311,0,1,0,20.623,0V98.677A3.371,3.371,0,0,0,1007.4,95.3"
                                        transform="translate(-990.149 -72.849)" fill="#0e95ff" />
                            </svg>
                        </a>
                    </li>
                    <div class="my_account p-0 ">
                        <h3 class="my_account_title">My Account</h3>
                        <div class="my_account_profile d-flex justify-content_center align-items-center">
                            <img src="./assets/images/profile.png" alt="profile" class="mr-3">
                            <h5>Jason Statham</h5>
                        </div>
                        <li class="nav-item">
                            <a class="nav-link active" href="#">
                                <svg class="mr-3" xmlns="http://www.w3.org/2000/svg" width="15.455" height="17"
                                     viewBox="0 0 15.455 17">
                                    <path id="my_order_ic"
                                          d="M9.887,8.593,11.735,9.62l5.376-2.971L15.192,5.584ZM13.61,4.7,11.727,3.66,6.364,6.638,8.3,7.715ZM12.5,16.916,17.909,13.9V7.973L15.421,9.345,12.5,10.956Zm-1.545-5.961-5.409-3v5.965l5.409,3ZM4.4,5.961,11.352,2.1a.773.773,0,0,1,.751,0l6.955,3.864a.773.773,0,0,1,.4.675v7.727a.773.773,0,0,1-.4.675L12.1,18.9a.773.773,0,0,1-.751,0L4.4,15.039a.773.773,0,0,1-.4-.675V6.636A.773.773,0,0,1,4.4,5.961Zm2.323,5.447a.773.773,0,1,1,.758-1.347L9.4,11.143a.773.773,0,1,1-.758,1.347Z"
                                          transform="translate(-4 -2)" fill="#00" fill-rule="evenodd" />
                                </svg>
                                My Orders<span class="sr-only">(current)</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " href="#">
                                <svg class="mr-3" xmlns="http://www.w3.org/2000/svg" width="15.443" height="14.165"
                                     viewBox="0 0 15.443 14.165">
                                    <path id="saved_product_ic"
                                          d="M5.544,10.633c0,2.412,2.363,5.328,6.181,7.824,3.818-2.5,6.173-5.35,6.173-7.824a3.089,3.089,0,0,0-5.147-2.3L12.008,9a.438.438,0,0,1-.574,0l-.743-.665a3.089,3.089,0,0,0-5.147,2.3ZM11.721,7.18a4.633,4.633,0,0,1,7.721,3.453c0,3.734-3.865,7.335-7.394,9.448a.68.68,0,0,1-.653,0C7.844,17.977,4,14.367,4,10.633A4.633,4.633,0,0,1,11.721,7.18Z"
                                          transform="translate(-4 -6)" />
                                </svg>

                                Saved Products
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                <svg class="mr-3" xmlns="http://www.w3.org/2000/svg" width="14.427" height="14.071"
                                     viewBox="0 0 14.427 14.071">
                                    <g id="recently_seen_ic" transform="translate(-54.741 -67)">
                                        <path id="Path_204" data-name="Path 204"
                                              d="M231.19,161.114a.769.769,0,0,1-.769.769h-2.653a.769.769,0,0,1-.769-.769v-3.345a.769.769,0,1,1,1.538,0v2.576h1.884A.769.769,0,0,1,231.19,161.114Z"
                                              transform="translate(-165.637 -86.54)" />
                                        <path id="Path_205" data-name="Path 205"
                                              d="M69.168,74.035A7.036,7.036,0,0,1,56.3,77.969a.769.769,0,0,1,.206-1.068.76.76,0,0,1,.334-.126.769.769,0,0,1,.734.333,5.5,5.5,0,1,0,.414-6.684c-.067.077-.132.156-.194.236l.325-.1a.769.769,0,0,1,.45,1.471l-2.169.663a.761.761,0,0,1-.075.019.768.768,0,0,1-.885-.529l-.663-2.169a.769.769,0,1,1,1.471-.45l.13.424a7.107,7.107,0,0,1,.452-.576,7.035,7.035,0,0,1,12.34,4.621Z" />
                                    </g>
                                </svg>

                                Recently Seen</a>
                        </li>
                    </div>
                    <div class="main_menu p-0 ">
                        <h3 class="main_menu_title">Main Menu</h3>
                        <li class="nav-item">
                            <a class="nav-link active" href="{{Route('shop')}}">
                                <svg class="mr-3" id="shop_ic" xmlns="http://www.w3.org/2000/svg" width="17.333"
                                     height="16.893" viewBox="0 0 17.333 16.893">
                                    <path id="Combined-Shape"
                                          d="M10.851,14.508a.938.938,0,0,1-1.877,0H8.035v7.508h3.754v-4.69a.937.937,0,0,1,.938-.941h1.879a.939.939,0,0,1,.938.941v4.69H19.3V14.508h-.938a.938.938,0,0,1-1.877,0H14.6a.938.938,0,0,1-1.877,0H10.851Zm0-1.877h1.877v-.939a.938.938,0,0,1,1.877,0v.939h1.877v-.939a.938.938,0,0,1,1.877,0v.939h1.2c.8,0,1.063-.361.817-1.127l-.844-2.627H7.777L6.96,11.5c-.246.766.017,1.127.817,1.127h1.2v-.939a.938.938,0,0,1,1.877,0v.939ZM21.174,14.1v8.856a.938.938,0,0,1-.939.941H7.1a.94.94,0,0,1-.939-.941V14.1a2.577,2.577,0,0,1-.985-3.166l.976-3.039A1.364,1.364,0,0,1,7.373,7H19.96a1.373,1.373,0,0,1,1.224.891l.976,3.039a2.576,2.576,0,0,1-.986,3.166Z"
                                          transform="translate(-5 -7)" fill-rule="evenodd" />
                                </svg>

                                Shop<span class="sr-only">(current)</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                <svg class="mr-3" id="promotions_ic" xmlns="http://www.w3.org/2000/svg" width="18.452"
                                     height="17.171" viewBox="0 0 18.452 17.171">
                                    <path id="Combined-Shape"
                                          d="M6.192,15.311a4.194,4.194,0,0,1,0-8.387h7.3l3.269-2.6a1.193,1.193,0,0,1,2.017.979V9.44a1.677,1.677,0,1,1,0,3.355v4.152a1.191,1.191,0,0,1-2.014.979l-3.317-2.615H12.3l.99,4.006a1.461,1.461,0,0,1-1.451,1.855H9.319a1.964,1.964,0,0,1-1.854-1.452L6.376,15.311Zm2.9,4.006a.349.349,0,0,0,.226.188h2.286l-1.036-4.194H8.1Zm-1.64-7.361a.839.839,0,1,1,0-1.677h2.934V8.6h-4.2a2.516,2.516,0,0,0,0,5.032h4.2V11.956ZM17.1,6.209,14.26,8.422a.839.839,0,0,1-.518.179H12.065v5.032h1.677a.839.839,0,0,1,.52.181L17.1,16.055V11.172q0-.027,0-.055t0-.054Z"
                                          transform="translate(-2 -4)" fill-rule="evenodd" />
                                </svg>

                                Promotions</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{Route('shop','digital_locks')}}">
                                <svg class="mr-3" xmlns="http://www.w3.org/2000/svg" width="18.025" height="20.149"
                                     viewBox="0 0 18.025 20.149">
                                    <g id="digital_lock_ic" transform="translate(-401.96 -309.77)">
                                        <path id="Path_362" data-name="Path 362"
                                              d="M417.468,314.885H415.78v-3.028a2.084,2.084,0,0,0-2.08-2.087h-9.66a2.083,2.083,0,0,0-2.08,2.087v15.982a2.082,2.082,0,0,0,2.08,2.08h9.66a2.082,2.082,0,0,0,2.08-2.08V319.9h1.688a2.509,2.509,0,1,0,0-5.019ZM414.3,327.839a.6.6,0,0,1-.6.6h-9.66a.6.6,0,0,1-.6-.6V311.857a.6.6,0,0,1,.6-.607h9.66a.6.6,0,0,1,.6.607v3.028h-2.006a4.256,4.256,0,1,0,0,5.019H414.3Zm-4.619-7.935h.363a2.719,2.719,0,0,1-1.177.267,2.776,2.776,0,0,1,0-5.552,2.719,2.719,0,0,1,1.177.267h-.363a2.509,2.509,0,1,0,0,5.019Zm7.787-1.48h-7.787a1.029,1.029,0,1,1,0-2.058h7.787a1.029,1.029,0,1,1,0,2.058Z"
                                              transform="translate(0)" />
                                    </g>
                                </svg>

                                Digital Locks</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{Route('shop','doors_gates')}}">
                                <svg class="mr-3" xmlns="http://www.w3.org/2000/svg" width="20.249" height="23.417"
                                     viewBox="0 0 20.249 23.417">
                                    <g id="doors_nd_gates_ic" transform="translate(-364.5 -306.723)">
                                        <path id="Path_364" data-name="Path 364"
                                              d="M382.814,320.753a2.239,2.239,0,0,0-1.453-.6.3.3,0,0,0-.08-.007,2.278,2.278,0,0,0-2.26,2.26,2.262,2.262,0,0,0,2.26,2.26.3.3,0,0,0,.08-.007,2.239,2.239,0,0,0,1.453-.6,2.252,2.252,0,0,0,0-3.314Zm-1.453,2.456a.272.272,0,0,1-.08.007.807.807,0,1,1,0-1.613.272.272,0,0,1,.08.007.8.8,0,0,1,0,1.6Z"
                                              transform="translate(-4.756 -4.393)" />
                                        <path id="Path_363" data-name="Path 363"
                                              d="M384.216,308.545l-12.132-1.8a.651.651,0,0,0-.574.133.708.708,0,0,0-.26.547v1.1h-6.066a.7.7,0,0,0-.684.7v18.411a.7.7,0,0,0,.684.7h6.066v1.1a.708.708,0,0,0,.26.547.673.673,0,0,0,.424.154,1.091,1.091,0,0,0,.15-.014l12.132-1.8a.7.7,0,0,0,.533-.687V309.225A.687.687,0,0,0,384.216,308.545Zm-12.966,18.39h-2.838v-14.64h2.838Zm0-16.042h-3.522a.69.69,0,0,0-.684.7v15.341h-1.176V309.926h5.382Zm12.132,16.182-10.764,1.488V308.3l10.764,1.488Z" />
                                    </g>
                                </svg>

                                Doors & Gates</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{Route('shop','accessories')}}">
                                <svg class="mr-3" xmlns="http://www.w3.org/2000/svg" width="18.004" height="21.41"
                                     viewBox="0 0 18.004 21.41">
                                    <g id="accessories_ic" transform="translate(-300.18 -307.72)">
                                        <path id="Path_367" data-name="Path 367"
                                              d="M312.84,323.339a3.7,3.7,0,0,0-3.009,0,3.733,3.733,0,1,0,3.009,0Zm-1.5,5.72a2.31,2.31,0,1,1,2.313-2.306A2.311,2.311,0,0,1,311.336,329.059Z"
                                              transform="translate(-2.157 -4.443)" />
                                        <path id="Path_369" data-name="Path 369"
                                              d="M316,307.72H302.359a2.175,2.175,0,0,0-.057,4.35v2.682a4.131,4.131,0,0,0,1.59,3.257,6.823,6.823,0,1,0,10.581,0,4.131,4.131,0,0,0,1.59-3.257V312.07a2.175,2.175,0,0,0-.057-4.35Zm-1.419,14.59a5.4,5.4,0,0,1-10.808,0,5.334,5.334,0,0,1,1.4-3.612,3.81,3.81,0,0,1,.6-.575,5.073,5.073,0,0,1,.993-.646,5.351,5.351,0,0,1,4.826,0,5.073,5.073,0,0,1,.993.646,3.857,3.857,0,0,1,.6.575A5.382,5.382,0,0,1,314.586,322.31Zm.057-7.558A2.712,2.712,0,0,1,313.457,317a6.8,6.8,0,0,0-8.551,0,2.712,2.712,0,0,1-1.185-2.242V312.2h10.921ZM316,310.658H302.359a.759.759,0,1,1,0-1.519H316a.759.759,0,1,1,0,1.519Z"
                                              transform="translate(0 0)" />
                                    </g>
                                </svg>

                                Accessories</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                <svg class="mr-3" xmlns="http://www.w3.org/2000/svg" width="16.833" height="16.833"
                                     viewBox="0 0 16.833 16.833">
                                    <g id="hmc_ic" transform="translate(-4 -4)">
                                        <path id="Combined-Shape"
                                              d="M13.258,15.362h.421a.842.842,0,0,1,0,1.683H11.154a.842.842,0,0,1,0-1.683h.421V12.837h-.418a.842.842,0,1,1,0-1.683h1.258a.843.843,0,0,1,.844.842Zm-.842,5.471a8.417,8.417,0,1,1,8.417-8.417A8.417,8.417,0,0,1,12.417,20.833Zm0-1.683a6.733,6.733,0,1,0-6.733-6.733A6.733,6.733,0,0,0,12.417,19.15Zm0-8.837A1.262,1.262,0,1,1,13.679,9.05,1.262,1.262,0,0,1,12.417,10.312Z"
                                              fill-rule="evenodd" />
                                    </g>
                                </svg>


                                Help Me Choose</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{Route('contact')}}">
                                <svg class="mr-3" id="contact_ic" xmlns="http://www.w3.org/2000/svg" width="17.989"
                                     height="17.171" viewBox="0 0 17.989 17.171">
                                    <path id="Combined-Shape"
                                          d="M10.994,20.171a1.635,1.635,0,1,1,1.417-2.453h1.858A1.637,1.637,0,0,0,15.9,16.081V9.54a4.906,4.906,0,0,0-9.812,0v4.5A2.044,2.044,0,0,1,2,14.04V11.584A2.044,2.044,0,0,1,4.044,9.541h.409a6.541,6.541,0,0,1,13.083,0l.409,0a2.045,2.045,0,0,1,2.044,2.043V14.04a2.044,2.044,0,0,1-2.044,2.043h-.409a3.272,3.272,0,0,1-3.267,3.271H12.411A1.635,1.635,0,0,1,10.994,20.171Zm-6.95-8.994a.409.409,0,0,0-.409.408V14.04a.409.409,0,0,0,.818,0V11.177ZM18.353,14.04V11.584a.409.409,0,0,0-.409-.408h-.409v3.271h.409A.408.408,0,0,0,18.353,14.04Zm-9.4-.41A1.227,1.227,0,1,1,10.177,12.4,1.226,1.226,0,0,1,8.95,13.63Zm4.088,0A1.227,1.227,0,1,1,14.265,12.4,1.226,1.226,0,0,1,13.039,13.63Z"
                                          transform="translate(-2 -3)" fill-rule="evenodd" />
                                </svg>

                                Contact</a>
                        </li>
                    </div>
                    <div class="line"></div>
                    <div class="mobile_log_out_user">
                        <a href="#0">Logout</a>
                    </div>
                </ul>
            </div>

         </header>

        <main style="min-height:63vh" class="">
            @yield('content')
        </main>
        <footer id="footer" class="container-fluid">
            <div class="container">
                <div class="row mx-0 ">
                    <div class="col-12 col-md-2 logo-col">
                        <svg class="col-6 p-0" xmlns="http://www.w3.org/2000/svg" width="130.5" height="41.007"
                             viewBox="0 0 130.5 41.007">
                            <path
                                    d="M1094.686,78.992c-.128,0-.342.086-.641.128s-.726.128-1.239.214v22.43c.513.085.94.171,1.239.213s.513.128.641.128a1.529,1.529,0,0,1,.256.042,1.228,1.228,0,0,1,1.068,1.325v2.521h-12.219v-2.521a1.227,1.227,0,0,1,1.068-1.325.757.757,0,0,0,.256-.042,3.966,3.966,0,0,1,.641-.128c.3-.043.726-.128,1.239-.213V92.493h-14.483v9.271c.513.085.982.171,1.282.213s.513.128.641.128a.756.756,0,0,0,.256.042,1.227,1.227,0,0,1,1.068,1.325v2.521H1063.5v-2.521a1.227,1.227,0,0,1,1.068-1.325,1.522,1.522,0,0,1,.256-.042c.128,0,.342-.086.641-.128s.769-.128,1.281-.213V79.334c-.513-.086-.983-.172-1.281-.214s-.513-.128-.641-.128a.755.755,0,0,0-.256-.042,1.227,1.227,0,0,1-1.068-1.325v-2.52h12.261v2.52a1.227,1.227,0,0,1-1.068,1.325.756.756,0,0,0-.256.042c-.128,0-.342.086-.641.128s-.769.128-1.282.214v9.057H1087V79.334c-.513-.086-.94-.172-1.239-.214a4.035,4.035,0,0,1-.641-.128,1.531,1.531,0,0,1-.256-.042,1.228,1.228,0,0,1-1.068-1.325v-2.52h12.219v2.52a1.228,1.228,0,0,1-1.068,1.325,1.528,1.528,0,0,1-.256.042"
                                    transform="translate(-1020.369 -70.045)" />
                            <path
                                    d="M1149.174,96.61a15.111,15.111,0,0,1-3.162,5,14.186,14.186,0,0,1-4.956,3.289,16.888,16.888,0,0,1-6.365,1.2,17.12,17.12,0,0,1-6.409-1.2,14.187,14.187,0,0,1-4.956-3.289,15.206,15.206,0,0,1-3.2-5,16.974,16.974,0,0,1-1.11-6.323,16.752,16.752,0,0,1,1.11-6.28,15.2,15.2,0,0,1,3.2-5,14.18,14.18,0,0,1,4.956-3.29,17.12,17.12,0,0,1,6.409-1.2,16.1,16.1,0,0,1,6.365,1.2,14.794,14.794,0,0,1,4.956,3.29,15.108,15.108,0,0,1,3.162,5,16.751,16.751,0,0,1,1.153,6.28,16.973,16.973,0,0,1-1.153,6.323m-5.426-10.851a8.907,8.907,0,0,0-1.923-3.417,8.773,8.773,0,0,0-3.076-2.179,10.249,10.249,0,0,0-4.059-.726,10.46,10.46,0,0,0-4.1.726,8.766,8.766,0,0,0-3.076,2.179,9.562,9.562,0,0,0-1.966,3.417,13.636,13.636,0,0,0-.683,4.529,13.9,13.9,0,0,0,.683,4.572,9.567,9.567,0,0,0,1.966,3.417,8.766,8.766,0,0,0,3.076,2.179,10.47,10.47,0,0,0,4.1.726,10.26,10.26,0,0,0,4.059-.726,8.773,8.773,0,0,0,3.076-2.179,8.912,8.912,0,0,0,1.923-3.417,15.11,15.11,0,0,0,.683-4.572,14.821,14.821,0,0,0-.683-4.529"
                                    transform="translate(-1043.241 -69.806)" />
                            <path
                                    d="M1178.98,101.421h12.39c.213-1.837.384-2.819.384-2.948a.937.937,0,0,1,.983-.812H1195v8.331h-23.455v-2.264a2.492,2.492,0,0,1,.128-.811,2.581,2.581,0,0,1,.385-.77l15.893-22.471H1176.2c-.214,1.922-.385,2.9-.385,3.033a.937.937,0,0,1-.982.812h-2.264l-.043-8.417h22.857V77.24a3.071,3.071,0,0,1-.556,1.795Z"
                                    transform="translate(-1064.886 -70.045)" />
                            <path
                                    d="M1034.378,76.811V95.084a3.372,3.372,0,0,1-6.743,0V76.811a3.569,3.569,0,0,0-7.137,0v4.823a3.372,3.372,0,0,1-2.76,3.318,3.488,3.488,0,0,1-.609.055,3.372,3.372,0,0,1-3.373-3.373V76.811a10.311,10.311,0,1,1,20.623,0"
                                    transform="translate(-999.875 -66.5)" fill="#0e95ff" />
                            <path
                                    d="M1007.4,95.3a3.6,3.6,0,0,0-.661.063,3.376,3.376,0,0,0-2.712,3.309v4.872a3.569,3.569,0,1,1-7.138,0V85.279a3.371,3.371,0,0,0-6.743,0v18.27a10.311,10.311,0,1,0,20.623,0V98.677A3.371,3.371,0,0,0,1007.4,95.3"
                                    transform="translate(-990.149 -72.849)" fill="#0e95ff" />
                        </svg>
                        <small class="col-6 d-block mb-3 p-0">Hoz Pte Ltd</small>
                    </div>
                    <div class="col-6 col-md-2">
                        <h5 class="footer_items_header">Showroom Address</h5>
                        <p class="footer_sub_item w-75">
                            113 Eunos Avenue 3 #07-08 Room 10, Gordon Industrail Building, Singapore 409838
                        </p>
                    </div>
                    <div class="col-6 col-md-2">
                        <h5 class="footer_items_header">Showroom Operating Hours</h5>
                        <p class="footer_sub_item">
                            11am - 8pm Daily <br> (Including Public Holiday)
                        </p>
                    </div>
                    <div class="col-6 col-md-1">
                        <h5 class="footer_items_header">Explore</h5>
                        <ul class="list-unstyled text-small">
                            <li><a class="footer_sub_item" href="{{Route('home')}}">Home</a></li>
                            <li><a class="footer_sub_item" href="{{Route('shop')}}">Shop</a></li>
                            <li><a class="footer_sub_item" href="#">Our Promises</a></li>
                            <li><a class="footer_sub_item" href="#">About Us</a></li>
                        </ul>
                    </div>
                    <div class="col-6 col-md-2">
                        <h5 class="footer_items_header">Information</h5>
                        <ul class="list-unstyled text-small">
                            <li><a class="footer_sub_item" href="#">Terms of Contract</a></li>
                            <li><a class="footer_sub_item" href="#">Shipping and Return</a></li>
                            <li><a class="footer_sub_item" href="#">Privacy Policy</a></li>
                        </ul>
                    </div>
                    <div class="col-12 col-md-3 newsletter">
                        <h5 class="footer_items_header">Stay Connected</h5>
                        <form action="#" class="row flex-fill">
                            <div class="col-lg-9 my-md-2 my-2"> <input type="email"
                                                                       class="form-control px-4 border-0 w-100 text-center text-md-left" id="newsletter_email"
                                                                       placeholder="Email Address" name="email"> </div>
                            <div class="col-lg-3 my-md-2 my-2"> <button type="submit" class="btn border-0 w-100 "><i
                                            class="fas text-white fa-long-arrow-alt-right    "></i></button> </div>
                        </form>
                        <div class="social-icons mt-1 ">
                            <a href="#0" style="color: #000 ;"> <i class="fab fa-facebook-square"></i></a>
                            <a href="#0" style="color: #000 ;"> <i class="fab fa-instagram-square"></i></a>
                            <a href="#0" style="color: #000 ;"> <i class="fa fa-youtube"></i></a>
                        </div>
                    </div>
                </div>
                <div class="line"></div>
                <div class="bottom_footer w-100 d-flex justify-content-between">
                    <div class="payment_logos">
                        <img src="./assets/logos/logos/visa.png" alt="visa">
                        <img src="./assets/logos/logos/mastercard.png" alt="mastercard">
                        <img src="./assets/logos/logos/discover.png" alt="discover">
                        <img src="./assets/logos/logos/paypal.png" alt="paypal">
                    </div>
                    <p>
                        Copyright © 2020
                    </p>
                </div>

            </div>
            <br>


        </footer>
    </div>


    {{--<script src="https://code.jquery.com/jquery-3.5.1.min.js"--}}
            {{--integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>--}}
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
            integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"
            integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous">
    </script>

    <script type="text/javascript" src="{{asset('js/productpage.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/style.js')}}"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script>
        $(document).ready(function(){
            calcTotal();
        })
        $(document).on('change','#color-picker',function(){
            $('#color-picker-form').trigger('submit')
        })
        $(document).on('submit','#color-picker-form',function(e){
            e.preventDefault();
            $.ajaxSetup ({
                cache: false,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type: "get",
                url: $(this).attr('action'),
                data : $(this).serialize(),
                success: function(data){
                    //console.log(data['product_removed'])
                    $('#product-details').html(data['details'])
                    //alert('success')

                },
                error : function () {
                    swal("'Error please try again",{
                        icon: "error",
                        // timer: 1000,
                    });


                },

            });

        })

        $(document).on('click','.add-to-savedProducts',function (e) {
            e.preventDefault();
            // var selected_product = $(this).attr('href').replace('#','');
            var selected_product = $(this).data('product');
            //alert(selected_product);
            addToSavedProducts(selected_product)

        });

        function addToSavedProducts(selected_product) {
            //  don't cache ajax or content won't be fresh

            $.ajaxSetup ({
                cache: false,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type: "post",
                url: "{{ route('add_to_saved_product') }}" + '/' + selected_product,
                success: function(data){
                    //console.log(data['product_removed'])
                    if(data['product_added'] == true){
                        $('#sv_prd-'+selected_product).remove();
                        swal("added to wish list",{
                            icon: "success",
                            timer: 1000,
                            buttons: false,
                        });
                      //  $('*[data-product="'+ selected_product +'"] > ')
                        $('.is_heart,.is_border').attr('fill','#007bff')

                    }else{
                        swal("the product is already in your wish list",{
                            icon: "info",
                            timer: 3000,

                        });
                    }

                },
                error : function (data) {
                   // console.log(data['statusText'])
                    if(data['statusText'] == 'Unauthorized'){

                        swal("please sign in to save products to your list",{
                        icon: "info",
                        // timer: 1000,
                       });

                    }else{
                        swal("an error occurred while trying to add product to your wish list",{
                            icon: "error",
                            // timer: 1000,
                          });
                    }

                  //  alert('Error please try again');
                   // location.reload(true);

                },

            });

        // end
        }

        $(document).on('click','.add_to_cart_btn',function(e){
            e.preventDefault();
            var product_id = $(this).data('product');
            addToCart(product_id);
        })

        function addToCart(product_id) {
            //  don't cache ajax or content won't be fresh

            $.ajaxSetup ({
                cache: false,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type: "post",
                url: "{{ route('add-to-Cart') }}" + '/' + product_id,
                success: function(data){
                    $('#cart-element').html(data['html']);
                    calcTotal();
                        swal("added to cart ",{
                            icon: "success",
                            timer: 1000,
                            buttons: false,
                        });

                },
                error : function () {
                    swal("an error occurred while trying to add product to your cart list",{
                        icon: "error",
                        // timer: 1000,
                    });
                    alert('Error please try again');
                   // location.reload(true);

                },

            });


        }// end add to cart
        function removeFromCart(product_id = null) {
            //  don't cache ajax or content won't be fresh
            var url = (product_id != null) ? "{{ route('cleanCart') }}" + '/' + product_id  : "{{ route('cleanCart') }}"
            $.ajaxSetup ({
                cache: false,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type: "delete",
                url: url,
                success: function(data){
                        $('#cart-element').html(data['html'])

                        $('.badge-cart').text(data['count-cart'])
                        swal("removed ",{
                            icon: "success",
                            timer: 1000,
                            buttons: false,
                        });
                        if($('#cart-element #cart .order_info-product').length < 1){
                            $('#cart-element #cart .nav-cart-dropdown').removeClass('show-cart').addClass('hide-cart')
                        }else{
                             $('#cart-element #cart .nav-cart-dropdown').addClass('show-cart')
                        }

                        calcTotal()
                },
                error : function () {
                    swal("an error occurred while trying to remove your product",{
                        icon: "error",
                        // timer: 1000,
                    });
                    alert('Error please try again');
                   // location.reload(true);

                },

            });


        }// end add to cart
        function calcTotal(){
            var total = 0;
            var counter = 0;
            $('.item-total').each(function(){
                 total += parseFloat($(this).data('item-total'));
                 counter++;
            })
            $('.total').text('$'+total.toFixed(2));
            $('.cart_items_number_badge').text(counter)
        }
        function changeQuantity(product_id){

            $.ajaxSetup ({
                cache: false,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type: "put",
                url: "{{ route('plus_minus_cart') }}",
                data : {id :product_id , quantity : $('#quantity-'+product_id).val()},
                success: function(data){
                        $('#cart-element').html(data['html'])
                        $('.nav-cart-dropdown').addClass('show-cart')
                        calcTotal();

                },
                error : function () {
                    swal("an error occurred while trying to remove your product",{
                        icon: "error",
                        // timer: 1000,
                    });
                    alert('Error please try again');
                   // location.reload(true);

                },

            });
        }
        function plus_minus_quantity(product_id,action){
            let input = $("#quantity-"+product_id);
            let current_quantity = parseInt(input.val());

            if(action == 'plus'){
                let new_quantity = current_quantity + 1;
                console.log(new_quantity)
                input.val(new_quantity )
            }else{
                if(current_quantity>1){
                    let new_quantity = current_quantity - 1;
                    input.val(new_quantity )
                }

            }


            changeQuantity(product_id)
            console.log('current_quantity : '+ input.val())
        }

        //cart show on click
        // const cartIcon = document.querySelector('.nav-cart');
        // const cart = document.querySelector('.nav-cart-dropdown');
        $(document).on('click','.nav-cart', function(){
            $('.nav-cart-dropdown').toggleClass('show-cart');
        });

        // $(document).on('click','.qty-decrease', function(e){
        //     e.preventDefault();
        //     var $this = $(this);
        //     var $input = $this.closest('div').find('input');
        //     var value = parseInt($input.val());

        //     if (value > 1 ) { value = value - 1; }
        //     else { value = 0; }

        //     $input.val(value);

        // });

        // $(document).on('click','.qty-increase', function(e){
        //     e.preventDefault();
        //     var $this = $(this);
        //     var $input = $this.closest('div').find('input');
        //     var value = parseInt($input.val());

        //     if (value < 100) { value = value + 1; }
        //     else { value =100;}

        //     $input.val(value);
        // });

    </script>
    @stack('script')
</body>
</html>
