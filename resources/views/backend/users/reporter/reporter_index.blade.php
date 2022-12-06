@extends('backend.layouts.app')
@section('content')

<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-icon card-header-primary">
                        <div class="card-icon">
                            <i class="material-icons">perm_identity</i>
                        </div>
                        <h4 class="card-title">CREATE REPORTER-
                        <small class="category">Complete your profile</small>
                        </h4>
                    </div>
                    <div class="card-body">
                        <div class="toolbar">
                            <a href=""><button class="btn btn-primary"  data-target="#exampleModalCenter">View Reporter Table</button></a> 
                        </div>
                    <div class="card-body">
                        <form action=" " method="post">
                            @csrf
                            <div class="row">
                                <label class="col-md-6 col-form-label">Category Name</label>
                                <div class="col-md-6">
                                    <select class="selectpicker" data-style="select-with-transition" title="Choose Category" data-size="5" name="category_id">
                                        <option disabled> Choose Category</option>
                                            <option value=""></option>
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-md-6 col-form-label">Status</label>
                                <div class="col-md-6">
                                    <select class="selectpicker" data-style="select-with-transition" title="Choose Status" data-size="7" name="status">
                                        <option disabled> Choose</option>
                                        <option value="1">Active </option>
                                        <option value="0">InActive</option>
                                    </select>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-group"> Bangla Name</label>
                                        <input type="text" name="reporter_name_bn"class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                    <label class="form-group">English Name</label>
                                    <input type="text" name="reporter_name_en" class="form-control">
                                    </div>
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-group">Email</label>
                                        <input type="text" name="email" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-group">Password</label>
                                        <input type="text" name="password" class="form-control">
                                    </div>
                                </div>
                    
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-group">Phone Number</label>
                                        <input type="text" name="phone" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="form-group">Facebook</label>
                                        <input type="text" name="facebook" class="form-control">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="form-group">Present Address</label>
                                        <input type="text" name="present_address" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="form-group">Permanent Address</label>
                                        <input type="text" name="permanent_address" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="form-group">National ID</label>
                                        <input type="text" name="nid" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="form-group">Image</label>
                                    <input type="file" name="image" class="form-control">
                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary pull-right" href="">Save</button>
                            <div class="clearfix"></div>
                        </form>  
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> 

@endsection
@push('js')

<script>
    // $(function() {
    //   $('.status_update').change(function() {
    //       var status = $(this).prop('checked') == true ? 1 : 0; 
    //       var id = $(this).data('id'); 
           
    //       $.ajax({
    
    //           url: 'subcategory/status-update/'+id,
    //           type: "GET",
    //           data: {'status': status, 'id': id},
    
    //           success: function(data){
    //             Swal.fire(
    //               'Success!',
    //               '',
    //               'success'
    //             )
    //           }
    //       });
    //   })
    // })
 </script>


@endpush
<!-- summernote css/js -->

