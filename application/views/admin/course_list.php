<div class="container">
      <div class="row">
        <div class="col-xs-12">
			<ol class="breadcrumb">
				<li class="active">Courses</li>
			</ol>

			<div class="message">
			<?=$message ?>
			</div>
			
			<h1>Courses</h1>
			<div class="table-responsive">
				<table class="table table-hover sortable">
					<thead>
						<tr>
							<th data-defaultsort="asc" data-mainsort="true">Course code</th>
							<th>Period</th>
							<th>Description</th>
							<th>Recorded lectures</th>
							<th data-defaultsort="disabled"></th>
							<th data-defaultsort="disabled"></th>
						</tr>
					</thead>
					<tbody>
						<?php foreach($courses as $course): ?>
						<tr>
							<td>
								<a href="<?=admin_course_url($course->code,$course->period) ?>">
									<?=$course->code ?>
								</a>
							</td>
							<td><?=$course->period ?></td>
							<td><?=$course->name ?></td>
							<td><?=$course->recorded_lectures ?></td>
							<td>
								<a class="delete-link" href="<?=admin_delete_course_url($course->code,$course->period) ?>">
									<span class="glyphicon glyphicon-remove"></span> Delete course
								</a>
							</td>
							<td>
								<a class="detail-link" href="<?=admin_course_url($course->code,$course->period) ?>">
									<span class="glyphicon glyphicon-arrow-right"></span> Show details
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