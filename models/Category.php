<?php

namespace app\models;

class Category extends App
{
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Категория',
        ];
    }
}