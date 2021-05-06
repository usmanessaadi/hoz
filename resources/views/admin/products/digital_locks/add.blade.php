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
<h4 class="text-center my-3"> Add New Digita Lock / Handle / Door</h4>
<div class="container py-5 px-5 example z-depth-5">
    <form action="{{Route('add-product',["type"=>'digital_locks'])}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="form-row">
          <div class="col-md-6 mb-3 md-form">
            <label for="validationDefault22">Name</label>
          <input type="text" name="product_name" value="{{old('product_name')}}" required class="form-control" id="validationDefault22" value="" required>
          </div>
          <div class="col-md-6 mb-3 md-form">
                <input type="text" name="brand" id="brandExample" value="{{old('brand')}}" class="form-control" required>
                <label for="brandExample">Brand</label>

            </div>

        </div>
        <div class="form-row">
            <div class="col-md-4 mb-3 md-form">
                <select class="mdb-select md-form" name="wifi" required>
                    <option value="" disabled >Wifi</option>
                    <option value="1" >Yes</option>
                    <option value="0" selected>No</option>
                  </select>
                  <label class="mdb-main-label" style="margin: -13px 10px;">Wifi</label>
            </div>
            <div class="col-md-4 mb-3 md-form">
                <select class="mdb-select md-form" name="nfc" required>
                    <option value="" disabled >NFC</option>
                    <option value="1" >Yes</option>
                    <option value="0" selected>No</option>
                  </select>
                  <label class="mdb-main-label" style="margin: -13px 10px;">NFC</label>
            </div>
            <div class="col-md-4 mb-3 md-form">
                <select class="mdb-select md-form" name="smasung_smart_things" required>
                    <option value="" disabled >smasung smart things Rated</option>
                    <option value="1" >Yes</option>
                    <option value="0" selected>No</option>
                </select>
                <label class="mdb-main-label" style="margin: -13px 10px;">smasung smart things</label>
            </div>
          </div>
        <div class="form-row">
            <div class="col-md-3 mb-3 md-form">
                <div class="md-form">
                    <label for="validationDefault22">FingerPrint</label>
                    <input type="number" name="fingerprint" value="{{old('fingerprint')}}"   required class="form-control" id="validationDefault22" value="" required>
                </div>
            </div>
            <div class="col-md-3 mb-3 md-form">
                <div class="md-form">
                    <label for="validationDefault22">Physical Key</label>
                    <input type="number" name="physical_key" value="{{old('physical_key')}}"   required class="form-control" id="validationDefault22" value="" required>
                </div>
            </div>
            <div class="col-md-3 mb-3 md-form">
                <div class="md-form">
                    <label for="validationDefault22">Bluetooth</label>
                    <input type="number" name="bluetooth" value="{{old('bluetooth')}}"   required class="form-control" id="validationDefault22" value="" required>
                </div>
            </div>
            <div class="col-md-3 mb-3 md-form">
                <div class="md-form">
                    <label for="validationDefault22">Pin</label>
                    <input type="number" name="pin" value="{{old('pin')}}"   required class="form-control" id="validationDefault22" value="" required>
                </div>
            </div>
        </div>
        <div class="form-row">
            <div class="col-md-3 mb-3 md-form">
                <div class="md-form">
                    <label for="validationDefault22">Rfid Card</label>
                    <input type="number" name="rfid_card" value="{{old('rfid_card')}}"   required class="form-control" id="validationDefault22" value="" required>
                </div>
            </div>
            <div class="col-md-4 mb-3 md-form">
                <select class="mdb-select md-form" required id="digital_type" name="selected_type">
                    <option value="" disabled >Digital Type</option>
                    <option value="digital_door" >Digital Door</option>
                    <option value="digital_handle" >Digital Handle</option>
                    <option value="digital_lock" >Digital Lock</option>
                </select>
                <label class="mdb-main-label" style="margin: -13px 10px;">Choose Digtal Type</label>
            </div>
            <div class="col-md-4 mb-3 md-form " style="display: none"  id="digital_door">
                <select class="mdb-select md-form" name="digital_door">
                    <option value="" disabled >Door Types</option>
                    <option value="0" selected ></option>
                    @foreach ($digital_doors_type as $digital_door)
                       <option value="{{$digital_door->id}}">{{$digital_door->name}}</option>
                    @endforeach
                </select>
                <label class="mdb-main-label" style="margin: -13px 10px;">Digtal Door Types</label>
            </div>
            <div class="col-md-4 mb-3 md-form " style="display: none"  id="digital_handle">
                <select class="mdb-select md-form"  name="digital_handle">
                    <option value="" disabled >Handle Types</option>
                    <option value="0" selected ></option>
                    @foreach ($digital_handles_type as $digital_handle)
                       <option value="{{$digital_handle->id}}">{{$digital_handle->name}}</option>
                    @endforeach

                </select>
                <label class="mdb-main-label" style="margin: -13px 10px;">Digtal Handle Types</label>
            </div>
            <div class="col-md-4 mb-3 md-form " style="display: none" id="digital_lock">
                <select class="mdb-select md-form"  name="digital_lock">
                    <option value="" disabled >Lock Types</option>
                    <option value="0" selected ></option>
                    @foreach ($digital_locks_type as $digital_lock)
                       <option value="{{$digital_lock->id}}">{{$digital_lock->name}}</option>
                    @endforeach

                </select>
                <label class="mdb-main-label" style="margin: -13px 10px;">Digtal Lock Types</label>
            </div>
        </div>
        <div class="form-row">
            <div class="col-md-12 mb-3 md-form">
                    <textarea id="form7" name="description" required class="md-textarea form-control" rows="3">{{old('description')}}</textarea>
                    <label for="form7">Description</label>
            </div>
        </div>

        <button class="btn btn-success btn-lg " type="submit">Next</button>
    </form>
</div>
@push('scripts')
    <script>
        $(document).ready(function(){
            $('#digital_type').change(function(){
                $("#digital_handle, #digital_door, #digital_lock").hide()
                var slected_type = $(this).children("option:selected").val();
                $('#'+slected_type).show()

            })
        })
    </script>
@endpush
@endsection
