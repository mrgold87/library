<?php

namespace app\controllers;

use app\models\Link;
use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

class LinkController extends Controller
{
    public function actionAdd($id)
    {
        $link = new Link();
        $link->material_id = $id;
        if ($link->load(Yii::$app->request->post())) {
            if (empty($link->title)) {
                $link->title = $link->url;
            }
            if ($link->save()) {
                Yii::$app->session->setFlash('success', 'Ссылка добавлена');
                return $this->redirect(Yii::$app->request->referrer ?: Yii::$app->homeUrl);
            }
        } else {
            if (Yii::$app->request->isAjax) {
                return $this->renderAjax('modal', compact('link'));
            }
        }
    }

    public function actionUpdate($id)
    {
        $link = Link::findOne($id);
        if ($link->load(Yii::$app->request->post())) {
            if (empty($link->title)) {
                $link->title = $link->url;
            }
            if ($link->save()) {
                Yii::$app->session->setFlash('success', 'Ссылка обновлена');
                return $this->redirect(Yii::$app->request->referrer ?: Yii::$app->homeUrl);
            }
        } else {
            if (Yii::$app->request->isAjax) {
                return $this->renderAjax('modal', compact('link'));
            }
        }
    }

    public function actionDelete($id)
    {
        $item = Link::findOne($id);
        if ($item) {
            if (false !== $item->delete()) {
                \Yii::$app->session->setFlash('success', 'Ссылка удалена');
            } else {
                \Yii::$app->session->setFlash('error', 'Ошибка при удалении ссылки');
            }
        }
        return $this->redirect(Yii::$app->request->referrer ?: Yii::$app->homeUrl);
    }
}