<?php

class PeThemeBigwig extends PeThemeController {

	public $preview = array();

	public function __construct() {
		// custom post types
		add_action("pe_theme_custom_post_type",array(&$this,"pe_theme_custom_post_type"));

		// wp_head stuff
		add_action("pe_theme_wp_head",array(&$this,"pe_theme_wp_head"));

		// google fonts
		add_filter("pe_theme_font_variants",array(&$this,"pe_theme_font_variants_filter"),10,2);

		// menu
		add_filter("pe_theme_menu_items_wrap_default",array(&$this,"pe_theme_menu_items_wrap_default_filter"));
		add_filter("pe_theme_menu_top_level_icon",array(&$this,"pe_theme_menu_top_level_icon_filter"));
		add_filter("pe_theme_menu_nth_level_icon",array(&$this,"pe_theme_menu_top_level_icon_filter"));
		add_filter("pe_theme_menu_item_title",array(&$this,"pe_theme_menu_item_title_filter"),10,4);

		// social links
		add_filter("pe_theme_social_icons",array(&$this,"pe_theme_social_icons_filter"));

		// comment submit button class
		add_filter("pe_theme_comment_submit_class",array(&$this,"pe_theme_comment_submit_class_filter"));
	}

	public function pe_theme_wp_head() {
		$this->font->apply();
		$this->color->apply();

		// custom CSS field
		if ($customCSS = $this->options->get("customCSS")) {
			printf('<style type="text/css">%s</style>',stripslashes($customCSS));
		}

		// custom JS field
		if ($customJS = $this->options->get("customJS")) {
			printf('<script type="text/javascript">%s</script>',stripslashes($customJS));
		}

	}

	public function pe_theme_menu_items_wrap_default_filter($wrapper) {
		return '<ul id="navigation" class="nav">%3$s</ul>';
	}

	public function pe_theme_menu_top_level_icon_filter($wrapper) {
		return '<b class="icon-down-open-mini"></b>';
	}

	public function pe_theme_menu_item_title_filter($title,$orig,$icon,$menu) {
		if ($menu === "main") {
			$splitted = explode("|",$orig);
			if (count($splitted) > 1) {
				$title = $icon . sprintf('%s <span class="subtitle">%s</span>',trim($splitted[0]),trim($splitted[1]));
			}
		}
		return $title;
	}


	public function pe_theme_font_variants_filter($variants,$font) {
		if ($font === "Open Sans") {
			$variants="$font:400italic,300,400,600,700";
		}
		return $variants;
	}

	public function pe_theme_social_icons_filter($icons = null) {
		return 
			array(
				  // label => icon | tooltip text
				  __pe("Twitter") => "icon-twitter-circled|Twitter",
				  __pe("Facebook") => "icon-facebook-circled|Facebook",
				  __pe("Linkedin") => "icon-linkedin-circled|Linkedin",
				  __pe("Pinterest") => "icon-pinterest-circled|Pinterest",
				  __pe("Skype") => "icon-skype-circled|Skype",
				  __pe("Forrst") => "icon-forrst|Forrst",
				  __pe("YouTube") => "icon-youtube|YouTube",
				  __pe("Gamil") => "icon-gmail|Gmail",
				  __pe("WordPress") => "icon-wordpress|WordPress",
				  __pe("Dropbox") => "icon-dropbox-1|Dropbox",
				  __pe("Instagram") => "icon-instagram|Instagram",
				  __pe("Dribbble") => "icon-dribbble-circled|Dribbble",
				  __pe("Google+") => "icon-gplus|Google+",
				  __pe("Vimeo") => "icon-vimeo-circled|Vimeo",
				  __pe("Flickr") => "icon-flickr|Flickr",
				  __pe("Github") => "icon-github|Github",
				  __pe("Picasa") => "icon-picasa|Picasa",
				  __pe("Soundcloud") => "icon-soundcloud|Soundcloud",
				  __pe("Behance") => "icon-behance|Behance",
				  __pe("LinkedIn") => "icon-linkedin-circled|LinkedIn"

				  );
	}

