<?php
namespace Core\Infraestructura;

use Core\Shared\Response;


class Inmueble {

    public function __construct() {
    }

    public static function create(Response $response) {
        // Gerenerar el registro y retornar el registro creado 
    }

    public static function obtener($id, Response $response) {
        // Obtener el registro
    }

    public static function update($id, $data, Response $response) {
        // Actualizar el registro
    }

    public static function delete($id, Response $response) {
        // Eliminar el registro
    }

    public static function obtenerTodos($filters = array(), Response $response) {
        // Obtener todos los registros
    }
}