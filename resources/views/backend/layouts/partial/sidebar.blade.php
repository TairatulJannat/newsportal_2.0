@php
    $settings = DB::table('general_settings_backends')->orderBy('updated_at', 'desc')->first();
    
    $user_image = Storage::url(Auth::user()->image);
@endphp
@inject('request', 'Illuminate\Http\Request')

<div class="sidebar" data-color="purple" data-background-color="default" data-image="">
    <!--
    Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

    Tip 2: you can also add an image using data-image tag
    -->
    <div class="logo">
        <a href="" class="simple-text logo-mini">
            @isset($settings)
                <img src="{{ asset($settings->admin_logo) }}" style=" object-fit:cover; border-radius:97px;" width="20px" height="20px">
            @endisset
        </a>
        <a href="" class="simple-text logo-normal">
            @isset($settings)
                {{$settings->site_name}}
            @endisset
        </a>
    </div>
    <div class="sidebar-wrapper">
        <div class="user">
            <div class="photo">
                
                @if($user_image!=null)

                    <div class="picture">
                        <img src="http://thevoice24.com/public{{ $user_image }}" />
                    </div>

                @else

                    <div class="picture">
                        <img src="{{ asset('public/admin/assets/img/faces/avatar.jpg') }}" />
                    </div>

                @endif
            
            </div>
            <div class="user-info">
                <a data-toggle="collapse" href="#collapseExample" class="username">
                    <span>
                        {{Auth::user()->name_bn}}
                        <b class="caret"></b>
                    </span>
                </a>
                <div class="collapse" id="collapseExample">
                    <ul class="nav">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('profile') }}">
                            <span class="sidebar-mini"> MP </span>
                            <span class="sidebar-normal"> My Profile </span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('edit.profile') }}">
                                <span class="sidebar-mini"> EP </span>
                                <span class="sidebar-normal"> Edit Profile </span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <ul class="nav">
            <li class="nav-item">
                <a class="nav-link" href="{{ route('admin.home') }}">
                    <i class="material-icons">dashboard </i>
                    <p> Dashboard </p>
                </a>
            </li>
            {{-- user Role --}}
            @if (Auth::user()->user_role == 1)
                @if(Auth::user()->type == 'admin'|| Auth::user()->type == 'super_admin')
                    <li class="nav-item ">
                        <a class="nav-link" data-toggle="collapse" href="#userrole">
                            <i class="material-icons">manage_accounts</i>
                            <p> User Role
                                <b class="caret"></b>
                            </p>
                        </a>
                        <div class="collapse sub-nav" id="userrole">
                            <ul class="nav">
                                @if (Auth::user()->type == 'super_admin')
                                    <li class="nav-item ">
                                        <a class="nav-link" href="{{ route('admin.user.role.admin') }}">
                                            <span class="sidebar-mini"> AD </span>
                                            <span class="sidebar-normal"> Admin </span>
                                        </a>
                                    </li> 
                                    <li class="nav-item ">
                                        <a class="nav-link" href="{{ route('admin.user.role.editor') }}">
                                            <span class="sidebar-mini"> E </span>
                                            <span class="sidebar-normal"> Editor </span>
                                        </a>
                                    </li>
                                    <li class="nav-item ">
                                        <a class="nav-link" href="{{ route('admin.user.role.subeditor') }}">
                                            <span class="sidebar-mini"> SE </span>
                                            <span class="sidebar-normal"> Sub Editor </span>
                                        </a>
                                    </li>
                                @elseif(Auth::user()->type == 'admin')
                                    <li class="nav-item ">
                                        <a class="nav-link" href="{{ route('admin.user.role.editor') }}">
                                            <span class="sidebar-mini"> E </span>
                                            <span class="sidebar-normal"> Editor </span>
                                        </a>
                                    </li>
                                    <li class="nav-item ">
                                        <a class="nav-link" href="{{ route('admin.user.role.subeditor') }}">
                                            <span class="sidebar-mini"> SE </span>
                                            <span class="sidebar-normal"> Sub Editor </span>
                                        </a>
                                    </li>
                                    <li class="nav-item ">
                                        <a class="nav-link" href="{{ route('admin.user.role.reporter') }}">
                                            <span class="sidebar-mini"> R </span>
                                            <span class="sidebar-normal"> Reporter </span>
                                        </a>
                                    </li>
                                @elseif(Auth::user()->type == 'editor')
                                    <li class="nav-item ">
                                        <a class="nav-link" href="{{ route('admin.user.role.subeditor') }}">
                                            <span class="sidebar-mini"> SE </span>
                                            <span class="sidebar-normal"> Sub Editor </span>
                                        </a>
                                    </li>
                                    <li class="nav-item ">
                                        <a class="nav-link" href="{{ route('admin.user.role.reporter') }}">
                                            <span class="sidebar-mini"> R </span>
                                            <span class="sidebar-normal"> Reporter </span>
                                        </a>
                                    </li>
                                @elseif(Auth::user()->type == 'sub_editor')
                                    <li class="nav-item ">
                                        <a class="nav-link" href="{{ route('admin.user.role.reporter') }}">
                                            <span class="sidebar-mini"> R </span>
                                            <span class="sidebar-normal"> Reporter </span>
                                        </a>
                                    </li>
                                @endif
                            </ul>
                        </div>
                    </li>
                @endif 
            @endif
            <!-- user information -->
            @if (Auth::user()->user_role == 1)
                @if(Auth::user()->type == 'admin'|| Auth::user()->type == 'super_admin')
                    <li class="nav-item ">
                        <a class="nav-link" href="{{route('admin.user.information')}}">
                            <i class="material-icons">information</i>
                            <p> User Information
                                <!-- <b class="caret"></b> -->
                            </p>
                        </a>
                    </li>
                @endif 
            @endif



            {{-- category --}}

            @if (Auth::user()->category_role == 1)
                <li class="nav-item {{ in_array($request->segment(2), ['category', 'subcategory']) ? 'active' : '' }}">
                    <a class="nav-link" data-toggle="collapse" href="#Categories">
                        <i class="material-icons">category</i>
                        <p> Categories
                            <b class="caret"></b>
                        </p>
                    </a>
                    <div class="collapse sub-nav {{ in_array($request->segment(2), ['category', 'subcategory']) ? 'show' : '' }}" id="Categories">
                        <ul class="nav">
                            <li class="nav-item {{ $request->segment(2) == 'category' ? 'active' : '' }}">
                                <a class="nav-link" href="{{ route('admin.category.index') }}">
                                    <span class="sidebar-mini"> C </span>
                                    <span class="sidebar-normal"> Category </span>
                                </a>
                            </li>
                            <li class="nav-item  {{ $request->segment(2) == 'subcategory' ? 'active' : '' }}">
                                <a class="nav-link" href="{{ route('admin.subcategory.index') }}">
                                    <span class="sidebar-mini"> S </span>
                                    <span class="sidebar-normal"> Subcategory </span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
            @endif
       
            {{-- news --}}

            @if (Auth::user()->post_role == 1)
                    <li class="nav-item {{ in_array($request->segment(3), ['create', 'show','pending','correction', 'feature' , 'breaking' , 'draft' , 'main' , 'Bangla', 'English', 'Both']) ? 'active' : '' }}">
                        <a class="nav-link" data-toggle="collapse" href="#News">
                            <i class="material-icons">article</i>
                            <p> News
                                <b class="caret"></b>
                            </p>
                        </a>

                        <div class="collapse sub-nav" id="News">
                            <ul class="nav">

                                <li class="nav-item {{ in_array($request->segment(3), ['Bangla', 'English', 'Both']) ? 'active' : '' }}">
                                    <a class="nav-link" data-toggle="collapse" href="#create">
                                        <span class="sidebar-mini"> C </span>
                                        <span class="sidebar-normal">Create News
                                            <b class="caret"></b>
                                        </span>
                                    </a>
                                    <div class="collapse sub-sub-nav" id="create">
                                        <ul class="nav">
                                            <li class="nav-item {{ $request->segment(3) == 'Bangla' ? 'active' : '' }}">
                                            <a class="nav-link" href="{{ route ('admin.news.create' , 'bangla' ) }}">
                                                <span class="sidebar-mini"> CBN </span>
                                                <span class="sidebar-normal"> Create Bangla News </span>
                                            </a>
                                            </li>
                                            <li class="nav-item {{ $request->segment(3) == 'English' ? 'active' : '' }}" >
                                            <a class="nav-link" href="{{ route ('admin.news.create' , 'english') }}">
                                                <span class="sidebar-mini"> CEN </span>
                                                <span class="sidebar-normal">  Create English News </span>
                                            </a>
                                            </li>
                                            <li class="nav-item {{ $request->segment(3) == 'Both' ? 'active' : '' }}">
                                                <a class="nav-link" href="{{ route ('admin.news.create' , 'both') }}">
                                                    <span class="sidebar-mini"> CN </span>
                                                    <span class="sidebar-normal">  Create Both News </span>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </li>

                                <li class="nav-item {{ $request->segment(3) == 'pending' ? 'active' : '' }}">
                                    <a class="nav-link" href="{{ route('admin.news.pending') }}">
                                        <span class="sidebar-mini"> C </span>
                                        <span class="sidebar-normal"> Pending News</span>
                                    </a>
                                </li>
                                <li class="nav-item  {{ $request->segment(3) == 'correction' ? 'active' : '' }}">
                                    <a class="nav-link" href="{{ route('admin.news.correction') }}">
                                        <span class="sidebar-mini"> CL </span>
                                        <span class="sidebar-normal"> Correction News List </span>
                                    </a>
                                </li>
                                <li class="nav-item  {{ $request->segment(3) == 'show' ? 'active' : '' }}">
                                    <a class="nav-link" href="{{ route('admin.news.show') }}">
                                        <span class="sidebar-mini"> PL </span>
                                        <span class="sidebar-normal"> Publish News List </span>
                                    </a>
                                </li>
                                @if(Auth::user()->type == 'admin' || Auth::user()->type == 'super_admin' || Auth::user()->type == 'editor' )
                                    <li class="nav-item {{ $request->segment(3) == 'breaking' ? 'active' : '' }}">
                                        <a class="nav-link" href="{{ route('admin.news.breaking') }}">
                                            <span class="sidebar-mini"> BN </span>
                                            <span class="sidebar-normal"> Breaking News</span>
                                        </a>
                                    </li>
                                    <li class="nav-item {{ $request->segment(3) == 'feature' ? 'active' : '' }}">
                                        <a class="nav-link" href="{{ route('admin.news.feature') }}">
                                            <span class="sidebar-mini"> FN </span>
                                            <span class="sidebar-normal"> Feature News</span>
                                        </a>
                                    </li>
                                    <li class="nav-item {{ $request->segment(3) == 'main' ? 'active' : '' }}">
                                        <a class="nav-link" href="{{ route('admin.main.news') }}">
                                            <span class="sidebar-mini"> MN </span>
                                            <span class="sidebar-normal"> Main News</span>
                                        </a>
                                    </li>
                                @endif
                                <li class="nav-item {{ $request->segment(3) == 'draft' ? 'active' : '' }}">
                                    <a class="nav-link" href="{{ route('admin.news.draft') }}">
                                        <span class="sidebar-mini"> DN </span>
                                        <span class="sidebar-normal"> Draft News</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
            @endif
        

            {{-- add --}}

            @if ( Auth::user()->ads_role == 1 )
                @if(Auth::user()->type == 'admin'|| Auth::user()->type == 'super_admin')
                    <li class="nav-item {{ in_array($request->segment(3), ['setting', 'setting','setting']) ? 'active' : '' }}">
                        <a class="nav-link" data-toggle="collapse" href="#advertisement">
                            <i class="material-icons">table</i>
                            <p> Advertisenment
                                <b class="caret"></b>
                            </p>
                        </a>
                        <div class="collapse sub-nav {{ in_array($request->segment(3), ['setting', 'setting', 'setting']) ? 'show' : '' }}" id="advertisement">
                            <ul class="nav">
                                <li class="nav-item {{ $request->segment(3) == 'setting' ? 'active' : '' }}">
                                    <a class="nav-link" href="{{ route('admin.ads.setting') }}">
                                        <span class="sidebar-mini"> AL </span>
                                        <span class="sidebar-normal"> Adds Log</span>
                                    </a>
                                </li>
                                <li class="nav-item  {{ $request->segment(3) == 'setting' ? 'active' : '' }}">
                                    <a class="nav-link" href="{{ route('admin.ads.setting') }}">
                                        <span class="sidebar-mini"> APL </span>
                                        <span class="sidebar-normal"> Add Payment List</span>
                                    </a>
                                </li>
                                <li class="nav-item  {{ $request->segment(3) == 'setting' ? 'active' : '' }}">
                                    <a class="nav-link" href="{{ route('admin.ads.setting') }}">
                                        <span class="sidebar-mini"> AS </span>
                                        <span class="sidebar-normal"> Add Settings</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                @endif
            @endif
        
        
            {{-- pagetable --}}

            @if (Auth::user()->page_role == 1)
                <li class="nav-item {{ in_array($request->segment(3), ['index', 'show_news']) ? 'active' : '' }}">
                    <a class="nav-link" data-toggle="collapse" href="#pagetable">
                        <i class="material-icons">table</i>
                        <p> PageTable
                            <b class="caret"></b>
                        </p>
                    </a>
                    <div class="collapse sub-nav {{ in_array($request->segment(3), ['index', 'show_news']) ? 'show' : '' }}" id="pagetable">
                        <ul class="nav">
                            <li class="nav-item {{ $request->segment(3) == 'index' ? 'active' : '' }}">
                                <a class="nav-link" href="{{ route('admin.pagetable.index') }}">
                                    <span class="sidebar-mini"> C </span>
                                    <span class="sidebar-normal"> Create Pagetable</span>
                                </a>
                            </li>
                            <li class="nav-item  {{ $request->segment(3) == 'show_news' ? 'active' : '' }}">
                                <a class="nav-link" href="{{ route('admin.pagetable.show') }}">
                                    <span class="sidebar-mini"> PL </span>
                                    <span class="sidebar-normal"> Pagetable List </span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
            @endif
            
            {{-- country --}}

            @if (Auth::user()->country_role == 1)
            <li class="nav-item {{ in_array($request->segment(2), ['division', 'district', 'subdistrict']) ? 'active' : '' }}">
                    <a class="nav-link" data-toggle="collapse" href="#Country">
                        <i class="material-icons">add_location_alt</i>
                        <p> Country
                            <b class="caret"></b>
                        </p>
                    </a>
                    <div class="collapse sub-nav {{ in_array($request->segment(2), ['division', 'district', 'subdistrict']) ? 'show' : '' }}" id="Country">
                        <ul class="nav">
                            <li class="nav-item {{ $request->segment(2) == 'division' ? 'active' : '' }}">
                                <a class="nav-link" href="{{ route('admin.division.index') }}">
                                    <span class="sidebar-mini"> DV </span>
                                    <span class="sidebar-normal"> Division </span>
                                </a>
                            </li>
                            <li class="nav-item {{ $request->segment(2) == 'district' ? 'active' : '' }}">
                                <a class="nav-link" href="{{ route('admin.district.index') }}">
                                    <span class="sidebar-mini"> DS </span>
                                    <span class="sidebar-normal"> District </span>
                                </a>
                            </li>
                            <li class="nav-item {{ $request->segment(2) == 'subdistrict' ? 'active' : '' }}">
                                <a class="nav-link" href="{{ route('admin.subdistrict.index') }}">
                                    <span class="sidebar-mini"> SD </span>
                                    <span class="sidebar-normal"> SubDistrict </span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
            @endif
        
            {{-- gallery --}}

            @if (Auth::user()->gallery_role == 1)
            <li class="nav-item {{ in_array($request->segment(2), ['imagegallery', 'videogallery']) ? 'active' : '' }}">
                    <a class="nav-link" data-toggle="collapse" href="#gallery">
                        <i class="material-icons">collections</i>
                        <p> Gallery
                            <b class="caret"></b>
                        </p>
                    </a>
                    <div class="collapse sub-nav {{ in_array($request->segment(2), ['imagegallery', 'videogallery']) ? 'show' : '' }}" id="gallery">
                        <ul class="nav">
                            <li class="nav-item {{ $request->segment(2) == 'imagegallery' ? 'active' : '' }}">
                                <a class="nav-link" href="{{ route('admin.image.index') }}">
                                    <span class="sidebar-mini"> IG </span>
                                    <span class="sidebar-normal"> Image Gallery</span>
                                </a>
                            </li>
                            <li class="nav-item {{ $request->segment(2) == 'videogallery' ? 'active' : '' }}">
                                <a class="nav-link" href="{{ route('admin.video.index') }}">
                                    <span class="sidebar-mini"> VG </span>
                                    <span class="sidebar-normal"> Video Gallery </span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
            @endif

            {{-- blog --}}

            @if (Auth::user()->blog_role == 1)
                <li class="nav-item {{ in_array($request->segment(3), ['postpublish', 'postpending', 'postcorrection', 'postinsert']) ? 'active' : '' }}">
                    <a class="nav-link" data-toggle="collapse" href="#componentsblogpost">
                        <i class="material-icons">summarize</i>
                        <p> Blog
                            <b class="caret"></b>
                        </p>
                    </a>
                    <div class="collapse sub-nav {{ in_array($request->segment(2), ['postpublish', 'postpending', 'postcorrection' ,'postinsert']) ? 'show' : '' }}" id="componentsblogpost">
                        <ul class="nav">
                            @if (Auth::user()->type == 'admin' || Auth::user()->type == 'editor' || Auth::user()->type == 'sub_editor' || Auth::user()->type == 'super_admin' )
                                <li class="nav-item ">
                                    <a class="nav-link" href="{{ route ('admin.blog.categoty') }}" >
                                        <span class="sidebar-mini"> BG </span>
                                        <span class="sidebar-normal"> Blog Category
                                        </span>
                                    </a>
                                </li>
                            @endif
                            
                            
                            <li class="nav-item ">
                                <div class="collapse" id="componentsblogpost">
                                    <ul class="nav">
                                        <li class="nav-item {{ $request->segment(3) == 'postpublish' ? 'active' : '' }}">
                                            <a  class="nav-link" href="{{ route('admin.blog.post') }}" >
                                                <span class="sidebar-mini"> BP </span>
                                                <span class="sidebar-normal"> Blog Published Post </span>
                                            </a>
                                        </li>
                                        <li class="nav-item {{ $request->segment(3) == 'postpending' ? 'active' : '' }}">
                                            <a  class="nav-link" href="{{ route('admin.blog.post.pending') }}">
                                                <span class="sidebar-mini"> BP </span>
                                                <span class="sidebar-normal"> Blog Pending Post </span>
                                            </a>
                                        </li>
                                        <li class="nav-item {{ $request->segment(3) == 'postcorrection' ? 'active' : '' }}">
                                            <a  class="nav-link" href="{{ route('admin.blog.post.correction') }}">
                                                <span class="sidebar-mini"> BC </span>
                                                <span class="sidebar-normal"> Blog correction Post </span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                                
                                
                            </li>
                            @if (Auth::user()->type == 'reporter' || Auth::user()->type == 'admin' || Auth::user()->type == 'editor' || Auth::user()->type == 'sub_editor')
                                <li class="nav-item {{ $request->segment(3) == 'postinsert' ? 'active' : '' }}">
                                    <a class="nav-link" href="{{ route ('admin.blog.post.insert') }}">
                                        <span class="sidebar-mini"> IBP </span>
                                        <span class="sidebar-normal">Insert Blog Post </span>
                                    </a>
                                </li>
                            @endif
                        </ul>
                    </div>
                </li>
            @endif

            {{-- settings --}}

            @if (Auth::user()->settings_role == 1)
                <li class="nav-item ">
                    <a class="nav-link" data-toggle="collapse" href="#componentsSettings">
                        <i class="material-icons">settings</i>
                        <p> settings
                            <b class="caret"></b>
                        </p>
                    </a>
                    <div class="collapse sub-nav" id="componentsSettings">
                        <ul class="nav">
                            <li class="nav-item ">
                                <a class="nav-link" data-toggle="collapse" href="#componentsfonrend">
                                    <span class="sidebar-mini"> F </span>
                                    <span class="sidebar-normal">Fontend
                                        <b class="caret"></b>
                                    </span>
                                </a>
                                <div class="collapse sub-sub-nav" id="componentsfonrend">
                                <ul class="nav">
                                    <li class="nav-item ">
                                    <a class="nav-link" href="{{ route ('admin.settings.fontend.header') }}">
                                        <span class="sidebar-mini"> H </span>
                                        <span class="sidebar-normal"> Header </span>
                                    </a>
                                    </li>
                                    <li class="nav-item ">
                                    <a class="nav-link" href="{{ route ('admin.settings.fontend.footer') }}">
                                        <span class="sidebar-mini"> F </span>
                                        <span class="sidebar-normal"> Footer </span>
                                    </a>
                                    </li>
                                </ul>
                                </div>
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link" href="{{ route ('admin.settings.backend') }}">
                                    <span class="sidebar-mini"> B </span>
                                    <span class="sidebar-normal"> Backend </span>
                                </a>
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link" href="{{ route ('admin.sociallink.index') }}">
                                    <span class="sidebar-mini"> SL </span>
                                    <span class="sidebar-normal"> Social Link </span>
                                </a>
                            </li>
                            
                        </ul>
                    </div>
                </li>
            @endif
       
            {{-- comment list --}}
             
            @if (Auth::user()->blog_comments_role == 1 || Auth::user()->comments_role == 1)
            <li class="nav-item {{ in_array($request->segment(2), ['comment', 'blog-list']) ? 'active' : '' }}">
                    <a class="nav-link" data-toggle="collapse" href="#comment">
                        <i class="material-icons">short_text</i>
                        <p> Comment
                            <b class="caret"></b>
                        </p>
                    </a>
                    <div class="collapse sub-nav {{ in_array($request->segment(2), ['comment', 'blog-list']) ? 'show' : '' }}" id="comment">
                        <ul class="nav">
                            <li class="nav-item {{ $request->segment(2) == 'comment' ? 'active' : '' }}">
                                <a class="nav-link" href="{{ route('frontend.comment.index') }}">
                                    <span class="sidebar-mini"> PC</span>
                                    <span class="sidebar-normal"> Post Comment List </span>
                                </a>
                            </li>
                            <li class="nav-item {{ $request->segment(2) == 'blog-list' ? 'active' : '' }}">
                                <a class="nav-link" href="{{ route('backend.blog.comment.list') }}">
                                    <span class="sidebar-mini"> BC </span>
                                    <span class="sidebar-normal"> Blog Comment List </span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
            @endif

            {{-- @if (Auth::user()->blog_comments_role == 1 || Auth::user()->comments_role == 1)
                <li class="nav-item">
                    <a class="nav-link" data-toggle="collapse" href="#Comment">
                        <i class="material-icons">comment</i>
                        <p> Comment
                            <b class="caret"></b>
                        </p>
                    </a>
                    <div class="collapse {{ in_array($request->segment(3), ['post_comment', 'blog_comments']) ? 'show' : '' }}" id="Comment">
                        <ul class="nav">
                            @if ( Auth::user()->comments_role == 1)
                                <li class="nav-item {{ $request->segment(3) == 'post_comment' ? 'active' : '' }}">
                                    <a class="nav-link" href="{{ route('frontend.comment.index') }}">
                                        <span class="sidebar-mini"> CL  </span>
                                        <span class="sidebar-normal"> Comment List </span>
                                    </a>
                                </li>
                            @endif
                            
                            @if (Auth::user()->blog_comments_role == 1 )
                                <li class="nav-item {{ $request->segment(3) == 'blog_comments' ? 'active' : '' }}">
                                    <a class="nav-link" href="{{ route('backend.blog.comment.list') }}">
                                        <span class="sidebar-mini"> CL  </span>
                                        <span class="sidebar-normal">Blog Comment List </span>
                                    </a>
                                </li>
                            @endif
                        </ul>
                    </div>
                </li>
            @endif --}}

            {{-- SEO --}}

            @if (Auth::user()->seo_role == 1)
                <li class="nav-item {{ in_array($request->segment(2), ['seo']) ? 'active' : '' }}">
                    <a class="nav-link "id="pagesSeo"  href="{{ route('admin.seo.index') }}">
                    <i class="material-icons">image</i>
                        <p>SEO</p>
                    </a> 
                </li> 
            @endif
            {{-- Account --}}
            {{-- @if (Auth::user()->seo_role == 1) --}}
                <li class="nav-item">
                    <a class="nav-link" data-toggle="collapse" href="#wallet">
                        <i class="material-icons">collections</i>
                        <p> Wallet
                            <b class="caret"></b>
                        </p>
                    </a>    
                    {{-- <li class="nav-item">
                            <a class="nav-link "id="pagesSeo"  href="{{ route('admin.acc') }}">
                            <i class="material-icons">image</i>
                                <p>wallet</p>
                            </a> --}}
                    
                    <div class="collapse sub-nav" id="wallet">
                        <ul class="nav">
                            @if (Auth::user()->type == 'admin'|| Auth::user()->type == 'super_admin')
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('user.wallet.view','reporter') }}">
                                        <span class="sidebar-mini"> UW </span>
                                        <span class="sidebar-normal"> User Wallet</span>
                                    </a>
                                </li>  
                            @else
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('user.wallet.view','reporter') }}">
                                        <span class="sidebar-mini"> MW </span>
                                        <span class="sidebar-normal"> My Wallet</span>
                                    </a>
                                </li>
                                
                            @endif
                           
                            
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('user.transion.view') }}">
                                    <span class="sidebar-mini"> T </span>
                                    <span class="sidebar-normal"> Transition </span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                
                
            {{-- @endif --}}
            {{-- reportars --}}

            {{-- @if (Auth::user()->seo_role == 1)
                <li class="nav-item" {{ in_array($request->segment(2), ['reporter']) ? 'active' : '' }}>
                    <a class="nav-link" data-toggle="collapse" href="#users">
                        <i class="material-icons">category</i>
                        <p> Reporters
                            <b class="caret"></b>
                        </p>
                    </a>
                    <div class="collapse {{ in_array($request->segment(2), ['reporter']) ? 'show' : '' }}" id="users">
                        <ul class="nav">
                            <li class="nav-item {{ $request->segment(2) == 'reporter' ? 'active' : '' }}">
                                <a class="nav-link" href="{{ route('admin.reporter.index') }}">
                                    <span class="sidebar-mini"> R </span>
                                    <span class="sidebar-normal"> Reporters</span>
                                </a>
                            </li>

                        </ul>
                    </div>
                </li> 
            @endif --}}
           
            {{-- @if (Auth::user()->type == 'super_admin')
                <li class="nav-item ">
                    <a class="nav-link "id="pagesSeo"  href="{{ route('project.zip') }}">
                        <i class="material-icons">folder_zip</i>
                        <p>Download Zip project</p>
                    </a> 
                </li>
            @endif --}}

        </ul>
    </div>
  </div>