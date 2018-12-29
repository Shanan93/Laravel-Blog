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

Route::get('/test',function(){
    return App\User::find(1)->profile;
});

Route::get('/',[
    'uses' => 'FrontEndController@index',
    'as' => 'index'
]);

Route::get('/results',function(Request $request){
    $posts = \App\Post::where('tile','LIKE','%'.request('query').'%')->get();

    return view('results')-with('posts',$posts)
                          ->with('title','Search results :'.request('query'))
                          ->with('settings' , \App\Settings::first())
                          ->with('catgories', \App\Category::take(5)->get())
                          ->with('query',request('query'));
});                        

Route::get('/post/{slug}',[
    'uses' => 'FrontEndController@singlePost',
    'as' => 'post.single'
]);

Route::get('/category/{id}',[
    'uses' => 'FrontEndController@category',
    'as' => 'category.single'
]);

Route::get('/tag/{id}',[
    'uses' => 'FrontEndController@tag',
    'as' => 'tag.single'
]);

Auth::routes();




Route::group(['prefix'=> 'admin' , 'middleware'=>'auth'],function(){

    Route::get('/home', [
        'uses' => 'HomeController@index',
        'as' => 'home'
    ]);

    Route::get('/category/create',[
        'uses' => 'categoriesController@create',
        'as' => 'category.create'
    ]);

    Route::get('/categories',[
        'uses' => 'categoriesController@index',
        'as' => 'categories'
    ]);

    Route::get('category/edit/{id}',[

        'uses' => 'CategoriesController@edit',
        'as' => 'category.edit'
    ]);

    Route::get('category/delete/{id}',[

        'uses' => 'CategoriesController@destroy',
        'as' => 'category.delete'
    ]);

    Route::post('/category/store',[
        'uses' => 'categoriesController@store',
        'as' => 'category.store'
    ]);

    Route::post('/category/update/{id}',[

        'uses' => 'categoriesController@update',
        'as' => 'category.update'


    ]);

    Route::get('/post/create',[

        'uses'=>'PostController@create',
        'as'=> 'post.create'
      
      
      ]);

      Route::get('/posts/trashed',[

        'uses'=>'PostController@trashed',
        'as'=> 'posts.trashed'
      ]);

      Route::get('/post/kill/{id}',[

        'uses'=>'PostController@kill',
        'as'=> 'post.kill'

      ]);
      Route::get('/post/restore/{id}',[

        'uses'=>'PostController@restore',
        'as'=> 'post.restore'

      ]);

      Route::get('/post/edit/{id}',[

        'uses'=>'PostController@edit',
        'as'=> 'post.edit'

      ]);
      
      Route::post('/post/update/{id}',[

        'uses'=>'PostController@update',
        'as'=> 'post.update'

      ]);

      Route::get('/post/delete/{id}',[
          'uses' => 'postController@destroy',
          'as' => 'post.delete'
      ]);

      Route::get('/posts',[

        'uses' => 'postController@index',
        'as'  => 'posts'

      ]);
    Route::post('/post/store',[

          'uses'=>'PostController@store',
          'as'=> 'post.store'
        
        
        ]);

        Route::get('/tags',[

            'uses' => 'TagController@index',
            'as' => 'tags'
        ]);
        Route::get('/tag/create',[

            'uses' => 'TagController@create',
            'as' => 'tag.create'
        ]);
        Route::post('/tag/store',[

            'uses' => 'TagController@store',
            'as' => 'tag.store'
        ]);
        Route::get('/tag/edit/{id}',[

            'uses' => 'TagController@edit',
            'as' => 'tag.edit'
        ]);

        Route::post('/tag/update/{id}',[

            'uses' => 'TagController@update',
            'as' => 'tag.update'
        ]);

        Route::get('/tag/delete/{id}',[

            'uses' => 'TagController@destroy',
            'as' => 'tag.delete'
        ]);

        Route::get('/users',[
            'uses' => 'UsersController@index',
            'as' => 'users'

        ]);
        Route::get('/user/create',[
            'uses'=> 'UsersController@create',
            'as' => 'user.create'

        ]);

        Route::post('/user/store',[
            'uses' => 'UsersController@store',
            'as' => 'user.store'
        ]);

        Route::get('user/admin/{id}',[
            'uses' => 'UsersController@admin',
            'as' => 'user.admin'
        ]);  /** ->middleware('admin');*/

        Route::get('user/not-admin/{id}',[
            'uses' => 'UsersController@not_admin',
            'as' => 'user.not.admin'
        ]);

        Route::get('user/profile',[
            'uses' => 'ProfilesController@index',
            'as' => 'user.profile'
        ]);
        Route::get('user/delete/{id}',[
            'uses' => 'UsersController@destroy',
            'as' => 'user.delete'
        ]);
        Route::post('user/profile/update',[
            'uses' => 'ProfilesController@update',
            'as' => 'user.profile.update'
        ]);

        Route::get('/settings',[
            'uses' => 'SettingsController@index',
            'as' => 'settings'
        ]);

        Route::post('/settings/update',[
            'uses' => 'SettingsController@update',
            'as' => 'settings.update'
        ]);



});

