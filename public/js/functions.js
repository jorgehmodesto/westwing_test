function newTicket() {
    $('.loading-container').removeClass('hide');
    $('.loading-image').removeClass('hide');

    $.get('record', $('#frmNewTicket').serialize(), function(r){
        $('.loading-container').addClass('hide');
        $('.loading-image').addClass('hide');

        if(r.success === true) {
            $('#dangerMessage').addClass('hide');

            $('#successMessage').html('Chamado registrado com sucesso!');
            $('#successMessage').removeClass('hide');
        } else {
            $('#successMessage').addClass('hide');

            $('#dangerMessage').html(r.message);
            $('#dangerMessage').removeClass('hide');
        }
    });
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