
<?php
use App\Models\Post;
use App\Models\User;
use App\Models\Country;
use App\Models\Photo;
use Illuminate\Support\Facades\Route;
use App\Models\Tag;
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
Route::group(['middleware'=>'web'], function() {



Route::resource('/posts','\App\Http\Controllers\PostController');
});
Route::get('/', function () {
    return view('welcome');
});

Route::get('/insert',function(){

    DB::insert('insert into posts(title, content) values(?,?)', ['php with laravel','laravel is good thing to do']);
});

Route::get('/abc', function () {
    return "This is an article";
});

Route::get('/post/{id}', '\App\Http\Controllers\PostController@show');

Route::get('/contact', '\App\Http\Controllers\PostController@contact');

Route::get('/post/{id}/{name}/{password}', '\App\Http\Controllers\PostController@show_post');

Route::get('/abc/{id}/{name}', function ($id,$name) {


    return "This is an article" ." ".$id.  " " .$name ;
});

Route::get('/abc/admin', array('as'=>'admin.home', function () {

    $url = route('admin.home');
    return "this is the url".$url ;
}));

Route::get('/read',function(){

    $results = DB::select('select * from posts where id= ? ', [1]);
    //foreach($results as $post) {
        //return $post->title;
        return   var_dump($results);
    //}
});
Route::get('/update',function(){

    $updated = DB::update('update posts set title="update post" where id= ? ', [1]);
    return $updated;

});

Route::get('/delete',function(){

    $deleted = DB::delete('delete from posts where id= ? ', [1]);
    return $deleted;

});
Route::get('/find',function() {

    $posts = Post::find(2);
    //foreach ($posts as $post)
        return $posts;

});
Route::get('/findwhere',function() {

   // $posts = Post::where('id',2)->orderBy('id','desc')->get();
    //foreach ($posts as $post)
    $posts = Post::where('id', '<', 50)->firstorfail();
    return $posts;

});
Route::get('/basicinsert',function() {
     $post = new Post;
    //$post = Post::find(2);
    // $posts = Post::where('id',2)->orderBy('id','desc')->get();
    //foreach ($posts as $post)
    $post->title = 'hello we insert a new value using model function';
    $post->content = 'hello we insert a new value using model function';

    $post->save();
});

Route::get('/create',function() {
    Post::create(['title'=>'the create method','content'=>'i am learning new method']);

});


Route::get('/delete',function() {
    $post = Post::find(2);
    $post->delete();
});

Route::get('/delete2',function() {
    Post::destroy([3,4]);
    //Post::where('is_admin',0)->delete();
});

Route::get('/softdelete',function() {
    Post::find(7)->delete();
    //Post::where('is_admin',0)->delete();
});

Route::get('/readsoftdelete',function() {
    $post = Post::onlyTrashed()->get();
    return $post;
});

Route::get('/restore',function() {
    $post = Post::withTrashed()->restore();
    return $post;
});

Route::get('/forcedelete',function() {
    $post = Post::onlyTrashed()->forcedelete();

});
Route::get('/user/{id}/post',function($id) {

    return User::find($id)->post->title;
});

Route::get('/post/{id}/user',function($id) {

    return Post::find($id)->user->name;
});

Route::get('/posts',function() {

    $user = User::find(1);
    foreach($user->posts as $post)
    {

        echo $post->title . "<br>";
    }
});
Route::get('/user/{id}/role',function($id) {

    $user = User::find($id);
    foreach ($user->roles as $role) {

        return $role;
    }
});


Route::get('/user/pivot',function() {

    $user = User::find(1);
    foreach ($user->rools as $role) {

        return $role->pivot;
    }
});

Route::get('/user/country',function() {

    $country = Country::find(1);

    foreach($country->posts as $post) {

       return $post->title;
    }
});

Route::get('/mubeen/photos', function() {

    $post = Post::find(1);

    foreach($post->photos as $photo) {

    return $photo;
}
});


  Route::get('photo/{id}/post', function($id){

      $photo = Photo::findOrFail($id);
      return $photo->imageable;
  });


Route::get('/post/tag', function(){

    $post = Post::find(1);
    foreach($post->tags as $tag){
    echo $tag;


}
});

Route::get('/tag/post',function (){

$tag = Tag::find(2);

foreach ($tag->posts as $post) {

 return $post;

}

});
