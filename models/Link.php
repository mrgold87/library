<?php

namespace app\models;

use yii\db\ActiveRecord;

class Link extends ActiveRecord
{
    public function rules()
    {
        return [
            ['title', 'safe'],
            ['url', 'url', 'defaultScheme' => 'http'],
            ['url', 'required'],
            ['material_id', 'safe'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Подпись',
            'url' => 'Ссылка',
        ];
    }
}