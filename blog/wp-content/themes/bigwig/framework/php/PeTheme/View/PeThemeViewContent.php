<?php

class PeThemeViewContent extends PeThemeView {

	public function name() {
		return __pe("Content");
	}

	public function short() {
		return __pe("Content");
	}

	public function type() {
		return "Content";
	}

	public function supports($type) {
		return $type == "content";
	}

	public function capability($cap) {
		return false;
	}

	public function mbox() {


		$mbox = parent::mbox();

		$mbox["content"] = 
			array(
				  "delay" => 
				  array(
						"label" => __pe("Delay"),
						"type" => "Select",
						"description" => __pe("Time in seconds before the slider rotates to next slide"),
						"options" => PeGlobal::$const->data->delay,
						"default" => 0
						),
				  );

		return $mbox;	
	}

	public function output($conf) {
		$t =& peTheme();

		$loop = $t->slider->getSliderLoop($conf);

		if ($loop) {
			$t->template->data($conf,$loop);
			$this->template();
		}
	}

	public function template() {
		peTheme()->get_template_part("slider","volo");
	}


   
}

?>
