<?php

class PeThemeViewLayoutModuleTest extends PeThemeViewLayoutModule {

	public function registerAssets() {
		parent::registerAssets();
	}

	public function messages() {
		return
			array(
				  "title" => __pe("Content"),
				  "type" => __pe("Test")
				  );
	}

	public function fields() {

		$description = "Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.";

		return
			array(
				  "radioui" => 
				  array(
						"label" => __pe("Radio UI Field"),
						"type" => "RadioUI",
						"options" => array("one" => 1,"two" => 2 ,"three" => 3,'blah blah' => 4,'Longer Text Here' => 5),
						"description" => $description,
						"default" => 1
						),
				  "checkboxui" => 
				  array(
						"label" => __pe("Checkbox UI Field"),
						"type" => "CheckboxUI",
						"options" => array("one" => 1,"two" => 2 ,"three" => 3),
						"description" => $description,
						"default" => 1
						),
				  "select" =>
				  array(
						"label" => __pe("Select"),
						"type" => "Select",
						"options" => array("one" => 1,"two" => 2 ,"three" => 3,'blah blah' => 4,'Longer Text Here' => 5),
						"description" => $description,
						"default" => 1
						),
				  "links" =>
				  array(
						"label" => __pe("Links Field"),
						"type" => "Links",
						"sortable" => true,
						"options" => array("one" => 1,"two" => 2 ,"three" => 3),
						"description" => $description,
						"default" => 1
						),
				  "color" =>
				  array(
						"label" => __pe("Color Field"),
						"type" => "Color",
						"description" => $description,
						"default" => '#ff0000'
						),
				  "image" => 
				  array(
						"label" => __pe("Image Field"),
						"type" => "Upload",
						"description" => $description,
						),
				  "editor" =>
				  array(
						"label" => __pe("Editor"),
						"type" => "Editor",
						"noscript" => true,
						"description" => __pe("Content"),
						"default" => ""
						),
				  "text" =>
				  array(
						"label" => __pe("Text"),
						"type" => "Text",
						"description" => __pe("Content"),
						"default" => ""
						)
				  );
	}

	public function name() {
		return __pe("Test");
	}

	public function option() {
		return "Test";
	}

	public function output($conf) {
	}

	public function tooltip() {
		return __pe("A test block");
	}

}

?>
