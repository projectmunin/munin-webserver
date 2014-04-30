<?php foreach($courses as $course): ?>
	<a class="course-row-link" href="<?=course_url($course->code,$course->latest_period) ?>">
		<div class="course-row">
			<span class="course-list-icon"></span>
			<span class="course-list-code"><?=$course->code ?></span>
			<span class="course-list-name"><?=$course->name ?></span>
	
			
			<span class="course-list-lecture-count">Recorded lectures <span class="course-list-lecture-count-value"><?=$course->recorded_lectures ?></span></span>
	
		</div>
	</a>
<?php endforeach; ?>