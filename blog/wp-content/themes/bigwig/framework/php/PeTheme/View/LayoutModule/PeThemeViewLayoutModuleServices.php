<?php

class PeThemeViewLayoutModuleServices extends PeThemeViewLayoutModule {

	public $loop = false;

	public function name() {
		return __pe("Services");
	}

	public function messages() {
		return
			array(
				  "title" => "",
				  "type" => __pe("Services")
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
						"default" => __pe("Our Services")
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
						"label"=>__pe("Services"),
						"type"=>"Links",
						"description" => __pe("Add one or more service."),
						"options" => peTheme()->service->option(),
						"sortable" => true,
						"default"=>""
						)
				  );
		
	}

	public function blockClass() {
		return "";
	}

	public function postType() {
		return "service";
	}

	public function templateName() {
		return "services";
	}

	public function setTemplateData() {

		$t =& peTheme();

		if (empty($this->data->id)) return;
		$id = $this->data->id;

		if (!is_array($id)) {
			$id = array($id);
		}

		$settings = 
			array(
				  "post_type" => $this->postType(),
				  "id"=>$id
				  );

		$this->loop = $t->data->customLoop((object) $settings);
		$t->template->data($this->data);
	}


	public function template() {
		if ($this->loop) {
			$t =& peTheme();
			$t->get_template_part("viewmodule",$this->templateName());
			$t->content->resetLoop();
		}
	}

	public function tooltip() {
		return __pe("Use this block to add a services module to your layout. A services module consists of a block with a title and introduction text area. Below this a number of services items may be added in rows of 2. Service items are created separately.");
	}


}

?>
