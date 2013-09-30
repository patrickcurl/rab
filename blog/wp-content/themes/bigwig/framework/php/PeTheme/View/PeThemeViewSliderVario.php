<?php

class PeThemeViewSliderVario extends PeThemeViewSliderVolo {

	public function name() {
		return __pe("Slider - Vario (CSS animations / video)");
	}

	public function short() {
		return __pe("Vario");
	}

	public function mbox() {
		$mbox = parent::mbox();

		$custom = 
			array(
				  "transition" =>
				  array(
						"label"=>__pe("Transition"),
						"type"=>"Select",
						"description" => __pe("Transition type"),
						"options" => 
						array(
							  __pe("Fade") =>"fade",
							  __pe("Random") =>"random",
							  __pe("Block Fade") =>"blockfade",
							  __pe("Fall") =>"fall",
							  __pe("Domino") =>"domino",
							  __pe("Flip") =>"flip",
							  __pe("Reveal Right") =>"revealR",
							  __pe("Reveal Left") =>"revealL",
							  __pe("Reveal Bottom") =>"revealB",
							  __pe("Reveal Top") =>"revealT",
							  __pe("Saw") =>"saw",
							  __pe("Scale") =>"scale",
							  __pe("Bars") =>"bars",
							  __pe("Zoom") =>"zoom",
							  __pe("Drop") =>"drop"
							  ),
						"default"=>"fade"
						),
				  "bg" =>
				  array(
						"label"=>__pe("Background"),
						"description" => __pe("Whether to use  slide images as background or a video."),
						"type"=>"RadioUI",
						"options" => 
						array(
							  __pe("Images")=>"images",
							  __pe("Video") => "video"
							  ),
						"default"=>"images"
						),
				  "video" =>
				  array(
						"label"=>__pe("Video"),
						"type"=>"UploadLink",
						"description" => __pe("The video must be available in both ogv and mp4 formats, for instance, if the video is called 'background.mp4', then 'background.ogv' must also be uploaded."),
						"default"=>""
						),
				  "loop" =>
				  array(
						"label"=>__pe("Loop"),
						"description" => __pe("Restart video once playback ends."),
						"type"=>"RadioUI",
						"options" => 
						array(
							  __pe("Enabled")=>"enabled",
							  __pe("Disabled") => ""
							  ),
						"default"=>""
						),
				  "fallback" =>
				  array(
						"label"=>__pe("Fallback"),
						"type"=>"Upload",
						"description" => __pe("When a background video is set, the fallback image will be shown in browsers that lack native video support (like older version of MSIE)."),
						"default"=>""
						)
				  );

		// insert custom fields after 1st one of the parent (delay)
		$mbox["content"] = array_merge($custom,$mbox["content"]);

		return $mbox;
		
	}

	public function template() {
		peTheme()->get_template_part("view","slider-vario");
	}
   
}

?>
