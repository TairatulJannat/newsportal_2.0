<div class ="row">
    <div class="col-md-4">
        <div class="panel panel-dark panel-colorful">
            <div class="panel-heading">
                <h3 class="panel-title text-center ">
                Information</h1>
            </div>
            <div class="panel-body" style="padding:0px;">
                <div class="pad-all">
                    <div class="table-responsive">
                        <table class="table table-hover"   >
                            <tbody>
                                <tr>
                                    <td>Position</td>
                                    <td>:</td>
                                    <td>Bellow Tab Content</td>
                                </tr>
                                <tr>
                                    <td>Page</td>
                                    <td>:</td>
                                    <td>Right column</td>
                                </tr>
                                <tr>
                                    <td>Format </td>
                                    <td>:</td>
                                    <td>Banner</td>
                                </tr>
                                <tr>
                                    <td>Size</td>
                                    <td>:</td>
                                    <td>350*280</td>
                                </tr>
                                <tr>
                                    <td>Status</td>
                                    <td>:</td>
                                    <td>
                                        <div class="togglebutton">
                                            <label>
                                            @foreach ( $advertisements as $advertisement)
                                                @if ( $advertisement->position == 'bellow_tab_content')
                                                    @if ($advertisement->ads_status == 1)
                                                        <input type="checkbox" class="status" checked data-id="{{$advertisement->id}}" name="ads_status" onclick="status( {{$advertisement->id}} )" value="{{$advertisement->ads_status }}">  
                                                    @else
                                                        <input type="checkbox"  class="status"  data-id="{{$advertisement->id}}" name="ads_status" onclick="status( {{$advertisement->id}} )" value="{{$advertisement->ads_status }}"> 
                                                    @endif
                                                @endif
                                            @endforeach
                                            <span class="toggle"></span>
                                            </label>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6 ">
        <div class="panel  " style ="margin-top: 10%; margin-left:15%">
           
            @isset($advertisements)
                @foreach ($advertisements as $advertisement)
                    @if ($advertisement->position == 'bellow_tab_content')
                        <form action="{{ route('admin.ads.store') }}" class="form-horizontal" method="post" id="" enctype="multipart/form-data" accept-charset="utf-8">
                            @csrf
                            <input type="hidden" name="position" value="bellow_tab_content"> 
                            <input type="hidden" name="page_name" value="Right_column">                                                                                            
                            <div class="panel-body">
                                <div class="form-group margin-top-10">
                                    <div class="form-group">
                                        <label for="exampleEmail" class="md-label-floating">Redirect Url </label>
                                        @if($advertisement !== null && $advertisement->position == 'bellow_tab_content')
                                            <input type="text" class="form-control" name="redirect_url" id="exampleEmail" value = "{{ $advertisement->ads_link }}">
                                        @else
                                            <input type="text" class="form-control" name="redirect_url" id="exampleEmail">
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group margin-top-10">
                                    <label class="col-sm-3 control-label">Image</label>
                                    <div class="col-sm-9">
                                        <div class="fileinput-new text-center" style = "width:400; object-fit:contain;"  data-provides="fileinput">
                                            <div class="fileinput-new thumbnail">
                                                @if($advertisement !== null && $advertisement->position == 'bellow_tab_content')
                                                    <img  height = "50" style = "width:400; object-fit:contain;" src="{{ asset($advertisement->image) }}" alt="...">
                                                @else
                                                    <img  height = "50" style = "width:400; object-fit:contain;" src="{{ asset('public/header_1.jpg') }}" alt="...">
                                                @endif
                                                
                                            </div>
                                            <div class="fileinput-preview fileinput-exists thumbnail"></div>
                                            <div>
                                                <span class="btn btn-primary btn-round btn-file">
                                                <span class="fileinput-new">Select image</span>
                                                <span class="fileinput-exists">Change</span>
                                                <input  type="file" name="image"/>
                                                </span>
                                                <a href="javascript:;" class="btn btn-danger btn-round fileinput-exists" data-dismiss="fileinput"><i class="fa fa-times"></i> Remove</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="panel-footer text-right">
                                <input type="submit" class="btn btn-success btn-labeled fa fa-check submitter enterer" value = "Update">
                            </div>
                        </form> 
                    @endif
                @endforeach

            @else
                <form action="{{ route('admin.ads.store') }}" class="form-horizontal" method="post" id="" enctype="multipart/form-data" accept-charset="utf-8">
                    
                    @csrf
                    <input type="hidden" name="position" value="bellow_tab_content"> 
                    <input type="hidden" name="page_name" value="Right_column">                                                                                            
                    <div class="panel-body">
                        <div class="form-group margin-top-10">
                            <div class="form-group">
                                <label for="exampleEmail" class="md-label-floating">Redirect Url </label>
                                <input type="text" class="form-control" name="redirect_url" id="exampleEmail">
                            </div>
                        </div>
                        <div class="form-group margin-top-10">
                            <label class="col-sm-3 control-label">Image</label>
                            <div class="col-sm-9">
                                <div class="fileinput-new text-center" style = "width:400; object-fit:contain;"  data-provides="fileinput">
                                    <div class="fileinput-new thumbnail">
                                            <img  height = "50" style = "width:400; object-fit:contain;" src="{{ asset('public/header_1.jpg') }}" alt="...">
                                    </div>
                                    <div class="fileinput-preview fileinput-exists thumbnail"></div>
                                    <div>
                                        <span class="btn btn-primary btn-round btn-file">
                                        <span class="fileinput-new">Select image</span>
                                        <span class="fileinput-exists">Change</span>
                                        <input type="file" name="image"/>
                                        </span>
                                        <a href="javascript:;" class="btn btn-danger btn-round fileinput-exists" data-dismiss="fileinput"><i class="fa fa-times"></i> Remove</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="panel-footer text-right">
                        <input type="submit" class="btn btn-success btn-labeled fa fa-check submitter enterer" value = "Save">
                    </div>
                </form>
            @endisset
        </div>
    </div>
</div>
@push('js')
<script>
    function status(id){
        var status = $(this).prop('checked') == true ? 1 : 0; 
        // alert(status);
        // alert(id);
        $.ajax({
            
            url: "{{ route('admin.ads.status') }}" ,
            type: "GET",
            data: {'id': id},
            // alert(data);
            success: function(data){
            Swal.fire(
                'Success!',
                '',
                'success'
            )
            setTimeout(function(){// wait for 5 secs(2)
                location.reload(); // then reload the page.(3)
            }, 2000);
            }
        });
    }
    
 </script>
 @endpush