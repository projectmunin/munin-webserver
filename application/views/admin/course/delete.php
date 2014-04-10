<div class="container">
      <div class="row">
        <div class="col-xs-12">
			<ol class="breadcrumb">
				<li><a href="<?=admin_courses_url() ?>">Courses</a></li>
				<li><a href="<?=admin_course_url($course->code,$course->period) ?>"><?=$course->name ?> (<?=$course->code ?> <?=$course->period ?>)</a></li>
				<li class="active">Delete course</li>
			</ol>
			<h1>Delete course <?=$course->name ?></h1>
			<p>Are you really sure you want to delete the entire course?<br>
			All lectures including its lecture notes will be deleted as well.<br>
			<span class="text-danger">This action is non-reversable.</span></p>
			<?php echo form_open("admin/courses/$course->code/$course->period/delete",array('role' => 'form'));?>
				<input type="hidden" name="action" value="delete">
				<button type="submit" class="btn btn-danger">Delete</button>
				<a href="<?=admin_course_url($course->code,$course->period) ?>" class="btn btn-default">Cancel</a>
			<?php echo form_close(); ?>
		</div>
	</div>
</div>