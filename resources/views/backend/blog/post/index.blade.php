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
                            @if (Route::currentRouteName() == 'admin.blog.post' )
                                <h4 class="card-title">MANAGE PUBLISHED BLOG POST</h4>
                            @elseif(Route::currentRouteName() == 'admin.blog.post.pending')
                                <h4 class="card-title">MANAGE PENDING BLOG POST</h4>
                            @elseif(Route::currentRouteName() == 'admin.blog.post.correction')
                                <h4 class="card-title">MANAGE CORRECTION BLOG POST</h4>
                            @endif
                        </div>
                        <div class="card-body">
                            <div class="toolbar">
                                <div class="toolbar">
                                    <a href="{{route('admin.blog.post.insert') }}"><button class="btn btn-rose">CREATE NEW BLOG POST</button></a> 
                                </div>
                            </div>
                            <div class="material-datatables">
                                <table id="" class="table table-striped table-no-bordered table-hover filtertable" cellspacing="0" width="100%" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th class="text-center">SN</th>
                                            <th class="text-center">Title English</th>
                                            <th class="text-center">Title Bangla</th>
                                            <th class="text-center">Category Name English</th>
                                            <th class="text-center">Category Name Bangla</th>
                                            <th class="text-center">Image</th>
                                            @if (Route::currentRouteName() == 'admin.blog.post' )
                                                <th class="text-center">Action</th>

                                            @elseif(Route::currentRouteName() == 'admin.blog.post.pending')
                                                @if (Auth::user()->type == 'reporter')
                                                    <th class="text-center">Action</th>
                                                @endif
                                                
                                            @elseif(Route::currentRouteName() == 'admin.blog.post.correction')
                                                <th class="text-center">Action</th>
                                            @endif
                                        </tr>
                                    </thead>
                                  
                                    <tbody>
                                        @if (Route::currentRouteName() == 'admin.blog.post' )
                                            @foreach ($blog_posts as $key => $blog_post)
                                                <tr>
                                                    <td class="text-left align-top">{{ ++$key }}</td>
                                                    <td  data-toggle="modal" data-target="#correction_blog_post" class="text-left align-top" onclick="post_stage({{$blog_post->id }})">{{ $blog_post->blog_title_en }}</td>
                                                    <td  data-toggle="modal" data-target="#correction_blog_post" class="text-left align-top" onclick="post_stage({{$blog_post->id }})">{{ $blog_post->blog_title_bn }}</td>
                                                    <td  data-toggle="modal" data-target="#correction_blog_post" class="text-left align-top" onclick="post_stage({{$blog_post->id }})">{{ $blog_post->blogcategory->blog_category_name_en  }}</td>
                                                    <td  data-toggle="modal" data-target="#correction_blog_post" class="text-left align-top" onclick="post_stage({{$blog_post->id }})">{{ $blog_post->blogcategory->blog_category_name_bn  }}</td>
                                                    <td  data-toggle="modal" data-target="#correction_blog_post" class="text-left align-top" onclick="post_stage({{$blog_post->id }})"><img width="100" height="100" src="{{ asset($blog_post->image)  }}" alt=""></td>
                                                    @if (Auth::user()->type == 'admin' || Auth::user()->type == 'editor' || Auth::user()->type == 'sub_editor')
                                                        
                                                        <td class="td-actions text-left align-top">
                                                            <a href="{{ route('admin.blog.post.comments.list', $blog_post->id) }}"  data-toggle="tooltip" class="btn btn-link text-info">
                                                                <i class="material-icons">comment</i>
                                                            </a>
                                                      
                                                        </td>
                                                    @endif
                                                </tr>
                                            @endforeach
                                        @elseif(Route::currentRouteName() == 'admin.blog.post.pending')
                                            @foreach ($blog_posts as $key => $blog_post)
                                                @if (Auth::user()->type != 'reporter')
                                                    <tr>
                                                        <td data-toggle="modal" data-target="#correction_blog_post"  class="text-left align-top" onclick="post_stage({{$blog_post->id }})" >{{ ++$key }}</td>
                                                        <td data-toggle="modal" data-target="#correction_blog_post"  class="text-left align-top" onclick="post_stage({{$blog_post->id }})" >{{ $blog_post->blog_title_en }}</td>
                                                        <td data-toggle="modal" data-target="#correction_blog_post"  class="text-left align-top" onclick="post_stage({{$blog_post->id }})" >{{ $blog_post->blog_title_bn }}</td>
                                                        <td data-toggle="modal" data-target="#correction_blog_post"  class="text-left align-top" onclick="post_stage({{$blog_post->id }})" >{{ $blog_post->blogcategory->blog_category_name_en  }}</td>
                                                        <td data-toggle="modal" data-target="#correction_blog_post"  class="text-left align-top" onclick="post_stage({{$blog_post->id }})" >{{ $blog_post->blogcategory->blog_category_name_bn  }}</td>
                                                        <td data-toggle="modal" data-target="#correction_blog_post"  class="text-left align-top" onclick="post_stage({{$blog_post->id }})" ><img width="100" height="100" src="{{ asset($blog_post->image)  }}" alt=""></td>
                                                    </tr>
                                                @else
                                                    @if (Auth::user()->id == $blog_post->user_id )
                                                        <tr>
                                                            <td class="text-left align-top">{{ ++$key }}</td>
                                                            <td data-toggle="modal" data-target="#correction_blog_post"  class="text-left align-top" onclick="post_stage({{$blog_post->id }})">{{ $blog_post->blog_title_en }}</td>
                                                            <td data-toggle="modal" data-target="#correction_blog_post"  class="text-left align-top" onclick="post_stage({{$blog_post->id }})">{{ $blog_post->blog_title_bn }}</td>
                                                            <td data-toggle="modal" data-target="#correction_blog_post"  class="text-left align-top" onclick="post_stage({{$blog_post->id }})">{{ $blog_post->blogcategory->blog_category_name_en  }}</td>
                                                            <td data-toggle="modal" data-target="#correction_blog_post"  class="text-left align-top" onclick="post_stage({{$blog_post->id }})">{{ $blog_post->blogcategory->blog_category_name_bn  }}</td>
                                                            <td data-toggle="modal" data-target="#correction_blog_post"  class="text-left align-top" onclick="post_stage({{$blog_post->id }})"><img width="100" height="100" src="{{ asset($blog_post->image)  }}" alt=""></td>

                                                            <td class="td-actions text-left align-top">
                                                                <a href="{{ route('admin.blog.post.comments.list', $blog_post->id) }}"  data-toggle="tooltip" class="btn btn-link text-info">
                                                                <i class="material-icons">comment</i>
                                                                </a>
                                                                <a href="{{ route('admin.blog.post.edit', $blog_post->id) }}" class="btn btn-link text-success">
                                                                <i class="material-icons">edit</i>
                                                                </a>
                                                            </td>
                                                        </tr>
                                                    @endif
                                                @endif
                                            @endforeach
                                        @elseif(Route::currentRouteName() == 'admin.blog.post.correction')
                                            @foreach ($blog_posts as $key => $blog_post)
                                                @if ($blog_post->stage == 'correction')
                                                    @if(Auth:: user()->type !== 'reporter')
                                                        <tr >
                                                            <td class="text-left align-top">{{ ++$key }}</td>
                                                            <td class="text-left align-top">{{ $blog_post->blog_title_en }}</td>
                                                            <td class="text-left align-top">{{ $blog_post->blog_title_bn }}</td>
                                                            <td class="text-left align-top">{{ $blog_post->blogcategory->blog_category_name_en  }}</td>
                                                            <td class="text-left align-top">{{ $blog_post->blogcategory->blog_category_name_bn  }}</td>
                                                            <td class="text-left align-top"><img width="100" height="100" src="{{ asset($blog_post->image)  }}" alt=""></td>

                                                            @if(Auth::user()->id ==  $blog_post->user_id)
                                                                <td class="td-actions text-left align-top">
                                                                    
                                                                    <a href="{{ route('admin.blog.post.comments.list', $blog_post->id) }}"  data-toggle="tooltip" class="btn btn-link text-info">
                                                                    <i class="material-icons">comment</i>
                                                                    </a>
                                                                    <a href="{{ route('admin.blog.post.edit', $blog_post->id) }}" class="btn btn-link text-success">
                                                                    <i class="material-icons">edit</i>
                                                                    </a>
                                                                   
                                                                </td>
                                                            @else
                                                                <td class="td-actions text-left align-topr">
                                                                        
                                                                    <a href="{{ route('admin.blog.post.comments.list', $blog_post->id) }}"  data-toggle="tooltip" class="btn btn-link text-info">
                                                                    <i class="material-icons">comment</i>
                                                                    </a>
                                                                </td>
                                                            @endif
                                                        </tr>
                                                    @else
                                                        @if(Auth::user()->id == $blog_post->user_id)
                                                            <tr>
                                                                <td class="text-left align-top">{{ ++$key }}</td>
                                                                <td class="text-left align-top">{{ $blog_post->blog_title_en }}</td>
                                                                <td class="text-left align-top">{{ $blog_post->blog_title_bn }}</td>
                                                                <td class="text-left align-top">{{ $blog_post->blogcategory->blog_category_name_en  }}</td>
                                                                <td class="text-left align-top">{{ $blog_post->blogcategory->blog_category_name_bn  }}</td>
                                                                <td class="text-left align-top"><img width="100" height="100" src="{{ asset($blog_post->image)  }}" alt=""></td>
                                                                
                                                                <td class="td-actions text-left align-top">
                                                                    
                                                                    <a href="{{ route('admin.blog.post.comments.list', $blog_post->id) }}"  data-toggle="tooltip" class="btn btn-link text-info">
                                                                    <i class="material-icons">comment</i>
                                                                    </a>
                                                                    <a href="{{ route('admin.blog.post.edit', $blog_post->id) }}" class="btn btn-link text-success">
                                                                    <i class="material-icons">edit</i>
                                                                    </a>

                                                                </td>
                                                            </tr>
                                                        @endif
                                                    @endif
                                                @endif
                                            @endforeach
                                        @endif
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


        @if (Route::currentRouteName() == 'admin.blog.post.correction')
            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header card-header-primary card-header-icon ">
                                    <div class="card-icon">
                                        <i class="material-icons">assignment</i>
                                    </div>
                                    <h4 class="card-title">MANAGE CORRECTION RETURN BLOG POST</h4>
                                </div>
                            
                                <div class="material-datatables">
                                    <table id="" class="table table-striped table-no-bordered table-hover filtertable" cellspacing="0" width="100%" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th class="text-center">SN</th>
                                                <th class="text-center">Title Bangla</th>
                                                <th class="text-center">Title English</th>        
                                                <th class="text-center">Category Name English</th>
                                                <th class="text-center">Category Name Bangla</th>
                                                <th class="text-center">Image</th>

                                                @if (Route::currentRouteName() == 'admin.blog.post' )
                                                    <th class="text-center">Action</th>
                                                @elseif(Route::currentRouteName() == 'admin.blog.post.pending')
                                                    <th class="text-center">Action</th>
                                                @elseif(Route::currentRouteName() == 'admin.blog.post.correction')
                                                    <th class="text-center">Action</th>
                                                @endif
                                            </tr>
                                        </thead>
                                        
                                        <tbody>
                                            @foreach ($blog_posts as $key => $blog_post)
                                                @if ($blog_post->stage == 'correction_return')
                                                    @if(Auth:: user()->type !== 'reporter')
                                                        <tr  data-toggle="modal" data-target="#correction_blog_post" onclick="post_stage({{$blog_post->id }})" >
                                                            <td class="text-left align-top">{{ ++$key }}</td>
                                                            <td class="text-left align-top">{{ $blog_post->blog_title_en }}</td>
                                                            <td class="text-left align-top">{{ $blog_post->blog_title_bn }}</td>   
                                                            <td class="text-left align-top">{{ $blog_post->blogcategory->blog_category_name_en  }}</td>
                                                            <td class="text-left align-top">{{ $blog_post->blogcategory->blog_category_name_bn  }}</td>
                                                            <td class="text-left align-top"><img width="100" height="100" src="{{ asset($blog_post->image)  }}" alt=""></td>

                                                            @if(Auth::user()->id ==  $blog_post->user_id)
                                                                <td class="td-actions text-center align-top">
                                                                    <a href="{{ route('admin.blog.post.comments.list', $blog_post->id) }}"  data-toggle="tooltip" class="btn btn-link text-info">
                                                                        <i class="material-icons">comment</i>
                                                                    </a>
                                                                    <a href="{{ route('admin.blog.post.edit', $blog_post->id) }}" class="btn btn-link text-success">
                                                                        <i class="material-icons">edit</i>
                                                                    </a>
                                                                </td>
                                                            @else
                                                                <td class="td-actions text-left align-top">
                                                                    <a href="{{ route('admin.blog.post.comments.list', $blog_post->id) }}"  data-toggle="tooltip" class="btn btn-link text-info">
                                                                        <i class="material-icons">comment</i>
                                                                    </a>
                                                                </td>
                                                            @endif
                                                        </tr>
                                                    @endif
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
                {{-- post edit modal --}}
            </div>
        @endif
    </div>

    {{-- modal --}}
    <div class="modal fade" id="correction_blog_post" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none; overflow:schroll">
        @include('backend.blog.post.modal')
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
   function post_stage(id){
     $.ajax({
           'url': "{{ route('admin.blog.post.update.stage') }}",
           'type': 'GET',
           'data': {
               'id': id
           },
          success:function(data){
        //    empty data
           console.log(data);
           $('.blog_post_title_bn').empty();
           $('.blog_post_title_en').empty();
           $('.blog_category_name').empty();  
           $('.reporter_name').empty();
           $('.image').empty();
           $('.correction_image').empty();
           $('.correction_message').empty();
           $('.blog_discription_en').empty();
           $('.blog_discription_en').empty();
          
           
           $('.blog_post_id').empty();
        //    // append data
           $('.blog_post_title_bn').val(data[0].blog_title_bn);
           $('.blog_post_title_en').val(data[0].blog_title_en);
            if(data[1] != null){
                    $('.blog_category_name').val(data[1].blog_category_name_bn );
            } 
           if(data[2] != null){
                $('.reporter_name').val(data[2].name_en);
            }
            
            var APP_URL = {!! json_encode(url('/')) !!}
            image = APP_URL + '/' + data[0].image;
            image_correction = APP_URL + '/' + data[0].currection_image;
           $('.image').attr("src",image);
           $('.correction_image').attr("src",image_correction);
           $('.correction_message').val(data[0].message);
           $('.blog_discription_en').val(data[0].description_en);
           $('.blog_discription_bn').val(data[0].description_bn);
           $('.blog_post_id').val(data[0].id);
         },
     });
    }
    $("#stage").on('change',function(){
    //    alert(123);
        stage = document.getElementById("stage").value;
        if(stage == "approved"){
            
            $(".correction_blog").css("display", "none" )
        }
        else if(stage == "correction"){
            $(".correction_blog").css("display", "" )
            
        }
   });
</script>
@endpush