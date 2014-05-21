<?
/*
THREEFOLD
Renders the page based on a simple header-body-footer construction.

@package Threefold
@since 1.0.0
*/

class Threefold {
	private $vars = array();
	private $ext = "phtml";

	//Rendering function
	public function load($page, $sub=NULL, $opt_ext=NULL) {
		//If you wanted to, you could tweak init.php to load pages with other file extensions than .phtml.
		if(isset($opt_ext)) {
			$this->ext = $opt_ext;
		}
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
			$this->title = $customMetaData->title;
			$this->description = $customMetaData->description;
		}else{
			if ( CAPITALS_PREF === 'all' ) {
				$this->title = strtoupper(str_replace('_', ' ', $pageName));
			}else if ( CAPITALS_PREF === 'first' ) {
				$this->title = ucfirst(str_replace('_', ' ', $pageName));
			}else {
				$this->title = ucwords(str_replace('_', ' ', $pageName));
			}
		}

		/*
		Set the slug to be the filename of the page. Can be used in templates for per-page styles.
		@since 1.1.1
		*/
		$this->slug = $pageName;

		/* 
		Begin rendering the page, starting with the header
		@since 1.1.0
		*/
		$this->renderTemplatePart('head');
		//Does the page exist? If so, include it. Otherwise, include the 404 page from the theme.
		if(file_exists($pagePath=ABSPATH.PAGES_FOLDER.$page.'.'.$this->ext)) {
			include ($pagePath);
		}else{
			$this->title = "404 - File Not Found";
			$this->renderTemplatePart('404');			
		}
		//Load footer
		$this->renderTemplatePart('foot');
	}

	/*
	Loading specific parts of the template
	@since 1.1.0
	*/
	public function renderTemplatePart($part) {
		//Does the part exist?
		if(file_exists($pathToFileToLoad=ABSPATH.THEME_FOLDER.$part.'.'.$this->ext)) {
			include ($pathToFileToLoad);
		}else{
			throw new Exception ("Warning: no template file found for template part '".$part."' at ".$pathToFileToLoad."!");	
		}
	}
	
	/*
	Get and set functions for storing and retrieving metadata of the page.
	@since 1.0.0
	*/
	public function __set($name, $value) {
        $this->vars[$name] = $value;
    }
    public function __get($name) {
        return $this->vars[$name];
    }
}