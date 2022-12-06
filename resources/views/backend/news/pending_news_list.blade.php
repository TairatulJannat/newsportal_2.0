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
                        <h4 class="card-title">MANAGE PENDING NEWS</h4>
                    </div>
                    <div class="row-md-6 btn-group">
                        <button type="button" id="pendingenglishnews" class="col-lg-2 col-md-2 col-sm-6 col-6 btn btn-info user_role ml-3">English News</button>
                        <button type="button" id="pendingbanglanews" class="col-lg-2 col-md-2 col-sm-6 col-6 btn btn-info user_role ml-1">Bangla News</button>
                        <button type="button" id="pendingbothnews" class="col-lg-2 col-md-2 col-sm-6 col-6 btn btn-info user_role ml-1">Both News</button>
                     </div>

                    <div class="material-datatables">
                        <div class="pendingnewses" >
                            <table id="" class="table table-striped table-no-bordered table-hover filtertable" cellspacing="0" width="100%" style="width:100%">
                                <thead>
                                    <tr>
                                        <th class="text-center" >SN</th>
                                        <th class="text-center" >Image</th>
                                        <th class="text-center" >News Title Bangla</th>
                                        <th class="text-center" >News Title English</th>
                                        <th class="text-center" >Reporter Name</th>
                                        {{-- <th class="text-center" >News Tags Bangla</th>
                                        <th class="text-center">News Tags English</th>
                                        <th class="text-center" >Slug Bangla</th>
                                        <th class="text-center" >Slug English</th> --}}
                                        <th class="text-center" >Published Date</th>

                                        @if ( Auth::user()->type == 'reporter')
                                            <th class="text-center" style="width: 13%">Edit</th>
                                            {{-- <th class="text-center">Approve</th> --}}
                                        @endif
                                    </tr>
                                </thead>
                                {{-- <tfoot>

                                <tr>

                                    <th class="text-center">SN</th>
                                    <th class="text-center">Image</th>
                                    <th class="text-center">News Title Bangla</th>
                                    <th class="text-center">News Title English</th>
                                    <th class="text-center" >Reporter Name</th>
                                    <th class="text-center">News Tags Bangla</th>
                                    <th class="text-center">News Tags English</th>
                                    <th class="text-center">Slug Bangla</th>
                                    <th class="text-center">Slug English</th>
                                    <th class="text-center">Published Date</th>
                                    @if ( Auth::user()->type == 'reporter')
                                        <th class="text-center">Edit</th>
                                        <th class="text-center">Approve</th>
                                    @endif
                                </tr>
                                </tfoot> --}}
                                <tbody>
                                    @foreach ($posts as $key =>$post)
                                        @if ($post->stage == 'pending')
                                            @if(Auth::user()->type !== 'reporter')
                                                {{-- @if(Auth::user()->id !== $post->user_id) --}}
                                                    <tr>
                                                        <td class="text-center">{{ ++$key }}</td>
                                                        <td  data-toggle="modal" data-target="#edit_post" onclick="post_stage({{$post->id }})" class="text-center" ><img width="100" height="100" src="{{ asset($post->image) }}" style="object-fit: cover;"  alt=""></td>
                                                        <td  data-toggle="modal" data-target="#edit_post" onclick="post_stage({{$post->id }})" class="text-center" >{{ $post->title_bn }}</td>
                                                        <td  data-toggle="modal" data-target="#edit_post" onclick="post_stage({{$post->id }})" class="text-center" >{{ $post->title_en }}</td>
                                                        <td  data-toggle="modal" data-target="#edit_post" onclick="post_stage({{$post->id }})" class="text-center" >{{ $post->user->name_en }}</td>
                                                        <td  class="text-center">{{ $post->published_date }}</td>
                                                        @if ( Auth::user()->type == 'reporter')
                                                            <td  class="text-center">
                                                                <a href="{{ route('admin.news.edit', $post->id) }}" data-target="#edit_image"  class="btn btn-link text-success">
                                                                    <i class="material-icons">edit</i>
                                                                </a>
                                                            </td>
                                                        @endif
                                                    </tr>
                                                {{-- @endif --}}
                                            @else
                                                @if(Auth::user()->id == $post->user_id)
                                                    <tr>
                                                        <td class="text-center">{{ ++$key }}</td>
                                                        <td  data-toggle="modal" data-target="#edit_post" onclick="post_stage({{$post->id }})" class="text-center"><img width="100" height="100" src="{{ asset($post->image) }}" style="object-fit: cover;" alt=""></td>
                                                        <td  data-toggle="modal" data-target="#edit_post" onclick="post_stage({{$post->id }})" class="text-center">{{ $post->title_bn }}</td>
                                                        <td  data-toggle="modal" data-target="#edit_post" onclick="post_stage({{$post->id }})" class="text-center">{{ $post->title_en }}</td>
                                                        <td  data-toggle="modal" data-target="#edit_post" onclick="post_stage({{$post->id }})" class="text-center">{{ $post->user->name_en }}</td>
                                                        {{-- <td  data-toggle="modal" data-target="#edit_post" onclick="post_stage({{$post->id }})" class="text-center">{{ $post->tags_en }}</td>
                                                        <td  data-toggle="modal" data-target="#edit_post" onclick="post_stage({{$post->id }})" class="text-center">{{ $post->slug_bn }}</td>
                                                        <td  data-toggle="modal" data-target="#edit_post" onclick="post_stage({{$post->id }})" class="text-center">{{ $post->slug_en }}</td> --}}
                                                        <td  class="text-center">{{ $post->published_date }}</td>
                                                        @if ( Auth::user()->type == 'reporter')
                                                            <td  class="text-center">
                                                                <a href="{{ route('admin.news.edit', $post->id) }}" data-target="#edit_image"  class="btn btn-link text-success">
                                                                    <i class="material-icons">edit</i>
                                                                </a>
                                                            </td>
                                                        @endif
                                                    </tr>
                                                @endif
                                            @endif
                                        @endif
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
               <!-- end content-->
            </div>
            <!--  end card  -->
        </div>
         <!-- end col-md-12 -->
    </div>
    <!-- end row -->

    {{-- Own pending news --}}
    @if(Auth::user()->type == 'sub_editor' || Auth::user()->type == 'super_admin')

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-primary card-header-icon ">
                        <div class="card-icon">
                            <i class="material-icons">assignment</i>
                        </div>
                        <h4 class="card-title">MANAGE OWN PENDING NEWS</h4>
                    </div>

                    <div class="material-datatables">
                        <table id="" class="table table-striped table-no-bordered table-hover filtertable" cellspacing="0" width="100%" style="width:100%">
                        <thead>
                            <tr>
                                <th class="text-center">SN</th>
                                <th class="text-center" >Image</th>
                                <th class="text-center" >News Title Bangla</th>
                                <th class="text-center" >News Title English</th>
                                <th class="text-center" >Published Date</th>

                                @if ( Auth::user()->type == 'sub_editor')
                                    <th class="text-center" style="width: 13%">Edit</th>

                                @endif
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($posts as $key =>$post)
                                @if ($post->stage == 'pending')
                                    @if(Auth::user()->id == $post->user_id )
                                        <tr>
                                            <td class="text-center">{{ ++$key }}</td>
                                            <td class="text-center"><img width="100" height="100" src="{{ asset($post->image) }}" style="object-fit: cover;"  alt=""></td>
                                            <td class="text-center">{{ $post->title_bn }}</td>
                                            <td class="text-center">{{ $post->title_en }}</td>
                                            <td  class="text-center">{{ $post->published_date }}</td>
                                            @if ( Auth::user()->type == 'sub_editor')
                                                <td  class="text-center">
                                                    <a href="{{ route('admin.news.edit', $post->id) }}" data-target="#edit_image"  class="btn btn-link text-success">
                                                        <i class="material-icons">edit</i>
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
        
