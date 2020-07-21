$(function () {
    $("form").submit(function (e) {
        e.preventDefault();

        var form = $(this);
        var action = form.attr("action");
        var data = form.serialize();

        $.ajax({
            url: action,
            data: data,
            //type: "post",
            method: "POST",
            dataType: "json",
            beforeSend: () => {
                ajax_load("open")
            }
        })
            .done(function (res) {
                ajax_load("close");
                if (res.message) {
                    var view = '<div class="message ' + res.message.type + '">' + res.message.message + '</div>';
                    $(".login_form_callback").html(view);
                    $(".message").effect("bounce");
                    return;
                }

                if (res.redirect) {
                    window.location.href = res.redirect.url;
                }
            })
            .fail(function (error) {
                console.log(error);
            })


        // success: function (su) {

        //     ajax_load("close");
        //     console.s(su)
        //     if (su.message) {
        //         var view = '<div class="message ' + su.message.type + '">' + su.message.message + '</div>';
        //         $(".login_form_callback").html(view);
        //         $(".message").effect("bounce");
        //         return;
        //     }

        //     if (su.redirect) {
        //         window.location.href = su.redirect.url;
        //     }
        // },
        // error: function(error,){

        //     console.log(error.status)
        //     if(error.code === '200'){
        //         ajax_load("close");
        //     }
        // }

    })
});
function ajax_load(action) {
    ajax_load_div = $(".ajax_load");

    if (action === "open") {
        ajax_load_div.fadeIn(200).css("display", "flex");
    }

    if (action === "close") {
        ajax_load_div.fadeOut(200);
    }
}