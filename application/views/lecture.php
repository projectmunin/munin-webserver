<div class="container">
	<!-- Example row of columns -->

	<div class="row">
		<div class="col-xs-12 lecture-detail">
			<ol class="breadcrumb">
				<li><a href="<?=browse_url() ?>">Browse</a></li>
				<li><a href="<?=course_url($lecture->course->code,$lecture->course->period) ?>"><?=$lecture->course->name ?> (<?=$lecture->course->code ?> <?=$lecture->course->period ?>)</a></li>
				<li class="active">Lecture <?=$lecture->startTime ?></li>
			</ol>
			<span class="course"><?=$lecture->course->name ?></span>
			<span class="title">Lecture</span>
			<h1><span class="date"><?=pretty_relative_time($lecture->startTime) ?></span> in <?=$lecture->lecture_hall_name ?></h1>
				<?php foreach($lecture_notes as $lecture_note): ?>
					<div class="lecture-note-row">
						<img src="<?=base_url(LECTURE_NOTES.$lecture_note->image) ?>" />
						<span class="meta">recorded at <span class="date"><?=$lecture_note->time ?></span></span>
						
							<div id="disqus_thread"></div>
						    <script type="text/javascript">
						        /* * * CONFIGURATION VARIABLES: EDIT BEFORE PASTING INTO YOUR WEBPAGE * * */
						        var disqus_shortname = 'projectmunin'; // required: replace example with your forum shortname
						
						        /* * * DON'T EDIT BELOW THIS LINE * * */
						        (function() {
						            var dsq = document.createElement('script'); dsq.type = 'text/javascript'; dsq.async = true;
						            dsq.src = '//' + disqus_shortname + '.disqus.com/embed.js';
						            (document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(dsq);
						        })();
						    </script>
						    
						    <script type="text/javascript">
								/* * * CONFIGURATION VARIABLES: EDIT BEFORE PASTING INTO YOUR WEBPAGE * * */
								var disqus_shortname = 'projectmunin'; // required: replace example with your forum shortname
								
								/* * * DON'T EDIT BELOW THIS LINE * * */
								(function () {
									var s = document.createElement('script'); s.async = true;
									s.type = 'text/javascript';
									s.src = '//' + disqus_shortname + '.disqus.com/count.js';
									(document.getElementsByTagName('HEAD')[0] || document.getElementsByTagName('BODY')[0]).appendChild(s);
								}());
							</script>
						    <noscript>Please enable JavaScript to view the <a href="http://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>    
					</div>
				<?php endforeach; ?>
		</div>
	</div>
</div> <!-- /container -->