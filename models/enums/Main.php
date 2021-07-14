<?php


namespace app\models\enums;


use yii2mod\enum\helpers\BaseEnum;

class Main extends BaseEnum
{
    public static function searchByLabels($search)
    {
        $result=[];
        foreach (static::$list as $k=>$v){
            if (mb_stripos($v, $search)!== false){
                $result[]=$k;
            }
        }
      return $result;
    }
}