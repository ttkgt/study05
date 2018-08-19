//todo logic
jQuery(function($){
	$('button.add').click(function(){
		var act = $(this).parent().find('input.action').val();
		if(act){
			$(this).parents('div.todo').find('ul.todo').append('<li><nobr><a class="del" href="javascript:void(0)">×</a>' + act + '</nobr></li>');
		}
	})
	$('a.del').live('click',function(){
		$(this).parents('li').remove();
	})
});
