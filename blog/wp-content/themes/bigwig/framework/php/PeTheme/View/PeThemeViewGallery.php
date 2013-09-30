<?php

class PeThemeViewGallery extends PeThemeView {


	public function type() {
		return __pe("Gallery");
	}

	public function supports($type) {
		return !in_array($type,array("post-ptable","content","layout"));
	}

	public function mbox() {
		$mbox = parent::mbox();
		$mbox["type"] = "GalleryPost";

		$mbox["content"] = 
			array(
				  "max" => 
				  array(
						"label"=>__pe("Thumbnails"),
						"type"=>"Text",
						"description" => __pe("Maximum number of thumbnails to show in the main page. Regardless this setting, all gallery images would still be shown inside the lightbox window."),
						"default"=>"1000"
						),
				  "type" => 
				  array(
						"label"=>__pe("Lightbox Gallery Transition"),
						"type"=>"Select",
						"description" => __pe("Choose image transition when viewed inside the lightbox: <strong>Slide</strong> Slides left/right. <strong>Shutter</strong> Black and white zoom effect."),
						"options" => 
						array(
							  __pe("Slide")=>"default",
							  __pe("Shutter")=>"shutter",
							  ),
						"default"=>"default"
						),
				  "bw" => 
				  array(
						"label"=>__pe("Black & White"),
						"type"=>"RadioUI",
						"description" => __pe("Enable Black & White effect."),
						"options" => 
						array(
							  __pe("yes")=>"yes",
							  __pe("no")=>"no",
							  ),
						"default"=>"no"
						),
				  "scale" =>
				  array(
						"label"=>__pe("Scale Mode"),
						"type"=>"Select",
						"section"=>__pe("General"),
						"description" => __pe("This setting determins how the images are scaled / cropped when displayed in the browser window.\"<strong>Fit</strong>\" fits the whole image into the browser ignoring surrounding space.\"<strong>Fill</strong>\" fills the whole browser area by cropping the image if necessary. The Max version will also upscale the image."),
						"options" => array(
										   __pe("Fit")=>"fit",
										   __pe("Fit (Max)")=>"fitmax",
										   __pe("Fill")=>"fill",
										   __pe("Fill (Max)")=>"fillmax"
										   ),
						"default"=>"fit"
						)
				  );

		return $mbox;	
	}

	public function defaults() {

		$conf =& $this->conf;

		if (!isset($conf->settings)) {
			$conf->settings = new StdClass();
		}

		$settings =& $conf->settings;
		
		$settings->type = isset($settings->type) && $settings->type ? $settings->type : "default";
		$settings->max = isset($settings->max) ? intval($settings->max) : 0;
		$settings->scale = isset($settings->scale) && $settings->scale ? $settings->scale : "fit";
		$settings->bw = isset($settings->bw) && $settings->bw === "yes" && $settings->type === "shutter" ? true : false;

	}

	public function capability($cap) {
		return $cap === "captions";
	}

	public function output($conf) {

		parent::output($conf);

		$t =& peTheme();

		$loop = $t->view->getViewLoop($conf);

		if ($loop) {
			$t->template->data($conf,$loop);
			$this->template();
		}
	}

	public function template() {
	}   
}

?>
