@extends('layouts.app')
@push('style')
    <link rel="stylesheet" href="{{asset('css/hmc.css')}}" />
@endpush
@section('content')

    <div class="container" id="main">

        <div class="content">
            <h1>
                Let us help you choose your next product from HOZ
            </h1>
            <h5>Time to complete: Less than 2 minutes</h5>
            <p>
                Answer a few short questions about what’s important to you and your needs, check the previews for a
                better understanding, and we’ll help you find the perfect Smart lock, gate, door or accessory for you.
            </p>
            <a href="#0" class="btn hmc_cta_btn">Get Started</a>
        </div>

    </div>

    <section class="hmc hoz_card container">
        <h3>What Type Of Product Are You Looking For?</h3>
        <p>(Choose One)</p>

        <div class="hmc_questionaire">
            <div class="hmc_left d-flex flex-column" style="visibility: hidden">
                <a href="#0" class="step">
                    <svg xmlns="http://www.w3.org/2000/svg" width="26" height="81" viewBox="0 0 26 81">
                        <g id="mycircle" transform="translate(-106 -1566)">
                            <g id="eclipse" data-name="eclipse" transform="translate(132 1566) rotate(90)"
                               fill="#0e95ff" stroke="#0e95ff" stroke-width="2">
                                <circle cx="13" cy="13" r="13" stroke="none" />
                                <circle cx="13" cy="13" r="12" fill="none" />
                            </g>
                            <path id="check" data-name="check" d="M4.759,0V8.031H0"
                                  transform="translate(120.179 1573.5) rotate(45)" fill="none" stroke="#fff"
                                  stroke-linecap="round" stroke-linejoin="round" stroke-width="2" />
                            <circle id="dot" data-name="dot" cx="3" cy="3" r="3" transform="translate(116 1576)"
                                    fill="#fff" />
                            <path id="line" data-name="line" d="M11999-8103.5v54"
                                  transform="translate(-11879.5 9695.499)" fill="none" stroke="#0e95ff"
                                  stroke-linecap="round" stroke-width="2" />
                        </g>
                    </svg>
                    <h5 class="ml-3">Product Type</h5>
                </a>
                <a href="#0" class="step">
                    <svg xmlns="http://www.w3.org/2000/svg" width="26" height="81" viewBox="0 0 26 81">
                        <g id="mycircle" transform="translate(-106 -1566)">
                            <g id="eclipse" data-name="eclipse" transform="translate(132 1566) rotate(90)"
                               fill="#0e95ff" stroke="#0e95ff" stroke-width="2">
                                <circle cx="13" cy="13" r="13" stroke="none" />
                                <circle cx="13" cy="13" r="12" fill="none" />
                            </g>
                            <path id="check" data-name="check" d="M4.759,0V8.031H0"
                                  transform="translate(120.179 1573.5) rotate(45)" fill="none" stroke="#fff"
                                  stroke-linecap="round" stroke-linejoin="round" stroke-width="2" />

                            <path id="line" data-name="line" d="M11999-8103.5v54"
                                  transform="translate(-11879.5 9695.499)" fill="none" stroke="#0e95ff"
                                  stroke-linecap="round" stroke-width="2" />
                        </g>
                    </svg>
                    <h5 class="ml-3">Product Type</h5>
                </a>
                <a href="#0" class="step">
                    <svg xmlns="http://www.w3.org/2000/svg" width="26" height="81" viewBox="0 0 26 81">
                        <g id="mycircle" transform="translate(-106 -1566)">
                            <g id="eclipse" data-name="eclipse" transform="translate(132 1566) rotate(90)"
                               fill="#0e95ff" stroke="#0e95ff" stroke-width="2">
                                <circle cx="13" cy="13" r="13" stroke="none" />
                                <circle cx="13" cy="13" r="12" fill="none" />
                            </g>
                            <circle id="dot" data-name="dot" cx="3" cy="3" r="3" transform="translate(116 1576)"
                                    fill="#fff" />
                            <path id="line" data-name="line" d="M11999-8103.5v54"
                                  transform="translate(-11879.5 9695.499)" fill="none" stroke="#aaa"
                                  stroke-linecap="round" stroke-width="2" />
                        </g>
                    </svg>
                    <h5 class="ml-3">Product Type</h5>
                </a>
                <a href="#0" class="step">
                    <svg xmlns="http://www.w3.org/2000/svg" width="26" height="81" viewBox="0 0 26 81">
                        <g id="mycircle" transform="translate(-106 -1566)">
                            <g id="eclipse" data-name="eclipse" transform="translate(132 1566) rotate(90)" fill="none"
                               stroke="#aaaaaa" stroke-width="2">
                                <circle cx="13" cy="13" r="13" stroke="none" />
                                <circle cx="13" cy="13" r="12" fill="none" />
                            </g>
                            <path id="line" data-name="line" d="M11999-8103.5v54"
                                  transform="translate(-11879.5 9695.499)" fill="none" stroke="#aaa"
                                  stroke-linecap="round" stroke-width="2" />
                        </g>
                    </svg>

                    <h5 class="ml-3">Product Type</h5>
                </a>
                <a href="#0" class="step">
                    <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" viewBox="0 0 26 26">
                        <g id="mycircle" transform="translate(-106 -1566)">
                            <g id="eclipse" data-name="eclipse" transform="translate(132 1566) rotate(90)" fill="none"
                               stroke="#aaaaaa" stroke-width="2">
                                <circle cx="13" cy="13" r="13" stroke="none" />
                                <circle cx="13" cy="13" r="12" fill="none" />
                            </g>
                        </g>
                    </svg>


                    <h5 class="ml-3">Product Type</h5>
                </a>

            </div>
            <div class="hmc_right d-flex flex-column" id="hmc_choices">
                <div class="hmc_choices d-flex raw">
                    <div class="choice d-flex flex-column align-items-center" data-url="{{Route('get-dl-doors-type')}}">
                        <a class="choice_img" href="#">
                            <img class="ml-3" src="./assets/svg/hmc/digital_lock_ic.svg" alt="Digital Lock">
                        </a>
                        <svg class="my-3 chosen" xmlns="http://www.w3.org/2000/svg" width="28" height="28"
                             viewBox="0 0 28 28">
                            <g id="choice_ic" fill="none" stroke="#000" stroke-width="2">
                                <circle cx="14" cy="14" r="14" stroke="none" />
                                <circle cx="14" cy="14" r="13" fill="none" />
                            </g>
                        </svg>
                        <img class="video_explainer" src="{{asset('assets/svg/hmc/video_explainer.svg')}}" alt="video explainer">
                        <img class="play_btn" src="{{asset('assets/svg/hmc/play.svg')}}" alt="play btn">
                        <h5>Digital Locks</h5>
                    </div>
                    <div class="choice d-flex flex-column align-items-center" data-url="{{Route('get-gates-dimensions')}}">
                        <a class="choice_img" href="#">
                            <img src="{{asset('assets/svg/hmc/gates_ic.svg')}}" alt="Gates">
                        </a>
                        <svg class="my-3 chosen" xmlns="http://www.w3.org/2000/svg" width="28" height="28"
                             viewBox="0 0 28 28">
                            <g id="choice_ic" fill="none" stroke="#000" stroke-width="2">
                                <circle cx="14" cy="14" r="14" stroke="none" />
                                <circle cx="14" cy="14" r="13" fill="none" />
                            </g>
                        </svg>
                        <img class="play_btn" src="{{asset('assets/svg/hmc/play.svg')}}" alt="play btn">

                        <h5>Gates</h5>
                    </div>
                    <div class="choice d-flex flex-column align-items-center" data-url="{{Route('get-doors-dimensions')}}">
                        <a class="choice_img" href="#">
                            <img src="./assets/svg/hmc/doors_ic.svg" alt="Doors">
                        </a>
                        <svg class="my-3 chosen" xmlns="http://www.w3.org/2000/svg" width="28" height="28"
                             viewBox="0 0 28 28">
                            <g id="choice_ic" fill="none" stroke="#000" stroke-width="2">
                                <circle cx="14" cy="14" r="14" stroke="none" />
                                <circle cx="14" cy="14" r="13" fill="none" />
                            </g>
                        </svg>
                        <img class="play_btn" src="./assets/svg/hmc/play.svg" alt="play btn">

                        <h5>Doors</h5>
                    </div>
                    <div class="choice d-flex flex-column align-items-center">
                        <a class="choice_img" href="#">
                            <img src="./assets/svg/hmc/accesories_ic.svg" alt="Accessories">
                        </a>
                        <svg class="my-3 chosen" xmlns="http://www.w3.org/2000/svg" width="28" height="28"
                             viewBox="0 0 28 28">
                            <g id="choice_ic" fill="none" stroke="#000" stroke-width="2">
                                <circle cx="14" cy="14" r="14" stroke="none" />
                                <circle cx="14" cy="14" r="13" fill="none" />
                            </g>
                        </svg>
                        <img class="play_btn" src="./assets/svg/hmc/play.svg" alt="play btn">

                        <h5>Accessories</h5>
                    </div>
                </div>

                <div class="hmc_right_btn">
                    <a href="#0" class="btn btn-prev mr-4">
                        <svg class="mr-3" xmlns="http://www.w3.org/2000/svg" width="24.211" height="17.154"
                             viewBox="0 0 24.211 17.154">
                            <g id="arrow" transform="translate(22.716 15.437) rotate(180)">
                                <path id="Path_281" data-name="Path 281" d="M6.556,0,8.437,8.485,0,11.184"
                                      transform="translate(12.899 9.685) rotate(150)" fill="none" stroke="#0e95ff"
                                      stroke-linecap="round" stroke-linejoin="round" stroke-width="2" />
                                <path id="Path_282" data-name="Path 282" d="M0,0H18.983"
                                      transform="translate(2.733 6.62)" fill="none" stroke="#0e95ff"
                                      stroke-linecap="round" stroke-width="2" />
                            </g>
                        </svg>
                        Back
                    </a>
                    <a href="#0" class="btn btn-next">
                        Next
                        <svg class="ml-3" xmlns="http://www.w3.org/2000/svg" width="24.211" height="17.154"
                             viewBox="0 0 24.211 17.154">
                            <g id="arrow" transform="translate(22.716 15.437) rotate(180)">
                                <path id="Path_281" data-name="Path 281" d="M6.556,0,8.437,8.485,0,11.184"
                                      transform="translate(12.899 9.685) rotate(150)" fill="none" stroke="#0e95ff"
                                      stroke-linecap="round" stroke-linejoin="round" stroke-width="2" />
                                <path id="Path_282" data-name="Path 282" d="M0,0H18.983"
                                      transform="translate(2.733 6.62)" fill="none" stroke="#0e95ff"
                                      stroke-linecap="round" stroke-width="2" />
                            </g>
                        </svg>

                    </a>
                </div>

                <script>

                    $('.choice').click(function (e) {
                        e.preventDefault();
                        var selected_choice_url = $(this).attr('data-url');
                        help_me_choose(selected_choice_url);
                        // $(this).addClass('active_type');
                        // $(this).siblings().removeClass('active_type')
                    });


                    function help_me_choose(url) {
                        //  don't cache ajax or content won't be fresh
                        $.ajaxSetup ({
                            cache: false,
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            }
                        });

                        $.ajax({
                            type: "get",
                            url: url,
                            // data:{ product_type : selected_option },
                            beforeSend: function(){
                                $("#hmc_choices").html("<div class=\"preloader text-center py-5 w-100\" id=\"preloader\">\n" +
                                    "    <img src=\"/assets/loader/preloader_x128.gif\"  class=\"w-10\" alt=\"no saved products were added\" >\n" +

                                    "</div>");
                                // console.log('before')
                            },
                            success: function(data){
                                //   console.log('success');
                                $("#hmc_choices #preloader").fadeOut(700, function () {
                                    $("#hmc_choices").html(data['html']);
                                    $("#hmc_choices > #s-c").fadeIn(200);
                                });

                            },
                            error : function () {

                                //  $("#hmc_choices").load("{{asset('templates/preloader.html')}}");

                                alert('Error please try again')

                            },
                            complete:function (data) {
                                $("#hmc_choices").html(data['html']);
                                // $("svg #line").css({stroke: "red", transition: "5s"});
                                //   console.log('compete')
                                $("#hmc_choices").html("<div class=\"preloader text-center py-5 w-100\" id=\"preloader\">\n" +
                                    "    <img src=\"/assets/loader/preloader_x128.gif\"  class=\"w-10\" alt=\"no saved products were added\" >\n" +

                                    "</div>");
                            }
                        });

