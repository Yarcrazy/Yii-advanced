<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel common\models\search\ProjectSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Projects';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="project-index">

	<h1><?= Html::encode($this->title) ?></h1>

  <?php Pjax::begin(); ?>
  <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

  <?= GridView::widget([
    'dataProvider' => $dataProvider,
    'filterModel' => $searchModel,
    'columns' => [
      ['class' => 'yii\grid\SerialColumn'],

      'title',
      [
        'attribute' => \common\models\Project::RELATION_PROJECT_USERS . '.role',
        'value' => function (\common\models\Project $model) {
          return join(', ', Yii::$app->projectService->getRoles($model, Yii::$app->user->identity));
        },
        'format' => 'html',
      ],
      'description:ntext',
      [
        'attribute' => 'active',
        'value' => function (\common\models\Project $model) {
          return \common\models\Project::STATUS_LABELS[$model->active];
        }
      ],
      [
        'attribute' => 'creator_id',
				'label' => 'Creator',
        'value' => function (\common\models\Project $model) {
          return $model->creator->username;
        }
      ],

      //'updater_id',
      'created_at:datetime',
      //'updated_at',

      ['class' => 'yii\grid\ActionColumn',
        'template' => '{view}'],
    ],
  ]); ?>

  <?php Pjax::end(); ?>

</div>
