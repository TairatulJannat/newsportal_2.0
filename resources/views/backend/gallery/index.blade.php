@extends('backend.layouts.app')
@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-primary card-header-icon">
                        <div class="card-icon">
                            <i class="material-icons">assignment</i>
                        </div>
                        <h4 class="card-title">MANAGE IMAGES</h4>
                    </div>
                    <div class="card-body">
                        <div class="toolbar">
                            <button class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter"> MANAGE IMAGE GALLERY</button>
                        </div>
                        <div class="material-datatables">
                            <table id="datatables" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                                <thead>
                                    <tr>
                                        <th class="text-center">SN</th>
                                        <th class="text-center">Image</th>
                                        <th class="text-center">Title Bangla</th>
                                        <th class="text-center">Title English </th>
                                        <th class="text-center">Description Bangla</th>
                                        <th class="text-center">Description English </th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                {{-- <tfoot>
                                <tr>
                                    <th class="text-center">Image</th>
                                    <th class="text-center">Title Bangla</th>
                                    <th class="text-center">Title English </th>
                                    <th class="text-center">Description Bangla</th>
                                    <th class="text-center">Description English </th>
                                    <th class="text-center">Action</th>
                                </tr>
                                </tfoot> --}}
                                <tbody>
                                    @foreach ($images as $key => $image)
                                        <tr>
                                            <td class="text-left align-top">{{ ++$key }}</td>
                                            <td class="text-left align-top">
                                                <img src="{{ asset($image->image) }}" style="object-fit: cover;" alt="">
                                            </td>
                                            <td class="text-left align-top">{{ $image->image_title_bn }}</td>
                                            <td class="text-left align-top">{{ $image->image_title_en }}</td>
                                            <td class="text-left align-top">{{ $image->image_description_bn }}</td>
                                            <td class="text-left align-top">{{ $image->image_description_en }}</td>

                                            <td class="td-actions text-center align-top">
                                                <a href=""  data-toggle="tooltip" class="btn btn-link text-info">
                                                    <i class="material-icons">person</i>
                                                </a>
                                                <a href=""  onclick="cat_edit({{$image->id }})"  data-toggle="modal" data-target="#edit_image"  class="btn btn-link text-success">
                                                    <i class="material-icons">edit</i>
                                                </a>
                                                <a href=""  data-toggle="tooltip" class="btn btn-link text-danger delete">
                                                    <i class="material-icons">close</i>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- end content-->
                </div>
                <!--  end card  -->
            </div>
            <!-- end col-md-12 -->
        </div>
        <!-- end row -->
        <!-- Add modal-->
        <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">ADD CATEGORY</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                        <i class="material-icons">clear</i>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group md-form-group is-filled">
                            <form action="{{ route('admin.image.store')}}" method="POST"  enctype="multipart/form-data" class="form-horizontal" autocomplete="off">
                                @csrf
                                <div class="row">
                                <label class="col-md-3 col-form-label">Bangla Name</label>
                                    <div class="col-md-9">
                                        <div class="form-group has-default">
                                            <input class="form-control" type="text" name="image_name_bn">
                                            @error('image_name_bn')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                <label class="col-md-3 col-form-label">English Name</label>
                                    <div class="col-md-9">
                                        <div class="form-group has-default">
                                            <input class="form-control" type="text" name="image_name_en">
                                            @error('image_bangla_name')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                <label class="col-md-3 col-form-label">Show Header</label>
                                    <div class="col-md-9 ">
                                        <div class="togglebutton">
                                            <label>
                                            <input type="checkbox" id="togBtn" name="show_on_header" value="1">
                                            <span class="toggle"></span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                <label class="col-md-3 col-form-label">Status</label>
                                    <div class="col-md-9">
                                        <select class="selectpicker" data-style="select-with-transition" title="Choose Status" data-size="7" name="status">
                                            <option disabled> Choose</option>
                                            <option value="1">Active </option>
                                            <option value="0">InActive</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button class="btn btn-danger mr-1" type="button" data-dismiss="modal">Close</button>
                                    <button class="btn btn-primary" type="submit">Save</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
   <!-- Edit modal-->
    <div class="modal fade" id="edit_image" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">ADD CATEGORY</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                        <i class="material-icons">clear</i>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group md-form-group is-filled">
                        <form action="" method="POST"  enctype="multipart/form-data" class="form-horizontal" autocomplete="off">
                            @csrf
                            <div class="row">
                                <label class="col-md-3 col-form-label">Bangla Name</label>
                                <div class="col-md-9">
                                    <div class="form-group has-default">
                                        <input class="form-control" type="text" name="image_name_bn" id="image_name_bn">
                                        <input type="hidden" class="id" name="id">
                                        @error('image_name_bn')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-md-3 col-form-label">English Name</label>
                                <div class="col-md-9">
                                    <div class="form-group has-default">
                                        <input class="form-control" type="text" name="image_name_en" id="image_name_en">
                                        @error('image_bangla_name')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button class="btn btn-danger mr-1" type="button" data-dismiss="modal">Close</button>
                                <button class="btn btn-primary" type="submit">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-link">Nice Button</button>
                <button type="button" class="btn btn-danger btn-link" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
@endsection

@push('js')
<script type="text/javascript">
   function cat_edit(id){
     $.ajax({
           'url': 'image/edit/'+id,
           'type': 'GET',
           'data': {},
          success:function(data){
           // empty data
           $('#image_name_bn').empty();
           $('#image_name_en').empty();
           $('.id').empty();
           // append data
           $('#image_name_bn').val(data.image_name_bn);
           $('#image_name_en').val(data.image_name_en);
           $('.id').val(data.id);
         },
     });
   };
</script>
<script>
   $(function() {
     $('.status_update').change(function() {
         var status = $(this).prop('checked') == true ? 1 : 0; 
         var id = $(this).data('id'); 
          
         $.ajax({
   
             url: 'image/status-update/'+id,
             type: "GET",
             data: {'status': status, 'id': id},
   
             success: function(data){
               Swal.fire(
                 'Success!',
                 '',
                 'success'
               )
             }
         });
     })
   })
</script>
<script>
   $(function() {
     $('.header_update').change(function() {
         var status = $(this).prop('checked') == true ? 1 : 0; 
         var id = $(this).data('id'); 
          
         $.ajax({
   
             url: 'image/show-header-update/'+id,
             type: "GET",
             data: {'status': status, 'id': id},
   
             success: function(data){
               Swal.fire(
                 'Success!',
                 '',
                 'success'
               )
             }
         });
     })
   })
</script>
@endpush