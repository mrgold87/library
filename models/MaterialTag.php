<?php

namespace app\models;

use yii\db\ActiveRecord;

class MaterialTag extends ActiveRecord
{
    public function rules()
    {
        return [
            [['tag_id'], 'required'],
            [['material_id'], 'safe'],
        ];
    }
}