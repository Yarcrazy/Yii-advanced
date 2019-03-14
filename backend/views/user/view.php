<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\User */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Users', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="user-view">

	<h1><?= Html::encode($this->title) ?></h1>

	<p>
    <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
    <?= Html::a('Delete', ['delete', 'id' => $model->id], [
      'class' => 'btn btn-danger',
      'data' => [
        'confirm' => 'Are you sure you want to delete this item?',
        'method' => 'post',
      ],
    ]) ?>
	</p>

  <?= DetailView::widget([
    'model' => $model,
    'attributes' => [
      'username',
      [
        'attribute' => 'avatar',
        'value' => Html::img($model->
        	getThumbUploadUrl('avatar', \common\models\User::AVATAR_PREVIEW)),
        'format' => 'html',
      ],
      'email:email',
      [
        'attribute' => 'status',
        'value' => \common\models\User::STATUS_LABELS[$model->status],
      ],
      'created_at:datetime',
      'updated_at:datetime',
    ],
  ]) ?>

</div>