<?php

namespace app\common\models\query;

/**
 * This is the ActiveQuery class for [[\app\common\models\Project]].
 *
 * @see \app\common\models\Project
 */
class ProjectQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return \app\common\models\Project[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return \app\common\models\Project|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
