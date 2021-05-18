 <!-- Accordion card -->
 <div class="card">

    <!-- Card header -->
    <div class="card-header" role="tab" id="headingOne1">
    <a data-toggle="collapse" data-parent="#accordionEx" href="#collapseOne1" aria-expanded="true"
        aria-controls="collapseOne1">
        <h5 class="mb-0">
        Item details #1 <i class="fas fa-angle-down rotate-icon"></i>
        </h5>
    </a>
    </div>

    <!-- Card body -->
    <div id="collapseOne1" class="collapse show" role="tabpanel" aria-labelledby="headingOne1" data-parent="#accordionEx">
    <div class="card-body">
        <form action="{{Route('add-product-details',["type"=>$type,"id"=>$id])}}" class="" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-row">
                <div class="col-md-8">
                <!-- hey 1 -->
                    <select class="mdb-select md-form" id="color-select" name="color_id">
                        <option value="" disabled selected>Choose your Color</option>
                        @foreach ($colors as $color)
                        <option value="{{$color->id}}" data-rgb="{{$color->color_rgb}}"> {{$color->color_name}}</option>
                        @endforeach

                      </select>
                </div>
                <div class="col-md-2">
                    <button type="button" class="btn " id="color-preview" style="color: white">picked color</button>
                </div>
                <div class="col-md-4 mb-3 md-form">
                <label for="validationDefault22">price</label>
                <input type="number" name="price" value="" required class="form-control" id="validationDefault22" value="" required>
                </div>
                <div class="col-md-4 mb-3 md-form">
                    <input type="number" name="stock" id="brandExample" value="" class="form-control" required>
                    <label for="brandExample">stock</label>
                </div>
                <div class="col-md-4 mb-3 md-form">
                    <input type="number" name="discount" id="brandExample" value="" class="form-control" required>
                    <label for="brandExample">discount %</label>
                </div>
            </div>
            <div class="form-row">
                <div class="col-md-12 mb-3 md-form">

                    <!-- You can add extra form fields here -->

                    <input hidden id="file" name="files[]"/>

                    <!-- You can add extra form fields here -->

                    <div class="dropzone dropzone-file-area" id="fileUpload">
                        <div class="dz-default dz-message">
                            <h3 class="sbold">Drop files here to upload</h3>
                            <span>You can also click to open file browser</span>
                        </div>
                    </div>

                    <!-- You can add extra form fields here -->


                </div>
            </div>

            <button class="btn btn-success btn-lg " type="submit">Next</button>
        </form>
    </div>
    </div>

</div>
<!-- Accordion card -->
@include('admin.elements.file-upload-script',['id'=>$product->id])
