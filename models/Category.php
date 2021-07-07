<?php

namespace app\models;
/**
 * @property integer $id
 * @property string $title
 */

class Category extends App
{
    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Категория',
        ];
    }
}