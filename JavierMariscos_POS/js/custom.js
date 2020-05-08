$(document).ready(function(){
	$(document).on('click', '.edit', function(){
		var id=$(this).val();
		var id_prod=$('#id'+id).text();
		var user=$('#user'+id).text();
		var tipoinv=$('#tipoinv'+id).text();
		// var codigo=$('#codigo'+id).text();
		var nombre=$('#nombre'+id).text();
		var precio=$('#precio'+id).text();
		var stock=$('#stock'+id).text();

			$('#edit').modal('show');
			// $('#historial').val(histo);
			$('#id').val(id_prod);
			$('#tipoinv').val(tipoinv);
			$('#user').val(user);
			// $('#codigo').val(codigo);
			$('#nombre').val(nombre);
			$('#precio').val(precio);
			$('#stock').val(stock);
	
	});
});


