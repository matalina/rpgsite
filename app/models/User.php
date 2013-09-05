<?php namespace Matalina\Rpg\Models;

use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;
use LaravelBook\Ardent\Ardent;

class User extends Ardent implements UserInterface, RemindableInterface {
{
    protected $table = 'User';
    protected $guarded = array('id','password');
    
    protected $hidden = array('password');
    
    public static $rules = array(
        'username' => 'required|unique:users',
        'email' => 'required|unique:users',
        'birth_date' => 'required|date_format:Y-m-d'
    );
    
    public $autoHydrateEntityFromInput = true;    // hydrates on new entries' validation
    public $forceEntityHydrationFromInput = true; // hydrates whenever validation is called
    
    public function characters()
    {
        return $this->hasMany('Char');
    }
    
    public function posts()
    {
        return $this->hasMany('Post')
    }
    
    public function messages()
    {
        return $this->hasMany('Message','author');
    }
    
    public function receivedMessages()
    {
        return $this->belongsToMany('Message');
    }
    
    public function groups()
    {
        return $this->belongsToMany('Group');
    }
    
    public function topics()
    {
        return $this->hasMany('Topic');
    }

	public function getAuthIdentifier()
	{
		return $this->getKey();
	}

	public function getAuthPassword()
	{
		return $this->password;
	}

	public function getReminderEmail()
	{
		return $this->email;
	}
}