<div class="btn-group w-100 mb-5" role="group" aria-label="Basic example">
    <button type="button" class="btn btn-indigo btn-rounded @if(isset($addnewElem)) {{($addnewElem == 'edit') ? 'active' : ''}} @endif"

        onclick="window.location.href='{{route('edit-product',['type'=>$type,'id'=> $id])}}?addnewElem=edit';">
        <i class="fas fa-eye fa-sm pr-2" aria-hidden="true"></i>Product {{$addnewElem }}
    </button>
    <button type="button" class="btn btn-indigo btn-rounded @if(isset($addnewElem)) {{($addnewElem == 'true') ? 'active' : ''}}   @endif"
    onclick="window.location.href='{{Route("add-product-details",["type"=>$type,"id"=>$id])}}?addnewElem=true';">
        <i class="fas fa-plus fa-sm pr-2" aria-hidden="true"></i> New Product Details
    </button>
    <button type="button" class="btn btn-indigo btn-rounded {{(!$addnewElem) ? 'active' : ''}}  "
    onclick="window.location.href='{{Route("add-product-details",["type"=>$type,"id"=>$id])}}';">
        <i class="fas fa-edit fa-sm pr-2" aria-hidden="true"></i>view All Product Details
    </button>

</div>
