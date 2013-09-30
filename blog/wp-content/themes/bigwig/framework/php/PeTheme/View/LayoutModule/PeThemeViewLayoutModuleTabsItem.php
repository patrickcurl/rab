<?php

class PeThemeViewLayoutModuleTabsItem extends PeThemeViewLayoutModule {

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
						),
				  "content" =>
				  array(
						"label" => __pe("Content"),
						"type" => "Editor",
						"description" => __pe("Item text content."),
						"default" => __pe("Content")
						)
				  );
		
	}

	public function name() {
		return __pe("Text");
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

	public function template() {
		echo $this->data->content;
	}

	public function tooltip() {
		return __pe("Use this block to add an additional tab to your tabbed content module.");
	}

}

?>
