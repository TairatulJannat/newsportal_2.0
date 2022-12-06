@extends('backend.layouts.app')
@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card-body">
                        <div class="toolbar">
                            <a href="{{ route('admin.news.show') }}"><button class="btn btn-primary"
                                data-target="#exampleModalCenter">View Post Table</button>
                            </a>
                        </div>
                    </div>

                    <div class="">

                        @if ($type == 'both')
                            <div class="both_news pl-4" style="">

                                <div class="togglebutton">
                                    <label class="form-group" id="bangla"> Bangla</label>
                                    <label>
                                        <input type="checkbox" checked="" class="en_bn">
                                        <span class="toggle"></span>
                                    </label>
                                    <label class="form-group" id="english" style=" color:white; font-weight:bold"> English</label>
                                </div>
                            </div>

                        @endif
                    </div>
                    <form action="{{ route('admin.news.update') }}" method="post" id="post_insert"
                        enctype="multipart/form-data" autocomplete="off">
                        @csrf
                        <input type="hidden" value="{{ $type }}" id="news_option" name="option_news">
                        <input type="hidden" class="id" name="id" value="{{ $post->id }}">
                        <div class="card ">
                            <div class="card-header card-header-primary card-header-icon">
                                <div class="card-icon">
                                    <i class="material-icons">mail_outline</i>
                                </div>
                                <h4 class="card-title">EDIT NEWS</h4>
                            </div>
                            <div class="card-body ">
                                <div class="row bn">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="exampleEmail" class="md-label-floating">শিরোনাম</label>
                                            <input type="text" class="form-control" value="{{ $post->title_bn }}"
                                                name="title_bn" id="exampleEmail">
                                            @error('title_bn') <span style="color: red">{{ @$message }}</span> @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="row en">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="exampleEmail" class="md-label-floating"> Title (English) </label>
                                            <input type="text" class="form-control" value="{{ $post->title_en }}"
                                                name="title_en" id="exampleEmail">
                                            @error('title_en') <span style="color: red">{{ @$message }}</span> @enderror
                                        </div>
                                    </div>
                                </div>


                                <div class="row ">
                                    <div class="col-md-6 bn">
                                        <div class="form-group">
                                            <label for="exampleEmail" class="md-label-floating">ট্যাগ</label>
                                            <input type="text" name="tags_bn" value="{{ $post->tags_bn }}"
                                                class="form-control tagsinput" data-role="tagsinput" data-color="info">
                                        </div>
                                    </div>

                                    <div class="col-md-6 en">
                                        <div class="form-group">
                                            <label for="exampleEmail" class="md-label-floating"> Tags (English)</label>
                                            <input type="text" name="tags_en" value="{{ $post->tags_en }}"
                                                class="form-control tagsinput" data-role="tagsinput" data-color="info">
                                        </div>
                                    </div>
                                </div>
                                <div class="row bn">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="exampleEmail">বর্ণনা</label>
                                            <textarea class="ckeditor form-control"
                                                name="details_bn">{!! $post->details_bn !!}</textarea>
                                            @error('details_bn') <span style="color: red">{{ @$message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row en">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="exampleEmail"> Description (English)</label>
                                            <textarea class="ckeditor form-control"
                                                name="details_en">{!! $post->details_en !!}</textarea>
                                            @error('details_en') <span style="color: red">{{ @$message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <select class="selectpicker" data-style="select-with-transition"
                                                title="Choose Category" value="" name="category_id" id="category_id"
                                                onchange="getSubCategoryByCategory(this)">

                                                @foreach ($categories as $key => $category)
                                                    @if ($category->id == $post->category_id)
                                                        <option selected style="background-color: black; color:white"
                                                            value="{{ $category->id }}">
                                                            {{ $category->category_name_bn }} | {{ $category->category_name_en }}
                                                        </option>}
                                                    @else
                                                        <option style="background-color: black; color:white"
                                                            value="{{ $category->id }}">
                                                            {{ $category->category_name_bn }} | {{ $category->category_name_en }}
                                                        </option>}
                                                    @endif

                                                @endforeach
                                            </select>

                                            @error('category_id') <span style="color: red">{{ @$message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <select value="0" class="form-control" data-style="select-with-transition"
                                                title="Choose SubCategory" id="subcategory_id" name="sub_category_id">
                                                <option selected style="background-color: black" value = ''>---Sub Category ---</option>
                                                @foreach ($subcategories as $key => $subcategory)
                                                    @if($subcategory->id == $post->sub_category_id && $subcategory->category_id == $post->category_id)
                                                        <option selected style="background-color: black; color:white" value="{{ $subcategory->id }}" >
                                                            {{ $subcategory->subcategory_name_bn }} | {{ $subcategory->subcategory_name_en }}
                                                        </option>
                                                    @elseif($subcategory->id != $post->sub_category_id && $subcategory->category_id == $post->category_id)
                                                        <option style="background-color: black; color:white" value="{{ $subcategory->id }}" >
                                                            {{ $subcategory->subcategory_name_bn }} | {{ $subcategory->subcategory_name_en }}
                                                        </option>
                                                    @endif

                                                @endforeach
                                            </select>

                                            @error('subcategory_id') <span style="color: red">{{ @$message }}</span> @enderror
                                        </div>
                                    </div>

                                </div>
                                <div class="row p-5">
                                    <div class="togglebutton mb3 ">
                                        <label style="color:white;"> <b>Is It local news</b>
                                            <input type="checkbox" id="local" name="local">
                                            <span class="toggle"></span>
                                        </label>
                                    </div>
                                </div>
                                <div class="row dis_div_sub" style="display:none">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <select class="selectpicker" data-style="select-with-transition"
                                                title="Choose Division" value=""
                                                name="division_id" id="division_id" onchange="getDistrictByDivision(this)">
                                                <option disabled> Choose One</option>
                                                @foreach ($divisions as $key => $division)
                                                    @if ($division->id == $post->division_id)
                                                        <option selected style="background-color: black; color:white"
                                                            value="{{ $division->id }}">
                                                            {{ $division->division_name_bn }} | {{ $division->division_name_en }}</option>
                                                    @else
                                                        <option style="background-color: black; color:white"
                                                            value="{{ $division->id }}">
                                                            {{ $division->division_name_bn }} | {{ $division->division_name_en }}</option>
                                                    @endif
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <select selected value="0" class="form-control" data-style="select-with-transition"
                                                title="Choose District" name="district_id" id="district_id" value="{{ $post->district_id }}"
                                                onchange="getSubDistrictByDistrict(this)">
                                                <option  style="background-color: black; color:white" value="">---District ---
                                                </option>
                                                @foreach ($districts as $key => $district)
                                                    @if ($district->id == $post->district_id && $district->division_id == $post->division_id)
                                                        <option selected style="background-color: black; color:white"
                                                            value="{{ $district->id }}">
                                                            {{ $district->district_name_bn }} | {{ $district->district_name_en }}
                                                        </option>
                                                    @elseif($district->id != $post->district_id && $district->division_id == $post->division_id)
                                                        <option style="background-color: black; color:white"
                                                            value="{{ $district->id }}">
                                                            {{ $district->district_name_bn }} | {{ $district->district_name_en }}
                                                        </option>
                                                    @endif
                                                @endforeach

                                            </select>
                                            <br>
                                            <br>
                                            @error('district_id') <span style="color: red">{{ @$message }}</span> @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <select value="0" class="form-control" data-style="select-with-transition"
                                                title="Choose Subdistrict" data-size="7" name="subdistrict_id" id="sub_district_id">
                                                <option  style="background-color: black" value="">---Sub District ---</option>
                                                @foreach ($subdistricts as $key => $subdistrict)
                                                    @if ($subdistrict->id == $post->subdistrict_id && $subdistrict->district_id == $post->district_id)
                                                        <option selected style="background-color: black; color:white"
                                                            value="{{ $subdistrict->id }}">
                                                            {{ $subdistrict->subdistrict_name_bn }} | {{ $subdistrict->subdistrict_name_en }}</option>}
                                                    @elseif($subdistrict->id != $post->subdistrict_id && $subdistrict->district_id == $post->district_id)
                                                        <option style="background-color: black; color:white"
                                                            value="{{ $subdistrict->id }}">
                                                            {{ $subdistrict->subdistrict_name_bn }} | {{ $subdistrict->subdistrict_name_en }}</option>}
                                                    @endif

                                                @endforeach
                                            </select>
                                            <br>
                                            <br>
                                            @error('subdistrict_id') <span style="color: red">{{ @$message }}</span> @enderror
                                        </div>

                                    </div>

                                </div>
                                <hr>

                                <div class="row">
                                    <label class="col-form-label"> <b
                                            style="color:white; margin-left:30px">Image</b></label>
                                    <div class="col-md-3">
                                        <div class="fileinput fileinput-new text-center" data-provides="fileinput">
                                            <div class="fileinput-new thumbnail">
                                                <p style="color:red">** Image size must be bellow 1MB and dimensions
                                                    1000×600 **</p>
                                                <img src="{{ asset($post->image) }}"
                                                    style="display: inline-block;position:block;object-fit: fill; border: 1px solid #ddd; width:100px; height:100px;"
                                                    alt="..." name = "existing">
                                            </div>
                                            {{-- <input type="file" value = ""> --}}
                                            <div class="fileinput-preview fileinput-exists thumbnail"></div>
                                            <div>
                                                <span class="btn btn-primary btn-round btn-file">
                                                    <span class="fileinput-new">Select image</span>
                                                    <span class="fileinput-exists">Change</span>
                                                    <input type="file" name="image">
                                                </span>
                                                <a href="javascript:;" class="btn btn-danger btn-round fileinput-exists"
                                                    data-dismiss="fileinput"><i class="fa fa-times"></i> Remove</a>
                                            </div>
                                        </div>
                                        <p style="color:red" id="errImg"></p>
                                        <br>
                                        @error('image') <span style="color: red">{{ @$message }}</span> @enderror
                                    </div>
                                    <div class="col-md-3 text-center">

                                        <div class="togglebutton mb3 ">
                                            <label style="color:white;"> <b>Breaking news</b>
                                                @if ($post->breaking_news == 1)
                                                    <input checked type="checkbox" id="togBtn" name="breaking_news">
                                                @else
                                                    <input type="checkbox" id="togBtn" name="breaking_news">
                                                @endif

                                                <span class="toggle"></span>
                                            </label>
                                        </div>
                                        <br>
                                        <div class="togglebutton">
                                            <label style="color:white;"> <b>Feature news</b>
                                                @if ($post->feature_news == 1)
                                                    <input checked type="checkbox" id="togBtn" name="feature_news">
                                                @else
                                                    <input type="checkbox" id="togBtn" name="feature_news">
                                                @endif
                                                <span class="toggle"></span>
                                            </label>
                                        </div>
                                        <br>
                                        <div class="togglebutton">
                                            <label style="color:white;"> <b>Add Main News</b>
                                                @if ($post->main_news == 1)
                                                    <input checked type="checkbox" class="main_news " id="togglebtn"
                                                        name="main_news">
                                                @else
                                                    <input type="checkbox" class="main_news " id="togglebtn"
                                                        name="main_news">
                                                @endif

                                                <span class="toggle"></span>
                                            </label>
                                        </div>
                                        <br>
                                        @if ($type == 'both')
                                            <div class="togglebutton">
                                                <label style="color:white;"> <b>Add Gallery News</b>
                                                    @if ($post->add_image_gallery == 1)
                                                        <input checked type="checkbox" id="togglebtn" name="add_image_gallery">
                                                    @else
                                                        <input type="checkbox" id="togglebtn" name="add_image_gallery">
                                                    @endif

                                                    <span class="toggle"></span>
                                                </label>
                                            </div>
                                        @endif
                                    </div>

                                    <div class="col-md-3">
                                        <div class="card">
                                            <div class="card-header card-header-primary card-header-text">
                                                <div class="card-icon ">
                                                    <i class="material-icons ">date_range</i>
                                                </div>
                                                <h4 class="card-title">Published Date</h4>
                                            </div>
                                            <div class="card-body">
                                                <div class="form-group">
                                                    <input  type="date"   class="form-control" name="published_date" value="{{$post->published_date }}">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    @if ($post->stage == 'draft')
                                        <button type="submit" name="draft" class="btn btn-secoundary draft pull-right"
                                            class="btn btn-primary">Update As Draft</button>
                                    @endif
                                    @if ($post->stage == 'correction')
                                        <button type="submit" name="submit" class="btn btn-primary pull-right"
                                        class="btn btn-primary">Correction Return</button>
                                    @else
                                        <button type="submit" name="submit" class="btn btn-primary pull-right"
                                            class="btn btn-primary">Publish News</button>
                                    @endif

                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('js')
    <script type="text/javascript">
           function getSubCategoryByCategory(category) {
            var id = $('#category_id').val();
            $.ajax({
                url: "{{ route('ajax.get_sub_category_by_category') }}",
                method: 'GET',
                data: {
                    id: id,
                },
                success: function(data) {
                    console.log(data);
                    $('#subcategory_id').html(null);
                    $('#subcategory_id').append($('<option >', {
                        value: '',
                        text: 'Choose One',
                    }));
                    for (var i = 0; i < data.length; i++) {
                        $('#subcategory_id').append($('<option>', {
                            value: data[i].id,
                            text: data[i].subcategory_name_bn + ' | ' + data[i].subcategory_name_en,
                        }));
                        $('#subcategory_id option').css({
                            'background-color': 'black'
                        })
                    }
                }
            });
        }
    </script>
    <script type="text/javascript">
          function getDistrictByDivision(division) {
            var id = $('#division_id').val();
            $.ajax({
                url: "{{ route('ajax.get_district_by_division') }}",
                method: 'GET',
                data: {
                    id: id,
                },

                success: function(data) {
                    console.log(data);
                    $('#district_id').html(null);
                    $('#district_id').append($('<option >', {
                        value: '',
                        text: 'Choose One',
                    }));
                    for (var i = 0; i < data.length; i++) {
                        $('#district_id').append($('<option>', {
                            value: data[i].id,
                            text: data[i].district_name_bn + ' | ' + data[i].district_name_en,
                        }));
                        $('#district_id option').css({
                            'background-color': 'black'
                        })
                        // getSubDistrictByDistrict(data[i].id);
                    }
                }
            });

        }
    </script>
    <script type="text/javascript">
       function getSubDistrictByDistrict(district) {
            var id = $('#district_id').val();
            $.ajax({
                url: "{{ route('ajax.get_sub_district_by_district') }}",
                method: "get",
                data: {
                    id: id,
                },
                success: function(data) {
                    $('#sub_district_id').html(null);
                    $('#sub_district_id').append($('<option >', {
                        value: '',
                        text: 'Choose One',
                    }));
                    for (var i = 0; i < data.length; i++) {
                        $('#sub_district_id').append($('<option>', {
                            value: data[i].id,
                            text: data[i].subdistrict_name_bn + ' | ' + data[i].subdistrict_name_en,
                        }));
                        $('#sub_district_id option').css({
                            'background-color': 'black'
                        })
                    }
                }
            });

        }

    </script>


    <script>
        $(document).ready(function() {
            // $('.bn').hide();
            if ("{{ $type }}" == 'bangla') {
                $('.bn').show();
                $('.en').hide();
            } else if ("{{ $type }}" == 'english') {
                $('.bn').hide();
                $('.en').show();
            } else {
                $('.en').show();
                $('.bn').hide();
            }

            // document.getElementById("bn").style.visibility = "hidden";
        });
        $(function() {
            $('.en_bn').change(function() {
                var status = $(this).prop('checked') == true ? 1 : 0;
                if (status == 0) {
                    $('.en').hide();
                    $('.bn').show();
                    $('#bangla').css({
                        'font-weight': ' bold',
                        'color': 'white'
                    })
                    $("#english").removeAttr("style");

                } else {
                    $('.bn').hide();
                    $('.en').show();
                    $('#english').css({
                        'font-weight': ' bold',
                        'color': 'white'
                    })
                    $("#bangla").removeAttr("style");
                }
            })
        })
        $(".draft").click(function() {
            // event.preventDefault();
            $('#post_insert').attr('action', "{{ route('news.draft.update') }}");
            // alert(document.getElementById("post_insert").action);
            $('#post_insert').submit();

        });
        // <-----Edit Image----->
        $(".post_image").change(function() {
            var img = document.getElementById('post_image');
            // alert(img.clientWidth + 'x' + img.clientHeight);
            if (img.clientWidth < '1000' && img.clientHeight < '600') {
                $("#errImg").html("image resoluation maximum exceed");
            }

        });

        $("#local").change(function() {
            var status = $(this).prop('checked') == true ? 1 : 0;
            if (status == 1) {
                $('.dis_div_sub').css({
                    'display': ''
                })
            } else {
                $('.dis_div_sub').css({
                    'display': 'none'
                })
            }
            // alert(status)

        });

    </script>

@endpush
