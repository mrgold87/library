<?php

namespace app\controllers;

use app\models\MaterialTag;
use Yii;
use yii\web\Controller;

class MaterialTagController extends Controller
{
    /**
     * @param integer $tag_id
     * @param integer $material_id
     * @return mixed
     */
    public function actionDelete($tag_id, $material_id)
    {
        $item = MaterialTag::find()->where(['tag' => $tag_id])->andWhere(['material_id' => $material_id])->one();
        if ($item) {
            if (false !== $item->delete()) {
                Yii::$app->session->setFlash('success', 'Тег удалён');
            } else {
                Yii::$app->session->setFlash('error', 'Ошибка при удалении тега');
            }
        }
        return $this->redirect(Yii::$app->request->referrer ?: Yii::$app->homeUrl);
    }
}