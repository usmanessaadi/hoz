<!DOCTYPE html>
<html>

   <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
   <head>
        <!-- CSRF Token -->
      <meta name="csrf-token" content="{{ csrf_token() }}">
      <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width,initial-scale=1,shrink-to-fit=no">
      <title>HOZ</title>
          <!-- Fonts -->
        <link rel="dns-prefetch" href="//fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

        <!-- Styles -->
        {{--<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">--}}

        <!-- Font Awesome -->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        @stack('order-styles')
        <!-- Bootstrap core CSS -->
        <link href="{{ asset('lib/MDB-PRO/css/bootstrap.min.css ') }}" rel="stylesheet">
        <!-- Material Design Bootstrap -->
        <link href="{{ asset('lib/MDB-PRO/css/mdb.min.css') }}" rel="stylesheet">
        <!-- MDBootstrap Datatables  -->
        <link href="{{asset('lib/MDB-PRO/css/addons/datatables.min.css')}}" rel="stylesheet">
        <link href="{{asset('admin/css/dropzone.min.css')}}" rel="stylesheet">

        <style>
            .td-btn-action{
                padding: 4px 48px;
                color: white;
                margin: 0 23px;
            }
            button, button:hover{
                color: white;
            }
            .double-nav .breadcrumb-dn {
                color: #fff;
            }
            .side-nav.wide.slim .sn-ad-avatar-wrapper a span {
            display: none;
            }
            .heading {
            font-weight: 700;
            color: #5d4267;
            }
            .card.colorful-card .testimonial-card .card-up {
            height: 95px;
            }
            .card.colorful-card .testimonial-card .avatar {
            border: 3px solid #fff !important;
            }
            .card.booking-card {
            background-color: #c7f2e3;
            }
            .card.booking-card .fa {
            color: #f7aa00;
            }
            .card.booking-card .card-body .card-text {
            color: #db2d43;
            }
            .card.card.booking-card .chip {
            background-color: #87e5da;
            }
            .card.booking-card .card-body hr {
            border-top: 1px solid #f7aa00;
            }
            .mimosa {
            background-color: #F0C05A;
            }
            .fuchsia-rose-text {
            color: #db0075;
            }
            .aqua-sky-text {
            color: #5cc6c3;
            }
            .mimosa-text {
            color: #F0C05A;
            }
            .list-inline-item .fas, .list-inline-item .far {
            font-size: .8rem;
            }
            .chili-pepper-text {
            color: #9B1B30;
            }
            .collapse-content .fa.fa-heart:hover {
            color: #f44336 !important;
            }
            .collapse-content .fa.fa-share-alt:hover {
            color: #0d47a1 !important;
            }
            .card-wrapper.card-action {
            min-height: 400px;
            }
            .not-allowed {cursor: not-allowed;}

            .tbl-imgs{
                height: 50px;
                width: 90px;
                object-fit: cover;
            }
            /*# sourceMappingURL=main.css.map */
            .order_delivery_status.waiting_payment{
                color: orange !important;
            }

            .order_delivery_status.payment_approved{
                color: blue !important;
            }
            .order_delivery_status.canceled{
                color: red !important;
            }
            .order_delivery_status.deleted{
                color: black!important;
            }
        </style>
        @stack('styles')
   </head>
   <body>
    <body class="fixed-sn mdb-skin">

        <!--Double navigation-->
        <header>
          <!-- Sidebar navigation -->
          <div id="slide-out" class="side-nav fixed wide sn-bg-1">
            <ul class="custom-scrollbar">
              <!-- Logo -->
              <li>
                <div class="logo-wrapper sn-ad-avatar-wrapper">
                  <a href="#"><img src="{{asset('assets/img/profile.webp')}}" class="rounded-circle"><span>HOZ Admin</span></a>
                </div>
              </li>
              <!--/. Logo -->
              <!-- Side navigation links -->
              <li>
                <ul class="collapsible collapsible-accordion">
                  <li>
                     <a class="collapsible-header waves-effect arrow-r active" >
                          <i class="sv-slim-icon fas fa-chevron-right"></i>
                          Orders<i class="fas fa-angle-down rotate-icon"></i>
                      </a>
                    <div class="collapsible-body">
                      <ul>
                        <li><a href="{{Route('admin-manage-orders',['status'=>'pending'])}}" class="waves-effect active">
                          <span class="sv-slim"> P-Or </span>
                          <span class="sv-normal">Pending Orders</span></a>
                        </li>
                        <li><a href="{{Route('admin-manage-orders',['status'=>'delivered'])}}" class="waves-effect">
                          <span class="sv-slim"> CF-Or </span>
                          <span class="sv-normal">Confirmed Orders</span></a>
                        </li>
                        <li><a href="{{Route('admin-manage-orders',['status'=>'canceled'])}}" class="waves-effect">
                            <span class="sv-slim"> C-Or </span>
                            <span class="sv-normal">Cancled Orders</span></a>
                        </li>
                      </ul>
                    </div>
                  </li>
                  {{-- <li>
                    <a href="{{Route('categories')}}" class="waves-effect" >
                          <i class="sv-slim-icon far fa-hand-point-right"></i>
                        <span class="sv-normal">Categories</span>
                    </a>
                  </li> --}}
                  <li>
                      <a class="collapsible-header waves-effect arrow-r">
                      <i class="sv-slim-icon fas fa-eye"></i> Manage Products <i class="fas fa-angle-down rotate-icon"></i></a>
                    <div class="collapsible-body">
                      <ul>
                        <li>
                        <a href="{{Route('manage-products','all')}}" class="waves-effect">
                          <span class="sv-slim"> MG </span>
                          <span class="sv-normal">All Products</span>
                         </a>
                        </li>
                        <li>
                          <a href="{{Route('manage-products','digital_locks')}}"  class="waves-effect">
                            <span class="sv-slim"> dg </span>
                            <span class="sv-normal">Dgital Lock/Handle/Door</span>
                          </a>
                        </li>
                        <li>
                            <a href="{{Route('manage-products','doors')}}"  class="waves-effect">
                              <span class="sv-slim"> door </span>
                              <span class="sv-normal">Doors</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{Route('manage-products','gates')}}"  class="waves-effect">
                              <span class="sv-slim"> gate </span>
                              <span class="sv-normal">Gates</span>
                            </a>
                        </li>
                      </ul>
                    </div>
                  </li>
                  <li>
                    <a class="collapsible-header waves-effect arrow-r">
                    <i class="sv-slim-icon fas fa-eye"></i> Add Products <i class="fas fa-angle-down rotate-icon"></i></a>
                  <div class="collapsible-body">
                    <ul>
                      <li>
                        <a href="{{Route('add-product','digital_locks')}}" class="waves-effect">
                          <span class="sv-slim"> dg </span>
                          <span class="sv-normal">Dgital Lock/Handle/Door</span>
                        </a>
                      </li>
                      <li>
                          <a href="{{Route('add-product','doors')}}" class="waves-effect">
                            <span class="sv-slim"> door </span>
                            <span class="sv-normal">Doors</span>
                          </a>
                      </li>
                      <li>
                          <a href="{{Route('add-product','gates')}}" class="waves-effect">
                            <span class="sv-slim"> gate </span>
                            <span class="sv-normal">Gates</span>
                          </a>
                      </li>
                    </ul>
                  </div>
                </li>
                  <li><a class="collapsible-header waves-effect arrow-r">
                    <i class="sv-slim-icon fas fa-eye"></i> Digital Types<i class="fas fa-angle-down rotate-icon"></i></a>
                  <div class="collapsible-body">
                    <ul>
                      <li>
                      <a href="{{Route('add-digital-locks-type','doors_type')}}" class="waves-effect">
                        <span class="sv-slim"> DT </span>
                        <span class="sv-normal">Doors Type</span>
                       </a>
                      </li>
                      <li>
                      <a href="{{Route('add-digital-locks-type','handles_type')}}" class="waves-effect">
                          <span class="sv-slim"> HT </span>
                          <span class="sv-normal">Handle Type</span>
                        </a>
                      </li>
                      <li>
                          <a href="{{Route('add-digital-locks-type','locks_type')}}" class="waves-effect">
                            <span class="sv-slim"> LT </span>
                            <span class="sv-normal">Locks Type</span>
                          </a>
                      </li>
                    </ul>
                  </div>
                </li>
                  <li><a class="collapsible-header waves-effect arrow-r"><i class="sv-slim-icon far fa-envelope"></i>Statistics<i class="fas fa-angle-down rotate-icon"></i></a>
                    <div class="collapsible-body">
                      <ul>
                        <li><a href="#" class="waves-effect">
                          <span class="sv-slim"> F </span>
                          <span class="sv-normal">Most Sellings Products</span></a>
                        </li>
                        <li><a href="#" class="waves-effect">
                          <span class="sv-slim"> W </span>
                          <span class="sv-normal">Month Statistics</span></a>
                        </li>
                      </ul>
                    </div>
                  </li>
                  <li><a id="toggle" class="waves-effect"><i class="sv-slim-icon fas fa-angle-double-left"></i>Minimize menu</a>
                  </li>
                </ul>
              </li>
              <!--/. Side navigation links -->
            </ul>
            <div class="sidenav-bg rgba-blue-strong"></div>
          </div>
          <!--/. Sidebar navigation -->
          <!-- Navbar -->
          <nav class="navbar fixed-top navbar-toggleable-md navbar-expand-lg scrolling-navbar double-nav unique-color-dark">
            <!-- SideNav slide-out button -->
            <div class="float-left">
              <a href="#" data-activates="slide-out" class="button-collapse"><i class="fas fa-bars"></i></a>
            </div>
            <!-- Breadcrumb-->
            <div class="breadcrumb-dn mr-auto">
              <p>HOZ.sg</p>
            </div>
            <ul class="nav navbar-nav nav-flex-icons ml-auto">
              <li class="nav-item">
                <a class="nav-link" href="{{Route('admin-manage-orders',['status'=>'pending'])}}"><i class="fas fa-shopping-cart"></i> <span class="clearfix d-none d-sm-inline-block">Orders</span></a>
              </li>
              <li class="nav-item">
               <a class="nav-link" href="#"><i class="fas fa-user"></i> <span class="clearfix d-none d-sm-inline-block">Logout</span></a>
              </li>
            </ul>
          </nav>
          <!-- /.Navbar -->
        </header>
        <!--/.Double navigation-->

        <!--Main Layout-->
        <main>
          <div class="container-fluid mt-5">
            @yield('content')
          </div>
        </main>
        <!--Main Layout-->

        <!-- JQuery -->
        <script type="text/javascript" src="{{asset('lib/MDB-PRO/js/jquery-3.4.1.min.js')}}"></script>

        <!-- Bootstrap tooltips -->
        <script type="text/javascript" src="{{asset('lib/MDB-PRO/js/popper.min.js')}}"></script>

        <!-- Bootstrap core JavaScript -->
        <script type="text/javascript" src="{{asset('lib/MDB-PRO/js/bootstrap.min.js')}}"></script>
        <!-- MDB core JavaScript -->
        <script type="text/javascript" src="{{asset('lib/MDB-PRO/js/mdb.min.js')}}"></script>
        <script type="text/javascript" src="{{asset('lib/MDB-PRO/js/addons-pro/stepper.min.js')}}"></script>
        <!-- MDBootstrap Datatables  -->
        <script type="text/javascript" src="{{asset('lib/MDB-PRO/js/addons/datatables.min.js')}}"></script>

        <script type="text/javascript" src="{{asset('admin/js/dropzone.min.js')}}"></script>

   <script>
        $(document).ready(function() {
            // SideNav Initialization
            $(".button-collapse").sideNav();
            new WOW().init();

            $('#dtBasicExample').DataTable();
            $('.dataTables_length').addClass('bs-select');

            $('.mdb-select').materialSelect({
                });
        })

    </script>
    @stack('scripts')
   </body>
</html>
