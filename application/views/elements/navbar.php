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
          <!--ul class="nav navbar-nav">
            <li class="active"><a href="/">Home</a></li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown <b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li><a href="#">Action</a></li>
                <li><a href="#">Another action</a></li>
                <li><a href="#">Something else here</a></li>
                <li class="divider"></li>
                <li class="dropdown-header">Nav header</li>
                <li><a href="#">Separated link</a></li>
                <li><a href="#">One more separated link</a></li>
              </ul>
            </li>
          </ul-->
          <?php echo form_open("auth/login",array('class' => 'navbar-form navbar-right', 'role' => 'form'));?>

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
            
          <?php echo form_close();?>
        </div><!--/.navbar-collapse -->
      </div>
    </div>