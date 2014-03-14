<div class="container">
	<div class="row">
		<?php echo form_open("browse/search",array('class' => '', 'role' => 'form', 'method' => 'get'));?>

			<div class="col-xs-8 form-group<?php $class = form_error('s') ? ' has-error' : ''; echo $class; ?>">
				<label for="s" class="control-label">
					<?php echo lang('search_course_label');?>
				</label>
				<div>
					<?php echo form_input('s', $s, 'class="form-control" placeholder="Course"');?>
				</div>
			</div>

			<div class="form-group col-xs-4">
				<label>&nbsp;</label>
				<div>
					<?php echo form_submit('', lang('search_submit'), 'class="btn btn-default"');?>
				</div>
			</div>
		<?php echo form_close();?>
	</div>
	<div class="row">
		<div class="col-xs-12">
			<?=$content ?>
		</div>
	</div>
</div> <!-- /container -->