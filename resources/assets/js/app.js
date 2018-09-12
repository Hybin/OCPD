
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

	// Specific info page
	// Rhyme Status
	let cells = $('td').toArray();

	cells[11].append(cells[10].textContent.split('：')[1][0]);

	function splited(str) {
		let temp = [];
		for (let i = 0; i <= str.length; i++) {
			temp.push(str[i]);
		}
		return temp;
	}

	function stringify(arr) {
		let str = '';
		arr.forEach(function (item) {
			str += item;
		});
		return str;
	}

	let rhymeStat = splited(cells[10].textContent.split('：')[1]);

	cells[12].append(stringify(rhymeStat.slice(1, 4)));
	cells[13].append(rhymeStat[4]);
	cells[14].append(rhymeStat[5]);

	// Pages - Position
	let code = ['A', 'B', 'C', 'D', 'E', 'F', 'G', 'H',
				'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P'];

	function contains(alpha) {
		let index = 0;
		while (index < code.length) {
			if (alpha == code[index])
				return index + 1;
			else
				index++;
		}
	}

	let position = cells[4].textContent.split('：')[1];
	let page = stringify(splited(position).slice(0,3));
	cells[4].textContent = '廣韻頁碼：第' + page + '頁第' + contains(position[3]) + '列第' + contains(position[4]) + '字';

	// Fill the blanks
	cells.forEach(function (cell) {
		let avm = cell.textContent.split('：');
		if (avm[1] == "")
			cell.append('<空>');
	});
})
