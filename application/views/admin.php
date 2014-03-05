<div class="container">
      <div class="row">
        <div class="col-xs-12">
			<h1>Courses</h1>
			<div class="table-responsive">
				<table class="table table-hover">
					<thead>
						<th>Course code</th>
						<th>Period</th>
						<th>Description</th>
						<th>Recorded lectures</th>
						<th>Manage lectures</th>
					</thead>
					<tbody>
						<?php foreach($courses as $course): ?>
							<td><?=$course->code ?></td>
							<td><?=$course->period ?></td>
							<td><?=$course->name ?></td>
							<td><?=$course->recorded_lectures ?></td>
							<td><a href="<?=site_url('/admin/courses/'.$course->code.'/'.$course->period) ?>">List lectures</a> <a href="<?=site_url('/admin/courses/'.$course->code.'/'.$course->period.'/delete') ?>">Delete course</a></td>
						<?php endforeach; ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>