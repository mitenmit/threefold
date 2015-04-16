<?php
require_once dirname(__FILE__).'../paths.php';
require_once dirname(__FILE__).'../threefold/config.php';
require_once dirname(__FILE__).'../threefold/lib/TemplateException.php';
require_once dirname(__FILE__).'../threefold/lib/Threefold.php';

class ThreefoldTest extends PHPUnit_Framework_TestCase {
	public function testRenderTemplatePart() {
		$error = null;
		try {
			Threefold::renderTemplatePart('non existing path','phtml');
		} catch (TemplateException $e) {
			$error = $e->getMessage();
		} catch (Exception $e) {
			print $e->getMessage();
		}
		$this->assertStringStartsWith("Warning: no template file found for template part", $error);
	}
}