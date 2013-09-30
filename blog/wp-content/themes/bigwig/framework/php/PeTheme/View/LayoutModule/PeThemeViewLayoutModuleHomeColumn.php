<?php

class PeThemeViewLayoutModuleHomeColumn extends PeThemeViewLayoutModule {

	public function messages() {
		return
			array(
				  "title" => "",
				  "type" => __pe("Column")
				  );
	}

	public function fields() {
		return
			array(
				  "title" => 	
				  array(
						"label"=>__pe("Title"),
						"type"=>"Text",
						"description" => __pe("Column title."),
						"default"=>__pe("Title")
						),
				  "icon" => 	
				  array(
						"label"=>__pe("Icon"),
						"type"=>"Icon",
						"description" => __pe("Column icon."),
						"default"=>"icon-bookmarks",
						),
				  "content" =>
				  array(
						"label" => "Content",
						"type" => "Editor",
						"description" => __pe("Column content."),
						"default" => 'Lorem ipsum dolor sit amet, consect tu era dipis cing elit. Donec odio. Quisque volut pat mattiois eros. Nullam males ua da erat ut turp is. Suspen disse urna tus nibh, viverra nonet, semper susci pi , pos uere a, pede. Sed eget estas, ante ettuli vulputate volutpat, eros pede.'
						),
				  "label" =>
				  array(
						"label"=>__pe("Link Label"),
						"type"=>"Text",
						"description" => __pe("Column link label, leave empty to hide."),
						"default"=>__pe("LEARN MORE")
						),
				  "url" =>
				  array(
						"label"=>__pe("Link Url"),
						"type"=>"Text",
						"description" => __pe("Column link url, leave empty to hide."),
						"default"=>"#"
						)
				  );
		
	}

	public function name() {
		return __pe("Home Column");
	}

	public function type() {
		return "Custom";
	}
	
	public function cssClass() {
		return "custom";
	}

	public function group() {
		return "homecolumn";
	}

	public function template() {
		peTheme()->get_template_part("viewmodule","homecolumn");
	}

	public function tooltip() {
		return __pe("Use this block to add an additional column of data to the home column module.");
	}


}

?>
