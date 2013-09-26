<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::when('*', 'csrf', array('post'));

// Home Page
Route::get('/', 'PageController@show');
// Other Pages
Route::get('page/{slug}', 'PageController@show')->where('slug','[a-z\-0-9]+');

// Blog Pages
Route::get('blog/feed', 'BlogController@feed');
Route::get('blog/{page?}', 'BlogController@index')->where('page','[0-9]+');
Route::get('blog/{slug}', 'BlogController@show')->where('slug','[a-z\-0-9]+');

// Forum Pages
Route::get('forum','ForumController@index'); // View all Forums
Route::get('forum/{slug}', 'ForumController@show')->where('slug','[a-z\-0-9]+'); // View all Topics in Forum
Route::get('forum/feed', 'PostController@feed');

// Topic Page
Route::get('topic/{slug}/{page?}', 'TopicController@index')->where('slug','[a-z\-0-9]+')->where('page','[0-9]+'); // View all Posts in Forum

// Tag Page
Route::get('tag/{slug}/{page?}', 'TagController@index'); // Show's all posts by Tag

// Character Pages
Route::get('characters/{page?}', 'CharacterController@index'); // View all Characters
Route::get('character/{slug}/timeline', 'CharacterController@timeline')->where('slug','[a-z\-0-9]+'); // View timeline of all character posts
Route::get('character/{slug}', 'CharacterController@show')->where('slug','[a-z\-0-9]+');

// Login/out
Route::get('login', 'AuthController@login');
Route::post('login', 'AuthController@authenticate');

// Register
Route::get('register', 'AuthController@register');
Route::post('register', 'AuthController@createUser');

// Speical Pages
Route::get('active-topics','TopicController@activeTopics');
Route::get('unanswered-topics','TopicController@unansweredTopics');
Route::post('search','SearchController@search');

// Member Pages
Route::group(array('before' => 'auth'), function()
{
    // Create New Character
    Route::get('character/new', 'CharacterController@character');
    Route::post('character/new', 'CharacterController@createChar');
    
    // Edit Character
    Route::get('character/{slug}/edit','CharacterController@editCharacter')->where('slug','[a-z\-0-9]+');
    Route::post('/character','CharacterController@updateCharacter');
    
    // View Profile
    Route::get('profile/{username?}', 'UserController@profile')->where('username','[a-z\-0-9]+');
    Route::get('profile/{username}/characters','UserController@characters')->where('username','[a-z\-0-9]+');
    
    // View all Members
    Route::get('members/{page?}','UserController@index')->where('page','[0-9]+');
    
    // Reply to Existing Topic
    Route::get('topic/{slug}/post','PostController@post')->where('slug','[a-z\-0-9]+');
    Route::post('topic/{slug}/post','PostController@createPost')->where('slug','[a-z\-0-9]+');
    
    // Create New Topic
    Route::get('topic/new', 'TopicController@topic');
    Route::post('topic/new', 'TopicController@createTopic');
    
    // Miscellaneous
    Route::get('logout', 'AuthController@logout');
    Route::get('mark-forum-read','ForumController@markAsRead');
    Route::get('mark-all-read','PostController@markAsRead');
    Route::get('who-is-online','UserController@whosOnline');
    
    // Inbox
    Route::get('inbox','MessageController@index');
    Route::get('message/{id}','MessageController@show')->where('id','[0-9]+');
    
    // New Message
    Route::get('message/new','MessageController@message');
    Route::post('message/new','MessageController@sendMessage');
    
});

// Moderator Pages
Route::group(array('before' => 'moderator'), function()
{
    // View All Characters
    Route::get('admin/characters/{page?}','CharacterController@index')->where('page','[0-9]+');;
    
    // Edit Character
    Route::get('admin/character/{id}','CharacterController@editCharacter')->where('id','[0-9]+');;
    Route::post('admin/character','CharacterController@updateCharacter');
    
    // Approve Characters
    Route::get('admin/character/delete/{id}','CharacterController@delete')->where('id','[0-9]+');;
});

