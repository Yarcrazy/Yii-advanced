<?php
namespace common\services;

use common\models\Project;
use common\models\User;
use common\services\events\AssignRoleEvent;
use yii\base\Component;

class ProjectService extends Component
{
  const EVENT_ASSIGN_ROLE = 'event_assign_role';
  public function AssignRole(Project $project, User $user, $role) {
    $event = new AssignRoleEvent();
    $event->project = $project;
    $event->user = $user;
    $event->role = $role;
    $this->trigger(self::EVENT_ASSIGN_ROLE, $event);
  }
}