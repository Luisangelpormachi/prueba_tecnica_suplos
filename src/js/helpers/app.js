'use strict';

$(document).ready(function() {

    console.log("Helpers cargado!")
    obtenerBienesDisponibles();

});

const baseUrl = document.getElementById("base_url").content;

async function obtenerBienesDisponibles() {

    const params = {
        direccion: "box",
        ciudad: "new york",
        tipo: "casa",
        precio: JSON.stringify([200, 80000])
    };
    const resp = await peticionPostAjax(params);
    console.log(resp);

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
            error: function (xhr, status, error) {
                reject(error);
            }
        });
    });
}
