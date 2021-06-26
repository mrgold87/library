<?php

namespace app\models;

class Type extends App
{
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Тип',
        ];
    }
}