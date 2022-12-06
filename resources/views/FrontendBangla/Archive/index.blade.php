@extends('FrontendBangla.layouts.app')
@section('content') 
<div class="main-content">
    <div class="container">
        <div class="middle-section">

            <div class = "row archive">
                <div class = "col-md-12" >
                    <form action="{{ route ('FrontendBangla.archive.filterNews')}}" method = "GET">
                        <div class="row">
                            <div class="col-md-6 col-sm-12 mb-2">
                                <div class="input-group">
                                    <div class="input-group-addon ">তারিখ <i class="fa fa-calendar"></i></div>
                                    <input type="date" name="dateFrom" class="form-control date-input" id="dateFrom">
                                    <div class="input-group-addon">থেকে <i class="fa fa-calendar"></i></div>
                                    <input type="date" name="dateTo" class="form-control date-input" id="dateTo">
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-6">
                                <select class="form-control" name="cat" id="category">
                                    <option value="">-- ক্যাটাগরি --</option>
                                    @foreach ($Categorys as $Category)
                                    <option value="{{ $Category->id }}">{{ $Category->category_name_bn }} || {{ $Category->category_name_en }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-3 col-sm-6">
                                <input type="text" name="keyword" class="form-control" id="text_search" placeholder="আপনি কী খুঁজছেন?">
                            </div>
                        </div>
                        <div class="box-ashes">
                            <div class="row">
                                <div class="col-lg-2 col-sm-4 mb-2">
                                        <label for="division" class="sr-only">বিভাগ</label>
                                        <select class="form-control" name="division" id="division_id" onchange="getDistrictByDivision(this)">
                                            <option value="">--বিভাগ--</option>
                                            @foreach ($divisions as $division)
                                                <option value="{{ $division->id }}">{{ $division->division_name_bn }} || {{ $division->division_name_en }}</option>
                                            @endforeach
                                        </select>
                                </div>
                                <div class="col-lg-3 col-sm-4">
                                        <label for="district" class="sr-only">জেলা</label>
                                        <select class="form-control" name="district" id="district_id" onchange="getSubDistrictByDistrict(this)">
                                            <option value="" selected="">--জেলা--</option>
                                            @foreach ($districts as $district)
                                            <option value="{{ $district->id }}">{{ $district->district_name_bn }} || {{ $district->district_name_en }}</option>
                                            @endforeach
                                        </select>
                                </div>
                                <div class="col-lg-3 col-sm-4">
                                        <label for="upozilla" class="sr-only">উপজেলা</label>
                                        <select class="form-control" name="subDistrict" id="subDistrict">
                                            <option value="" selected="">--উপজেলা--</option>
                                            @foreach ($sub_districts as $sub_district)
                                            <option value="{{ $sub_district->id }}">{{ $sub_district->subdistrict_name_bn }} || {{ $sub_district->subdistrict_name_en }}</option>
                                            @endforeach
                                        </select>
                                </div>
                                <div class="col-lg-2 col-sm-6">
                                    <button type="submit" class="btn btn-primary btn-block" >খুজুন</button>
                                    <a href=""></a>
                                </div>
                                <div class="col-lg-2 col-sm-6">
                                    <a href="{{ route('FrontendBangla.archive.index') }}" class="btn btn-danger btn-block">সব সংবাদ খুজুন</a>
                                </div>
                            </div>
                        </div>
                    </form>
    
                    <div class="archive-list">

                        <ul>
                             @foreach ($posts->where('title_bn', '!=' ,'') as $post)
                            <li>
                                <div class="archive-details">
                                    <div class="title">
                                        <a href="{{ route('FrontendBangla.post.SinglePostByDivision' , ['slug_bn' =>  $post->slug_bn] ) }}">
                                            <h2>{{$post->title_bn}}  </h2>
                                        </a>
                                    </div>
                                    <div class="date"><p>{{convertedDate($post->published_date)}}</p></div>
                                </div>
                                <img src="{{asset($post->image ) }}" alt="">
                            </li>
                            
                            @endforeach
                        </ul>

                    </div>


                </div>
               
            </div>
        </div>

    </div>
</div>
@endsection
@push('js')
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
                    
                    $('#district_id').append($('<option>', {
                            value: '',
                            text: 'Choose One',
                        }));
                    for (var i = 0; i < data.length; i++) {
                       
                        $('#district_id').append($('<option>', {
                            value: data[i].id,
                            text: data[i].district_name_bn + ' | ' + data[i].district_name_en,
                        }));
                        getSubDistrictByDistrict(data[i].id);
                    }
                }
            });
           
        }
</script>
<script>
function getSubDistrictByDistrict(district) {
            var id = $('#district_id').val();
            $.ajax({
                url: "{{ route('ajax.get_sub_district_by_district') }}",
                method: "get",
                data: {
                    id: id,
                },
                success: function(data) {
                    $('#subDistrict').html(null);
                    $('#subDistrict').append($('<option>', {
                            value: '',
                            text: 'Choose One',
                        }));
                    for (var i = 0; i < data.length; i++) {
                        $('#subDistrict').append($('<option>', {
                            value: data[i].id,
                            text: data[i].subdistrict_name_bn + ' | ' + data[i].subdistrict_name_en,
                        }));
                        // getSubDistrictByDistrict(data[i].id);
                    }
                }
            });
            
        }
</script>
@endpush