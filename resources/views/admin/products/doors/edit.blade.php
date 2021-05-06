@extends('admin.layouts.app')
@section('content')
@if(session('created_product'))
<div class="alert alert-success" role="alert">
    product created successfully
    {{-- <a href="{{Route('product-page',session('created_product'))}}" target="_blank">visit product</a> --}}
</div>
@endif
@if($errors->any())
<div class="alert alert-danger" role="alert">
    {{ implode('', $errors->all(':message')) }}
</div>

@endif
<h4 class="text-center my-3"> Edit Door</h4>
<div class="container py-5 px-5 example z-depth-5">
    @include('admin.products.elements.stepper')
    <form action="{{Route('edit-product',["type"=>'doors', 'id'=>$product->id])}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="form-row">
          <div class="col-md-6 mb-3 md-form">
            <label for="validationDefault22">Name</label>
          <input type="text" name="product_name" value="{{$product->product_name}}" required class="form-control" id="validationDefault22" value="" required>
          </div>
          <div class="col-md-3 mb-3 md-form">
                <input type="text" name="brand" id="brandExample" value="{{$product->brand}}" class="form-control" required>
                <label for="brandExample">Brand</label>

            </div>

        </div>
        <div class="form-row">
            <div class="col-md-6 mb-3 md-form">
                <div class="md-form">
                    <label for="validationDefault22">dimensions</label>
                    <input type="text" name="dimensions" value="{{$product->dimensions}}"   required class="form-control" id="validationDefault22" value="" required>
                </div>
            </div>
            <div class="col-md-3 mb-3 md-form">
                <select class="mdb-select md-form" name="fire_rated" required>
                    <option value="" disabled >Fire Rated</option>
                    <option value="1" {{($product->fire_rated == 1 ) ? 'selected' : '' }} >Fire Rated</option>
                    <option value="0" {{($product->fire_rated == 0 ) ? 'selected' : '' }} >Not Fire Rated</option>
                  </select>
                  <label class="mdb-main-label" style="margin: -13px 10px;">Fire Rated</label>
            </div>
        </div>
        <div class="form-row">
            <div class="col-md-9 mb-3 md-form">
                    <textarea id="form7" name="description" required class="md-textarea form-control" rows="3">{{$product->description}}</textarea>
                    <label for="form7">Description</label>
            </div>
        </div>

        <button class="btn btn-success btn-lg " type="submit">Next</button>
    </form>
</div>
@endsection
