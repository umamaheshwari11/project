<?php

class Database
{
    public static $conn = null;

    public static function getConnection()
    {
        if (Database::$conn == null) {
            $servername = "mysql.selfmade.ninja";
            $username = "umamaheshwari";
            $password = "umamaheshwari";
            $dbname = "umamaheshwari_project";

            // Create connection
            $connection = new mysqli($servername, $username, $password, $dbname);
            // Check connection
            if ($connection->connect_error) {
                die("Connection failed: " . $connection->connect_error);
            } else {
                // printf("New connection establishing...");
                Database::$conn = $connection;
                return Database::$conn;
            }
        } else {
            printf("Returning existing establishing..."); 
            return Database::$conn;
        }
    }
}
