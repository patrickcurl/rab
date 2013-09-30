<?php

class PeThemeConstantVideo {

	public $all;
	public $metaboxPost;
	public $fields;


	public function __construct() {
		$this->all = peTheme()->video->option();

		$this->fields = new StdClass;

		$description = current($this->all) < 0 ? sprintf(__pe('<a href="%s">Create a new Video</a>'),admin_url('post-new.php?post_type=video')) : __pe("Select which video to use");

		$this->fields->id = 
			array(
				  "label"=>__pe("Use video"),
				  "type"=>"Select",
				  "description" => $description,
				  "options" => $this->all,
				  "default"=>""
				  );		

		$this->metaboxPost = 
			array(
				  "title" => __pe("Video Options"),
				  "where" =>
				  array(
						"post" => "video"
						),
				  "content" =>
				  array(
						"id" => $this->fields->id
						)
				  );
	}
	
}

?>