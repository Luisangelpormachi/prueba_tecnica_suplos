'use strict';

/**
 * Solo lectura (No modifica)
*/
function mstCoins() {
    return new Promise((resolve, reject) => {
        $.ajax({
            url: 'https://api.exchangerate.host/latest',
            type: 'GET',
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



function getDataList() {
    return new Promise((resolve, reject) => {
        $.ajax({
            url: './core/Router/RouteInmueble.php',
            type: 'POST',
            data: {
                action: 'getDataList',
                data: JSON.stringify({ id: 1 })
            },
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


// Configurar todo dentro de este scope
(async () => {

    const response_data_coins = await mstCoins();


})();