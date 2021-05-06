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
            <a href="{{route('clear-filter','accessories')}}" class="clear_filter">
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

            <input type="hidden" name="filter_type" value="accessories" form='form-filter'>
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
