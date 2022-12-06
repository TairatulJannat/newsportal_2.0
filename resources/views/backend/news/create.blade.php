@extends('backend.layouts.app')
@section('content')

    <style>
        .create-news .md-form-group .md-label-floating{
            position: unset;
        }
    </style>


    <div class="content create-news">

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

        <form action="{{ route('admin.news.store') }}" method="post" id="post_insert" enctype="multipart/form-data"
            autocomplete="off">
            @csrf
            <input type="hidden" value="{{ $type }}" id="news_option" name="option_news">
            <div class="card ">
                <div class="card-header card-header-primary card-header-icon">
                    <div class="card-icon">
                        <i class="material-icons">mail_outline</i>
                    </div>
                    <h4 class="card-title">CREATE NEWS</h4>
                </div>
                <div class="card-body ">
                    <div class="row bn">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="exampleEmail" class="md-label-floating">শিরোনাম </label>
                                <input type="text" class="form-control" name="title_bn" id="title_bn" value="{{Request::old('title_bn') }}">
                                @error('title_bn') <span style="color: red">{{ @$message }}</span> @enderror
                            </div>
                        </div>
                    </div>

                    <div class="row en">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="exampleEmail" class="md-label-floating"> Title (English) </label>
                                <input type="text" class="form-control" name="title_en" id="title_en" value="{{Request::old('title_en') }}">
                                @error('title_en') <span style="color: red">{{ @$message }}</span> @enderror
                            </div>
                        </div>
                    </div>


                    <div class="row ">
                        <div class="col-md-6 bn">
                            <div class="form-group">
                                <label for="exampleEmail" class="md-label-floating"> ট্যাগ</label>
                                <input type="text" name="tags_bn" id="tags_bn" class="form-control tagsinput"
                                    data-role="tagsinput" data-color="info" value="{{Request::old('tags_bn') }}">
                                @error('tags_bn') <span style="color: red">{{ @$message }}</span> @enderror
                            </div>
                        </div>

                        <div class="col-md-6 en">
                            <div class="form-group">
                                <label for="exampleEmail" class="md-label-floating"> Tags (English)</label>
                                <input type="text" name="tags_en" id="tags_en" value="{{Request::old('tags_en') }}" class="form-control tagsinput"
                                    data-role="tagsinput" data-color="info">
                                @error('tags_en') <span style="color: red">{{ @$message }}</span> @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row bn">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="exampleEmail"> বর্ণনা</label>
                                @error('details_bn') <span style="color: red">{{ @$message }}</span> @enderror
                                <textarea class=" form-control" name="details_bn" id="details_bn">{{Request::old('details_bn')}}</textarea> <br>
                                <br>
                            </div>
                        </div>
                    </div>
                    <div class="row en">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="exampleEmail"> Description (English)</label>
                                @error('details_en') <span style="color: red">{{ @$message }}</span> @enderror
                                <textarea class=" form-control" name="details_en" id="details_en">{{Request::old('details_en')}}</textarea> <br>
                                <br>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <select value="0" class="selectpicker" data-style="select-with-transition"
                                    title="Choose Category" name="category_id" id="category_id"
                                    onchange="getSubCategoryByCategory(this)">
                                    <option selected style="background-color: black;" value="">---Category---</option>
                                    @foreach ($categories as $key => $category)
                                        <option style="background-color: black; color:white" value="{{$category->id}}" {{(old('category_id')==$category->id)? 'selected':''}}>
                                            {{ $category->category_name_bn }} | {{ $category->category_name_en }}
                                        </option>
                                    @endforeach
                                </select>
                                <br>
                                <br>
                                @error('category_id') <span style="color: red">{{ @$message }}</span> @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <select value="0" class="form-control" data-style="select-with-transition"
                                    title="Choose SubCategory" id="subcategory_id" name="sub_category_id">
                                    <option selected style="background-color: black" value="{{(old('sub_category_id')) ? 'selected':'' }}" >---Sub Category ---</option>
                                    @foreach ($subcategories as $key => $subcategory)
                                        <option style="background-color: black; color:white" value="{{ $subcategory->id }}" {{(old('sub_category_id')==$subcategory->id)? 'selected':''}}>
                                            {{ $subcategory->subcategory_name_bn }} | {{ $subcategory->subcategory_name_en }}
                                        </option>
                                    @endforeach
                                </select>
                                <br>
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
                                <select class="selectpicker" data-style="select-with-transition" title="Choose Division"
                                    name="division_id" id="division_id" onchange="getDistrictByDivision(this)">
                                    <option selected style="background-color: black;" value="0">--- Division ---</option>
                                        @foreach ($divisions as $key => $division)
                                            <option style="background-color: black; color:white" value="{{ $division->id }}" {{(old('division_id')==$division->id)? 'selected':''}}>
                                                {{ $division->division_name_bn }} | {{ $division->division_name_en }}
                                            </option>
                                        @endforeach
                                </select>
                                <br>
                                @error('division_id') <span style="color: red">{{ @$message }}</span> @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <select value="0" class="form-control" data-style="select-with-transition"
                                    title="Choose District" name="district_id" id="district_id"
                                    onchange="getSubDistrictByDistrict(this)">
                                    <option selected style="background-color: black; color:white" value="">---District ---
                                    </option>
                                    @foreach ($districts as $key => $district)
                                        <option style="background-color: black; color:white" value="{{ $district->id }}" {{(old('district_id')==$district->id)? 'selected':''}}>
                                            {{ $district->district_name_bn }} | {{ $district->district_name_en }}
                                        </option>
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
                                    <option selected style="background-color: black" value="">---Sub District ---</option>
                                    @foreach ($subdistricts as $key => $subdistrict)
                                        <option style="background-color: black; color:white" value="{{ $subdistrict->id }}" {{(old('subdistrict_id')==$subdistrict->id)? 'selected':''}}>
                                            {{ $subdistrict->subdistrict_name_bn }} | {{ $subdistrict->subdistrict_name_en }}
                                        </option>
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
                        <label class="col-form-label"> <b style="color:white; margin-left:30px">Image</b></label>
                        <div class="col-md-3">
                            <div class="fileinput fileinput-new text-center" data-provides="fileinput">
                                <div class="fileinput-new thumbnail p-2">
                                    {{-- <img src="{{ asset('public/uploads/backend/ads/image_icon.png')  }}" alt=""> --}}
                                    <img src="{{ asset('public/uploads/backend/ads/image_icon.png') }}" style="display: inline-block;position:block;object-fit: fill; border: 1px solid #ddd; width:100px; height:100px;" alt="...">
                                    <p style="color:red">** Image size must be below 1MB and dimensions 1000×600 **</p>
                                </div>
                                <div class="fileinput-preview fileinput-exists thumbnail"></div>
                                <div>

                                    <span class="btn btn-primary btn-round btn-file">
                                        <span class="fileinput-new">Select image</span>
                                        <span class="fileinput-exists">Change</span>
                                        <input class="post_image" id="post_image" type="file" name="image" />
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
                                    <input type="checkbox" class="breaking_news" id="togBtn" name="breaking_news">
                                    <span class="toggle"></span>
                                </label>
                            </div>
                            <br>
                            <div class="togglebutton">
                                <label style="color:white;"> <b>Feature news</b>
                                    <input type="checkbox" class="feature_news" id="togBtn" name="feature_news">
                                    <span class="toggle"></span>
                                </label>
                            </div>
                            <br>
                            <div class="togglebutton">
                                <label style="color:white;"> <b>Add Main News</b>
                                    <input type="checkbox" class="main_news " id="togglebtn" name="main_news">
                                    <span class="toggle"></span>
                                </label>
                            </div>
                            <br>
                            @if($type == 'both')
                                <div class="togglebutton">
                                    <label style="color:white;"> <b>Add Gallery News</b>
                                        <input type="checkbox" class="add_image_gallery " id="togglebtn"
                                            name="add_image_gallery">
                                        <span class="toggle"></span>
                                    </label>
                                </div>
                            @endif
                        </div>

                        <div class="col-md-3">
                            <div class="card">
                                <div class="card-header card-header-primary card-header-text">
                                    <div class="card-icon">
                                        <i class="material-icons">Today</i>
                                    </div>
                                    <h4 class="card-title">Publish Date</h4>
                                </div>
                                <div class="card-body ">
                                    <div class="form-group">
                                        <input type="text" class="form-control datetimepicker" name="published_date"
                                            id="published_date" value="{{Request::old('published_date') }}">
                                    </div>
                                </div>
                                {{-- @error('published_date') <span style="color: red">{{ @$message }}</span> @enderror --}}
                            </div>
                        </div>
                    </div>
                    <div>
                        @if (Auth::user()->type == 'sub_editor' || Auth::user()->type == 'reporter')
                            <button type="submit" name="submit" class="btn btn-primary pull-right">Send For
                                Approval</button>
                            <button type="submit" name="draft" class="btn btn-primary draft pull-right">Save As
                                Draft</button>
                        @else
                            <button type="submit" name="submit" class="btn btn-primary pull-right">Sent For
                                Approval</button>
                            <button type="submit" name="draft" class="btn btn-secoundary draft pull-right">Save As
                                Draft</button>
                        @endif

                    </div>
                </div>
            </div>
        </form>
    </div>
    {{-- </div>
    </div>
  </div> --}}

    {{-- <div class="modal fade" id="createnews" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" >
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Choose Your Option</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                    <i class="material-icons">clear</i>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group md-form-group is-filled">
                    <div class="row" >

                         <div class="form-check col-md-4">
                            <div class="col-md-12">
                                <label class="form-group">Bangla</label>
                            </div>
                            <div class="col-md-12">
                                <label class="form-check-label">
                                    <input class="form-check-input role"  id ="bn"  type="checkbox" >
                                <span class="form-check-sign">
                                    <span class="check"></span>
                                </span>
                                </label>
                            </div>

                        </div>

                        <div class="form-check  col-md-4">
                            <label class="form-check-label col-md-12">
                              <input class="form-check-input" type="radio" id ="bn"  name="exampleRadios" value="option1"> Bangla
                              <span class="circle">
                                <span class="check"></span>
                              </span>
                            </label>
                        </div>

                        <div class="form-check col-md-4">
                            <label class="form-check-label col-md-12">
                                <input class="form-check-input" type="radio" name="exampleRadios"  id ="en" value="option2"> English
                                <span class="circle">
                                    <span class="check"></span>
                                </span>
                            </label>
                        </div>

                         <div class="form-check col-md-4">
                            <div class="col-md-12">
                                <label class="form-group">English</label>
                            </div>
                            <div class="col-md-12">
                                <label class="form-check-label">
                                    <input class="form-check-input role" id ="en" type="checkbox" >
                                <span class="form-check-sign">
                                    <span class="check"></span>
                                </span>
                                </label>
                            </div>

                        </div>

                        <div class="form-check col-md-4">
                            <label class="form-check-label col-md-12">
                                <input class="form-check-input" type="radio" name="exampleRadios"  id="both" value="option3">Both
                                <span class="circle">
                                    <span class="check"></span>
                                </span>
                            </label>
                        </div>

                         <div class="form-check col-md-4">
                            <div class="col-md-12">
                                <label class="form-group">Both</label>
                            </div>
                            <div class="col-md-12">
                                <label class="form-check-label">
                                    <input class="form-check-input role" id="both" type="checkbox" >
                                <span class="form-check-sign">
                                    <span class="check"></span>
                                </span>
                                </label>
                            </div>

                        </div>
                </div>
            </div>
        </div>
    </div>
</div> --}}
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
                        getSubDistrictByDistrict(data[i].id);
                    }
                }
            });

        }

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

        $(document).ready(function() {
            // alert("");
            // $('.bn').hide();
            // $('.en').hide();
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

        });
        $(function() {
            $('#bn').change(function() {
                $('#news_option').val('bn');
                $('.en').hide();
                $('.bn').show();
                $('#bangla').css({
                    'font-weight': ' bold',
                    'color': 'white'
                })
                $("#english").removeAttr("style");
                $('#createnews').modal('hide');
            })

            $('#en').change(function() {
                $('#news_option').val('en');
                $('.bn').hide();
                $('.en').show();
                $('#english').css({
                    'font-weight': ' bold',
                    'color': 'white'
                })
                $("#bangla").removeAttr("style");
                $('#createnews').modal('hide');
            })

            $('#both').change(function() {
                var status = $(this).prop('checked') == true ? 1 : 0;
                if (status == 1) {
                    $('#news_option').val('both');
                    $('.both_news').css("display", "");
                    $('#createnews').modal('hide');
                }


            })

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
            //  <b style=" color:white">English</b>

        })

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

        $(".post_image").change(function() {
            var img = document.getElementById('post_image');
            // alert(img.clientWidth + 'x' + img.clientHeight);
            if (img.clientWidth < '1000' && img.clientHeight < '600') {
                $("#errImg").html("image resoluation maximum exceed");
            }

        });

        $(".draft").click(function() {
            // event.preventDefault();
            $('#post_insert').attr('action', "{{ route('news.draft') }}");
            // alert(document.getElementById("post_insert").action);
            $('#post_insert').submit();

        });
    </script>

@endpush
