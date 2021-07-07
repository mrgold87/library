<?php

namespace app\models;

use yii\db\ActiveRecord;
use yii\helpers\ArrayHelper;

class App extends ActiveRecord
{
    /**
     * @return array
     */
    public static function getList()
    {
        $list = self::find()->asArray()->all();
        return ArrayHelper::map($list, 'id', 'title');
    }
}