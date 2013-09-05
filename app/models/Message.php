<?php namespace Matalina\Rpg\Models;

use LaravelBook\Ardent\Ardent;

<?php namespace Matalina\Rpg\Models;

use LaravelBook\Ardent\Ardent;

class Message extends Ardent 
{
    protected $table = 'cateogry';
    protected $guarded = array('id');
    
    public static $rules = array(
        'author' => 'required|integer',
        'entry' => 'required'
    );
    
    public $autoHydrateEntityFromInput = true;    // hydrates on new entries' validation
    public $forceEntityHydrationFromInput = true; // hydrates whenever validation is called
    
    public function author()
    {
        return $this->belongsTo('User', 'author');
    }
    
    public function receipients()
    {
        return $this->belongsToMany('User');
    }
}