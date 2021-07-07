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
     * @param array $tag
     * @return true|false
     */
    public  function isCorrectTag($tag){

        if (array_key_exists( $this->tag_id,$tag))
        {
            return true;
        }
        else
        {
            return false;
        }

    }
}