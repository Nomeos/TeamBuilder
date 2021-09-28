<?php

namespace TeamBuilder\model;

use TeamBuilder\config\Conf;
use PHPUnit\Framework\TestCase;
use TeamBuilder\test\TestHelper;

class DatabaseTest extends TestCase
{

    private Database $database;
    private string   $query;

    public function __construct()
    {
        parent::__construct();

        $this->database = new Database(Conf::getDsn(), Conf::DB_USER_NAME, Conf::DB_USER_PWD);
    }

    protected function setUp(): void
    {
        TestHelper::createDatabase();
    }

    public function testFetchRecords_roles_allRoles()
    {
        /* Given */
        $this->query = "SELECT * FROM roles";
        $expectedRolesQuantity = 2;

        /* When */
        $roles = $this->database->fetchRecords($this->query);

        /* Then */
        $this->assertCount($expectedRolesQuantity, $roles);
    }

    public function testFetchOne_roleWhereSlugMug_allRoles()
    {
        /* Given */
        $this->query = "SELECT * FROM roles where slug = :slug";
        $expectedRoleName = "Moderator";

        /* When */
        $result = $this->database->fetchOne($this->query, ["slug" => "MOD"]);

        /* Then */
        $this->assertEquals($expectedRoleName, $result["name"]);
    }

    public function testInsert_slugWithName_rowId()
    {
        /* Given */
        $this->query = "INSERT INTO roles(slug,name) VALUES (:slug, :name)";
        $expectedId = 3;

        /* When */
        $result = $this->database->insert($this->query, ["slug" => "XXX", "name" => "Slasher"]);

        /* Then */
        $this->assertEquals($expectedId, $result);
    }

    public function testUpdate_roleWithName_rowCount()
    {
        /* Given */
        $this->query = "UPDATE roles set name = :name WHERE slug = :slug";
        $expectedRowCount = 1;

        /* When */
        $result = $this->database->update($this->query, ["name" => "Slasher", "slug" => "MOD"]);

        /* Then */
        $this->assertEquals($expectedRowCount, $result);
    }
}
