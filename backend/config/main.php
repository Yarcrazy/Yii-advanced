<?php
$params = array_merge(
  require __DIR__ . '/../../common/config/params.php',
  require __DIR__ . '/../../common/config/params-local.php',
  require __DIR__ . '/params.php',
  require __DIR__ . '/params-local.php'
);

return [
  'id' => 'app-backend',
  'basePath' => dirname(__DIR__),
  'controllerNamespace' => 'backend\controllers',
  'bootstrap' => ['log'],
  'layout' => 'admin-lte/main',
  'modules' => [],
  'components' => [
    'request' => [
      'csrfParam' => '_csrf-backend',
    ],
    'emailService' => [
      'class' => \common\services\EmailService::class,
    ],
    'projectService' => [
      'class' => \common\services\ProjectService::class,
        'on. ' . \common\services\ProjectService::EVENT_ASSIGN_ROLE =>
          function(\common\services\events\AssignRoleEvent $e) {
            // Yii::info(\common\services\ProjectService::EVENT_ASSIGN_ROLE, '_');
            $views = ['html' => 'assignRoleToProject.html', 'text' => 'assignRoleToProject.txt'];
            $data = ['user' => $e->user, 'project' => $e->project, 'role' => $e->role];
            Yii::$app->emailService->send($e->user->email, 'Assign role '.$e->role.'!', $views, $data);
          },
    ],
    'user' => [
      'identityClass' => 'common\models\User',
      'enableAutoLogin' => true,
      'identityCookie' => ['name' => '_identity-backend', 'httpOnly' => true],
      'on '.\yii\web\User::EVENT_AFTER_LOGIN => function() {
        Yii::info('success', 'auth');
      },
      ],
    'session' => [
      // this is the name of the session cookie used for login on the backend
      'name' => 'advanced-backend',
    ],
    'log' => [
      'traceLevel' => YII_DEBUG ? 3 : 0,
      'targets' => [
        [
          'class' => 'yii\log\FileTarget',
          'levels' => ['error', 'warning'],
        ],
        [
          'class' => 'yii\log\FileTarget',
          'logFile' => '@runtime/auth.log',
          'categories' => ['auth'],
        ],
      ],
    ],
    'errorHandler' => [
      'errorAction' => 'site/error',
    ],
    'urlManager' => [
      'enablePrettyUrl' => true,
      'showScriptName' => false,
      'rules' => [
      ],
    ],
  ],
  'params' => $params,
];
