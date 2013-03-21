<?php

class Base_Controller extends Controller 
{

	/**
	 * Will hold the view data, passed in each function.
	 * 
	 * @var array
	 */
	protected $view_data = array();

	public function __construct()
	{
		parent::__construct();

		// 
		// CSS
		// 
		Asset::add('css.app', 'css/style.css');


		/*
		|--------------------------------------------------------------------------
		| Scripts
		|--------------------------------------------------------------------------
		*/
		

		//
		// Plugins
		//
		
		// Asset::add('js.google', 'https://www.google.co.uk/jsapi');
		Asset::add('js.jquery', 		'js/plugins/jquery.js');
		Asset::add('js.underscore', 	'js/plugins/underscore.js');
		Asset::add('js.backbone', 		'js/plugins/backbone.js');
		// Asset::add('js.handlebars',		'js/plugins/handlebars.js');
		// Asset::add('js.ember',			'js/plugins/ember.js');

		//
		// App
		//
		Asset::add('js.namespace', 				'js/main.js');
		Asset::add('js.classes.models', 		'js/classes/models.js');
		Asset::add('js.classes.collections', 	'js/classes/collections.js');
		Asset::add('js.classes.views', 			'js/classes/views.js');
		

	}

	/**
	 * Catch-all method for requests that can't be matched.
	 *
	 * @param  string    $method
	 * @param  array     $parameters
	 * @return Response
	 */
	public function __call($method, $parameters)
	{
		return Response::error('404');
	}

}