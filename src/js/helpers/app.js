'use strict';

const baseUrl = document.getElementById("base_url").content;

function peticionPostAjax(params) {

    return new Promise((resolve, reject) => {
        $.ajax({
            url: baseUrl+'bienes/disponibles',
            type: 'POST',
            data: params,
            dataType: 'json',
            success: function (response) {
                resolve(response);
            },
            error: function (xhr, error) {
                reject(xhr);
            }
        });
    });
}

function messageError(xhr) {

    switch (xhr.status) {

        case 422:

            for(let element in xhr.responseJSON.errors) {
                console.log(xhr.responseJSON.errors[element][0]);
            }

        break;

        case 500:
            console.log(xhr.responseJSON.message)
        break;

        default:
            console.log("Ocurrio un error inesperado");
    }
}

const loadingSpinner = {

    contentSpinner: $(".content-loading-spinner"),

    start : () => {
        loadingSpinner.contentSpinner.addClass("loading-spinner-visible");
    },

    stop: () => {
        loadingSpinner.contentSpinner.removeClass("loading-spinner-visible");
    }
    
}

const actions = {
    disabled : () => {
        //inputs y buttons
        $("input").attr("disabled", "disabled");
        $("button").attr("disabled", "disabled");
        $("select").attr("disabled", "disabled");
        //tabs
        $("#tabs").tabs({
            disabled: [0, 1]
        })
    },
    enable : () => {
        //inputs y buttons
        $("input").attr("disabled", false);
        $("button").attr("disabled", false);
        $("select").attr("disabled", false);
        //tabs
        $("#tabs").tabs({
            disabled: []
        })
    }
}
