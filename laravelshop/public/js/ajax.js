$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
$(document).ready(function(){
	$('.qty-product').blur(function(){
    // $(document).on('click', '.update-cart', function(){
	       var qty = $(this).val();
	       // alert(qty);
	       var rowId = $(this).data('id');
	       $.ajax({
	       	 url:  'cart/updateCart',
	       	 type : 'GET',
	       	 data : {
	       	 	qty : qty,
	       	 	rowId : rowId
	       	 },
		       	 success : function(data){
		       	 	if(data.error){
		       	 		toastr.error(data.error, 'Thông Báo',  {timeOut: 5000, progressBar : true })
		       	 		location.reload();
		       	 	}else{
		       	 		toastr.success(data.success, 'Thông Báo',  {timeOut: 5000, progressBar : true })
		       	 		window.location.href = '/';

		       	 	}
		       	 	// console.log(data);
		       	 	// var total = data.subtotal;
		       	 	// console.log(total);
		       	 	// $('.update-total'+rowId+'').html(total);
		       	 	// $('notify').val('22');
		       	 }
            });
    });

    $(document).on('click', '.delete', function(){
    	swal({
		  title: "Bạn có muốn xóa sản phẩm",
		  text: "Hãy chắc chắn là bạn muốn xóa nó !",
		  icon: "warning",
		  buttons: true,
		  dangerMode: true
		})
		.then((willDelete) => {
		    if (willDelete) {
		  	 var rowId = $(this).data('id');
			  	$.ajax({
		       	 url:  'cart/delete',
		       	 type : 'GET',
		       	 data : {
		       	 	rowId : rowId
		       	 },
			       	success : function(data){
			      //  	 	swal("Sản phẩm đã xóa khỏi giỏ hàng!", {
					    //   icon: "success",
					    // });
					    toastr.success(data.success, 'Thông Báo',  {timeOut: 5000, progressBar : true })
		       	 		location.reload();
					    // location.reload();
			       	}
	            });		   
		   } 

		});
    });

    $(document).on('click', '.order', function(){
		// var active = '';
		var paytotal = $('.paytotal').text();
		paytotal = paytotal.replace('VNĐ','');
		// if($('.actives').prop('checked')){
		// 	active = 'on';
		// }else{
		// 	active = 'off';
		// }
		$.ajax({
			url : 'customer/add',
			type : 'post',
			data : {
				name : $('.name').val(),
				email : $('.email').val(),
				phone_number : $('.phone_number').val(),
				address : $('.address').val(),
				gender : $('.gender').val(),
				paytotal: paytotal
			},
			dataType : 'json',
			success : function(data){
				if(data.error){
					toastr.error(data.error, 'Thông báo', {timeOut: 5000});
				}else{
					console.log(data);
					toastr.success(data, 'Thông báo', {timeOut: 5000});
				}
			},
			error : function(data){
				var error = $.parseJSON(data.responseText);
				if( typeof error.errors.name != 'undefined' && error.errors.name.length > 0 ){
					$('.name_error').show();
					$('.name_error').html(error.errors.name);
				}
				if( typeof error.errors.gender != 'undefined' && error.errors.gender.length > 0 ){
					$('.gender_error').show();
					$('.gender_error').html(error.errors.gender);
				}
				if( typeof error.errors.email != 'undefined' && error.errors.email.length > 0 ){
					$('.email_error').show();
					$('.email_error').html(error.errors.email);
				}
				if( typeof error.errors.phone_number != 'undefined' && error.errors.phone_number.length > 0 ){
					$('.phone_numbererror').show();
					$('.phone_numbererror').html(error.errors.phone_number);
				}
				if( typeof error.errors.address != 'undefined' && error.errors.address.length > 0 ){
					$('.addressError').show();
					$('.addressError').html(error.errors.address);
				}
			}
		});
	});

	$('.addCart').on('click', function(){
		var id = $(this).data('id');
		$.ajax({
            type: 'GET',
            url: 'cart/addCart/',
            data: {
            	id : id
            },
            success: function(data) {
            	var count = data.count_cart;
            	$('.cart-quantity').text(data.count_cart);
                toastr.success(data.success, 'Thông Báo',  {timeOut: 5000, progressBar : true })
            }
        });
	});

	$('.cart-love').on('click', function(){
		var id = $(this).data('id');
		var love = $('.lovecart').text();

		$.ajax({
            type: 'GET',
            url: 'cart/love',
            data: {
            	id : id
            },
            success: function(data) {
            	love++;
            	console.log(data);
            	$('.lovecart').text(love);
            	// $('.cart-quantity').text(data.count_cart);
                toastr.success(data.success, 'Thông Báo',  {timeOut: 5000, progressBar : true })
            }
        });
	});

});