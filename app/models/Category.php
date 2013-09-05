<?php namespace Matalina\Rpg\Models;

use LaravelBook\Ardent\Ardent;

class Category extends Ardent 
{
    protected $table = 'cateogry';
    protected $guarded = array('id');
    
    public static $rules = array(
        'category' => 'required',
        'order' => 'required|integer|min:0'
    );
    
    public $autoHydrateEntityFromInput = true;    // hydrates on new entries' validation
    public $forceEntityHydrationFromInput = true; // hydrates whenever validation is called
    
    public function setSlugAttribute()
    {
        $title = $this->attributes['category'];
        $this->attributes['slug'] = Str::slug($title, '-');
    }
    
    public function forums()
    {
        return $this->hasMany('Forum');
    }
}