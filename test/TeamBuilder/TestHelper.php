<?php

namespace TeamBuilder;

use PDO;

class TestHelper
{

    public static function createDatabase()
    {
        $connection = new PDO("mysql:host=localhost;dbname=teambuilder","root", "root");
        $query = file_get_contents(dirname(__DIR__, 2) . '/sql/create_teambuilder_and_inserts.sql');
        $connection->exec($query);
    }
}
