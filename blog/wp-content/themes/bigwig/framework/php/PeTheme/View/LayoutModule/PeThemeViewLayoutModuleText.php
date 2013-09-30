<?php

class PeThemeViewLayoutModuleText extends PeThemeViewLayoutModule {

	public function name() {
		return __pe("Text");
	}

	public function messages() {
		return
			array(
				  "title" => "",
				  "type" => __pe("Text")
				  );
	}

	public function fields() {
		return
			array(
				  "content" =>
				  array(
						"label" => "Content",
						"type" => "Editor",
						"noscript" => true,
						"description" => __pe("Content"),
						"default" => ""
						)
				  );
		
	}

	public function output($conf) {
		printf('<div class="pe-block pe-view-layout-block pe-view-layout-block-%s">%s</div>',$conf["bid"],do_shortcode(apply_filters("the_content",$conf["data"]["content"])));
	}

	public function tooltip() {
		return __pe("Use this block to add simple text content to your layout. Simple HTML markup is also supported. The WordPress editor may be used to create this text by clicking the 'Edit with the HTML Editor' link located just under the input field.");
	}

}

?>
