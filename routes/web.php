<?php
use App\Post;
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

Route::get('/', function () {
    $posts = Post::orderBy('created_at','desc')->paginate(5);
    return view('welcome',['posts'=>$posts]);    

});

Route::any('about', function () {
    $posts = Post::orderBy('created_at','desc')->paginate(5);
    return view('posts.about',['posts'=>$posts]);
});

Route::any('/corporate', function () {
    $posts = Post::orderBy('created_at','desc')->paginate(5);
    return view('posts.corporate',['posts'=>$posts]);
});

Route::any('/dlr', function () {
    return view('posts.dlr');
});

Route::resource('posts', 'PostController');
Route::resource('phonebook', 'PhonebookController');
Route::resource('phonegroup', 'PhonegroupController');
Route::resource('sendmessage', 'SentmessageController');
Route::resource('topup', 'TopupController');

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
Route::get('getgroupnos/{id}', 'SentmessageController@getgroupnos');
Route::get('sentmessages', 'SentmessageController@sentmessages');

Route::get('/status/{messageid}', 'SentmessageController@status');

Route::get('/recipients/{messageid}', 'SentmessageController@recipients');

Route::get('/clear-cache', function() {
    $exitCode = Artisan::call('cache:clear');    
});

Route::get('/clear-route', function() {
    $exitCode = Artisan::call('route:clear');    
});

Route::get('/migration', function() {
    $exitCode = Artisan::call('migrate');    
});
