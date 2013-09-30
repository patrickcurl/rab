<?php

class PeThemeViewLayoutModuleFeaturedProject extends PeThemeViewLayoutModuleServices {

	public function name() {
		return __pe("Featured Project");
	}

	public function messages() {
		return
			array(
				  "title" => "",
				  "type" => __pe("Featured")
				  );
	}

	public function fields() {
		return
			array(
				  "id" =>
				  array(
						"label"=>__pe("Project"),
						"type"=>"Select",
						"description" => __pe("Select the featured project."),
						"options" => peTheme()->project->option(),
						"default"=>""
						)
				  );
		
	}

	public function postType() {
		return "project";
	}

	public function blockClass() {
		return "";
	}

	public function templateName() {
		return "featured";
	}

	public function tooltip() {
		return __pe("Use this block to add featured project section to your layout. This section accepts one project, the content of which is displayed in this full width block.");
	}

}

?>
