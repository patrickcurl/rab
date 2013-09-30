<?php

class PeThemeViewLayout extends PeThemeView {

	public function name() {
		return __pe("Layout - Manager");
	}

	public function short() {
		return __pe("Layout Manager");
	}

	public function type() {
		return __pe("Layout");
	}

	public function supports($type) {
		return $type == "layout";
	}

	public function capability($cap) {
		return false;
	}

	public function mbox() {

		$views = array();

		// modules
		foreach (peTheme()->view->views() as $view) {
			if ($view->capability("layout")) {
				$type = $view->type();
				if ($type) {
					$views[$type][] = $view;
				}
			}
		}

		$mbox =
			array(
				  "title" => __pe("Layout Manager"),
				  "type" => "",
				  "priority" => "core",
				  "where" =>
				  array(
						"post" => "all"
						),
				  "content" =>
				  array(
						"builder" =>
						array(
							  "type" => "Layout",
							  "views" => $views,
							  "groups" => true
							  )
						)
				  );		

		return $mbox;	
	}

	public function output($conf) {
		$v =& peTheme()->view;

		if (empty($conf->settings->builder["items"])) return;

		printf('<div class="pe-block pe-view-layout pe-view-%s">',$conf->id);
		foreach($conf->settings->builder["items"] as $item) {
			$v->outputModule($item);
		} 
		echo "</div>";
			   
	}

}

?>
