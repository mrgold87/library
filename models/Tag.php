<?php

namespace app\models;

use yii\db\ActiveRecord;
use yii\helpers\ArrayHelper;

/**
 * @property integer $id
 * @property string $title
 */
class Tag extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title'], 'required']
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Тег',
        ];
    }

    /**
     * @param array $arr
     * @return array
     */
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