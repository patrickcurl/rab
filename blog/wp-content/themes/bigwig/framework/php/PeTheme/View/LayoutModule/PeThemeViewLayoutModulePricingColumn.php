<?php

class PeThemeViewLayoutModulePricingColumn extends PeThemeViewLayoutModule {

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
						"description" => __pe("Table title. "),
						"default"=>__pe("Package One")
						),
				  "price" => 	
				  array(
						"label"=>__pe("Price Box"),
						"type"=>"Editor",
						"description" => __pe("Price box content, can be html."),
						"default"=>__pe("<h4>$99</h4><span>PER MONTH</span>")
						),
				  "features" => 
				  array(
						"section" => "main",
						"label"=> __pe("Features"),
						"description" => __pe("Add one or more features"),
						"type"=>"Items",
						"description" => "",
						"button_label" => __pe("Add New"),
						"sortable" => true,
						"auto" => __pe("Feature %"),
						"unique" => false,
						"editable" => false,
						"legend" => false,
						"fields" => 
						array(
							  array(
									"type" => "empty",
									"width" => "186"
									),
							  array(
									"name" => "content",
									"type" => "text",
									"width" => "500",
									"default" => ""
									)
							  ),
						"default" => array(
										   array("content"=>__pe("Feature 1")),
										   array("content"=>__pe("Feature 2")),
										   array("content"=>__pe("Feature 3"))
										   )
						),
				  "button_label" => 	
				  array(
						"label"=>__pe("Button Label"),
						"type"=>"Text",
						"default"=>__pe("Sign Up Now")
						),
				  "button_link" => 	
				  array(
						"label"=>__pe("Button Link"),
						"type"=>"Text",
						"default"=>"#"
						)
				  );
		
	}

	public function name() {
		return __pe("Pricing Column");
	}

	public function type() {
		return "Custom";
	}
	
	public function cssClass() {
		return "custom";
	}

	public function group() {
		return "pricingcolumn";
	}


	public function template() {
		peTheme()->get_template_part("viewmodule","pricingcolumn");
	}

	public function tooltip() {
		return __pe("Use this block to add another column of data to your pricing table layout.");
	}

}

?>
