<?php

namespace app\models;

use yii\db\ActiveRecord;
/**
 * @property integer $id
 * @property integer $material_id
 * @property integer $tag_id
 */
class MaterialTag extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['tag_id'], 'required'],
            [['material_id','tag_id'], 'integer'],
        ];
    }
    /**
     * @param array $tags
     * @return true|false
     */
    public  function isCorrectTag($tags){

        if (array_key_exists( $this->tag_id,$tags))
        {
            return true;
        }
        else
        {
            return false;
        }

    }
}