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
                            <h4 class="card-title">MANAGE NEWS CORRECTION TABLE</h4>
                        </div>

                        <div class="material-datatables">
                            <table id="" class="table table-striped table-no-bordered table-hover filtertable" cellspacing="0"
                                width="100%" style="width:100%">
                                <thead>
                                    <tr>
                                        <th class="text-center" style="width:10%;">SN</th>
                                        <th class="text-center" style="width:10%;">Image</th>
                                        <th class="text-center" style="width:10%;">News Title Bangla</th>
                                        <th class="text-center" style="width:10%;">News Title English</th>
                                        <th class="text-center" style="width:10%;">News Tags Bangla</th>
                                        <th class="text-center" style="width:10%;">News Tags English</th>
                                        <th class="text-center" style="width:10%;">Slug Bangla</th>
                                        <th class="text-center" style="width:10%;">Slug English</th>
                                        <th class="text-center" style="width:10%;">Published Date</th>

                                        @if (Auth::user()->type == 'reporter ')
                                            <th class="text-center">Edit</th>
                                        @endif
                                    </tr>
                                </thead>
                                {{-- <tfoot>
                            <tr>

                                <th class="text-center">SN</th>
                                <th class="text-center">Image</th>
                                <th class="text-center">News Title Bangla</th>
                                <th class="text-center">News Title English</th>
                                <th class="text-center">News Tags Bangla</th>
                                <th class="text-center">News Tags English</th>
                                <th class="text-center">Slug Bangla</th>
                                <th class="text-center">Slug English</th>
                                <th class="text-center">Published Date</th>
                                @if (Auth::user()->type == 'reporter')
                                    <th class="text-center">Edit</th>
                                @endif
                            </tr>
                            </tfoot> --}}
                                <tbody>
                                    @foreach ($posts as $key => $post)
                                        @if ($post->stage == 'correction')
                                            @if (Auth::user()->type != 'reporter')
                                                @if (Auth::user()->id != $post->user_id)
                                                    <tr>
                                                        <td class="text-left align-top">{{ ++$key }}</td>
                                                        <td data-toggle="modal" data-target="#correction_post"
                                                            onclick="post_stage({{ $post->id }})"
                                                            class="text-left align-top"><img width="100" height="100"
                                                                src="{{ asset($post->image) }}" alt=""></td>
                                                        <td data-toggle="modal" data-target="#correction_post"
                                                            onclick="post_stage({{ $post->id }})"
                                                            class="text-left align-top">{{ $post->title_bn }}</td>
                                                        <td data-toggle="modal" data-target="#correction_post"
                                                            onclick="post_stage({{ $post->id }})"
                                                            class="text-left align-top">{{ $post->title_en }}</td>
                                                        <td data-toggle="modal" data-target="#correction_post"
                                                            onclick="post_stage({{ $post->id }})"
                                                            class="text-left align-top">{{ $post->tags_bn }}</td>
                                                        <td data-toggle="modal" data-target="#correction_post"
                                                            onclick="post_stage({{ $post->id }})"
                                                            class="text-left align-top">{{ $post->tags_en }}</td>
                                                        <td data-toggle="modal" data-target="#correction_post"
                                                            onclick="post_stage({{ $post->id }})"
                                                            class="text-left align-top">{{ $post->slug_bn }}</td>
                                                        <td data-toggle="modal" data-target="#correction_post"
                                                            onclick="post_stage({{ $post->id }})"
                                                            class="text-left align-top">{{ $post->slug_en }}</td>
                                                        <td class="text-left align-top">{{ $post->published_date }}</td>
                                                        @if (Auth::user()->type == 'reporter')
                                                            <td class="text-center">
                                                                <a href="{{ route('admin.news.edit', $post->id) }}"
                                                                    data-target="#edit_image"
                                                                    class="btn btn-link text-success">
                                                                    <i class="material-icons">edit</i>
                                                                </a>
                                                            </td>
                                                        @endif
                                                    </tr>
                                                @endif
                                            @else
                                                @if (Auth::user()->id == $post->user_id)
                                                    <tr>
                                                        <td class="text-left align-top">{{ ++$key }}</td>
                                                        <td data-toggle="modal" data-target="#correction_post"
                                                            onclick="post_stage({{ $post->id }})"
                                                            class="text-left align-top"><img width="100" height="100"
                                                                src="{{ asset($post->image) }}" alt=""></td>
                                                        <td data-toggle="modal" data-target="#correction_post"
                                                            onclick="post_stage({{ $post->id }})"
                                                            class="text-left align-top">{{ $post->title_bn }}</td>
                                                        <td data-toggle="modal" data-target="#correction_post"
                                                            onclick="post_stage({{ $post->id }})"
                                                            class="text-left align-top">{{ $post->title_en }}</td>
                                                        <td data-toggle="modal" data-target="#correction_post"
                                                            onclick="post_stage({{ $post->id }})"
                                                            class="text-left align-top">{{ $post->tags_bn }}</td>
                                                        <td data-toggle="modal" data-target="#correction_post"
                                                            onclick="post_stage({{ $post->id }})"
                                                            class="text-left align-top">{{ $post->tags_en }}</td>
                                                        <td data-toggle="modal" data-target="#correction_post"
                                                            onclick="post_stage({{ $post->id }})"
                                                            class="text-left align-top">{{ $post->slug_bn }}</td>
                                                        <td data-toggle="modal" data-target="#correction_post"
                                                            onclick="post_stage({{ $post->id }})"
                                                            class="text-left align-top">{{ $post->slug_en }}</td>
                                                        <td class="text-left align-top">{{ $post->published_date }}</td>
                                                        @if (Auth::user()->type == 'reporter')
                                                            <td class="text-center">
                                                                <a href="{{ route('admin.news.edit', $post->id) }}"
                                                                    data-target="#edit_image"
                                                                    class="btn btn-link text-success">
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
                    <!-- end content-->

                    <div class="card">
                        <div class="card-header card-header-primary card-header-icon ">
                            <div class="card-icon">
                                <i class="material-icons">assignment</i>
                            </div>
                            <h4 class="card-title">MANAGE NEWS CORRECTION-RETURN TABLE</h4>
                        </div>

                        <div class="material-datatables">
                            <table id="" class="table table-striped table-no-bordered table-hover filtertable" cellspacing="0"
                                width="100%" style="width:100%">
                                <thead>
                                    <tr>
                                        <th class="text-center" style="width:10%;">SN</th>
                                        <th class="text-center" style="width:10%;">Image</th>
                                        <th class="text-center" style="width:10%;">News Title Bangla</th>
                                        <th class="text-center" style="width:10%;">News Title English</th>
                                        <th class="text-center" style="width:10%;">News Tags Bangla</th>
                                        <th class="text-center" style="width:10%;">News Tags English</th>
                                        <th class="text-center" style="width:10%;">Slug Bangla</th>
                                        <th class="text-center" style="width:10%;">Slug English</th>
                                        <th class="text-center" style="width:10%;">Published Date</th>

                                        @if (Auth::user()->type == 'reporter')
                                            <th class="text-center">Edit</th>
                                        @endif
                                    </tr>
                                </thead>
                                {{-- <tfoot>
                                <tr>

                                <th class="text-center">SN</th>
                                <th class="text-center">Image</th>
                                <th class="text-center">News Title Bangla</th>
                                <th class="text-center">News Title English</th>
                                <th class="text-center">News Tags Bangla</th>
                                <th class="text-center">News Tags English</th>
                                <th class="text-center">Slug Bangla</th>
                                <th class="text-center">Slug English</th>
                                <th class="text-center">Published Date</th>
                                @if (Auth::user()->type == 'reporter')
                                    <th class="text-center">Edit</th>
                                @endif
                                </tr>
                            </tfoot> --}}
                                <tbody>

                                    @foreach ($posts as $key => $post)
                                        @if ($post->stage == 'correction_return')
                                            @if (Auth::user()->type != 'reporter')
                                                @if (Auth::user()->id != $post->user_id)
                                                    <tr>
                                                        <td class="text-left align-top">{{ ++$key }}</td>
                                                        <td data-toggle="modal" data-target="#correction_post"
                                                            onclick="post_stage({{ $post->id }})"
                                                            class="text-left align-top"><img width="100" height="100"
                                                                src="{{ asset($post->image) }}" alt=""></td>
                                                        <td data-toggle="modal" data-target="#correction_post"
                                                            onclick="post_stage({{ $post->id }})"
                                                            class="text-left align-top">{{ $post->title_bn }}</td>
                                                        <td data-toggle="modal" data-target="#correction_post"
                                                            onclick="post_stage({{ $post->id }})"
                                                            class="text-left align-top">{{ $post->title_en }}</td>
                                                        <td data-toggle="modal" data-target="#correction_post"
                                                            onclick="post_stage({{ $post->id }})"
                                                            class="text-left align-top">{{ $post->tags_bn }}</td>
                                                        <td data-toggle="modal" data-target="#correction_post"
                                                            onclick="post_stage({{ $post->id }})"
                                                            class="text-left align-top">{{ $post->tags_en }}</td>
                                                        <td data-toggle="modal" data-target="#correction_post"
                                                            onclick="post_stage({{ $post->id }})"
                                                            class="text-left align-top">{{ $post->slug_bn }}</td>
                                                        <td data-toggle="modal" data-target="#correction_post"
                                                            onclick="post_stage({{ $post->id }})"
                                                            class="text-left align-top">{{ $post->slug_en }}</td>
                                                        <td class="text-left align-top">{{ $post->published_date }}</td>
                                                        @if (Auth::user()->type == 'reporter')
                                                            <td class="text-center">
                                                                <a href="{{ route('admin.news.edit', $post->id) }}"
                                                                    data-target="#edit_image"
                                                                    class="btn btn-link text-success">
                                                                    <i class="material-icons">edit</i>
                                                                </a>
                                                            </td>
                                                        @endif
                                                    </tr>
                                                @endif
                                            @else
                                                @if (Auth::user()->id == $post->user_id)
                                                    <tr>
                                                        <td class="text-left align-top">{{ ++$key }}</td>
                                                        <td data-toggle="modal" data-target="#correction_post"
                                                            onclick="post_stage({{ $post->id }})"
                                                            class="text-left align-top"><img width="100" height="100"
                                                                src="{{ asset($post->image) }}" alt=""></td>
                                                        <td data-toggle="modal" data-target="#correction_post"
                                                            onclick="post_stage({{ $post->id }})"
                                                            class="text-left align-top">{{ $post->title_bn }}</td>
                                                        <td data-toggle="modal" data-target="#correction_post"
                                                            onclick="post_stage({{ $post->id }})"
                                                            class="text-left align-top">{{ $post->title_en }}</td>
                                                        <td data-toggle="modal" data-target="#correction_post"
                                                            onclick="post_stage({{ $post->id }})"
                                                            class="text-left align-top">{{ $post->tags_bn }}</td>
                                                        <td data-toggle="modal" data-target="#correction_post"
                                                            onclick="post_stage({{ $post->id }})"
                                                            class="text-left align-top">{{ $post->tags_en }}</td>
                                                        <td data-toggle="modal" data-target="#correction_post"
                                                            onclick="post_stage({{ $post->id }})"
                                                            class="text-left align-top">{{ $post->slug_bn }}</td>
                                                        <td data-toggle="modal" data-target="#correction_post"
                                                            onclick="post_stage({{ $post->id }})"
                                                            class="text-left align-top">{{ $post->slug_en }}</td>
                                                        <td class="text-left align-top">{{ $post->published_date }}</td>
                                                        @if (Auth::user()->type == 'reporter')
                                                            <td class="text-center">
                                                                <a href="{{ route('admin.news.edit', $post->id) }}"
                                                                    data-target="#edit_image"
                                                                    class="btn btn-link text-success">
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
                <!-- end col-md-12 -->
            </div>
            <!-- end row -->
            {{-- post edit modal --}}

        </div>
        {{-- post edit modal --}}
        <div class="modal fade" id="correction_post" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
            aria-hidden="true" style="display: none; overflow:schroll">
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
                            <form id="edit_post_form" action="{{ route('admin.news.updated.stage') }}" method="post"
                                enctype="multipart/form-data" class="form-horizontal" autocomplete="off">
                                @csrf
                                <input type="hidden" id="post_id" class="postid" name="postid">
                                <div class="row">
                                    <label class="col-md-3 col-form-label">বাংলা শিরোনাম</label>
                                    <div class="col-md-9">
                                        <div class="form-group has-default mt-0">
                                            <input class="form-control post_title_bn" type="text" name="post_title_bn"
                                                readonly>
                                        </div>
                                    </div>
                                    <label class="col-md-3 col-form-label">Title English</label>
                                    <div class="col-md-9">
                                        <div class="form-group has-default mt-0">
                                            <input class="form-control post_title_en" type="text" name="post_title_bn"
                                                readonly>
                                        </div>
                                    </div>
                                    <label class="col-md-3 col-form-label">Category Name</label>
                                    <div class="col-md-9">
                                        <div class="form-group has-default mt-0">
                                            <input class="form-control category_name" type="text" name="category_name"
                                                readonly>
                                        </div>
                                    </div>
                                    <label class="col-md-3 col-form-label">Sub Category Name</label>
                                    <div class="col-md-9">
                                        <div class="form-group has-default mt-0">
                                            <input class="form-control sub_category_name" type="text"
                                                name="sub_category_name_bn" readonly>
                                        </div>
                                    </div>
                                    <label class="col-md-3 col-form-label">Reporter Name</label>
                                    <div class="col-md-9">
                                        <div class="form-group has-default mt-0">
                                            <input class="form-control reporter_name" type="text" name="reportar_name"
                                                readonly>
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
                                            <input class="form-control subdistrict" type="text" name="subdistrict"
                                                readonly>
                                        </div>

                                    </div>

                                    <label class="col-md-3 col-form-label">Discription (english)</label>
                                    <div class="col-md-9">
                                        <div class="form-group has-default">
                                            <textarea class="form-control discription_en" name="discription_en"
                                                id="" cols="30" rows="10" readonly></textarea>
                                        </div>
                                    </div>

                                    <label class="col-md-3 col-form-label">Discription (BANGLA)</label>
                                    <div class="col-md-9">
                                        <div class="form-group has-default">
                                            <textarea class="form-control discription_bn" name="discription_en"
                                                id="" cols="30" rows="10" readonly>
                                                </textarea>
                                        </div>
                                    </div>

                                    <label class="col-md-3 col-form-label">Image</label>
                                    <div class="col-md-9">
                                        <div class="form-group has-default">
                                            <img width="200" class="image" height="100" src="" alt="">
                                        </div>
                                    </div>
                                    <label class="col-md-3 col-form-label"> Correction Image</label>
                                    <div class="col-md-9">
                                        <div class="form-group has-default">
                                            <img width="200" class="correction_image" height="100" src="" alt="">
                                        </div>
                                    </div>
                                    <label class="col-md-3 col-form-label">Correction Message</label>
                                    <div class="col-md-9">
                                        <div class="form-group has-default mt-0">
                                            <input class="form-control correction_message" type="text"
                                                readonly>
                                        </div>

                                    </div>
                                    @if (Auth::user()->type == 'editor' || Auth::user()->type == 'sub_editor' || Auth::user()->type == 'admin' || Auth::user()->type == 'super_admin')
                                        <div class="row">
                                            <label class="col-md-3 col-form-label" style = "color: cornsilk">STAGE</label>
                                            <div class="col-md-9">
                                                <select class="selectpicker" data-style="select-with-transition" title="Choose stage" data-size="7" name="stage" id = "stage">
                                                    <option disabled> Choose</option>
                                                    @if (Auth::user()->type == 'editor' || Auth::user()->type == 'admin'|| Auth::user()->type == 'super_admin')
                                                        <option value="approved">approved </option>
                                                        <option value="correction">Correction</option>
                                                    @else
                                                        <option value="correction">Correction</option>
                                                    @endif
                                                </select>
                                            </div>
                                        </div>
                                    @endif

                                    <!-- end content-->
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
                        <!-- end col-md-12 -->
                    </div>

                    <!-- end row -->
                </div>
            </div>
        </div>
    </div>

