<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Project */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Projects', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="project-view">

	<h1><?= Html::encode($this->title) ?></h1>

  <?= DetailView::widget([
    'model' => $model,
    'attributes' => [
      'title',
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
          return Html::a($model->creator->username, ['user/view', 'id' =>
            $model->creator_id]);
        },
        'format' => 'html',
      ],
      [
        'attribute' => 'updater_id',
        'label' => 'Updater',
        'value' => function (\common\models\Project $model) {
          return Html::a($model->updater->username, ['user/view', 'id' =>
            $model->updater_id]);
        },
        'format' => 'html',
      ],
      'created_at:datetime',
      'updated_at:datetime',
    ],
  ]) ?>
  <?= \yii2mod\comments\widgets\Comment::widget([
    'model' => $model,
  ]); ?>

</div>
