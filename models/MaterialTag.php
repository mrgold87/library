<?php

namespace app\models;

use yii\db\ActiveRecord;

class MaterialTag extends ActiveRecord
{
    public function rules()
    {
        return [
            [['tag_id'], 'required'],
            [['material_id','tag_id'], 'integer'],
        ];
    }
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