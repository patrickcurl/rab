<?php

class PeThemeViewLayoutModuleAccordion extends PeThemeViewLayoutModuleTabs {

	public function messages() {
		return
			array(
				  "title" => "",
				  "type" => __pe("Accordion")
				  );
	}

	public function name() {
		return __pe("Accordion");
	}

	public function allowed() {
		return "accordion";
	}

	public function create() {
		return "AccordionItem";
	}

	public function prefix() {
		return "accordion";
	}

	public function tooltip() {
		return __pe("Use this block to add an accordion component to your layout.");
	}


}

?>
