//=============================================================
//==  Form validation
//=============================================================
/*
		// Usage example:
		var error = formValidate(jQuery(form_selector), {				// -------- Options
			error_message_show: true,									// Display or not error message
			error_message_time: 5000,									// Time to display error message
			error_message_class: 'sc_infobox sc_infobox_style_error',	// Class, appended to error message block
			error_message_text: 'Global error text',					// Global error message text (if don't write message in checked field)
			error_fields_class: 'error_fields_class',					// Class, appended to error fields
			exit_after_first_error: false,								// Cancel validation and exit after first error
			rules: [
				{
					field: 'author',																// Checking field name
					min_length: { value: 1,	 message: 'The author name can\'t be empty' },			// Min character count (0 - don't check), message - if error occurs
					max_length: { value: 60, message: 'Too long author name'}						// Max character count (0 - don't check), message - if error occurs
				},
				{
					field: 'email',
					min_length: { value: 7,	 message: 'Too short (or empty) email address' },
					max_length: { value: 60, message: 'Too long email address'},
					mask: { value: '^([a-z0-9_\\-]+\\.)*[a-z0-9_\\-]+@[a-z0-9_\\-]+(\\.[a-z0-9_\\-]+)*\\.[a-z]{2,6}$', message: 'Not valid email address'}
				},
				{
					field: 'comment',
					min_length: { value: 1,	 message: 'The comment text can\'t be empty' },
					max_length: { value: 200, message: 'Too long comment'}
				},
				{
					field: 'pwd1',
					min_length: { value: 5,	 message: 'The password can\'t be less then 5 characters' },
					max_length: { value: 20, message: 'Too long password'}
				},
				{
					field: 'pwd2',
					equal_to: { value: 'pwd1',	 message: 'The passwords in both fields must be equals' }
				}
			]
		});
*/

function formValidate(form, opt) {
	var error_msg = '';
	form.find(":input").each(function() {
		if (error_msg!='' && opt.exit_after_first_error) return;
		for (var i = 0; i < opt.rules.length; i++) {
			if (jQuery(this).attr("name") == opt.rules[i].field) {
				var val = jQuery(this).val();
				var error = false;
				if (typeof(opt.rules[i].min_length) == 'object') {
					if (opt.rules[i].min_length.value > 0 && val.length < opt.rules[i].min_length.value) {
						if (error_msg=='') jQuery(this).get(0).focus();
						error_msg += '<p class="error_item">' + (typeof(opt.rules[i].min_length.message)!='undefined' ? opt.rules[i].min_length.message : opt.error_message_text ) + '</p>'
						error = true;
					}
				}
				if ((!error || !opt.exit_after_first_error) && typeof(opt.rules[i].max_length) == 'object') {
					if (opt.rules[i].max_length.value > 0 && val.length > opt.rules[i].max_length.value) {
						if (error_msg=='') jQuery(this).get(0).focus();
						error_msg += '<p class="error_item">' + (typeof(opt.rules[i].max_length.message)!='undefined' ? opt.rules[i].max_length.message : opt.error_message_text ) + '</p>'
						error = true;
					}
				}
				if ((!error || !opt.exit_after_first_error) && typeof(opt.rules[i].mask) == 'object') {
					if (opt.rules[i].mask.value != '') {
						var regexp = new RegExp(opt.rules[i].mask.value);
						if (!regexp.test(val)) {
							if (error_msg=='') jQuery(this).get(0).focus();
							error_msg += '<p class="error_item">' + (typeof(opt.rules[i].mask.message)!='undefined' ? opt.rules[i].mask.message : opt.error_message_text ) + '</p>'
							error = true;
						}
					}
				}
				if ((!error || !opt.exit_after_first_error) && typeof(opt.rules[i].equal_to) == 'object') {
					if (opt.rules[i].equal_to.value != '' && val!=jQuery(jQuery(this).get(0).form[opt.rules[i].equal_to.value]).val()) {
						if (error_msg=='') jQuery(this).get(0).focus();
						error_msg += '<p class="error_item">' + (typeof(opt.rules[i].equal_to.message)!='undefined' ? opt.rules[i].equal_to.message : opt.error_message_text ) + '</p>'
						error = true;
					}
				}
				if (opt.error_fields_class != '') jQuery(this).toggleClass(opt.error_fields_class, error);
			}
		}
	});
	if (error_msg!='' && opt.error_message_show) {
		error_msg_box = form.find(".result");
		if (error_msg_box.length == 0) {
			form.append('<div class="result"></div>');
			error_msg_box = form.find(".result");
		}
		if (opt.error_message_class) error_msg_box.toggleClass(opt.error_message_class, true);
		error_msg_box.html(error_msg).fadeIn();
		setTimeout("error_msg_box.fadeOut()", opt.error_message_time);
	}
	return error_msg!='';
}