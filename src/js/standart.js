jQuery(document).ready(function($) {
	$('.standart>form').submit(function(event) {
		var rowsTable = $('.standart>table tr').css({display:'table-row'}).splice(1);
		var searchStr = $('.standart>form input[type="text"]').val().toLowerCase(); 
		event.preventDefault();
		$(rowsTable).each(function(index, el) {
			var $td = $(this).find('td');
			var name = $td.eq(1).text().toLowerCase();
			var code = $td.eq(0).text().toLowerCase();
			if ((name.indexOf(searchStr)==-1) & (code.indexOf(searchStr)==-1)) {
				$(this).css({display:'none'});
			};
		});
	});
	$('.standart>form').find('i.fa-close').click(function(event) {
		$(this).parent().find('input').val('');
		$('.standart>form').submit();
	});
	$('.standart>table').find('tr').click(function(event) {
		window.open($(this).find('a').attr('href'));
	});
	$('.standart>table').find('a').click(function(event) {
		event.preventDefault();
	});
});