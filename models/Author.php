<?php

namespace app\models;

use yii\db\ActiveRecord;

class Author extends ActiveRecord
{
    public function rules()
    {
        return [
            [['title'], 'safe']
        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Авторы',
        ];
    }
}