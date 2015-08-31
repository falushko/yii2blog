<?php
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

/* @var $this \yii\web\View */
/* @var $content string */
AppAsset::register($this); ?>

<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>"/>
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>

    <script type="text/javascript" src="/scripts/common/jquery.min.js"></script>
    <script type="text/javascript" src="/scripts/frontend/script.js"></script>
    <?php $this->head() ?>
    <link type="text/css" rel="stylesheet" href="/css/frontend/style.css"/>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrapper">
    <div class="container">


        <div class="header"></div>

        <nav>
            <ul class="menu">
                <li><a href="/">Главная</a></li>
                <li><a href="/?r=site/sign-up">Регистрация</a></li>
                <li><a href="/">Пользователи</a></li>
                <li><a href="/?r=site/login">Вход</a></li>
            </ul>
        </nav>


        <?= $content ?>

    </div>

    <div class="placeholder"></div>
</div>

<div class="footer"></div>


<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
