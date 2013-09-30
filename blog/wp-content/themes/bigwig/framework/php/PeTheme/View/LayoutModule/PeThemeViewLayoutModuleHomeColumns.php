<?php

class PeThemeViewLayoutModuleHomeColumns extends PeThemeViewLayoutModuleColumns {

	public function messages() {
		return
			array(
				  "title" => "",
				  "type" => __pe("Home Columns")
				  );
	}

	public function name() {
		return __pe("Home Columns");
	}

	public function create() {
		return "HomeColumn";
	}

	public function force() {
		return "HomeColumn";
	}

	public function allowed() {
		return "homecolumn";
	}

	public function blockClass() {
		return "pe-container process";
	}

	public function tooltip() {
		return __pe("Use this block to add a home column module to your layout. This consists of a variable number of columns each holding a title, icon, text content and an optional link or button. These usually occur on a homepage below the main slideshow, and usually hold summary information about the site.");
	}


}

?>
