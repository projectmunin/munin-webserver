<div class="container">
	<div class="row">
		<?php echo form_open("browse/search",array('class' => '', 'role' => 'form', 'method' => 'get'));?>

			<div class="col-xs-12">
			
				<h4><?php echo lang('search_course_label');?></h4>
				<div id="browse-search">
					<span id="browse-search-icon"><span class="spinner"></span><span class="icon"></span></span>
					<?php echo form_input('s', $s, 'autocomplete="off" id="browse-search-field" class="form-control" placeholder="'.lang('search_course_placeholder').'"');?>
					<!--span class="input-group-btn">
						<button type="submit" class="btn btn-primary">
							<span class="glyphicon glyphicon-search"></span>
							<?=lang('search_submit')?>
						</button>
					</span-->
				</div>
			</div>
		<?php echo form_close();?>
	</div>
	<div class="row">
		<div class="col-xs-12">
			<div id="browse-content">
				<?=$content ?>
			</div>
		</div>
	</div>
</div> <!-- /container -->