$('a.toggle-modal').bind('click',function(e) {
	e.preventDefault();
	var url = $(this).attr('href');
	if (url.indexOf('#') == 0) {
		$('#modal_content').modal('open');
        $('.editor').wysihtml5();
	} else {
		$.get(url, function(data) {
			$('#modal_content').modal();
			$('#modal_content').html(data);
		}).success(function(data) {
			if(data == 'activate' || data== 'deactivate'){
				$('#modal_content').modal('hide');
				var url      = window.location.href;     // Returns full URL
				window.location.replace(url);
			}
			$('input:text:visible:first').focus();
		});
	}
});