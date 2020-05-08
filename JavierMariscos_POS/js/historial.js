$(document).ready(function(){
	$(document).on('click', '.inv', function(){
		var id=$(this).val();
		var id_prod=$('#id'+id).text();
		var codigo=$('#codigo'+id).text();
	
		$('#inv').modal('show');
		$('#id').val(id_prod);
		$('#codigo').val(codigo);

	});
});