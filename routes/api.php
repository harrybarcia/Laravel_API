<?php

use App\Http\Controllers\PostsApiController;
use App\Models\blogPost;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Route::get('/blogposts', function(){
//     return blogPost::all();
// });

Route::get('/blogposts', [PostsApiController::class, 'index']);

Route::post('/blogposts', function(){
    
    request()->validate([
        'title'=>'required',
        'content'=>'required',
    ]);
    return blogPost::create([
        'title'=>request('title'),
        'content'=>request('content')
        
    ]);
});

Route::put('/blogposts/{blogPost}', function(blogPost $blogPost){
            request()->validate([
                'title'=>'required',
                'content'=>'required',
            ]);
            $success=$blogPost->update([
                'title'=>request('title'),
                'content'=>request('content'),
            ]);

            return [
                'success'=>$success

            ];
        });

    
Route::delete('/blogposts/{blogPost}', function (blogPost $blogPost){
    $success= $blogPost->delete();
    return[
        'success'=>$success,
    ];
});


