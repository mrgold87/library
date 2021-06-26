<?php

namespace app\models;

use yii\db\ActiveRecord;
use yii\helpers\ArrayHelper;

class Tag extends ActiveRecord
{
    public function rules()
    {
        return [
            [['title'], 'required']
        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Тег',
        ];
    }

    public static function getTagList($arr)
    {
        $params = [];
        foreach ($arr as $v) {
            $params[] = $v['tag_id'];
        }
        $query = self::find()->asArray()->all();
        $list = ArrayHelper::map($query, 'id', 'title');
        $newList = [];
        foreach ($list as $k => $v) {
            if (!in_array($k, $params)) {
                $newList[$k] = $v;
            }
        }
        return $newList;
    }
}