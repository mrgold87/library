<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

?>
<h1 class="my-md-5 my-4"><?= $material->id ? 'Изменить материал' : 'Добавить материал'; ?></h1>
<div class="row">
    <div class="col-lg-5 col-md-8">
        <?php if (Yii::$app->session->hasFlash('success')): ?>
            <div class="alert alert-success alert-dismissible" role="alert">
                <?= Yii::$app->session->getFlash('success') ?>
            </div>
        <?php endif; ?>
        <?php $form = ActiveForm::begin(); ?>
        <?php echo $form->field($material, 'type_id',
            [
                'template' => '<div class="form-floating mb-3">{input} {label} {hint} {error}</div>',
                'inputOptions' => ['class' => 'form-select'],
                'errorOptions' => ['class' => 'invalid-feedback d-block']
            ]
        )->dropDownList($type, ['prompt' => 'Выберите тип']); ?>
        <?php echo $form->field($material, 'category_id',
            [
                'template' => '<div class="form-floating mb-3">{input} {label} {hint} {error}</div>',
                'inputOptions' => ['class' => 'form-select'],
                'errorOptions' => ['class' => 'invalid-feedback d-block']
            ]
        )->dropDownList($category, ['prompt' => 'Выберите категорию']); ?>
        <?= $form->field($material, 'title',
            [
                'template' => '<div class="form-floating mb-3">{input} {label} {hint} {error}</div>',
                'inputOptions' => ['class' => 'form-control'],
                'errorOptions' => ['class' => 'invalid-feedback d-block']
            ]); ?>
        <?php echo $form->field($material, 'author',
            [
                'template' => '<div class="form-floating mb-3">{input} {label} {hint} {error}</div>',
                'inputOptions' => ['class' => 'form-control'],
                'errorOptions' => ['class' => 'invalid-feedback d-block']
            ]); ?>
        <?php echo $form->field($material, 'description',
            [
                'template' => '<div class="form-floating mb-3">{input} {label} {hint} {error}</div>',
                'inputOptions' => ['class' => 'form-control'],
                'errorOptions' => ['class' => 'invalid-feedback d-block']
            ])
            ->textarea(); ?>
        <div class="form-group">
            <?= Html::submitButton($material->id ? 'Изменить' : 'Добавить', ['class' => 'btn btn-primary']) ?>
        </div>
        <?php ActiveForm::end(); ?>
    </div>
</div>