@extends('admin.layouts.app')

@section('content')

<div class="card-columns mb-5">

    <div class="card"></div>
    <!-- Panel -->
    <div class="card info-color mb-4 white-text">
        <div class="card-body">
          <div class="pull-right">
            <i class="fas fa-chart-line"></i>
          </div>
        <p>
            {{$type}}
        </p>
          <h4>{{$products->count()}}</h4>
        </div>
        <div class="progress md-progress">
          <div class="progress-bar bg grey darken-3" role="progressbar" style="width: 15%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
        </div>
    </div>
      <!-- Panel -->
    <div class="card"></div>
</div>
<table id="dtBasicExample" class="table table-striped-none table-bordered table-sm" cellspacing="0" width="100%">
    <thead>
      <tr>
        <th class="th-sm">{{__('image')}}
        </th>
        <th class="th-sm">{{__('name')}}
        </th>
        <th class="th-sm" style="width:280.2px;">{{__('description')}}
        </th>
        <th class="th-sm">{{__('price')}}
        </th>
        <th class="th-sm">{{__('discount')}}
        </th>
        <th class="th-sm">{{__('color')}}
        </th>
        <th class="th-sm" style="width:180.2px;">{{__('actions')}}
        </th>
      </tr>
    </thead>
    <tbody>
        @foreach ($products as $product)
            <tr>
                 <td><img src="{{($product->first_image) ? PRODUCT_DISPLAY_PATH.$product->first_image['image_url'] : asset('assets/img/main_product_image.jpg')}}"  class="tbl-imgs"> </td>
                 <td>
                    {{-- {{$product->door['product_name']}}
                    {{$product->gate['product_name']}}
                    {{$product->digital_lock['product_name']}}
                    {{$product->accessory['product_name']}} --}}
                    {{$product->get_product('product_name')}}

                 </td>
                 <td>
                    {{-- {{$product->door['description']}}
                    {{$product->gate['description']}}
                    {{$product->digital_lock['description']}}
                    {{$product->accessory['description']}} --}}
                    {{$product->get_product('description')}}
                 </td>
                 <td>
                     {{$product->price}}
                 </td>
                 <td>{{($product->dicount) ?? 0}}%</td>

                 <td>{{$product->color->color_name ?? null}}</td>
                 <td>
                    {{-- {{Route('delete_product',$product->id)}} --}}
                 <a href="{{route('edit-product',['type'=>$product->type(),'id'=> $product->id])}}"  type="button" class="btn btn-success"
                    style=" margin:0;margin-left:6px; padding: 4px 11px;">
                  EDIT</button>
                 <a href="#" target="_blank" class="btn btn-primary" style="margin:0;margin-left:6px;padding: 4px 11px;"> {{__('View')}}</a>
                </td>
            </tr>
        @endforeach
    </tbody>
    <tfoot>
      <tr>
        <th class="th-sm">{{__('image')}}
        </th>
        <th class="th-sm">{{__('name')}}
        </th>
        <th class="th-sm" style="width:280.2px;">{{__('description')}}
        </th>
        <th class="th-sm">{{__('price')}}
        </th>
        <th class="th-sm">{{__('discount')}}
        </th>
        <th class="th-sm">{{__('category')}}
        </th>
        <th class="th-sm" style="width:180.2px;">{{__('actions')}}
        </th>
      </tr>
    </tfoot>
</table>
@push('scripts')

@endpush
@endsection
