<div class="col-lg-12 col-md-12">
    <div class="card">
        <div class="card-header card-header-tabs card-header-rose">
            <div class="nav-tabs-navigation">
                <div class="nav-tabs-wrapper">
                    <ul class="nav nav-tabs" data-tabs="tabs" >
                        <li class="nav-item">
                            <a class="nav-link active" href="#above_detatl_news" data-toggle="tab">
                            <i class="material-icons"></i> Above Single Post
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#above_related_news" data-toggle="tab">
                            <i class="material-icons"></i> Above Related Post
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#above_comments" data-toggle="tab">
                            <i class="material-icons"></i> Above Comments
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="tab-content">
                <div class="tab-pane active" id="above_detatl_news">
                    @include('backend.ads.sections.detail_page_subsection.above_detail_news')
                </div>

                <div class="tab-pane" id="above_related_news">
                    @include('backend.ads.sections.detail_page_subsection.above_related_news')
                </div>
                
                <div class="tab-pane" id="above_comments">

                    @include('backend.ads.sections.detail_page_subsection.above_comments')

                </div>
               
            </div>
        </div>
    </div>
</div>