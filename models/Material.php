<?php

namespace app\models;

use yii\db\ActiveRecord;

/**
 * @property integer $id
 * @property string $title
 * @property integer $type_id
 * @property integer $category_id
 * @property string $description
 * @property string $author
 *
 * @property Type $type
 * @property Category $category
 * @property Tag $tag
 * @property Link $link
 */
class Material extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['type_id', 'category_id', 'title'], 'required'],
            [['title'], 'string'],
            [['description', 'author'], 'safe']
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Название',
            'type_id' => 'Тип',
            'category_id' => 'Категория',
            'description' => 'Описание',
            'author' => 'Авторы',
        ];
    }

    public function getType()
    {
        return $this->hasOne(Type::class, ['id' => 'type_id']);
    }

    public function getCategory()
    {
        return $this->hasOne(Category::class, ['id' => 'category_id']);
    }

    public function getMaterialtag()
    {
        return $this->hasMany(MaterialTag::class, ['material_id' => 'id']);
    }

    public function getTag()
    {
        return $this->hasMany(Tag::class, ['id' => 'tag_id'])->via('materialtag');
    }

    public function getLink()
    {
        return $this->hasMany(Link::class, ['material_id' => 'id']);
    }

    public static function getSearchResult($search)
    {
        return self::find()
            ->joinWith(['category', 'tag'], true)
            ->andFilterWhere([
                'or',
                ['like', 'material.title', $search],
                ['like', 'author', $search],
                ['like', 'category.title', $search],
                ['like', 'tag.title', $search],
            ]);
    }
}