</div>
    <!-- end row -->
    @endif
    {{-- post edit modal --}}


      <div class="modal fade " id="edit_post" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none; overflow:schroll">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">News</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                <i class="material-icons">clear</i>
                </button>
            </div>
            <div class="modal-body pt-2">
                <div class="form-group md-form-group is-filled">
                    <form id = "edit_post_form" action="{{ route('admin.news.updated.stage') }}" method="post"  enctype="multipart/form-data" class="form-horizontal"  autocomplete="off">
                        @csrf
                        <input type="hidden" id = "post_id" class = "postid" name = "postid">
                        <div class="row">
                            <label class="col-md-3 col-form-label">বাংলা শিরোনাম</label>
                            <div class="col-md-9">
                                <div class="form-group has-default mt-0">
                                    <input class="form-control post_title_bn" type="text" name="post_title_bn" readonly>
                                </div>
                            </div>
                            <label class="col-md-3 col-form-label">Title English</label>
                            <div class="col-md-9">
                                <div class="form-group has-default mt-0">
                                    <input class="form-control post_title_en" type="text" name="post_title_bn" readonly>
                                </div>
                            </div>
                            <label class="col-md-3 col-form-label">Category Name</label>
                            <div class="col-md-9">
                                <div class="form-group has-default mt-0">
                                    <input class="form-control category_name" type="text" name="category_name" readonly>
                                </div>
                            </div>
                            <label class="col-md-3 col-form-label">Sub Category Name</label>
                            <div class="col-md-9">
                                <div class="form-group has-default mt-0">
                                    <input class="form-control sub_category_name" type="text" name="sub_category_name_bn" readonly>
                                </div>
                            </div>
                            <label class="col-md-3 col-form-label">Reporter Name</label>
                            <div class="col-md-9">
                                <div class="form-group has-default mt-0">
                                    <input class="form-control reporter_name" type="text" name="reportar_name" readonly>
                                </div>
                            </div>
                            <label class="col-md-3 col-form-label">Division</label>
                            <div class="col-md-9">
                                <div class="form-group has-default mt-0">
                                    <input class="form-control division" type="text" name="division" readonly>
                                </div>
                            </div>
                            <label class="col-md-3 col-form-label">District</label>
                            <div class="col-md-9">
                                <div class="form-group has-default mt-0">
                                    <input class="form-control district" type="text" name="district" readonly>
                                </div>
                            </div>
                            <label class="col-md-3 col-form-label">Subdistrict</label>
                            <div class="col-md-9">
                                <div class="form-group has-default mt-0">
                                    <input class="form-control subdistrict" type="text" name="subdistrict" readonly>
                                </div>
                            </div>
                            <label class="col-md-3 col-form-label">Image</label>
                            <div class="col-md-9">
                                <div class="form-group has-default">
                                    <img width="200" class = "image" height="100" src="" alt="">
                                </div>
                            </div>
                            </div>
                            <div class="row">
                                <label class=" col-md-3 col-form-label">Discription (english)</label>
                                <div class="col-md-12">
                                    <div class="form-group has-default">
                                        <textarea class=" form-control discription_en" name="discription_en" id="" cols="30" rows="10" readonly></textarea>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <label class="col-md-3 col-form-label">Discription (BANGLA)</label>
                                <div class="col-md-12">
                                    <div class="form-group has-default">
                                        <textarea class="  form-control discription_bn" name="discription_en" id="" cols="30" rows="10" readonly></textarea>

                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class=" col-md-3 col-form-label">Publish Date</label>
                                <div class="col-md-9">
                                    <div class="form-group has-default">
                                        <input class=" form-control publish_date" name="publish_date" id=""  readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="row ">
                                <label class="col-md-3 col-form-label">Breaking News</label>
                                <div class="col-md-9 ">

                                    <div class="togglebutton">
                                        <label>
                                        <input type="checkbox" id="breaking_news" name="breaking_news"  >
                                        <span class="toggle"></span>
                                        </label>
                                    </div>
                                </div>
                            </div>


                            <div class ="row">
                                <label class="col-md-3 col-form-label">Feature News</label>
                                <div class="col-md-9 ">
                                    <div class="togglebutton">
                                        <label>
                                        <input type="checkbox" id="feature_news" name="feature_news"  >
                                        <span class="toggle"></span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class ="row">
                                <label class="col-md-3 col-form-label">Main News</label>
                                <div class="col-md-9 ">
                                    <div class="togglebutton">
                                        <label>
                                        <input type="checkbox" id="main_news" name="main_news"  >
                                        <span class="toggle"></span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class ="row">
                                <label class="col-md-3 col-form-label">Gallery News</label>
                                <div class="col-md-9 ">
                                    <div class="togglebutton">
                                        <label>
                                        <input type="checkbox" id="add_image_gallery" name="add_image_gallery"  >
                                        <span class="toggle"></span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            @if (Auth::user()->type == 'editor' || Auth::user()->type == 'sub_editor' || Auth::user()->type == 'admin' || Auth::user()->type == 'super_admin')
                                <div class="row">
                                    <label class="col-md-3 col-form-label" style = "color: cornsilk">STAGE</label>
                                    <div class="col-md-9">
                                        <select class="selectpicker" data-style="select-with-transition" title="Choose stage" data-size="7" name="stage" id = "stage">
                                            <option disabled> Choose</option>
                                            @if (Auth::user()->type == 'editor' || Auth::user()->type == 'admin'|| Auth::user()->type == 'super_admin')
                                                <option value="approved">Approved </option>
                                                <option value="correction">Correction</option>
                                            @else
                                                <option value="correction">Correction</option>
                                            @endif
                                        </select>
                                    </div>
                                </div>
                            @endif

                            <div class="row correction" style = "display: none">
                                <label class="col-form-label"> <b style="color:white; margin-left:30px">Correction Image</b></label>
                                <div class="col-md-3">
                                    <div class="fileinput fileinput-new text-center" data-provides="fileinput">
                                        <div class="fileinput-new thumbnail">
                                            <p style="color:red">**no file selected**</p>
                                            <img src="{{ asset('public/uploads/backend/ads/image_icon.png')  }}" style="display: inline-block;position:block;object-fit: fill; border: 1px solid #ddd; width:100px; height:100px;" alt="..."  >
                                        </div>
                                        <div class="fileinput-preview fileinput-exists thumbnail"></div>
                                        <div>

                                            <span class="btn btn-primary btn-round btn-file">
                                                <span class="fileinput-new">Select image</span>
                                                <span class="fileinput-exists">Change</span>
                                                <input class = "correction_image"  type="file" name="correction_image"/>
                                            </span>
                                            <a href="javascript:;" class="btn btn-danger btn-round fileinput-exists" data-dismiss="fileinput"><i class="fa fa-times"></i> Remove</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row correction" style = "display: none">
                                <label class="col-md-3 col-form-label">Message</label>
                                <div class="col-md-9">
                                    <div class="form-group has-default">
                                        <input class="form-control massege" type="text" name="message" >

                                    </div>
                                </div>
                            </div>

                                <div class="modal-footer">
                                    @if (Auth::user()->type == 'editor' || Auth::user()->type == 'sub_editor' || Auth::user()->type == 'super_admin' || Auth::user()->type == 'admin')
                                        <button class="btn btn-primary mr-2" type="submit">Save</button>
                                        <button class="btn btn-danger mr-1" type="button" data-dismiss="modal">Close</button>
                                    @else

                                    <button class="btn btn-danger mr-1" type="button" data-dismiss="modal">Close</button>

                                    @endif


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
<script>
    function breaking_news(id , stat){
        var status = $(this).prop('checked') == true ? 1 : 0;
        // alert(status);
        // alert(id);
        $.ajax({

          url: 'breaking-news-update/'+id,
          type: "GET",
          data: {'status': status, 'id': id},

          success: function(data){
            Swal.fire(
              'Success!',
              '',
              'success'
            )
            window.location.reload();
          }
      });
    }

    function approve(id){
        var status = $(this).prop('checked') == true ? 1 : 0;
        // alert(status);
        // alert(id);
        $.ajax({

            url: 'approve/'+id,
            type: "GET",
            data: {'status': status, 'id': id},

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

    function post_stage(id){
     $.ajax({
           'url': "{{ route('admin.news.update.stage') }}",
           'type': 'GET',
           'data': {
               'id': id
           },
          success:function(data){
           $('.post_title_bn').empty();
           $('.post_title_en').empty();
           $('.category_name').empty();
           $('.sub_category_name').empty();
           $('.reporter_name').empty();
           $('.division').empty();
           $('.district').empty();
           $('.subdistrict').empty();
           $('.image').empty();
           $('.discription_en').empty();
           $('.discription_bn').empty();
           $('.publish_date').empty();


           $('.postid').empty();
           // append data
           $('.post_title_bn').val(data[0].title_bn);
           $('.post_title_en').val(data[0].title_en);
            if(data[1] != null){
                    $('.category_name').val(data[1].category_name_bn );
            }
            if(data[2] != null){
                $('.sub_category_name').val(data[2].subcategory_name_bn);
            }
           if(data[6] != null){
                $('.reporter_name').val(data[6].name_en);
            }

           if(data[3] != null){
                $('.division').val(data[3].division_name_bn);
            }

           if(data[4] != null){
                $('.district').val(data[4].district_name_bn);
            }

           if(data[5] != null){
                $('.subdistrict').val(data[5].subdistrict_name_bn);
            }
            if(data[0].feature_news == 1){
                $('#feature_news').prop('checked', true);
            }
            else{
                $('#feature_news').prop('checked', false);
            }
            if(data[0].breaking_news == 1){
                $('#breaking_news').prop('checked', true);
            }
            else{
                $('#breaking_news').prop('checked', false);
            }
            if(data[0].main_news == 1){
                $('#main_news').prop('checked', true);
            }
            else{
                $('#main_news').prop('checked', false);
            }
            if(data[0].add_image_gallery == 1){
                $('#add_image_gallery').prop('checked', true);
            }
            else{
                $('#add_image_gallery').prop('checked', false);
            }

            var APP_URL = {!! json_encode(url('/')) !!}
            image = APP_URL + '/' + data[0].image;
           $('.image').attr("src", image);
           $('.discription_en').val(data[0].details_en);
           $('.discription_bn').val(data[0].details_bn);
           $('.publish_date').val(data[0].published_date);
           $('.postid').val(data[0].id);
         },
     });
   };

   $("#stage").change(function(){
        stage = document.getElementById("stage").value;
        if(stage == "approved"){
            $(".publish").css("display", "" )
            $(".correction").css("display", "none" )
        }
        else if(stage == "correction"){
            $(".correction").css("display", "" )
            $(".publish").css("display", "none" )
        }
   });


</script>

<script>
    $( document ).ready(function() {
        //    alert(456)

        $('#pendingenglishnews').click(function(){
                         
            pendingnews('english_news');
        })
        $('#pendingbanglanews').click(function(){
            // alert(456)
            pendingnews('bangla_news');
        })
        $('#pendingbothnews').click(function(){
            // alert(456)
            pendingnews('both_news');
        })
        // alert( "ready!" );
        function pendingnews(selectnews){
            // alert(selectnews);
            $.ajax({
                'url': "{{route('admin.select.news')}}",
                'dataType': 'html',
                'data' : {
                    type:selectnews,
                    news: "pendingnews"
                    // console.log(news);
                },
                'type': 'GET',

                    success:function(posts){
                        $('.pendingnewses').html(posts);

                    }
            });
        }
    });

</script>


@endpush
