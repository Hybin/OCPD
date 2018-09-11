
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

/**
 * jQuery Library used.
 */
import $ from 'jquery';
window.$ = window.jQuery = $;

import 'jquery-ui/ui/widgets/draggable.js';

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
			$('input#ipa').val().trim().length == 0 &&
			$('select#kaihe option:selected').text() == "開合..." &&
			$('select#deng option:selected').text() == "等..." &&
			$('select#tone option:selected').text() == "声調...") {
			$('div#advance-search-page button').prop('disabled', true);
			$('div#advance-search-page button').css('background-color', '#616161');
		} else {
			$('div#advance-search-page button').prop('disabled', false);
			$('div#advance-search-page button').css('background-color', '#212121');
		}
	});

	// Show continue-search card
	$('button#continue').click(function () {
		$('div.search-card').show();
	});

	// Fill in the blanks of continue search card
	let dict = {'声母': 'initial', '韻母': 'final', '開合': 'kaihe', '等': 'deng',
				'声調': 'tone', '攝': 'tail', '声符': 'shengfu', '韻部': 'yunbu', 
				'拟音': 'ipa', '王力': 'wl', '李方桂': 'lfg', '白一平': 'byp',
				'白一平-沙加爾': 'byps', '鄭張尚芳': 'zzsf'};
	
	let conditions = $('ul#conditions li').toArray(), ranges = $('ul#range li').toArray();
	conditions.forEach(function (condition) {
		let avm = condition.textContent.split('：');
		
		if (dict[avm[0]] == 'deng' || dict[avm[0]] == 'kaihe' || dict[avm[0]] == 'tone') {
			$('select#' + dict[avm[0]]).val(avm[1]);
		} else {
			$('input#' + dict[avm[0]]).val(avm[1]);
		}
	});

	ranges.forEach(function (range) {
		let avm = range.textContent;

		$('input#' + dict[avm]).prop('checked', true);
	});

	// Make the continue-search card draggable
	$(function () {
		$('div.search-card').draggable();
	});	

	// Close the card
	$('button#close').click(function () {
		$('div.search-card').hide();
	});
})
