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
              <h4 class="card-title">Manage Images</h4>
            </div>
            <div class="card-body">
              <div class="toolbar">
                <button class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">  Create Image</button>
              </div>
              <div class="material-datatables">
                <table id="datatables" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                  <thead>
                    <tr>
                        <th class="text-center">SN</th>
                        <th class="text-center">Image</th>
                        <th class="text-center">Title Bangla Name</th>
                        <th class="text-center">Title English Name</th>
                        <th class="text-center">Discription Bangla Name</th>
                        <th class="text-center">Discription English Name</th>
                        <th class="text-center">Action</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                        <th class="text-center">SN</th>
                        <th class="text-center">Image</th>
                        <th class="text-center">Title Bangla Name</th>
                        <th class="text-center">Title English Name</th>
                        <th class="text-center">Discription Bangla Name</th>
                        <th class="text-center">Discription English Name</th>
                        <th class="text-center">Action</th>
                    </tr>
                  </tfoot>
                  <tbody>
                  @foreach ($imagies as $key => $image)
                    <tr>
                        <td class="text-center">{{ ++$key }}</td>
                        <td class="text-center"><img width="50" height="50" src="{{ asset($image->original_filename) }}" alt=""></td>
                        <td class="text-center">{{ $image->image_title_bn }}</td>
                        <td class="text-center">{{ $image->image_title_en }}</td>
                        <td class="text-center">{{ $image->image_description_bn }}</td>
                        <td class="text-center">{{ $image->image_description_en }}</td>
                        
                        
                        <td class="td-actions text-center">
                        <a href=""  data-toggle="tooltip" class="btn btn-link text-info">
                            <i class="material-icons">person</i>
                        </a>
                        <a href=""  data-toggle="modal" data-target="#edit_category"  class="btn btn-link text-success">
                            <i class="material-icons">edit</i>
                        <a href=""  data-toggle="tooltip" class="btn btn-link text-danger delete">
                            <i class="material-icons">close</i>
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
      <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenter" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title"></h5>
              <a href=""  data-toggle="tooltip" data-dismiss="modal" class="btn btn-link text-danger">
                <i class="material-icons">close</i>
            </a>
            </div>
                  <div class="modal-body">
                    <div class="row">
                        <div class="col">
                          <div class="card ">
                            <div class="card-header card-header-primary card-header-icon">
                              <div class="card-icon">
                                <i class="material-icons">contacts</i>
                              </div>
                              <h4 class="card-title">Add Image</h4>
                            </div>
                            <div class="card-body ">
                        <form action="{{ route('admin.image.store') }}" method="post"  enctype="multipart/form-data" class="form-horizontal" autocomplete="off">
                          @csrf
                              <div class="row">
                                  <label class="col-md-3 col-form-label">Image</label>
                                  <div class="col-md-9">
                                  <div class="picture-container">
                                      <div class="picture">
                              
                                      <input type="file" id="wizard-picture" name="original_filename">
                                  </div>
                                  </div>

                                  </div>
                                </div>

                                <div class="row">
                                  <label class="col-md-3 col-form-label">Title Bangla Name</label>
                                  <div class="col-md-9">
                                      <div class="form-group has-default">
                                          <input class="form-control" type="text" name="image_title_en">
                                          @error('image_title_en')
                                            <span class="text-danger">{{ $message }}</span>
                                          @enderror   
                                      </div>
                                  </div>  
                                </div>

                                <div class="row">
                                  <label class="col-md-3 col-form-label">Title English Name</label>
                                  <div class="col-md-9">
                                    <div class="form-group has-default">
                                        <input class="form-control" type="text" name="image_title_bn">
                                           @error('image_title_bn')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror      
                                    </div>
                                  </div>
                                </div>

                                <div class="row">
                                    <label class="col-md-3 col-form-label">Description Bangla Name</label>
                                    <div class="col-md-9">
                                      <div class="form-group has-default">
                                        <input class="form-control" type="text" name="image_description_bn">
                                           @error('image_description_bn')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror    
                                      </div>
                                   </div>
                                </div>
                                <div class="row">
                                    <label class="col-md-3 col-form-label">Description English Name</label>
                                    <div class="col-md-9">
                                      <div class="form-group has-default">
                                        <input class="form-control" type="text" name="image_description_en">
                                           @error('image_description_en')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror   
                                      </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button class="btn btn-danger mr-1" type="button" data-dismiss="modal">Close</button>
                                    <button class="btn btn-primary" name="submit" type="submit">Save</button>
                                </div>
                        </form>
                            </div>
                          </div>
                        </div>
                        </div>
                    </div>
                  </div>
                
       

        <!-- Edit modal-->
        <div class="modal fade" id="edit_category" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
            <div class="modal-dialog">
               <div class="modal-content">
                  <div class="modal-header">
                     <h4 class="modal-title">Add Category</h4>
                     <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                     <i class="material-icons">clear</i>
                     </button>
                  </div>
                  <div class="modal-body">
                     <div class="form-group md-form-group is-filled">
                        <form action="{{ route('admin.category.update')}}" method="POST"  enctype="multipart/form-data" class="form-horizontal" autocomplete="off">
                           @csrf
                           <div class="row">
                              <label class="col-md-3 col-form-label">Bangla Name</label>
                              <div class="col-md-9">
                                 <div class="form-group has-default">
                                    <input class="form-control" type="text" name="category_name_bn" id="category_name_bn">
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
                                    <input class="form-control" type="text" name="category_name_en" id="category_name_en">
                                    @error('category_bangla_name')
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
  </div>
@endsection
@push('js')
<script type="text/javascript">
    function image_edit(id){
      alert(id);
      $.ajax({
            'url': 'imagegallery/edit/'+id,
            'type': 'GET',
            'data': {},
           success:function(data){
            // empty data
            $('#original_filename').empty();
            $('#image_title_bn').empty();
            $('#image_title_en').empty();
            $('#image_description_bn').empty();
            $('#image_description_en').empty();
            $('.id').empty();
            // append data
            $('#original_filename').val(data.original_filename);
            $('#image_title_bn').val(data.image_title_bn);
            $('#image_title_en').val(data.image_title_en);
            $('#image_description_bn').val(data.image_description_bn);
            $('#image_description_en').val(data.image_description_en);
            $('.id').val(data.id);
          },
      });
    };
    </script>


@endpush