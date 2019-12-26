/*jslint browser: true*/
/* global $, jQuery, alert*/
/*jshint strict: true */
jQuery.browser = {};


$(document).ready(function () {
"use strict";
	$("#about button").click(function () {
		
		var url = "https://docs.google.com/document/d/10SpsXPUi4cBnBfEWV11URFBmgqKPySDD3AzvduAsYwg/edit?usp=sharing";



		var result = confirm('Google Docs로 넘어가시겠습니까?');
		if (result) {
			$(location).attr('href', url);
		} else {
			return false;
		}



	});



	$(".portfolio_detail").click(function () {
		$("#portfolio_progress").slideToggle();
	});

	var jbOffset = $(".navbar").offset();

	console.log(jbOffset.top);

	$(window).scroll(function () {
		if ($(document).scrollTop() > jbOffset.top) {
			$(".navbar").addClass("jbFixed");
		} else {
			$(".navbar").removeClass("jbFixed");
		}
		return false;
	});


});
