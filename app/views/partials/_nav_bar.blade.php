    <div class="navbar navbar-default navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
        <!-- <a href="/" class="navbar-brand-logo hidden-xs"><img alt="" src="/img/sell-textbooks-logo2.png" class="logo img-responsive hidden-xs "/></a>
        <a href="/" class="navbar-brand visible-xs" style="font-size:28px">RecycleABook</a> -->
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>



        </div>
        <div class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li class="{{Request::is('/') ? 'active' : ''}}"><a href="{{ URL::to( '/') }}">Home</a></li>
             <li class="{{Request::is('p/join-our-team*') ? 'active' : ''}}"><a href="http://blog.recycleabook.com/join-our-team/">Join Our Team</a></li>
             <!-- <li class="{{Request::is('p/how-to-save*') ? 'active' : ''}}"><a href="{{ URL::to( '/p/how-to-save') }}">How to Save</a></li> -->
            <!-- <li class="{{Request::is('/contact*') ? 'active' : ''}}"><a href="{{ URL::to( '/contact') }}">Contact Us</a></li> -->
            {{ View::make('partials._login_form_lg') }}
              <li><a href="{{ URL::to('/cart') }}"><i class="icon-shopping-cart nav-icon"></i> Seller Cart <span class="cart-total badge badge-info"></span></a></li>
            <?php $user = Sentry::getUser(); ?>
            @if ($user && $user->hasAccess('admin'))
              <li><a href="{{ URL::to('/admin') }}"> <span class="glyphicon glyphicon-wrench"></span> Admin Dashboard</a></li>
              @endif

          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </div>