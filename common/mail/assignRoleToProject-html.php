<?php

use yii\helpers\Html;

/* @var $project \common\models\Project */
/* @var $user \common\models\User */
/* @var $role string */
?>
<div>
	<p>Hello, <?= Html::encode($user->username); ?>!</p>
	<p>In project <?= $project->title ?> you received new role <?= $role ?></p>
</div>