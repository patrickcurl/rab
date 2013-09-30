<?php

class PeThemeLogo {

	public $master;

	public function __construct($master) {
		$this->master =& $master;
	}

	public function cpt() {
		$cpt = 
			array(
				  'labels' => 
				  array(
						'name'              => __pe("Logos"),
						'singular_name'     => __pe("Logo"),
						'add_new_item'      => __pe("Add New Logo"),
						'search_items'      => __pe('Search Logos'),
						'popular_items' 	  => __pe('Popular Logos'),		
						'all_items' 		  => __pe('All Logos'),
						'parent_item' 	  => __pe('Parent Logo'),
						'parent_item_colon' => __pe('Parent Logo:'),
						'edit_item' 		  => __pe('Edit Logo'), 
						'update_item' 	  => __pe('Update Logo'),
						'add_new_item' 	  => __pe('Add New Logo'),
						'new_item_name' 	  => __pe('New Logo Name')
						),
				  'public' => true,
				  'has_archive' => false,
				  "supports" => array("title","thumbnail"),
				  "taxonomies" => array("")
				  );

		PeGlobal::$config["post_types"]["logo"] = $cpt;
		add_action('pe_theme_metabox_config_logo',array(&$this,'pe_theme_metabox_config_logo'));
	}

	public function pe_theme_metabox_config_logo() {

		$mbox = 
			array(
				  "title" => __pe("Link"),
				  "type" => "",
				  "priority" => "core",
				  "where" =>
				  array(
						"logo" => "all"
						),
				  "content" =>
				  array(
						"url" => 	
						array(
							  "label"=>__pe("Url"),
							  "type"=>"Text",
							  "default"=>"#"
							  )
						)
				  
				  );

		PeGlobal::$config["metaboxes-logo"] = 
			array(
				  "info" => $mbox
				  );
			
	}

	public function option() {
		$posts = get_posts(
						   array(
								 "post_type"=>"logo",
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
			$options = array(__pe("No logo defined.")=>-1);
		}
		return $options;
	}

}

?>