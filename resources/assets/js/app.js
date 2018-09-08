
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
})
