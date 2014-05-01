<?php foreach($lectures as $lecture): ?>
	<div class="lecture-row row">
		<div class="col-sm-5">
			<span class="lecture-row-time"><strong><?=pretty_relative_time($lecture->startTime) ?></strong> in <?=$lecture->lecture_hall_name ?></span>
			<span class="lecture-row-course-code"><?=$lecture->course->code ?></span>
			<span class="lecture-row-course-name"><?=$lecture->course->name ?></span>
			<a href="<?=course_url($lecture->course->code,$lecture->course->period)?>" class="lecture-row-course-link"><span></span></a>
			<a href="<?=lecture_url($lecture->id) ?>" class="lecture-row-meta"><?=count($lecture->lecture_notes) ?> recorded lecture notes</a>
		</div>
		<div class="col-sm-7">
		<table class="lecture-thumbs">
			<tr>
				<td>
					<div class="lecture-thumb">
						<?php if(isset($lecture->lecture_notes[0])): ?>
							<a href="<?=lecture_url($lecture->id) ?>">
								<img class="lecture-thumb-img" src="<?=base_url(image_thumb(LECTURE_NOTES.$lecture->lecture_notes[0]->image,445,100)) ?>" />
							</a>
						<?php endif; ?>
					</div>
				</td>
				<td>
					<div class="lecture-thumb">
						<?php if(isset($lecture->lecture_notes[1])): ?>
							<a href="<?=lecture_url($lecture->id) ?>">
								<img class="lecture-thumb-img" src="<?=base_url(image_thumb(LECTURE_NOTES.$lecture->lecture_notes[1]->image,445,100)) ?>" />
							</a>
						<?php endif; ?>
					</div>
				</td>
				<td>
					<div class="lecture-thumb">
						<?php if(isset($lecture->lecture_notes[2])): ?>
							<a href="<?=lecture_url($lecture->id) ?>">
								<img class="lecture-thumb-img" src="<?=base_url(image_thumb(LECTURE_NOTES.$lecture->lecture_notes[2]->image,445,100)) ?>" />
							</a>
						<?php endif; ?>
					</div>
				</td>
				<td>
					<div class="lecture-thumb">
						<?php if(isset($lecture->lecture_notes[3])): ?>
							<a href="<?=lecture_url($lecture->id) ?>">
								<img class="lecture-thumb-img" src="<?=base_url(image_thumb(LECTURE_NOTES.$lecture->lecture_notes[3]->image,445,100)) ?>" />
							</a>
						<?php endif; ?>
					</div>
				</td>
			</tr>
		</table>
		</div>
	</div>
<?php endforeach; ?>