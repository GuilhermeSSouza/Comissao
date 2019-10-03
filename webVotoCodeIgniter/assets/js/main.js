$(document).ready(function () {
	var traducao = {
        "sProcessing": "Processando...",
        "sLengthMenu": "Mostrar _MENU_ registros",
        "sZeroRecords": "Não foram encontrados resultados",
        "sInfo": "Mostrando _START_ até _END_, de _TOTAL_ registros.",
        "sInfoEmpty": "Mostrando de 0 até 0",
        "sInfoFiltered": "",
        "sInfoPostFix": "",
        "sSearch": "Buscar:",
        "sUrl": "",
        "oPaginate": {
            "sFirst": "Primeiro",
            "sPrevious": "Anterior",
            "sNext": "Seguinte",
            "sLast": "Último"
        }
    };

	$('#tabelaModerador').DataTable({
		"language": traducao,
		"responsive": true,
		"order": [[ 1, "desc" ]],
		"columnDefs": [
			{ "orderable": false, "targets": 5 }],
	});

    $('#tabelaSecretario').DataTable({
        "language": traducao,
        "responsive": true,
		"order": [[ 1, "desc" ]],
        "columnDefs": [
            { "orderable": false, "targets": 5 }],
    });


    $('#tabelaMembro').DataTable({
		"language": traducao,
		"responsive": true,
		"order": [[ 1, "desc" ]],
		"columnDefs": [
			{ "orderable": false, "targets": 5 }],
	});

    $('#tabelaItensPauta').DataTable({
        "language": traducao,
        "responsive": true,
        "columnDefs": [
            { "orderable": false, "targets": 2 }],
    });

	$('#tabelavotomembro').DataTable({
		"language": traducao,
		"responsive": true
	});

	$('#tabelavotosop').DataTable({
		"language": traducao,
		"responsive": true
	});


});


