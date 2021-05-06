@push('style')
    <style>
        .card_checkbox_filter{
            border: solid 2px #d3d3d39e;
         border-radius: 6px;
        padding: 9px 7px 9px 7px;
        margin: 7px 18px;
        font-size: 10px;
        text-align: center;
        cursor: pointer;
        color: #0e95ff;
        }
        .border_checked {
            border-color: #0e95ff;
        }
        .brands-filter-card{
         max-height: 200px;
         overflow-y: scroll;
        }
        .sm-img{
         height: 30px;
         width: auto;
        }
        .img-color-filter .choice_img img,
        .img-color-filter  span
        {
            filter: invert(48%);
            /* filter: brightness(0%) sepia(1); */
        }
        .colors-checkbox.img-color-filter  span.color-circle{
            filter:unset;
        }
        span.color-circle {
            width: 20px;
            height: 20px;
            border-radius: 50%;
        }
    </style>
@endpush
<div class="shop_filter p-0 m-0">
    <div class="hoz_card px-4">
        <h5> Filter
            <a href="{{route('clear-filter','digital_locks')}}" class="clear_filter">
                Clear
            </a>
        </h5>

        <div class="line"></div>
        <form action="{{route('search-filter')}}" class="form_filter" method="get" id='form-filter'>
            @if(isset($brands))
            <div class="accordion" id="accordionTwo">
                <div class="card mt-4">
                    <div class="card-header" id="headingOne">
                        <h2 class="mb-0">
                            <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse"
                                data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                                Brand
                            </button>
                        </h2>
                    </div>

                    <div id="collapseTwo" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionTwo">
                        <div class="card-body brands-filter-card">
                            @foreach ($brands as $brand)
                            <div class="custom-control is_fire_rated custom-checkbox mr-sm-2">
                            <input type="checkbox" class="custom-control-input run-search-filter"
                                  name="brand[{{$loop->index}}]" onchange="runFiter()"  id="{{trim($brand->brand)}}"
                                  value="{{$brand->brand}}" form='form-filter'
                                  @if(array_key_exists("brand",$query_request ?? []) && in_array($brand->brand, $query_request['brand']))
                                  checked
                                  @endif
                                  />
                                <label class="custom-control-label product_requirement pl-2" for="{{trim($brand->brand)}}">
                                {{$brand->brand}} ({{$brand->total}})
                                </label>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            @endif

            {{-- unlock methods  --}}
            <div class="accordion" id="accordionOne">
                <div class="card mt-4">
                    <div class="card-header" id="headingOne">
                        <h2 class="mb-0">
                            <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse"
                                data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                UNLOCK METHODS
                            </button>
                        </h2>
                    </div>

                    <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionOne">
                        <div class="card-body">
                            <div class="row">

                            @foreach($unlock_methods as $unlock_method)
                                <input type="checkbox" hidden name="{{$unlock_method}}[{{$loop->index}}]" id="unlock_method_id{{$loop->index}}"
                                value="1"  form='form-filter'
                                @if(array_key_exists($unlock_method,$query_request ?? []) && in_array(1, $query_request[$unlock_method]))
                                checked
                                @endif
                                >
                                <div class="col-4 choice d-flex flex-column align-items-center card_checkbox_filter checkbox
                                @if(array_key_exists($unlock_method,$query_request ?? []) && in_array(1, $query_request[$unlock_method]))
                                border_checked
                                @else
                                img-color-filter
                                @endif
                                "

                                data-checkbox="unlock_method_id{{$loop->index}}"
                                >
                                        <a class="choice_img" href="javascript:void(0)">
                                            <img src="{{asset('assets/hmc/unlock-methods/'.$unlock_method.'.png')}}">
                                        </a>
                                        <span>{{ str_replace('_', ' ', $unlock_method)}}</span>
                                </div>

                            @endforeach
                        </div>
                         </div>
                    </div>
                </div>
            </div>

            {{-- doors type --}}
            <div class="accordion" id="accordionDoor">
                <div class="card mt-4">
                    <div class="card-header" id="headingOne">
                        <h2 class="mb-0">
                            <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse"
                                data-target="#collapseDoor" aria-expanded="true" aria-controls="collapseDoor">
                                DOORS TYPE
                            </button>
                        </h2>
                    </div>

                    <div id="collapseDoor" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionDoor">
                        <div class="card-body">

                            <div class="row">
                            @foreach($doors_types as $door)
                                <input type="checkbox" hidden name="digital_door_type_id[{{$loop->index}}]" id="door_type{{$loop->index}}"
                                value="{{$door->id}}"
                                @if(array_key_exists("digital_door_type_id",$query_request ?? []) && in_array($door->id, $query_request['digital_door_type_id']))
                                  checked
                                @endif
                                >
                                <div class="col-4 choice d-flex flex-column align-items-center card_checkbox_filter checkbox
                                    @if(array_key_exists("digital_door_type_id",$query_request ?? []) && in_array($door->id, $query_request['digital_door_type_id']))
                                    border_checked
                                    @else
                                    img-color-filter
                                    @endif
                                    "
                                      data-checkbox="door_type{{$loop->index}}">
                                        <a class="choice_img" href="javascript:void(0)">
                                            <img src="{{asset($door->icon)}}" class="sm-img">
                                        </a>
                                      <span title="{{$door->name}}"> {{Str::limit($door->name, 10, '...') }}</span>
                                </div>

                            @endforeach
                        </div>
                         </div>
                    </div>
                </div>
            </div>

            {{-- locks type --}}
            <div class="accordion" id="accordionLock">
                <div class="card mt-4">
                    <div class="card-header" id="headingOne">
                        <h2 class="mb-0">
                            <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse"
                                data-target="#collapseLock" aria-expanded="true" aria-controls="collapseLock">
                                LOCKS TYPE
                            </button>
                        </h2>
                    </div>

                    <div id="collapseLock" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionLock">
                        <div class="card-body">

                            <div class="row">
                            @foreach($locks_types as $lock)
                                <input type="checkbox" hidden name="digital_lock_type_id[{{$loop->index}}]" id="lock_type{{$loop->index}}"
                                value="{{$lock->id}}"
                                @if(array_key_exists("digital_lock_type_id",$query_request ?? []) && in_array($lock->id, $query_request['digital_lock_type_id']))
                                checked
                                @endif
                                >
                                <div class="col-4 choice d-flex flex-column align-items-center card_checkbox_filter checkbox
                                        @if(array_key_exists("digital_lock_type_id",$query_request ?? []) && in_array($lock->id, $query_request['digital_lock_type_id']))
                                        border_checked
                                        @else
                                        img-color-filter
                                        @endif"
                                        data-checkbox="lock_type{{$loop->index}}">
                                        <a class="choice_img" href="javascript:void(0)">
                                            <img src="{{asset($lock->icon)}}" class="sm-img">
                                        </a>
                                        <span title="{{$lock->name}}">{{Str::limit($lock->name, 12, '...') }}</span>
                                </div>

                            @endforeach
                        </div>
                         </div>
                    </div>
                </div>
            </div>

            {{-- handle type --}}
            <div class="accordion" id="accordionHandle">
                <div class="card mt-4">
                    <div class="card-header" id="headingOne">
                        <h2 class="mb-0">
                            <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse"
                                data-target="#collapseHandle" aria-expanded="true" aria-controls="collapseHandle">
                                HANDLES TYPE
                            </button>
                        </h2>
                    </div>

                    <div id="collapseHandle" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionHandle">
                        <div class="card-body">

                            <div class="row">
                            @foreach($handles_types as $handle)
                                <input type="checkbox" hidden name="digital_handle_type_id[{{$loop->index}}]" id="handle_type{{$loop->index}}"
                                value="{{$handle->id}}"
                                @if(array_key_exists("digital_handle_type_id",$query_request ?? []) && in_array($handle->id, $query_request['digital_handle_type_id']))
                                checked
                                @endif
                                >
                                <div class="col-4 choice d-flex flex-column align-items-center card_checkbox_filter checkbox
                                        @if(array_key_exists("digital_handle_type_id",$query_request ?? []) && in_array($handle->id, $query_request['digital_handle_type_id']))
                                        border_checked
                                        @else
                                        img-color-filter
                                        @endif"
                                        data-checkbox="handle_type{{$loop->index}}">
                                        <a class="choice_img" href="javascript:void(0)">
                                            <img src="{{asset($handle->icon)}}" class="sm-img">
                                        </a>
                                        <span title="{{$handle->name}}">{{Str::limit($handle->name, 12, '...') }} </span>
                                </div>

                            @endforeach
                        </div>
                         </div>
                    </div>
                </div>
            </div>

             {{-- colors--}}
             <div class="accordion" id="accordionColor">
                <div class="card mt-4">
                    <div class="card-header" id="headingOne">
                        <h2 class="mb-0">
                            <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse"
                                data-target="#collapseColor" aria-expanded="true" aria-controls="collapseColor">
                               COLORS
                            </button>
                        </h2>
                    </div>

                    <div id="collapseColor" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionColor">
                        <div class="card-body">

                            <div class="row">
                            @foreach($colors as $digita_color)

                                <input type="checkbox" hidden name="color_id[{{$loop->index}}]" id="color{{$loop->index}}"
                                value="{{$digita_color->color->id}}"
                                @if(array_key_exists("color_id",$query_request ?? []) && in_array($digita_color->color->id, $query_request['color_id']))
                                  checked
                                @endif
                                >
                                <div class="col-4 choice d-flex flex-column align-items-center card_checkbox_filter checkbox colors-checkbox img-color-filter
                                @if(array_key_exists("color_id",$query_request ?? []) && in_array($digita_color->color->id, $query_request['color_id']))
                                border_checked
                                @endif
                                " data-checkbox="color{{$loop->index}}">
                                    <span class="color-circle" style="background: rgb({{$digita_color->color->color_rgb ?? 'rgb(255,255,255)'}})"></span>
                                    <span title="{{$digita_color->color->color_name}}">{{Str::limit($digita_color->color->color_name, 12, '...') }} </span>
                                </div>

                            @endforeach
                        </div>
                         </div>
                    </div>
                </div>
            </div>

            <input type="hidden" name="filter_type" value="digital_locks" form='form-filter'>
        </form>
    </div>
</div>
@push('script')
<script>
    $(document).ready(function(){
        $('.card_checkbox_filter.checkbox').click(function(){

            $_this = $(this);
            $_chekbox = $('#'+ $_this.data('checkbox') );

            $is_checkbox_checked = $_chekbox.is(':checked');

            $check_checkbox = ($is_checkbox_checked) ? false : true;

            $_chekbox.attr('checked',$check_checkbox)

            if($check_checkbox)
                $_this.addClass('border_checked').removeClass('img-color-filter')
            else
                $_this.removeClass('border_checked').addClass('img-color-filter')

            runFiter();

        });
    })
    var runFiter = function () {
        $('#form-filter').trigger('submit');
    }

</script>
@endpush
