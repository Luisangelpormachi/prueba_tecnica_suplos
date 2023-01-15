<?php
namespace Core\Infraestructura;

use Core\Models\MisBienes;
use EasyProjects\SimpleRouter\Request as Request;
use EasyProjects\SimpleRouter\Response as Response;
use Illuminate\Support\Facades\DB;
use Valitron\Validator as V;

class MisBienesController {

    public function __construct() {
    }

    public static function create(Request $request, Response $response) {

        try {
            
            // Obtener todos los registros
            $data = $request->body;

            // Crear una nueva instancia de Valitron para validar campos
            V::lang('es');
            $v = new V(array(
                'data_bienes_id' => $data->data_bienes_id
            ));
            $v->rule('required', 'data_bienes_id');
            $v->rule('integer', 'data_bienes_id');

            if ($v->validate()) {

                //Escapar caracteres interpretados como código HTML o JavaScript
                $data->data_bienes_id = htmlspecialchars($data->data_bienes_id, ENT_QUOTES, 'UTF-8');

                //Verificar que no este añadido
                $count = MisBienes::where('data_bienes_id', $data->data_bienes_id)->count();

                if($count == 0){

                    $newMisBienes = new MisBienes();
                    $newMisBienes->data_bienes_id = $data->data_bienes_id;
                    $newMisBienes->save();

                    $resp = [
                        "message" => 'Guardado correctamente',
                    ];

                    $response->status(200)->send($resp);

                } else {

                    $resp = [
                        "message" => 'Ya se encuentra registrado en mis bienes',
                    ];

                    $response->status(409 )->send($resp);

                }

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

    public static function delete(Request $request, Response $response) {

        try {

            // Obtener todos los registros
            $data = $request->body;

            // Crear una nueva instancia de Valitron para validar campos
            V::lang('es');
            $v = new V(array(
                'data_bienes_id' => $data->data_bienes_id
            ));
            $v->rule('required', 'data_bienes_id');
            $v->rule('integer', 'data_bienes_id');

            if ($v->validate()) {

                //Escapar caracteres interpretados como código HTML o JavaScript
                $data->data_bienes_id = htmlspecialchars($data->data_bienes_id, ENT_QUOTES, 'UTF-8');

                //Verificar que no este añadido
                $misBienes = MisBienes::where('data_bienes_id', $data->data_bienes_id)->first();

                if($misBienes){

                    $misBienes->delete();

                    $resp = [
                        "message" => 'Eliminado correctamente',
                    ];

                    $response->status(200)->send($resp);

                } else {

                    $resp = [
                        "message" => 'No se encuentra registrado en mis bienes',
                    ];

                    $response->status(409 )->send($resp);

                }

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

    public static function obtenerTodos(Request $request, Response $response) {

        try {
            
            // Obtener todos los registros
            $filter = $request->body;
            $offset = htmlspecialchars($filter->offset, ENT_QUOTES, 'UTF-8');

            $misBienes = MisBienes::with('data_bienes')
            ->skip($offset)
            ->take(10)
            ->get();

            $resp = [
                "message" => 'información cargada correctamente',
                "data" => $misBienes,
                "filter" => $filter
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