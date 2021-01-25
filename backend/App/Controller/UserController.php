<?php


namespace App\Controller;

class UserController {

    public function getUsersAction() {
        echo json_encode(array(
            array(
                "first_name" => "Igor",
                "last_name" => "Maculewicz",
                "age" => "26"
            ),
            array(
                "first_name" => "Adaś",
                "last_name" => "Kowalski",
                "age" => "35"
            ),
            array(
                "first_name" => "Marek",
                "last_name" => "Nowak",
                "age" => "14"
            ),
            array(
                "first_name" => "Marta",
                "last_name" => "Testowska",
                "age" => "64"
            )
        ));
    }

    public function getUserAction($id) {
        echo json_encode(array("message" => "Testowa wiadomość"));
    }

    public function addUserAction() {
        echo "Added user";
    }

    public function updateUserAction($id) {
        echo sprintf("Updated user with id: %s", $id);
    }

    public function deleteUserAction($id) {
        echo sprintf("Deleted user with id: %s", $id);
    }
}