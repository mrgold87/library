<?php

namespace app\controllers;

use app\models\MaterialTag;
use Yii;
use yii\web\Controller;

class MaterialTagController extends Controller
{
    public function actionDelete($id)
    {
        $item = MaterialTag::find()->where(['tag_id' => $id])->one();
        if ($item) {
            if (false !== $item->delete()) {
                \Yii::$app->session->setFlash('success', 'Тег удалён');
            } else {
                \Yii::$app->session->setFlash('error', 'Ошибка при удалении тега');
            }
        }
        return $this->redirect(Yii::$app->request->referrer ?: Yii::$app->homeUrl);
    }
}