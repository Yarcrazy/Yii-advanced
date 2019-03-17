<?php

namespace common\models\query;

use common\models\User;

/**
 * This is the ActiveQuery class for [[\common\models\User]].
 *
 * @see \common\models\User
 */
class UserQuery extends \yii\db\ActiveQuery
{
  /*public function active()
  {
      return $this->andWhere('[[status]]=1');
  }*/
  public function onlyActive()
  {
    return $this->andWhere(['active' => User::STATUS_ACTIVE]);
  }

  /**
   * {@inheritdoc}
   * @return \common\models\User[]|array
   */
  public function all($db = null)
  {
    return parent::all($db);
  }

  /**
   * {@inheritdoc}
   * @return \common\models\User|array|null
   */
  public function one($db = null)
  {
    return parent::one($db);
  }
}
