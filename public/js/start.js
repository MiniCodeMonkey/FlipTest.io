$(document).ready(function() {
	$('input').keyup(function () {
		$.get('auth/userkey', $('form').serialize(), function (response) {
			$('.flip-code').html(response.key);
		});
	});
});