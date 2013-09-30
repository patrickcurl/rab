<?php

class PeThemeViewPortfolioGrid extends PeThemeViewBlog {

	public function name() {
		return __pe("Portfolio Grid");
	}
	
	public function short() {
		return __pe("Portfolio");
	}

	public function type() {
		return __pe("Portfolio");
	}

	public function mbox() {
		$mbox = parent::mbox();
		
		$mbox["content"] = 
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
				  "lightbox" => 
				  array(
						"label"=>__pe("Use Lightbox"),
						"type"=>"RadioUI",
						"description" => __pe("If set to 'yes', clicking on image thumbnail will open a lightbox window, 'no' will go directly to the item page."),
						"options" => PeGlobal::$const->data->yesno,
						"default"=>"yes"
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
						"label"=>__pe("Cell Width"),
						"type"=>"Number",
						"description" => __pe("Grid cell width."),
						"default"=>320
						),
				  "height" =>
				  array(
						"label"=>__pe("Cell Height"),
						"type"=>"Number",
						"description" => __pe("Grid cell height."),
						"default"=>240
						),
				  "clayout" =>
				  array(
						"label"=>__pe("Cell Layout"),
						"description" => __pe("<b>Fixed</b>: all grid cell will have the same width/height.<br><b>Variable</b>: will use the cell layout defined in the project portfolio settings."),
						"type"=>"RadioUI",
						"options" => 
						array(
							  __pe("Fixed") => "fixed",
							  __pe("Variable")=>"variable",
							  ),
						"default"=>"variable"
						),		
				  "sort" =>
				  array(
						"label"=>__pe("Sorting"),
						"type"=>"RadioUI",
						"description" => __pe("'none' will preserve items natural order which is what you want when all grid cell have the same width/height. 'optimize layout' should only be used when mixing cells with different layouts."),
						"options" => 
						array(
							  __pe("none") =>"none",
							  __pe("auto") =>"auto"
							  ),
						"default"=>"none"
						),
				  "pager" => 
				  array(
						"label"=>__pe("Paged Result"),
						"type"=>"RadioUI",
						"description" => __pe("Display a pager when more posts are found than specified in the 'Maximum' field. "),
						"options" => PeGlobal::$const->data->yesno,
						"default"=>"no"
						)
				  );

		return $mbox;	
	}

	public function template($type = "") {
		if ($type != "empty") {
			peTheme()->get_template_part("view","portfolio-grid");
		}
	}
}

?>
