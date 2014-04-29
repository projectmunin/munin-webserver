<div class="container">
	  <div class="row">
		<div class="col-xs-12">
			<ol class="breadcrumb">
				<li><a href="<?=admin_camera_units_url() ?>">Camera Units</a></li>
				<li class="active"><?=$camera_unit->name ?></li>
			</ol>

			<span class="type">Camera Unit</span>
			<h1><?=$camera_unit->name ?></h1>
			<div id="camera_unit-config-status" class="alert alert-info" style="display:none">
				
			</div>
			<?php if($message != ''): ?>
				<?=$message ?>
			<?php endif; ?>
			<form id="camera_unit-config-form" class="form-horizontal" role="form" method="post">
				<div class="form-group">
					<label for="name" class="col-sm-2 control-label">Status</label>
					<div class="col-sm-10">
						<span class="camera-status-icon" data-name="<?=$camera_unit->name ?>"><span class="camera-status-loading"></span></span>
					</div>
				</div>
				<div class="form-group">
					<label for="name" class="col-sm-2 control-label">Camera Unit Name</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="name" placeholder="Name" value="<?=$camera_unit->name ?>">
					</div>
				</div>
				<div class="form-group">
					<label for="ip-address" class="col-sm-2 control-label">Camera Unit IP </label>
					<div class="col-sm-10">
						<span class="form-control"><?=$camera_unit->ip_address; ?></span>
					</div>
				</div>
				<div class="form-group">
					<label for="location" class="col-sm-2 control-label">Location</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="location" placeholder="Location" value="<?=$camera_unit->lecture_hall_name ?>">
					</div>
				</div>
				<div class="form-group">
					<label for="location" class="col-sm-2 control-label">Password</label>
					<div class="col-sm-10">
						<span class="form-control"><?=$camera_unit->password ?></span>
					</div>
				</div>
				<div class="form-group">
					<label for="location" class="col-sm-2 control-label">Server Password</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="server_password" placeholder="Sets a password for the test account on this server" value="">
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-offset-2 col-sm-10">
						<button type="submit" class="btn btn-primary pull-right">Store config</button>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>