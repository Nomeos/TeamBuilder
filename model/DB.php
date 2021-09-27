<?php

class DB
{


    public static function getDB()
    {
        $dsn = "mysql:host=localhost;dbname=teambuilder";
        $username = "root";
        $password = "Pa$\$w0rd";
        try {
            $conn = new PDO($dsn, $username, $password);
            // set the PDO error mode to exception
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            echo "Connected successfully";
            return $conn;
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
            return null;
        }
    }

    public static function selectMany(string $string, array $array)
    {
        $conn = self::getDB();
        if ($conn != null) {
            $stmt = $conn->query($string)->fetchAll();
            return $stmt;
        } else {
            return null;
        }

    }

    public static function selectOne(string $string, array $array)
    {
        $conn = self::getDB();
        if ($conn != null) {
            $stmt = $conn->prepare($string);
            $stmt->execute($array);
            return $results = $stmt->fetch();
        } else {
            return null;
        }
    }

    public static function insert(string $string, array $array)
    {
        $conn = self::getDB();
        if ($conn != null) {
            $stmt= $conn->prepare($string);
            $stmt->execute($array);
        } else {
            return null;
        }
    }

    public static function execute(string $string, array $array)
    {
        $conn = self::getDB();
        if ($conn != null) {
            $stmt= $conn->prepare($string);
            $stmt->execute($array);
        } else {
            return null;
        }
    }
}