
var Site = {
	replacedContent: null,
	ajaxSearchRequest: null
};
$(document).ready(function() {
	$('body').removeClass('nojs');
	$('a.lightbox').nivoLightbox();
	
	var spinner_opts = {
			lines: 8, // The number of lines to draw
			length: 3, // The length of each line
			width: 2, // The line thickness
			radius: 3, // The radius of the inner circle
			corners: 1, // Corner roundness (0..1)
			rotate: 0, // The rotation offset
			direction: 1, // 1: clockwise, -1: counterclockwise
			color: '#000', // #rgb or #rrggbb or array of colors
			speed: 1, // Rounds per second
			trail: 60, // Afterglow percentage
			shadow: false, // Whether to render a shadow
			hwaccel: false, // Whether to use hardware acceleration
			className: 'jsspinner', // The CSS class to assign to the spinner
			zIndex: 2e9, // The z-index (defaults to 2000000000)
		};
		
		$("#browse-search-icon .spinner").each(function(){
			var spinner = new Spinner(spinner_opts).spin();
			$(this).append($(spinner.el));
		});
	
	$('#browse-search-field').focus();
	
	$('#browse-search-field').keyup(function() {
		var search = $(this).val();
		
		$('#browse-search-icon').addClass('loading');
		
		if(search === '')
		{
			if(Site.ajaxSearchRequest)
			{
				Site.ajaxSearchRequest.abort();
			}
			
			Site.ajaxSearchRequest = $.get("/browse", {s:search}, function( data ){
				$("#browse-content").html(data);
				$('#browse-search-icon').removeClass('loading');
			});
		}
		else
		{
			if(Site.ajaxSearchRequest)
			{
				Site.ajaxSearchRequest.abort();
			}
			
			Site.ajaxSearchRequest = $.get("/browse/search", {s:search}, function( data ){
				$("#browse-content").html(data);
				$('#browse-search-icon').removeClass('loading');
			});
		}
	});

	
	//TODO Only on admin configure camera unit
	$("#camera_unit-config-form").submit(function(event) {
		var messagediv = $("#camera_unit-config-status");
		messagediv.show();
		messagediv.html('setting config, wait...');
		
		$.post( "/admin/cameras/cam1/set_config", $("#camera_unit-config-form").serialize(),function( data ){
			window.location.href = window.location.href.split( '?' )[0] + "?message=" + data.exit_code;
		},"json");
		
		event.preventDefault();
	});
	
	
	$('#course-period-select').change(function() {
		window.location.href = $(this).val();
	});
	
	$.bootstrapSortable(true, 'reversed');
	
	var opts = {
		lines: 8, // The number of lines to draw
		length: 3, // The length of each line
		width: 2, // The line thickness
		radius: 3, // The radius of the inner circle
		corners: 1, // Corner roundness (0..1)
		rotate: 0, // The rotation offset
		direction: 1, // 1: clockwise, -1: counterclockwise
		color: '#000', // #rgb or #rrggbb or array of colors
		speed: 1, // Rounds per second
		trail: 60, // Afterglow percentage
		shadow: false, // Whether to render a shadow
		hwaccel: false, // Whether to use hardware acceleration
		className: 'jsspinner', // The CSS class to assign to the spinner
		zIndex: 2e9, // The z-index (defaults to 2000000000)
	};
	
	$(".camera-status-loading").each(function(){
		var spinner = new Spinner(opts).spin();
		$(this).append($(spinner.el));
	});
	
	$(".camera-status-icon").each(function(){
		
		var statusElement = $(this);
		var camname = $(this).data('name');
		
		$.getJSON("/admin/cameras/"+camname+"/get_status", function( data ){
			if(data.online === false)
			{
				statusElement.html('<span class="camera-status-offline-icon"></span> <span class="camera-status-offline-text">Offline</span>');
			}
			else if(data.online === true)
			{
				statusElement.html('<span class="camera-status-online-icon"></span> <span class="camera-status-online-text">Online</span>');
			}
			else
			{
				statusElement.html('?');
			}
		});
	});
	
	$('body').css('margin-bottom', $('#footer').height()+20);
	$(window).resize(function() {
		$('body').css('margin-bottom', $('#footer').height()+20);
	});
	
});
