<div class="container">
      <div class="row">
        <div class="col-xs-12">
			<ol class="breadcrumb">
				<li><a href="<?=admin_users_url() ?>">Users</a></li>
				<li class="active">Delete user <?=$user->id ?></li>
			</ol>
			<h1>Delete user</h1>
			<p>Are you really sure you want to delete the user <strong><?=$user->email ?></strong>?<br>
			<span class="text-danger">This action is non-reversable.</span></p>
			<?php echo form_open("admin/users/edit/$user->id/delete",array('role' => 'form'));?>
				<input type="hidden" name="action" value="delete">
				<button type="submit" class="btn btn-danger">Delete</button>
				<a href="<?=admin_users_url() ?>" class="btn btn-default">Cancel</a>
			<?php echo form_close(); ?>
		</div>
	</div>
</div>