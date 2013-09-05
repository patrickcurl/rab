  <footer id="footer-sidd">
       <p id="copyRight">&copy; WordPress 2013</p>    
  </footer>
</div>
<div class="navbar navbar-inverse navbar-fixed-bottom footerMenu">
  <div class="navbar-inner">
    <div class="container">
      <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse"> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
      <div class="nav-collapse collapse">
        <?php    
	  wp_nav_menu(array('theme_location'  => 'footer-menu','menu_class' => 'nav footer-menu','menu'=>'dropdown-menu','depth' => 3,'walker' => new wp_bootstrap_navwalker(),'fallback_cb' => false));
	  ?>
      </div>
      <!--/.nav-collapse --> 
    </div>
  </div>
</div>
<?php wp_footer(); ?>
</body>
</html>