<?php
namespace Core\Infraestructura;

use Core\Models\DataBienes;
use EasyProjects\SimpleRouter\Request as Request;
use EasyProjects\SimpleRouter\Response as Response;
use Illuminate\Support\Arr;
use Valitron\Validator as V;

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
            $filter->inicial = $filter->inicial === 'true'? true : false;

            // Crear una nueva instancia de Valitron
            V::lang('es');
            $v = new V(array(
                'ciudad' => $filter->ciudad, 
                'tipo' => $filter->tipo,
                'direccion' => $filter->direccion,
                'precios' => json_decode($filter->precios),
                'inicial' => $filter->inicial,
            ));
            $v->rule('array', 'precios');
            $v->rule('boolean', 'inicial');    
            $v->rule('regex', array('ciudad', 'tipo', 'direccion'), '/^[a-zA-Z0-9\s.,:;-_]*$/');   

            if ($v->validate()) {

                //Escapar caracteres interpretados como código HTML o JavaScript
                $filter->ciudad = htmlspecialchars($filter->ciudad, ENT_QUOTES, 'UTF-8');
                $filter->tipo = htmlspecialchars($filter->tipo, ENT_QUOTES, 'UTF-8');
                $filter->direccion = htmlspecialchars($filter->direccion, ENT_QUOTES, 'UTF-8');
                $filter->precios = json_decode($filter->precios);

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
                ->whereRaw("cast(replace(replace(precio, ',', ''), '$', '') as decimal(10,2)) between ? and ?", $filter->precios)
                ->get();

                $resp = [
                    "message" => 'bienes cargadas correctamente',
                    "data" => $bienes,
                    "filter" => $filter
                ];

                //obtener filtros si es que se carga por primera vez
                if($filter->inicial){

                    $ciudades = array();
                    $tipos = array();

                    foreach($bienes as $bien) {

                        if(!in_array($bien->ciudad, $ciudades, true)){
                            array_push($ciudades, $bien->ciudad);
                        }

                        if(!in_array($bien->tipo, $tipos, true)){
                            array_push($tipos, $bien->tipo);
                        }
                    }

                    $resp["ciudades"] = $ciudades;
                    $resp["tipos"] = $tipos;
                }

                $response->status(200)->send($resp);

            } else {

                $resp = [
                    "message" => 'Error de validacion',
                    "errors" => $v->errors()
                ];
        
                $response->status(422)->send($resp);
            }

        } catch (\Exception $ex) {
           
            $resp = [
                "message" => "Ocurrio un error inesperado!",
                "error" => $ex->getMessage()
            ];

            $response->status(500)->send($resp);

        }
    }
}