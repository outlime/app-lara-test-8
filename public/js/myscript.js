// $("ul.menu li").click ->
// $("ul.menu li").removeClass 'active'
// $(this).addClass 'active'

$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip(); 
    $('[data-toggle="popover"]').popover();
});

$('#createPostButton').on('click', function () {
	var $btn = $(this).button('loading')
});