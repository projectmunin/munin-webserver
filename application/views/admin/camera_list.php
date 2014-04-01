<div class="container">
      <div class="row">
        <div class="col-xs-12">
			<ol class="breadcrumb">
				<li class="active">Camera Units</li>
			</ol>
			<h2>Camera Units</h2>
			<div class="table-responsive">
				<table class="table table-hover">
					<thead>
						<th>Name</th>
						<th>Lecture hall</th>
						<th>IP address</th>
						<th>Configure</th>
					</thead>
					<tbody>
						<?php foreach($camera_units as $camera_unit): ?>
							<td><?=$camera_unit->name ?></td>
							<td><?=$camera_unit->lecture_hall_name ?></td>
							<td><?=$camera_unit->ip_address ?></td>
							<td><a href="<?php echo admin_camera_unit_url($camera_unit->name) ?>">Configure</a></td>
						<?php endforeach; ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>