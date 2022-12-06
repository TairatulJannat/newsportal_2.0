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
                            <small class="category">Update Header</small>
                        </h4>
                    </div>
                    <div class="card-body">
                    
                        @isset($general_settings_fontend)

                            <form action="{{ route( 'admin.settings.fontend.header.update',$general_settings_fontend->id ) }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="md-label-floating">Site Title English</label>
                                                    <input type="text" name="site_title" class= "form-control" value= "{{ $general_settings_fontend->site_title }}">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="md-label-floating">Site Title Bangla</label>
                                                    <input type="text" name="site_name_bn" class= "form-control" value= "{{ $general_settings_fontend->site_name_bn }}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="md-label-floating">Site Name English</label>
                                                    <input type="text" name="site_name" class= "form-control" value= "{{ $general_settings_fontend->site_name }}">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="md-label-floating">Site Name Bangla</label>
                                                    <input type="text" name="site_name_bn" class= "form-control" value= "{{ $general_settings_fontend->site_name_bn }}">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    {{-- start_header_logo_english --}}
                                    <div class="col-md-4" >
                                        <div class="fileinput fileinput-new text-center" data-provides="fileinput">
                                            @isset($general_settings_fontend->fontend_header_logo)
                                                <div class="fileinput-new thumbnail">
                                                <label class="md-label-floating">Header Logo English</label>
                                                    <img style="display: inline-block;position: relative; object-fit: fill; border: 1px solid #ddd; height: 90px;" src="{{asset($general_settings_fontend->fontend_header_logo)}}" alt="...">
                                                </div>
                                            @else
                                                <div class="fileinput-new thumbnail">
                                                <label class="md-label-floating">Header Logo English</label>
                                                <p style="color:red">**not seleted yet**</p>
                                                    <img style="display: inline-block;position:block;object-fit: fill; border: 1px solid #ddd; height: 90px;" src="{{asset('public\download.png')}}" alt="...">
                                                </div>
                                            @endisset

                                            <div class="fileinput-preview fileinput-exists thumbnail"></div>

                                            <div>
                                                <span class="btn btn-primary btn-round btn-file">
                                                    <span class="fileinput-new">Select image</span>
                                                    <span class="fileinput-exists">Change</span>
                                                    <input type="file" name="header_logo" />
                                                </span>
                                                <a href="javascript:;" class="btn btn-danger btn-round fileinput-exists" data-dismiss="fileinput"><i class="fa fa-times"></i> Remove</a>
                                            </div>
                                        </div>
                                    </div>
                                     {{-- end_header_logo_english --}}

                                     {{-- start_header_logo_bangla --}}
                                    <div class="col-md-4" >
                                        <div class="fileinput fileinput-new text-center" data-provides="fileinput">
                                            @isset($general_settings_fontend->fontend_header_logo_bn)
                                                <div class="fileinput-new thumbnail">
                                                <label class="md-label-floating">Header Logo Bangla</label>
                                                    <img style="display: inline-block;position: relative; object-fit: fill; border: 1px solid #ddd; height: 90px;" src="{{asset($general_settings_fontend->fontend_header_logo_bn)}}" alt="...">
                                                </div>
                                            @else
                                                <div class="fileinput-new thumbnail">
                                                <label class="md-label-floating">Header Logo Bangla</label>
                                                <p style="color:red">**not seleted yet**</p>
                                                    <img style="display: inline-block;position:block;object-fit: fill; border: 1px solid #ddd; height: 90px;" src="{{asset('public\download.png')}}" alt="...">
                                                </div>
                                            @endisset

                                            <div class="fileinput-preview fileinput-exists thumbnail"></div>

                                            <div>
                                                <span class="btn btn-primary btn-round btn-file">
                                                    <span class="fileinput-new">Select image</span>
                                                    <span class="fileinput-exists">Change</span>
                                                    <input type="file" name="fontend_header_logo_bn" />
                                                </span>
                                                <a href="javascript:;" class="btn btn-danger btn-round fileinput-exists" data-dismiss="fileinput"><i class="fa fa-times"></i> Remove</a>
                                            </div>
                                        </div>
                                    </div>
                                     {{-- end_header_logo_bangla--}}

                                    {{-- start_site_icon_english --}}
                                    <div class="col-md-4" >
                                        <div class="fileinput fileinput-new text-center" data-provides="fileinput">

                                            @isset($general_settings_fontend->icon)
                                                <div class="fileinput-new thumbnail">
                                                <label class="md-label-floating">Site Icon English</label>
                                                    <img style="display: inline-block;position:block;object-fit: fill; border: 1px solid #ddd; height: 90px;" src="{{asset($general_settings_fontend->icon)}}" alt="...">
                                                </div>
                                            @else
                                                <div class="fileinput-new thumbnail">
                                                <label class="md-label-floating">Site Icon English</label>
                                                <p style="color:red">**not seleted yet**</p>
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
                                    {{-- start_site_icon_english --}}

                                    {{-- start_site_icon_bangla --}}
                                    <div class="col-md-4" >
                                        <div class="fileinput fileinput-new text-center" data-provides="fileinput">

                                            @isset($general_settings_fontend->icon_bn)
                                                <div class="fileinput-new thumbnail">
                                                <label class="md-label-floating">Site Icon Bangla</label>
                                                    <img style="display: inline-block;position:block;object-fit: fill; border: 1px solid #ddd; height: 90px;" src="{{asset($general_settings_fontend->icon_bn)}}" alt="...">
                                                </div>
                                            @else
                                                <div class="fileinput-new thumbnail">
                                                <label class="md-label-floating">Site Icon Bangla</label>
                                                <p style="color:red">**not seleted yet**</p>
                                                    <img style="display: inline-block;position:block;object-fit: fill; border: 1px solid #ddd; height: 90px;" src="{{asset('public\download.png')}}" alt="...">
                                                </div>
                                            @endisset

                                            <div class="fileinput-preview fileinput-exists thumbnail"></div>
                                            <div>
                                                <span class="btn btn-primary btn-round btn-file">
                                                    <span class="fileinput-new">Select image</span>
                                                    <span class="fileinput-exists">Change</span>
                                                    <input type="file" name="icon_bn" />
                                                </span>
                                                <a href="javascript:;" class=" btn btn-danger btn-round fileinput-exists" data-dismiss="fileinput"><i class="fa fa-times"></i> Remove</a>
                                            </div>
                                        </div>
                                    </div>
                                    {{-- start_site_icon_bangla --}}
                                    
                                </div>

                                {{-- live link button --}}
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="md-label-floating">live link</label>

                                            @isset($live_link)    
                                                <input type="text" disabled class= "form-control" value= "{{ $live_link->live_link }}">      
                                            @else
                                                <input type="text" class= "form-control"disabled >
                                            @endisset
                                    
                                        </div>
                                    </div>
                                    <div class = "row md-label-floating" >
                                        <div class = "col-md-6"> 
                                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter"> Add Live Link</button>
                                        </div>

                                        @isset($live_link)
                                        <div class = "col-md-6">
                                            <a href="{{ route('admin.settings.fontend.livelink.clear',$live_link->id) }}" class="btn btn-primary">Clear Live Link</a> 
                                        </div>
                                        @endisset

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
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <div class="form-group">
                                                <textarea class="form-control" rows="5"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <button type="submit" class="btn btn-rose pull-right">Update Header</button>
                                <div class="clearfix"></div>
                            </form>

                        @else

                            <form action="{{ route( 'admin.settings.fontend.header.store' ) }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="md-label-floating">Site Title English</label>
                                                    <input type="text" name="site_title" class= "form-control" value= "">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="md-label-floating">Site Title Bangla</label>
                                                    <input type="text" name="site_name_bn" class= "form-control" value= "">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="md-label-floating">Site Name English</label>
                                                    <input type="text" name="site_name" class= "form-control" value= "">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="md-label-floating">Site Name Bangla</label>
                                                    <input type="text" name="site_name_bn" class= "form-control" value= "">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    {{-- start_header_logo_english --}}
                                    <div class="col-md-4" >
                                        <div class="fileinput fileinput-new text-center" data-provides="fileinput">
                                            <div class="fileinput-new thumbnail">
                                                <label class="md-label-floating">Header Logo English</label>
                                                <p style="color:red">**not seleted yet**</p>
                                                    <img style="display: inline-block;position:block;object-fit: fill; border: 1px solid #ddd; height: 90px;" src="{{asset('public\download.png')}}" alt="...">
                                            </div>
                                            <div class="fileinput-preview fileinput-exists thumbnail"></div>
                                            <div>
                                                <span class="btn btn-primary btn-round btn-file">
                                                    <span class="fileinput-new">Select image</span>
                                                    <span class="fileinput-exists">Change</span>
                                                    <input type="file" name="header_logo" />
                                                </span>
                                                <a href="javascript:;" class="btn btn-danger btn-round fileinput-exists" data-dismiss="fileinput"><i class="fa fa-times"></i> Remove</a>
                                            </div>
                                        </div>
                                    </div>
                                    {{-- end_header_logo_english --}}

                                    {{-- start_header_logo_bangla --}}
                                    <div class="col-md-4" >
                                        <div class="fileinput fileinput-new text-center" data-provides="fileinput">
                                            <div class="fileinput-new thumbnail">
                                                <label class="md-label-floating">Header Logo Bangla</label>
                                                <p style="color:red">**not seleted yet**</p>
                                                    <img style="display: inline-block;position:block;object-fit: fill; border: 1px solid #ddd; height: 90px;" src="{{asset('public\download.png')}}" alt="...">
                                            </div>
                                            <div class="fileinput-preview fileinput-exists thumbnail"></div>
                                            <div>
                                                <span class="btn btn-primary btn-round btn-file">
                                                    <span class="fileinput-new">Select image</span>
                                                    <span class="fileinput-exists">Change</span>
                                                    <input type="file" name="fontend_header_logo_bn" />
                                                </span>
                                                <a href="javascript:;" class="btn btn-danger btn-round fileinput-exists" data-dismiss="fileinput"><i class="fa fa-times"></i> Remove</a>
                                            </div>
                                        </div>
                                    </div>
                                    {{-- end_header_logo_bangla --}}

                                    {{-- start_site_icon_english --}}
                                    <div class="col-md-4" >
                                        <div class="fileinput fileinput-new text-center" data-provides="fileinput">
                                            <div class="fileinput-new thumbnail">
                                            <label class="md-label-floating">Site Icon English</label>
                                            <p style="color:red">**not seleted yet**</p>
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
                                    {{-- end_site_icon_english --}}

                                    {{-- start_site_icon_bangla --}}
                                    <div class="col-md-4" >
                                        <div class="fileinput fileinput-new text-center" data-provides="fileinput">
                                            <div class="fileinput-new thumbnail">
                                            <label class="md-label-floating">Site Icon Bangla</label>
                                            <p style="color:red">**not seleted yet**</p>
                                                <img style="display: inline-block;position:block;object-fit: fill; border: 1px solid #ddd; height: 90px;" src="{{asset('public\download.png')}}" alt="...">
                                            </div>
                                            <div class="fileinput-preview fileinput-exists thumbnail"></div>
                                            <div>
                                                <span class="btn btn-primary btn-round btn-file">
                                                    <span class="fileinput-new">Select image</span>
                                                    <span class="fileinput-exists">Change</span>
                                                    <input type="file" name="icon_bn" />
                                                </span>
                                                <a href="javascript:;" class=" btn btn-danger btn-round fileinput-exists" data-dismiss="fileinput"><i class="fa fa-times"></i> Remove</a>
                                            </div>
                                        </div>
                                    </div>
                                    {{-- end_site_icon_bangla--}}
                                </div>

                                {{-- live link button --}}
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="md-label-floating">live link</label>
                                            @isset($live_link)    
                                                <input type="text" disabled class= "form-control" value= "{{ $live_link->live_link }}">      
                                            @else
                                                <input type="text" disabled class= "form-control" >
                                            @endisset
                                        </div>
                                    </div>
                                    <div class = "row md-label-floating" >
                                        <div class = "col-md-6"> 
                                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter"> Add Live Link</button>
                                        </div>

                                        @isset($live_link)
                                            <div class = "col-md-6">
                                                <a href="{{ route('admin.settings.fontend.livelink.clear',$live_link->id) }}" class="btn btn-primary">Clear Live Link</a> 
                                            </div>
                                        @endisset

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

                                <button type="submit" class="btn btn-rose pull-right">Insert Header</button>
                                <div class="clearfix"></div>
                            </form>

                        @endisset
                    </div>
                </div>
            </div>
        </div>

        <!-- Add modal-->
        <!-- Add modal-->
        <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Add Live Link</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                            <i class="material-icons">clear</i>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group md-form-group is-filled">
                            <form action="{{ route('admin.settings.fontend.livelink.store') }}" method="POST"  enctype="multipart/form-data" class="form-horizontal" autocomplete="off">
                                @csrf
                                <div class="row">
                                    <label class="col-md-3 col-form-label">live Link </label>
                                    <div class="col-md-9">
                                        <div class="form-group has-default">

                                            @isset($live_link)
                                                <input class="form-control" type="text" name="live_link" value = {{ $live_link->live_link }}>
                                            @else
                                                <input class="form-control" type="text" name="live_link">
                                            @endisset
                                   
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
        {{-- <--endmodal--> --}}
    </div>
</div>
@endsection

@push('js')
<script type="text/javascript">
// $(function() {
//      $('#live').change(function() {
//         var status = $(this).prop('checked') == true ? 1 : 0; 
//         alert('hi');
//         if(status==1){
//             sessionStorage.setItem("is_live", '1');
//         }
//         else
//         sessionStorage.setItem("is_live", '0');
//      })
//    })

//    $(function() {
//      $('#save').click(function() {
//         event.preventDefault();
//         alert('hi');
//         var link=document.getElementById("live_link").value;
//         var status = $('#live').prop('checked') == true ? 1 : 0;
//         if(status==1){
//             sessionStorage.setItem("live_link",link );
//         }
//         var live = sessionStorage.getItem("is_live");
//         var live_link = sessionStorage.getItem("live_link");
//         console.log(live,live_link);
//      })
//    })
//    $(function() {
//      $('#clear').click(function() {
//         event.preventDefault();
//         // alert('hi');
//         document.getElementById("live_link").value = "";
//         $("#live").prop("checked", false);
//         sessionStorage.clear();
//      })
//    })
    
</script>
@endpush