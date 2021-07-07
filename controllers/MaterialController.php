<?php

namespace app\controllers;

use app\models\Category;
use app\models\Material;
use app\models\MaterialTag;
use app\models\Tag;
use app\models\Type;
use Yii;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

class MaterialController extends Controller
{
    public $defaultAction = 'list';

    /**
     * @param string $search
     * @return mixed
     */
    public function actionList($search = '')
    {
        $this->view->title = 'Материалы';
        $search = trim($search);
        if ($search) {
            $query = Material:: getSearchResult($search);
        } else {
            $query = Material::find();
        }
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => 10,
            ],
            'sort' => false
        ]);
        return $this->render('list', compact('dataProvider', 'search'));
    }

    /**
     * @return mixed
     */
    public function actionAdd()
    {
        $this->view->title = 'Добавить материал';
        $material = new Material();
        $type = Type::getList();
        $category = Category::getList();
        if ($material->load(Yii::$app->request->post()) && $material->save()) {
            Yii::$app->session->setFlash('success', 'материал сохранён');
            return $this->refresh();
        }
        return $this->render('add', compact('material', 'type', 'category'));
    }

    /**
     * @param integer $id
     * @return mixed
     */
    public function actionEdit($id)
    {
        $this->view->title = 'Изменить материал';
        $material = Material::findOne($id);
        $type = Type::getList();
        $category = Category::getList();
        if ($material->load(Yii::$app->request->post()) && $material->save()) {
            Yii::$app->session->setFlash('success', 'материал изменён');
            return $this->refresh();
        }
        return $this->render('add', compact('material', 'type', 'category'));
    }

    /**
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException
     */
    public function actionView($id)
    {
        $material = Material::findOne($id);
        if (empty($material)) {
            throw new NotFoundHttpException('Такого материала нет...');
        } else {
            $this->view->title = $material->title;
            $materialTag = new MaterialTag();
            $activeTags = $material->getTag()->asArray()->all();
            $filteredTags = Tag::filterTags($activeTags);
            $materialTag->material_id = $id;
            if ($materialTag->load(Yii::$app->request->post())) {
                if ($materialTag->isCorrectTag($filteredTags)) {
                    if ($materialTag->save()) {
                        Yii::$app->session->setFlash('success', 'тег добавлен');
                        return $this->refresh();
                    }
                } else {
                    Yii::$app->session->setFlash('error', 'Тег не добавлен некорректные данные');
                    return $this->refresh();
                }
            }
            return $this->render('view', compact('material', 'materialTag', 'filteredTags'));
        }
    }

    /**
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $material = Material::findOne($id);
        if ($material) {
            if (false !== $material->delete()) {
                \Yii::$app->session->setFlash('success', 'Материал удалён');
            } else {
                \Yii::$app->session->setFlash('error', 'Ошибка при удалении материала');
            }
        }
        return $this->redirect(Yii::$app->request->referrer ?: Yii::$app->homeUrl);
    }
}