// end
                    }

                </script>
            </div>
        </div>
    </section>

@endsection
@push('script')
    <script>

        {{--$('.choice').click(function (e) {--}}
            {{--e.preventDefault();--}}
            {{--var selected_choice_url = $(this).attr('data-url');--}}
            {{--help_me_choose(selected_choice_url);--}}
            {{--// $(this).addClass('active_type');--}}
            {{--// $(this).siblings().removeClass('active_type')--}}
        {{--});--}}


        {{--function help_me_choose(url) {--}}
            {{--//  don't cache ajax or content won't be fresh--}}
            {{--$.ajaxSetup ({--}}
                {{--cache: false,--}}
                {{--headers: {--}}
                    {{--'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')--}}
                {{--}--}}
            {{--});--}}

            {{--$.ajax({--}}
                {{--type: "get",--}}
                {{--url: url,--}}
                {{--// data:{ product_type : selected_option },--}}
                {{--beforeSend: function(){--}}
                    {{--$("#hmc_choices").html("<div class=\"preloader text-center py-5\" id=\"preloader\">\n" +--}}
                        {{--"    <img src=\"/assets/loader/preloader_x128.gif\"  class=\"w-70\" alt=\"no saved products were added\" >\n" +--}}
                        {{--"    <p class=\"text-center w-70\" >Loading...</p>\n" +--}}
                        {{--"</div>");--}}
                    {{--// console.log('before')--}}
                {{--},--}}
                {{--success: function(data){--}}
                    {{--//   console.log('success');--}}
                    {{--$("#hmc_choices #preloader").fadeOut(700, function () {--}}
                        {{--$("#hmc_choices").html(data['html']);--}}
                        {{--$("#hmc_choices > #s-c").fadeIn(200);--}}
                    {{--});--}}

                {{--},--}}
                {{--error : function () {--}}

                  {{--//  $("#hmc_choices").load("{{asset('templates/preloader.html')}}");--}}

                    {{--alert('Error please try again')--}}

                {{--},--}}
                {{--complete:function (data) {--}}
                    {{--$("#hmc_choices").html(data['html']);--}}
                   {{--// $("svg #line").css({stroke: "red", transition: "5s"});--}}
                    {{--//   console.log('compete')--}}
                {{--}--}}
            {{--});--}}

{{--// end--}}
        {{--}--}}

    </script>
    @endpush
