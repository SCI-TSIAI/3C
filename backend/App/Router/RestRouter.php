<?php namespace App\Router;

use Bramus\Router\Router;

class RestRouter {

    private static $router;

    public static function run() {
        if (empty(self::$router)) {
            self::$router = new Router();
            self::$router->setNamespace("\App\Controller");
            //TODO consider to register routes here?

            self::$router->before('GET|POST|PUT|DELETE', '/.*', function () {
                header('Content-type: application/json');
            });

            self::$router->get('/user', 'UserController@getUsersAction');
            self::$router->get('/user/{id}', 'UserController@getUserAction');
            self::$router->post('/user', 'UserController@addUserAction');
            self::$router->put('/user/{id}', 'UserController@updateUserAction');
            self::$router->delete('/user/{id}', 'UserController@deleteUserAction');

            self::$router->get("/reflect-message/{message}", function ($message) {
                echo json_encode(array("message" => $message));
            });

            self::$router->run();
        }
    }
}