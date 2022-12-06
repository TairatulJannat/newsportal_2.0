@extends('backend.layouts.app')
@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-primary card-header-icon ">
                        <div class="card-icon">
                            <i class="material-icons">assignment</i>
                        </div>
                        <h4 class="card-title">MANAGE USER INFORMATION</h4>
                    </div>
              
                    <div class="material-datatables">
                        <table id="" class="table table-striped table-no-bordered table-hover filtertable" cellspacing="0" width="100%" style="width:100%">
                            <thead>
                                <tr>
                                    <th class="text-center">SN</th>
                                    <th class="text-center">User Name Bangla</th>
                                    <th class="text-center">User Name English</th>
                                    <th class="text-center">User Type</th>
                                    <!-- <th class="text-center">Password</th> -->
                                    <th class="text-center" style="width: 13%">Edit Password</th>
                                </tr>
                            </thead>
                        {{-- <tfoot>
                           <tr>
                                <th class="text-center">SN</th>
                                <th class="text-center">User Name Bangla</th>
                                <th class="text-center">User Name English</th>
                                <th class="text-center">User Type</th>
                                <th class="text-center" style="width: 13%">Edit Password</th>
                        </tfoot> --}}
                        <tbody>

                                @foreach ($user_informations as $key => $user_information)
                                    @if($user_information->type !='general_user' && $user_information->type !='সাধারণ_ব্যবহারকারী' )
                                            <tr>
                                                <td class="text-center align-top">{{ ++$key }}</td> 
                                                <td class="text-center align-top">{{ $user_information->name_bn }}</td>
                                                <td class="text-center align-top">{{ $user_information->name_en }}</td>
                                                <td class="text-center align-top">{{ $user_information->type }}</td>
                                                <!-- <td class="text-center align-top">{{ $user_information->password }}</td> -->
                                                <td class="td-actions text-center align-top">
                                                <a href="" onclick="userPasswordEdit({{$user_information->id}})" data-toggle="modal" data-target="#edit_category"  class="btn btn-link text-success">
                                                    <i class="material-icons">edit</i>
                                                </a>
                                                </td>
                                            </tr> 
                                    @endif  
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
</div> 
 <!-- Edit modal-->
 <div class="modal fade" id="edit_category" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                    <h4 class="modal-title">EDIT USER PASSWORD</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                            <i class="material-icons">clear</i>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group md-form-group is-filled">
                    <form action="{{ route('admin.user.password.updated')}}" method="POST" enctype="multipart/  form-data" class="form-horizontal" autocomplete="off">
                            @csrf  
                                <div class="row">
                                    <label class="col-md-3 col-form-label">Current Password</label>
                                    <div class="col-md-9">
                                        <div class="form-group">
                                        <input  readonly type="password" class="form-control" name ="pass" id="pass">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-md-3 col-form-label">New Password</label>
                                    <div class="col-md-9">
                                        <div class="form-group">
                                        <input type="password" class="form-control" id="new_pass" name = "new_pass">
                                        <input type="hidden" class="id" name="id" id="id">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-md-3 col-form-label">Confirm Password</label>
                                    <div class="col-md-9">
                                        <div class="form-group">
                                        <input type="password" class="form-control" name ="confirm_new_pass" id="confirm_new_pass">
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
            </div>
        </div>    
@endsection
@push('js')
<script type="text/javascript">
   function userPasswordEdit(id){
     $.ajax({
           'url': 'information_update/'+id,
           'type': 'GET',
           'data': {},
          success:function(data){
            console.log(data);
           // empty data
        //    $('#pass').empty();
           // append data
           $('#pass').val(data.password);
           $('#id').val(data.id);
            },
        });
    };
</script>

<script>
    $( "#confirm_new_pass" ).focusout(function() {
        // $( "#focus-count" ).text( "focusout fired: " + focus + "x" );
        // alert('hi');
        var new_pass = document.getElementById("new_pass").value;
        var confirm_new_pass = document.getElementById("confirm_new_pass").value;
        if( new_pass == '' && confirm_new_pass == ''){
            alert('Please fill up all the fild before submit');
        }
        else if(new_pass !== confirm_new_pass ){
            alert('password Does not match');
            $('#confirm_new_pass').val('');
        }

    })
</script>
@endpush