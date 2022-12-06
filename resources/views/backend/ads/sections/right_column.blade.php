<div class="col-lg-12 col-md-12">
    <div class="card">
        <div class="card-header card-header-tabs card-header-rose">
            <div class="nav-tabs-navigation">
                <div class="nav-tabs-wrapper">
                    <ul class="nav nav-tabs" data-tabs="tabs" >
                        <li class="nav-item">
                            <a class="nav-link active" href="#bellow_recent_news" data-toggle="tab">
                            <i class="material-icons"></i> Bellow Recent News
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#bellow_calender" data-toggle="tab">
                            <i class="material-icons"></i> Bellow Calender
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#bellow_tab_content" data-toggle="tab">
                            <i class="material-icons"></i>  Bellow Tab Content
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="tab-content">
                <div class="tab-pane active" id="bellow_recent_news">
                    @include('backend.ads.sections.right_column_subsection.bellow_recent_news')
                </div>

                <div class="tab-pane" id="bellow_calender">
                    @include('backend.ads.sections.right_column_subsection.bellow_calender')
                </div>
                
                <div class="tab-pane" id="bellow_tab_content">

                    @include('backend.ads.sections.right_column_subsection.bellow_tab_content')

                </div>
               
            </div>
        </div>
    </div>
</div>