@endsection


@push('js')

    <script>
        function breaking_news(id, stat) {
            var status = $(this).prop('checked') == true ? 1 : 0;
            // alert(status);
            // alert(id);
            $.ajax({

                url: 'breaking-news-update/' + id,
                type: "GET",
                data: {
                    'status': status,
                    'id': id
                },

                success: function(data) {
                    Swal.fire(
                        'Success!',
                        '',
                        'success'
                    )
                    window.location.reload();
                }
            });
        }

        function approve(id) {
            var status = $(this).prop('checked') == true ? 1 : 0;
            // alert(status);
            // alert(id);
            $.ajax({

                url: 'approve/' + id,
                type: "GET",
                data: {
                    'status': status,
                    'id': id
                },

                success: function(data) {
                    Swal.fire(
                        'Success!',
                        '',
                        'success'
                    )
                    setTimeout(function() { // wait for 5 secs(2)
                        location.reload(); // then reload the page.(3)
                    }, 2000);
                }
            });
        }

        function post_stage(id) {
            $.ajax({
                'url': "{{ route('admin.news.update.stage') }}",
                'type': 'GET',
                'data': {
                    'id': id
                },
                success: function(data) {
                    // empty data
                    console.log(data);
                    $('.post_title_bn').empty();
                    $('.post_title_en').empty();
                    $('.category_name').empty();
                    $('.sub_category_name').empty();
                    $('.reporter_name').empty();
                    $('.division').empty();
                    $('.district').empty();
                    $('.subdistrict').empty();
                    $('.image').empty();
                    $('.correction_image').empty();
                    $('.correction_message').empty();
                    $('.discription_en').empty();
                    $('.discription_bn').empty();
                    $('.publish_date').empty();


                    $('.postid').empty();
                    // append data
                    $('.post_title_bn').val(data[0].title_bn);
                    $('.post_title_en').val(data[0].title_en);
                    if (data[1] != null) {
                        $('.category_name').val(data[1].category_name_bn);
                    }
                    if (data[2] != null) {
                        $('.sub_category_name').val(data[2].subcategory_name_bn);
                    }
                    if (data[6] != null) {
                        $('.reporter_name').val(data[6].name_en);
                    }

                    if (data[3] != null) {
                        $('.division').val(data[3].division_name_bn);
                    }

                    if (data[4] != null) {
                        $('.district').val(data[4].district_name_bn);
                    }

                    if (data[5] != null) {
                        $('.subdistrict').val(data[5].subdistrict_name_bn);
                    }
                    if (data[0].stage != null) {
                        if (data[0].stage == 'correction') {
                            $('.stage').hide();
                            $(".publish").css("display", "none")
                            $(".correction").css("display", "none")

                        } else if (data[0].stage == 'correction_return') {
                            $('.stage').show();
                        }
                    }
                    if (data[0].feature_news == 1) {
                        $('#feature_news').prop('checked', true);
                    } else {
                        $('#feature_news').prop('checked', false);
                    }
                    if (data[0].breaking_news == 1) {
                        $('#breaking_news').prop('checked', true);
                    } else {
                        $('#breaking_news').prop('checked', false);
                    }
                    if (data[0].main_news == 1) {
                        $('#main_news').prop('checked', true);
                    } else {
                        $('#main_news').prop('checked', false);
                    }
                    if (data[0].add_image_gallery == 1) {
                        $('#add_image_gallery').prop('checked', true);
                    } else {
                        $('#add_image_gallery').prop('checked', false);
                    }
                    var APP_URL = {!! json_encode(url('/')) !!}
                    image = APP_URL + '/' + data[0].image;
                    image_correction = APP_URL + '/' + data[0].currection_image;
                    $('.image').attr("src", image);
                    $('.correction_image').attr("src", image_correction);
                    $('.correction_message').val(data[0].message);
                    $('.discription_en').val(data[0].details_en);
                    $('.discription_bn').val(data[0].details_bn);
                    $('.publish_date').val(data[0].published_date);
                    $('.postid').val(data[0].id);
                },
            });
        }

        $("#stage").on('change', function() {
            //    alert(123);
            stage = document.getElementById("stage").value;
            if (stage == "approved") {
                $(".publish").css("display", "")
                $(".correction").css("display", "none")
            } else if (stage == "correction") {
                $(".correction").css("display", "")
                $(".publish").css("display", "none")
            }
        });
    </script>

@endpush
