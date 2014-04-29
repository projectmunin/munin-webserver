<?php foreach($lectures as $lecture): ?>
	<div class="lecture-row">
		<div class="col-sm-3 col-md-5">
			<div class="lecture-thumb">
				<a href="<?=lecture_url($lecture->id) ?>">
					<img class="lecture-thumb-img" src="<?=base_url(LECTURE_NOTES.$lecture->lecture_notes[0]->image) ?>" />
				</a>
			</div>
		</div>
		<div class="col-sm-9 col-md-7">
			<span class="lecture-row-time"><strong><?=pretty_relative_time($lecture->startTime) ?></strong> in <?=$lecture->lecture_hall_name ?></span>
			<span class="lecture-row-course-code"><?=$lecture->course->code ?></span>
			<span class="lecture-row-course-name"><?=$lecture->course->name ?></span>
			<a href="<?=course_url($lecture->course->code,$lecture->course->period)?>" class="lecture-row-course-link"><span></span></a>
			<a href="<?=lecture_url($lecture->id) ?>" class="lecture-row-meta"><?=count($lecture->lecture_notes) ?> recorded lecture notes</a>
		</div>
	</div>
<?php endforeach; ?>