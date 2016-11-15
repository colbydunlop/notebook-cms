
$('.field').blur(function() {
	var blockKey = $(this).parent(".block").data('key');
	var fieldKey = $(this).data('key');
	var fieldContent = $(this).html();
	var path = window.location.pathname;
	$.post(path + '/update', { block:blockKey, field:fieldKey, content:fieldContent });  
});


	
