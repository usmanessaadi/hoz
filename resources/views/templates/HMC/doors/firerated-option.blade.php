<div id="s-c">
    <div class="hmc_choices d-flex raw">

            <div class="choice d-flex flex-column align-items-center
                     @if($is_firerated == 'yes' || $is_firerated == 'both')
                    choice-firerated
                    @endif
                        "
                 data-url="{{Route('hmc-get-doors')}}"
                 data-dimension="{{$dimensions}}"
                 data-firerated_option="1">
                <a class="choice_img" href="#">
                    <h5>Fire Rated</h5>
                </a>
                <svg class="my-3 chosen" xmlns="http://www.w3.org/2000/svg" width="28" height="28"
                     viewBox="0 0 28 28">
                    <g id="choice_ic" fill="none" stroke="#000" stroke-width="2">
                        <circle cx="14" cy="14" r="14" stroke="none" />
                        <circle cx="14" cy="14" r="13" fill="none" />
                    </g>
                </svg>
                <img class="play_btn" src="{{asset('assets/svg/hmc/play.svg')}}" alt="play btn">
                <small>Yes, Fire-rated</small>
                @if($is_firerated == 'no')
                    <span>this option disabled</span>
                    @endif

            </div>

            <div class="choice d-flex flex-column align-items-center
                    @if($is_firerated == 'no' || $is_firerated == 'both')
                    choice-firerated
                    @endif"
                 data-url="{{Route('hmc-get-doors')}}"
                 data-dimension="{{$dimensions}}"
                 data-firerated_option="0">
                <a class="choice_img" href="#">
                    <h5>Not Fire Rated</h5>
                </a>
                <svg class="my-3 chosen" xmlns="http://www.w3.org/2000/svg" width="28" height="28"
                     viewBox="0 0 28 28">
                    <g id="choice_ic" fill="none" stroke="#000" stroke-width="2">
                        <circle cx="14" cy="14" r="14" stroke="none" />
                        <circle cx="14" cy="14" r="13" fill="none" />
                    </g>
                </svg>
                <img class="play_btn" src="{{asset('assets/svg/hmc/play.svg')}}" alt="play btn">
                <small>No, Non Fire-rated</small>
                @if($is_firerated == 'yes')
                    <span>this option disabled</span>
                @endif
            </div>

    </div>
    <script>


        $('.choice-firerated').click(function (e) {
            e.preventDefault();
            var selected_choice_url = $(this).attr('data-url');
            var selected_dimension = $(this).attr('data-dimension');
            var selected_firerated_option = $(this).attr('data-firerated_option');
            help_me_choose(selected_dimension, selected_firerated_option, selected_choice_url);
            // $(this).addClass('active_type');
            // $(this).siblings().removeClass('active_type')
        });


        function help_me_choose(selected_dimension,selected_firerated_option, url) {
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
                data:{ dimension : selected_dimension, is_firerated : selected_firerated_option },
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