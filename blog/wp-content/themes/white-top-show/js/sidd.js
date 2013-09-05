jQuery(document).ready(function(e) {
	jQuery("#submit").addClass('btn');
	jQuery(".media-list li").addClass('well');
	jQuery("a[rel='tag']").addClass('btn siddTags');
	
	var heightMenu=jQuery(".navbar-inner").height();
	if(heightMenu>80)
	{jQuery("div.topPaddingSid").css({'padding-top':heightMenu+28});}
	console.log(heightMenu)
});