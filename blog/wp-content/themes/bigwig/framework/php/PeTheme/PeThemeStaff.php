<?php

class PeThemeStaff {

	public $master;

	public function __construct($master) {
		$this->master =& $master;
	}

	public function cpt() {
		$cpt = 
			array(
				  'labels' => 
				  array(
						'name'              => __pe("Staff Members"),
						'singular_name'     => __pe("Staff Member"),
						'add_new_item'      => __pe("Add New Staff Member"),
						'search_items'      => __pe('Search Staff Members'),
						'popular_items' 	  => __pe('Popular Staff Members'),		
						'all_items' 		  => __pe('All Staff Members'),
						'parent_item' 	  => __pe('Parent Staff Member'),
						'parent_item_colon' => __pe('Parent Staff Member:'),
						'edit_item' 		  => __pe('Edit Staff Member'), 
						'update_item' 	  => __pe('Update Staff Member'),
						'add_new_item' 	  => __pe('Add New Staff Member'),
						'new_item_name' 	  => __pe('New Staff Member Name')
						),
				  'public' => true,
				  'has_archive' => false,
				  "supports" => array("title","editor","thumbnail"),
				  "taxonomies" => array("")
				  );

		PeGlobal::$config["post_types"]["staff"] = $cpt;
		add_action('pe_theme_metabox_config_staff',array(&$this,'pe_theme_metabox_config_staff'));
	}

	public function pe_theme_metabox_config_staff() {

		$mbox = 
			array(
				  "title" => __pe("Personal Info"),
				  "type" => "",
				  "priority" => "core",
				  "where" =>
				  array(
						"staff" => "all"
						),
				  "content" =>
				  array(
						"position" => 	
						array(
							  "label"=>__pe("Position"),
							  "type"=>"Text",
							  "default"=>__pe("Founder/Partner")
							  ),
						"social" => 
						array(
							  "label"=>__pe("Social Links"),
							  "type"=>"Items",
							  "description" => __pe("Add one or more links to social networks."),
							  "button_label" => __pe("Add Social Link"),
							  "sortable" => true,
							  "auto" => __pe("Layer"),
							  "unique" => false,
							  "editable" => false,
							  "legend" => false,
							  "fields" => 
							  array(
									array(
										  "label" => __pe("Social Network"),
										  "name" => "icon",
										  "type" => "select",
										  "options" => apply_filters('pe_theme_social_icons',array()),
										  "width" => 185,
										  "default" => ""
										  ),
									array(
										  "name" => "url",
										  "type" => "text",
										  "width" => 300, 
										  "default" => "#"
										  )
									),
							  "default" => ""
							  )
						)
				  
				  );

		PeGlobal::$config["metaboxes-staff"] = 
			array(
				  "info" => $mbox
				  );
			
	}

	public function option() {
		$posts = get_posts(
						   array(
								 "post_type"=>"staff",
								 "suppress_filters"=>false,
								 "posts_per_page"=>-1
								 )
						   );
		if (count($posts) > 0) {
			$options = array();
			foreach($posts as $post) {
				$options[$post->post_title] = $post->ID;
			}
		} else {
			$options = array(__pe("No staff member defined.")=>-1);
		}
		return $options;
	}

}

?>