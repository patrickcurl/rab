<?php

class PeThemeViewLayoutModuleVideo extends PeThemeViewLayoutModuleView {

	public function messages() {
		return
			array(
				  "title" => __pe("Video"),
				  "type" => __pe("Video")
				  );
	}

	public function fields() {
		/*
		$fields = parent::fields();
		$fields["id"] =
			array(
				  "label" => __pe("Video"),
				  "description" => __pe("Select the video to be shown."),
				  "type" => "Select",
				  "options" => peTheme()->video->option(),
				  "editable" => admin_url('post.php?post=%0&action=edit')
				  );

		return $fields;
		*/

		return
			array(
				  "id" => 
				  array(
						"label" => __pe("Video"),
						"description" => __pe("Select the video to be shown."),
						"type" => "Select",
						"options" => peTheme()->video->option(),
						"editable" => admin_url('post.php?post=%0&action=edit')
						),
				  "margin" =>
				  array(
						"label" => __pe("Margins"),
						"description" => __pe("When set to <b>no</b>, content will have no bottom margin."),
						"type"=>"RadioUI",
						"options" => PeGlobal::$const->data->yesno,
						"default"=> "yes"
						)
				  );
		
	}

	public function name() {
		return __pe("Video");
	}

	public function option() {
		return "Video";
	}

	public function output($conf) {
		$settings = (object) $conf["data"];
		printf('<div class="pe-block pe-container%s">',($settings->margin === "no") ? " nomargin" : "");

		peTheme()->video->output($settings->id);

		/*
		$settings->view = "Video";
		$settings->data = (object) array("id" => $settings->id);
		peTheme()->view->resize($settings);
		*/

		print("</div>");
	}

	public function tooltip() {
		return __pe("Use this block to add a video media item to your layout. Video items are created separately.");
	}

}

?>
