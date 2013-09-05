<?php namespace Matalina\Rpg\Models;

use LaravelBook\Ardent\Ardent;

class Config extends Ardent 
{
    protected $table = 'config';
    protected $guarded = array('id');
    
    public static $rules = array(
        'name' => 'required|max:25',
        'description' => 'required',
        'value' => 'required'
    );
    
    public $autoHydrateEntityFromInput = true;    // hydrates on new entries' validation
    public $forceEntityHydrationFromInput = true; // hydrates whenever validation is called
}