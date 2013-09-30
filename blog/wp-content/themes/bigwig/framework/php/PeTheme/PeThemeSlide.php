<?php

class PeThemeSlide {

	protected $master;
	protected $fields;

	public function __construct(&$master) {
		$this->master =& $master;
	}

	public function registerAssets() {
		PeThemeAsset::addScript("framework/js/pe/jquery.pixelentity.utils.geom.js",array("jquery"),"pe_theme_utils_geom");
		PeThemeAsset::addScript("framework/js/pe/jquery.pixelentity.transform.js",array("jquery"),"pe_theme_transform");
		PeThemeAsset::addScript("framework/js/admin/jquery.theme.slide.js",array("pe_theme_utils","pe_theme_utils_geom","pe_theme_transform","editor","json2"),"pe_theme_slide");
		
		// prototype.js alters JSON2 behaviour, it shouldn't be loaded in our admin page anyway but
		// if other plugins are forcing it in all wordpress admin pages, we get rid of it here.
		wp_deregister_script("prototype");
	}

	public function cpt() {
		$cpt = 
			array(
				  'labels' => 
				  array(
						'name'              => __pe("Slides"),
						'singular_name'     => __pe("Slide"),
						'add_new_item'      => __pe("Add New Slide"),
						'search_items'      => __pe('Search Slides'),
						'popular_items' 	  => __pe('Popular Slides'),		
						'all_items' 		  => __pe('All Slides'),
						'parent_item' 	  => __pe('Parent Slide'),
						'parent_item_colon' => __pe('Parent Slide:'),
						'edit_item' 		  => __pe('Edit Slide'), 
						'update_item' 	  => __pe('Update Slide'),
						'add_new_item' 	  => __pe('Add New Slide'),
						'new_item_name' 	  => __pe('New Slide Name')
						),
				  'public' => true,
				  'has_archive' => false,
				  //"supports" => array("title","editor","thumbnail"),
				  "supports" => array("title","thumbnail"),
				  "taxonomies" => array("post_format")
				  );

		PeGlobal::$config["post_types"]["slide"] = $cpt;
		//PeGlobal::$config["post-formats-slide"] = array("gallery");

		$transitions = array("bounceIn", "bounceInDown", "bounceInLeft", "bounceInRight", "bounceInUp", "bounceOut", "bounceOutDown", "bounceOutLeft", "bounceOutRight", "bounceOutUp", "fadeIn", "fadeInDownBig", "fadeInDown", "fadeInLeftBig", "fadeInLeft", "fadeInRightBig", "fadeInRight", "fadeInUpBig", "fadeInUp", "fadeOut", "fadeOutDownBig", "fadeOutDown", "fadeOutLeftBig", "fadeOutLeft", "fadeOutRightBig", "fadeOutRight", "fadeOutUpBig", "fadeOutUp", "flash", "flip", "flipInX", "flipInY", "flipOutX", "flipOutY", "hinge", "lightSpeedIn", "lightSpeedOut", "pulse", "rollIn", "rollOut", "rotateIn", "rotateInDownLeft", "rotateInDownRight", "rotateInUpLeft", "rotateInUpRight", "rotateOut", "rotateOutDownLeft", "rotateOutDownRight", "rotateOutUpLeft", "rotateOutUpRight", "shake", "swing", "tada", "wiggle", "wobble");

		$transitions = apply_filters("pe_theme_slider_caption_transitions",$transitions);

		$mbox = 
			array(
				  "title" => __pe("Layers Builder"),
				  "type" => "",
				  "priority" => "core",
				  "where" =>
				  array(
						"post" => "all"
						),
				  "content" =>
				  array(
						"layout" =>
						array(
							  "label"=>__pe("Layout"),
							  "section" => "preview",

							  "description" => __pe("A boxed slider (default) behaves like a responsive image. A full width slider will always fill all the available width and upscale the image if smaller than slider area."),
							  "type"=>"RadioUI",
							  "options" => 
							  array(
									__pe("Boxed")=>"boxed",
									__pe("Full Width") => "fullwidth"
									),
							  "default"=>"boxed"
							  ),
						"preview" => 	
						array(
							  "section" => "preview",
							  "type"=>"LayersBuilder",
							  "default" => "940x300",
							  ),
						"captions" => 
						array(
							  "section" => "main",
							  "label"=>"",
							  "type"=>"Items",
							  "description" => "",
							  "button_label" => __pe("Add New Layer"),
							  "sortable" => true,
							  "auto" => __pe("Layer"),
							  "unique" => false,
							  "editable" => true,
							  "legend" => true,
							  "fields" => 
							  array(
									array(
										  "name" => "content",
										  "label" => __pe("Content"),
										  "type" => "textimg",
										  "width" => 300,
										  "default" => ""
										  ),
									array(
										  "name" => "x",
										  "label" => __pe("x"),
										  "type" => "text",
										  "width" => 40, 
										  "default" => "10"
										  ),
									array(
										  "name" => "y",
										  "label" => __pe("y"),
										  "type" => "text",
										  "width" => 40,
										  "default" => "10"
										  ),
									array(
										  "name" => "delay",
										  "label" => __pe("Wait"),
										  "type" => "text",
										  "width" => 30,
										  "default" => "0"
										  ),
									array(
										  "name" => "duration",
										  "label" => __pe("Duration"),
										  "type" => "text",
										  "width" => 30,
										  "default" => "1"
										  ),
									array(
										  "name" => "style",
										  "type" => "hidden",
										  "default" => "pe-caption-white"
										  ),
									array(
										  "name" => "size",
										  "type" => "hidden",
										  "default" => "pe-caption-small"
										  ),
									array(
										  "name" => "transition",
										  "type" => "hidden",
										  "default" => "fadeIn"
										  ),
									array(
										  "name" => "color",
										  "type" => "hidden",
										  "default" => ""
										  ),
									array(
										  "name" => "bgcolor",
										  "type" => "hidden",
										  "default" => ""
										  ),
									array(
										  "name" => "bgcolorAlpha",
										  "type" => "hidden",
										  "default" => ""
										  ),
									array(
										  "name" => "custom",
										  "type" => "hidden",
										  "default" => ""
										  ),
									array(
										  "name" => "classes",
										  "type" => "hidden",
										  "default" => ""
										  )
									),
							  "default" => ""
							  ),
						"style" => 
						array(
							  "label"=>__pe("Theme"),
							  "type"=>"Select",
							  "section"=>"edit",
							  "options"=> 
							  array(
									__pe("Light") => "pe-caption-white",
									__pe("Dark") => "pe-caption-style-black"
									),
							  "default"=>"pe-caption-white"
							  ),
						"size" => 
						array(
							  "label"=>__pe("Text"),
							  "type"=>"Select",
							  "section"=>"edit",
							  "options"=> 
							  array(
									__pe("Small") => "pe-caption-small",
									__pe("Medium") => "pe-caption-medium",
									__pe("Large") => "pe-caption-large",
									__pe("XLarge") => "pe-caption-xlarge",
									__pe("Bold") => "pe-caption-bold",
									__pe("Thick") => "pe-caption-thick"
									),
							  "default"=>"pe-caption-white"
							  ),
						"transition" => 
						array(
							  "label"=>__pe("Transition"),
							  "type"=>"Select",
							  "section"=>"edit",
							  "options"=> $transitions,
							  "single" => true,
							  "default"=>"fadeIn"
							  ),
						"color" =>
						array(
							  "label"=>__pe("Color"),
							  "type"=>"Color",
							  "section"=>"edit",
							  "palette" => array("#ffffff","#222222"),
							  "default"=> ""
							  ),
						"bgcolorAlpha" =>
						array(
							  "label"=>__pe("Background"),
							  "type"=>"Select",
							  "section"=>"edit",
							  "options"=>
							  array(
									__pe("No background") => "",
									__pe("10%") => "0.1",
									__pe("20%") => "0.2",
									__pe("30%") => "0.3",
									__pe("40%") => "0.4",
									__pe("50%") => "0.5",
									__pe("60%") => "0.6",
									__pe("70%") => "0.7",
									__pe("80%") => "0.8",
									__pe("90%") => "0.9",
									__pe("100%") => "1",
									),
							  "default"=> ""
							  ),
						"bgcolor" =>
						array(
							  "label"=>__pe("BG Color"),
							  "type"=>"Color",
							  "section"=>"edit",
							  "palette" => array("#ffffff","#222222"),
							  "default"=> ""
							  ),
						"classes" =>
						array(
							  "label"=>__pe("Classes"),
							  "type"=>"Text",
							  "section"=>"edit",
							  "default"=> ""
							  ),
						"custom" =>
						array(
							  "label"=>__pe("Style"),
							  "type"=>"TextArea",
							  "section"=>"edit",
							  "default"=> ""
							  )
						/*,
						"saveCaption" => 
						array(
							  "label"=>__pe("Save current layer"),
							  "type"=>"Button",
							  "section"=>"edit",
							  "default"=> ""
							  )*/
						)
				  );

		$mboxFormat = 
			array(
				  "title" => __pe("Format"),
				  "type" => "Plain",
				  "context" => "side",
				  "priority" => "core",
				  "where" =>
				  array(
						"post" => "all"
						),
				  "content" =>
				  array(
						"type" => 
						array(
							  "label"=>"",
							  "type"=>"RadioUI",
							  "options"=>
							  array(
									__pe("Normal") => "normal",
									__pe("Layers") => "layers"
									),
							  "default"=>"normal"
							  ),
						)
				  );

		PeGlobal::$config["metaboxes-slide"] = 
			array(
				  "layers" => $mbox,
				  //"format" => $mboxFormat
				  );
		
		add_action('add_meta_boxes_slide',array(&$this,'add_meta_boxes_slide'));
	}

