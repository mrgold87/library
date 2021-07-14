<?php

namespace app\models;

use app\models\enums\MaterialCategory;
use app\models\enums\MaterialType;
use yii\db\ActiveRecord;

/**
 * @property integer $id
 * @property string $title
 * @property integer $type
 * @property integer $category
 * @property string $description
 * @property string $author
 *
 * @property Link $link
 * @property MaterialTag $materialtag
 */
class Material extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['type', 'category', 'title'], 'required'],
            [['title'], 'string'],
            [['description', 'author'], 'safe'],
            ['type', 'in', 'range' => MaterialType::getConstantsByName()],
            ['category', 'in', 'range' => MaterialCategory::getConstantsByName()]
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
            'type' => 'Тип',
            'category' => 'Категория',
            'description' => 'Описание',
            'author' => 'Авторы',
        ];
    }

    public function setCategory(MaterialCategory $type)
    {
        $this->category = $type->getValue();
    }

    public function getCategory()
    {
        return $this->category;
    }

    public function setType(MaterialType $type)
    {
        $this->type = $type->getValue();
    }

    public function getType()
    {
        return $this->type;
    }

    public function getMaterialtag()
    {
        return $this->hasMany(MaterialTag::class, ['material_id' => 'id']);
    }

    public function getLink()
    {
        return $this->hasMany(Link::class, ['material_id' => 'id']);
    }

    public static function getSearchResult($search)
    {
        $categories = MaterialCategory::searchByLabels($search);
        $tags = \app\models\enums\MaterialTag::searchByLabels($search);
        return self::find()
            ->joinWith('materialtag', true)
            ->andFilterWhere([
                'or',
                ['like', 'title', $search],
                ['like', 'author', $search],
                ['category' => $categories],
                ['material_tag.tag' => $tags],
            ]);
    }
}