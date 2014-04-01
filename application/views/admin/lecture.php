<div class="container">
	<div class="row">
		<div class="col-xs-12">
			<ol class="breadcrumb">
				<li><a href="<?=admin_courses_url() ?>">Courses</a></li>
				<li><a href="<?=admin_course_url($lecture->course->code,$lecture->course->period) ?>"><?=$lecture->course->name ?> (<?=$lecture->course->code ?> <?=$lecture->course->period ?>)</a></li>
				<li class="active">Lecture <?=$lecture->time ?></li>
			</ol>
			<h1>Lecture</h1>
			<h3>Date: <?=$lecture->time ?></h2>
			<h3>Location: <?=$lecture->lecture_hall_name ?></h2>
			<div class="table-responsive">
				<table class="table table-hover">
					<thead>
						<th>Id</th>
						<th>Image</th>
						<th>Time</th>
						<th>Processed</th>
						<th>Camera unit</th>
						<th>Manage</th>
					</thead>
					<tbody>
						<?php foreach($lecture_notes as $lecture_note): ?>
							<tr>
								<td>
									<?=$lecture_note->id ?>
								</td>
								<td>
									<img src="<?=base_url(LECTURE_NOTES.$lecture_note->image) ?>" style="max-width: 200px; width: 100%" />
								</td>
								<td>
									<?=$lecture_note->time ?>
								</td>
								<td>
									<?=$lecture_note->processed ?>
								</td>
								<td>
									<a href="<?=admin_camera_unit_url($lecture_note->camera_unit_name) ?>"><?=$lecture_note->camera_unit_name ?></a>
								</td>
								<td>
									<a href="#">Delete</a>
								</td>
							</tr>
						<?php endforeach; ?>

					</tbody>
				</table>
			</div>

		</div>
	</div>
</div>