<?php

class PeThemeViewPortfolioList extends PeThemeViewBlog {

	public function name() {
		return __pe("Portfolio List");
	}
	
	public function short() {
		return __pe("Portfolio");
	}

	public function type() {
		return __pe("Portfolio");
	}

	public function mbox() {
		$mbox = parent::mbox();
		
		$mbox["content"] = 
			array(
				  "pager" => 
				  array(
						"label"=>__pe("Paged Result"),
						"type"=>"RadioUI",
						"description" => __pe("Display a pager when more posts are found than specified in the 'Maximum' field. "),
						"options" => PeGlobal::$const->data->yesno,
						"default"=>"no"
						)
				  );

		return $mbox;	
	}

	public function template($type = "") {
		if ($type != "empty") {
			peTheme()->get_template_part("view","portfolio-list");
		}
	}
}

?>
