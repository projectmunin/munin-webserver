<div class="container">
	<!-- Example row of columns -->

	<div class="row">
		<div class="col-xs-12">
			<ol class="breadcrumb">
				<li><a href="<?=course_url($lecture->course->code,$lecture->course->period) ?>"><?=$lecture->course->name ?> (<?=$lecture->course->code ?> <?=$lecture->course->period ?>)</a></li>
				<li class="active">Lecture <?=$lecture->time ?></li>
			</ol>
			<h1>Lecture </h1>
			<?php var_dump($lecture) ?>
			<?php var_dump($lecture_notes) ?>
			<div class="lecture-note-row">
				<?php foreach($lecture_notes as $lecture_note): ?>
					<img class="lecture-note-img" src="<?=base_url(LECTURE_NOTES.$lecture_note->image) ?>" />
			</div>
			<?php endforeach; ?>
		</div>
	</div>
</div> <!-- /container -->