<?php

class PeThemeViewLayoutModuleView extends PeThemeViewLayoutModule {

	public function messages() {
		return
			array(
				  "title" => __pe("View"),
				  "type" => __pe("View")
				  );
	}

	public function fields() {
		return
			array(
				  "id" => 
				  array(
						"label" => __pe("View"),
						"description" => __pe("Select the view to be shown."),
						"type" => "Select",
						"groups" => true,
						"options" => peTheme()->view->option(),
						"editable" => admin_url('post.php?post=%0&action=edit')
						),
				  "margin" =>
				  array(
						"label" => __pe("Margins"),
						"description" => __pe("When set to <b>no</b>, content will have no bottom margin."),
						"type"=>"RadioUI",
						"options" => PeGlobal::$const->data->yesno,
						"default"=> "yes"
						),
				  "width" =>
				  array(
						"label"=>__pe("Media Width"),
						"type"=>"Number",
						"description" => __pe("Leave empty to use default width."),
						"default"=> ""
						),
				  "height" =>
				  array(
						"label"=>__pe("Media Height"),
						"type"=>"Number",
						"description" => __pe("Leave empty to avoid image cropping. In this case, slider based views will require all the (original) images to have the same size to work correctly."),
						"default"=> ""
						)
				  );
		
	}

	public function name() {
		return __pe("View");
	}

	public function option() {
		return "View";
	}

	public function output($conf) {
		$settings = (object) $conf["data"];
		printf('<div class="pe-block%s">',($settings->margin === "no") ? " nomargin" : "");
		peTheme()->view->resize($settings);
		print("</div>");
	}

	public function tooltip() {
		return __pe("Use this block to add a component to your layout. Components are usually made of complex dynamic media such as portfolio grids or carousels. These components are created separately.");
	}

}

?>
