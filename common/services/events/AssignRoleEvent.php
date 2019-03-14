<?php

namespace common\services\events;

use yii\base\Event;

class AssignRoleEvent extends Event
{
  public $project;
  public $user;
  public $role;
}