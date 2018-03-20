<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use app\assets\BlogAsset;

BlogAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="description" content="Статья о кроликах" />
    <meta name="keywords" content="кролики, разведение, питание" />
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<!-- Wrapper -->
<div id="wrapper">

    <!-- Header -->
    <header id="header">
        <h1><a href="/">Блог</a></h1>
        <nav class="links">
            <ul>
                <li><a href="/web/site/index">Главная</a></li>
                <li><a href="/web/site/about">О нас</a></li>
                <li><a href="/web/site/snake">Змейка</a></li>
                <?php if (Yii::$app->user->isGuest): ?>
                <li><a href="/web/site/signup">Регистрация</a></li>
                <li><a href="/web/site/login">Авторизация</a></li>
                <?php else: ?>
                <?= Html::beginForm(['/web/site/logout'],'post')
                .Html::submitButton(
                    'Logout (' . Yii::$app->user->identity->email . ')',
                    ['class' => 'btn btn-link logout']
                )
                . Html::endForm() ?>
                <?php endif; ?>

            </ul>
        </nav>

            <nav class="main">
                <ul>
                    <li class="menu">
                        <a class="fa-bars" href="#menu">Menu</a>
                    </li>
                </ul>
            </nav>



    </header>

    <!-- Menu -->
    <section id="menu">

        <!-- Search -->
        <section>
            <form class="search" method="get" action="#">
                <input type="text" name="query" placeholder="Search" />
            </form>
        </section>

        <!-- Links -->
        <section>
            <ul class="links">
                <li><a href="/web/site/index">Главная</a></li>
                <li><a href="/web/site/about">О нас</a></li>
                <li><a href="/web/site/snake">Змейка</a></li>
                <?php if (Yii::$app->user->isGuest): ?>
                    <li><a href="/web/site/signup">Регистрация</a></li>
                    <li><a href="/web/site/login">Авторизация</a></li>
                <?php else: ?>
                    <?= Html::beginForm(['/web/site/logout'],'post')
                    .Html::submitButton(
                        'Logout (' . Yii::$app->user->identity->email . ')',
                        ['class' => 'btn btn-link logout']
                    )
                    . Html::endForm() ?>
                <?php endif; ?>
            </ul>
        </section>

        <!-- Actions -->
        <section>
            <ul class="actions vertical">
                <?php if (Yii::$app->user->isGuest): ?>
                <li><a href="/web/site/login" class="button big fit">Log In</a></li>
                <?php endif; ?>
            </ul>
        </section>

    </section>

    <?= $content ?>



</div>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
