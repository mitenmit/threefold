<?php
/*
THREEFOLD
Renders the page based on a simple header-body-footer construction.

@package Threefold
@since 1.0.0
*/
namespace Threefold;

class Threefold {
	//Rendering function
	public static function load($page, $sub=NULL, $opt_ext=NULL) {
		//Maybe we don't want to load a phtml file this time.
		$ext = (isset($opt_ext) && !empty($opt_ext)) ? $opt_ext : "phtml";
		//Are we working with a subfolder? If so, $sub is the folder name and $page the name of the page.
		$pageName = $page;
		if(isset($sub)) {
			$page = $sub."/".$page;
		}
		
		/*
		Set custom titles and descriptions based on a JSON-file or revert to default.
		@since 1.1.1
		*/
		if(file_exists($jsonPath=ABSPATH.PAGES_FOLDER.$page.'.json')) {
			$customMetaData = json_decode(file_get_contents($jsonPath));
			define (PAGE_TITLE,		$customMetaData->title);
			define (PAGE_DESCRIPTION, $customMetaData->description);
		}else{
			//Set title based on filename and preference in config file
			if (CAPITALS_PREF === 'all') {
				//Use all caps.
				define (PAGE_TITLE,	strtoupper(str_replace('_', ' ', $pageName)));

			}else if (CAPITALS_PREF === 'first') {
				//Only capitalise the first word.
				define (PAGE_TITLE,	ucfirst(str_replace('_', ' ', $pageName)));

			}else{
				//Capitalise all words.
				define (PAGE_TITLE,	ucwords(str_replace('_', ' ', $pageName)));
			}
		}

		/*
		Set the slug to be the filename of the page. Can be used in templates for per-page styles.
		@since 1.1.1
		*/
		define (PAGE_SLUG,	$pageName);

		/* 
		Begin rendering the page, starting with the header
		@since 1.1.0
		*/
		static::renderTemplatePart('head');
		//Does the page exist? If so, include it. Otherwise, include the 404 page from the theme.
		if(file_exists($pagePath=ABSPATH.PAGES_FOLDER.$page.'.'.static::$ext)) {
			include ($pagePath);
		}else{
			define (PAGE_TITLE, "404 - File Not Found");
			static::renderTemplatePart('404');			
		}
		//Load footer
		static::renderTemplatePart('foot');
	}

	/*
	Loading specific parts of the template
	@since 1.1.0
	*/
	private function renderTemplatePart($part) {
		//Does the part exist?
		if(file_exists($pathToFileToLoad=ABSPATH.THEME_FOLDER.$part.'.'.$ext)) {
			include ($pathToFileToLoad);
		}else{
			throw new TemplateException ("Warning: no template file found for template part '".$part."' at ".$pathToFileToLoad."!");	
		}
	}
	
	/*
	Get and set functions for storing and retrieving metadata of the page.
	@since 1.0.0
	*/
	public function __set($name, $value) {
        static::$vars[$name] = $value;
    }
    public function __get($name) {
        return static::$vars[$name];
    }
}