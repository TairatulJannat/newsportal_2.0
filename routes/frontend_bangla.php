<?php

use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('frontend.home');
// });
// Route::get('/bangla', [App\Http\Controllers\FrontendBangla\frontendBanglaController::class, 'index'])->name('frontend.home.bangla');
Route::get('/', [App\Http\Controllers\FrontendBangla\frontendBanglaController::class, 'index'])->name('frontend.home.bangla');

// Route::group(['prefix' => 'bangla' , 'namespace' => 'App\Http\Controllers\FrontendBangla'], function() {

//     //blog
   

// });





// Route::post('blog-comment/store', [App\Http\Controllers\BlogCommentController::class, 'store'])->name('blog.comment.store');
// Route::get('/covid19', [App\Http\Controllers\Frontend\FrontendController::class, 'covid_form'])->name('covid.form');
// Route::get('/covid19_tracker', [App\Http\Controllers\Frontend\FrontendController::class, 'covid_tracker'])->name('covid.tracker');
// Route::post('/coronavirus', [App\Http\Controllers\Frontend\FrontendController::class, 'covidvirus'])->name('covid.virus');




Route::group(['prefix' => 'bangla' , 'namespace' => 'App\Http\Controllers\FrontendBangla'], function() {
    Route::get('bangla_video/vediogellary/{vedioTitle}', 'frontendBanglaController@videoGallery')->name('FrontendBangla.vediogallery');
    // Route::get('/top_news', 'FrontendController@top_news')->name('frontend.top_news');
    Route::get('bangla_page/{type}', 'frontendBanglaController@editorialPolicy')->name('FrontendBangla.page');
    
    //covid
    Route::get('/covid19', 'frontendBanglaController@covid_form')->name('bangla.covid.form');
    Route::get('/covid19_tracker', 'frontendBanglaController@covid_tracker')->name('bangla.covid.tracker');
    
    //profile
    
    //blog
    Route::group(['prefix' => 'blog-bangla'], function(){
        
        Route::get('/index', 'banglaBlogController@index')->name('FrontendBangla.blog.index');
        Route::get('index/post/{id}', 'banglaBlogController@getPostByCategory')->name('FrontendBangla.blog.postByCategory');
        Route::get('PDF/{id}', 'banglaBlogController@blogPostPdfDownload')->name('FrontendBangla.blog_postpdf.download');
        Route::get('index/single-post/{slug_en}', 'banglaBlogController@getPostById')->name('FrontendBangla.blog.postById');
        Route::get('index/post-by-ctegory/{id}', 'banglaBlogController@getPostBycategoryId')->name('FrontendBangla.blog.postBycategoryId');
        //// Route::post('store', 'BlogController@storeomments')->name('frontend.blog.comment.store');    
    });

    //post
    Route::group(['prefix' => 'post' ], function() {
        // Route::get('/category_post/{slug}', 'PostController@getCategoryByPost')->name('frontend.post.categorytBypost');
        // Route::get('/subcategory_post/{slug}', 'PostController@getSubCategoryByPost')->name('frontend.post.subcategorytBypost');

        Route::get('PDF/{id}', 'PostBanglaController@postPdfDownload')->name('bangla_postpdf.download');
        
    
       
        Route::get('bangla_category_post/category_post/{slug_bn}', 'PostBanglaController@getCategoryByPost')->name('FrontendBangla.post.categorytBypost');
        Route::get('bangla_subcategory_post/subcategory_post/{slug}', 'PostBanglaController@getSubCategoryByPost')->name('FrontendBangla.post.subcategorytBypost');
        Route::get('bangla_single_category_post/single_category_post/{slug_bn}', 'PostBanglaController@getCategoryPostById')->name('FrontendBangla.post.categorypostbyId');
        Route::get('bangla_division_post/division-post/{division_slug}', 'PostBanglaController@getPostByDivision')->name('FrontendBangla.post.postByDivision');
        Route::get('bangla_division/single_post_by_division/{slug_bn}', 'PostBanglaController@getSinglePostByDivision')->name('FrontendBangla.post.SinglePostByDivision');
        Route::get('bangla_district/district', 'PostBanglaController@getPostBydistrict')->name('FrontendBangla.blog.postBydistrict');
        Route::post('bangla_postlocation/postlocation', 'PostBanglaController@getPostByLocation')->name('FrontendBangla.post.getPostByLocation');
        Route::get('bangla_post_seo/post-seo/{tags_bn}', 'PostBanglaController@getpostbyseo')->name('FrontendBangla.post.getpostbyseo');
    });

    //archive
    Route::group(['prefix' => 'archive' ], function() {

        Route::get('bangla_archive_all', 'ArchiveBanglaController@index')->name('FrontendBangla.archive.index');
        Route::get('bangla_archive_filter-by', 'ArchiveBanglaController@filterNews')->name('FrontendBangla.archive.filterNews');
        Route::post('bangla_archive_date', 'ArchiveBanglaController@getPostByDate')->name('FrontendBangla.archive.date');
        // Route::get('delete/{id}', 'PageTableController@destroy')->name('admin.pagetable.delete');
 
    });

    // Route::group(['prefix' => 'comment' ], function() {

    //     Route::get('/', 'CommentController@index')->name('frontend.comment.index');
    //     Route::post('store', 'CommentController@store')->name('frontend.comment.store');
        
 
    // });

    Route::group(['prefix' => 'profile' ], function() {

        Route::get('bangla-profile', 'frontendBanglaController@profile' )->name('FrontendBangla.profile');
        Route::post('bangla-user-profile/{id}','frontendBanglaController@user_profile')->name('FrontendBangla.user.profile');
        Route::post('bangla-changepassword/{id}','frontendBanglaController@changepassword')->name('FrontendBangla.user.changepassword');
 
    });
   
  
   
});

    
   
  
   

