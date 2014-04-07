<div class="container">
	<div class="row">
		<div class="col-xs-12">
			<ol class="breadcrumb">
				<li class="active">Register for Project Munin</li>
			</ol>
			
			<h1>Register for Project Munin</h1>
			<p>Use your email provided by your faculty</p>
			
			<div id="infoMessage"><?php echo $message;?></div>
			<div class="col-md-8 col-lg-6">
				<?php echo form_open("register",array('class' => 'form-horizontal', 'role' => 'form'));?>
						<div class="form-group<?php $class = form_error('email') ? ' has-error' : ''; echo $class; ?>">
							<label for="email" class="col-sm-4 control-label">
								<?php echo lang('create_user_email_label', 'email');?>
							</label>
							<div class="col-sm-8">
								<?php echo form_input($email, '', 'class="form-control"');?>
							</div>
						</div>				
						<div class="form-group<?php $class = form_error('first_name') ? ' has-error' : ''; echo $class; ?>">
							<label for="first_name" class="col-sm-4 control-label">
								<?php echo lang('create_user_fname_label', 'first_name');?>
							</label>
							<div class="col-sm-8">
								<?php echo form_input($first_name, '', 'class="form-control"');?> 
							</div>
						</div>
						<div class="form-group<?php $class = form_error('last_name') ? ' has-error' : ''; echo $class; ?>">
							<label for="last_name" class="col-sm-4 control-label">
								<?php echo lang('create_user_lname_label', 'last_name');?>
							</label>
							<div class="col-sm-8">
								<?php echo form_input($last_name, '', 'class="form-control"');?>
							</div>
						</div>
						<div class="form-group<?php $class = form_error('password') ? ' has-error' : ''; echo $class; ?>">
							<label for="password" class="col-sm-4 control-label">
								<?php echo lang('create_user_password_label', 'password');?>
							</label>
							<div class="col-sm-8">
								<?php echo form_input($password, '', 'class="form-control"');?>
							</div>
						</div>
						<div class="form-group<?php $class = form_error('password_confirm') ? ' has-error' : ''; echo $class; ?>">
							<label for="password_confirm" class="col-sm-4 control-label">
								<?php echo lang('create_user_password_confirm_label', 'password_confirm');?>
							</label>
							<div class="col-sm-8">
								<?php echo form_input($password_confirm, '', 'class="form-control"');?>
							</div>
						</div>
	
						<div class="form-group">
							<div class="col-sm-12 text-right">
								<button type="submit" class="btn btn-primary"><?=lang('create_user_submit_btn')?></button>
							</div>
						</div>
				<?php echo form_close();?>
			</div>
		</div>
	</div>
</div>