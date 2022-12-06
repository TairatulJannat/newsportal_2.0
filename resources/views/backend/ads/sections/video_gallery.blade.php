<div class="col-lg-12 col-md-12">
    <div class="card">
        <div class="card-header card-header-tabs card-header-rose">
            <div class="nav-tabs-navigation">
                <div class="nav-tabs-wrapper">
                    <ul class="nav nav-tabs" data-tabs="tabs" >
                        <li class="nav-item">
                            <a class="nav-link active" href="#single_video" data-toggle="tab">
                            <i class="material-icons"></i> Single Video
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#more_video" data-toggle="tab">
                            <i class="material-icons"></i> More Video
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="tab-content">
                <div class="tab-pane active" id="single_video">
                    @include('backend.ads.sections.video_gallery.single_video')
                </div>
                <div class="tab-pane" id="more_video">
                    @include('backend.ads.sections.video_gallery.more_video')
                </div>
            </div>
        </div>
    </div>
</div>