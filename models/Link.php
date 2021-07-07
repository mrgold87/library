<?php

namespace app\models;

use yii\db\ActiveRecord;

/**
 * @property integer $id
 * @property string $title
 * @property string $url
 */
class Link extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            ['title', 'safe'],
            ['url', 'url', 'defaultScheme' => 'http'],
            ['url', 'required'],
            ['material_id', 'safe'],
        ];
    }
    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Подпись',
            'url' => 'Ссылка',
        ];
    }
}