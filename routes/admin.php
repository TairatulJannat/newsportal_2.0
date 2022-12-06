<?php

use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\SettingController;

Route::get('admin/home/', [App\Http\Controllers\HomeController::class, 'index'])->middleware('IsAuthebticateForBackend')->name('admin.home');
Route::get('profile', [App\Http\Controllers\HomeController::class, 'profile'])->name('profile');
Route::get('edit-profile', [App\Http\Controllers\HomeController::class, 'editprofile'])->name('edit.profile');
Route::post('edited-profile', [App\Http\Controllers\HomeController::class, 'editedprofile'])->name('edited.profile');
Route::get('change-password', [App\Http\Controllers\HomeController::class, 'changePassword'])->name('changepassword');
Route::post('change-password', [App\Http\Controllers\HomeController::class, 'changedPassword'])->name('changedPassword');
// Route::get('alexa/bypost','NewsController@commentsByPost')->name('admin.news.comments.list');
// Route::get('/download/zip', [App\Http\Controllers\HomeController::class, 'downloadZip'])->name('project.zip');
//////////post chart amd pie chart
Route::get('admin/home/post-graph', [App\Http\Controllers\HomeController::class, 'postGraph'])->name('post.graph');
Route::get('admin/home/post-pie_chart', [App\Http\Controllers\HomeController::class, 'pie_chart'])->name('post.pie_chart');
Route::get('admin/home/weekly-pie_chart', [App\Http\Controllers\HomeController::class, 'weekly_pie_chart'])->name('weekly.pie_chart');
//visitor chart//
Route::get('admin/home/visitor-graph', [App\Http\Controllers\HomeController::class, 'visitorGraph'])->name('visitor.graph');
//notification
Route::get('notification/{id}', 'App\Http\Controllers\notificationController@index')->name('backend.notification.index');
//blog comment
Route::group(['prefix' => 'blog',  'namespace' => 'App\Http\Controllers'], function() {
    Route::get('blog-list', 'BlogCommentController@list')->name('backend.blog.comment.list');
    Route::get('blog-comment/delete/{id}', 'BlogCommentController@delete')->name('backend.blog_comment.delete');
    Route::get('blog-comment/approved-comment', 'BlogCommentController@update')->name('backend.blog_comment.update');
});
//post comment
Route::group(['prefix' => 'comment' ,'namespace' => 'App\Http\Controllers\Frontend'], function() {
    Route::get('delete/{id}', 'CommentController@destroy')->name('admin.comment.delete');
    Route::get('approved-commment', 'CommentController@approved_comment')->name('admin.comment.approved');
});

