    <div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="/"><span class="glyphicon glyphicon-arrow-left"></span></a>
		  <a class="navbar-brand" href="/admin">Project Munin Admin</a>
        </div>
        <div class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li<?php $active = $nav_active == 'courses' ? ' class="active"' : ''; echo $active; ?>><a href="/admin/courses">Courses</a></li>
            <li<?php $active = $nav_active == 'cameras' ? ' class="active"' : ''; echo $active; ?>><a href="/admin/cameras">Camera Units</a></li>
          </ul>
          <div class="navbar-right">
	          <p class="navbar-text">Signed in as simon </p>
			  <a href="/auth/logout" class="btn btn-danger navbar-btn">Log out</a>

          </div>
        </div><!--/.navbar-collapse -->
      </div>
    </div>