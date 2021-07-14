<?php


namespace app\models\enums;


class MaterialCategory extends Main
{
    public const BUSINESS_PROCESSES = 1;
    public const HIRING = 2;
    public const AD = 3;
    public const BUSINESS_MANAGEMENT = 4;
    public const PEOPLE_MANAGEMENT = 5;
    public const PROJECT_MANAGEMENT = 6;
    public const EDUCATION = 7;
    public const GENERAL = 8;
    public const LOGO = 9;
    public const WEB = 10;
    public const PHP = 11;
    public const HTML_CSS = 12;
    public const DEVELOPMENT = 13;

    protected static $list = [
        self::BUSINESS_PROCESSES => 'Деловые/Бизнес-процессы',
        self::HIRING => 'Деловые/Найм',
        self::AD => 'Деловые/Реклама',
        self::BUSINESS_MANAGEMENT => 'Деловые/Управление бизнесом',
        self::PEOPLE_MANAGEMENT => 'Деловые/Управление людьми',
        self::PROJECT_MANAGEMENT => 'Деловые/Управление проектами',
        self::EDUCATION => 'Детские/Воспитание',
        self::GENERAL => 'Дизайн/Общее',
        self::LOGO => 'Дизайн/Logo',
        self::WEB => 'Дизайн/Web',
        self::PHP => 'Разработка/PHP',
        self::HTML_CSS => 'Разработка/HTML и CSS',
        self::DEVELOPMENT => 'Разработка/Проектирование',
    ];
}
