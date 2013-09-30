<?php

class PeThemeViewLayoutModuleTabsItemContainer extends PeThemeViewLayoutModuleContainer {

	public function messages() {
		return
			array(
				  "title" => "",
				  "type" => __pe("Tab")
				  );
	}

	public function fields() {
		return
			array(
				  "title" =>
				  array(
						"label" => __pe("Title"),
						"type" => "Text",
						"description" => __pe("Item Title."),
						"default" => __pe("Title")
						)
				  );
		
	}

	public function type() {
		return "Tabs";
	}

	public function cssClass() {
		return "custom";
	}
	
	public function group() {
		return "tabs";
	}

	public function tooltip() {
		return __pe("Use this block to add more complex content to your tabbed item. This block basically acts as a container into which further blocks may be inserted.");
	}

}

?>
