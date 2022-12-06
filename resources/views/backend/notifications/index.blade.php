@extends('backend.layouts.app')
@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card ">
                    <div class="card-header ">
                        <h4 class="card-title">NAVIGATION PILLS -
                        <small class="description">Horizontal Tabs</small>
                        </h4>
                    </div>
                    <div class="card-body ">
                        
                        <div class="tab-content tab-space">
                            <div class="tab-pane active" id="link1">
                                <label for="message"><h3><strong>Message</strong></h3></label>
                                <p id = "message" style = "color:white">{{$notification->message}}</p>
                                <br />
                                <label for="image"><h3><strong>Image Suggestion</strong></h3></label>
                                <img id = "image"  src="{{asset($notification->post->currection_image)}}" alt="">
                                <br />
                                <label for="message_suggestion"><h3><strong>Message Suggestion</strong></h3></label>
                                <p id = "message_suggestion" style = "color:white">{{$notification->post->message}}</p>
                                <br /> 
                                <label for="postid"><h3><strong>Post Title</strong> </h3></label>
                                <p id = "postid" style = "color:white">{{$notification->post->title_en}}</p>
                                <a href="{{ route('admin.news.edit', $notification->post->id) }}"><span>click here to edit</span></a>
                                
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection