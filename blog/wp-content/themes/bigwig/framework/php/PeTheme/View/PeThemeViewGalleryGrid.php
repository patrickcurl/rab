<?php

class PeThemeViewGalleryGrid extends PeThemeViewGallery {


	public function name() {
		return __pe("Gallery - Grid (flare lightbox)");

	}

	public function short() {
		return __pe("Images");
	}

	public function mbox() {
		$mbox = parent::mbox();
		$content =& $mbox["content"];

		unset($content["max"]);

		$fields = 
			array(
				  "filterable" => 
				  array(
						"label"=>__pe("Filter by"),
						"type"=>"Select",
						"description" => __pe("Show filters based on the selected criteria."),
						"options" => peTheme()->view->taxonomiesOptions(),
						"datatype" => "taxonomies",
						"default"=>""
						),
				  "layout" =>
				  array(
						"label"=>__pe("Layout"),
						"description" => __pe("Grid container layout."),
						"type"=>"RadioUI",
						"options" => 
						array(
							  __pe("Boxed")=>"boxed",
							  __pe("Full Width") => "fullwidth"
							  ),
						"default"=>"boxed"
						),				  
				  "width" =>
				  array(
						"label"=>__pe("Thumbnail Width"),
						"type"=>"Number",
						"description" => __pe("Image thumbnail width."),
						"default"=>256
						),
				  "height" =>
				  array(
						"label"=>__pe("Thumbnail Height"),
						"type"=>"Number",
						"description" => __pe("Image thumbnail height, leave empty to avoid image cropping (masonry layout)"),
						"default"=>""
						)
				  );

		$content = array_merge($fields,$content);

		return $mbox;	
	}

	public function template() {
		peTheme()->get_template_part("view","gallery-grid");
	}


   
}

?>
