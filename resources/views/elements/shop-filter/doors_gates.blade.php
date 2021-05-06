<div class="shop_filter p-0 m-0">
    <div class="hoz_card px-4">
        <h5> Filter
            <a href="{{route('clear-filter','doors_gates')}}" class="clear_filter">
                Clear
            </a>
        </h5>

        <div class="line"></div>
        <form action="{{route('search-filter')}}" class="form_filter" method="get" id='form-filter'>

            <div class="custom-control is_fire_rated custom-checkbox mr-sm-2 mt-3">
                <input type="checkbox" class="custom-control-input" name="fire_rated[1]" value="1"
                    id="customControlAutosizing" onchange="runFiter()"
                    @if(array_key_exists("fire_rated",$query_request ?? []) && in_array(1, $query_request['fire_rated']))
                      checked
                    @endif
                    />
                <label class="custom-control-label product_requirement pl-2" for="customControlAutosizing">
                    <img src="{{asset('assets/svg/fire_rated.svg')}}" class="mr-1" alt="fire rated">
                    Fire-Rated (Doors Only)
                </label>
            </div>
            @if(isset($dimensions))
            <div class="accordion" id="accordionOne">
                <div class="card mt-4">
                    <div class="card-header" id="headingOne">
                        <h2 class="mb-0">
                            <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse"
                                data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                Dimensions
                            </button>
                        </h2>
                    </div>

                    <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionOne">
                        <div class="card-body">
                            @foreach ($dimensions as $dimension)
                                <div class="custom-control is_fire_rated custom-checkbox mr-sm-2 ">
                                    <input type="checkbox" class="custom-control-input run-search-filter" onchange="runFiter()"
                                     name="dimensions[{{$loop->index}}]" id="{{trim($dimension->dimensions)}}"
                                     value="{{$dimension->dimensions}}"  form='form-filter'
                                      @if(array_key_exists("dimensions",$query_request ?? []) && in_array($dimension->dimensions, $query_request['dimensions']))
                                      checked
                                      @endif
                                    />
                                    <label class="custom-control-label product_requirement pl-2" for="{{trim($dimension->dimensions)}}">
                                        {{$dimension->dimensions}} ft ({{$dimension->total}})
                                    </label>
                                </div>
                            @endforeach
                         </div>
                    </div>
                </div>
            </div>
            @endif
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
                        <div class="card-body">
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
            <input type="hidden" name="filter_type" value="doors_gates" form='form-filter'>
        </form>
    </div>
</div>
@push('script')
<script>

    var runFiter = function () {
        $('#form-filter').trigger('submit');
    }

</script>
@endpush
