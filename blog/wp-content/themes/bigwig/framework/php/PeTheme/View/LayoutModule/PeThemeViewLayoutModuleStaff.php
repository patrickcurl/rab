<?php

class PeThemeViewLayoutModuleStaff extends PeThemeViewLayoutModuleServices {

	public function name() {
		return __pe("Staff");
	}

	public function messages() {
		return
			array(
				  "title" => "",
				  "type" => __pe("Staff")
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
						"default" => __pe("Meet the Team")
						),
				  "content" =>
				  array(
						"label" => __pe("Description"),
						"type" => "Editor",
						"description" => __pe("Section description, leave empty to hide."),
						"default" => ""
						),
				  "textpos" =>
				  array(
						"label" => __pe("Text Position"),
						"description" => __pe("Text content position in regards to image."),
						"type"=>"RadioUI",
						"options" => 
						array(
							  __pe("Next the image") => "right",
							  __pe("Below the image") => "bottom"
							  ),
						"default"=> "bottom"
						),
				  "id" => 
				  array(
						"label"=>__pe("Staff"),
						"type"=>"Links",
						"description" => __pe("Add one or more staff member."),
						"options" => peTheme()->staff->option(),
						"sortable" => true,
						"default"=>""
						)
				  );
		
	}

	public function postType() {
		return "staff";
	}

	public function blockClass() {
		return "";
	}

	public function templateName() {
		return "staff";
	}

	public function tooltip() {
		return __pe("Use this block to add a staff member profile to your layout. Additional info about the staff member may be input here but staff member profile images, position titles and social media links are created separately. ");
	}

}

?>
