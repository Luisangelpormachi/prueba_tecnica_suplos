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

    /* Variables globales */
    let simbolos_moneda = {
        EUR: "$",
        COP: "$",
        PEN: "S/"
    }
    let tasa_cambio = 1;
    let simbolo_moneda = simbolos_moneda['EUR']
    let offset = 0;
    let loadMore = 1;

    //elegir moneda al iniciar
    Swal.fire({
        title: 'Seleccione La moneda',
        input: 'select',
        inputOptions: {
          'monedas': {
            EUR: 'EUROS',
            COP: 'PESO COLOMBIANO',
            PEN: 'SOLES PERUANOS',
          },
        },
        allowOutsideClick: false,
        inputValidator: (value) => {
          return new Promise((resolve) => {
            
            inciarProcesos(value);
            resolve();

          })
        }
    })

    async function inciarProcesos(value = null) {

        let monedaActual = "EUR"; 
    
        if(monedaActual != value) {

            //iniciar carga
            loadingSpinner.start(true);

            const response_data_coins = await mstCoins();
            tasa_cambio = response_data_coins.rates[value];
            simbolo_moneda = simbolos_moneda[value];

            //finalizar carga
            loadingSpinner.stop(true);
            
        }

        obtenerBienesDisponibles(true);

    }    

    async function obtenerBienesDisponibles(inicial = false, scroll = false) {

        //iniciar carga
        loadingSpinner.start(true);

        try {   

            const form = $("#formulario")[0];

            const params = {
                direccion: form.direccion.value,
                ciudad: form.ciudad.value,
                tipo: form.tipo.value,
                precios: JSON.stringify(form.precio.value.split(";")),
                inicial: inicial,
            };
            
            let resp;

            if(scroll) {
            
                params.offset = offset;

                resp = await peticionPostAjax(params, 'bienes/obtenerTodos');
                offset += resp.data.length;
                loadMore = resp.data.length;

                let htmlBienesDisponibles = resp.data.map(function(item){
                    return plantillaBienesDisponibles(item);
                }).join("");

                $("#divResultadosBusquedaDisponibles .card").append(`${htmlBienesDisponibles}`);

            } else {

                offset = 0;
                params.offset = 0;

                resp = await peticionPostAjax(params, 'bienes/obtenerTodos');
                offset += resp.data.length;

                let htmlBienesDisponibles;

                if(offset > 0){

                    htmlBienesDisponibles = resp.data.map(function(item){
                        return plantillaBienesDisponibles(item);
                    }).join("");

                } else {
                    htmlBienesDisponibles = "<p>No hay registros encontrados</p>";
                }

                $("#divResultadosBusquedaDisponibles .card").html(`<h5>Resultados de la búsquedas:</h5>${htmlBienesDisponibles}`);

            }


            //cargar filtros si es que se cargo por primera vez
            if(inicial){
                let selectCiudades = resp.ciudades.map(function(item){
                    return (`<option value="${item}" >${item}</option>`)
                }).join("");

                let selectTipos = resp.tipos.map(function(item){
                    return (`<option value="${item}" >${item}</option>`)
                }).join("");

                $("#selectCiudad").append(selectCiudades);
                $("#selectTipo").append(selectTipos);
            }

            //finalizar carga
            loadingSpinner.stop(true);

        } catch (error) {
            messageError(error);
            
            //finalizar carga
            loadingSpinner.stop(true);

        }
    
    };

    async function obtenerMisBienes(scroll = false) {

        //iniciar carga
        loadingSpinner.start(true);

        try {   

            let resp;
            const params = {};

            if(scroll) {
            
                params.offset = offset;

                resp = await peticionPostAjax(params, 'misBienes/obtenerTodos');

                offset += resp.data.length;
                loadMore = resp.data.length;

                let htmlMisBienes = resp.data.map(function(item){
                    return plantillaMisBienes(item.data_bienes);
                }).join("");

                $("#divResultadosBusquedaMisBienes .card").append(`${htmlMisBienes}`);

            } else {

                offset = 0;
                params.offset = 0;
                
                resp = await peticionPostAjax(params, 'misBienes/obtenerTodos');

                offset += resp.data.length;
                let htmlMisBienes;

                if(offset > 0){
                    htmlMisBienes = resp.data.map(function(item){
                        return plantillaMisBienes(item.data_bienes);
                    }).join("");
                } else {
                    htmlMisBienes = "<p>No hay registros encontrados</p>";
                }
    
                $("#divResultadosBusquedaMisBienes .card").html(`<h5>Bienes guardados:</h5>${htmlMisBienes}`);

            }

            //finalizar carga
            loadingSpinner.stop(true);
           
        } catch (error) {
            messageError(error);
            
            //finalizar carga
            loadingSpinner.stop(true);

        }
    
    };

    async function guardarMisBienes(id) {

        //iniciar carga
        loadingSpinner.start(true);

        try {   
            
            const params = {
                data_bienes_id: id
            }; 

            const resp = await peticionPostAjax(params, 'misBienes/guardar');
            messageExito(resp.message);

            //finalizar carga
            loadingSpinner.stop(true);
           
        } catch (error) {
            messageError(error);
            
            //finalizar carga
            loadingSpinner.stop(true);

        }
    
    };

    async function eliminarMisBienes(id) {

        //iniciar carga
        loadingSpinner.start(true);

        try {   
            
            const params = {
                data_bienes_id: id
            }; 

            const resp = await peticionPostAjax(params, 'misBienes/eliminar');
            messageExito(resp.message);

            //finalizar carga
            loadingSpinner.stop(true);
            
            obtenerMisBienes(false);

        } catch (error) {
            messageError(error);
            
            //finalizar carga
            loadingSpinner.stop(true);

        }
    
    };

    function plantillaBienesDisponibles(data) {

        const html = 
        `<div class='box-bienes'>
            <div class='img-bienes'>
                    <img src="./src/img/home.jpg" alt=''>
            </div>
            <div class='content-bienes'>
                <div class="bienes-descripcion">
                    <p><b>Direccion:</b> ${data.direccion} </br>
                    <b>Ciudad:</b> ${data.ciudad} </br>
                    <b>Telefono:</b> ${data.telefono} </br>
                    <b>Codigo postal:</b> ${data.codigo_postal} </br>
                    <b>Tipo:</b> ${data.tipo}o </br>
                    <b>Precio:</b> ${formatearPrecio(data.precio)} </br>
                </div>
                <button type='submit' class='btn__ btn-guardar btn-guardar-misBienes' id="${data.id}">Guardar</button>
            </div>
            <div class="divider"></div>
        </div>`;

        return html;
    };

    function plantillaMisBienes(data) {

        const html = 
        `<div class='box-bienes'>
            <div class='img-bienes'>
                    <img src="./src/img/home.jpg" alt=''>
            </div>
            <div class='content-bienes'>
                <div class="bienes-descripcion">
                    <p><b>Direccion:</b> ${data.direccion} </br>
                    <b>Ciudad:</b> ${data.ciudad} </br>
                    <b>Telefono:</b> ${data.telefono} </br>
                    <b>Codigo postal:</b> ${data.codigo_postal} </br>
                    <b>Tipo:</b> ${data.tipo}o </br>
                    <b>Precio:</b> ${formatearPrecio(data.precio)} </br>
                </div>
                <button type='submit' class='btn__ btn-quitar btn-eliminar-misBienes' id="${data.id}">Quitar</button>
            </div>
            <div class="divider"></div>
        </div>`;

        return html;
    };

    function formatearPrecio(price) {

        price = price.replace("$", "").replace(",", "");
        
        if(!isNaN(price)){

            let montoDecimal = parseFloat(price);
            let resultado = montoDecimal * tasa_cambio
            resultado = resultado.toFixed(2);
            let resultadoFinal = resultado.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");

            return simbolo_moneda+" "+resultadoFinal;

        } else {
            return price;
        }
    }

    /* Eventos */
    window.addEventListener("scroll", function(){
    
        let totalScroll = window.innerHeight + Math.ceil(window.scrollY);
        let totalDiferencia = totalScroll - document.body.scrollHeight;

        if(loadingSpinner.state == false && totalDiferencia >= 100 && loadMore > 0){
        
            let tab = $("#tabs").tabs("option", "active");

            switch(tab) {

                case 0:
                    obtenerBienesDisponibles(false, scroll = true)
                break;

                case 1:
                    obtenerMisBienes(scroll = true);
                break;

                default:
                    console.log("ocurrio un error!");

            }
        }

    });

    $("#formulario").submit(function(e) {

        e.preventDefault();

        let tab = $("#tabs").tabs("option", "active");

        if(tab == 0){
            loadMore = 1;
            obtenerBienesDisponibles(false, scroll = false);
        } else {
            Toast.fire({
                icon: 'warning',
                title: "Necesitas estar en la vista de Bienes disponibles"
            });
        }

    });

    $("#tabs").tabs({
        activate: function( event, ui ) {
            offset = 0;
            loadMore = 1;
            const tabIndex = ui.newTab.index();
            if (tabIndex === 0) { //Bienes disponibles
                obtenerBienesDisponibles(false, scroll = false);
            } else if (tabIndex === 1) { //Mis disponibles
                obtenerMisBienes(false);
            }
        }
    });
      
    $(document).on('click', '.btn-guardar-misBienes', function(e){
        
        guardarMisBienes(e.target.id);

    });

    $(document).on('click', '.btn-eliminar-misBienes', function(e){
        
        eliminarMisBienes(e.target.id);

    });
    

})();