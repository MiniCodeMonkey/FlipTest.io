$(function() {
	// Controllers
	$('.controllers-list li a').click(function () {
		$('.controllers-list li a').removeClass('active');
		$(this).addClass('active');

		$('.viewcontroller-container').hide();
		$('.viewcontroller-container-' + $(this).attr('href').substr(1)).show();

		return false;
	});

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
			$('#test_name').val($(this).val() + ' Test');
		});

		// Show dialog
		$('#create-test').modal('show');

		return false;
	});

	// Create test button clicked
	$('.view.viewtype-UILabel').click(function () {
		var element = $(this).find('span').first();
		
		// Set hidden inputs
		$('#create-test #controller_id').val(element.parents('.viewcontroller').data('controllerid'));
		$('#create-test #view_id').val(element.parent().data('viewid'));
		$('#create-test #original_text').val(element.parent().data('orig-text'));
		$('#create-test #original_textcolor').val(element.parent().data('orig-textcolor'));

		// Set button/label text
		$('#create-test #view_text').val(element.text());

		// Update element when text changes
		$('#create-test #view_text').keyup(function () {
			element.find('span').html($(this).val());
			$('#test_name').val($(this).val() + ' Test');
		});

		// Show dialog
		$('#create-test').modal('show');

		return false;
	});
});