<div class="container">
	<div class="row">
		<?php echo form_open("browse/search",array('class' => '', 'role' => 'form', 'method' => 'get'));?>

			<div class="col-xs-8 col-sm-10 form-group<?php $class = form_error('s') ? ' has-error' : ''; echo $class; ?>">
				<label for="s" class="control-label">
					<?php echo lang('search_course_label');?>
				</label>
				<div>
					<?php echo form_input('s', $s, 'class="form-control" placeholder="Course"');?>
				</div>
			</div>

			<div class="form-group col-xs-4 col-sm-2">
				<label>&nbsp;</label>
				<div>
					<button type="submit" class="btn btn-primary home-search-submit">
						<span class="glyphicon glyphicon-search"></span>
						<?=lang('search_submit')?>
					</button>
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