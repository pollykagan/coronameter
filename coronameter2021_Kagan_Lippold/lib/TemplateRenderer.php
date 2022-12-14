<?php
namespace coronameter2021_Kagan_Lippold\lib;

/**
 * Capabilities for rendering templates
 */
abstract class TemplateRenderer {

	protected $section;
	protected $result;

	protected function render(string $path, string $section, array $vars=null) {
	
		ob_start();
		$begin = function($sec) {
			$this->begin($sec);
		};
		$end = function($sec) {
			$this->end($sec);
		};
		
		$this->section = $section;
		if ($vars != null) {
			extract($vars);
		}
		require($path);
		ob_end_clean();
		error_reporting(E_ALL);
		return $this->result;
	}

	protected function begin($section){
		if ($section == $this->section) {
			ob_clean();
			error_reporting(E_ALL);
		} else {
			error_reporting(0);
		}
	}

	protected function end($section){
		if ($section == $this->section) {
			$this->result = ob_get_contents();
		}
	}

}
?>