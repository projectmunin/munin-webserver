<div class="container">
      <div class="row">
        <div class="col-xs-12">
			<ol class="breadcrumb">
				<li><a href="<?=admin_courses_url() ?>">Courses</a></li>
				<li class="active"><?=$course->name ?> (<?=$course->code ?> <?=$course->period ?>)</li>
			</ol>
			<div class="message">
			<?=$message ?>
			</div>
			<div class="row">
				<div class="col-sm-3 col-sm-push-9 text-right">
					<a href="<?=admin_delete_course_url($course->code,$course->period) ?>" class="btn btn-danger">Delete course</a>
				</div>
				<div class="col-sm-9 col-sm-pull-3">
					<h1><?=$course->name ?> <?=$course->code ?> <?=$course->period ?></h1>
				</div>
			</div>
			<h2>Lectures</h2>
			<div class="table-responsive">
				<table class="table table-hover sortable">
					<thead>
						<tr>
							<th>Id</th>
							<th data-defaultsort="desc" data-mainsort="true">Start Time</th>
							<th>End Time</th>
							<th>Lecture hall</th>
							<th># Lecture notes</th>
							<th data-defaultsort="disabled"></th>
							<th data-defaultsort="disabled"></th>
						</tr>
					</thead>
					<tbody>
						<?php foreach($lectures as $lecture): ?>
						<tr>
							<td><a href="<?=admin_lecture_url($lecture->id) ?>"><?=$lecture->id ?></a></td>
							<td><?=$lecture->startTime ?></td>
							<td><?=$lecture->endTime ?></td>
							<td><?=$lecture->lecture_hall_name ?></td>
							<td><?php echo count($lecture->lecture_notes) ?></td>
							<td>
								<a href="<?=admin_delete_lecture_url($lecture->id) ?>" class="delete-link">
									<span class="glyphicon glyphicon-remove"></span> Delete lecture
								</a>
							</td>
							<td>
								<a href="<?=admin_lecture_url($lecture->id) ?>" class="detail-link">
									<span class="glyphicon glyphicon-arrow-right"></span> Show lecture notes
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