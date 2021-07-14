<?php

namespace app\models\enums;

use yii2mod\enum\helpers\BaseEnum;

class MaterialType extends BaseEnum
{

    public const BOOK = 1;
    public const ARTICLE = 2;
    public const VIDEO = 3;
    public const BLOG = 4;
    public const COLLECTION = 5;
    public const IDEA = 6;

    protected static $list = [
        self::BOOK => 'Книга',
        self::ARTICLE => 'Статья',
        self::VIDEO => 'Видео',
        self::BLOG => 'Сайт/Блог',
        self::COLLECTION => 'Подборка',
        self::IDEA => 'Ключевые идеи книги',
    ];


}