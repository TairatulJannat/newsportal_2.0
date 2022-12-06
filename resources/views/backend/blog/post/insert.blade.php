@extends('backend.layouts.app')
   
@section('content')
    <div class="content">
        <div class="container-fluid">
            @isset($post)
            <div class="row">
                <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-primary card-header-icon">
                    <div class="card-icon">
                        <i class="material-icons">perm_identity</i>
                    </div>
                    
                    <h4 class="card-title">UPDATE BLOG POST -
                        <small class="category">Update your Blog Post</small>
                    </h4>
                    </div>
                    <div class="card-body">
                    <div class="toolbar">
                        <a href="{{route('admin.blog.post') }}"><button class="btn btn-rose">View Blog Post Table</button></a> 
                    </div>
                    <div class="card-body">
                        <form action="{{route('admin.blog.post.update')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <input type="text" name = "id" value = "{{$post->id}}" hidden>
                            <div class ="">
                                <div class="togglebutton">
                                    <label class="form-group" id ="bangla">Bangla</label>
                                        <label>
                                            <input type="checkbox" checked="" class="en_bn">
                                            <span class="toggle"></span>
                                        </label>
                                    <label class="form-group" id ="english" style=" color:white; font-weight:bold"> English</label>
                                </div> 
                            </div>
                            <div class="row en">
                                <div class="col-md-12 ">
                                    <div class="form-group">
                                    <label class="form-group">Title English</label>
                                    <input type="text" name="blog_title_en" class="form-control" value = "{{$post->blog_title_en}}" >
                                    @error('blog_title_en')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                    </div>
                                </div>
                                
                            </div>
                            <div class="row en">
                                <div class="col-md-12">
                                    <div class="form-group">
                                    <label class="form-group">Tag English</label>
                                    <input type="text" name="tag_en" class="form-control  tagsinput" data-role="tagsinput" data-color="info" value = "{{$post->tag_en}}">
                                    @error('tag_en')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                    </div>
                                </div>
                            </div>
                            
                            <div class="row bn">
                                <div class="col-md-12 ">
                                    <div class="form-group">
                                    <label class="form-group">বাংলা শিরোনাম</label>
                                    <input type="text" name="blog_title_bn" class="form-control" value = "{{$post->blog_title_bn}}">
                                    @error('blog_title_bn')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                    </div>
                                </div>
                                
                            </div>
                            <div class="row bn">
                                <div class="col-md-12">
                                    <div class="form-group">
                                    <label class="form-group">ট্যাগ</label>
                                    <input type="text" name="tag_bn" class="form-control tagsinput" data-role="tagsinput" data-color="info" value = "{{$post->tag_bn}}" >
                                    @error('tag_bn')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <label class="form-group">Category Name</label>
                                </div>
                                <div class="col-md-6">
                                    <select class="form-control" data-style="select-with-transition" data-size="7" id="category_id" name="blog_category_id" required="true">
                                        @if(!empty($blog_categories))
                                            @foreach($blog_categories as $key => $value)
                                                @if($post->id == $value->id)
                                                    <option selected value="{{ $value->id }}" style="background-color: black" selected>{{ $value->blog_category_name_en }} | {{ $value->blog_category_name_bn }}</option>
                                                @else
                                                    <option selected value="{{ $value->id }}" style="background-color: black">{{ $value->blog_category_name_en }} | {{ $value->blog_category_name_bn }}</option>   	
                                                @endif
                                            @endforeach
                                        @endif
                                    </select>
                                    <br>
                                    @error ('blog_category_id') <span style="color: red">{{ @$message }}</span> @enderror
                                </div>
                            </div>
                            <br>
                            <br>
                            <div class="col-md-12" >
                                <div class="fileinput fileinput-new text-center" data-provides="fileinput"> 
                                    <div class="fileinput-new thumbnail">
                                    <label class="md-label-floating">Blog Post Image</label>
                                        <img src="{{asset('public/uploads/backend/header/icon/1714575939543944.jpeg')}}" data-originaL="{{ asset($post->image) }}" alt="...">
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

                            <div class="row en">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="form-control"><strong>Description English</strong></label>
                                        <textarea  name="description_en"  class="ckeditor" >{{$post->description_en}}</textarea>
                                        @error('description')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row bn">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="form-control"><strong>বর্ণনা</strong></label>
                                        <textarea  name="description_bn"  class="ckeditor" >{{$post->description_bn}}</textarea>
                                        @error('description')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-rose pull-right" href="">Update</button>
                            <div class="clearfix"></div> 
                        </form>  
                    </div>
                </div>
                </div>
            </div>
            @else
            <div class="row">
                <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-primary card-header-icon">
                    <div class="card-icon">
                        <i class="material-icons">perm_identity</i>
                    </div>
                    <h4 class="card-title">Create Blog Post -
                        <small class="category">Complete your Blog Post</small>
                    </h4>
                    </div>
                    <div class="card-body">
                    <div class="toolbar">
                        <a href="{{route('admin.blog.post') }}"><button class="btn btn-rose">View Blog Post Table</button></a> 
                    </div>
                    <div class="card-body">
                        <form action="{{route('admin.blog.post.store')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class ="">
                                <div class="togglebutton">
                                    <label class="form-group" id ="bangla">Bangla</label>
                                        <label>
                                            <input type="checkbox" checked="" class="en_bn">
                                            <span class="toggle"></span>
                                        </label>
                                    <label class="form-group" id ="english" style=" color:white; font-weight:bold"> English</label>
                                </div> 
                            </div>
                            <div class="row en">
                                <div class="col-md-12 ">
                                    <div class="form-group">
                                    <label class="form-group">Title English</label>
                                    <input type="text" name="blog_title_en" class="form-control " >
                                    @error('blog_title_en')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                    </div>
                                </div>
                                
                            </div>
                            <div class="row en">
                                <div class="col-md-12">
                                    <div class="form-group">
                                    <label class="form-group">Tag English</label>
                                    <input type="text" name="tag_en" class="form-controltagsinput" data-role="tagsinput" data-color="info">
                                    @error('tag_en')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                    </div>
                                </div>
                            </div>
                            
                            <div class="row bn">
                                <div class="col-md-12 ">
                                    <div class="form-group">
                                    <label class="form-group">বাংলা শিরোনাম</label>
                                    <input type="text" name="blog_title_bn" class="form-control" >
                                    @error('blog_title_bn')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                    </div>
                                </div>
                                
                            </div>
                            <div class="row bn">
                                <div class="col-md-12">
                                    <div class="form-group">
                                    <label class="form-group">ট্যাগ</label>
                                    <input type="text" name="tag_bn" class="form-control tagsinput" data-role="tagsinput" data-color="info" >
                                    @error('tag_bn')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <label class="form-group">Category Name</label>
                                </div>
                                <div class="col-md-6">
                                    <select class="form-control" value="0" data-style="select-with-transition" data-size="7" id="category_id" name="blog_category_id">
                                        <option selected style="background-color: black" value=" ">--- Select One ---</option> @error ('blog_category_id') <span style="color: red">{{ @$message }}</span> @enderror
                                        @if(!empty($categories))
                                        @foreach($categories as $key => $value)
                                            <option value="{{ $value->id }}" style="background-color: black" >{{ $value->blog_category_name_en }} | {{ $value->blog_category_name_bn }}</option>
                                        @endforeach
                                        @endif
                                    </select> 
                                    @error ('blog_category_id') <span style="color: red">{{ @$message }}</span> @enderror
                                </div>
                            </div>
                            
                            <div class="col-md-12" >
                                <div class="fileinput fileinput-new text-center" data-provides="fileinput"> 
                                    <div class="fileinput-new thumbnail">
                                    <label class="md-label-floating">Blog Post Image</label>
                                    <p style="color:red">**not seleted yet**</p>
                                        <img src="{{asset('public/uploads/backend/header/icon/1714575939543944.jpeg')}}" data-original="{{asset('public\download.jpg')}}" alt="...">
                                    </div>
                                    <div class="fileinput-preview fileinput-exists thumbnail"></div>
                                    <div>
                                        <span class="btn btn-primary btn-round btn-file">
                                            <span class="fileinput-new">Select image</span>
                                            <span class="fileinput-exists">Change</span>
                                            <input class ="blog_image" id ="blog_image" type="file" name="image">
                                        </span>
                                        <a href="javascript:;" class="btn btn-danger btn-round fileinput-exists" data-dismiss="fileinput"><i class="fa fa-times"></i> Remove</a>
                                    </div>
                                </div>
                                <p style="color:red" id= "errImggallery" ></p>
                                <br>
                                @error ('image') <span  style="color: red">{{ @$message }}</span> @enderror
                            </div>

                            <div class="row en">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="form-control"><strong>Description English</strong></label>
                                        <textarea  name="description_en"  class="ckeditor"></textarea>
                                        @error('description_en')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row bn">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="form-control"><strong>বর্ণনা</strong></label>
                                        <textarea  name="description_bn"  class="ckeditor"></textarea>
                                        @error('description_bn')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-rose pull-right" href="">Save</button>
                            <div class="clearfix"></div> 
                        </form>  
                    </div>
                </div>
                </div>
        
            </div>
            @endisset
        </div>
      </div>
@endsection


@push('js')

<script>
    $( document ).ready(function() {
        
        $('.bn').hide();
        // document.getElementById("bn").style.visibility = "hidden";

    });
   $(function() {
     $('.en_bn').change(function() {
         var status = $(this).prop('checked') == true ? 1 : 0; 
         if(status==0){
            $('.en').hide();
            $('.bn').show();
            $('#bangla').css({ 'margin':'auto','font-weight':' bold','color': 'white' })
            $("#english").removeAttr("style");

            }
        else{
            $('.bn').hide();
            $('.en').show();
            $('#english').css({'margin':'auto','font-weight':' bold','color': 'white' })
            $("#bangla").removeAttr("style");
        }
     })
   })

   
   $( ".blog_image" ).change(function() {
            var img = document.getElementById('blog_image'); 
            // alert(img.clientWidth + 'x' + img.clientHeight);
            if(img.clientWidth < '1000' && img.clientHeight <'600'){
                $("#errImggallery").html("image resoluation maximum exceed");
            }

        });
</script>
@endpush