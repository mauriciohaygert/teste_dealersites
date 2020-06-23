function filtro() {
	dados = new FormData($("#filtro")[0]);
	$.ajax({
		type: 'POST',
		url: "/",
		data: dados,
		processData: false,
		contentType: false,
		dataType: "html",
		success: function(ajax_html) {
			if(ajax_html) {
				$('#tabela').html(ajax_html);
				inicio()
			}
		},
	});	
};

function inicio() {
	$("a.page-link").click(function(event){
		event.preventDefault();
		$('#page').val(this.text);
		$('#orderby').val('name');
		$('#sort').val('asc');

		filtro();
	});

	$("#nome_ordena").click(function(event){
		event.preventDefault();
		if ($('#name_sort').val() == 'asc') {
		$('#name_sort').val('desc');
		} else {
			$('#name_sort').val('asc');
		};
		$('#orderby').val('');
		filtro();
	});

	if ($('#name_sort').val() == 'asc') {
		$('#nome_ordena i').attr('class', 'fas fa-sort-alpha-down')
	} else {
		$('#nome_ordena i').attr('class', 'fas fa-sort-alpha-up')
	};


};

$(document).ready(function(){
	$("#filtro").submit(function( event ) {
		event.preventDefault();
		filtro();
	});


	$("button").click(function(event){
		event.preventDefault();
		$('#paginacao').val(10);
		$('#page').val(1);
		$('#nome').val('');
		$('#orderby').val('user_access_count')
		$('#sort').val($(this).attr('name'));
		filtro();
	});
	inicio();
});
	

