<div class="container">
	<div class="row">
		<div class="col-xs-12">
			<ol class="breadcrumb">
				<li class="active">Users</li>
			</ol>
			<div id="infoMessage"><?php echo $message;?></div>
			<div class="row">
				<div class="col-sm-4 col-sm-push-8 text-right">
					<a href="/admin/users/add" class="btn btn-success">Add user</a>
				</div>
				<div class="col-sm-8 col-sm-pull-4">
					<h1>Manage users</h1>
				</div>
			</div>

			<table class="table table-hover sortable">
				<thead>
					<tr>
						<th data-defaultsort="asc" data-mainsort="true">Email</th>
						<th>First name</th>
						<th>Last name</th>
						<th>Groups</th>
						<th>Active</th>
						<th data-defaultsort="disabled"></th>
						<th data-defaultsort="disabled"></th>
					</tr>
				</thead>
				<tbody>
					<?php foreach($users as $user): ?>
					<tr>
						<td><?=$user->email ?></td>
						<td><?=$user->first_name ?></td>
						<td><?=$user->last_name ?></td>
						<td>
							<?php foreach ($user->groups as $group):?>
								<?php echo $group->name; ?><br />
							<?php endforeach?>
						</td>
						<td>
							<?php
								echo ($user->active) ? 
									lang('index_active_link') 
									: lang('index_inactive_link');
								?>
						</td>
						<td>
							<?php if($user->id != $current_user->id): ?>
								<a class="delete-link" href="<?="/admin/users/edit/".$user->id."/delete" ?>">
									<span class="glyphicon glyphicon-remove"></span> Delete user
								</a>
							<?php endif; ?>
						</td>
						<td>
							<a class="detail-link" href="<?="/admin/users/edit/".$user->id ?>">
								<span class="glyphicon glyphicon-pencil"></span> Edit user
							</a>
						</td>
					</tr>
					<?php endforeach; ?>
				</tbody>
			</table>
		</div>
	</div>
</div>