    <div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="/">Project Munin</a>
        </div>
        <div class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li<?php $active = $nav_active == 'courses' ? ' class="active"' : ''; echo $active; ?>><a href="/admin/">Courses</a></li>
            <li<?php $active = $nav_active == 'cameras' ? ' class="active"' : ''; echo $active; ?>><a href="/admin/cameras">Camera Units</a></li>
          </ul>
        </div><!--/.navbar-collapse -->
      </div>
    </div>