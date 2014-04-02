<div class="container">
	<div class="row">
		<div class="col-xs-12 course-detail">
			<ol class="breadcrumb clearfix">
				<li><a href="<?=browse_url() ?>">Browse</a></li>
				<li class="active"><?=$course->name ?> (<?=$course->code ?> <?=$course->period ?>)</li>
			</ol>
			<div class="row">
				<div class="col-sm-4 col-sm-push-8">
					<form role="form" id="course-period-select-form" class="form-horizontal">
						<div class="form-group">
							<label for="course-period-select" class="col-xs-4 control-label">
								Period
							</label>
							<div class="col-xs-8">
								<select id="course-period-select" class="form-control">
								<?php foreach($periods as $period): ?>
									<?php $selected = $course->period == $period->period ? ' selected' : ''; ?>
									<option<?=$selected ?> value="<?=course_url($course->code,$period->period) ?>"><?=$period->period ?></option>
								<?php endforeach; ?>
								</select>
							</div>
						</div>
					</form>
					<div class="clearfix"></div>
				</div>
				<div class="col-sm-8 col-sm-pull-4">
					<h1 class="course"><?=$course->name ?></h1>
				</div>
			</div>
			<span class="title">Lectures</span>
			<?=$lecture_list ?>
		</div>
	</div>
</div> <!-- /container -->