@extends('backend.layouts.app')
@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-icon card-header-rose">
                        <div class="card-icon">
                            <i class="material-icons">perm_identity</i>
                        </div>
                        <h4 class="card-title">GENERAL SETTINGS -
                            <small class="category">Update Footer</small>
                        </h4>
                    </div>
                    <div class="card-body">
                    
                        @isset($general_settings_fontend)

                    

                            <form action="{{ route( 'admin.settings.fontend.footer.update',$general_settings_fontend->id ) }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="md-label-floating">Director Name English</label>
                                                    <input type= "text" class= "form-control" name= "director_name" value= " {{ $general_settings_fontend->director_name }}">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="md-label-floating">Director Name Bnagla</label>
                                                    <input type= "text" class= "form-control" name= "director_name_bn" value= " {{ $general_settings_fontend->director_name_bn }}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="md-label-floating">Editor Name English</label>
                                                    <input type="text" name="editor_name" class= "form-control" value= "{{ $general_settings_fontend->editor_name }}">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="md-label-floating">Editor Name Bangla</label>
                                                    <input type="text" name="editor_name_bn" class= "form-control" value= "{{ $general_settings_fontend->editor_name_bn }}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6" >
                                                <div class="form-group">
                                                    <label class="md-label-floating">Publisher Name English</label>
                                                    <input type="text" name="publisher_name" class="form-control" value="{{ $general_settings_fontend->publisher_name}}">
                                                </div>
                                            </div>
                                            <div class="col-md-6" >
                                                <div class="form-group">
                                                    <label class="md-label-floating">Publisher Name Bangla</label>
                                                    <input type="text" name="publisher_name_bn" class="form-control" value="{{ $general_settings_fontend->publisher_name_bn}}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="md-label-floating">Phone</label>
                                                    <input type="text" name="phone" class="form-control" value="{{ $general_settings_fontend->phone }}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="md-label-floating">Email</label>
                                                    <input type="text" name="email" class="form-control" value="{{ $general_settings_fontend->email }}">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    {{-- start_footer_logo_english --}}
                                    <div class="col-md-6" >
                                        <div class="fileinput fileinput-new text-center" data-provides="fileinput">
                                            @isset($general_settings_fontend->footer_logo)
                                                <div class="fileinput-new thumbnail">
                                                <label class="md-label-floating">Footer Logo English</label>
                                                    <img src="{{asset($general_settings_fontend->footer_logo)}}" alt="...">
                                                </div>
                                            @else
                                                <div class="fileinput-new thumbnail">
                                                <label class="md-label-floating">Footer Logo English</label>
                                                <p style="color:red">**not seleted yet**</p>
                                                    <img src="{{asset('public\download.jpg')}}" alt="...">
                                                </div>
                                            @endisset
                                            <div class="fileinput-preview fileinput-exists thumbnail"></div>
                                            <div>
                                                <span class="btn btn-primary btn-round btn-file">
                                                    <span class="fileinput-new">Select image</span>
                                                    <span class="fileinput-exists">Change</span>
                                                    <input type="file" name="footer_logo" />
                                                </span>
                                                <a href="javascript:;" class="btn btn-danger btn-round fileinput-exists" data-dismiss="fileinput"><i class="fa fa-times"></i> Remove</a>
                                            </div>
                                        </div>
                                        {{-- end_footer_logo_english --}}
                                        
                                        {{-- start_footer_logo_bangla --}}
                                        <div class="col-md-6" >
                                            <div class="fileinput fileinput-new text-center" data-provides="fileinput">
                                                @isset($general_settings_fontend->footer_logo_bn)
                                                    <div class="fileinput-new thumbnail">
                                                    <label class="md-label-floating">Footer Logo Bangla</label>
                                                        <img src="{{asset($general_settings_fontend->footer_logo_bn)}}" alt="...">
                                                    </div>
                                                @else
                                                    <div class="fileinput-new thumbnail">
                                                    <label class="md-label-floating">Footer Logo Bangla</label>
                                                    <p style="color:red">**not seleted yet**</p>
                                                        <img src="{{asset('public\download.jpg')}}" alt="...">
                                                    </div>
                                                @endisset
                                                <div class="fileinput-preview fileinput-exists thumbnail"></div>
                                                <div>
                                                    <span class="btn btn-primary btn-round btn-file">
                                                        <span class="fileinput-new">Select image</span>
                                                        <span class="fileinput-exists">Change</span>
                                                        <input type="file" name="footer_logo_bn" />
                                                    </span>
                                                    <a href="javascript:;" class="btn btn-danger btn-round fileinput-exists" data-dismiss="fileinput"><i class="fa fa-times"></i> Remove</a>
                                                </div>
                                            </div>
                                        </div>
                                      {{-- end_footer_logo_bangla --}}
                                    </div>
                                    
                                    
                                </div>                           
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="text" name="id"class="form-control" value="{{$general_settings_fontend->id}}"hidden>
                                        </div>
                                    </div>  
                                </div>                    
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="md-label-floating">Address</label>
                                            <input type="text" name="address" class="form-control" value="{{$general_settings_fontend->address}}">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="md-label-floating">Description English</label>
                                            <textarea class="ckeditor" name="description">{{$general_settings_fontend->description}}</textarea>
                                        </div>
                                    </div> 
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="md-label-floating">Description Bangla</label>
                                            <textarea class="ckeditor" name="description_bn">{{$general_settings_fontend->description_bn}}</textarea>
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

                                <button type="submit" class="btn btn-rose pull-right">Update Footer</button>
                                <div class="clearfix"></div>
                            </form>

                        @else

                            <form action="{{ route( 'admin.settings.fontend.footer.store' ) }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="md-label-floating">Director Name English</label>
                                                    <input type= "text" class= "form-control" name= "director_name">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="md-label-floating">Director Name Bangla</label>
                                                    <input type= "text" class= "form-control" name= "director_name_bn">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="md-label-floating">Editor Name English</label>
                                                    <input type="text" name="editor_name" class= "form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="md-label-floating">Editor Name Bangla</label>
                                                    <input type="text" name="editor_name_bn" class= "form-control">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6" >
                                                <div class="form-group">
                                                    <label class="md-label-floating">Publisher Name English</label>
                                                    <input type="text" name="publisher_name" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-6" >
                                                <div class="form-group">
                                                    <label class="md-label-floating">Publisher Name Bangla</label>
                                                    <input type="text" name="publisher_name_bn" class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="md-label-floating">Phone</label>
                                                    <input type="text" name="phone" class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="md-label-floating">Email</label>
                                                    <input type="text" name="email" class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    {{-- start_footer_english --}}
                                    <div class="col-md-6" >
                                        <div class="fileinput fileinput-new text-center" data-provides="fileinput">
                                            <div class="fileinput-new thumbnail">
                                            <label class="md-label-floating">Footer Logo English</label>
                                            <p style="color:red">**not seleted yet**</p>
                                                <img src="{{asset('public\download.jpg')}}" alt="...">
                                            </div>
                                            <div class="fileinput-preview fileinput-exists thumbnail"></div>
                                            <div>
                                                <span class="btn btn-primary btn-round btn-file">
                                                    <span class="fileinput-new">Select image</span>
                                                    <span class="fileinput-exists">Change</span>
                                                    <input type="file" name="footer_logo" />
                                                </span>
                                                <a href="javascript:;" class="btn btn-danger btn-round fileinput-exists" data-dismiss="fileinput"><i class="fa fa-times"></i> Remove</a>
                                            </div>
                                        </div>
                                    </div>
                                    {{-- end_footer_english --}}

                                    {{-- start_footer_bangla --}}
                                    <div class="col-md-6" >
                                        <div class="fileinput fileinput-new text-center" data-provides="fileinput">
                                            <div class="fileinput-new thumbnail">
                                            <label class="md-label-floating">Footer Logo Bangla</label>
                                            <p style="color:red">**not seleted yet**</p>
                                                <img src="{{asset('public\download.jpg')}}" alt="...">
                                            </div>
                                            <div class="fileinput-preview fileinput-exists thumbnail"></div>
                                            <div>
                                                <span class="btn btn-primary btn-round btn-file">
                                                    <span class="fileinput-new">Select image</span>
                                                    <span class="fileinput-exists">Change</span>
                                                    <input type="file" name="footer_logo_bn" />
                                                </span>
                                                <a href="javascript:;" class="btn btn-danger btn-round fileinput-exists" data-dismiss="fileinput"><i class="fa fa-times"></i> Remove</a>
                                            </div>
                                        </div>
                                    </div>
                                    {{-- end_footer_bangla --}}
                                    
                                </div>
                                                
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="md-label-floating">Address</label>
                                            <input type="text" name="address" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-control"><strong>Description English</strong></label>
                                            <textarea class="ckeditor form-control" name="description"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-control"><strong>Description Bangla</strong></label>
                                            <textarea class="ckeditor form-control" name="description_bn"></textarea>
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

                                <button type="submit" class="btn btn-rose pull-right">Insert Footer</button>
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
