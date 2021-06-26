<?php

use app\assets\AppAsset;
use yii\helpers\Html;

AppAsset::register($this);
$this->beginPage()
?>
    <!doctype html>
    <html lang="<?= Yii::$app->language ?>">
    <head>
        <!-- Required meta tags -->
        <meta charset="<?= Yii::$app->charset ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <?php $this->registerCsrfMetaTags() ?>
        <title><?= Html::encode($this->title) ?></title>
        <?php $this->head() ?>
    </head>
    <body>
    <?php $this->beginBody() ?>
    <div class="main-wrapper">
        <div class="content">
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container">
                    <?= Html::a('Test', 'list', ['class' => 'navbar-brand']); ?>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <?= Html::a('Материалы', 'list', ['class' => 'nav-link']); ?>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Теги</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active" href="#">Категории</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
            <div class="container">
                <?= $content ?>
            </div>
        </div>
        <footer class="footer py-4 mt-5 bg-light">
            <div class="container">
                <div class="row">
                    <div class="col text-muted">Test</div>
                </div>
            </div>
        </footer>
    </div>
    <?php $this->endBody() ?>
    </body>
    </html>
<?php $this->endPage() ?>