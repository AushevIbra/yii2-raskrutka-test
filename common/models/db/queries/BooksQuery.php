<?php

namespace common\models\db\queries;

/**
 * This is the ActiveQuery class for [[\common\models\db\Books]].
 *
 * @see \common\models\db\Books
 */
class BooksQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return \common\models\db\Books[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return \common\models\db\Books|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
