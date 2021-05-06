<div id="s-c">
    <div class="hmc_choices d-flex raw">
        @foreach($GatesDimensions as $getGatesDimension)
            <div class="choice d-flex flex-column align-items-center">
                <a class="choice_img" href="{{Route('get-gates-dimensions')}}">
                    <h5>{{$getGatesDimension->dimensions}}</h5>
                </a>
                <svg class="my-3 chosen" xmlns="http://www.w3.org/2000/svg" width="28" height="28"
                     viewBox="0 0 28 28">
                    <g id="choice_ic" fill="none" stroke="#000" stroke-width="2">
                        <circle cx="14" cy="14" r="14" stroke="none" />
                        <circle cx="14" cy="14" r="13" fill="none" />
                    </g>
                </svg>
                <img class="play_btn" src="{{asset('assets/svg/hmc/play.svg')}}" alt="play btn">

                <span>{{$getGatesDimension->dimensions}}</span>
            </div>
            @endforeach
    </div>
</div>