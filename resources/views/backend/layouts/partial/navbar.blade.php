 <!-- Navbar -->
 <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
    <div class="container-fluid">
        <div class="navbar-wrapper">
            <div class="navbar-minimize">
                <button id="minimizeSidebar" class="btn btn-just-icon btn-white btn-fab btn-round">
                    <i class="material-icons text_align-center visible-on-sidebar-regular">more_vert</i>
                    <i class="material-icons design_bullet-list-67 visible-on-sidebar-mini">view_list</i>
                </button>
            </div>
            <a class="navbar-brand" id="navbar-brand" href="javascript:;">Dashboard ({{ucfirst(trans(Auth::user()->type))}})</a>
        </div>
        <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="sr-only">Toggle navigation</span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
        </button>
   

        <div class="collapse navbar-collapse justify-content-end">
            {{-- <div class="theme-chng d-flex">
                <p>Dark/Light</p>
                <div class="theme-btn mr-3">
                    <input type="checkbox" id="theme-btn" onclick="themeChange()" class="theme-btn-dark" value="Day/Night">
                    <label for="theme-btn"></label>
                </div>
            </div> --}}

            <a target="_blank" href="{{ route('frontend.home') }}">
                <span class="material-icons">
                language
                </span>
            </a>  
            
            <form class="navbar-form pl-3">
                <div class="input-group no-border">
                    <input type="text" value="" class="form-control" placeholder="Search...">
                    <button type="submit" class="btn btn-white btn-round btn-just-icon">
                        <i class="material-icons">search</i> 
                        <div class="ripple-container"></div>
                    </button>
                </div>
            </form>
            <ul class="navbar-nav">
                <li class="nav-item ml-4">
                    <div class="theme-chng d-flex">
                        <p>Dark/Light</p>
                        <div class="theme-btn mr-3">
                            <input type="checkbox" id="theme-btn" class="theme-btn-dark" value="Day/Night">
                            <label for="theme-btn"></label>
                        </div>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="nav-link1" href="javascript:;">
                        <i class="material-icons">dashboard</i>
                        <p class="d-lg-none d-md-block">
                            Stats
                        </p>
                    </a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link" id="nav-link2" href="http://example.com" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="material-icons">notifications</i>
                        <span class="notification">{{ $notifications->where('sent_for' , Auth::user()->id )->where('status' , 'unread' )->count()}}</span>
                        <p class="d-lg-none d-md-block">
                            Some Actions
                        </p>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                        @foreach ($notifications->where('sent_for' , Auth::user()->id ) as $notification)
                            @if ($notification->status == "unread")
                                <a class="dropdown-item" href="{{ route('backend.notification.index' , $notification->id)  }}" style = "background-color: #BDD7F0">{{ $notification->message }}</a>
                            @else 
                                <a class="dropdown-item" href="{{ route('backend.notification.index' , $notification->id)  }}" style = "background-color: white">{{ $notification->message }}</a>
                            @endif
                            
                        @endforeach
                    
                    </div>
                </li>
            
                <li class="nav-item dropdown">
                    <a class="nav-link" id="nav-link3" href="javascript:;" id="navbarDropdownProfile" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="material-icons">person</i>
                        <p class="d-lg-none d-md-block">
                            Account
                        </p>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownProfile">
                        <a class="dropdown-item" href="{{ route('profile') }}">Profile</a>
                        <a class="dropdown-item" href="{{ route('changepassword') }}">Change Password</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" onclick="logout()" href="#">Log out</a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                    </div>
                </li>

                <li class="nav-item">
{{--                     
                    <div class="theme-btn">
                        <input type="checkbox" id="theme-btn" onclick="themeChange()" class="theme-btn-dark" value="Day/Night">
                        <label for="theme-btn"></label>
                    </div> --}}
                </li>
            </ul>
        </div>
    </div>
</nav>
<!-- End Navbar -->
@push('js')
    <script>
        function logout(){
            event.preventDefault();
            document.getElementById('logout-form').submit();
        }

        
        // day/night mode change
        // function themeChange(){
        //     // var mainPanel = document.getElementById("main-panel");
        //     // var themeBtn = document.getElementById("theme-btn");
        //     // var navBrand = document.getElementById("navbar-brand");
        //     // mainPanel.classList.toggle("main-panel-light");
        //     // themeBtn.classList.toggle("light");
        //     // navBrand.classList.toggle("navbar-brand-light");
            
        //     $(".main-panel").toggleClass("main-panel-light");
        //     $("#nav-link1, #nav-link2, #nav-link3").toggleClass("nav-link-light");
        //     $(".navbar-brand").toggleClass("navbar-brand-light");
        //     $(".theme-btn-dark").toggleClass("light");
        //     $("#card-stats1, #card-stats2, #card-stats3, #card-stats4, #card-stats5, #card-stats6").toggleClass("card-light");
        // }
        // day/night mode change --end--

    </script>

    <script>
        // $(document).ready(function($) {
            
            if (localStorage.getItem('screenModeNightTokenState') == 'day') {
                $( ".theme-btn-dark" ).prop( "checked", true );
                $(".main-panel").addClass("main-panel-light");
            }

            // if(localStorage.getItem('screenModeNightTokenState') == 'night'){
            //     if(".main-panel").hasClass("main-panel-light"){
            //         $(".main-panel").removeClass("main-panel-light");
            //     }
            // }

            $('.theme-btn-dark').click(function(){
                if($(this).prop("checked") == true){
                    localStorage.setItem('screenModeNightTokenState', 'day');
                    $(".main-panel").addClass("main-panel-light");
                }
                else if($(this).prop("checked") == false){
                    localStorage.setItem('screenModeNightTokenState', 'night');
                    $(".main-panel").removeClass("main-panel-light");
                }
            });

        // });
    </script>
@endpush