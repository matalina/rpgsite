<?php namespace Matalina\Rpg\Models;

use LaravelBook\Ardent\Ardent;

class Char extends Ardent 
{
    protected $table = 'chars';
    protected $guarded = array('id');
    
    public static $rules = array(
        'user_id' => 'required|integer|exists:user,id',
        'name' => 'required',
        'age' => 'required|integer|min:0',
        'gender' => 'required|in:0,1',
        'origin' => 'required',
        'description' => 'required',
        'personality' => 'required',
        'history' => 'required'
    );
    
    public $autoHydrateEntityFromInput = true;    // hydrates on new entries' validation
    public $forceEntityHydrationFromInput = true; // hydrates whenever validation is called
    
    public function setSlugAttribute()
    {
        $title = $this->attributes['name'];
        $this->attributes['slug'] = Str::slug($title, '-');
    }
    
    public function user()
    {
        return $this->belongsTo('User');
    }   
    
    public function posts()
    {
        return $this->hasMany('Post');
    }
}