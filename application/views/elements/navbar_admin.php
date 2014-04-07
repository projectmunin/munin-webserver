    <div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <!--a class="navbar-brand" href="/"><span class="glyphicon glyphicon-arrow-left"></span></a-->
		  <a class="navbar-brand" href="<?=admin_url() ?>"><span class="glyphicon glyphicon-stats"></span> Project Munin Admin</a>
        </div>
        <div class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li<?php $active = $nav_active == 'courses' ? ' class="active"' : ''; echo $active; ?>><a href="/admin/courses"><span class="glyphicon glyphicon-book"></span> Courses</a></li>
            <li<?php $active = $nav_active == 'cameras' ? ' class="active"' : ''; echo $active; ?>><a href="/admin/cameras"><span class="glyphicon glyphicon-camera"></span> Camera Units</a></li>
            <li<?php $active = $nav_active == 'users' ? ' class="active"' : ''; echo $active; ?>><a href="/admin/users"><span class="glyphicon glyphicon-user"></span> Users</a></li>
          </ul>
          <? if($logged_in): ?>
	          <div class="navbar-right">
		          <p class="navbar-text">Signed in as <?=$user ?> </p>
				<a href="/auth/logout" class="navbar-text"><span class="glyphicon glyphicon-log-out"></span> Log out</a>
				<?php if($is_admin): ?>
					<a href="<?=site_url() ?>" class="btn btn-primary navbar-btn"><span class="glyphicon glyphicon-home"></span> Back to site</a>
				<?php endif; ?>
	          </div>
		  <? endif; ?>
        </div><!--/.navbar-collapse -->
      </div>
    </div>