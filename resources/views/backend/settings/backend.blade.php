@extends('backend.layouts.app')
@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row ">
            <div class="col-md-12">
                <div class="card ">
                    <div class="card-header card-header-icon card-header-rose">
                        <div class="card-icon">
                            <i class="material-icons">perm_identity</i>
                        </div>
                        <h4 class="card-title">GENERAL SETTINGS -
                            <small class="category">Update Admin Panel Design</small>
                        </h4>
                    </div>
                    <div class="card-body">
                    
                        @isset($general_settings_backend)

                            <form action="{{ route( 'admin.settings.backend.update',$general_settings_backend->id ) }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="row"style="text-align: center">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="md-label-floating">Admin Site Title</label>
                                                    <input type="text" name="site_title" class= "form-control" value= "{{ $general_settings_backend->site_title }}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row"style="text-align: center">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="md-label-floating"> Admin Site Name</label>
                                                    <input type="text" name="site_name" class= "form-control" value= "{{ $general_settings_backend->site_name }}">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row "style="text-align: center">
                                    <div class="col-md-12" >
                                        <div class="fileinput fileinput-new text-center" data-provides="fileinput">

                                            @isset($general_settings_backend->admin_logo)
                                                <div class="fileinput-new thumbnail">
                                                    <label class="md-label-floating">Admin Logo</label>
                                                    <img style="display: inline-block;position: relative; object-fit: fill; border: 1px solid #ddd; height: 90px;" src="{{asset($general_settings_backend->admin_logo)}}" alt="...">
                                                </div>
                                            @else
                                                <div class="fileinput-new thumbnail">
                                                    <label class="md-label-floating">Admin Logo</label>
                                                    <p style="color:red">** Not selected yet **</p>
                                                    <img style="display: inline-block;position:block;object-fit: fill; border: 1px solid #ddd; height: 90px;" src="{{asset('public\download.png')}}" alt="...">
                                                </div>
                                            @endisset

                                            <div class="fileinput-preview fileinput-exists thumbnail"></div>
                                            <div>
                                                <span class="btn btn-primary btn-round btn-file">
                                                    <span class="fileinput-new">Select image</span>
                                                    <span class="fileinput-exists">Change</span>
                                                    <input type="file" name="admin_logo" />
                                                </span>
                                                <a href="javascript:;" class="btn btn-danger btn-round fileinput-exists" data-dismiss="fileinput"><i class="fa fa-times"></i> Remove</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row "style="text-align: center">
                                    <div class="col-md-12 " >
                                        <div class="fileinput fileinput-new text-center" data-provides="fileinput">

                                            @isset($general_settings_backend->icon)
                                                <div class="fileinput-new thumbnail">
                                                    <label class="md-label-floating">Site Icon</label>
                                                    <img style="display: inline-block;position:block;object-fit: fill; border: 1px solid #ddd; height: 90px;" src="{{asset($general_settings_backend->icon)}}" alt="...">
                                                </div>
                                            @else
                                                <div class="fileinput-new thumbnail">
                                                    <label class="md-label-floating">Site Icon</label>
                                                    <p style="color:red">** Not selected yet **</p>
                                                    <img style="display: inline-block;position:block;object-fit: fill; border: 1px solid #ddd; height: 90px;" src="{{asset('public\download.png')}}" alt="...">
                                                </div>
                                            @endisset

                                            <div class="fileinput-preview fileinput-exists thumbnail"></div>
                                            <div>
                                                <span class="btn btn-primary btn-round btn-file">
                                                    <span class="fileinput-new">Select image</span>
                                                    <span class="fileinput-exists">Change</span>
                                                    <input type="file" name="icon" />
                                                </span>
                                                <a href="javascript:;" class=" btn btn-danger btn-round fileinput-exists" data-dismiss="fileinput"><i class="fa fa-times"></i> Remove</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="text" name="id"class="form-control" value="{{$general_settings_backend->id}}"hidden>
                                        </div>
                                    </div>  
                                </div>                    
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <div class="form-group">
                                                <textarea class="form-control" rows="5"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <button type="submit" class="btn btn-rose pull-right">Update Backend Settings</button>
                                <div class="clearfix"></div>
                            </form>

                        @else

                            <form action="{{ route( 'admin.settings.backend.store' ) }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="md-label-floating">Admin Site Title</label>
                                                    <input type="text" name="site_title" class= "form-control" value= "">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="md-label-floating">Admin Site Name</label>
                                                    <input type="text" name="site_name" class= "form-control" value= "">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-4" >
                                        <div class="fileinput fileinput-new text-center" data-provides="fileinput">
                                            <div class="fileinput-new thumbnail">
                                                <label class="md-label-floating">Admin Logo</label>
                                                <p style="color:red">** Not selected yet **</p>
                                                <img style="display: inline-block;position:block;object-fit: fill; border: 1px solid #ddd; height: 90px;" src="{{asset('public\download.png')}}" alt="...">
                                            </div>
                                            <div class="fileinput-preview fileinput-exists thumbnail"></div>
                                            <div>
                                                <span class="btn btn-primary btn-round btn-file">
                                                    <span class="fileinput-new">Select image</span>
                                                    <span class="fileinput-exists">Change</span>
                                                    <input type="file" name="admin_logo" />
                                                </span>
                                                <a href="javascript:;" class="btn btn-danger btn-round fileinput-exists" data-dismiss="fileinput"><i class="fa fa-times"></i> Remove</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4" >
                                        <div class="fileinput fileinput-new text-center" data-provides="fileinput">
                                            <div class="fileinput-new thumbnail">
                                                <label class="md-label-floating">Site Icon</label>
                                                <p style="color:red">** Not selected yet **</p>
                                                <img style="display: inline-block;position:block;object-fit: fill; border: 1px solid #ddd; height: 90px;" src="{{asset('public\download.png')}}" alt="...">
                                            </div>
                                            <div class="fileinput-preview fileinput-exists thumbnail"></div>
                                            <div>
                                                <span class="btn btn-primary btn-round btn-file">
                                                    <span class="fileinput-new">Select image</span>
                                                    <span class="fileinput-exists">Change</span>
                                                    <input type="file" name="icon" />
                                                </span>
                                                <a href="javascript:;" class=" btn btn-danger btn-round fileinput-exists" data-dismiss="fileinput"><i class="fa fa-times"></i> Remove</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                                
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <div class="form-group">
                                                <textarea class="form-control" rows="5"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <button type="submit" class="btn btn-rose pull-right">Insert Backend Settings</button>
                                <div class="clearfix"></div>
                            </form>
                        @endisset
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection