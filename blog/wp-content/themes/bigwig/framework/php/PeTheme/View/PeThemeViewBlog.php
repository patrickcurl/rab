<?php

class PeThemeViewBlog extends PeThemeView {

	public function name() {
		return __pe("Blog");
	}

	public function short() {
		return __pe("Blog");
	}

	public function type() {
		return __pe("Blog");
	}
   
	public function supports($type) {
		return !in_array($type,array('gallery','layout'));
	}

	public function capability($cap) {
		return false;
	}

	public function mbox() {
		$mbox = parent::mbox();

		$mbox["content"] = 
			array(
				  "layout" =>
				  array(
						"label"=>__pe("Layout"),
						"type"=>"RadioUI",
						"description" => __pe("Select the required post layout."),
						"options" => PeGlobal::$config["blog"],
						"default"=>""
						),
				  "media" => 
				  array(
						"label"=>__pe("Show Media"),
						"type"=>"RadioUI",
						"description" => __pe("Specify if the post's image/video/gallery media is displayed."),
						"options" => PeGlobal::$const->data->yesno,
						"default"=>"yes"
						),
				  "pager" => 
				  array(
						"label"=>__pe("Paged Result"),
						"type"=>"RadioUI",
						"description" => __pe("Display a pager when more posts are found than specified in the 'Maximum' field. "),
						"options" => PeGlobal::$const->data->yesno,
						"default"=>"yes"
						),
				  );

		return $mbox;	
	}

	public function output($conf = null) {

		$t =& peTheme();

		if (empty($conf)) {
			$conf = $t->meta->getDefaultMboxValues(array("settings" => $this->mbox()));
			$conf->id = "";
		}
		
		parent::output($conf);

		$content =& $t->content;
		$settings =& $conf->settings;

		$custom = !empty($conf->data);
		$loop = $custom ? $t->data->customLoop($conf->data) : $t->content->have_posts();

		if ($loop) {
			$t->template->data($conf);

			$boxed = empty($conf->settings->layout) || $conf->settings->layout === "boxed";
			printf('<div class="%s">',$boxed ? "pe-container pe-block" : "pe-block");
			$this->template(empty($settings->layout) ? "" : $settings->layout);
			printf('</div>');

			if ($custom) {
				// if custom, reset the loop
				$content->resetLoop();
			}
		} else {
			$this->template("empty");
		}
	}

	public function template($type = "") {
		peTheme()->get_template_part("loop",$type);
	}
}

?>
