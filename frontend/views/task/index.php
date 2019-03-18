<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel common\models\search\TaskSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Tasks';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="task-index">

	<h1><?= Html::encode($this->title) ?></h1>

	<p>
    <?= Html::a('Create Task', ['create'], ['class' => 'btn btn-success']) ?>
	</p>

  <?php Pjax::begin(); ?>
  <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

  <?= GridView::widget([
    'dataProvider' => $dataProvider,
    'filterModel' => $searchModel,
    'columns' => [
      ['class' => 'yii\grid\SerialColumn'],

      'id',
      'title',
      'description:ntext',
      [
        'attribute' => 'project_id',
        'label' => 'Project',
        'value' => function (\common\models\Task $model) {
          return Html::a($model->project->title, ['project/view', 'id' =>
            $model->project_id]);
        },
        'filter' => \common\models\Project::find()->onlyActive()
          ->select('title')->indexBy('id')->column(),
        'format' => 'html',
      ],
      [
        'attribute' => 'creator_id',
        'label' => 'Creator',
        'value' => function (\common\models\Task $model) {
          return Html::a($model->creator->username, ['user/view', 'id' =>
            $model->creator_id]);
        },
        'filter' => \common\models\User::find()->onlyActive()
          ->select('username')->indexBy('id')->column(),
        'format' => 'html',
      ],
      [
        'attribute' => 'executor_id',
        'label' => 'Executor',
        'value' => function (\common\models\Task $model) {
          if (is_null($model->executor)) {
            return 'not executed';
          }
          return Html::a($model->executor->username, ['user/view', 'id' =>
            $model->executor_id]);
        },
        'filter' => \common\models\User::find()->onlyActive()
          ->select('username')->indexBy('id')->column(),
        'format' => 'html',
      ],
      //'started_at',
      //'completed_at',
      //'creator_id',
      //'updater_id',
      //'created_at',
      //'updated_at',

      [
      	'class' => 'yii\grid\ActionColumn',
        'template' => '{view} {update} {delete} {take} {complete}',
				'buttons' =>
          [
            'take' => function ($url, $model, $key) {
              $icon = \yii\bootstrap\Html::icon('hand-right');
              return Html::a($icon, ['task/take', 'id' => $model->id], ['data' => [
              	'confirm' => 'Do you take the task?',
								'method' => 'post',
							],]);
            },
            'complete' => function ($url, $model, $key) {
              $icon = \yii\bootstrap\Html::icon('ok');
              return Html::a($icon, ['task/complete', 'id' => $model->id], ['data' => [
              	'confirm' => 'Do you complete the task?',
								'method' => 'post',
							],]);
            }
          ],
				'visibleButtons' => [
					'update' => function(\common\models\Task $model) {
						return Yii::$app->taskService->canManage($model->project, Yii::$app->user->identity);
					},
					'delete' => function(\common\models\Task $model) {
						return Yii::$app->taskService->canManage($model->project, Yii::$app->user->identity);
					},
          'take' => function(\common\models\Task $model, $key, $index) {
            return Yii::$app->taskService->canTake($model, Yii::$app->user->identity);
          },
          'complete' => function(\common\models\Task $model, $key, $index) {
            return Yii::$app->taskService->canComplete($model, Yii::$app->user->identity);
          },
				],
			],
    ],
  ]); ?>

  <?php Pjax::end(); ?>

</div>
