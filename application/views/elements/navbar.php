    <div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="/">Project Munin</a>
        </div>
        <div class="navbar-collapse collapse">
          <?php /* echo form_open("auth/login",array('class' => 'navbar-form navbar-right', 'role' => 'form'));?>

            <div class="form-group">
              <label for="identity" class="control-label sr-only">
                <?php echo lang('login_identity_label');?>
              </label>
                <?php echo form_input('identity', '', 'class="form-control" placeholder="Email"');?>
            </div>

            <div class="form-group">
              <label for="password" class="control-label sr-only">
                <?php echo lang('login_password_label', 'password');?>
              </label>
                <?php echo form_input('password', '', 'class="form-control" placeholder="Password"');?>
            </div>

            <div class="checkbox">
              <label>
                <?php echo form_checkbox('remember', '1', FALSE, 'id="remember"');?>
                <?php echo lang('login_remember_label_short', 'remember');?>
                </label>
            </div>

            <?php echo form_submit('submit', lang('login_submit_btn'), 'class="btn btn-success"');?>
            
          <?php echo form_close(); */?>
		  <?php if($logged_in): ?>
			<div class="navbar-right">
				<p class="navbar-text">Signed in as <?=$user ?> </p>
				<?php if($is_admin): ?>
					<a href="<?=admin_url() ?>" class="btn btn-default navbar-btn">Admin Panel</a>
				<?php endif; ?>
				<a href="/auth/logout" class="btn btn-danger navbar-btn">Log out</a>
			</div>
		  <?php endif; ?>
        </div><!--/.navbar-collapse -->
      </div>
    </div>