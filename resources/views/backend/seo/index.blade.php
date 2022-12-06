
@extends('backend.layouts.app')
@section('content')
@include('backend.layouts.partial.global.alexa')
 <?php
 $ranking = alexaRank("https://thevoice24.com/");

    function alexaRankpost($url) {
    $postrating = alexaRank($url);
        echo $postrating['globalRank'];
    }

 ?>
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-header-icon card-header-rose">
                            <div class="card-icon">
                                <i class="material-icons">perm_identity</i>
                            </div>
                            <h4 class="card-title">EDIT PROFILE -
                            <small class="category">Complete your profile</small>
                            </h4>
                        </div>
                        <div class="card-body">

                    @isset($seos)

                        <form action="{{ route( 'admin.seo.update',$seos->id ) }}" method="post">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="text" name="id"class="form-control" value="{{$seos->id}}"hidden>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="md-label-floating">Meta Title</label>
                                        <input type="text" name="meta_title"class="form-control" value="{{$seos->meta_title}}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="md-label-floating">Meta Author</label>
                                        <input type="text" name="meta_author" class="form-control" value="{{$seos->meta_author}}">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="md-label-floating">Meta Tag</label>
                                        <input type="text" name="meta_tag" class="form-control tagsinput" data-role="tagsinput" data-color="info" value="{{$seos->meta_tag}}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="md-label-floating">Google Analytics</label>
                                        <input type="text" name="google_analytics" class="form-control" value="{{$seos->google_analytics}}">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="md-label-floating">Meta Description</label>
                                        <input type="text" name="meta_description" class="form-control" value="{{$seos->meta_description}}">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label class="md-label-floating">Alexa Ranking Global Rank</label>
                                        <input type="text" name="alexa_rating_global" class="form-control" value = "@isset($ranking['globalRank'][0]){{ $ranking['globalRank'][0] }} @else {{ $ranking['globalRank'] }}@endisset">
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label class="md-label-floating">Alexa Ranking Country Rank</label>
                                        <input type="text" name="alexa_rating_counrty" class="form-control" value = "@isset($ranking['CountryRank'][0]){{ $ranking['CountryRank'][0]  }} @else {{ $ranking['CountryRank'] }}@endisset">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="md-label-floating">Google Verification</label>
                                        <input type="text" name="google_verification" class="form-control" value="{{$seos->google_verification}}">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="md-label-floating">Bing Verification</label>
                                        <input type="text" name="bing_verification" class="form-control" value="{{$seos->bing_verification}}">
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

                            <button type="submit" class="btn btn-rose pull-right">Update SEO</button>
                            <div class="clearfix"></div>
                        </form>

                    @else

                        <form action="{{ route( 'admin.seo.store' ) }}" method="post">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="md-label-floating">Meta Title</label>
                                        <input type="text" name="meta_title"class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="md-label-floating">Meta Author</label>
                                        <input type="text" name="meta_author" class="form-control">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="md-label-floating">Meta Tag</label>
                                        <input type="text" name="meta_tag" class="form-control tagsinput" data-role="tagsinput" data-color="info">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="md-label-floating">Google Analytics</label>
                                        <input type="text" name="google_analytics" class="form-control">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="md-label-floating">Meta Description</label>
                                        <input type="text" name="meta_description" class="form-control">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label class="md-label-floating">Alexa Ranking Global Rank</label>
                                        <input type="text" name="alexa_rating_global" class="form-control" value = "@isset($ranking['globalRank'][0]){{ $ranking['globalRank'][0] }} @else {{ $ranking['globalRank']  }}@endisset">
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label class="md-label-floating">Alexa Ranking  Country Rank</label>
                                        <input type="text" name="alexa_rating_counrty" class="form-control" value = "@isset($ranking['CountryRank'][0]){{ $ranking['CountryRank'][0]  }} @else {{ $ranking['CountryRank']  }}@endisset">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="md-label-floating">Google Verification</label>
                                        <input type="text" name="google_verification" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="md-label-floating">Bing Verification</label>
                                        <input type="text" name="bing_verification" class="form-control">
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

                            <button type="submit" class="btn btn-rose pull-right" href="{{route('admin.seo.store')}}">Insert New SEO</button>
                            <div class="clearfix"></div>
                        </form>
                    @endisset

                </div>
              </div>
            </div>

          </div>

        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-primary card-header-icon">
                        <div class="card-icon">
                            <i class="material-icons">assignment</i>
                        </div>
                        <h4 class="card-title">GOOGLE ANALYTICS</h4>
                    </div>
                    <div class="card-body">
                       
                        <div class="material-datatables">
                            <table id="" class="table table-striped table-no-bordered table-hover filtertable" cellspacing="0" width="100%" style="width:100%">
                                <thead>
                                <tr>
                                    <th class="text-center">SN</th>
                                    <th class="text-center">Date</th>
                                    <th class="text-center">Day</th>
                                    <th class="text-center">Visitors</th>
                                    <th class="text-center">Page Title</th>
                                    <th class="text-center">Page Views</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $no = 0;
                                    @endphp
                                    @foreach ($mostvisitor as $data)
                                        <tr>
                                            <td>{{ ++$no }}</td>
                                            <td>{{ $data['date'] }}</td>
                                            <td>{{ Carbon\Carbon::parse( $data['date'])->isoFormat('dddd');}}</td>
                                            <td>{{ $data['visitors'] }}</td>
                                            <td>{{ $data['pageTitle'] }}</td>
                                            <td>{{ $data['pageViews'] }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                             
                                
                            </table>
                        </div>
                    </div>
                    <!-- end content-->
                </div>
                <!-- end col-md-12 -->
            </div>
        </div>


        <div class="row">
            {{-- <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-primary card-header-icon">
                        <div class="card-icon">
                            <i class="material-icons">assignment</i>
                        </div>
                        <h4 class="card-title">Post Analytics</h4>
                    </div>
                    <div class="card-body">
                       
                        <div class="material-datatables">
                            <table id="datatable1" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                                <thead>
                                    <tr>
                                    <th>Title</th>
                                    <th>Published Date</th>
                                    <th>Category</th>
                                    <th>Google Analytics</th>
                                    <th>Alexa</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td> tamima</td>
                                        <td> tamima</td>
                                        <td> tamima</td>
                                        <td> tamima</td>
                                        <td> tamima</td>
                                    </tr>
                                    
                                </tbody>
                                
                              
                            </table>
                        </div>
                    </div>
                    <!-- end content-->
                </div>
                <!-- end col-md-12 -->
            </div> --}}

            <div class="col-md-12">
                    <div class="card" style="color: #d7dffa !important;">
                        <div class="card-header card-header-primary card-header-icon">
                            <div class="card-icon">
                                <i class="fa fa-newspaper-o fa-2x" aria-hidden="true"></i>
                            </div>
                            <h4 class="card-title">Post Analytics</h4>
                        </div>
                        <div class="card-body">

                            <div class="toolbar">
                                <!--        Here you can write extra buttons/actions for the toolbar        -->
                            </div>
                            <div class="material-datatables">
                                <table id="" class="table table-striped table-no-bordered table-hover filtertable" cellspacing="0" width="100%" style="width:100%">
                                    <thead>
                                        <tr>
                                        <th>Title</th>
                                        <th>Published Date</th>
                                        <th>Category</th>
                                        <th>Google Analytics</th>
                                        <th>Alexa</th>
                                        {{-- <th>Alexa Ranking Global</th>
                                        <th>Alexa Ranking Country</th> --}}
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                        <th>Title</th>
                                        <th>Published Date</th>
                                        <th>Category</th>
                                        <th>Google Analytics</th>
                                        <th>Alexa</th>
                                        {{-- <th>Alexa Ranking Global</th>
                                        <th>Alexa Ranking Country</th> --}}
                                        </tr>
                                    </tfoot>
                                    <tbody>

                                        @foreach($posts as $post)
                                            @if ($post->post_type_id == 1)
                                                <?php
                                                    $url = config('app.url') . "/bangla/post/bangla_single_category_post/single_category_post/" . $post->slug_bn;
                                                    $url_google_analytics = "/bangla/post/bangla_single_category_post/single_category_post/" . $post->slug_bn;
                                                ?>
                                                <tr >
                                                    {{-- <td> {{ $url }}</td> --}}
                                                    <td onClick="window.open('{{route('FrontendBangla.post.categorypostbyId' , ['slug_bn' =>  $post->slug_bn] ) }}');" >{{ $post->title_bn }}</td>
                                                    <td onClick="window.open('{{route('FrontendBangla.post.categorypostbyId' , ['slug_bn' =>  $post->slug_bn] ) }}');">{{ $post->published_date }}</td>
                                                    <td onClick="window.open('{{route('FrontendBangla.post.categorypostbyId' , ['slug_bn' =>  $post->slug_bn] ) }}');">{{ $post->category->category_name_bn }}</td>
                                                    @foreach ($analyticsData as $data)
                                                    {{-- @php

                                                        // print_r($data)
                                                    @endphp --}}
                                                        @if ($data[0]==$url_google_analytics)
                                                            <td onClick="window.open('{{route('FrontendBangla.post.categorypostbyId' , ['slug_bn' =>  $post->slug_bn] ) }}');">{{ $data[2] }}</td>

                                                        @endif
                                                    @endforeach

                                                    <td  data-toggle="modal" data-target="#analytics" onclick="alexaRankpost('{{ $url }}')"><a href="#"><span class="material-icons">
                                                        bar_chart
                                                        </span></a>
                                                    </td>
                                                </tr>
                                            @else
                                                <?php
                                                    $url = config('app.url') . "/frontend/post/single_category_post/" . $post->slug_en;
                                                    $url_google_analytics = "/frontend/post/single_category_post/" . $post->slug_en;
                                                ?>
                                                <tr >
                                                    {{-- <td> {{ $url }}</td> --}}
                                                    <td onClick="window.open('{{route('frontend.post.categorypostbyId' , ['slug_en' =>  $post->slug_en] ) }}');" >{{ $post->title_en }}</td>
                                                    <td onClick="window.open('{{route('frontend.post.categorypostbyId' , ['slug_en' =>  $post->slug_en] ) }}');">{{ $post->published_date }}</td>
                                                    <td onClick="window.open('{{route('frontend.post.categorypostbyId' , ['slug_en' =>  $post->slug_en] ) }}');">{{ $post->category->category_name_en }}</td>
                                                    @foreach ($analyticsData as $data)
                                                    {{-- @php

                                                        // print_r($data)
                                                    @endphp --}}
                                                        @if ($data[0]==$url_google_analytics)
                                                            <td onClick="window.open('{{route('frontend.post.categorypostbyId' , ['slug_en' =>  $post->slug_en] ) }}');">{{ $data[2] }}</td>

                                                        @endif
                                                    @endforeach

                                                    <td  data-toggle="modal" data-target="#analytics" onclick="alexaRankpost('{{ $url }}')"><a href="#"><span class="material-icons">
                                                        bar_chart
                                                        </span></a>
                                                    </td>
                                                </tr>
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
 
        </div>
    </div>


     <!-- Add modal-->
     <div class="modal fade" id="analytics" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog">
           <div class="modal-content">
              <div class="modal-header">
                 <h4 class="modal-title">Alexa</h4>
                 <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                 <i class="material-icons">clear</i>
                 </button>
              </div>
              <div class="modal-body">
                 <div class="form-group md-form-group is-filled">

                       {{-- <div class="row">
                           <label class="col-md-3 col-form-label">Google Analytic</label>
                           <div class="col-md-9">
                            <input class="form-control google_analytic" type="text"  name="google_analytic">
                           </div>
                       </div> --}}
                       <div class="row">
                          <label class="col-md-3 col-form-label">Alexa Ranking Country</label>
                          <div class="col-md-9">
                             <div class="form-group has-default">
                                <input class="form-control alexa_ranking_country" type="text" name="alexa_ranking_country">
                                @error('alexa_ranking_country')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                             </div>
                          </div>
                       </div>
                       <div class="row">
                          <label class="col-md-3 col-form-label">Alexa Ranking Global</label>
                          <div class="col-md-9">
                             <div class="form-group has-default ">
                                <input class="form-control alexa_ranking_global" type="text" name="alexa_ranking_global"  >
                                @error('alexa_ranking_global')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                             </div>
                          </div>
                       </div>

                       <div class="modal-footer">
                          <button class="btn btn-danger mr-1" type="button" data-dismiss="modal">Close</button>
                       </div>

                 </div>
              </div>
           </div>
        </div>
     </div>
  </div>

@endsection

<!-- summernote css/js -->


@push('js')
<script>
    function alexaRankpost(url) {
        $.ajax({
            url: "{{ route('alexa.google.post.ranking') }}",
            data: {
                posturl: url
            },
            success: function(data) {
                console.log(data['google_analytics'])
                if(data['CountryRank'] != null){
                    $('.alexa_ranking_country').val(data['CountryRank'])
                }
                if(data['globalRank'] != null){
                    $('.alexa_ranking_global').val(data['globalRank'])
                }


            }
        });
    }
</script>




@endpush
