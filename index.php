<?php

    require_once __DIR__."/vendor/autoload.php";
    require_once __DIR__.'/core/Models/dbEloquent.php';

    use Core\Infraestructura\DataBienesController;
    use Core\Infraestructura\MisBienesController;
    use EasyProjects\SimpleRouter\Router as Router;
    use EasyProjects\SimpleRouter\Request as Request;
    use EasyProjects\SimpleRouter\Response as Response;

    $router = new Router();

    $router->get("/", function(Request $req, Response $res){
       
        require_once './core/parameters.php';
        require_once './views/partials/header.php';
        require_once './views/index.php';
        require_once './views/partials/footer.php';

    });

    /* Rutas para bienes */

    $router->get("/bienes/obtener/{id}", function($data, Response $res){

        sleep(1);

        $dataBienes = new DataBienesController();
        $responseData = $dataBienes->obtener($data->params->id, $res);
        echo json_encode($responseData);

    });

    $router->post("/bienes/obtenerTodos", function(Request $req, Response $res){

        sleep(1);

        $dataBienes = new DataBienesController();
        $responseData = $dataBienes->obtenerTodos($req, $res);
        echo json_encode($responseData);

    });

    $router->post("/bienes/crear", function(Request $req, Response $res){

        sleep(1);

        $dataBienes = new DataBienesController();
        $responseData = $dataBienes->create($req, $res);
        echo json_encode($responseData);

    });

    $router->put("/bienes/actualizar", function(Request $req, Response $res){

        sleep(1);

        $dataBienes = new DataBienesController();
        $responseData = $dataBienes->update($req, $res);
        echo json_encode($responseData);

    });

    $router->delete("/bienes/eliminar", function(Request $req, Response $res){

        sleep(1);

        $dataBienes = new DataBienesController();
        $responseData = $dataBienes->delete($req, $res);
        echo json_encode($responseData);

    });

    /* Rutas para mis bienes */

    $router->post("/misBienes/obtenerTodos", function(Request $req, Response $res){

        sleep(1);

        $misBienes = new MisBienesController();
        $responseData = $misBienes->obtenerTodos($req, $res);
        echo json_encode($responseData);

    });
    
    $router->post("/misBienes/guardar", function(Request $req, Response $res){

        sleep(1);

        $dataBienes = new MisBienesController();
        $responseData = $dataBienes->create($req, $res);
        echo json_encode($responseData);

    });

    $router->post("/misBienes/eliminar", function(Request $req, Response $res){

        sleep(1);

        $dataBienes = new MisBienesController();
        $responseData = $dataBienes->delete($req, $res);
        echo json_encode($responseData);

    });

?>