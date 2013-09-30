<?php

class PeThemeWidgetLogo extends PeThemeWidget {

	public function __construct() {
		$this->name = __pe("Pixelentity - Logo");
		$this->description = __pe("Logo, info, social links");
		$this->wclass = "widget_info";

		$content = <<<EOL
<p>15 Block 8/c, Hll Street,<br/>San Francisco, CA.</p>
<span class="phone">+353 (0) 123 456 78</span>
<a href="#">hello@emailaddress.com</a>
EOL;

$this->fields = array(
							  "logo" => 
							  array(
									"label"=>__pe("Logo/Image"),
									"type"=>"Upload",
									"section"=>__pe("General"),
									"description" => __pe("Logo/Image to be used as the widget title"),
									"default"=> PE_THEME_URL."/img/skin/logo.png"
									),
							  "content" => 
							  array(
									"label"=>__pe("Statistics"),
									"type"=>"TextArea",
									"description" => __pe("Info section"),
									"default"=>$content
									),
							  "social" => 
							  array(
									"label"=>__pe("Social Profile Links"),
									"type"=>"Items",
									"section"=>__pe("Header"),
									"description" => __pe("Add one or more links to social networks."),
									"button_label" => __pe("Add Social Link"),
									"sortable" => true,
									"auto" => __pe("Layer"),
									"unique" => false,
									"editable" => false,
									"legend" => false,
									"fields" => 
									array(
										  array(
												"label" => __pe("Social Network"),
												"name" => "icon",
												"type" => "select",
												"options" => apply_filters('pe_theme_social_icons',array()),
												"width" => 100,
												"default" => ""
												),
										  array(
												"name" => "url",
												"type" => "text",
												"width" => 190, 
												"default" => "#"
												)
										  ),
									"default" => ""
									)
							  
							  );

		parent::__construct();
	}

	public function getContent(&$instance) {
		$t =& peTheme();
		$t->template->data((object) $instance);
		$t->get_template_part("widget","logo");
	}


}
?>
