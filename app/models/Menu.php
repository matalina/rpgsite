<?php namespace Matalina\Rpg\Models;

use LaravelBook\Ardent\Ardent;

class Menu extends Ardent 
{
    protected $table = 'menu';
    protected $guarded = array('id');
    
    public static $rules = array(
        'page_id' => 'required|integer',
        'order' => 'required|integer|min:0',
        'parent_id' => 'required|integer'
    );
    
    public $autoHydrateEntityFromInput = true;    // hydrates on new entries' validation
    public $forceEntityHydrationFromInput = true; // hydrates whenever validation is called
    
    public function page()
    {
        return $this->hasOne('Page');
    }
    
    public function parent()
    {
        return $this->belongsTo('Page', 'parent_id');
    }
}