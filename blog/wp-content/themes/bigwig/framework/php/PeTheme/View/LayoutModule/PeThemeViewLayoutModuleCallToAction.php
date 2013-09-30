<?php

class PeThemeViewLayoutModuleCallToAction extends PeThemeViewLayoutModule {

	public function name() {
		return __pe("Call to Action");
	}

	public function messages() {
		return
			array(
				  "title" => "",
				  "type" => __pe("Call to Action")
				  );
	}

	public function fields() {
		return
			array(
				  "content" =>
				  array(
						"label" => __pe("Content"),
						"type" => "Editor",
						"description" => __pe("Content"),
						"default" => __pe('<h5>This is an action block, a kick-ass invitation to do something. <a href="#">Go Now <i class="icon-right-open-mini"></i></a></h5>')
						)
				  );
		
	}

	public function blockClass() {
		return "nomargin";
	}

	public function template() {
		peTheme()->get_template_part("viewmodule","calltoaction");
	}

	public function tooltip() {
		return __pe("Use this block to add a call to action banner to your layout. This banner consists of text content, such as a tagline, with an optional action button.");
	}


}

?>
