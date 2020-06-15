$(document).ready(function () {
	$(".manual__item .manual__hide").hide().prev().click(function () {
		$(".manual__item .manual__hide").not(this).slideUp();
		$(this).next().not(":visible").slideDown();
	});
});