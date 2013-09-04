
@if (Sentry::check())
        <li class="dropdown">
          <a href="#" data-toggle="dropdown" class="dropdown-toggle"><i class="icon-user"></i> Account<b class="caret"></b></a>
          <ul class="dropdown-menu">
            <li><a href="{{URL::to('users/edit')}}">Edit Profile</a></li>
            <li><a href="{{URL::to('users/logout')}}">Logout</a></li>
            </ul>
      @else


      <li id="login-form-large" class="dropdown hidden-xs">
        <a href="#" data-toggle="dropdown" class="dropdown-toggle"><i class="icon-user"></i> Sign In<b class="caret"></b></a>
        <?php // <a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown <b class="caret"></b></a> // ?>
        <ul class="dropdown-menu "  style="">
        <li>
           <form method="POST" action="/users/login" accept-charset="UTF-8" class="form-inline" role="form">
              <input type="hidden" name="_token" value="{{{ Session::getToken() }}}" />
              <div class="form-group form-group-dd">
                <label class="sr-only" for="email">Email address</label>
                <input type="email" class="form-control" name="email" id="email" placeholder="Enter email"  />
              </div>
              <div class="form-group form-group-dd">
                 <label class="sr-only" for="password">Password</label>
                 <input type="password" class="form-control" name="password" id="password" placeholder="Password">
               </div>

               <div class="checkbox" >
                 <label>
                   <input type="checkbox"> Remember me
                 </label>
                  <a href="" style="color:grey">Forgot Password?</a>
               </div>
               <button type="submit" class="btn btn-default col-md-10 col-md-offset-1">Sign in</button>

          </form>

        </li>
        </ul>




      @endif