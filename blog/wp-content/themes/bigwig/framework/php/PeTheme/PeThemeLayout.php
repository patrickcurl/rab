<?php

class PeThemeLayout {

	public $master;
	public $mbox;
	public $def;
	public $force;

	public function __construct($master) {
		$this->master =& $master;

		$this->mbox =
			array(
				  "title" => __pe('Page Layout'),
				  "type" => 'Layout',
				  "priority" => "core",
				  "context" => "side",
				  "where" =>
				  array(
						"post" => "all"
						),
				  "content" =>
				  array(
						"fullscreen" =>
						array(
							  "label" => __pe("Fullscreen"),
							  "type"=>"RadioUI",
							  "options" => PeGlobal::$const->data->yesno,
							  "default"=> "no"
							  ),
						"title" =>
						array(
							  "label" => __pe("Title"),
							  "type"=>"RadioUI",
							  "options" => PeGlobal::$const->data->yesno,
							  "default"=> "yes"
							  ),
						"headerMargin" =>
						array(
							  "label" => __pe("Header Margin"),
							  "type"=>"RadioUI",
							  "options" => PeGlobal::$const->data->yesno,
							  "default"=> "yes"
							  ),
						"content" =>
						array(
							  "label" => __pe("Content Area"),
							  "type"=>"RadioUI",
							  "options" => 
							  array(
									__pe("Boxed")=>"boxed",
									__pe("Full Width") => "fullwidth"
									),
							  "default"=> "boxed"
							  ),
						"sidebar" =>
						array(
							  "label" => __pe("Sidebar"),
							  "type"=>"RadioUI",
							  "options" => 
							  array(
									__pe("None")=>"",
									__pe("Right") => "right"
									),
							  "default"=> is_single() || is_page() ? "" : "right"
							  ),
						"widgets" =>
						array(
							  "label"=>__pe("Widgets"),
							  "type"=>"Select",
							  "options" => $this->master->sidebar->option(),
							  "default"=> "default"
							  ),
						"footerMargin" =>
						array(
							  "label" => __pe("Footer Margin"),
							  "type"=>"RadioUI",
							  "options" => PeGlobal::$const->data->yesno,
							  "default"=> "yes"
							  ),
						"footerStyle" =>
						array(
							  "label"=>__pe("Footer Style"),
							  "type"=>"RadioUI",
							  "options" => 
							  array(
									__pe("Default") => "",
									__pe("Small") => "small"
									),
							  "default"=> ""
							  )
						)
				  );

		
		$this->def = new stdClass();
		$this->force = new stdClass();
		
		foreach ($this->mbox["content"] as $option=>$data) {
			$this->def->$option = isset($data["default"]) ? $data["default"] : null;
		}

	}

	public function __get($what) {

		$ret = false;

		if (isset($this->force->$what)) {
			return $this->force->$what;
		} else {

			$meta = $this->master->content->meta();
			
			$layout = isset($meta) && isset($meta->layout) ? $meta->layout : $this->def;
			$layout = apply_filters("pe_theme_page_layout",$layout);

			if (isset($layout->$what)) {
				$ret = $layout->$what;
			}
		}

		return apply_filters("pe_theme_page_layout_$what",$ret);

	}

	public function __set($what,$value) {
		$this->force->$what = $value;
	}


}

?>