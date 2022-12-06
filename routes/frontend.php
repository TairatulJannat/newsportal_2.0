<?php

use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('frontend.home');
// });
// Route::get('/', [App\Http\Controllers\Frontend\FrontendController::class, 'index'])->name('frontend.home');
Route::get('/english', [App\Http\Controllers\Frontend\FrontendController::class, 'index'])->name('frontend.home');

Route::post('blog-comment/store', [App\Http\Controllers\BlogCommentController::class, 'store'])->name('blog.comment.store');
Route::get('/covid19', [App\Http\Controllers\Frontend\FrontendController::class, 'covid_form'])->name('covid.form');
Route::get('/covid19_tracker', [App\Http\Controllers\Frontend\FrontendController::class, 'covid_tracker'])->name('covid.tracker');
// Route::post('/coronavirus', [App\Http\Controllers\Frontend\FrontendController::class, 'covidvirus'])->name('covid.virus');




Route::group(['prefix' => 'frontend' , 'namespace' => 'App\Http\Controllers\Frontend'], function() {
    Route::get('/vediogelary/{vedioTitle}', 'FrontendController@videoGallery')->name('frontend.vediogallery');
    Route::get('/top_news', 'FrontendController@top_news')->name('frontend.top_news');
    Route::get('page/{type}', 'FrontendController@editorialPolicy')->name('frontend.page');
    //profile
    
    
    //blog
    Route::group(['prefix' => 'blog' ], function() {
        Route::get('/', 'BlogController@index')->name('frontend.blog.index');
        Route::get('/post/{id}', 'BlogController@getPostByCategory')->name('frontend.blog.postByCategory');
        Route::get('PDF/{id}', 'BlogController@blogPostPdfDownload')->name('blog_postpdf.download');
        Route::get('single-post/{slug_en}', 'BlogController@getPostById')->name('frontend.blog.postById');
        Route::get('post-by-ctegory/{id}', 'BlogController@getPostBycategoryId')->name('frontend.blog.postBycategoryId');
        // Route::post('store', 'BlogController@storeomments')->name('frontend.blog.comment.store');
    });

    //post
    Route::group(['prefix' => 'post' ], function() {
        Route::get('/category_post/{slug}', 'PostController@getCategoryByPost')->name('frontend.post.categorytBypost');
        Route::get('/subcategory_post/{slug}', 'PostController@getSubCategoryByPost')->name('frontend.post.subcategorytBypost');

        Route::get('PDF/{id}', 'PostController@postPdfDownload')->name('postpdf.download');

        Route::get('/single_category_post/{slug_en}', 'PostController@getCategoryPostById')->name('frontend.post.categorypostbyId');
        Route::get('/division-post/{division_slug}', 'PostController@getPostByDivision')->name('frontend.post.postByDivision');
        Route::get('/single_post_by_division/{slug_en}', 'PostController@getSinglePostByDivision')->name('frontend.post.SinglePostByDivision');
        Route::get('/district', 'PostController@getPostBydistrict')->name('frontend.blog.postBydistrict');
        Route::post('/post', 'PostController@getPostByLocation')->name('frontend.post.getPostByLocation');
        Route::get('/post-seo/{tags_en}', 'PostController@getpostbyseo')->name('frontend.post.getpostbyseo');
    });

    //archive
    Route::group(['prefix' => 'archive' ], function() {

        Route::get('all', 'ArchiveController@index')->name('frontend.archive.index');
        Route::get('filter-by', 'ArchiveController@filterNews')->name('frontend.archive.filterNews');
        Route::post('date', 'ArchiveController@getPostByDate')->name('frontend.archive.date');
        // Route::get('delete/{id}', 'PageTableController@destroy')->name('admin.pagetable.delete');
 
    });

    Route::group(['prefix' => 'comment' ], function() {

        Route::get('/', 'CommentController@index')->name('frontend.comment.index');
        Route::post('store', 'CommentController@store')->name('frontend.comment.store');
        
 
    });

    Route::group(['prefix' => 'english_profile' ], function() {

        Route::get('profile', 'FrontendController@profile' )->name('frontend.profile');
        Route::post('user-profile/{id}','FrontendController@user_profile')->name('frontend.user.profile');
        Route::post('changepassword/{id}','FrontendController@changepassword')->name('frontend.user.changepassword');
 
    });
   
  
   
});

