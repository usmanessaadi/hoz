<div id="s-c">
    <div class="hmc_choices d-flex raw">
        @foreach($getDigitalLock_HandlesType as $handletype)
            <div class="choice d-flex flex-column align-items-center choice-handle-type"
                 data-url="{{Route('get-dl-unlock-methods-type',[$selected_doorType,$selected_lockType,$handletype->id,])}}"
                 data-doorType="{{$selected_doorType}}"
                 data-lockType="{{$selected_lockType}}"
                 data-handleType="{{$handletype->id}}">
                <a class="choice_img" href="#">
                    {{--<h5>doors type</h5>--}}
                    {{--<img src="{{asset($handletype->icon)}}">--}}
                </a>
                <svg class="my-3 chosen" xmlns="http://www.w3.org/2000/svg" width="28" height="28"
                     viewBox="0 0 28 28">
                    <g id="choice_ic" fill="none" stroke="#000" stroke-width="2">
                        <circle cx="14" cy="14" r="14" stroke="none" />
                        <circle cx="14" cy="14" r="13" fill="none" />
                    </g>
                </svg>
                <img class="play_btn" src="{{asset('assets/svg/hmc/play.svg')}}" alt="play btn">

                <span>{{$handletype->name}}</span>
            </div>
        @endforeach
        {{--disabled options--}}
        @foreach($getAvailable_DigitalLock_HandlesType_Excluding_OutOfStock_And_TrueData as $handletype)
            <div class="choice d-flex flex-column align-items-center choice-handle-type"
                 data-url="{{Route('get-dl-unlock-methods-type',[$selected_doorType,$selected_lockType,$handletype->id,])}}"
                 data-doorType="{{$selected_doorType}}"
                 data-lockType="{{$selected_lockType}}"
                 data-handleType="{{$handletype->id}}">
                <a class="choice_img" href="#">
                    {{--<h5>doors type</h5>--}}
                    {{--<img src="{{asset($handletype->icon)}}">--}}
                </a>
                <svg class="my-3 chosen" xmlns="http://www.w3.org/2000/svg" width="28" height="28"
                     viewBox="0 0 28 28">
                    <g id="choice_ic" fill="none" stroke="#000" stroke-width="2">
                        <circle cx="14" cy="14" r="14" stroke="none" />
                        <circle cx="14" cy="14" r="13" fill="none" />
                    </g>
                </svg>
                <img class="play_btn" src="{{asset('assets/svg/hmc/play.svg')}}" alt="play btn">

                <span>{{$handletype->name}}</span>
                <strong>disabled options</strong>
            </div>
        @endforeach
    </div>
    <script>

        $('.choice-handle-type').click(function (e) {
            e.preventDefault();
            var selected_choice_url = $(this).attr('data-url');
            var selected_door_type = $(this).attr('data-doorType');
            var selected_lock_type = $(this).attr('data-lockType');
            var selected_handle_type = $(this).attr('data-handleType');
            help_me_choose(selected_door_type, selected_lock_type, selected_handle_type, selected_choice_url);
            // $(this).addClass('active_type');
            // $(this).siblings().removeClass('active_type')
        });


        function help_me_choose(selected_door_type,selected_lock_type, selected_handle_type,  url) {
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
                data:{
                    door_type : selected_door_type,
                    lock_type : selected_lock_type,
                    handle_type : selected_handle_type,
                },
                beforeSend: function(){
                    $("#hmc_choices").html("<div class=\"preloader text-center py-5\" id=\"preloader\">\n" +
                        "    <img src=\"/assets/loader/preloader_x128.gif\"  class=\"w-70\" alt=\"no saved products were added\" >\n" +
                        "    <p class=\"text-center w-70\" >Loading...</p>\n" +
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

                    //   console.log('compete')
                }
            });

// end
        }

    </script>
</div>