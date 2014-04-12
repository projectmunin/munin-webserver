<div class="container">
      <div class="row">
        <div class="col-xs-12">
			<h1>Administration</h1>
			<div class="row">
				<a href="<?=admin_courses_url() ?>">
			        <div class="col-sm-4">
			            <div class="panel panel-default">
							<div class="panel-body">
								<div class="panel-icon glyphicon glyphicon-book"></div>
								<div class="panel-content">	
									<h2><?=$courses_count ?></h2>
									courses
								</div>
							</div>
						</div>
			        </div>
				</a>
				<a href="<?=admin_camera_units_url() ?>">
			        <div class="col-sm-4">
			            <div class="panel panel-default">
							<div class="panel-body">
								<div class="panel-icon glyphicon glyphicon-camera"></div>
								<div class="panel-content">
									<h2><?=$camera_units_count ?></h2>
									<span class="">camera units</span>
								</div>
							</div>
						</div>
			        </div>
				</a>
				<a href="<?=admin_users_url() ?>">
			        <div class="col-sm-4">
			            <div class="panel panel-default">
							<div class="panel-body">
								<div class="panel-icon glyphicon glyphicon-user"></div>
								<div class="panel-content">
									<h2><?=$users_count ?></h2>
									<span class="">users</span>
								</div>
							</div>
						</div>
			        </div>
				</a>
			</div>
		</div>
	</div>
</div>