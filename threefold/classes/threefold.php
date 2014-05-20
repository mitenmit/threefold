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
		if(isset($sub)) {
			$page = $sub."/".$page;
		}

		//Does the page exist? If so, include it. Otherwise, include the 404 page from the theme.
		if(file_exists($pagePath=ABSPATH.PAGES_FOLDER.$page.'.'.$this->ext)) {
			$this->loadHeader();
			include ($pagePath);
		}else{
			$this->title = "404 - File Not Found";
			$this->loadHeader();
			//Does the theme have a 404 page? It should have one.
			if(file_exists($noPath=ABSPATH.THEME_FOLDER.'404.phtml')) {
				include ($noPath);
			}else{
				throw new Exception ("Warning: no template file found for 404 pages at ".$noPath."!");		
			}	
		}
		//Does the theme have a footer?
		if(file_exists($footerPath=ABSPATH.THEME_FOLDER.'foot.phtml')) {
			include ($footerPath);
		}else{
			throw new Exception ("Warning: no template file found for the footer at ".$footerPath."!");		
		}
	}

	public function loadHeader() {
		//Does the theme have a header?
		if(file_exists($headerPath=ABSPATH.THEME_FOLDER.'head.phtml')) {
			include ($headerPath);
		}else{
			throw new Exception ("Warning: no template file found for the header at ".$headerPath."!");	
		}
	}
	//These are used for storing or retrieving metadata of the page, such as the title.
	public function __set($name, $value) {
        $this->vars[$name] = $value;
    }
    public function __get($name) {
        return $this->vars[$name];
    }
}