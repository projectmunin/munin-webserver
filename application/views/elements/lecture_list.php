<?php foreach($lectures as $lecture): ?>
	<div class="lecture-row">
		<div class="lecture-thumb">
			<a href="<?=site_url('lecture/'.$lecture->id) ?>">
				<img class="lecture-thumb-img" src="<?=base_url(LECTURE_NOTES.$lecture->lecture_note->image) ?>" />
			</a>
		</div>
		<h3><?=$lecture->course->name ?></h3>
		<span class="lecture-row-time"><?=pretty_relative_time($lecture->time) ?></span>
		<span class="lecture-row-course"><?=$lecture->course->code ?> <?=$lecture->course->period ?></span>
	</div>
<?php endforeach; ?>