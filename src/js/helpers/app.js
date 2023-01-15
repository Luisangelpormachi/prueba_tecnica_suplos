'use strict';

const Toast = Swal.mixin({
    toast: true,
    position: 'top-end',
    showConfirmButton: false,
    timer: 3000,
    timerProgressBar: true,
    didOpen: (toast) => {
      toast.addEventListener('mouseenter', Swal.stopTimer)
      toast.addEventListener('mouseleave', Swal.resumeTimer)
    }
})

const baseUrl = document.getElementById("base_url").content;

const loadingSpinner = {

    contentSpinner: $(".content-loading-spinner"),
    state: false,

    start : () => {
        loadingSpinner.contentSpinner.addClass("loading-spinner-visible");
        loadingSpinner.state = true;
    },

    stop: () => {
        loadingSpinner.contentSpinner.removeClass("loading-spinner-visible");
        loadingSpinner.state = false;
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

function peticionPostAjax(params, url) {

    return new Promise((resolve, reject) => {
        $.ajax({
            url: baseUrl+url,
            type: 'POST',
            data: params,
            dataType: 'json',
            success: function (response) {
                resolve(response);
            },
            error: function (xhr, error) {
                console.log(xhr)
                reject(xhr);
            }
        });
    });
}

function peticionGetAjax(url) {

    return new Promise((resolve, reject) => {
        $.ajax({
            url: baseUrl+url,
            type: 'GET',
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

function messageExito(message) {
     
    Toast.fire({
        icon: 'success',
        title: message
    });

}

function messageError(xhr) {

    switch (xhr.status) {

        case 409:
            Toast.fire({
                icon: 'error',
                title: xhr.responseJSON.message
            });
        break;

        case 422:

            let ul = document.createElement('ul');

            for(let element in xhr.responseJSON.errors) {
                let error = xhr.responseJSON.errors[element][0];
                let li = document.createElement('li');
                li.innerHTML = error;
                ul.appendChild(li);
            }

            Swal.fire({
                icon: 'error',
                title: xhr.responseJSON.message,
                html: ul
            });

        break;

        case 500:
            Toast.fire({
                icon: 'error',
                title: xhr.responseJSON.message
            });
        break;

        default:
            Toast.fire({
                icon: 'error',
                title: 'Ocurrio un error inesperado'
            });
    }
}

