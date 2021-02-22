<?php


namespace App\Database;


use PDO;

class DatabaseConnector {

    private static $databaseConnection;

    //TODO Consider to move it to configuration
    const DSN = "mysql:host=172.17.0.4;dbname=weather_service";
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
