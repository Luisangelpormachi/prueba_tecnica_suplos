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

