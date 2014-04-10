<div class="container">
      <div class="row">
        <div class="col-xs-12">
			<ol class="breadcrumb">
				<li><a href="<?=admin_courses_url() ?>">Courses</a></li>
				<li><a href="<?=admin_course_url($lecture->course->code,$lecture->course->period) ?>"><?=$lecture->course->name ?> (<?=$lecture->course->code ?> <?=$lecture->course->period ?>)</a></li>
				<li><a href="<?=admin_lecture_url($lecture->id) ?>">Lecture <?=$lecture->id ?></a></li>
				<li class="active">Delete lecture note</li>
			</ol>
			<h1>Delete lecture note <?=$lecture_note->id ?></h1>
			<p>Are you really sure you want to delete the lecture note?<br>
			<span class="text-danger">This action is non-reversable.</span></p>
			<?php echo form_open("admin/lecture_note/$lecture_note->id/delete",array('role' => 'form'));?>
				<input type="hidden" name="action" value="delete">
				<button type="submit" class="btn btn-danger">Delete</button>
				<a href="<?=admin_lecture_url($lecture->id) ?>" class="btn btn-default">Cancel</a>
			<?php echo form_close(); ?>
		</div>
	</div>
</div>