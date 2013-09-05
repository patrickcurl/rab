<div class="span4">
    <div class="well sidebar-nav">
    <?php if (dynamic_sidebar('Home left sidebar')) : else : ?>
            <ul class="nav nav-list">
              <li class="nav-header">Sidebar</li>
              <?php endif; ?>
            </ul>
          <?php the_tags(); ?>
          </div> 
  </div>