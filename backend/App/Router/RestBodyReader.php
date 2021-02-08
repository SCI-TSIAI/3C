<?php


namespace App\Router;


use App\Controller\UserController;
use App\Serializer\JsonSerializer;

class RestBodyReader {

    public static function readRequestBody($classReference = null) {
        $rawBody = file_get_contents('php://input');

        $headers = array();

        foreach (getallheaders() as $key => $value) {
            $headers[strtolower($key)] = $value;
        }

        if ($headers["content-type"] === "application/json") {
            if (empty($classReference)) {
                return json_decode($rawBody);
            } else {
                return JsonSerializer::getInstance()->deserialize($rawBody, $classReference, 'json');
            }
        }

        return $rawBody;
    }
}