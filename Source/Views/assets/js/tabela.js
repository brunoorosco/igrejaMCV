$(function () {

    $('table').DataTable({
        "language": {
            "lengthMenu": "Mostrar _MENU_ itens p/ Pág.",
            "zeroRecords": "Não foi possivel encontrar nenhum registro",
            "info": "Exibindo _PAGE_ de _PAGES_",
            "infoEmpty": " ",
            "infoFiltered": "",
            "paginate": {
                "previous": "Anterior",
                "next": "Próximo",

            }
        },

    });

})