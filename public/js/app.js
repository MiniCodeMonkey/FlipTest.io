$(function() {
	// Test type radio buttons
	$('#test_type_text').click(function () {
		$('#section_test_type_text').show();
		$('#section_test_type_textcolor').hide();
	});

	$('#test_type_textcolor').click(function () {
		$('#section_test_type_text').hide();
		$('#section_test_type_textcolor').show();
	});

	// Modal cancel button
	$("#modal-cancel").click(function() {
		window.location.href = document.location.pathname;
		return false;
	});

	// Create test button clicked
	$('.view.btn').click(function () {
		var element = $(this);

		// Put element in foreground
		element.css('z-index', 10000);
		
		// Set hidden inputs
		$('#create-test #controller_id').val(element.parents('.viewcontroller').data('controllerid'));
		$('#create-test #view_id').val(element.data('viewid'));
		$('#create-test #original_text').val(element.data('orig-text'));
		$('#create-test #original_textcolor').val(element.data('orig-textcolor'));

		// Set button/label text
		$('#create-test #view_text').val(element.text());

		// Update element when text changes
		$('#create-test #view_text').keyup(function () {
			element.find('span').html($(this).val());
		});

		// Show dialog
		$('#create-test').modal('show');

		return false;
	});
});