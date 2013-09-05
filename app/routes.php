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

// Public Pages
Route::get('/', 'PageController@show');
Route::get('page/{slug}', 'PageController@show');

Route::get('blog/feed', 'BlogController@feed');
Route::get('blog/{page?}', 'BlogController@index');
Route::get('blog/{slug}', 'BlogController@show');

Route::get('forum','ForumController@index'); // View all Forums
Route::get('forum/{slug}', 'ForumController@show'); // View all Topics in Forum
Route::get('forum/feed', 'PostController@feed');

Route::get('topic/{slug}/{page?}', 'TopicController@index'); // View all Posts in Forum

Route::get('tag/{slug}/{page?}', 'TagController@index'); // Show's all posts by Tag

Route::get('characters/{page?}', 'CharacterController@index'); // View all Characters
Route::get('character/{slug}', 'CharacterController@show');

Route::get('login', 'AuthController@login');
Route::post('login', 'AuthController@authenticate');

Route::get('register', 'AuthController@register');
Route::post('register', 'AuthController@createUser');

Route::get('active-topics','TopicController@activeTopics');
Route::get('unanswered-topics','TopicController@unansweredTopics');
Route::post('search','SearchController@search');

// Member Pages
Route::group(array('before' => 'auth'), function()
{
    // Create New Character
    Route::get('character/new', 'CharacterController@newChar');
    Route::post('character/new', 'CharacterController@createChar');
    
    // View Profile
    Route::get('profile/{username?}', 'UserController@profile');
    Route::get('profile/{username}/characters','UserController@characters');
    
    // View all Members
    Route::get('members/{page?}','UserController@index');
    
    // Reply to Existing Topic
    Route::get('topic/{slug}/post','PostController@post');
    Route::post('topic/{slug}/post','PostController@createPost');
    
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
    Route::get('message/{id}','MessageController@show');
    
    // New Message
    Route::get('message/new','MessageController@message');
    Route::post('message/new','MessageController@sendMessage');
    
});
// Moderator Pages
Route::group(array('before' => 'moderator'), function()
{
    // View All Characters
    
    // Edit Character
    
    // Approve Characters
});

// Admin Pages
Route::group(array('before' => 'admin'), function()
{
    // View All Pages
    
    // New Pages
    
    // Edit Pages
    
    // Delete Page
    
    // Menu Setup
    
    // View All Blog Posts
    
    // New Blog Post
    
    // Edit Blog Post
    
    // Delete Blog Post
    
    // View All Categories
    
    // New Category
    
    // Edit Category
    
    // Delete Category
    
    // View All Forums
    
    // New Forum
    
    // Edit Forum
    
    // Delet Forum
    
    // View All Users
    
    // New User
    
    // Edit User
    
    // Delete User
    
    // View All Tags
    
    // Edit Tag
    
    // Delete Tag
    
    // Delete Character
    
    // View All Config Variables
    
    // Go to Top Secret Area
    Route::get('admin/top-secret','MessageController@topSecretForm');
    Route::post('admin/top-secret','MessageController@saveKey');
    
});

// Super Secret Place
Route::group(array('before' => 'topSecret'), function()
{
    // View all Messages
    Route::get('admin/view-all-messages', 'MessageController@topSecretMessages');
    
    // Delete Message
    Route::get('admin/delete-message/{id}', 'MessageController@DeleteTopSecretMessage');
    
});
