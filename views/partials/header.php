<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta id="base_url" content="<?= base_url ?>">
    <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link type="text/css" rel="stylesheet" href="<?= base_url ?>src/css/materialize.min.css" media="screen,projection" />
    <link type="text/css" rel="stylesheet" href="<?= base_url ?>src/css/customColors.css" media="screen,projection" />
    <link type="text/css" rel="stylesheet" href="<?= base_url ?>src/css/ion.rangeSlider.css" media="screen,projection" />
    <link type="text/css" rel="stylesheet" href="<?= base_url ?>src/css/ion.rangeSlider.skinFlat.css" media="screen,projection" />
    <link type="text/css" rel="stylesheet" href="<?= base_url ?>src/css/index.css" media="screen,projection" />
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Formulario</title>
</head>

<body>

    <div class="content-loading-spinner">
        <div class="loading-spinner"></div>
    </div>

    <video src="./src/video/video.mp4" id="vidFondo"></video>
    <div class="contenedor">
        <div class="card rowTitulo">
            <h1>Bienes Suplos</h1>
        </div>
        <div class="colFiltros">
            <form action="#" method="post" id="formulario">
                <div class="filtrosContenido">
                    <div class="tituloFiltros">
                        <h5>Filtros</h5>
                    </div>
                    <div class="filtroCiudad input-field">
                        <p><label for="selectCiudad">Dirección:</label><br></p>
                        <input type="text" value="" name="direccion" placeholder="Escribe una dirección" />
                    </div>
                    <div class="filtroCiudad input-field">
                        <p><label for="selectCiudad">Ciudad:</label><br></p>
                        <select name="ciudad" id="selectCiudad">
                            <option value="" selected>Elige una ciudad</option>
                        </select>
                    </div>
                    <div class="filtroTipo input-field">
                        <p><label for="selecTipo">Tipo:</label></p>
                        <br>
                        <select name="tipo" id="selectTipo">
                            <option value="">Elige un tipo</option>
                        </select>
                    </div>
                    <div class="filtroPrecio">
                        <label for="rangoPrecio">Precio:</label>
                        <input type="text" id="rangoPrecio" name="precio" value="" />
                    </div>
                    <div class="botonField">
                        <input type="submit" class="btn white" value="Buscar" id="submitButton">
                    </div>
                </div>
            </form>
        </div>