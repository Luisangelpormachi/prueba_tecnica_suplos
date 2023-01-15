<?php
namespace Core\Infraestructura;

use Core\Models\DataBienes;
use EasyProjects\SimpleRouter\Request as Request;
use EasyProjects\SimpleRouter\Response as Response;
use Valitron\Validator as V;

class DataBienesController {

    public function __construct() {
    }

    public static function create(Request $request, Response $response) {
        
        try {
            
            // Obtener todos los registros
            $data = $request->body;

            // Crear una nueva instancia de Valitron para validar campos
            V::lang('es');
            $v = new V(array(
                'direccion' => $data->direccion,
                'ciudad' => $data->ciudad,
                'telefono' => $data->telefono,
                'codigo_postal' => $data->codigo_postal,
                'tipo' => $data->tipo,
                'precio' => $data->precio
            ));
            $v->rule('required', ['direccion', 'ciudad', 'telefono', 'codigo_postal', 'tipo', 'precio']);
            $v->rules([
                'lengthMax' => [
                    ['direccion', 35],
                    ['ciudad', 11],
                    ['telefono', 12],
                    ['codigo_postal', 9],
                    ['tipo', 13],
                    ['precio', 7]
                ]
            ]);

            if ($v->validate()) {

                //Escapar caracteres interpretados como código HTML o JavaScript
                $data->direccion = htmlspecialchars($data->direccion, ENT_QUOTES, 'UTF-8');
                $data->ciudad = htmlspecialchars($data->ciudad, ENT_QUOTES, 'UTF-8');
                $data->telefono = htmlspecialchars($data->telefono, ENT_QUOTES, 'UTF-8');
                $data->codigo_postal = htmlspecialchars($data->codigo_postal, ENT_QUOTES, 'UTF-8');
                $data->tipo = htmlspecialchars($data->tipo, ENT_QUOTES, 'UTF-8');
                $data->precio = htmlspecialchars($data->precio, ENT_QUOTES, 'UTF-8');

                //crear
                $newMisBienes = new DataBienes();
                $newMisBienes->direccion = $data->direccion;
                $newMisBienes->ciudad = $data->ciudad;
                $newMisBienes->telefono = $data->telefono;
                $newMisBienes->codigo_postal = $data->codigo_postal;
                $newMisBienes->tipo = $data->tipo;
                $newMisBienes->precio = $data->precio;
                $newMisBienes->save();

                $resp = [
                    "message" => 'Guardado correctamente',
                ];

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

    public static function obtener($id, Response $response) {

        // Crear una nueva instancia de Valitron para validar campos
        V::lang('es');
        $v = new V(array(
            'id' => $id
        ));
        $v->rule('required', ['id']);
        $v->rule('integer', ['id']);

        if ($v->validate()) {

            //Escapar caracteres interpretados como código HTML o JavaScript
            $id = htmlspecialchars($id, ENT_QUOTES, 'UTF-8');

            //crear
            $dataBienes = DataBienes::find($id);

            if($dataBienes){
                
                $resp = [
                    "data" => $dataBienes,
                    "message" => 'Data obtenida correctamente'
                ];
    
                $response->status(200)->send($resp);

            }else{
                
                $resp = [
                    "message" => 'El registro no existe!',
                ];
        
                $response->status(404)->send($resp);

            }

        } else {
        
            $resp = [
                "message" => 'Error de validacion',
                "errors" => $v->errors()
            ];
    
            $response->status(422)->send($resp);
        }

    }

    public static function update(Request $request, Response $response) {
        
        try {
            
            // Obtener todos los registros
            $data = $request->body;

            // Crear una nueva instancia de Valitron para validar campos
            V::lang('es');
            $v = new V(array(
                'id' => $data->id,
                'direccion' => $data->direccion,
                'direccion' => $data->direccion,
                'ciudad' => $data->ciudad,
                'telefono' => $data->telefono,
                'codigo_postal' => $data->codigo_postal,
                'tipo' => $data->tipo,
                'precio' => $data->precio
            ));
            $v->rule('required', ['id', 'direccion', 'ciudad', 'telefono', 'codigo_postal', 'tipo', 'precio']);
            $v->rule('integer', 'id');
            $v->rules([
                'lengthMax' => [
                    ['direccion', 35],
                    ['ciudad', 11],
                    ['telefono', 12],
                    ['codigo_postal', 9],
                    ['tipo', 13],
                    ['precio', 7]
                ]
            ]);

            if ($v->validate()) {

                //Escapar caracteres interpretados como código HTML o JavaScript
                $data->id = htmlspecialchars($data->id, ENT_QUOTES, 'UTF-8');
                $data->direccion = htmlspecialchars($data->direccion, ENT_QUOTES, 'UTF-8');
                $data->ciudad = htmlspecialchars($data->ciudad, ENT_QUOTES, 'UTF-8');
                $data->telefono = htmlspecialchars($data->telefono, ENT_QUOTES, 'UTF-8');
                $data->codigo_postal = htmlspecialchars($data->codigo_postal, ENT_QUOTES, 'UTF-8');
                $data->tipo = htmlspecialchars($data->tipo, ENT_QUOTES, 'UTF-8');
                $data->precio = htmlspecialchars($data->precio, ENT_QUOTES, 'UTF-8');

                //actualizar
                $bien = DataBienes::where('id', $data->id)->first();

                if($bien){
                    $bien->fill((array)$data);
                    $bien->update();
                }else{
                    
                    $resp = [
                        "message" => 'El registro no existe!',
                    ];
            
                    $response->status(404)->send($resp);

                }

                $resp = [
                    "message" => 'Actualizado correctamente',
                ];

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

    public static function delete(Request $request, Response $response) {
       
        try {
            
            // Obtener todos los registros
            $data = $request->body;

            // Crear una nueva instancia de Valitron para validar campos
            V::lang('es');
            $v = new V(array(
                'id' => $data->id
            ));
            $v->rule('required', 'id');
            $v->rule('integer', 'id');
            
            if ($v->validate()) {

                //Escapar caracteres interpretados como código HTML o JavaScript
                $data->id = htmlspecialchars($data->id, ENT_QUOTES, 'UTF-8');

                //actualizar
                $bien = DataBienes::where('id', $data->id)->first();
                
                if($bien){
                    $bien->delete();
                }else{
                    
                    $resp = [
                        "message" => 'El registro no existe!',
                    ];
            
                    $response->status(404)->send($resp);

                }

                $resp = [
                    "message" => 'Eliminado correctamente',
                ];

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

    public static function obtenerTodos(Request $request, Response $response) {

        try {
            
            // Obtener todos los registros
            $filter = $request->body;
            $filter->inicial = $filter->inicial === 'true'? true : false;

            // Crear una nueva instancia de Valitron para validar campos
            V::lang('es');
            $v = new V(array(
                'ciudad' => $filter->ciudad, 
                'tipo' => $filter->tipo,
                'direccion' => $filter->direccion,
                'precios' => json_decode($filter->precios),
                'inicial' => $filter->inicial,
                'offset' => $filter->offset
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
                $offset = htmlspecialchars($filter->offset, ENT_QUOTES, 'UTF-8');

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
                ->skip($offset)
                ->take(10)
                ->get();

                $resp = [
                    "message" => 'información cargada correctamente',
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