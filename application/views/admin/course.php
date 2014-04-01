<div class="container">
      <div class="row">
        <div class="col-xs-12">
			<ol class="breadcrumb">
				<li><a href="<?=admin_courses_url() ?>">Courses</a></li>
				<li class="active"><?=$course->name ?> (<?=$course->code ?> <?=$course->period ?>)</li>
			</ol>

			<h1><?=$course->name ?> <?=$course->code ?> <?=$course->period ?></h1>
			<h2>Lectures</h2>
			<div class="table-responsive">
				<table class="table table-hover">
					<thead>
						<th>#</th>
						<th>Time</th>
						<th>Lecture hall</th>
						<th>Lecture notes</th>
						<th>Manage lecture</th>
					</thead>
					<tbody>
						<?php foreach($lectures as $lecture): ?>
							<td><?=$lecture->id ?></td>
							<td><?=$lecture->time ?></td>
							<td><?=$lecture->lecture_hall_name ?></td>
							<td><a href="<?=admin_lecture_url($lecture->id) ?>">2</a></td>
							<td><a href="#">Delete lecture</a></td>
						<?php endforeach; ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>