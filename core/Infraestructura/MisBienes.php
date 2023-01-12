<?php
namespace Core\Infraestructura;

use Core\Models\DataBienes;
use EasyProjects\SimpleRouter\Request as Request;
use EasyProjects\SimpleRouter\Response as Response;

class MisBienes {

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

    public static function obtenerTodos(Request $request, Response $response) {

        try {
            
            // Obtener todos los registros
            $filter = $request->body;

            //escapar caracteres interpretados como código HTML o JavaScript
            $filter->ciudad = htmlspecialchars($filter->ciudad, ENT_QUOTES, 'UTF-8');
            $filter->tipo = htmlspecialchars($filter->tipo, ENT_QUOTES, 'UTF-8');
            $filter->direccion = htmlspecialchars($filter->direccion, ENT_QUOTES, 'UTF-8');
            $filter->precio = htmlspecialchars($filter->precio, ENT_QUOTES, 'UTF-8');

            $bienes = DataBienes::where(function($query) use ($filter) {
                if ($filter->ciudad !== '') {
                    $query->where('ciudad', '=', $filter->ciudad);
                }
                if ($filter->tipo !== '') {
                    $query->where('tipo', '=', $filter->tipo);
                }
                if ($filter->direccion !== '') {
                    $query->where('direccion', 'like', '%' . $filter->direccion. '%');
                }
            })
            ->get();

            $resp = [
                "message" => 'bienes cargadas correctamente',
                "data" => $bienes,
                "request" => $filter
            ];
    
            $response->status(200)->send($resp);

        } catch (\Exception $ex) {
           
            $resp = [
                "message" => "Ocurrio un error inesperado!",
                "error" => $ex->getMessage()
            ];

            $response->status(500)->send($resp);

        }
    }
}