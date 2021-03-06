
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
	$('table#result-list td:empty').text('<空>');
	$('table#entries td:empty').text('<空>');

	// Disable the submit button in advance search page if no input
	$('div.jumbotron').delegate('form#advance-search input', 'mouseleave', function () {
		if ($('form#advance-search input#initial').val().trim().length == 0 &&
			$('form#advance-search input#final').val().trim().length == 0 &&
			$('form#advance-search input#tail').val().trim().length == 0 &&
			$('form#advance-search input#shengfu').val().trim().length == 0	&&
			$('form#advance-search input#yunbu').val().trim().length == 0 &&
			$('form#advance-search input#ipa').val().trim().length == 0 &&
			$('form#advance-search select#kaihe option:selected').text() == "開合..." &&
			$('form#advance-search select#deng option:selected').text() == "等..." &&
			$('form#advance-search select#tone option:selected').text() == "声調...") {
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
			$('div#continue-card select#' + dict[avm[0]]).val(avm[1]);
		} else {
			$('div#continue-card input#' + dict[avm[0]]).val(avm[1]);
		}
	});

	ranges.forEach(function (range) {
		let avm = range.textContent;

		$('div#continue-card input#' + dict[avm]).prop('checked', true);
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
	let cells = $('table#properties td').toArray();
	
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

	function contains(alpha, code) {
		let index = 0;
		while (index < code.length) {
			if (alpha.toUpperCase() == code[index])
				return index + 1;
			else
				index++;
		}
	}

	if (cells.length != 0) {
		let rhymeStat = splited(cells[10].textContent.split('：')[1]);
		
		if (rhymeStat.length != 1 && rhymeStat[0] !== undefined) {
			cells[11].append(rhymeStat[0]);
			cells[12].append(stringify(rhymeStat.slice(1, 4)));
			cells[13].append(rhymeStat[4]);
			cells[14].append(rhymeStat[5]);
		}

		// Pages - Position
		let code = ['A', 'B', 'C', 'D', 'E', 'F', 'G', 'H',
					'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P'];


		let position = cells[4].textContent.split('：')[1];
		let page = stringify(splited(position).slice(0,3));

		if (position != '' && page != '')
			cells[4].textContent = '廣韻頁碼：第' + page + '頁第' + contains(position[3], code) + '列第' + contains(position[4], code) + '字';

		// Fill the blanks
		cells.forEach(function (cell) {
			let avm = cell.textContent.split('：');
			if (avm[1] == "")
				cell.append('<空>');
		});
	}

	let resultList = $('div#specific-info a').attr('href');

	if (resultList !== undefined && resultList.match('edit') == 'edit')
		$('div#specific-info a').hide();

	// Adjust for edit page
	let rsValue = $('form#edit-form input#initial').val(), attrs = ['initial', 'final', 'kaihe', 'deng', 'tone', 'tail'];

	function index(val, arr) {
		for (let i = 0; i < arr.length; i++) {
			if (arr[i] == val)
				return i
		}
		return -1;
	}
	
	if (rsValue !== undefined) {
		attrs.forEach(function (attr) {
			if (attr == 'deng' || attr == 'tone' || attr == 'kaihe')
				$('form#edit-form select#' + attr).val(rsValue[index(attr, attrs)]);
			else
				$('form#edit-form input#' + attr).val(rsValue[index(attr, attrs)]);
		});
	}

	$('form#edit-form a').click(function () {
		history.back();
	});

	// Back for create page
	$('form#add-form a').click(function () {
		history.back();
	});

	// Disable the submit button in create entry page if no input
	function check() {
		let i = 0;
		$('form#add-form input').each(function () {
			if ($(this).val() == '')
				i++;
		});

		$('form#add-form select').each(function () {
			if ($(this).val() == null)
				i++;
		});

		if (i == 17)
			return false;
		else
			return true;
	}

	$('div.jumbotron').delegate('form#add-form input', 'mouseleave', function () {
		if (!check()) {
			$('div#add-page button').prop('disabled', true);
			$('div#add-page button').css('background-color', '#616161');
		} else {
			$('div#add-page button').prop('disabled', false);
			$('div#add-page button').css('background-color', '#212121');
		}
	});

	// Dashboard
	let translator = {
		'create': '創建了一條記錄',
		'update': '更新了一條記錄',
		'delete': '刪除了一條記錄'
	};

	$('p#event').each(function () {
		$(this).text(translator[$(this).text()]);
	});

	$('p#item').each(function () {
		if ($(this).text().split(':')[1] == ' ')
			$(this).append('&lt;空&gt;');
	});

	// Warnings


})
