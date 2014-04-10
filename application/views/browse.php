<div class="container">
	<div class="row">
		<?php echo form_open("browse/search",array('class' => '', 'role' => 'form', 'method' => 'get'));?>

			<div class="col-xs-12 form-group<?php $class = form_error('s') ? ' has-error' : ''; echo $class; ?>">
				<label for="s" class="control-label">
					<?php echo lang('search_course_label');?>
				</label>
				<div class="input-group">
					<?php echo form_input('s', $s, 'class="form-control" placeholder="Course"');?>
					<span class="input-group-btn">
						<button type="submit" class="btn btn-primary">
							<span class="glyphicon glyphicon-search"></span>
							<?=lang('search_submit')?>
						</button>
					</span>
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