<?php

use app\models\enums\MaterialCategory;
use app\models\enums\MaterialType;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $material app\models\Material */
/* @var $materialTag app\models\MaterialTag */
/* @var $filteredTags array */
/* @var $addedTags array */
/* @var $form yii\widgets\ActiveForm */
?>
<?php if (Yii::$app->session->hasFlash('success')): ?>
    <div class="alert alert-success alert-dismissible" role="alert">
        <?= Yii::$app->session->getFlash('success') ?>
    </div>
<?php endif; ?>
<?php if (Yii::$app->session->hasFlash('error')): ?>
    <div class="alert alert-danger alert-dismissible" role="alert">
        <?= Yii::$app->session->getFlash('error') ?>
    </div>
<?php endif; ?>
    <h1 class="my-md-5 my-4"><?= HTML::encode($material->title); ?></h1>
    <div class="row mb-3">
        <div class="col-lg-6 col-md-8">
            <div class="d-flex text-break">
                <p class="col fw-bold mw-25 mw-sm-30 me-2">Авторы</p>
                <p class="col"><?= HTML::encode($material->author); ?></p>
            </div>
            <div class="d-flex text-break">
                <p class="col fw-bold mw-25 mw-sm-30 me-2">Тип</p>
                <p class="col"><?= MaterialType::getLabel($material->type);?></p>
            </div>
            <div class="d-flex text-break">
                <p class="col fw-bold mw-25 mw-sm-30 me-2">Категория</p>
                <p class="col"><?= MaterialCategory::getLabel($material->category); ?></p>
            </div>
            <div class="d-flex text-break">
                <p class="col fw-bold mw-25 mw-sm-30 me-2">Описание</p>
                <p class="col"><?= HTML::encode($material->description); ?></p>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <?php $form = ActiveForm::begin(
                [
                    'fieldConfig' => [
                        'options' => [
                            'tag' => false,
                        ],
                    ],
                ]);; ?>
            <h3>Теги</h3>
            <div class="input-group mb-3 ">
                <?php echo $form->field($materialTag, 'tag',
                    [
                        'template' => '{input} {hint} {error}',
                        'inputOptions' =>
                            ['class' => 'form-select'],
                    ]
                )->dropDownList($filteredTags, ['prompt' => 'Выберите тег']); ?>
                <?= Html::submitButton('Добавить', ['class' => 'btn btn-primary']) ?>
            </div>
            <?php ActiveForm::end(); ?>
            <ul class="list-group mb-4">
                <?
                $icoTrash = ' <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                             class="bi bi-trash" viewBox="0 0 16 16">
                            <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                            <path fill-rule="evenodd"
                                  d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                        </svg>';
                foreach ($addedTags as $k => $v): ?>
                    <li class="list-group-item list-group-item-action d-flex justify-content-between">
                        <?= Html::a($v, ['list', 'search' => $v], ['class' => 'me-3']); ?>
                        <?= Html::a($icoTrash, ['material-tag/delete', 'tag_id' => $k, 'material_id' => $material->id], [
                            'class' => 'text-decoration-none',
                            'data' => [
                                'confirm' => 'Вы уверены,что хотите удалить эту ссылку?',
                            ]
                        ]); ?>
                    </li>
                <? endforeach; ?>
            </ul>
        </div>
        <div class="col-md-6">
            <div class="d-flex justify-content-between mb-3">
                <h3>Ссылки</h3>
                <a class="btn btn-primary" id="add-link" data-id="<?= $material->id; ?>" role="button">Добавить</a>
            </div>
            <ul class="list-group mb-4">
                <? foreach ($material->link as $v): ?>
                    <li class="list-group-item list-group-item-action d-flex justify-content-between">
                        <?= Html::a($v->title, $v->url, ['class' => 'me-3']) ?>
                        <span class="text-nowrap">
                            <a class="text-decoration-none me-2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                     class="bi bi-pencil" data-id="<?= $v->id; ?>" viewBox="0 0 16 16">
                        <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z"/>
                    </svg>
                            </a>
                            <?= Html::a($icoTrash, ['link/delete', 'id' => $v->id],
                                [
                                    'class' => 'text-decoration-none',
                                    'data' => [
                                        'confirm' => 'Вы уверены,что хотите удалить эту ссылку?',
                                    ]
                                ]
                            ); ?>
                        </span>
                    </li>
                <? endforeach; ?>
            </ul>
        </div>
    </div>
    <div class="modal fade" id="exampleModalToggle" aria-hidden="true" aria-labelledby="exampleModalToggleLabel"
         tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalToggleLabel">Добавить ссылку</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                </div>
            </div>
        </div>
    </div>
<?php
$js = <<< JS
 $('.list-group a .bi-pencil').on('click',function(){
     let data = $(this).data();
     $('#exampleModalToggle').modal('show');
     $('#exampleModalToggle').find('.modal-body').load('/web/link/update/?id='+data.id);
    });
    $('.d-flex #add-link').on('click',function(){
     let data = $(this).data();
     $('#exampleModalToggle').modal('show');
     $('#exampleModalToggle').find('.modal-body').load('/web/link/add/?id='+data.id);
    });
JS;
$this->registerJs($js);