	public function pe_theme_comment_submit_class_filter() {
		return "contour-btn red";
	}

	public function init() {
		parent::init();

		if ($this->options->get("retina") === "yes") {
			add_filter("pe_theme_resized_img",array(&$this,"pe_theme_resized_retina_filter"),10,5);
		} else if ($this->options->get("lazyImages") === "yes") {
			add_filter("pe_theme_resized_img",array(&$this,"pe_theme_resized_img_filter"),10,4);
		}
	}

	public function pe_theme_custom_post_type() {
		$this->gallery->cpt();
		$this->video->cpt();
		$this->project->cpt();
		//$this->ptable->cpt();
		$this->staff->cpt();
		$this->service->cpt();
		$this->testimonial->cpt();
		$this->logo->cpt();
		$this->slide->cpt();
		$this->view->cpt();
	}


	public function boot() {
		parent::boot();

		PeGlobal::$config["content-width"] = 940;
		PeGlobal::$config["post-formats"] = array("video","gallery");
		PeGlobal::$config["post-formats-project"] = array("video","gallery");

		
		/*
		PeGlobal::$config["image-sizes"]["thumbnail"] = array(120,90,true);
		PeGlobal::$config["image-sizes"]["medium"] = array(480,396,true);
		PeGlobal::$config["image-sizes"]["large"] = array(680,224,true);
		PeGlobal::$config["image-sizes"]["post-thumbnail"] = PeGlobal::$config["image-sizes"]["medium"];
		*/

		PeGlobal::$config["image-sizes"]["thumbnail"] = array(120,90,true);
		PeGlobal::$config["image-sizes"]["post-thumbnail"] = array(260,200,false);

		//PeGlobal::$config["nav-menus"]["footer"] = __pe("Footer menu");

		// blog layouts
		PeGlobal::$config["blog"] =
			array(
				  __pe("Default") => "",
				  __pe("Search") => "search",
				  __pe("Alternate") => "project"
				  );

		PeGlobal::$config["widgets"] = 
			array(
				  "Logo",
				  "Contact",
				  "Newsletter",
				  "RecentPosts"
				  );

		PeGlobal::$config["shortcodes"] = 
			array(
				  "BS_Badge",
				  "BS_Label",
				  "BS_Button",
				  "BS_Video"
				  );

		PeGlobal::$config["sidebars"] =
			array(
				  "default" => __pe("Default post/page"),
				  "footer" => __pe("Footer Widgets")
				  );

		PeGlobal::$config["colors"] = 
			array(
				  "color1" => 
				  array(
						"label" => __pe("Primary Color"),
						"selectors" => 
						array(
							  ".desktop h3 a:hover" => "color",
							  ".subtitle a" => "color",
							  ".accent" => "color",
							  "a" => "color",
							  "a.read-more" => "color",
							  ".accent" => "color",
							  ".accent" => "color",
							  "a.more-link" => "color",
							  ".info-bar .email [class^='icon-']" => "color",
							  ".info-bar .phone [class^='icon-']" => "color",
							  ".desktop .sm-icon-wrap a:hover" => "color",
							  ".nav > li > a:hover" => "color",
							  ".nav > li.active > a" => "color",
							  ".desktop .dropdown-menu li.active a" => "color",
							  ".desktop .dropdown-menu li.active:hover a" => "color",
							  ".desktop .social-media a:hover" => "color",
							  ".widget_info a" => "color",
							  ".desktop .project-item h6 a:hover" => "color",
							  ".filter-keywords" => "color",
							  ".staff-member h3" => "color",
							  ".desktop .staff-social a:hover" => "color",
							  ".desktop .widget_nav_menu a:hover" => "color",
							  ".widget_nav_menu .menu li.current_page_item a" => "color",
							  ".desktop .widget_nav_menu li.current_page_item a:hover" => "color",
							  ".desktop .widget_recent_comments li a:hover" => "color",
							  ".desktop .widget_links li a:hover" => "color",
							  ".desktop .widget_pages li a:hover" => "color",
							  ".desktop .widget_meta li a:hover" => "color",
							  ".desktop .widget_nav_menu li a:hover" => "color",
							  ".desktop .widget_recent_entries li a:hover" => "color",
							  ".desktop .widget_categories a:hover" => "color",
							  ".desktop .post-meta .categories a:hover" => "color",
							  ".desktop .post-meta .date a:hover" => "color",
							  ".post-pagination a span:first-child" => "color",
							  "#comments-title span" => "color",
							  ".bay h6" => "color",
							  ".desktop .project-single-col .categories a:hover" => "color",
							  ".pagination a" => "color",
							  ".desktop .featured-project .categories a:hover" => "color",
							  ".new-tag" => "color",
							  ".project-data h6" => "color",
							  ".project-tags h6" => "color",
							  ".project-nav a" => "color",
							  ".pricing-table .row-titles .price span" => "color",
							  ".peFlareLightbox .peFlareLightboxCaptions>div>div>h3 a" => "color",
							  ".peSlider > div.peCaption h3" => "color",
							  ".peSlider > div.peCaption h3 a" => "color",
							  ".nav>li.active>a" => "color",

							  ".desktop  a.read-more:hover " => "background-color",
							  ".contour-btn.red" => "background-color",
							  ".process > div >  div >  div:hover .read-more" => "background-color",
							  "div.overlay-image" => "background-color",
							  ".contentBox" => "background-color",
							  ".filter-keywords  li a.active " => "background-color",
							  ".desktop  .filter-keywords li  a:hover " => "background-color",
							  ".featureIcon" => "background-color",
							  ".desktop .widget_tag_cloud a:hover" => "background-color",
							  ".desktop #comments .reply .label:hover" => "background-color",
							  ".desktop  .carousel-nav  a:hover" => "background-color",
							  ".desktop .pagination a:hover" => "background-color",
							  ".pagination li.active a" => "background-color",
							  ".ie8 .peIsotopeGrid .peIsotopeItem:hover span.cell-title" => "background-color",
							  ".desktop .project-nav a:hover" => "background-color",
							  ".pricing-table .high .price" => "background-color",
							  ".ie8 .over-effect:hover > .cell-title" => "background-color",
							  ".sticky .post-title" => "background-color",
							  ".desktop .peIsotopeGrid .peIsotopeItem:hover span.cell-title" => "background-color:0.8",
							  ".mobile .peIsotopeGrid .peIsotopeItem span.cell-title" => "background-color:0.8",
							  ".desktop .over-effect:hover > .cell-title" => "background-color:0.8",

							  ".desktop a.read-more:hover" => "border-color",
							  ".contour-btn.red" => "border-color",
							  ".dropdown-menu" => "border-color",
							  ".process > div > div > div:hover" => "border-color",
							  ".process > div > div > div:hover .read-more" => "border-color",
							  ".footer" => "border-color",
							  ".desktop a.over-effect:hover" => "border-color",
							  "blockquote" => "border-color",
							  " .filter-keywords li  a.active" => "border-color",
							  ".desktop .filter-keywords li a:hover" => "border-color",
							  ".desktop .widget_tag_cloud a:hover" => "border-color",
							  ".bypostauthor > .comment-body > .comment-author img" => "border-color",
							  ".bypostauthor > .comment-body .fn a" => "border-color",
							  ".desktop .carousel-nav a:hover" => "border-color",
							  ".desktop .pagination a:hover" => "border-color",
							  ".pagination li.active a" => "border-color",
							  ".featured-project" => "border-color",
							  ".desktop .project-nav a:hover" => "border-color",

							  ".col.high"=> "outline-color"
							  ),
						"default" => "#84bd32"
						)
				  );
		

		PeGlobal::$config["fonts"] = 
			array(
				  "fontBody" => 
				  array(
						"label" => __pe("Body, Paragraph Text"),
						"selectors" => 
						array(
							  "body",
							  "h1",
							  "h2",
							  "h3",
							  "h4",
							  "h5",
							  "h6",
							  "p",
							  "input",
							  "button",
							  "select",
							  "textarea",
							  ".peSlider > div.peCaption",
							  ".peSlider > div.peCaption h3",
							  ".peSlider > div.peCaption > .peCaptionLayer.pe-caption-style-black"
							  ),
						"default" => "Open Sans"
						)
				  );

		

		$options = array();

		$options = array_merge($options,
			array(
				  "import_demo" => $this->defaultOptions["import_demo"],
				  "logo" => 
				  array(
						"label"=>__pe("Logo"),
						"type"=>"Upload",
						"section"=>__pe("General"),
						"description" => __pe("This is the main site logo image. The image should be a .png file."),
						"default"=> PE_THEME_URL."/img/skin/logo.png"
						),
				  "favicon" => $this->defaultOptions["favicon"],
				  "customCSS" => $this->defaultOptions["customCSS"],
				  "customJS" => $this->defaultOptions["customJS"],
				  "headerMessage" => 
				  array(
						"label"=>__pe("Message"),
						"type"=>"Text",
						"wpml"=> true,
						"section"=>__pe("Header"),
						"description" => __pe("This is the header message."),
						"default"=> "The kingpin of business templates. Fact!"
						),
				  "headerEmail" => 
				  array(
						"label"=>__pe("Email"),
						"type"=>"Text",
						"section"=>__pe("Header"),
						"description" => __pe("Email address, leave empty to hide."),
						"default"=> "email@domain.com"
						),
				  "headerPhone" => 
				  array(
						"label"=>__pe("Phone"),
						"type"=>"Text",
						"section"=>__pe("Header"),
						"description" => __pe("Phone number, leave empty to hide."),
						"default"=> "+353 (0) 123 456 78"
						),
				  "headerSocialLinks" => 
				  array(
						"label"=>__pe("Social Profile Links"),
						"type"=>"Items",
						"section"=>__pe("Header"),
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
						),
				  "footerLogo" => 
				  array(
						"label"=>__pe("Logo"),
						"type"=>"Upload",
						"section"=>__pe("Footer"),
						"description" => __pe("This is the footer logo image. The image should be a .png file."),
						"default"=> PE_THEME_URL."/img/skin/logo.png"
						),
				  "footerCopyright" => 
				  array(
						"label"=>__pe("Copyright"),
						"wpml"=> true,
						"type"=>"TextArea",
						"section"=>__pe("Footer"),
						"description" => __pe("This is the footer copyright message."),
						"default"=> sprintf('<span>&copy; BigWig - a clean &amp; minimalist template by</span>%s<a href="#">pixelentity</a>',"\n")
						),
				  "footerPowered" => 
				  array(
						"label"=>__pe("Powered by"),
						"wpml"=> true,
						"type"=>"TextArea",
						"section"=>__pe("Footer"),
						"description" => __pe('This is the footer "Powered by" message.'),
						"default"=> sprintf('<span class="pull-right">Powered by HTML5</span>')
						),
				  "colors" =>
				  array(
						"label"=>__pe("Custom Colors"),
						"type"=>"Help",
						"section"=>__pe("Colors"),
						"description" => __pe("In this page you can set alternative colors for the main colored elements in this theme. Four color options have been provided. A primary color, a secondary or complimentary color, a primary or dark grey and a secondary or light grey. To change the colors used on these elements simply write a new hex color reference number into the fields below or use the color picker which appears when each field obtains focus. Once you have selected your desired colors make sure to save them by clicking the <b>Save All Changes</b> button at the bottom of the page. Then just refresh your page to see the changes.<br/><br/><b>Please Note:</b> Some of the elements in this theme are made from images (Eg. Icons) and these items may have a color. It is not possible to change these elements via this page, instead such elements will need to be changed manually by opening the images/icons in an image editing program and manually changing their colors to match your theme's custom color scheme. <br/><br/>To return all colors to their default values at any time just hit the <b>Restore Default</b> link beneath each field."),
						),
				  "googleFonts" => 
				  array(
						"label"=>__pe("Custom Fonts"),
						"type"=>"Help",
						"section"=>__pe("Fonts"),
						"description" => __pe("In this page you can set the typefaces to be used throughout the theme. For each elements listed below you can choose any front from the Google Web Font library. Once you have chosen a font from the list, you will see a preview of this font immediately beneath the list box. The icons on the right hand side of the font preview, indicate what weights are available for that typeface.<br/><br/><strong>R</strong> -- Regular,<br/><strong>B</strong> -- Bold,<br/><strong>I</strong> -- Italics,<br/><strong>BI</strong> -- Bold Italics<br/><br/>When decideing what font to use, ensure that the chosen font contains the font weight required by the element. For example, main headings are bold, so you need to select a new font for these elements which supports a bold font weight. If you select a font which does not have a bold icon, the font will not be applied. <br/><br/>Browse the online <a href='http://www.google.com/webfonts'>Google Font Library</a><br/><br/><b>Custom fonts</b> (Advanced Users):<br/> Other then those available from Google fonts, custom fonts may also be applied to the elements listed below. To do this an additional field is provided below the google fonts list. Here you may enter the details of a font family, size, line-height etc. for a custom font. This information is entered in the form of the shorthand 'font:' CSS declaration, for example:<br/><br/><b>bold italic small-caps 1em/1.5em arial,sans-serif</b><br/><br/>If a font is specified in this field then the font listed in the Google font drop menu above will not be applied to the element in question. If you wish to use the Google font specified in the drop down list and just specify a new font size or line height, you can do so in this field also, however the name of the Google font <b>MUST</b> also be entered into this field. You may need to visit the Google fonts web page to find the exact CSS name for the font you have chosen." ),
						),
				  "contactEmail" => $this->defaultOptions["contactEmail"],
				  "contactSubject" => $this->defaultOptions["contactSubject"],
				  "sidebars" => 
				  array(
						"label"=>__pe("Widget Areas"),
						"type"=>"Sidebars",
						"section"=>__pe("Widget Areas"),
						"description" => __pe("Create new widget areas by entering the area name and clicking the add button. The new widget area will appear in the table below. Once a widget area has been created, widgets may be added via the widgets page."),
						"default"=>""
						),
				  ));

		$options = array_merge($options,$this->font->options());
		$options = array_merge($options,$this->color->options());

		$options["retina"] =& $this->defaultOptions["retina"];
		$options["lazyImages"] =& $this->defaultOptions["lazyImages"];
		$options["minifyJS"] =& $this->defaultOptions["minifyJS"];
		$options["minifyCSS"] =& $this->defaultOptions["minifyCSS"];

		$options["adminThumbs"] =& $this->defaultOptions["adminThumbs"];
		$options["thumbscache"] =& $this->defaultOptions["thumbscache"];

		if (!empty($this->defaultOptions["mediaQuick"])) {
			$options["mediaQuick"] =& $this->defaultOptions["mediaQuick"];
			$options["mediaQuickDefault"] =& $this->defaultOptions["mediaQuickDefault"];
		}

		$options["updateCheck"] =& $this->defaultOptions["updateCheck"];
		$options["updateUsername"] =& $this->defaultOptions["updateUsername"];
		$options["updateAPIKey"] =& $this->defaultOptions["updateAPIKey"];

		$options["adminLogo"] =& $this->defaultOptions["adminLogo"];
		$options["adminUrl"] =& $this->defaultOptions["adminUrl"];
		
		PeGlobal::$config["options"] = apply_filters("pe_theme_options",$options);

	}

	protected function init_asset() {
		return new PeThemeBigwigAsset($this);
	}


}

?>
