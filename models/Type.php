<?php

namespace app\models;
/**
 * @property integer $id
 * @property string $title
 */
class Type extends App
{
    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Тип',
        ];
    }
}