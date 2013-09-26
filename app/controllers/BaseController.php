<?php

class BaseController extends Controller {
    protected $site_name;
    
    public function __construct() {
        $this->site_name = Matalina\Rpg\Models\Config::where('name', '=', 'site-name')->first()->value;
    }
	/**
	 * Setup the layout used by the controller.
	 *
	 * @return void
	 */
	protected function setupLayout()
	{
		if ( ! is_null($this->layout))
		{
			$this->layout = View::make($this->layout);
		}
	}

}