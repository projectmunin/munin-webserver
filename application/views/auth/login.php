<div class="row">
<div class="col-xs-12">

<div id="logo">
	<?php include(IMAGES.'tavlan.svg'); ?>
</div>

<h1><?php echo lang('login_heading');?></h1>
<p><?php echo lang('login_subheading');?></p>

<div><?php echo $message; ?></div>

<?php echo form_open("auth/login",array('class' => 'form-horizontal', 'role' => 'form'));?>

	<div class="form-group<?php $class = form_error('identity') ? ' has-error' : ''; echo $class; ?>">
		<label for="identity" class="col-sm-4 control-label">
			<?php echo lang('login_identity_label');?>
		</label>
		<div class="col-sm-8">
			<?php echo form_input($identity, '', 'class="form-control"');?>
		</div>
	</div>

	<div class="form-group<?php $class = form_error('password') ? ' has-error' : ''; echo $class; ?>">
		<label for="password" class="col-sm-4 control-label">
			<?php echo lang('login_password_label', 'password');?>
		</label>
		<div class="col-sm-8">
			<?php echo form_input($password, '', 'class="form-control"');?>
		</div>
	</div>

	<div class="form-group<?php $class = form_error('remember') ? ' has-error' : ''; echo $class; ?>">
		<label for="remember" class="col-sm-4 control-label">
			<?php echo lang('login_remember_label', 'remember');?>
		</label>
		<div class="col-sm-8">
			<?php echo form_checkbox('remember', '1', FALSE, 'id="remember" class="form-control"');?>
		</div>
	</div>

	<div class="form-group">
		<div class="col-sm-offset-4 col-sm-8">
			<?php echo form_submit('submit', lang('login_submit_btn'), 'class="btn btn-default"');?>
		</div>
	</div>

<?php echo form_close();?>

<div class="form-group">
		<div class="col-sm-offset-4 col-sm-8">
			<p><a href="/register">Register new user</a></p>
			<p><a href="forgot_password"><?php echo lang('login_forgot_password');?></a></p>
		</div>
</div>
</div>
</div>
