function newTicket() {
    alert('hehe');
}

function loadDatatable()
{
    $('.dataTable').DataTable({
        "ordering": false,
        "filter": false,
        "info": false,
        language: {
            "oPaginate": {
                "sNext": "Próximo",
                "sPrevious": "Anterior",
                "sFirst": "Primeiro",
                "sLast": "Último"
            },
            "emptyTable": "Nenhum registro encontrado"
        },
        "iDisplayLength": 5,
        "bLengthChange": false
    });
}