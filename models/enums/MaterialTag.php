<?php


namespace app\models\enums;


class MaterialTag extends Main
{

    public const SELF_DEVELOPMENT = 1;
    public const PERSONAL_GROWTH = 2;
    public const MOTIVATION = 3;
    public const CAREER = 4;

    protected static $list = [
        self::SELF_DEVELOPMENT => 'Саморазвитие',
        self::PERSONAL_GROWTH => 'Личностный рост',
        self::MOTIVATION => 'Мотивация',
        self::CAREER => 'Карьера',
    ];

}