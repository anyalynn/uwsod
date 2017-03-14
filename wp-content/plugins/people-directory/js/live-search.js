/****************************************************************************	
*	Live-search.js      													*
*	Copyright 2013 Jon Swanson												*
*																			*
*	Licensed under the Apache License, Version 2.0 (the "License");			*
*	you may not use this file except in compliance with the License.		*
*	You may obtain a copy of the License at									*
*																			*
*       http://www.apache.org/licenses/LICENSE-2.0							*
*																			*
*	Unless required by applicable law or agreed to in writing, software		*
*	distributed under the License is distributed on an "AS IS" BASIS,		*
*	WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.*
*	See the License for the specific language governing permissions and		*
*	limitations under the License.											*
*																			*
*	this script requires jQuery to work.									*
*	to use, give items you want to search a class of "searchable"			*
*	and elements you want to search a class of "search-this"				*
*	if you have things organized by section and you want the section		*
*	to disappear if all searchable items within don't match the search term	*
*   give the section a class of "searchable-container"						*
****************************************************************************/

function onChangeSearch() {
	var select_box = document.getElementById("ddselect");
	var selected_value = select_box.options[select_box.selectedIndex].value;
	if (selected_value == "Faculty" || selected_value == "Staff" || 
		selected_value == "Affiliate") {
		executeRoleSearch(selected_value.toLowerCase());	
	} else if (selected_value == "All") {
		executeDeptSearch("");
	} else {
		executeDeptSearch(selected_value.toLowerCase());
	}
};	

/*$(document).ready(function(e) {
  $('#ddselect').selectpicker();
});
*/

jQuery(document).ready(function($) {
	var initial_text = $("#livesearch").val();
	$("#livesearch").keyup(function () {
		executeDeptSearch($(this).val().toLowerCase());
	}).focus(function () {
		if ($(this).val() == initial_text) {
			$(this).val("");
		}
	}).blur(function () {
		if ($(this).val() == "") {
			$(this).val(initial_text);
		}
	});
});

function executeRoleSearch(term) {
	var searchables = $('.searchable'), $this, classes;
	for (var i = 0, slength = searchables.length; i < slength; i++) {
		$this = $(searchables[i]);
		var classes = $this[0].className;
		if (classes.indexOf(term) == -1) {
			$this.fadeOut();
			$this.addClass("no-match");			
		}
		else if ($this.hasClass("no-match")) {
			$this.fadeIn();
			$this.removeClass("no-match");
		}
	}
}

function executeDeptSearch(term) { // Search by department or person name
	var searchables = $('.searchable'), holder, $this, found;
	for (var i = 0, slength = searchables.length; i < slength; i++) {
		$this = $(searchables[i]);
		holder = $this.find('.search-this');
		found = false;
		for (var j = 0, hlength = holder.length; j < hlength; j++) {
			if ($(holder[j]).text().toLowerCase().indexOf(term) != -1) {
				j = hlength;
				found = true;
			}
		}
		if (!found) {
			$this.fadeOut();
			$this.addClass("no-match");
		}
		else if ($this.hasClass("no-match")) {
			$this.fadeIn();
			$this.removeClass("no-match");
		}
	}
	var sections = $(".searchable-container"), secholder;
	for (var l = 0, seclength = sections.length; l < seclength; l++) {
		secholder = $(sections[l]);
		if (secholder.find('.searchable').not('.no-match').length == 0) {
			secholder.fadeOut();
			secholder.addClass('no-match');
		}
		else if (secholder.hasClass('no-match')) {
			secholder.fadeIn();
			secholder.removeClass('no-match');
		}
	}		
}
