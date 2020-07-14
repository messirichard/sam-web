$(function() {

	// Get the form.
	var form = $('#contact-form');

	// Get the messages div.
	var formMessages = $('.ajax-response');

	// Set up an event listener for the contact form.
	$(form).submit(function(e) {
		// Stop the browser from submitting the form.
		e.preventDefault();

		// Serialize the form data.
		var formData = $(form).serialize();

		// Submit the form using AJAX.
		$.ajax({
			type: 'POST',
			url: $(form).attr('action'),
			data: formData
		})
		.done(function(response) {
			// Make sure that the formMessages div has the 'success' class.
			$(formMessages).removeClass('error');
			$(formMessages).addClass('success');

			// Set the message text.
			$(formMessages).text(response);

			// Clear the form.
			$('#contact-form input,#contact-form textarea').val('');
		})
		.fail(function(data) {
			// Make sure that the formMessages div has the 'error' class.
			$(formMessages).removeClass('success');
			$(formMessages).addClass('error');

			// Set the message text.
			if (data.responseText !== '') {
				$(formMessages).text(data.responseText);
			} else {
				$(formMessages).text('Oops! An error occured and your message could not be sent.');
			}
		});
	});
	
	// Get the form.
	var formsubs = $('#subscribe-form');

	// Get the messages div.
	var formMessagesSubs = $('.subscribe-response');

	// Set up an event listener for the contact form.
	formsubs.submit(function(e) {
		// Stop the browser from submitting the form.
		e.preventDefault();
		
		// Serialize the form data.
		var formData = formsubs.serialize();

		// Submit the form using AJAX.
		$.ajax({
			type: 'POST',
			url: formsubs.attr('action'),
			data: formData
		})
		.done(function(response) {
			// Make sure that the formMessages div has the 'success' class.
			formMessagesSubs.removeClass('error');
			formMessagesSubs.addClass('success');

			// Set the message text.
			formMessagesSubs.text(response);

			// Clear the form.
			$('#subscribe-form input,#subscribe-form textarea').val('');
		})
		.fail(function(data) {
			// Make sure that the formMessages div has the 'error' class.
			formMessagesSubs.removeClass('success');
			formMessagesSubs.addClass('error');

			// Set the message text.
			if (data.responseText !== '') {
				formMessagesSubs.text(data.responseText);
			} else {
				formMessagesSubs.text('Oops! An error occured and your submission failed.');
			}
		});
	});
	
	var formad = $('#formad');
	formad.submit(function(e) {
		e.preventDefault();
		var button = $('#modal-submit');
		formad.validate({
			rules: {
				name: {
					required: true,
					minlength: 5
                },
				phone: {
					required: true,
					minlength: 10
                },
				email: {
					required: true,
					email: true
                }
			}
		});
			
		if (!formad.valid()) {
			return;
        }

		var formData = formad.serialize();
		button.attr("disabled", true);
		$.ajax({
			type: 'POST',
			url: formad.attr('action'),
			data: formData
		})
		.done(function(response) {
			formad.trigger("reset");
			$('.modal').modal('hide');
			button.attr("disabled", false);
			swal({
                title: "Terima kasih",
                text: "Tim kami akan segera menghubungi anda untuk memberikan informasi lebih lanjut.",
                type: "success"
            });
			// fb pixel conversion
			fbq('track', 'Lead', {
				value: 8888,
				currency: 'IDR',
			});
			// fb pixel conversion END
		})
		.fail(function(data) {
			button.attr("disabled", false);
			Swal.fire(
			  'Ooops!',
			  'Terjadi sebuah kesalahan. Jangan kawatir, ini bukan salah anda. Silahkan dicoba kembali atau silahkan hubungi kami melalui form kontak.',
			  'error'
			);
		});
	});
		

});
