<?php

namespace TeamBuilder\model\entity;

class TeamMember extends Entity
{

    //region Fields

    protected const TABLE_NAME = 'team_member';

    protected string $member_id;
    protected int $team_id;
    protected int $membership_type;
    protected int $is_captain;

    //endregion

}
