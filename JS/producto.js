$(document).ready(function(){

	$('.category_item').click(function(){
		var cat = $(this).attr('category');
		console.log(cat);

		$('.product-item').hide();
		$('.product-item[category="'+cat+'"]').show();
	});	
	$('.category_item[category="all"]').click(function(){
		$('.product-item').show();
		});	

});