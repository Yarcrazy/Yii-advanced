<?php
namespace common\services;

use Yii;
use yii\base\Component;

class NotificationService extends Component
{
  protected $emailService;

  public function __construct(EmailServiceInterface $emailService, array $config = [])
  {
    parent::__construct($config);
    $this->emailService = $emailService;
  }

  /**
   * @param $user /common/models/User
   * @param $project /common/models/Project
   * @param $role string
   */
  public function send($user, $project, $role) {
    $views = ['html' => 'assignRoleToProject-html', 'text' => 'assignRoleToProject-text'];
    $data = ['user' => $user, 'project' => $project, 'role' => $role];
    $this->emailService->send($user->email, 'Assign role '.$role.'!', $views, $data);
  }
}