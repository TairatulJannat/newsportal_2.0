<div class="mobilenav">
    <div id="Sidenav" class="sidenav">
        <a href="javascript:void(0)" class="closebtn" style="font-size: 36px;" onclick="closeNav()">&times;</a>

        
        <div class="language"><a href="{{ route('frontend.home.bangla') }}">বাংলা</a></div>
        <a class="topbar-menu-item parent-btn" href="{{ route( 'frontend.home' )}}"><i class="fas fa-home"></i> Home</a>
        
        {{-- @if ($user !== null)
            <a class="topbar-menu-item parent-btn" href="{{ route('frontend.profile') }}"><i class="fas fa-address-card"></i> Profile</a>
        @endif --}}

        @if ($user !== null)
            <div class="parent-btn">
                <a href="{{ route('logout.general.user') }}" ><span class="login-icon"><i class="fas fa-sign-out-alt"></i> Logout</span></a>
            </div>
        @endif
        
        

        {{-- @if ($user == null)
            <a href="" data-bs-toggle="modal" data-bs-target="#login_modal" class="parent-btn"><span class="login-icon"><i class="fa fa-user fauser" aria-hidden="true"></i> Login</span></a>
        @else
            <div class="parent-btn">
                <a href="{{ route('logout.general.user') }}" ><span class="login-icon"><i class="fas fa-sign-out-alt"></i> Logout</span></a>
            </div>
        @endif --}}

        @foreach ($categories as $category)
            <a href="{{ route('frontend.post.categorytBypost', $category->category_slug_en ) }}" class="parent-btn dropdown-btn">
                {{ $category->category_name_en }} 
                @if($category->subcategory->count() <= 0) 
                @else <span ><i class="fa fa-caret-down"></i></span> 
                @endif
            </a>

            <div class="dropdown-container">
                @foreach ($category->subcategory as $subcategory )
                    <a href="{{ route('frontend.post.subcategorytBypost', $subcategory->subcategory_slug_en ) }}">{{ $subcategory->subcategory_name_en  }}</a>
                @endforeach
            </div>
        @endforeach

        <a href="{{ route('covid.form') }}" class="parent-btn mainmenu-link" >COVID-19</a>
        <a href="{{ route('frontend.blog.index') }}" class="parent-btn mainmenu-link" >Blog</a>
        <a href="{{ route('frontend.archive.index') }}" class="parent-btn mainmenu-link" >Archive</a>
    </div>

    {{-- <span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776;</span> --}}
</div>

<style>
    

</style>

      
@push('js')

    {{-- <script src="https://kit.fontawesome.com/9c37986c06.js" crossorigin="anonymous"></script> --}}
    <script>
        function openNav() {
        document.getElementById("Sidenav").style.width = "100%";
        }

        function closeNav() {
        document.getElementById("Sidenav").style.width = "0";
        }

        // var dropdown = document.getElementsByClassName("dropdown-btn");
        // var i;

        // for (i = 0; i < dropdown.length; i++) {
        // dropdown[i].addEventListener("click", function () {
        //     this.classList.toggle("active");
        //     var dropdownContent = this.nextElementSibling;
        //     if (dropdownContent.style.display === "block") {
        //     dropdownContent.style.display = "none";
        //     } else {
        //     dropdownContent.style.display = "block";
        //     }
        // });
        // }

    </script>


{{-- <script>

    function side_open(id)
    {
        document.getElementById("sidebar-accrodion" + id).style.height = "10rem";
    }


    function side_close(id)
    {
        document.getElementById("sidebar-accrodion" + id).style.height = "0";
    }


</script> --}}

@endpush