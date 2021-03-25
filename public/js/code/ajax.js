
	$('.btn').click(function () {
		var id = $(this).data("id"); 
		$.get("shopgrid/AddToCart",{id:id},function(data){
		});	
	
	});
	
	// function remove(id){
	// 	$.get("shopgrid/re",{id:id},function(){
	// 		alert("xóa thành công");
	// 	});
	// 	$("#item-cart-"+id).remove();
				
	// }
