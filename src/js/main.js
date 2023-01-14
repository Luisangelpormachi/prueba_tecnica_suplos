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

    // const response_data_coins = await mstCoins();
    obtenerBienesDisponibles(true);

    async function obtenerBienesDisponibles(inicial = false) {

        //iniciar carga
        loadingSpinner.start(true);

        //desabilitar acciones
        actions.disabled();

        try {   

            const form = $("#formulario")[0];

            const params = {
                direccion: form.direccion.value,
                ciudad: form.ciudad.value,
                tipo: form.tipo.value,
                precios: JSON.stringify(form.precio.value.split(";")),
                inicial: inicial
            };
            
            const resp = await peticionPostAjax(params, 'bienes/obtenerTodos');
            
            let htmlBienesDisponibles = resp.data.map(function(item){
                return plantillaBienesDisponibles(item);
            }).join("");

            $("#divResultadosBusquedaDisponibles .card").html(`<h5>Resultados de la búsquedas:</h5>${htmlBienesDisponibles}`);

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
            //habilitar acciones
            actions.enable();
           

        } catch (error) {
            messageError(error);
            
            //finalizar carga
            loadingSpinner.stop(true);
            //habilitar acciones
            actions.enable();
        }
    
    };

    async function obtenerBienesMisBienes() {

        //iniciar carga
        loadingSpinner.start(true);

        //desabilitar acciones
        actions.disabled();

        try {   
            
            const resp = await peticionGetAjax('misBienes/obtenerTodos');

            let htmlMisBienes = resp.data.map(function(item){
                return plantillaMisBienes(item.data_bienes);
            }).join("");

            $("#divResultadosBusquedaMisBienes .card").html(`<h5>Bienes guardados:</h5>${htmlMisBienes}`);

            //finalizar carga
            loadingSpinner.stop(true);
            //habilitar acciones
            actions.enable();
           
        } catch (error) {
            messageError(error);
            
            //finalizar carga
            loadingSpinner.stop(true);
            //habilitar acciones
            actions.enable();
        }
    
    };

    async function guardarMisBienes(id) {

        //iniciar carga
        loadingSpinner.start(true);

        //desabilitar acciones
        actions.disabled();

        try {   
            
            const params = {
                data_bienes_id: id
            }; 

            const resp = await peticionPostAjax(params, 'misBienes/guardar');
            messageExito(resp.message);

            //finalizar carga
            loadingSpinner.stop(true);
            //habilitar acciones
            actions.enable();
           
        } catch (error) {
            messageError(error);
            
            //finalizar carga
            loadingSpinner.stop(true);
            //habilitar acciones
            actions.enable();
        }
    
    };

    async function eliminarMisBienes(id) {

        //iniciar carga
        loadingSpinner.start(true);

        //desabilitar acciones
        actions.disabled();

        try {   
            
            const params = {
                data_bienes_id: id
            }; 

            const resp = await peticionPostAjax(params, 'misBienes/eliminar');
            messageExito(resp.message);

            //finalizar carga
            loadingSpinner.stop(true);
            //habilitar acciones
            actions.enable();
            
            obtenerBienesMisBienes();

        } catch (error) {
            messageError(error);
            
            //finalizar carga
            loadingSpinner.stop(true);
            //habilitar acciones
            actions.enable();
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
                    <b>Precio:</b> ${data.precio} </br>
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
                    <b>Precio:</b> ${data.precio} </br>
                </div>
                <button type='submit' class='btn__ btn-quitar btn-eliminar-misBienes' id="${data.id}">Quitar</button>
            </div>
            <div class="divider"></div>
        </div>`;

        return html;
    };
    
    /* Eventos */
    $("#formulario").submit(function(e) {

        e.preventDefault();
        obtenerBienesDisponibles();

    });

    $("#tabs").tabs({
        activate: function( event, ui ) {
            const tabIndex = ui.newTab.index();
            if (tabIndex === 0) { //Bienes disponibles
                obtenerBienesDisponibles();
                console.log("Bienes disponibles");
            } else if (tabIndex === 1) { //Mis disponibles
                obtenerBienesMisBienes();
                console.log("Mis Bienes");
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