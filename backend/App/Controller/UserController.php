<?php


namespace App\Controller;

use App\Router\RestBodyReader;
use App\Router\TestClass;

/**
 * @Controller(path="/user")
 */
class UserController {

    /**
     * @Action(method="GET")
     */
    public function getUsers() {
        echo json_encode(array("test" => "test"));
    }

    /**
     * @Action(method="GET", path="/test")
     */
    public function testAction() {
        echo json_encode(array("test" => "sdaasda"));
    }

    /**
     * @Action(method="POST")
     */
    public
    function addUser() {

        /** @var TestClass $request */
        $request = RestBodyReader::readBody(TestClass::class);


        if (empty($request->getTest())) {
            echo json_encode(array("type" => "error", "message" => "test parameter is required!"));
            return;
        }

        echo json_encode(array("message" => "Added user successfully!"));
    }

    /**
     * @Action(method="GET", path="/{id}")
     */
    public
    function getUser($id) {
        echo sprintf("Obtained user with id: %s", $id);
    }

    /**
     * @Action(method="PUT", path="/{id}")
     */
    public
    function updateUser($id) {
        echo sprintf("Updated user with id: %s", $id);
    }

    /**
     * @Action(method="DELETE", path="/{id}")
     */
    public
    function deleteUser($id) {
        echo sprintf("Deleted user with id: %s", $id);
    }
}