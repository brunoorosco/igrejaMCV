$(function () {

    $('table').DataTable({
        "order": [],
        "language": {
            "lengthMenu": "Mostrar _MENU_ itens p/ Pág.",
            "zeroRecords": "Não foi possivel encontrar nenhum registro",
            "info": "Exibindo _PAGE_ de _PAGES_",
            "infoEmpty": " ",
            "sSearch": "Pesquisar",
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
     //console.log(data, tr);
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
                        type: 'DELETE',

                    }).done(function(resp) {
                        console.log(resp);

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