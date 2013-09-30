<!DOCTYPE html>
<?php $t =& peTheme();?>
<?php $skin = $t->options->get("skin"); ?>
<?php $class = "skin_$skin"; ?>
<!--[if IE 7 ]><html class="desktop ie7 no-js <?php echo $class ?>" <?php language_attributes(); ?>><![endif]-->
<!--[if IE 8 ]><html class="desktop ie8 no-js <?php echo $class ?>" <?php language_attributes(); ?>><![endif]-->
<!--[if IE 9 ]><html class="desktop ie9 no-js <?php echo $class ?>" <?php language_attributes(); ?>><![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--><html class="no-js <?php echo $class ?>" <?php language_attributes();?>><!--<![endif]-->

	<head>
		<meta charset="<?php bloginfo( 'charset' ); ?>" />
		<title><?php $t->header->title(); ?></title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
		<meta name="format-detection" content="telephone=no" />

		<!--[if lt IE 9]>
		<script type="text/javascript">/*@cc_on'abbr article aside audio canvas details figcaption figure footer header hgroup mark meter nav output progress section summary subline time video'.replace(/\w+/g,function(n){document.createElement(n)})@*/</script>
		<![endif]-->
		<script type="text/javascript">if(Function('/*@cc_on return document.documentMode===10@*/')()){document.documentElement.className+=' ie10';}</script>
		<script type="text/javascript">(function(H){H.className=H.className.replace(/\bno-js\b/,'js')})(document.documentElement)</script>

		<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />

		<!-- favicon -->
		<link rel="shortcut icon" href="<?php echo $t->options->get("favicon") ?>" />

		<?php $t->font->load(); ?>

		<!-- wp_head() -->
		<?php $t->header->wp_head(); ?>
	</head>

	<body <?php $t->content->body_class(); ?>>

		<!--wrapper for boxed version-->
		<div class="site-wrapper">
			<div class="sticky-bar">
				<div class="info-bar">
					<div class="pe-container">
						<div class="row-fluid">
							<div class="span4 tagline">
								<?php echo $t->options->get("headerMessage"); ?>
							</div>

							<div class="span2">
								<!--wpml  lang selection -->
								<?php do_action('icl_language_selector'); ?>
							</div>

							<div class="span6">
								<div>

									<?php $email = $t->options->get("headerEmail"); ?>
									<?php if ($email): ?>
									<div class="email">
										<i class="icon-pencil"></i>
										<a href="mailto:<?php echo $email; ?>" data-rel="tooltip" data-position="bottom" data-original-title="<?php e__pe("Email Us"); ?>" ><?php echo $email; ?></a>
									</div>
									<?php endif; ?>
									<?php $phone = $t->options->get("headerPhone"); ?>
									<?php if ($phone): ?>
									<div class="phone">
										<i class="icon-phone"></i><a href="#" data-rel="tooltip" data-position="bottom" data-original-title="<?php e__pe("Call Us Now"); ?>" ><?php echo $phone ?></a>
									</div>
									<?php endif; ?>
									<div class="sm-icon-wrap">
										<?php $t->content->socialLinks($t->options->get("headerSocialLinks"),"bottom"); ?>
									</div>

								</div>
							</div>

						</div>
					</div><!--end container-->
				</div><!--end infobar-->

				<!--wide wrapper-->
				<div class="menu-bar">
					<div class="pe-container">
						<header class="row-fluid">

							<!--small logo-->
							<div class="logo span3">
								<a href="<?php echo home_url(); ?>" title="<?php e__pe("Home"); ?>" >
									<?php $t->image->retina($t->options->get("logo")); ?>
								</a>
							</div>

							<div class="menu-wrap span9">
								<!--main navigation-->
								<div class="mainNav clearfix">
									<?php $t->menu->show("main"); ?>
								</div>
								<div id="drop-nav" class="mobile-nav" data-label="<?php e__pe("Menu..."); ?>"></div>
							</div>

						</header><!-- end header  -->
					</div><!--end container-->
				</div> <!--end top bar-->
			</div><!--end sticky bar-->

