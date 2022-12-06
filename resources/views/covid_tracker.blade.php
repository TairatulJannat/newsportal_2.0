@extends('frontend.layouts.app') 
@section('content')
{{-- @php
    print_r($data);
@endphp --}}
<style>
</style>

<div class="covid-info-wrapper container ">

    <div class="covid-status d-flex justify-content-between">
    
        {{-- Select Country form --}}
        <div class="select-country w-25">
            <form action="{{ route('covid.tracker') }}" method="post">
                @csrf
                <div class="select" >
                    <label for="">Select Country:</label>
                    
                    <select name="name" id="coronavirus">
                        <option value="World">World</option>
                        @foreach ($country as $item)
                        <option value="{{ $item->name }}">{{ $item->name }}</option>  
                        @endforeach
                    </select>
                    
                </div>
                <p type="submit" class="btn btn-outline-primary" id="status-btn">Get Status</p>
            </form>
        </div>
        <div class="info-table-wrapper w-100">
            <div class="info-table" id ="tabb">
               
               
                
                    <h1 class="page-title mb-4">Country: <span style ='color:red'>{{$data[0]['country']}}</span></h1>


                    {{-- <div id="tabb">@include('ajax_covid.php')</div> --}}
                    <div class="row">
                        <div id="no-more-tables" class="table-1">
                            <table class="col-md-12 table-bordered table-striped table-condensed cf mb-4 p-0">
                                <thead class="cf">
                                    <tr>
                                        
                                        <th class="numeric">Today Cases</th>
                                        <th class="numeric">News Cases</th>
                                        <th class="numeric">Total Recovered</th>
                                        <th class="numeric">Deaths </th>
                                        <th class="numeric">Total Deaths</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        
                                        <td data-title="">{{$data[0]['todayCases']}}</td>
                                        <td data-title="">{{$data[0]['cases']}}</td>
                                        <td data-title="" class="numeric">{{$data[0]['recovered']}}</td>
                                        <td data-title="" class="numeric">{{$data[0]['todayDeaths']}}</td>
                                        <td data-title="" class="numeric">{{$data[0]['deaths']}}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
        
                    <div class="row">
                        <div id="no-more-tables" class="table-2">
                            <table class="col-md-12 table-bordered table-striped table-condensed cf p-0">
                                <thead class="cf">
                                    <tr>
                                        <th class="numeric">Active Cases</th>
                                        <th class="numeric">Critical Cases</th>
                                        <th class="numeric">Cases Per One Million</th>
                                        <th class="numeric">Deaths Per One Million</th>
                                        <th class="numeric">Total Tests</th>
                                        <th class="numeric">Tests Per One Million</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td data-title="" class="numeric">{{$data[0]['active']}}</td>
                                        <td data-title="" class="numeric">{{$data[0]['critical']}}</td>
                                        <td data-title="" class="numeric">{{$data[0]['casesPerOneMillion']}}</td>
                                        <td data-title="" class="numeric">{{$data[0]['deathsPerOneMillion']}}</td>
                                        <td data-title="" class="numeric">{{$data[0]['totalTests']}}</td>
                                        <td data-title="" class="numeric">{{$data[0]['testsPerOneMillion']}}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div> 
               
            </div>
        </div>

    
    </div>

    <div class="covid-newses archive mt-5">
        <h1 class="page-title" style="border-bottom: 1px solid #ddd; padding-bottom: .8rem;">COVID-19 NEWS</h1>
        <div class="archive-list">
            
            <ul class="covid-news-list mt-5">
            @foreach ($covid_posts as $covid_post)
                <li>
                    <div class="archive-details">
                        <div class="date">
                            <p> {{\Carbon\Carbon::parse($covid_post->published_date)->isoFormat('dddd, MMM Do YYYY')  }} </p>
                        </div>
                        <div class="title">
                            <a href="{{route('frontend.post.categorypostbyId' , ['slug_en' =>  $covid_post->slug_en] ) }}">
                                <h2>{{ Str::limit($covid_post->title_en, 60) }}</h2>
                            </a>
                            <p>{!! Str::limit($covid_post->details_en , 270) !!}</p>
                        </div>
                        <div class="img">
                            <img src="{{ asset($covid_post->image) }}" alt="">
                        </div>
                    </div>
                </li>
            @endforeach      
            </ul>
        </div>
    </div>
</div>



@endsection

@push('js')
    <script>
        $(document).ready(function(){
            // $('.info-table').hide();

          
        });
        $('#status-btn').click(function(){
                // $('.info-table').toggle();
                var id = $('#coronavirus').val();
                // alert(id);
                $.ajax({
                    url: "{{ route('covid.tracker') }}",
                    dataType: 'html',
                    method: 'GET',
                    data: {
                        id: id,
                    },
                    success: function(data) {
                        // console.log(data);
                        $('#tabb').html(data);
                        
                    }
                });
            });
    </script>
@endpush