<?php

class PeThemeViewSliderVolo extends PeThemeView {

	public function name() {
		return __pe("Slider - Volo (swipe)");
	}

	public function short() {
		return __pe("Volo");
	}

	public function type() {
		return __pe("Slider");
	}

	public function supports($type) {
		return !in_array($type,array("post-ptable","content","layout"));
	}

	public function capability($cap) {
		return in_array($cap,array("captions","links"));
	}

	public function mbox() {
		$mbox = parent::mbox();
		$mbox["type"] = "Slider";
		$mbox["content"] = 
			array(
				  "delay" => 
				  array(
						"label" => __pe("Delay"),
						"type" => "Select",
						"description" => __pe("Time in seconds before the slider rotates to next slide."),
						"options" => PeGlobal::$const->data->delay,
						"default" => 0
						),
				  "autopause" =>
				  array(
						"label"=>__pe("Autopause"),
						"description" => __pe("Pause timer when mouse is over the slider."),
						"type"=>"RadioUI",
						"options" => 
						array(
							  __pe("Enabled")=>"enabled",
							  __pe("Disabled") => ""
							  ),
						"default"=>""
						),
				  "layout" =>
				  array(
						"label"=>__pe("Layout"),
						"description" => __pe("A boxed slider (default) behaves like a responsive image. A full width slider will always fill all the available width and upscale the image if smaller than slider area."),
						"type"=>"RadioUI",
						"options" => 
						array(
							  __pe("Boxed")=>"boxed",
							  __pe("Full Width") => "fullwidth"
							  ),
						"default"=>"boxed"
						),
				  "max" => 
				  array(
						"label" => __pe("Max height"),
						"type" => "Number",
						"description" => __pe("Maximum slider height."),
						"default" => 600
						),
				  "min" => 
				  array(
						"label" => __pe("Min height"),
						"type" => "Number",
						"description" => __pe("Minimum slider height."),
						"default" => 0
						)
				  );

		return $mbox;	
	}

	public function output($conf) {

		parent::output($conf);

		$t =& peTheme();

		$loop = $t->view->getViewLoop($conf);

		if ($loop) {
			$t->template->data($conf,$loop);
			$boxed = empty($conf->settings->layout) || $conf->settings->layout === "boxed";
			printf('<div class="%s">',$boxed ? "pe-container pe-block" : "pe-block");
			$this->template();
			printf('</div>');
		}
	}

	public function template() {
		peTheme()->get_template_part("view","slider-volo");
	}
	   
}

?>
