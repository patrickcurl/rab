<?php

class PeThemeViewLayoutModuleAccordionItem extends PeThemeViewLayoutModuleTabsItem {

	public function messages() {
		return
			array(
				  "title" => "",
				  "type" => __pe("Item")
				  );
	}


	public function type() {
		return "Accordion";
	}

	public function group() {
		return "accordion";
	}

	public function tooltip() {
		return __pe("Use this block to add simple text content to the accordion.");
	}

}

?>
