<?php

class PeThemeViewPortfolio extends PeThemeViewBlog {

	public function name() {
		return __pe("Portfolio Columns");
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
				  "layout" =>
				  array(
						"label"=>__pe("Layout"),
						"type"=>"Select",
						"description" => __pe("Show filters based on the selected criteria."),
						"options" => apply_filters("pe_theme_portfolio_layouts",
												   array(
														 __pe("Single column (no grid)")=>1,
														 __pe("2 Columns")=>2,
														 __pe("3 Columns")=>3,
														 __pe("4 Columns")=>4,
														 __pe("6 Columns")=>6
														 )),
						"default"=>apply_filters("pe_theme_portfolio_default_layout",3),
						),
				  "filterable" => 
				  array(
						"label"=>__pe("Filter by"),
						"type"=>"Select",
						"description" => __pe("Specify if the filter keywords are shown in this page. "),
						"options" => peTheme()->view->taxonomiesOptions(),
						"datatype" => "taxonomies",
						"default"=>""
						),
				  "pager" => 
				  array(
						"label"=>__pe("Paged Result"),
						"type"=>"RadioUI",
						"description" => __pe("Display a pager when more posts are found than specified in the 'Maximum' field. "),
						"options" => PeGlobal::$const->data->yesno,
						"default"=>"yes"
						)
				  );

		return $mbox;	
	}

	public function template($type = "") {
		if ($type != "empty") {
			peTheme()->get_template_part("view","portfolio");
			//peTheme()->get_template_part("view","portfolio-masonary");
		}
	}
}

?>
