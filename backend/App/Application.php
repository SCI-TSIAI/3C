<?php


namespace App;


use App\User\Repository\UserRepository;

class Application {

    public static function run(){
        $userRepository = new UserRepository();

        $userEntity = $userRepository->getUserById(1);
    }

}