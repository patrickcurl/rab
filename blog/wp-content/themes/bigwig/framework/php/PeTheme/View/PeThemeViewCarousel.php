<?php

class PeThemeViewCarousel extends PeThemeViewBlog {

	public function name() {
		return __pe("Carousel");
	}

	public function short() {
		return __pe("Carousel");
	}

	public function type() {
		return __pe("Carousel");
	}

	public function mbox() {
		$mbox = parent::mbox();

		$custom = 
			array(
				  "delay" => 
				  array(
						"label" => __pe("Delay"),
						"type" => "Select",
						"description" => __pe("Time in seconds before the slider rotates to next slide."),
						"options" => PeGlobal::$const->data->delay,
						"default" => 0
						),
				  "layout" =>
				  array(
						"label"=>__pe("Layout"),
						"type"=>"RadioUI",
						"description" => __pe("Number of items to show simultaneously."),
						"options" => 
						array(
							  __pe("1") =>1,
							  __pe("2") =>2,
							  __pe("3") =>3,
							  __pe("4") =>4,
							  __pe("5") =>5
							  ),
						"default"=>4
						),
				  "style" =>
				  array(
						"label"=>__pe("Style"),
						"type"=>"RadioUI",
						"description" => __pe("Carousel style."),
						"options" => 
						array(
							  __pe("Default") =>"",
							  __pe("Testimonials") =>"testimonials",
							  __pe("Logos") => "logos",
							  __pe("With More Button") => "more"
							  ),
						"default"=>""
						),
				  "height" =>
				  array(
						"label"=>__pe("Image Height"),
						"type"=>"Number",
						"description" => __pe("Image height."),
						"default"=>195
						),
				  "title" =>
				  array(
						"label"=>__pe("Title"),
						"type"=>"Text",
						"description" => __pe("Carousel Title."),
						"default"=>__pe("Carousel Title")
						),
				  "subtitle" =>
				  array(
						"label"=>__pe("Subtitle"),
						"type"=>"Text",
						"description" => __pe("Carousel Subtitle."),
						"default"=>'<a href="#">Go to portfolio</a>'
						),
				  "description" =>
				  array(
						"label"=>__pe("Description"),
						"type"=>"Text",
						"description" => __pe("Carousel Description."),
						"default"=>'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Phasellus hendrerit. Pellentesque aliquet nibh nec urna.'
						),
				  "chars" =>
				  array(
						"label"=>__pe("Excerpt"),
						"type"=>"Number",
						"description" => __pe("Excerpt length, in chars."),
						"default"=>60
						),
				 
				  
				  );

		// insert custom fields after 1st one of the parent (delay)
		$mbox["content"] = $custom;
		//array_merge($custom,$mbox["content"]);

		return $mbox;		
	}

	public function defaults() {

		$conf =& $this->conf;

		$t =& peTheme();

		if (!isset($conf->settings)) {
			$conf->settings = new StdClass();
		}

		$settings =& $conf->settings;

		$settings->cips = "ceppa";

		$sw = array(940,350,314,240,180); 
		$iw = array(940,460,420,420,420); 
		$rw = array(940,460,300,220,172);

		$idx = min(5,max(1,absint($settings->layout)))-1; 
		$iw = $iw[$idx];
		$sw = $sw[$idx];
		$rw = $rw[$idx];
		$h = $t->view->resized ? $t->media->h : $settings->height;
		$h = round($h*($iw/$rw));

		$settings->sw = $sw;
		$settings->w = $iw;
		$settings->h = $h;

	}


	public function template($type = '') {
		print('<div class="pe-container pe-block">');
		peTheme()->get_template_part("view","carousel");
		print('</div>');
	}
   
}

?>
