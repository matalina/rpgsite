<?php namespace Matalina\Rpg\Models;

use LaravelBook\Ardent\Ardent;

class Forum extends Ardent 
{
    protected $table = 'forums';
    protected $guarded = array('id');
    
    public static $rules = array(
        'name' => 'required',
        'category_id' => 'required|exists:category,id',
        'order' => 'required|integer|min:0',
        'ooc' => 'required|in:0,1'
    );
    
    public $autoHydrateEntityFromInput = true;    // hydrates on new entries' validation
    public $forceEntityHydrationFromInput = true; // hydrates whenever validation is called
    
    public function setSlugAttribute()
    {
        $title = $this->attributes['name'];
        $this->attributes['slug'] = Str::slug($title, '-');
    }
    
    public function categories()
    {
        return $this->belongsTo('Category');
    }
    
    public function topics()
    {
        return $this->hasMany('Topic');
    }
}