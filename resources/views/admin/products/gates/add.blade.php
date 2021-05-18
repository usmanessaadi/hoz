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
<h4 class="text-center my-3"> Add New Gate</h4>
<div class="container py-5 px-5 example z-depth-5">
    <form action="{{Route('add-product',['type'=>'gates'])}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="form-row">
          <div class="col-md-6 mb-3 md-form">
            <label for="validationDefault22">Name</label>
          <input type="text" name="product_name" value="{{old('product_name')}}" required class="form-control" id="validationDefault22" value="" required>
          </div>
          <div class="col-md-3 mb-3 md-form">
                <input type="text" name="brand" id="brandExample" value="{{old('brand')}}" class="form-control" required>
                <label for="brandExample">Brand</label>

            </div>

        </div>
        <div class="form-row">
            <div class="col-md-9 mb-3 md-form">
                <div class="md-form">
                    <label for="validationDefault22">dimensions</label>
                    <!-- <select  class="prd-page-select" name="dimensions" id="validationDefault22" required >
                        <option value="200"> 200</option>
                        <option value="300"> 300</option>
                    </select> -->
                    <input type="text" name="dimensions" value="{{old('dimensions')}}"   required class="form-control" id="validationDefault22" value="" required>
                </div>
            </div>
        </div>
        
        <div class="custom-control  custom-checkbox mr-sm-2 mt-3">
                <input type="checkbox" class="custom-control-input" name="with_upsell" id="gateWithUpsell" />
                <label class="custom-control-label product_requirement pl-2" for="gateWithUpsell">
                    With Upsell
                </label>
            </div>
        <div class="form-row">
            <div class="col-md-9 mb-3 md-form">
                    <textarea id="form7" name="description" required class="md-textarea form-control" rows="3">{{old('description')}}</textarea>
                    <label for="form7">Description</label>
            </div>
        </div>

        <button class="btn btn-success btn-lg " type="submit">Next</button>
    </form>
</div>
@endsection
