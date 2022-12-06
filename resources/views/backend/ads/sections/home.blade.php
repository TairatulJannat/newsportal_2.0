<div class="col-lg-12 col-md-12">
    <div class="card">
        <div class="card-header card-header-tabs card-header-rose">
            <div class="nav-tabs-navigation">
                <div class="nav-tabs-wrapper">
                    <ul class="nav nav-tabs" data-tabs="tabs" >
                        <li class="nav-item">
                            <a class="nav-link active" href="#header" data-toggle="tab">
                            <i class="material-icons"></i> Header
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#top_news" data-toggle="tab">
                            <i class="material-icons"></i> Top News
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#main_content" data-toggle="tab">
                            <i class="material-icons"></i> Below Main Content
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#category" data-toggle="tab">
                            <i class="material-icons"></i>Category
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#featude_vedio" data-toggle="tab">
                            <i class="material-icons"></i>Feature Video
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#image_gallery" data-toggle="tab">
                            <i class="material-icons"></i>Image Gallery
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#above_footer" data-toggle="tab">
                            <i class="material-icons"></i>Above Footer
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="tab-content">
                <div class="tab-pane active" id="header">
                    @include('backend.ads.sections.home_subsection.header')
                </div>
                <div class="tab-pane" id="top_news">

                    @include('backend.ads.sections.home_subsection.left_main_carousel')

                </div>
                <div class="tab-pane" id="main_content">

                    @include('backend.ads.sections.home_subsection.main_content')

                </div>
                <div class="tab-pane" id="category">

                    @include('backend.ads.sections.home_subsection.category')

                </div>
                <div class="tab-pane" id="featude_vedio">

                    @include('backend.ads.sections.home_subsection.feature_video')

                </div>
                <div class="tab-pane" id="image_gallery">

                    @include('backend.ads.sections.home_subsection.image_gallery')

                </div>
                <div class="tab-pane" id="above_footer">

                    @include('backend.ads.sections.home_subsection.above_footer')

                </div>
            </div>
        </div>
    </div>
</div>