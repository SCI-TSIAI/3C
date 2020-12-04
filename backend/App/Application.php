<?php


namespace App;


use App\User\Entity\UserEntity;
use App\User\Repository\UserRepository;

class Application {

    public static function run() {
        $userRepository = new UserRepository();

        $userEntity = $userRepository->getById(1);

        $newUserEntity = new UserEntity();

        $newUserEntity->setUsername("sdsa");
        $newUserEntity->setPassword("dsadsa");
        $newUserEntity->setSalt("sdsdaads");
        $newUserEntity->setGroupId(1);
        $newUserEntity->setLastLogin(date("Y-m-d H:i:s"));

        $newUserEntity = $userRepository->save($newUserEntity);

        $userRepository->save($newUserEntity);
    }

}