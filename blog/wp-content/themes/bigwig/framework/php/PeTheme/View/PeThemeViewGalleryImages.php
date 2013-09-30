<?php

class PeThemeViewGalleryImages extends PeThemeViewGallery {


	public function name() {
		return __pe("Gallery - Images (flare lightbox)");
	}

	public function short() {
		return __pe("Images");
	}

	public function mbox() {
		$mbox = parent::mbox();
		unset($mbox["content"]["max"]);
		return $mbox;	
	}

	public function template() {
		peTheme()->get_template_part("view","gallery-images");
	}


   
}

?>
