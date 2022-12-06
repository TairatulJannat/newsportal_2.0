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
                            <h4 class="card-title">MANAGE PUBLISHED NEWS</h4>
                        </div>

                        <div class="row-md-6 btn-group">
                            <button type="button" id="englishnews" class="col-lg-2 col-md-2 col-sm-6 col-6 btn btn-info user_role ml-3">English News</button>
                            <button type="button" id="banglanews" class="col-lg-2 col-md-2 col-sm-6 col-6 btn btn-info user_role ml-1">Bangla News</button>
                            <button type="button" id="bothnews" class="col-lg-2 col-md-2 col-sm-6 col-6 btn btn-info user_role ml-1">Both News</button>
                         </div>

                        <div class="material-datatables">
                            <div class="selectnews" >
                                <table id="" class="table table-striped table-no-bordered table-hover filtertable" cellspacing="0"
                                    width="100%" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th class="text-center">SN</th>
                                            <th class="text-center">Image</th>
                                            <th class="text-center">News Title Bangla</th>
                                            <th class="text-center">News Title English</th>
                                            <th class="text-center">Reporter Name</th>
                                            <th class="text-center">Published Date</th>
                                            @if (Auth::user()->type == 'editor' || Auth::user()->type == 'admin' || Auth::user()->type == 'super_admin')
                                                <th class="text-center">Breaking News</th>
                                                <th class="text-center">Feature News</th>
                                                <th class="text-center">Status</th>
                                                <th class="text-center">Main News</th>
                                                @if (Auth::user()->comments_role == 1)
                                                    <th class="text-center" style="width: 13%">Action</th>
                                                @endif
                                            @endif
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @foreach ($posts as $key => $post)
                                            @if ($post->stage == 'approved')
                                                @if (Auth::user()->type !== 'reporter')
                                                    @if (Auth::user()->id !== $post->user_id)
                                                        <tr>
                                                            <td class="text-left align-top">{{ ++$key }}</td>
                                                            <td class="text-left align-top"><img width="100" height="100"
                                                                    style="object-fit: cover;" src="{{ asset($post->image) }}"
                                                                    alt=""></td>
                                                            <td class="text-left align-top">{{ $post->title_bn }}</td>
                                                            <td class="text-left align-top">{{ $post->title_en }}</td>
                                                            <td class="text-left align-top">{{ $post->user->name_en }}</td>
                                                            <td class="text-left align-top">{{ $post->published_date }}</td>
                                                            @if (Auth::user()->type == 'editor' || Auth::user()->type == 'admin' || Auth::user()->type == 'super_admin')
                                                                <td class="text-center">
                                                                    @if ($post->breaking_news == 1)
                                                                        <div class="togglebutton">
                                                                            <label>
                                                                                <input type="checkbox" checked
                                                                                    data-id="{{ $post->id }}"
                                                                                    onchange="breaking_news({{ $post->id }})"
                                                                                    name="breaking_news" class="breaking_news"
                                                                                    value="{{ $post->breaking_news }}">
                                                                                <span class="toggle"></span>
                                                                            </label>
                                                                        </div>
                                                                    @else
                                                                        <div class="togglebutton">
                                                                            <label>
                                                                                <input type="checkbox"
                                                                                    data-id="{{ $post->id }}"
                                                                                    onchange="breaking_news({{ $post->id }})"
                                                                                    name="breaking_news" class="breaking_news"
                                                                                    value="{{ $post->breaking_news }}">
                                                                                <span class="toggle"></span>
                                                                            </label>
                                                                        </div>
                                                                    @endif
                                                                </td>
                                                                <td class="text-center">
                                                                    @if ($post->feature_news == 1)
                                                                        <div class="togglebutton">
                                                                            <label>
                                                                                <input type="checkbox" checked
                                                                                    data-id="{{ $post->id }}"
                                                                                    onchange="feature_news({{ $post->id }})"
                                                                                    name="feature_news" class="feature_news"
                                                                                    value="{{ $post->feature_news }}">
                                                                                <span class="toggle"></span>
                                                                            </label>
                                                                        </div>
                                                                    @else
                                                                        <div class="togglebutton">
                                                                            <label>
                                                                                <input type="checkbox"
                                                                                    data-id="{{ $post->id }}"
                                                                                    onchange="feature_news({{ $post->id }})"
                                                                                    name="feature_news" class="feature_news"
                                                                                    value="{{ $post->feature_news }}">
                                                                                <span class="toggle"></span>
                                                                            </label>
                                                                        </div>
                                                                    @endif
                                                                </td>

                                                                <td class="text-center">
                                                                    @if ($post->status == 1)
                                                                        <div class="togglebutton">
                                                                            <label>
                                                                                <input type="checkbox" checked
                                                                                    id="{{ $post->id }}"
                                                                                    onchange="status(this.id)" name="status"
                                                                                    class="status"
                                                                                    value="{{ $post->status }}">
                                                                                <span class="toggle"></span>
                                                                            </label>
                                                                        </div>
                                                                    @else
                                                                        <div class="togglebutton">
                                                                            <label>
                                                                                <input type="checkbox" id="{{ $post->id }}"
                                                                                    onchange="status(this.id)" name="status"
                                                                                    class="status"
                                                                                    value="{{ $post->status }}">
                                                                                <span class="toggle"></span>
                                                                            </label>
                                                                        </div>
                                                                    @endif
                                                                </td>
                                                                <td class="text-center">
                                                                    @if ($post->main_news == 1)
                                                                        <div class="togglebutton">
                                                                            <label>
                                                                                <input type="checkbox" checked
                                                                                    id="{{ $post->id }}"
                                                                                    onchange="main_news(this.id)"
                                                                                    name="main_news" class="main_news"
                                                                                    value="{{ $post->main_news }}">
                                                                                <span class="toggle"></span>
                                                                            </label>
                                                                        </div>
                                                                    @else
                                                                        <div class="togglebutton">
                                                                            <label>
                                                                                <input type="checkbox" id="{{ $post->id }}"
                                                                                    onchange="main_news(this.id)"
                                                                                    name="main_news" class="main_news"
                                                                                    value="{{ $post->main_news }}">
                                                                                <span class="toggle"></span>
                                                                            </label>
                                                                        </div>
                                                                    @endif
                                                                </td>
                                                                @if (Auth::user()->comments_role == 1)
                                                                    <td class="td-actions text-center">
                                                                        @if (Auth::user()->comments_role == 1)
                                                                            <a href="{{ route('admin.news.comments.list', $post->id) }}"
                                                                                data-toggle="tooltip"
                                                                                class="btn btn-link text-info">
                                                                                <i class="material-icons">comment</i>
                                                                            </a>
                                                                        @endif
                                                                    </td>
                                                                @endif
                                                            @endif
                                                        </tr>
                                                    @endif
                                                @else
                                                    @if (Auth::user()->id == $post->user_id)
                                                        <tr>
                                                            <td class="text-left align-top">{{ ++$key }}</td>
                                                            <td class="text-left align-top"><img width="100" height="100"
                                                                    src="{{ asset($post->image) }}" alt=""></td>
                                                            <td class="text-left align-top">{{ $post->title_bn }}</td>
                                                            <td class="text-left align-top">{{ $post->title_en }}</td>
                                                            <td class="text-left align-top">{{ $post->user->name_en }}</td>
                                                            {{-- <td class="text-center">{{ $post->tags_en }}</td>
                                                        <td class="text-center">{{ $post->slug_bn }}</td>
                                                        <td class="text-center">{{ $post->slug_en }}</td> --}}
                                                            <td class="text-left align-top">{{ $post->published_date }}</td>
                                                            @if (Auth::user()->type == 'editor' || Auth::user()->type == 'admin' || Auth::user()->type == 'super_admin')
                                                                <td class="text-center">
                                                                    @if ($post->breaking_news == 1)
                                                                        <div class="togglebutton">
                                                                            <label>
                                                                                <input type="checkbox" checked
                                                                                    data-id="{{ $post->id }}"
                                                                                    onchange="breaking_news({{ $post->id }})"
                                                                                    name="breaking_news" class="breaking_news"
                                                                                    value="{{ $post->breaking_news }}">
                                                                                <span class="toggle"></span>
                                                                            </label>
                                                                        </div>
                                                                    @else
                                                                        <div class="togglebutton">
                                                                            <label>
                                                                                <input type="checkbox"
                                                                                    data-id="{{ $post->id }}"
                                                                                    onchange="breaking_news({{ $post->id }})"
                                                                                    name="breaking_news" class="breaking_news"
                                                                                    value="{{ $post->breaking_news }}">
                                                                                <span class="toggle"></span>
                                                                            </label>
                                                                        </div>
                                                                    @endif
                                                                </td>

                                                                <td class="text-center">
                                                                    @if ($post->status == 1)
                                                                        <div class="togglebutton">
                                                                            <label>
                                                                                <input type="checkbox" checked
                                                                                    id="{{ $post->id }}"
                                                                                    onchange="status(this.id)" name="status"
                                                                                    class="status"
                                                                                    value="{{ $post->status }}">
                                                                                <span class="toggle"></span>
                                                                            </label>
                                                                        </div>
                                                                    @else
                                                                        <div class="togglebutton">
                                                                            <label>
                                                                                <input type="checkbox" id="{{ $post->id }}"
                                                                                    onchange="status(this.id)" name="status"
                                                                                    class="status"
                                                                                    value="{{ $post->status }}">
                                                                                <span class="toggle"></span>
                                                                            </label>
                                                                        </div>
                                                                    @endif
                                                                </td>
                                                                <td class="td-actions text-center">
                                                                    @if (Auth::user()->comments_role == 1)
                                                                        <a href="{{ route('admin.news.comments.list', $post->id) }}"
                                                                            data-toggle="tooltip"
                                                                            class="btn btn-link text-info">
                                                                            <i class="material-icons">comment</i>
                                                                        </a>
                                                                    @endif
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
            <!-- end row -->
            {{-- Own pending news --}}
            @if (Auth::user()->type == 'sub_editor' || Auth::user()->type == 'admin' || Auth::user()->type == 'editor' || Auth::user()->type == 'super_admin')

                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header card-header-primary card-header-icon ">
                                <div class="card-icon">
                                    <i class="material-icons">assignment</i>
                                </div>
                                <h4 class="card-title">MANAGE OWN PUBLISHED NEWS</h4>
                            </div>

                            <div class="material-datatables mt-3">
                                <table id="" class="table table-striped table-no-bordered table-hover filtertable"
                                    cellspacing="0" width="100%" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th class="text-center">SN</th>
                                            <th class="text-center">Image</th>
                                            <th class="text-center">News Title Bangla</th>
                                            <th class="text-center">News Title English</th>
                                            {{-- <th class="text-center" style="width:10%;">News Tags Bangla</th>
                                        <th class="text-center"style="width:10%;">News Tags English</th>
                                        <th class="text-center" style="width:10%;">Slug Bangla</th>
                                        <th class="text-center" style="width:10%;">Slug English</th> --}}
                                            <th class="text-center">Published Date</th>
                                            <th class="text-center" style="width: 13%">Action</th>

                                        </tr>
                                    </thead>

                                    <tbody>
                                        @foreach ($posts as $key => $post)
                                            @if ($post->stage == 'approved')
                                                @if (Auth::user()->id == $post->user_id)
                                                    <tr>

                                                        <td class="text-center">{{ ++$key }}</td>
                                                        <td class="text-center"><img width="100" height="100"
                                                                src="{{ asset($post->image) }}"
                                                                style="object-fit: cover; alt=""></td> 
                                                        <td class=" text-center">{{ $post->title_bn }}</td>
                                                        <td class="text-center">{{ $post->title_en }}</td>
                                                        <td class="text-center">{{ $post->published_date }}</td>
                                                        <td class="text-center">
                                                            <a href="{{ route('admin.news.edit', $post->id) }}"
                                                                data-target="#edit_image"
                                                                class="btn btn-link text-success">
                                                                <i class="material-icons">edit</i>
                                                            </a>
                                                        </td>

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
        @endif
    </div>



