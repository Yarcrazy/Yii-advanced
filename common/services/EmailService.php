<?php
namespace common\services;

use Yii;
use yii\base\Component;

class EmailService extends Component
{
  public function send($to, $subj, $views, $data) {
    Yii::$app
      ->mailer
      ->compose($views, $data)
      ->setFrom([Yii::$app->params['supportEmail'] => Yii::$app->name . ' robot'])
      ->setTo($to)
      ->setSubject($subj)
      ->send();
  }
}