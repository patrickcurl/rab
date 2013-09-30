<?php

class PeThemeViewLayoutModulePricingTable extends PeThemeViewLayoutModuleColumns {

	public $labels;
	public $low;
	public $high;
	public $cc = array("two-col","two-col","three-col","four-col","five-col","five-col");


	public function messages() {
		return
			array(
				  "title" => "",
				  "type" => __pe("Pricing Table")
				  );
	}

	public function fields() {
		return 
			array(
				  "labels" =>				
				  array(
						"label"=>__pe("Show Labels"),
						"type"=>"RadioUI",
						"description"=>__pe('If set to "YES", the first table will be used to show property labels.'),
						"options" => Array(__pe("Yes")=>"yes",__pe("No")=>"no"),
						"default"=>"no"
						),
				  "starter" => 
				  array(
						"label"=>__pe("Starter"),
						"type"=>"RadioUI",
						"description" => __pe('Which table should be highlighted as "Starter" pack, "1" = highlight first table.'),
						"options" => 
						array(
							  __pe("None") => 0,
							  "1" => 1,
							  "2" => 2,
							  "3" => 3,
							  "4" => 4,
							  "5" => 5,
							  ),
						"default"=> 0
						),
				  "popular" => 
				  array(
						"label"=>__pe("Popular"),
						"type"=>"RadioUI",
						"description" => __pe('Which table should be highlighted as "Popular" pack, "1" = highlight first table.'),
						"options" => 
						array(
							  __pe("None") => 0,
							  "1" => 1,
							  "2" => 2,
							  "3" => 3,
							  "4" => 4,
							  "5" => 5,
							  ),
						
						"default"=> 0
						)
				  );
	}


	public function name() {
		return __pe("Pricing Table");
	}

	public function create() {
		return "PricingColumn";
	}

	public function force() {
		return "PricingColumn";
	}

	public function allowed() {
		return "pricingcolumn";
	}

	public function blockClass() {
		return "pe-container ";
	}

	public function rowClass($cols) {
		$rc = parent::rowClass($cols);

		$cols = $cols > count($this->cc) ? count($this->cc) : $cols; 
		$cc = $this->cc[$cols-1];
		return "$rc pricing-table $cc";
	}

	public function colClass($cl,$idx,$cols) {

		$idx += ($this->labels ? 0 : 1);

		if ($this->labels && $idx === 0) {
			$cl="row-titles";
		} else if ($idx === $this->high) {
			$cl="high";
		} else if ($idx === $this->low) {
			$cl="low";
		}

		return "col $cl";
	}

	public function template() {
		$data = (object) $this->conf->data;
		$this->labels = (empty($data->labels) || $data->labels === "yes");
		$this->low = empty($data->starter) ? false : absint($data->starter);
		$this->high = empty($data->popular) ? false : absint($data->popular);
		parent::template();
	}

	public function tooltip() {
		return __pe("Use this block to add a pricing table module to your layout. A pricing table consists of a column based table of pricing information relating to your products or services. A pricing table may also display an optional column of row titles on the left side.");
	}


}

?>
