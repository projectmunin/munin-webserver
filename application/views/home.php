<!-- Main jumbotron for a primary marketing message or call to action -->
<div class="jumbotron">
	<div class="container">
		<h1><?=lang('home_welcome') ?></h1>
		<p><?=lang('home_welcome_paragraph') ?></p>
		<p><a class="btn btn-primary btn-lg">Learn more &raquo;</a></p>
	</div>
</div>

<div class="container">
	<div class="row">
		<div class="col-xs-12">
			<h1>Latest lecture notes</h1>
			<?php var_dump($lecture_notes); ?>

			<?php foreach($lecture_notes as $lecture_note): ?>

				<img class="lecture-note-img" src="<?=base_url(LECTURE_NOTES.$lecture_note->image) ?>" />
			<?php endforeach; ?>
		</div>
	</div>
	<div class="row">
		<div class="col-lg-4">
			<h2>Heading</h2>
			<p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p>
			<p><a class="btn btn-default" href="#">View details &raquo;</a></p>
		</div>
		<div class="col-lg-4">
			<h2>Heading</h2>
			<p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p>
			<p><a class="btn btn-default" href="#">View details &raquo;</a></p>
		</div>
		<div class="col-lg-4">
			<h2>Heading</h2>
			<p>Donec sed odio dui. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Vestibulum id ligula porta felis euismod semper. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus.</p>
			<p><a class="btn btn-default" href="#">View details &raquo;</a></p>
		</div>
	</div>
</div> <!-- /container -->