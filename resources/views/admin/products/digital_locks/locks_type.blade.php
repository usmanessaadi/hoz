@extends('admin.layouts.app')
@push('styles')
   <style>
       .waves-input-wrapper{overflow: initial;}
   </style>
@endpush
@section('content')
<div class="container">
    <div class="row justify-content-center mb-5">
        <div class="col-6">
            <!-- Material form contact -->
            <div class="card">

                <h5 class="card-header info-color white-text text-center py-4">
                    <strong>Add new Digital locks type </strong>
                </h5>

                <!--Card content-->
                <div class="card-body px-lg-5 pt-0">

                    <!-- Form -->
                    <form class="text-center" style="color: #757575;" action="{{Route('add-digital-locks-type','locks_type')}}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-6">
                                <!-- Name -->
                                <div class="md-form mt-3">
                                    <input type="text" id="materialContactFormName" class="form-control" name="name" required>
                                    <label for="materialContactFormName">Category Name</label>
                                </div>
                            </div>
                            <div class="col-6">

                            <!-- Send button -->
                            <input type="submit" class="btn btn-outline-info btn-rounded btn-block z-depth-0 my-4 waves-effect" value="Add" />

                            </div>
                        </div>


                    </form>
                    <!-- Form -->

                </div>

            </div>
            <!-- Material form contact -->
        </div>
    </div>
</div>
@if($digital_locks_type->count())
<table id="dtBasicExample" class="table table-striped table-bordered table-sm" cellspacing="0" width="100%">
    <thead>
      <tr>
        <th class="th-sm">{{__('id')}}
        </th>
        <th class="th-sm">{{__('name')}}
        </th>
        <th class="th-sm">{{__('digital locks belongs to this type')}}
        </th>
        <th class="th-sm" style="width:180.2px;">{{__('actions')}}
        </th>
      </tr>
    </thead>
    <tbody>
        @foreach ($digital_locks_type as $lock_type)
            <tr>
                 <td>#{{$lock_type->id}}</td>
                 <td>{{$lock_type->name}}</td>
                 <td>{{$lock_type->digital_lock()->count()}}</td>
                 <td>
                    @if ($lock_type->digital_lock()->count())
                    <button type="button" disabled class="btn btn-danger" style="margin:0;margin-left:6px; padding: 4px 11px;"> {{__('Delete')}}</button>
                       @else
                       <form action="{{Route('delete-digital-locks-type',['type'=>'locks_type','id'=>$lock_type->id])}}" method="POST" style="display: inline;">
                        @csrf
                        {{ method_field('DELETE') }}
                       <input type="submit" value="{{__('Delete')}}" class="btn btn-danger" style="margin:0;margin-left:6px; padding: 4px 11px;">
                       </form>
                    @endif

                   <button type="button" class="btn btn-primary edit-categ"
                           style="margin:0;margin-left:6px;padding: 4px 11px;"
                           data-name="{{$lock_type->name}}"
                           data-url="{{Route('update-digital-locks-type',['type'=>'locks_type','id'=>$lock_type->id])}}"
                           data-toggle="modal" data-target="#modalEditForm">
                           {{__('EDIT')}}</button>
                </td>
            </tr>
        @endforeach
    </tbody>
    <tfoot>
      <tr>
        <th class="th-sm">{{__('id')}}
        </th>
        <th class="th-sm">{{__('name')}}
        </th>
        <th class="th-sm">{{__('products belongs to category')}}
        </th>
        <th class="th-sm" style="width:180.2px;">{{__('actions')}}
        </th>
      </tr>
    </tfoot>
</table>
@else
<div class="alert alert-primary" role="alert">
     add categories to your shop they will show up here
  </div>
@endif
<div class="modal fade" id="modalEditForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header text-center">
        <h4 class="modal-title w-100 font-weight-bold">Edit Category</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
        <form action="#" method="POST" id="form-edit-categ">
            @csrf
            {{ method_field('PUT') }}
            <div class="modal-body mx-3">
                <div class="md-form mb-5">
                {{-- <i class="fas fa-envelope prefix grey-text"></i> --}}
                <input type="text" id="categ-input-name" autofocus  class="form-control validate " name="name" required>
                <label data-error="wrong" data-success="right" for="defaultForm-email">Name</label>
                </div>
            </div>
            <div class="modal-footer d-flex justify-content-center">
                <input type="submit" class="btn btn-default" value="Add" />
            </div>
        </form>
    </div>
  </div>
</div>

@push('scripts')
    <script>
       $(document).on('click','.edit-categ', function(){
          $('#form-edit-categ').attr('action',$(this).data('url'))
          $('#categ-input-name').attr('value',$(this).data('name'))
       })
    </script>
@endpush
@endsection
