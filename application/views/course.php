<div class="container">
	<div class="row">
		<div class="col-xs-12 course-detail">
			<ol class="breadcrumb clearfix">
				<li><a href="<?=browse_url() ?>">Browse</a></li>
				<li class="active"><?=$course->name ?> (<?=$course->code ?> <?=$course->period ?>)</li>
			</ol>
			<form>
				<select id="course-period-select" class="form-control pull-right">
					<option value="VT14">VT14</option>
					<option value="VT13">VT13</option>
				</select>
			</form>
			<span class="course"><?=$course->name ?></span>
			<span class="title">Lectures</span>
			<?=$lecture_list ?>
		</div>
	</div>
</div> <!-- /container -->