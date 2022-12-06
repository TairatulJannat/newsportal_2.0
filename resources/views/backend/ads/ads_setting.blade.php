@extends('backend.layouts.app');
@section('content'); 

<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Advertisement {{-- <small class="description"></small> --}}</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-2">
                                <ul class="nav nav-pills flex-column" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" data-toggle="tab" href="#link4" role="tablist">
                                            Home
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link " data-toggle="tab" href="#link10" role="tablist">
                                            Right column
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-toggle="tab" href="#link5" role="tablist">
                                            List page
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-toggle="tab" href="#link6" role="tablist">
                                            Details page
                                        </a>
                                    </li>
                                    
                                    {{-- <li class="nav-item">
                                        <a class="nav-link" data-toggle="tab" href="#link8" role="tablist">
                                            Photo Gallery
                                        </a>
                                    </li> --}}
                                    <li class="nav-item">
                                        <a class="nav-link" data-toggle="tab" href="#link9" role="tablist">
                                            Video Gallery
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-md-10">
                                <div class="tab-content">
                                    <div class="tab-pane active" id="link4">
                                        @include('backend.ads.sections.home')
                                    </div>
                                    <div class="tab-pane" id="link5">
                                         @include('backend.ads.sections.list_page')
                                    </div>
                                    <div class="tab-pane" id="link6">
                                        @include('backend.ads.sections.detail_page')
                                    </div>
                                    
                                    
                                    <div class="tab-pane" id="link8">
                                        Completely synergize resource taxing relationships via premier niche markets. Professionally cultivate one-to-one customer service with robust ideas.
                                        <br />
                                        <br />
                                        Dynamically innovate resource-leveling customer service for state of the art customer service.
                                    </div>
                                    <div class="tab-pane" id="link9">
                                        @include('backend.ads.sections.video_gallery')
                                    </div>
                                    <div class="tab-pane" id="link10">
                                        @include('backend.ads.sections.right_column')  
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
 @endsection
