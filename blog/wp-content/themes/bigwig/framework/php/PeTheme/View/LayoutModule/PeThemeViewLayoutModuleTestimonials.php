<?php

class PeThemeViewLayoutModuleTestimonials extends PeThemeViewLayoutModuleServices {

	public function name() {
		return __pe("Testimonials");
	}

	public function messages() {
		return
			array(
				  "title" => "",
				  "type" => __pe("Testimonials")
				  );
	}

	public function fields() {
		return
			array(
				  "title" =>
				  array(
						"label" => __pe("Title"),
						"type" => "Text",
						"description" => __pe("Section title, leave empty to hide."),
						"default" => __pe("What Others Are Saying")
						),
				  "content" =>
				  array(
						"label" => __pe("Description"),
						"type" => "Editor",
						"description" => __pe("Section description, leave empty to hide."),
						"default" => ""
						),
				  "id" => 
				  array(
						"label"=>__pe("Testimonials"),
						"type"=>"Links",
						"description" => __pe("Add one or more testimonial."),
						"options" => peTheme()->testimonial->option(),
						"sortable" => true,
						"default"=>""
						)
				  );
		
	}

	public function postType() {
		return "testimonial";
	}

	public function blockClass() {
		return "";
	}

	public function templateName() {
		return "testimonials";
	}

	public function tooltip() {
		return __pe("Use this block to add a testimonial module to your layout. This module consists of a title, description followed by multiple testimonials or quotations arranged in rows of 2. The testimonial items are created separately.");
	}

}

?>
