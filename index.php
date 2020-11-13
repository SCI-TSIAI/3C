<?php

class DatabaseConnection {

    private static $databaseConnection;

    //TODO Consider to move it to configuration
    const DSN = "mysql:host=172.17.0.2;dbname=weather_service";
    const DATABASE_USERNAME = "root";
    const DATABASE_PASSWORD = "root";

    public static function getInstance() {

        if (!self::$databaseConnection) {
            self::$databaseConnection = new PDO(
                self::DSN,
                self::DATABASE_USERNAME,
                self::DATABASE_PASSWORD
            );
        }

        return self::$databaseConnection;
    }
}


class UserEntity {

    private $id;
    private $group_id;
    private $username;
    private $password;
    private $last_login;
    private $created_at;

    /**
     * @return mixed
     */
    public function getId() {
        return $this->id;
    }

    /**
     * @param mixed $id
     * @return UserEntity
     */
    public function setId($id) {
        $this->id = $id;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getGroupId() {
        return $this->group_id;
    }

    /**
     * @param mixed $group_id
     * @return UserEntity
     */
    public function setGroupId($group_id) {
        $this->group_id = $group_id;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getUsername() {
        return $this->username;
    }

    /**
     * @param mixed $username
     * @return UserEntity
     */
    public function setUsername($username) {
        $this->username = $username;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getPassword() {
        return $this->password;
    }

    /**
     * @param mixed $password
     * @return UserEntity
     */
    public function setPassword($password) {
        $this->password = $password;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getLastLogin() {
        return $this->last_login;
    }

    /**
     * @param mixed $last_login
     * @return UserEntity
     */
    public function setLastLogin($last_login) {
        $this->last_login = $last_login;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getCreatedAt() {
        return $this->created_at;
    }

    /**
     * @param mixed $created_at
     * @return UserEntity
     */
    public function setCreatedAt($created_at) {
        $this->created_at = $created_at;
        return $this;
    }
}

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
        $query = $this->databaseConnection->prepare("Select * from user where id=:id");

        $query->execute(array(":id" => $id));

        $result = $query->fetchAll(PDO::FETCH_CLASS, $this->getEntityName());

        return $result;
    }

    protected function getEntityName() {
        return "UserEntity";
    }
}

$userRepository = new UserRepository();

$userEntity = $userRepository->getUserById(1);