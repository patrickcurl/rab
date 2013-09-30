<?php

class PeThemeViewLayoutModuleGmap extends PeThemeViewLayoutModule {

	public function name() {
		return __pe("Google Map");
	}

	public function messages() {
		return
			array(
				  "title" => "",
				  "type" => __pe("Google Map")
				  );
	}

	public function fields() {
		return
			array(
				  "title" => 	
				  array(
						"label"=>__pe("Map Marker Title"),
						"type"=>"Text",
						"description" => __pe("Enter a title for the map marker flyout"),
						"default"=>'Custom title here'
						),
				  "description" => 	
				  array(
						"label"=>__pe("Map Marker Description"),
						"type"=>"TextArea",
						"description" => __pe("Enter a description for the map marker flyout"),
						"default"=>'Custom description here'
						),
				  "layout" =>
				  array(
						"label"=>__pe("Layout"),
						"description" => __pe("Map container layout."),
						"type"=>"RadioUI",
						"options" => 
						array(
							  __pe("Boxed")=>"boxed",
							  __pe("Full Width") => "fullwidth"
							  ),
						"default"=>"boxed"
						),
				  "latitude" => 	
				  array(
						"label"=>__pe("Latitude"),
						"type"=>"Text",
						"description" => __pe("Latitudinal location for the map center. See the help documentation for a link to a utility used to convert addresses into lat/long numbers"),
						"default"=>'51.50813'
						),
				  "longitude" => 	
				  array(
						"label"=>__pe("Longitude"),
						"type"=>"Text",
						"description" => __pe("Longitudinal location for the map center. See the help documentation for a link to a utility used to convert addresses into lat/long numbers"),
						"default"=>'-0.12801'
						),
				  "zoom" => 	
				  array(
						"label"=>__pe("Zoom Level"),
						"type"=>"Text",
						"description" => __pe("Enter the zoom level of the map upon page load. The user is then free to adjust this zoom level using the map UI"),
						"default"=>'12'
						)
				  );
		
	}

	public function blockClass() {
		return empty($this->data->layout) || $this->data->layout != "fullwidth" ? "" : "pe-escape-container";
	}


	public function template() {
		peTheme()->get_template_part("viewmodule","gmap");
	}

	public function tooltip() {
		return __pe("Use this block to add a Google Maps module to your layout. Woth this module you may specify the lattitude, longitude and zoom level of the displayed map.");
	}


}

?>
