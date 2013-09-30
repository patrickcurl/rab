<?php

class PeThemeViewGalleryCover extends PeThemeViewGallery {


	public function name() {
		return __pe("Gallery - Cover (flare lightbox)");
	}

	public function short() {
		return __pe("Cover");
	}

	public function mbox() {
		$mbox = parent::mbox();
		unset($mbox["content"]["max"]);
		return $mbox;	
	}

	public function template() {
		peTheme()->get_template_part("view","gallery-cover");
	}


   
}

?>