@endsection


@push('js')

    <script>
        function breaking_news(id) {
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
                    setTimeout(function() { // wait for 5 secs(2)
                        location.reload(); // then reload the page.(3)
                    }, 2000);
                }
            });
        }

        function feature_news(id) {
            var status = $(this).prop('checked') == true ? 1 : 0;
            // alert(status);
            // alert(id);
            $.ajax({

                url: 'feature-news-update/' + id,
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
                    }, 1500);
                }
            });
        }

        function status(id) {
            $.ajax({

                url: 'status-update',
                type: "GET",
                data: {
                    'id': id
                },

                success: function(data, status) {

                    if (status == "success") {
                        if (data == 1) {
                            Swal.fire(
                                'Success!',
                                '',
                                'success'
                            )

                            setTimeout(function() { // wait for 5 secs(2)
                                location.reload(); // then reload the page.(3)
                            }, 2000);
                        }
                    }
                }
            });
        }

        function main_news(id) {
            var status = $(this).prop('checked') == true ? 1 : 0;
            // alert(status);
            // alert(id);
            $.ajax({

                url: 'main-news-update/' + id,
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
                    }, 1500);
                }
            });
        }

        
    </script>

    <script>
        $( document ).ready(function() {
               //alert(456)

            $('#englishnews').click(function(){
                             
                selectnews('english_news');
            })
            $('#banglanews').click(function(){
                // alert(456)
                selectnews('bangla_news');
            })
            $('#bothnews').click(function(){
                // alert(456)
                selectnews('both_news');
            })
            // alert( "ready!" );
            function selectnews(selectnews){
                // alert(selectnews);
                $.ajax({
                    'url': "{{route('admin.select.news')}}",
                    'dataType': 'html',
                    'data' : {
                        type:selectnews,
                        news: "published"
                        // console.log(news);
                    },
                    'type': 'GET',

                        success:function(posts){
                            $('.selectnews').html(posts);

                        }
                });
            }
        });

    </script>






@endpush