// Admin Pages
Route::group(array('before' => 'admin'), function()
{
    // View All Pages
    Route::get('admin/pages/{page?}', 'PageController@index')->where('page','[0-9]+');
    
    // New Pages
    Route::get('admin/page/new', 'PageController@page');
    Route::post('admin/page/new', 'PageController@createPage');
    
    // Edit Pages
    Route::get('admin/page/{id}', 'PageController@editPage')->where('id','[0-9]+');;
    Route::post('admin/page', 'PageController@updatePage');
    
    // Delete Page
    Route::get('admin/page/delete/{id}', 'PageController@deletePage')->where('id','[0-9]+');;
    
    // Menu Setup
    Route::get('admin/menu','MenuController@index');
    Route::post('admin/menu', 'MenuController@updateMenu');
    
    // View All Blog Posts
    Route::get('admin/blog/{page?}', 'BlogController@index')->where('page','[0-9]+');;
    
    // New Blog Post
    Route::get('admin/blog/new', 'BlogController@post');
    Route::post('admin/blog/new', 'BlogController@createPost');
    
    // Edit Blog Post
    Route::get('admin/blog/{id}', 'BlogController@editPost')->where('id','[0-9]+');;
    Route::post('admin/blog', 'BlogController@updatePost');
    
    // Delete Blog Post
    Route::get('admin/blog/delete/{id}', 'BlogController@deletePost')->where('id','[0-9]+');;
    
    // View All Categories
    Route::get('admin/category','CategoryController@index');
    Route::post('admin/category','CategoryController@order');
    
    // New Category
    Route::get('admin/category/new','CategoryController@category');
    Route::post('admin/category/new','CategoryController@createCategory');
    
    // Edit Category
    Route::get('admin/category/{id}','CategoryController@editCategory');
    Route::post('admin/category','CategoryController@updateCategory');
    
    // Delete Category
    Route::get('admin/category/delete/{id}', 'CategoryController@deleteCategory')->where('id','[0-9]+');;
    
    // View All Forums
    Route::get('admin/forums','ForumController@index');
    
    // New Forum
    Route::get('admin/forum/new','ForumController@forum');
    Route::post('admin/forum/new','ForumController@createForum');
    
    // Edit Forum
    Route::get('admin/forum/{id}','ForumController@editForum');
    Route::post('admin/forum','ForumController@updateForum');
    
    // Delete Forum
    Route::get('admin/forum/delete/{id}', 'ForumController@deleteForum')->where('id','[0-9]+');;
    
    // View All Users
    Route::get('admin/users','UserController@index');
    
    // New User
    Route::get('admin/user/new','UserController@user');
    Route::post('admin/user/new','UserController@createUser');
    
    // Edit User
    Route::get('admin/user/{id}','UserController@editUser');
    Route::post('admin/user','UserController@updateUser');
    
    // Delete User
    Route::get('admin/user/delete/{id}', 'UserController@deleteUser')->where('id','[0-9]+');;
    
    // View All Tags
    Route::get('admin/tags','TagController@index');
    
    // Edit Tag
    Route::get('admin/tag/{id}','TagController@editTag')->where('id','[0-9]+');;
    Route::post('admin/tag','TagController@updateTag');
    
    // Delete Tag
    Route::get('admin/tag/delete/{id}', 'TagController@deleteTag')->where('id','[0-9]+');;
    
    // Delete Character
    Route::get('admin/character/delete/{id}', 'CharController@deleteChararacter')->where('id','[0-9]+');;
    
    // View All Config Variables
    Route::get('admin/config','ConfigController@index');
    Route::post('admin/config','ConfigController@updateConfig');
    
    // Go to Top Secret Area
    Route::get('admin/top-secret','MessageController@topSecretForm');
    Route::post('admin/top-secret','MessageController@verifyKey');
    
});

// Super Secret Place
Route::group(array('before' => 'topSecret'), function()
{
    // View all Messages
    Route::get('admin/view-all-messages', 'MessageController@topSecretMessages');
    
    // Delete Message
    Route::get('admin/delete-message/{id}', 'MessageController@DeleteTopSecretMessage')->where('id','[0-9]+');;
    
});
