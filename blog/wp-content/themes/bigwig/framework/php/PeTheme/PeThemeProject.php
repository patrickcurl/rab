<?php

class PeThemeProject {

	protected $master;
	protected $portfolioLoop;

	public $custom = "project";
	public $taxonomy = "prj-category";
	public $emtpyMsg;

	public function __construct(&$master) {
		$this->master =& $master;
		$this->emptyMsg = __pe("No project defined, please create one");
	}

	public function option() {
		$posts = get_posts(
						   array(
								 "post_type"=>$this->custom,
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
			$options = array($this->emptyMsg=>-1);
		}
		return $options;
	}

	public function cpt() {
		$cpt = 
			array(
				  'labels' => 
				  array(
						'name'              => __pe("Projects"),
						'singular_name'     => __pe("Project"),
						'add_new_item'      => __pe("Add New Project"),
						'search_items'      => __pe('Search Projects'),
						'popular_items' 	  => __pe('Popular Projects'),		
						'all_items' 		  => __pe('All Projects'),
						'parent_item' 	  => __pe('Parent Project'),
						'parent_item_colon' => __pe('Parent Project:'),
						'edit_item' 		  => __pe('Edit Project'), 
						'update_item' 	  => __pe('Update Project'),
						'add_new_item' 	  => __pe('Add New Project'),
						'new_item_name' 	  => __pe('New Project Name')
						),
				  'public' => true,
				  'has_archive' => false,
				  "supports" => array("title","editor","thumbnail","post-formats"),
				  "taxonomies" => array("post_format")
				  );

		$tax = 
			array(
				  'project',
				  array(
						'label' => __pe('Project Tags'),
						'sort' => true,
						'args' => array('orderby' => 'term_order' ),
						'show_in_nav_menus' => false,
						'rewrite' => array('slug' => 'projects' )
						)
				  );

		PeGlobal::$config["post_types"]["project"] =& $cpt;
		PeGlobal::$config["taxonomies"]["prj-category"] =& $tax;
		add_action('pe_theme_metabox_config_project',array(&$this,'pe_theme_metabox_config_project'));
	}

	public function pe_theme_metabox_config_project() {
		$opts = array_combine(range(1,10),range(1,10));

		$mbox = 
			array(
				  "title" => __pe("Portfolio"),
				  "type" => "Conditional",
				  "context" => "side",
				  "priority" => "core",
				  "options" => 
				  array(
						"lightbox" =>
						array(
							  "yes" => 
							  array(
									"show" => "title,description"
									),
							  "no" => 
							  array(
									"hide" => "title,description"
									)
							  )
						),
				  "where" =>
				  array(
						"post" => "all"
						),
				  "content" =>
				  array(
						"image" => 
						array(
							  "label"=>__pe("Thumbnail"),
							  "type"=>"Upload",
							  "description" => __pe("Custom image to be used as thumbnail when project is shown inside a portfolio view. If not set, featured image will be used."),
							  "default"=>""
							  ),
						"layout" => 
						array(
							  "label"=>__pe("Layout"),
							  "type"=>"Text",
							  "description" => __pe("Cell layout when shown in portoflio grid. Format is WxH where W = columns and H = rows."),
							  "default"=> "1x1"
							  ),
						"lightbox" => 
						array(
							  "label"=>__pe("Lightbox"),
							  "type"=>"RadioUI",
							  "description" => __pe("If set to \"yes\", opens a lightbox when the image is clicked in portoflio grid. Use \"no\" to load the project page."),
							  "options" => Array(__pe("Yes")=>"yes",__pe("No")=>"no"),
							  "default"=> "yes"
							  ),
						"title" => 
						array(
							  "label"=>__pe("Title"),
							  "type"=>"Text",
							  "description" => __pe("Lightbox caption title. Ignored for gallery/video project types."),
							  "default"=> ""
							  ),
						"description" => 
						array(
							  "label"=>__pe("Description"),
							  "type"=>"TextArea",
							  "description" => __pe("Lightbox caption description. Ignored for gallery/video project types."),
							  "default"=> ""
							  ),
						)
				  );

		$mboxInfo = 
			array(
				  "title" => __pe("Project Info"),
				  "priority" => "core",
				  "where" =>
				  array(
						"post" => "all"
						),
				  "content" =>
				  array(
						"props" => 
						array(
							  "label"=>__pe("Properties"),
							  "type"=>"Items",
							  "section"=>__pe("Header"),
							  "description" => __pe("Add one or more property to the project data section."),
							  "button_label" => __pe("Add Property"),
							  "sortable" => true,
							  "auto" => __pe("Date"),
							  "unique" => false,
							  "editable" => false,
							  "legend" => true,
							  "fields" => 
							  array(
									array(
										  "label" => __pe("Name"),
										  "name" => "name",
										  "type" => "text",
										  "width" => 185,
										  "default" => __pe("Date")
										  ),
									array(
										  "label" => __pe("Value"),
										  "name" => "value",
										  "type" => "text",
										  "width" => 300, 
										  "default" => __pe("Jun 2013")
										  )
									),
							  "default" => ""
							  )
						)
				  );

		PeGlobal::$config["metaboxes-project"]["portfolio"] =& $mbox;
		PeGlobal::$config["metaboxes-project"]["info"] =& $mboxInfo;
	}


	public function &get($id) {
		if (isset($this->cache[$id])) return $this->cache[$id];
		$post =& get_post($id);
		if (!$post) return false;
		$meta =& $this->master->meta->get($id,$post->post_type);
		$post->meta = $meta;
		return $post;
	}

	public function exists($id) {
		return $this->get($id) !== false;
		
	}

	public function filter($sep = "",$aclass="label") {
		return $this->master->content->filter($this->taxonomy,$sep,$aclass);
	}

	public function filterClasses() {
		return $this->master->content->filterClasses($this->taxonomy);
	}

	public function tags($sep=", ") {
		echo get_the_term_list(null, $this->taxonomy, "", $sep,"");
	}


	public function filterNames() {
		global $post;
		$names = wp_get_post_terms($post->ID,$this->taxonomy,array("fields" => "names"));
		if (is_array($names) && ($count = count($names)) > 0) {
			echo join(", ",$names);
		}
	}

	public function portfolio($settings) {
		global $post;
		
		$exclude = false;

		// prevents nested portfolios
		if ($this->portfolioLoop) return;
		$this->portfolioLoop = true;

		// prevents loops
		if (isset($post) && $post) {
			$exclude = $post->ID;
		}

		if (is_string($settings) && !empty($settings)) {
			$id = $settings;
			$post = get_post($id);
			if (!$post) return;
			$meta = $this->master->meta->get($id,$post->post_type);
			if (empty($meta->portfolio)) return true;
			$settings = $meta->portfolio;
		}

		$settings = (object) shortcode_atts(
											array(
												  "columns" => apply_filters("pe_theme_portfolio_default_layout",3),
												  "id" => array(),
												  "filterable" => "yes",
												  "count" => "",
												  "pager" => "yes",
												  "tags" => "",
												  "template" => "portfolio"
												  ),
											(array) $settings
											);

		// prevents loops
		if ($exclude) {
			$custom = array("post__not_in" => array($exclude));
		}

		if (count($settings->id) > 0) {
			$custom = array("post__in" => $settings->id);
		}

		if ($settings->tags) {
			$custom[$this->taxonomy] = join(",",$settings->tags);
		}
		
		$settings->count = intval(empty($settings->count) ? -1 : $settings->count); 
		$settings->pager = $settings->count != -1 && !empty($settings->pager) && $settings->pager == "yes" ;

		/*
		if ($settings->format) {
			$tax_query = array(
							   array(
									 'taxonomy' => 'post_format',
									 'field' => 'slug',
									 'terms' => array("post-format-{$settings->format}")
									 )
							   );
			$custom["tax_query"] = $tax_query;
		}
		*/

		$content =& $this->master->content;


		if ($content->customLoop($this->custom,$settings->count,null,$custom,$settings->pager)) { 
	
			$this->master->template->data($settings);
			$this->master->get_template_part($settings->template,empty($conf->type) ? "" : $conf->type);
			
			if ($settings->pager) {
				$content->pager();
			}
		}

		$content->resetLoop();

		$this->portfolioLoop = false;
		
	}


	public function customLoop($count,$tags,$paged) {
		$custom = null;
		if (is_array($tags) && count($tags) > 0) {
			$custom[$this->taxonomy] = join(",",$tags);
		}
		return $this->master->content->customLoop($this->custom,$count,null,$custom,$paged);
	}

}

?>
