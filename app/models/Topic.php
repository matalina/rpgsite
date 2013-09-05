<?php namespace Matalina\Rpg\Models;

use LaravelBook\Ardent\Ardent;

class Topic extends Ardent 
{
    protected $table = 'topic';
    protected $guarded = array('id');
    
    public static $rules = array(
        'title' => 'required',
        'entry' => 'required',
        'user_id' => 'required|integer',
        'post_id' => 'required|integer',
        'forum_id' => 'required|integer',
        'post_count' => 'required|integer',
        'last_post_time' => 'required|date_format:Y-m-d H:i:s',
        'last_post' => 'required|integer',
        'last_author' => 'required|integer',
        'view_count' => 'required|integer'
    );
    
    public $autoHydrateEntityFromInput = true;    // hydrates on new entries' validation
    public $forceEntityHydrationFromInput = true; // hydrates whenever validation is called
    
    public function setSlugAttribute()
    {
        $title = $this->attributes['title'];
        $this->attributes['slug'] = Str::slug($title, '-');
    }
    
    public function user()
    {
        return $this->belongsTo('User');
    }
    
    public function firstPost()
    {
        return $this->hasOne('Post');
    }
    
    public function lastPost()
    {
        return $this->hasOne('Post','last_post');
    }
    
    public function posts()
    {
        return $this->hasMany('Post');
    }
    
    public function creator()
    {
        return $this->hasOne('User');
    }
    
    public function lastPoster()
    {
        return $this->hasOne('User','last_author');
    }
    
    public function forum()
    {
        return $this->belongsTo('Forum');
    }
}