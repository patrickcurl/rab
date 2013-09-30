<form action="<?php echo esc_url(home_url("/")); ?>" id="searchform" method="get" role="search">
	<input name="s" id="s" type="text" class="search" placeholder="Search.." value="<?php echo get_search_query() ? get_search_query() : ""; ?>"/>
	<button class="icon-search" type="submit"></button>
</form>
