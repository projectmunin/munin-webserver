<div class="container">
      <div class="row">
        <div class="col-xs-12">
			<ol class="breadcrumb">
				<li class="active">Camera Units</li>
			</ol>
			<h2>Camera Units</h2>
			<div class="table-responsive">
				<table class="table table-hover sortable">
					<thead>
						<tr>
							<th data-defaultsort="asc" data-mainsort="true">Name</th>
							<th>Lecture hall</th>
							<th>IP address</th>
							<th>Status</th>
							<th data-defaultsort="disabled"></th>
						</tr>
					</thead>
					<tbody>
						<?php foreach($camera_units as $camera_unit): ?>
						<tr>
							<td><?=$camera_unit->name ?></td>
							<td><?=$camera_unit->lecture_hall_name ?></td>
							<td><?=$camera_unit->ip_address ?></td>
							<td><span class="camera-status-icon" data-name="<?=$camera_unit->name ?>"><span class="camera-status-loading"></span></span></td>
							<td>
								<a class="detail-link" href="<?php echo admin_camera_unit_url($camera_unit->name) ?>">
									<span class="glyphicon glyphicon-arrow-right"></span> Configure
								</a>
							</td>
						</tr>
						<?php endforeach; ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>