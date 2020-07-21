
const autoComplete = ((prod, idVenda, url) => {

    console.log(prod, idVenda)
    $.ajax({
        url: url,
        dataType: "json",
        method: "POST",
        data: {
        idProd: prod
    },
        success: function (data) {
            response($.map(data.item, function (item) {
                return {
                    label: item.nome,
                    value: item.nome,
                    preco: item.preco,
                    id: item.id

                }

            }))

        }
    });
})


