<div class="container">
	<div class="row">
		<div class="col-xs-12">
			<ol class="breadcrumb">
				<li><a href="<?=admin_courses_url() ?>">Courses</a></li>
				<li><a href="<?=admin_course_url($lecture->course->code,$lecture->course->period) ?>"><?=$lecture->course->name ?> (<?=$lecture->course->code ?> <?=$lecture->course->period ?>)</a></li>
				<li class="active">Lecture <?=$lecture->id ?></li>
			</ol>
			<h1>Lecture</h1>
			<h3>Start Time: <?=$lecture->startTime ?></h2>
			<h3>End Time: <?=$lecture->endTime ?></h2>
			<h3>Location: <?=$lecture->lecture_hall_name ?></h2>
			<div class="table-responsive">
				<table class="table table-hover">
					<thead>
						<th>Id</th>
						<th>Image</th>
						<th>Time</th>
						<th>Processed</th>
						<th>Camera unit</th>
						<th></th>
					</thead>
					<tbody>
						<?php foreach($lecture_notes as $lecture_note): ?>
							<tr>
								<td>
									<?=$lecture_note->id ?>
								</td>
								<td>
									<a href="<?=base_url(LECTURE_NOTES.$lecture_note->image) ?>" class="lightbox">
										<img src="<?=base_url(LECTURE_NOTES.$lecture_note->image) ?>" style="max-width: 200px; width: 100%" />
									</a>
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
									<a class="delete-link" href="<?=admin_delete_lecture_note_url($lecture_note->id) ?>">
										<span class="glyphicon glyphicon-remove"></span> Delete lecture note
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