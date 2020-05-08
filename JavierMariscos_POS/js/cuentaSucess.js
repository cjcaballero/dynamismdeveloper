$(document).ready(function(){
	$(document).on('click', '.edit', function(){
		var id=$(this).val();
		var monto=$('#monto').text();
		var total=$('#total').text();


			$('#edit').modal('show');
			$('#monto').val(monto);
			$('#total').val(total);
			
	
	});
});


