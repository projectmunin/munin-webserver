<div class="container">
      <div class="row">
        <div class="col-xs-12">
			<h1><?=$course->name ?> <?=$course->code ?> <?=$course->period ?></h1>
			<h2>Lectures</h2>
			<div class="table-responsive">
				<table class="table table-hover">
					<thead>
						<th>#</th>
						<th>Time</th>
						<th>Lecture hall</th>
						<th>Lecture notes</th>
					</thead>
					<tbody>
						<?php foreach($lectures as $lecture): ?>
							<td><?=$lecture->id ?></td>
							<td><?=$lecture->time ?></td>
							<td><?=$lecture->lecture_hall_name ?></td>
							<td>2</td>
						<?php endforeach; ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>