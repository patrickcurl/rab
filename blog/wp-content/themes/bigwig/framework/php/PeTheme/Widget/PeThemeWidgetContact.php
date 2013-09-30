<?php

class PeThemeWidgetContact extends PeThemeWidget {

	public function __construct() {
		$this->name = __pe("Pixelentity - Contact");
		$this->description = __pe("Contact Info");
		$this->wclass = "widget_contact";

		$this->fields = array(
							  "title" => 
							  array(
									"label"=>__pe("Title"),
									"type"=>"Text",
									"description" => __pe("Widget Title."),
									"default"=>__pe("Contact Info")
									),
							  "info" => 
							  array(
									"label"=>__pe("Details"),
									"type"=>"Items",
									"section"=>__pe("Header"),
									"description" => __pe("Add one or more contact info to the widget."),
									"button_label" => __pe("Add New Contact Info"),
									"sortable" => true,
									"auto" => "icon-info-circled",
									"unique" => false,
									"editable" => false,
									"legend" => false,
									"fields" => 
									array(
										  array(
												"label" => __pe("Icon"),
												"name" => "icon",
												"type" => "icon",
												"width" => 100,
												"default" => "icon-bookmarks"
												),
										  array(
												"name" => "content",
												"type" => "textarea",
												"width" => 190,
												"height" => 60,
												"default" => "Mon-Fri: 9:00-18:00"
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
		$t->get_template_part("widget","contact");
	}


}
?>
