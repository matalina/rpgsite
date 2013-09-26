<?php 
class PageController extends \BaseController {
    /**
     * Show Public Pages
     * 
     * @access public
     * @param string $slug
     * @return Response
     */
	public function show($slug = 'home')
	{
	    $page = Matalina\Rpg\Models\Page::where('slug', '=', $slug)->first();
	    
	    if($page == NULL) {
	        App::abort(404, 'Page not found');
	    }
	    
	    if($slug == 'home') {
	        $title = $this->site_name;
	        $description = Matalina\Rpg\Models\Config::where('name', '=', 'site-description')->first()->value;
	    }
	    else {
	        $title = $page->title.' | '.$this->site_name;
	        $description = $page->first;
	    }
	    $content = $page->display;
	    
	    return View::make('page.page')->with(compact('title', 'description', 'content'));
	}
	/**
     * Admin View of all pages
     * 
     * @access public
     * @param string $slug
     * @return Response
     */
	public function index($page = 1)
	{
	    //$pages = Matalina\Rpg\Models\Page::get()->limit(Matalina\Rpg\Models\Config::get('name', '=', 'admin-limit'));
	    //dd($pages);
	}

}