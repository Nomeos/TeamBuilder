<?php

namespace TeamBuilder\model\entity;

class Team extends Entity
{

    //region Fields

    protected const TABLE_NAME = 'teams';

    protected string $name;
    protected int $state_id;

    //endregion

    public function members(): array
    {
        $query = "SELECT members.id, members.name FROM members INNER JOIN team_member ON team_member.member_id = members.id INNER JOIN teams ON teams.id = team_member.team_id WHERE teams.id = :id ";
        return self::createDatabase()->fetchRecords($query, Member::class, ["id" => $this->id]);
    }

    public function getCapitain(): Member
    {
        $query = "SELECT members.id, members.name FROM members INNER JOIN team_member ON team_member.member_id = members.id INNER JOIN teams ON teams.id = team_member.team_id WHERE teams.id = :id and team_member.is_captain = 1";
        return self::createDatabase()->fetchOne($query, Member::class, ["id" => $this->id]);
    }
}
