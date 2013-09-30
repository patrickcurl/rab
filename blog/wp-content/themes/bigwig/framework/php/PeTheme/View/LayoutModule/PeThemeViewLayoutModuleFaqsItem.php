<?php

class PeThemeViewLayoutModuleFaqsItem extends PeThemeViewLayoutModuleTabsItem {

	public function messages() {
		return
			array(
				  "title" => "",
				  "type" => __pe("FAQ")
				  );
	}

	public function fields() {
		$fields = parent::fields();
		return 
			array(
				  "title" => $fields["title"],
				  "closed" => 
				  array(
						"label" => __pe("Closed"),
						"type"=>"RadioUI",
						"options" => PeGlobal::$const->data->yesno,
						"default"=> "yes"
						),
				  "content" => $fields["content"]
				  );
	}


	public function type() {
		return "FAQs";
	}

	public function group() {
		return "faqs";
	}

	public function tooltip() {
		return __pe("Use this block to add simple text content to the FAQ item.");
	}

}

?>
