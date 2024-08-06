<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use Illuminate\Support\Facades\Input;

Route::get('/', 'HomeController@index')->name('home');
Route::get('/home', 'HomeController@index');


    /*
    |--------------------------------------------------------------------------
    | Terms and conditions
    |--------------------------------------------------------------------------
    | Explanation about the terms of use, policy, privacy and other
    | user and system conditions.
    */
    Route::group(['prefix' => 'terms', 'as' => 'terms.'], function () {
        Route::get('/term', ['as' => 'terms.term', 'uses' => function(){
            return view("terms.term");
        }]);
        Route::get('/privacy', ['as' => 'terms.privacy', 'uses' => function(){
            return view("terms.privacy");
        }]);
    });

    Auth::routes(['verify' => true]);

    /*
    |--------------------------------------------------------------------------
    | Explore
    |--------------------------------------------------------------------------
    | This feature allows the user to search within their 
    | parameters for people.
    */
    Route::get('/explore', 'ExploreController@index')->name('explore');
    



    /*
    |--------------------------------------------------------------------------
    | Shuffle
    |--------------------------------------------------------------------------
    | This feature allows the user to like or dislike between pairs 
    | of people, the ones that most identify. When you both like each other's 
    | profiles, there is a match and the chat automatically starts between them.
    */
    // Route::post('/shuffle', 'ShuffleController@getUser')->name('shuffle');
    // Route::post('/shuffle/answer', 'ShuffleController@setUser')->name('shuffle');
    // Route::get('/shuffle', 'ShuffleController@index')->name('shuffle');


    /*
    |--------------------------------------------------------------------------
    | Search
    |--------------------------------------------------------------------------
    | This feature allows the user to post meeting invitations and 
    | post events for parties and others.
    */
    Route::group(['prefix' => 'search', 'as' => 'search.'], function () {
        Route::any('/post', ['as' => 'search.posts.index', 'uses' => 'PostController@index']);
        Route::any('/post/invite', ['as' => 'search.posts.invites', 'uses' => 'PostController@invites']);
        Route::any('/post/event', ['as' => 'search.posts.events', 'uses' => 'PostController@events']);
        Route::any('/explore', ['as' => 'search.explore', 'uses' => 'ExploreController@index']);
    });

    /*
    |--------------------------------------------------------------------------
    | Posts
    |--------------------------------------------------------------------------
    | This feature allows the user to post meeting invitations and 
    | post events for parties and others.
    */
    Route::get('/post/invites', 'PostController@invites')->name('posts.invites');
    Route::get('/post/events', 'PostController@events')->name('posts.events');
    Route::get('/post', 'PostController@index')->name('posts');
    Route::post('/post', 'PostController@store')->name('posts.store')->middleware('verified');
    Route::delete('/post/{post}', 'PostController@destroy')->name('posts.destroy')->middleware('verified');
    Route::post('/post/expire/{post}', 'PostController@expire')->name('posts.expire')->middleware('verified');





    /*
    |--------------------------------------------------------------------------
    | Messages
    |--------------------------------------------------------------------------
    | Messages is a communication system between users. Here you will 
    | find all routes and subrouttes.
    */
    // Route::post('/mf', 'MessageController@fetchMessages');
    // Route::post('/ms', 'MessageController@sendMessages');
    Route::group(['prefix' => 'messages', 'as' => 'messages.'], function () {
        Route::post('/create', ['as' => 'create', 'uses' => 'MessageController@create'])->middleware('verified');
        Route::post('/{thread_id}', ['as' => 'index', 'uses' => 'MessageController@index']);
    });


    // /*
    // |--------------------------------------------------------------------------
    // | Conversations - from threads
    // |--------------------------------------------------------------------------
    // | Conversations is the connection between users and 
    // | their private messages
    // */
    Route::group(['prefix' => 'threads', 'as' => 'thread.'], function() {
        Route::post('/', ['as' => 'index', 'uses' => 'ThreadController@index']);
        Route::post('/last', ['as' => 'last', 'uses' => 'ThreadController@getLast']);
        Route::post('/{thread}', ['as' => 'find', 'uses' => 'ThreadController@find']);
        Route::post('/user/{user}', ['as' => 'withUser', 'uses' => 'ThreadController@withUser']);
    });



    // /*
    // |--------------------------------------------------------------------------
    // | Photos - user photos
    // |--------------------------------------------------------------------------
    // | System that allows people to share photos
    // | with others 
    // */
    Route::post('photo', 'PhotoController@store')->name('photo.store')->middleware('verified');
    Route::delete('photo/{photo}', 'PhotoController@destroy')->name('photo.destroy')->middleware('verified');


    /*
    |--------------------------------------------------------------------------
    | User
    |--------------------------------------------------------------------------
    | User show, edit. The creation/registration and login 
    | are part of the securaty sistem, not included where
    */
    Route::group(['prefix' => 'user', 'as' => 'thread.'], function() {
        Route::post('/friends', ['as' => 'getFriends', 'uses' => 'UserController@getFriends']);
        Route::delete('/{user}', ['as' => 'destroy', 'uses' => 'UserController@destroy']);
    });
    Route::put('/profile/update/{user}', 'UserController@update')->name('user.update');
    Route::get('/profile/edit', 'UserController@edit')->name('user.edit');
    Route::get('/profile/{user}/photos', 'UserController@showPhotos');
    Route::get('/profile/{user}', 'UserController@show')->name('user');
    // Route::get('/contact/profile/{user}', 'UserController@contact');




    /*
    |--------------------------------------------------------------------------
    | Report
    |--------------------------------------------------------------------------
    | Reporting users, photos or posts that may be illegal or not owned by the 
    | creator
    */
    Route::group(['prefix' => 'report', 'as' => 'report.'], function() {
        Route::get('/post/{post}', ['as' => 'post.create', 'uses' => 'ReportController@postCreate'])->middleware('verified');
        Route::post('/post/{post}', ['as' => 'post.store', 'uses' => 'ReportController@postStore'])->middleware('verified');
        
        Route::get('/user/{user}', ['as' => 'user.create', 'uses' => 'ReportController@userCreate'])->middleware('verified');
        Route::post('/user/{user}', ['as' => 'user.store', 'uses' => 'ReportController@userStore'])->middleware('verified');
        
        Route::get('/photo/{photo}', ['as' => 'photo.create', 'uses' => 'ReportController@photoCreate'])->middleware('verified');
        Route::post('/photo/{photo}', ['as' => 'photo.store', 'uses' => 'ReportController@photoStore'])->middleware('verified');
    });
