<!--
=========================================================
Material Dashboard Dark PRO - v1.0.1
=========================================================

Product Page: https://www.creative-tim.com/product/material-dashboard-dark-pro
Copyright 2020 Creative Tim (https://www.creative-tim.com)
Coded by Creative Tim

=========================================================
The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software. -->

<!DOCTYPE html>
<html lang="en">

    @include('backend.layouts.partial.head')

<body class="@guest dark-edition off-canvas-sidebar @else  dark-edition @endguest">
    <div class="wrapper ">
        @guest
        @else
            @include('backend.layouts.partial.sidebar')
            <div class="main-panel" id="main-panel">
                @include('backend.layouts.partial.navbar')
        @endguest
                
                @yield('content')
                
        @guest
        @else
        
            @include('backend.layouts.partial.footer')
        @endguest   
            </div>
    </div>
    @include('backend.layouts.partial.plugin')
    @include('backend.layouts.partial.script')
 
</body>

</html>