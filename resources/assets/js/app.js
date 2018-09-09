
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

/**
 * jQuery Library used.
 */

$(document).ready(function () {
	// Make the value in empty cells of search results be "<空>"
	$('td:empty').text('<空>');

	// Disable the submit button in advance search page if no input
	$('div.jumbotron').delegate('input', 'mouseleave', function () {
		if ($('input#initial').val().trim().length == 0 &&
			$('input#final').val().trim().length == 0 &&
			$('input#tail').val().trim().length == 0 &&
			$('input#shengfu').val().trim().length == 0	&&
			$('input#yunbu').val().trim().length == 0 &&
			$('input#ipa').val().trim().length == 0) {
			$('div#advance-search-page button').prop('disabled', true);
			$('div#advance-search-page button').css('background-color', '#616161');
		} else {
			$('div#advance-search-page button').prop('disabled', false);
			$('div#advance-search-page button').css('background-color', '#212121');
		}
	});
})
