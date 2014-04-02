$(document).ready(function() {
	$('body').removeClass('nojs');
	$('a.lightbox').nivoLightbox();
	
	//TODO Only on admin configure camera unit
	$("#camera_unit-config-form").submit(function(event) {
		var messagediv = $("#camera_unit-config-status");
		messagediv.show();
		messagediv.html('setting config, wait...');
		
		$.post( "/admin/cameras/cam1", { name: "John", time: "2pm" },function( data ){
			window.location.href = window.location.href.split( '?' )[0] + "?message=" + data.exit_code;
		},"json");
		
		event.preventDefault();
	});
	
	
	$('#course-period-select').change(function() {
		window.location.href = $(this).val();
	});
	
	$.bootstrapSortable(true, 'reversed');
});
