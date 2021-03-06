<?php namespace Matalina\Rpg\Models;

use LaravelBook\Ardent\Ardent;

class Category extends Ardent 
{
    protected $table = 'blog';
    protected $guarded = array('id');
    
    public static $rules = array(
        'title' => 'required',
        'entry' => 'required'
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
}