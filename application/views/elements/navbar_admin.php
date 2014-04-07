    <div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <!--a class="navbar-brand" href="/"><span class="glyphicon glyphicon-arrow-left"></span></a-->
		  <a class="navbar-brand" href="<?=admin_url() ?>">Project Munin Admin</a>
        </div>
        <div class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li<?php $active = $nav_active == 'courses' ? ' class="active"' : ''; echo $active; ?>><a href="/admin/courses">Courses</a></li>
            <li<?php $active = $nav_active == 'cameras' ? ' class="active"' : ''; echo $active; ?>><a href="/admin/cameras">Camera Units</a></li>
            <li<?php $active = $nav_active == 'users' ? ' class="active"' : ''; echo $active; ?>><a href="/admin/users">Users</a></li>
          </ul>
          <? if($logged_in): ?>
	          <div class="navbar-right">
		          <p class="navbar-text">Signed in as <?=$user ?> </p>
				<?php if($is_admin): ?>
					<a href="<?=site_url() ?>" class="btn btn-default navbar-btn">Back to site</a>
				<?php endif; ?>
				  <a href="/auth/logout" class="btn btn-danger navbar-btn">Log out</a>
	          </div>
		  <? endif; ?>
        </div><!--/.navbar-collapse -->
      </div>
    </div>