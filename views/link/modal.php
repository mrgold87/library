<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $link \app\models\Link */
/* @var $form yii\widgets\ActiveForm */

$form = ActiveForm::begin(['id' => 'order-form']); ?>
<?php echo $form->field($link, 'title',
    [
        'template' => '<div class="form-floating mb-3">{input} {label} {hint} {error}</div>',
        'inputOptions' => ['class' => 'form-control'],
        'errorOptions' => ['class' => 'invalid-feedback d-block']
    ]); ?>
<?php echo $form->field($link, 'url',
    [
        'template' => '<div class="form-floating mb-3">{input} {label} {hint} {error}</div>',
        'inputOptions' => ['class' => 'form-control'],
        'errorOptions' => ['class' => 'invalid-feedback d-block']
    ]); ?>
    <div class="modal-footer">
        <?= Html::submitButton($link->id ? 'Изменить' : 'Добавить', ['class' => 'btn btn-primary']) ?>
        <button type="button" class="btn btn-outline-primary" data-bs-dismiss="modal">Закрыть</button>
    </div>
<?php ActiveForm::end(); ?>