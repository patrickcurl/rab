<?php

class PeThemeViewLayoutModuleHeading extends PeThemeViewLayoutModule {

	public function name() {
		return __pe("Heading");
	}

	public function messages() {
		return
			array(
				  "title" => "",
				  "type" => __pe("Heading")
				  );
	}

	public function fields() {
		return
			array(
				  "title" =>
				  array(
						"label" => "Title",
						"type" => "Text",
						"description" => __pe("Heading title."),
						"default" => __pe("Title")
						),
				  "subtitle" =>
				  array(
						"label" => "Subtitle",
						"type" => "Text",
						"description" => __pe("Heading subtitle, leave blank to hide."),
						"default" => __pe("Subtitle")
						)

				  );
		
	}

	public function blockClass() {
		return "pe-container nomargin";
	}

	public function template() {
		peTheme()->get_template_part("viewmodule","heading");
	}

	public function tooltip() {
		return __pe("Use this block to add a heading section to your layout. A heading block consists of a title and subtitle.");
	}
	
}

?>
