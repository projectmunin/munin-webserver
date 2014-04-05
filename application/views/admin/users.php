<div class="container">
	<div class="row">
		<div class="col-xs-12">
			<ol class="breadcrumb">
				<li class="active">Users</li>
			</ol>
			<div id="infoMessage"><?php echo $message;?></div>
			<h1>Manage users</h1>
			<a href="/admin/users/add" class="btn btn-success">Add user</a>
			<table class="table table-hover sortable">
				<thead>
					<tr>
						<th data-defaultsort="asc" data-mainsort="true">Username</th>
						<th>Email</th>
						<th>First</th>
						<th>Last name</th>
						<th data-defaultsort="disabled"></th>
						<th data-defaultsort="disabled"></th>
					</tr>
				</thead>
				<tbody>
					<?php foreach($users as $user): ?>
					<tr>
						<td>
							<?=$user->username ?>
						</td>
						<td><?=$user->email ?></td>
						<td><?=$user->first_name ?></td>
						<td><?=$user->last_name ?></td>
						<td>
							<a class="delete-link" href="#">
								<span class="glyphicon glyphicon-remove"></span> Delete user
							</a>
						</td>
						<td>
							<a class="detail-link" href="#">
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