<?php foreach($courses as $course): ?>
	<div class="course-row">

		<a class="" href="<?=site_url('course/'.$course->code.'/'.$course->period) ?>"><?=$course->name ?></span>
		<a class="" href="<?=site_url('course/'.$course->code.'/'.$course->period) ?>"><?=$course->code ?> <?=$course->period ?></span>
	</div>
<?php endforeach; ?>