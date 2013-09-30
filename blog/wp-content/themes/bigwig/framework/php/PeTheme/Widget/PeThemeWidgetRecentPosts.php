<?php

class PeThemeWidgetRecentPosts extends PeThemeWidget {

	public function __construct() {
		$this->name = __pe("Pixelentity - Recent posts");
		$this->description = __pe("The most recent posts on your site");
		$this->wclass = "pe_widget widget_recent_entries";

		$this->fields = array(
							  "title" => 
							  array(
									"label"=>__pe("Title"),
									"type"=>"Text",
									"description" => __pe("Widget title"),
									"default"=>"Recent Posts"
									),
							  "link" => 
							  array(
									"label"=>__pe("Blog Link"),
									"type"=>"Text",
									"description" => __pe("Blog link text. If empty, no link will be shown."),
									"default"=>"Visit The Blog"
									),
							  "url" => 
							  array(
									"label"=>__pe("Blog Link Url"),
									"type"=>"Text",
									"description" => __pe("Blog url. If empty, theme will try to autodetect."),
									"default"=>""
									),
							  "count" => 
							  array(
									"label"=>__pe("Number Of Posts"),
									"type"=>"RadioUI",
									"description" => __pe("Select the number of recent posts to show in this widget."),
									"single" => true,
									"options" => range(1,10),
									"default"=>2
									),
							  "chars" => 
							  array(
									"label"=>__pe("Excerpt Length"),
									"type"=>"Text",
									"description" => __pe("Excerpt lenght in characters. This number is then rounded so as not to cut a word."),
									"default"=>130
									)
							 
							  );
		

		parent::__construct();
	}

	public function getContent(&$instance) {
		$t =& peTheme();
		$t->template->data((object) $instance);
		$loop = $t->content->customLoop("post",empty($instance["count"]) ? 1 : intval($instance["count"]));
		$t->get_template_part("widget","recentposts");
		if ($loop) {
			$t->content->resetLoop();
		}

	}


}
?>
