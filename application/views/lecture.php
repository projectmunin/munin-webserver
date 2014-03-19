<div class="container">
	<!-- Example row of columns -->

	<div class="row">
		<div class="col-xs-12 lecture-detail">
			<ol class="breadcrumb">
				<li><a href="<?=browse_url() ?>">Browse</a></li>
				<li><a href="<?=course_url($lecture->course->code,$lecture->course->period) ?>"><?=$lecture->course->name ?> (<?=$lecture->course->code ?> <?=$lecture->course->period ?>)</a></li>
				<li class="active">Lecture <?=$lecture->time ?></li>
			</ol>
			<span class="course"><?=$lecture->course->name ?></span>
			<span class="title">Lecture</span>
			<h1><span class="date"><?=pretty_relative_time($lecture->time) ?></span> in <?=$lecture->lecture_hall_name ?></h1>
				<?php foreach($lecture_notes as $lecture_note): ?>
					<div class="lecture-note-row">
						<img src="<?=base_url(LECTURE_NOTES.$lecture_note->image) ?>" />
						<span class="meta">recorded at <span class="date"><?=$lecture_note->time ?></span></span>
					</div>
				<?php endforeach; ?>
		</div>
	</div>
</div> <!-- /container -->