<?php foreach($courses as $course): ?>
	<div class="course-row">
		<a class="" href="<?=course_url($course->code,$course->latest_period) ?>">
			<span class="course-list-code"><?=$course->code ?></span>
			<span class="course-list-name"><?=$course->name ?></span>
		</a>
		
		<span class="course-list-lecture-count">Recorded lectures <span class="course-list-lecture-count-value"><?=$course->recorded_lectures ?></span></span>

	</div>
<?php endforeach; ?>