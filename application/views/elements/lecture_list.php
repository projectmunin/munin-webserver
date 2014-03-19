<?php foreach($lectures as $lecture): ?>
	<div class="lecture-row">
		<div class="lecture-thumb">
			<a href="<?=lecture_url($lecture->id) ?>">
				<img class="lecture-thumb-img" src="<?=base_url(LECTURE_NOTES.$lecture->lecture_note->image) ?>" />
			</a>
		</div>
		<span class="lecture-row-time"><?=pretty_relative_time($lecture->time) ?></span>
		<a class="lecture-row-course-name" href="<?=course_url($lecture->course->code,$lecture->course->period) ?>"><?=$lecture->course->name ?></span>
		<a class="lecture-row-course-code" href="<?=course_url($lecture->course->code,$lecture->course->period) ?>"><?=$lecture->course->code ?> <?=$lecture->course->period ?></span>
	</div>
<?php endforeach; ?>