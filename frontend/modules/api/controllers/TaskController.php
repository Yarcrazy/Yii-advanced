<?php

namespace frontend\modules\api\controllers;

use frontend\modules\api\models\Task;
use yii\data\ActiveDataProvider;
use yii\rest\Controller;

class TaskController extends Controller
{
  public $modelClass = Task::class;

  /**
   * Lists all Task models.
   * @return mixed
   */
  public function actionIndex()
  {
    return new ActiveDataProvider([
      'query' => Task::find(),
    ]);
  }

  /**
   * List $id Task model.
   * @return mixed
   */
  public function actionView($id)
  {
    return Task::findOne($id);
  }
}