	public function option() {
		$posts = get_posts(
						   array(
								 "post_type" => "slide",
								 "posts_per_page" => -1,
								 "suppress_filters" => 0
								 )
						   );
		if (count($posts) > 0) {
			$options = array();
			$options[__pe("No Slide")] = 0;
			foreach($posts as $post) {
				$options[$post->post_title] = $post->ID;
			}
		} else {
			$options = array(__pe("No slides defined.")=>-1);
		}
		return $options;
	}

	public function add_meta_boxes_slide() {
		// layer builder
		$this->registerAssets();
		wp_enqueue_script("pe_theme_slide");
	}

	public function caption($id) {
		$meta = $this->master->meta->get($id,"slide");
		return empty($meta->layers->captions) ? "" : $this->output($meta->layers->captions,$meta->layers->preview);
	}


	public function output($captions,$size = null) {
		$buffer = "";
		if ($captions && is_array($captions)) {
			foreach ($captions as $caption) {
				$style = "";
				$caption = (object) shortcode_atts(
												   array(
														 "x" => 0,
														 "y" => 0,
														 "delay" => 0,
														 "duration" => 1,
														 "style" => "pe-caption-white",
														 "size" => "pe-caption-small",
														 "transition" => "fadeIn",
														 "color" => "",
														 "bgcolor" => "",
														 "bgcolorAlpha" => 0,
														 "custom" => "",
														 "classes" => "",
														 "content" => ""
														 ),
												   $caption
												   );

				$style = "";

				if (!empty($caption->bgcolor) && floatval($caption->bgcolorAlpha) > 0) {
					$c = isset($caption->bgcolor) ? $caption->bgcolor : "#000000" ;
					$style = sprintf("background-color: %s;",$c);
					if (floatval($caption->bgcolorAlpha) < 1) {
						$style .= sprintf(
										  " background-color: rgba(%s,%s,%s,%s);",
										  hexdec(substr($c, 1, 2)),
										  hexdec(substr($c, 3, 2)),
										  hexdec(substr($c, 5, 2)),
										  $caption->bgcolorAlpha
										  );
					}
				}

				if (!empty($caption->color)) {
					$style .= sprintf("color: %s;",$caption->color);
				}


				//$style .= sprintf(" position:absolute;top:%spx;left:%spx;",$caption->y,$caption->x);
				
				if ($caption->custom) {
					$style .= sprintf(";%s;",$caption->custom);
				}

				if ($style) {
					$style = "style=\"{$style}\"";
				}

				$buffer .= sprintf(
								   '<div class="%s %s %s %s" %s data-transition="%s" data-duration="%s" data-delay="%s" data-x="%s" data-y="%s">%s</div>',
								   "peCaptionLayer",
								   $caption->style,
								   $caption->size,
								   $caption->classes,
								   $style,
								   $caption->transition,
								   $caption->duration,
								   $caption->delay,
								   $caption->x,
								   $caption->y,
								   $caption->content
								   );
			}
		}

		if ($size) {
			$ret = new StdClass();
			$ret->size = $size;
			$ret->caption = $buffer;
			return $ret;
		}

		return $buffer;
	}

}

?>
