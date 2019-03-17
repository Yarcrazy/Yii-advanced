<?php
namespace common\services;

use common\models\Project;
use common\models\ProjectUser;
use common\models\Task;
use common\models\User;
use yii\base\Component;

class TaskService extends Component
{
  /**
   * @param Project $project
   * @param User $user
   * @return bool
   */
  public function canManage(Project $project, User $user) {
    return \Yii::$app->projectService->hasRole($project, $user, ProjectUser::ROLE_MANAGER);
  }

  public function canTake(Task $task, User $user) {
    return (\Yii::$app->projectService->hasRole(Project::findOne(['id' => $task->project_id]), $user,
    ProjectUser::ROLE_DEVELOPER)) && (is_null($task->executor_id));
  }

  public function canComplete(Task $task, User $user) {
    return (($user->id === $task->executor_id) && is_null($task->completed_at));
  }

  public function takeTask(Task $task, User $user) {
    $task->started_at = time();
    $task->executor_id = $user->id;
    return $task;
  }

  public function completeTask(Task $task) {
    $task->completed_at = time();
    return $task;
  }
}