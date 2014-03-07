<div class="container">
	<!-- Example row of columns -->

	<div class="row">
		<div class="col-xs-12">
			<h1>Lecture </h1>
			<?php var_dump($lecture) ?>
			<?php var_dump($lecture_notes) ?>
			<?php foreach($lecture_notes as $lecture_note): ?>
				<img class="lecture-note-img" src="<?=base_url(LECTURE_NOTES.$lecture_note->image) ?>" />
			<?php endforeach; ?>
		</div>
	</div>
</div> <!-- /container -->