<?php

namespace TeamBuilder\model\entity;

use PDOException;

class Member extends Entity
{

    //region Fields

    protected const TABLE_NAME = 'members';
    protected string $name;
    protected string $password;
    protected int    $role_id;
    protected int    $status_id;

    //endregion

    //region Methods

    public function teams(): array
    {

        $query = "SELECT teams.id, teams.name, teams.state_id FROM teams INNER JOIN team_member ON team_member.team_id = teams.id INNER JOIN members ON team_member.member_id = members.id WHERE members.id = :id ";
        return self::createDatabase()->fetchRecords($query, Team::class, ["id" => $this->id]);
    }

    /**
     * Search a member where value equal column.
     *
     * @param string $column The column.
     * @param int    $value  The value searched.
     *
     * @return array An array of members founds, empty if not found.
     */
    public static function where(string $column, int $value): Member
    {
        $query = "SELECT * FROM members WHERE $column = :id";

        return self::createDatabase()->fetchOne($query, Member::class, ["id" => $value]);
    }
    //endregion

    public function moderators(): array
    {
        $query = "SELECT m.name, m.id, m.role_id FROM members m INNER JOIN roles ON roles.id = m.role_id WHERE roles.slug = 'MOD' ";
        return self::createDatabase()->fetchRecords($query, Member::class,[]);
    }

    public function role(): Role
    {
        $query = "SELECT r.id, r.slug, r.name FROM roles AS r 
WHERE r.id = :id";
        return self::createDatabase()->fetchOne($query, Role::class,["id" => $this->role_id]);
    }

    public function status(): Status
    {
        $query = "SELECT s.id, s.name FROM status AS s 
WHERE s.id = :id";
        return self::createDatabase()->fetchOne($query, Status::class,["id" => $this->status_id]);
    }

    public function teamMember(): Array
    {
        $query = "SELECT tb.id, tb.member_id, tb.team_id,tb.membership_type, tb.is_captain FROM team_member AS tb
WHERE tb.member_id = :id";
        return self::createDatabase()->fetchRecords($query, TeamMember::class,["id" => $this->id]);
    }

}