Route::group(['prefix' => 'admin' , 'middleware' => 'IsAuthebticateForBackend'], function() {
    // Category
    Route::group(['prefix' => 'category', 'namespace' => 'App\Http\Controllers\Backend\Category'], function() {
        Route::get('/', 'CategoryController@index')->name('admin.category.index');
        Route::post('store', 'CategoryController@store')->name('admin.category.store');
        Route::get('edit/{id}', 'CategoryController@edit')->name('admin.category.edit');
        Route::post('update', 'CategoryController@update')->name('admin.category.update');
        Route::get('delete/{id}', 'CategoryController@destroy')->name('admin.category.delete');
        Route::get('show-header-update/{id}', 'CategoryController@header_update');
        Route::get('status-update/{id}', 'CategoryController@status_update');
        Route::get('main-category-update/{id}', 'CategoryController@main_category_update');
        // Route::get('edit{id}', 'CategoryController@categoryEdit')->name('admin.get.category.edit');
        // Route::post('edit{id}', 'CategoryController@categoryEdited');
    });
    // Subcategory
    Route::group(['prefix' => 'subcategory', 'namespace' => 'App\Http\Controllers\Backend\Category'], function() {

        Route::get('/', 'SubCategoryController@index')->name('admin.subcategory.index');
        Route::post('store', 'SubCategoryController@store')->name('admin.subcategory.store');
        Route::get('edit/{id}', 'SubCategoryController@edit')->name('admin.subcategory.edit');
        Route::post('update', 'SubCategoryController@update')->name('admin.subcategory.update');
        Route::get('delete/{id}', 'SubCategoryController@destroy')->name('admin.subcategory.delete');
        Route::get('show-header-update', 'SubCategoryController@header_update')->name('admin.subcategory.header_update');
        Route::get('status-update/{id}', 'SubCategoryController@status_update');
    });
    //Division
    Route::group(['prefix' => 'division', 'namespace' => 'App\Http\Controllers\Backend\Divisions'], function() {
        Route::get('/', 'DivisionController@index')->name('admin.division.index');
        Route::post('store', 'DivisionController@store')->name('admin.division.store');
        Route::get('edit/{id}', 'DivisionController@edit')->name('admin.division.edit');
        Route::post('update', 'DivisionController@update')->name('admin.division.update');
        Route::get('delete/{id}', 'DivisionController@destroy')->name('admin.division.delete');
    });
    //District
     Route::group(['prefix' => 'district', 'namespace' => 'App\Http\Controllers\Backend\Districts'], function() {
        Route::get('/', 'DistrictController@index')->name('admin.district.index');
        Route::post('store', 'DistrictController@store')->name('admin.district.store');
        Route::get('edit/{id}', 'DistrictController@edit')->name('admin.district.edit');
        Route::post('update', 'DistrictController@update')->name('admin.district.update');
        Route::get('delete/{id}', 'DistrictController@destroy')->name('admin.district.delete');
    });
    //SubDistrict
    Route::group(['prefix' => 'subdistrict', 'namespace' => 'App\Http\Controllers\Backend\SubDistricts'], function() {
        Route::get('/', 'SubDistrictController@index')->name('admin.subdistrict.index');
        Route::post('store', 'SubDistrictController@store')->name('admin.subdistrict.store');
        Route::get('edit/{id}', 'SubDistrictController@edit')->name('admin.subdistrict.edit');
        Route::post('update', 'SubDistrictController@update')->name('admin.subdistrict.update');
        Route::get('delete/{id}', 'SubDistrictController@destroy')->name('admin.subdistrict.delete');
        Route::get('filter/{id}', 'SubDistrictController@districtFilter')->name('admin.district.filter');
    });
    //News
    Route::group(['prefix' => 'news', 'namespace' => 'App\Http\Controllers\Backend'], function() {
        Route::get('/create/{type}', 'NewsController@create')->name('admin.news.create');
        Route::post('ck-editor/imgupload','NewsController@imgupload')->name('ckeditor.upload');
        Route::post('store', 'NewsController@store')->name('admin.news.store');
        Route::post('draft', 'NewsController@draft')->name('news.draft');
        Route::post('draft-update', 'NewsController@updatedraft')->name('news.draft.update');
        Route::get('show', 'NewsController@show')->name('admin.news.show');
        Route::get('/selectnews/filter','NewsController@selectnews')->name('admin.select.news');
        Route::get('update', 'NewsController@updateStage')->name('admin.news.update.stage');
        Route::post('updated', 'NewsController@updatedStage')->name('admin.news.updated.stage');
        Route::get('/pending', 'NewsController@pendingnews')->name('admin.news.pending');
        Route::get('/correction', 'NewsController@correctionnews')->name('admin.news.correction');
        Route::get('/breaking-news', 'NewsController@breakingnews')->name('admin.news.breaking');
        Route::get('/feature-news', 'NewsController@featurenews')->name('admin.news.feature');
        Route::get('/main-news', 'NewsController@mainNews')->name('admin.main.news');
        Route::get('/draft-news', 'NewsController@draftnews')->name('admin.news.draft');
        Route::get('edit/{id}', 'NewsController@edit')->name('admin.news.edit');
        Route::post('update', 'NewsController@update')->name('admin.news.update');
        Route::get('delete/{id}', 'NewsController@destroy')->name('admin.news.delete');
        Route::get('breaking_news/{id}','NewsController@header_update')->name('admin.news.header.update');
        Route::get('feature-news-update/{id}','NewsController@FeatureNewsUpdate')->name('admin.news.featureNews.update');
        Route::get('breaking-news-update/{id}','NewsController@breakingNewsUpdate')->name('admin.news.breakingNews.update');
        Route::get('approve/{id}','NewsController@approve')->name('admin.news.approve');
        Route::get('status-update','NewsController@statusUpdate')->name('admin.news.status.update');
        Route::get('main-news-update/{id}','NewsController@MainNewsUpdate')->name('admin.news.mainNews.update');
        Route::get('commentsByPost/{id}','NewsController@commentsByPost')->name('admin.news.comments.list');
        Route::get('alexa/by-post','NewsController@alexapostrating')->name('alexa.google.post.ranking');
    });
    //SEO
    Route::group(['prefix' => 'seo', 'namespace' => 'App\Http\Controllers\Backend'], function() {

        Route::get('/', 'SeoController@index')->name('admin.seo.index');
        Route::post('store', 'SeoController@store')->name('admin.seo.store');
        Route::post('update/{id}', 'SeoController@update')->name('admin.seo.update');
    });
    //General Settings

      Route::group(['prefix' => 'general-settings', 'namespace' => 'App\Http\Controllers\Backend\Settings'], function() {
        Route::get('/footer', 'fontendSettings\FooterController@index')->name('admin.settings.fontend.footer');//change side bar
        Route::get('/header', 'fontendSettings\HeaderController@index')->name('admin.settings.fontend.header');//change side bar
        Route::get('/backend', 'BackendController@index')->name('admin.settings.backend');
        Route::post('/footer/store', 'fontendSettings\FooterController@store')->name('admin.settings.fontend.footer.store');//change blade
        Route::post('/footer/update/{id}', 'fontendSettings\FooterController@update')->name('admin.settings.fontend.footer.update');
        Route::post('/header/store', 'fontendSettings\HeaderController@store')->name('admin.settings.fontend.header.store');
        Route::post('/header/update/{id}', 'fontendSettings\HeaderController@update')->name('admin.settings.fontend.header.update');
        Route::post('/backend/store', 'BackendController@store')->name('admin.settings.backend.store');
        Route::post('/backend/update/{id}', 'BackendController@update')->name('admin.settings.backend.update');
        Route::post('/live-link', 'fontendSettings\HeaderController@storelivelink')->name('admin.settings.fontend.livelink.store');
        Route::get('/live-link/clear/{id}', 'fontendSettings\HeaderController@clearlivelink')->name('admin.settings.fontend.livelink.clear');

    });

    //blog

      Route::group(['prefix' => 'blog', 'namespace' => 'App\Http\Controllers\Backend\Blog'], function() {
        Route::get('/category', 'BlogCategoryController@index')->name('admin.blog.categoty');
        Route::post('/category/store', 'BlogCategoryController@store')->name('admin.blog.category.store');
        Route::get('/category/edit/{id}', 'BlogCategoryController@edit')->name('admin.blog.category.edit');
        Route::post('/category/update', 'BlogCategoryController@update')->name('admin.blog.category.update');
        Route::get('/category/delete/{id}', 'BlogCategoryController@destroy')->name('admin.blog.category.delete');
        Route::get('/category/status-update/{id}', 'BlogCategoryController@status_update');
        Route::get('postpublish', 'BlogPostController@index')->name('admin.blog.post');
        Route::get('postpending', 'BlogPostController@pendingPost')->name('admin.blog.post.pending');
        Route::get('postcorrection', 'BlogPostController@correctionPost')->name('admin.blog.post.correction');
        Route::get('postinsert', 'BlogPostController@insert')->name('admin.blog.post.insert');
        Route::post('/post/store', 'BlogPostController@store')->name('admin.blog.post.store');
        Route::get('/post/delete/{id}', 'BlogPostController@destroy')->name('admin.blog.post.delete');
        Route::get('/post/edit/{id}', 'BlogPostController@edit')->name('admin.blog.post.edit');
        Route::post('/post/update', 'BlogPostController@update')->name('admin.blog.post.update');
        Route::get('commentsByBlogPost/{id}','BlogPostController@commentsByBlogPost')->name('admin.blog.post.comments.list');
        Route::get('update', 'BlogPostController@updateStage')->name('admin.blog.post.update.stage');
        Route::post('updated', 'BlogPostController@updatedStage')->name('admin.blog.post.updated.stage');
    });
    //Advertisements
    Route::group(['prefix' => 'ads-setting', 'namespace' => 'App\Http\Controllers\Backend'], function() {
        Route::get('setting', 'AdvertisementController@adsSetting')->name('admin.ads.setting');
        // Route::post('edit/{id}', 'AdvertisementController@adsEdit')->name('admin.ads.edit');
        Route::post('store', 'AdvertisementController@adsStore')->name('admin.ads.store');
        Route::get('ads-status', 'AdvertisementController@ads_status')->name('admin.ads.status');
    });

    //user role
    Route::group(['prefix' => 'user-role', 'namespace' => 'App\Http\Controllers\Backend'], function() {
        Route::get('/admin', 'UserRoleController@admin')->name('admin.user.role.admin');
        Route::get('/editor', 'UserRoleController@editor')->name('admin.user.role.editor');
        Route::get('/sub-editor', 'UserRoleController@subEditor')->name('admin.user.role.subeditor');
        Route::get('/reporter', 'UserRoleController@reporter')->name('admin.user.role.reporter');
        Route::get('/role-edit', 'UserRoleController@roleEdit')->name('admin.user.role.edit');
        Route::get('/insert', 'UserRoleController@insertUser')->name('admin.user.insert');
        Route::get('/information', 'UserRoleController@userInformation')->name('admin.user.information');
        Route::get('/information_update/{id}', 'UserRoleController@userInformationUpdate')->name('admin.user.information.update');
        Route::post('/password_updated', 'UserRoleController@userInformationUpdated')->name('admin.user.password.updated');
        Route::post('/store', 'UserRoleController@store')->name('admin.user.store');
    });


    //image gallery
    Route::group(['prefix' => 'imagegallery', 'namespace' => 'App\Http\Controllers\Backend\Gallery'], function() {
        Route::get('/', 'ImageGalleryController@index')->name('admin.image.index');
        Route::post('store', 'ImageGalleryController@store')->name('admin.image.store');
        Route::get('edit/{id}', 'ImageGalleryController@edit')->name('admin.image.edit');
        Route::post('update', 'ImageGalleryController@update')->name('admin.image.update');
        Route::get('image_status/{id}', 'ImageGalleryController@image_status');
        Route::get('delete/{id}', 'ImageGalleryController@destroy')->name('admin.image.delete');
    });

    //videogellary
    Route::group(['prefix' => 'videogallery', 'namespace' => 'App\Http\Controllers\Backend\Gallery'], function() {
        Route::get('/', 'VideoGalleryController@index')->name('admin.video.index');
        Route::post('store', 'VideoGalleryController@store')->name('admin.video.store');
        Route::get('edit/{id}', 'VideoGalleryController@edit')->name('admin.video.edit');
        Route::post('update', 'VideoGalleryController@update')->name('admin.video.update');
        Route::get('delete/{id}', 'VideoGalleryController@destroy')->name('admin.video.delete');
    });

    //social link
    Route::group(['prefix' => 'sociallink', 'namespace' => 'App\Http\Controllers\Backend\Settings'], function() {

        Route::get('/', 'SocialLinkController@index')->name('admin.sociallink.index');
        Route::post('update', 'SocialLinkController@update')->name('admin.sociallink.update');
    });

    //page
    Route::group(['prefix' => 'pagetable', 'namespace' => 'App\Http\Controllers\Backend\PageTable'], function() {
        Route::get('index', 'PageTableController@index')->name('admin.pagetable.index');
        Route::post('store', 'PageTableController@store')->name('admin.pagetable.store');
        Route::get('show_news', 'PageTableController@show')->name('admin.pagetable.show');
        Route::get('edit/{id}', 'PageTableController@edit')->name('admin.pagetable.edit');
        Route::post('update', 'PageTableController@update')->name('admin.pagetable.update');
        Route::get('delete/{id}', 'PageTableController@destroy')->name('admin.pagetable.delete');
    });

    // Route::group(['prefix' => 'wallet', 'namespace' => 'App\Http\Controllers\WalletController'], function() {

    //     Route::post('store', 'WalletController@store')->name('admin.wallet.store');


    // });

    // Wallet

    Route::group(['prefix' => 'wallet', 'namespace' => 'App\Http\Controllers'], function() {
        Route::get('/user-wallet/{type}', 'WalletController@viewUserWallet')->name('user.wallet.view');
        Route::get('user-wallet/bonus/edit/{id}', 'WalletController@bonusGet')->name('user.wallet.bonus.get');
        Route::post('user-wallet/bonus/update', 'WalletController@bonusEdit')->name('user.wallet.bonus.update');
        Route::get('user-wallet/bonus-status/{id}','WalletController@bouns_status')->name('admin.bonus.status');
        Route::get('filter/wallet/date','WalletController@filterByDate')->name('filter.wallet');

    });

// Transition

    Route::group(['prefix' => 'transition', 'namespace' => 'App\Http\Controllers'], function() {

        Route::get('/user-transition','TransitionController@viewUserTransition')->name('user.transion.view');
        Route::get('/user-transition/filter','TransitionController@viewUserTransitionFilter')->name('user.transion.filter');
        Route::get('/own-transition/filter','TransitionController@viewownTransitionFilter')->name('own.transion');
        Route::get('/userid','TransitionController@GetUserId')->name('get.user.by.id');
        Route::get('/transition/edit/,','TransitionController@GetTransitionDetail')->name('transition.status.change');
        Route::post('/transition/edit/,','TransitionController@GetTransitionStatusUpdate')->name('user.transition.status.update');
        Route::get('/withdraw-request','TransitionController@withdrawRequest')->name('user.withdraw.request');
        Route::post('/withdraw-request/store', 'TransitionController@withdrawRequestStore')->name('user.withdraw.request.store');

    });


});
