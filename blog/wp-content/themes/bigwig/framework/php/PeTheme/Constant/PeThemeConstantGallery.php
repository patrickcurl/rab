<?php

class PeThemeConstantGallery {
	public $id;
	public $metabox;
	public $all;

	public function __construct() {
		$this->all =& peTheme()->gallery->option();
		$this->id =
			array(
				  "label"=>__pe("Use Gallery"),
				  "type"=>"Select",
				  "description" => __pe("Select which gallery to use as content. For a gallery to appear in this list it must first be created. See the help documentation section on 'Creating a Gallery Custom Post Type'"),
				  "options" => $this->all,
				  "default"=>""
				  );
		

		$this->metaboxSlider = 
			array(
				  "title" => __pe("Slider Options"),
				  "priority" => "core",
				  "where" =>
				  array(
						"page" => "page-home"
						),
				  "content" =>
				  array(
						"id" => $this->id
						)
				  );

		$mbc =& $this->metaboxSlider["content"];

		if (isset($sliderOptions)) {
			$this->metaboxSlider["content"] =& array_merge($mbc,$sliderOptions);
			$mbc =& $this->metaboxSlider["content"];
		}

		$mbc["delay"] = 
				  array(
						"label" => __pe("Delay"),
						"type" => "Select",
						"description" => __pe("Time in seconds before the slider rotates to next slide"),
						"options" => PeGlobal::$const->data->delay,
						"default" => 0
						);


	}
	
}

?>