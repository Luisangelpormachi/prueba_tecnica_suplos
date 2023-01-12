<?php

    require_once __DIR__."/vendor/autoload.php";
    require_once __DIR__.'/core/Models/dbEloquent.php';

    use Core\Infraestructura\MisBienes;
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

    $router->post("/bienes/disponibles", function(Request $req, Response $res){
        
        $misBienes = new MisBienes();
        $responseData = $misBienes->obtenerTodos($req, $res);
        echo json_encode($responseData);

    });


?>