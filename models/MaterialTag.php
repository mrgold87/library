<?php

namespace app\models;

use yii\db\ActiveRecord;
use yii\helpers\ArrayHelper;

/**
 * @property integer $id
 * @property integer $material_id
 * @property integer $tag
 */
class MaterialTag extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['tag'], 'required'],
            [['material_id', 'tag'], 'integer'],
        ];
    }
    /**
     * @param integer $id
     * @return array $newList
     */
    public static function getFilteredTagsById($id)
    {
        $query = self::find()->where(['material_id' => $id])->asArray()->all();
        $res = ArrayHelper::getColumn($query, 'tag');
        $tags = [];
        foreach ($res as $v) {
            $tags[] = $v;
        }
        $allTags = \app\models\enums\MaterialTag::listData();
        $newList = [];
        foreach ($allTags as $k => $v) {
            if (!in_array($k, $tags)) {
                $newList[$k] = $v;
            }
        }
        return $newList;

    }
    /**
     * @param integer $id
     * @return array $tags
     */
    public static function getAddedTagsById($id)
    {
        $query = self::find()->where(['material_id' => $id])->asArray()->all();
        $res = ArrayHelper::getColumn($query, 'tag');
        $tags = [];
        foreach ($res as $v) {
            $tags[$v] = \app\models\enums\MaterialTag::getLabel($v);
        }
        return $tags;

    }

    /**
     * @param array $tags
     * @return true|false
     */
    public function isCorrectTag($tags)
    {
        if (array_key_exists($this->tag, $tags)) {
            return true;
        } else {
            return false;
        }
    }
}