<?php
declare(strict_types=1);
header("Content_type: application/json; charset=UTF-8");

spl_autoload_register(function ($class){
    require __DIR__ . "/src/$class.php";
});
    
$router = new Router();
set_exception_handler('ErrorHandeler::handle_excption');

        $router->addRoute('create-database', function () {
            require "./config.php";
            $database = new Database(HOST, DB_USER, DB_PASS, "shop");
            $database->create_tabl();
        });

        $router->addRoute('users', function () {
            
            $controller = new UserController();
            $id = $_GET['id']?? null;
            $controller->user_request($_SERVER['REQUEST_METHOD'], $id);
        });
    
$url = $_SERVER['REQUEST_URI'];
$router->dispatch($url);

?>