<?php namespace Matalina\Rpg\Models;

use LaravelBook\Ardent\Ardent;

class Post extends Ardent 
{
    protected $table = 'posts';
    protected $guarded = array('id');
    
    public static $rules = array(
        'title' => 'required',
        'entry' => 'required',
        'user_id' => 'required|integer',
        'char_id' => 'integer',
        'topic_id' => 'required|integer'
    );
    
    public $autoHydrateEntityFromInput = true;    // hydrates on new entries' validation
    public $forceEntityHydrationFromInput = true; // hydrates whenever validation is called
    
    public function setSlugAttribute()
    {
        $title = $this->attributes['category'];
        $this->attributes['slug'] = Str::slug($title, '-');
    }
    
    public function topic()
    {
        return $this->belongsTo('Topic');
    }
    
    public function author() 
    {
        return $this->belongsTo('User');
    }
    
    public function character() 
    {
        return $this->belongsTo('Char');
    }
    
    public function tags() 
    {
        return $this->belongsToMany('Tag');
    }
}