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


$("body").on("click", "[data-action]", function(e) {
    e.preventDefault();
    var data = $(this).data();
    var div = $(this).parent().parent();

    var tr = $(this).closest('tr');
    var id = $(this).data('id');

    var func = $(this).data('func');
     console.log(data);
    // alert(data.action); //returna -> https://localhost/www/SLAB/empresa/editar
    if (func === "exc") {
        swal({
                title: "Deseja realmente excluir?",
                text: data.nome,
                icon: "warning",
                buttons: {
                    cancel: {
                        text: "Cancel",
                        value: null,
                        visible: true,
                        className: "",
                        closeModal: true,
                    },
                    confirm: {
                        text: "OK",
                        value: true,
                        visible: true,
                        className: "",
                        closeModal: true,

                    },
                },
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    $.ajax({
                        url: data.action,
                        data: data,
                        type: 'POST',

                    }).done(function(resp) {

                        tr.fadeOut('slow', function() {});

                    }).fail(function(resp) {

                    })
                }
            })
    } else {
        window.location.href = data.action + '/' + data.id;
    }
})


})