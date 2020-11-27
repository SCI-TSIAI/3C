<?php


namespace App\User\Repository;


use App\Database\DatabaseConnection;
use App\User\Entity\UserEntity;
use PDO;
use PDOStatement;

class UserRepository {

    private $databaseConnection;

    /**
     * UserRepository constructor.
     */
    public function __construct() {
        $this->databaseConnection = DatabaseConnection::getInstance();
    }

    /**
     * @param $id
     * @return UserEntity
     */
    public function getUserById($id) {
        $query = $this->prepareStatement("Select * from user where id=:id");

        $query->execute(array(":id" => $id));

        return $query->fetch();
    }

    protected function getEntityName() {
        return "App\User\Entity\UserEntity";
    }

    /**
     * @param $statement
     * @return bool|PDOStatement
     */
    private function prepareStatement($statement) {
        $preparedStatement = $this->databaseConnection->prepare($statement);

        $preparedStatement->setFetchMode(PDO::FETCH_CLASS, $this->getEntityName());

        return $preparedStatement;
    }
}
