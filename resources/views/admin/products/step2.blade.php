@extends('admin.layouts.app')

@section('content')

<div class="container py-5 px-5 example z-depth-1">
    @include('admin.products.elements.stepper')
    <!--Accordion wrapper-->
    <div class="accordion md-accordion" id="accordionEx" role="tablist" aria-multiselectable="true">
        @if(!$addnewElem)
            @forelse ($product_details as $product)
                <!-- Accordion card -->
                <div class="card">
                    @if (\Session::has('success-'.$product->id))
                    <div class="alert alert-success" role="alert">
                        {!! \Session::get('success-'.$product->id) !!}
                    </div>
                  @endif
                    <!-- Card header -->
                    <div class="card-header" role="tab" id="headingOne{{$product->id}}" style="background: rgb({{$product->color->color_rgb ?? 'rgb(255,255,255)'}})">
                    <a data-toggle="collapse" data-parent="#accordionEx" href="#collapseOne{{$product->id}}" aria-expanded="true"
                        aria-controls="collapseOne{{$product->id}}">
                        <h5 class="mb-0" style="color: white">
                            {{$product->color->color_name ?? 'white'}}, Item details #{{$product->id}} <i class="fas fa-angle-down rotate-icon"></i>
                        </h5>
                    </a>
                    </div>
                    <!-- Card body -->
                    <div id="collapseOne{{$product->id}}" class="collapse @if($loop->first) show @endif" role="tabpanel" aria-labelledby="headingOne{{$product->id}}" data-parent="#accordionEx">
                    <div class="card-body">
                        <form action="{{Route('update-product-details',["id"=>$product->id])}}" method="PUT" enctype="multipart/form-data" class="product-details-form">
                            @csrf
                            @method("PUT")
                            <input type="hidden" name="action" value="edit">
                            <div class="form-row">
                                <div class="col-md-12">
                                    <select class="mdb-select md-form" id="color-select" name="color_id" data-header-id="headingOne{{$product->id}}">
                                        <option value="" disabled selected>Choose your Color</option>
                                        @foreach ($colors as $color)
                                        <option value="{{$color->id}}" @if($product->color_id == $color->id) selected @endif  data-rgb="{{$color->color_rgb}}"> {{$color->color_name}}</option>
                                        @endforeach

                                      </select>
                                </div>
                                <div class="col-md-4 mb-3 md-form">
                                <label for="validationDefault22">price</label>
                                <input type="number" name="price" value="{{$product->price}}" required class="form-control" id="validationDefault22" value="" required>
                                </div>
                                <div class="col-md-4 mb-3 md-form">
                                    <input type="number" name="stock" id="brandExample" value="{{$product->stock}}" class="form-control" required>
                                    <label for="brandExample">stock</label>
                                </div>
                                <div class="col-md-4 mb-3 md-form">
                                    <input type="number" name="discount" id="brandExample" value="{{$product->discount}}" class="form-control" required>
                                    <label for="brandExample">discount %</label>
                                </div>
                            </div>
                            <div class="form-row" id="prd-img-{{$product->id}}">
                                @include('admin.products.elements.product-details-images',["product"=>$product])
                            </div>
                            <div class="form-row">
                                <div class="col-md-12 mb-3 md-form">

                                    <!-- You can add extra form fields here -->

                                    <input hidden id="file" name="files[]"/>

                                    <!-- You can add extra form fields here -->

                                    <div class="dropzone dropzone-file-area" id="fileUpload{{$product->id}}">
                                        <div class="dz-default dz-message">
                                            <h3 class="sbold">Drop files here to upload</h3>
                                            <span>You can also click to open file browser</span>
                                        </div>
                                    </div>

                                    <!-- You can add extra form fields here -->


                                </div>
                            </div>
                            <button class="btn btn-success btn-lg " type="submit">Save</button>

                            <button class="btn btn-danger btn-lg " type="submit" form="delete-prd-detail-{{$product->id}}">Delete</button>
                        </form>
                        <form  class="d-none" action="{{route('delete-product-details',$product->id)}}" method="DELETE" id="delete-prd-detail-{{$product->id}}">@csrf</form>
                    </div>
                    </div>

                </div>
                @include('admin.elements.file-upload-script',['id'=>$product->id])
                <!-- Accordion card -->
                @empty

                @include('admin.products.elements.step2-item')

            @endforelse

        @else
            <div id="add-elem-0 ">
               @include('admin.products.elements.step2-item')
            </div>
        @endif

    </div>
      <!-- Accordion wrapper -->
</div>

{{-- <div id="template" style="display: none">
    @include('admin.products.elements.step2-item')
</div> --}}

@push('scripts')
   <script>

        Dropzone.options.fileUpload = {
            url: "admin/product/details/{{$type}}/{{$id}}",
            addRemoveLinks: true,
            accept: function(file) {
                let fileReader = new FileReader();

                fileReader.readAsDataURL(file);
                fileReader.onloadend = function() {

                    let content = fileReader.result;
                    // $('#file').val(content);
                    $('#fileUpload').append('<input hidden name="files[]" value='+content+'/>')
                    file.previewElement.classList.add("dz-success");
                }
                file.previewElement.classList.add("dz-complete");
            }
        }

       $(document).ready(function(){

        $(document).on("change","#color-select",function(){
           var rgb =  $(this).children("option:selected").attr("data-rgb")
           var thisHeader = $(this).data("header-id");
           $("#color-preview").css("backgroundColor","rgb("+ rgb +")")
           $("#"+thisHeader).css("background","rgb("+ rgb +")")
           $("#"+thisHeader +" a").css('color',"white")
        })
        $( "form" ).on( "submit", function( event ) {
            event.preventDefault();
            $.ajaxSetup ({
                cache: false,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            // var url ="/admin/product/details/{{$type}}/{{$id}}";
            var url =$(this).attr('action');

            var jqxhr = $.post( url, $( this ).serialize() , function(data) {
                if(data['added']){
                    $('#add-elem-0').html(data['html'])
                    $('#add-elem-0').find('.alert-success').show()
                }else{
                 $('#prd-img-'+data['container_id']).html(data['html'])
                 $('#fileUpload'+data['container_id']).removeClass('dz-started')
                .html('<div class="dz-default dz-message"><h3 class="sbold">Drop files here to upload</h3><span>You can also click to open file browser</span></div>');
                }

            })
            .done(function(data) {

                if(data['reload'] == true){
                    alert(data['msg'])
                    var curr = window.location.href
                    window.location.href =curr
                  //  location.reload();
                }
            })
            .fail(function() {
                alert( "error" );
            })
            .always(function() {
                console.log( "finished" );
            });

        });
    });
    $(document).on('click','.delete-img',function(){
        $path = $(this).data('url')
        $is_main = $(this).data('main_img')
        submitReq($path , {'main_img' :  $is_main})
    })
        var submitReq = function($path, data = [], is_main = false){
            $.ajaxSetup ({
                cache: false,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            var jqxhr = $.post( $path, data , function(data) {
                $('#prd-img-'+data['container_id']).html(data['images'])
            })
            .done(function() {
                console.log( "deleted" );
            })
            .fail(function() {
                alert( "error" );
            })
            .always(function() {
                console.log( "finished" );
            });
        }
   </script>
@endpush
@endsection
