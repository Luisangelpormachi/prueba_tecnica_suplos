'use strict';

$(document).ready(function() {

    console.log("Helpers cargado!")
    obtenerBienesDisponibles();

});

const baseUrl = document.getElementById("base_url").content;

async function obtenerBienesDisponibles() {

    try {
        
        const params = {
            direccion: "box",
            ciudad: "new york",
            tipo: "casa",
            precio: JSON.stringify([200, 80000])
        };
        const resp = await peticionPostAjax(params);
        console.log(resp);

    } catch (error) {
        messageError(error);
    }

}

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

