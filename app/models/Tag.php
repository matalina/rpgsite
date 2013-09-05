<?php namespace Matalina\Rpg\Models;

use LaravelBook\Ardent\Ardent;

class Tag extends Ardent 
{
    protected $table = 'tags';
    protected $guarded = array('id');
    
    public static $rules = array(
        'tag' => 'required'
    );
    
    public $autoHydrateEntityFromInput = true;    // hydrates on new entries' validation
    public $forceEntityHydrationFromInput = true; // hydrates whenever validation is called
    
    public function setSlugAttribute()
    {
        $title = $this->attributes['tag'];
        $this->attributes['slug'] = Str::slug($title, '-');
    }
    
    public function posts()
    {
        return $this->belongsToMany('Post');
    }
}