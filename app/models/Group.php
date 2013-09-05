<?php namespace Matalina\Rpg\Models;

use LaravelBook\Ardent\Ardent;

class Group extends Ardent 
{
    protected $table = 'groups';
    protected $guarded = array('id');
    
    public static $rules = array(
        'name' => 'required',
        'description' => 'required'
    );
    
    public $autoHydrateEntityFromInput = true;    // hydrates on new entries' validation
    public $forceEntityHydrationFromInput = true; // hydrates whenever validation is called
    
    public function setSlugAttribute()
    {
        $title = $this->attributes['name'];
        $this->attributes['slug'] = Str::slug($title, '-');
    }
    
    public function users()
    {
        return $this->belongsToMany('User');
    }
}