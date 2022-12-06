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
                  <h4 class="card-title">MANAGE BLOG CATEGORIES</h4>
               </div>
               <div class="card-body">
                  <div class="toolbar">
                     <button class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">  Create Category For Blog</button>
                  </div>
                  <div class="material-datatables">
                     <table id="" class="table table-striped table-no-bordered table-hover filtertable" cellspacing="0" width="100%" style="width:100%">
                        <thead>
                           <tr>
                              <th class="text-center">SN</th>
                              <th class="text-center">Bangla Name</th>
                              <th class="text-center">English Name</th>
                              <th class="text-center">Status</th>
                              <th class="text-center">Action</th>
                           </tr>
                        </thead>
                        <tfoot>
                           <tr>
                              <th class="text-center">SN</th>
                              <th class="text-center">Bangla Name</th>
                              <th class="text-center">English Name</th>
                              <th class="text-center">Status</th>
                              <th class="text-center">Action</th>
                           </tr>
                        </tfoot>
                        <tbody>
                           @foreach ($categories as $key => $category)
                           <tr>
                              <td class="text-center">{{ ++$key }}</td>
                              <td class="text-center">{{ $category->blog_category_name_bn }}</td>
                              <td class="text-center">{{ $category->blog_category_name_en }}</td>
                              <td class="text-center">
                                 @if($category->status == 1)
                                 <div class="togglebutton">
                                    <label>
                                    <input type="checkbox" checked="" data-id="{{$category->id}}" name="status" class="status_update" value="{{ $category->status }}">
                                    <span class="toggle"></span>
                                    </label>
                                 </div>
                                 @else 
                                 <div class="togglebutton">
                                    <label>
                                    <input type="checkbox" unchecked="" data-id="{{$category->id}}" name="status" class="status_update"  value="{{ $category->status }}">
                                    <span class="toggle"></span>
                                    </label>
                                 </div>
                                 @endif
                              </td>
                              <td class="td-actions text-center">
                                 <a href=""  data-toggle="tooltip" class="btn btn-link text-info">
                                 <i class="material-icons">person</i>
                                 </a>
                                 <a href=""  onclick="blog_cat_edit({{$category->id }})"  data-toggle="modal" data-target="#edit_blog_category"  class="btn btn-link text-success">
                                 <i class="material-icons">edit</i>
                                 </a>
                                
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
                    <h4 class="modal-title">ADD BLOG CATEGORY</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                    <i class="material-icons">clear</i>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group md-form-group is-filled">
                        <form action="{{ route('admin.blog.category.store')}}" method="POST"  enctype="multipart/form-data" class="form-horizontal" autocomplete="off">
                            @csrf
                            <div class="row">
                            <label class="col-md-3 col-form-label">বাংলা নাম</label>
                            <div class="col-md-9">
                                <div class="form-group has-default">
                                    <input class="form-control" type="text" name="blog_category_name_bn">
                                    @error('blog_category_name_bn')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            </div>
                            <div class="row">
                            <label class="col-md-3 col-form-label">English Name</label>
                            <div class="col-md-9">
                                <div class="form-group has-default">
                                    <input class="form-control" type="text" name="blog_category_name_en">
                                    @error('blog_category_name_en')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
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
   <div class="modal fade" id="edit_blog_category" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
      <div class="modal-dialog">
         <div class="modal-content">
            <div class="modal-header">
               <h4 class="modal-title">Update Blog Category</h4>
               <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
               <i class="material-icons">clear</i>
               </button>
            </div>
            <div class="modal-body">
               <div class="form-group md-form-group is-filled">
                  <form action="{{ route('admin.blog.category.update')}}" method="POST"  enctype="multipart/form-data" class="form-horizontal" autocomplete="off">
                     @csrf
                     <div class="row">
                        <label class="col-md-3 col-form-label">বাংলা নাম</label>
                        <div class="col-md-9">
                           <div class="form-group has-default">
                              <input class="form-control" type="text" name="blog_category_name_bn" id="blog_category_name_bn">
                              <input type="hidden" class="id" name="id">
                              @error('category_name_bn')
                              <span class="text-danger">{{ $message }}</span>
                              @enderror
                           </div>
                        </div>
                     </div>
                     <div class="row">
                        <label class="col-md-3 col-form-label">English Name</label>
                        <div class="col-md-9">
                           <div class="form-group has-default">
                              <input class="form-control" type="text" name="blog_category_name_en" id="blog_category_name_en">
                              @error('category_bangla_name')
                              <span class="text-danger">{{ $message }}</span>
                              @enderror
                           </div>
                        </div>
                     </div>
                     <div class="modal-footer">
                        <button class="btn btn-danger mr-1" type="button" data-dismiss="modal">Close</button>
                        <button class="btn btn-primary" type="submit">Update</button>
                     </div>
                  </form>
               </div>
            </div>
         </div>

      </div>
    </div>
</div>

@endsection

@push('js')
<script type="text/javascript">
   function blog_cat_edit(id){
     $.ajax({
           'url': 'category/edit/'+id,
           'type': 'GET',
           'data': {},
          success:function(data){
            //  console.log(data);
         //   empty data
           $('#blog_category_name_bn').empty();
           $('#blog_category_name_en').empty();
           $('.id').empty();
           // append data
           $('#blog_category_name_bn').val(data.blog_category_name_bn);
           $('#blog_category_name_en').val(data.blog_category_name_en);
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
   
             url: 'category/status-update/'+id,
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