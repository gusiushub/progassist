<?php

use yii\helpers\Url;
use yii\widgets\LinkPager;


$this->title = 'Главная';
?>

<!-- Main -->
<div id="main">

    <?php foreach ($articles as $article):?>
    <!-- Post -->
    <article class="post">
        <header >
            <div  class="title">
                <h2><a href="<?= Url::toRoute(['site/single', 'id'=>$article->id]); ?>"><?= $article->title ?></a></h2>
                <p><?= $article->description ?></p>
            </div>
            <div class="meta">
                <time class="published" datetime="2015-11-01"><?= $article->getDate() ?></time>
            </div>
        </header>
        <a  href="<?= Url::toRoute(['site/single', 'id'=>$article->id]); ?>" class="image featured"><img height="400" src="<?= $article->getImage(); ?>" alt="" /></a>
        <footer>
            <ul class="actions">
                <li><a href="<?= Url::toRoute(['site/single', 'id'=>$article->id]); ?>" class="button big">Читать</a></li>
            </ul>
            <ul class="stats">
                <li><a href="<?= Url::toRoute(['site/category', 'id'=>$article->category->id]); ?>">Категория:<?= $article->category->title ?></a></li>
                <li>Количество просмотров 22</li>
                <li><a href="#" class="icon fa-comment">128</a></li>
            </ul>
        </footer>
    </article>
    <?php endforeach; ?>

    <!-- Pagination -->
   <?php
    echo LinkPager::widget([
    'pagination' => $pagination,
    ]);
    ?>
</div>

<!-- Sidebar -->
<section id="sidebar">

    <!-- Intro -->
    <section id="intro">
        <a href="#" class="logo"><img src="../../web/files/images/logo.png" alt="" /></a>
        <header>
            <h2>PROGRAM ASSIST</h2>
            <h4> От новичка к профи шаг за шагом </h4>
        </header>
    </section>

    <!-- About -->
    <section class="blurb">
        <h2><a href="#">Категории</a></h2>

        <ul class="posts">
            <?php foreach ($category as $article): ?>
                <li><a href="<?= Url::toRoute(['site/category', 'id'=>$article->id]); ?>" class="published"><?= $article->title ?> </a> </li>
            <?php endforeach; ?>
        </ul>

    </section>

    <!-- Mini Posts -->
    <section>
        <h2>Популярное</h2>
        <div class="mini-posts">
        <?php foreach ($popular as $article): ?>
            <!-- Mini Post -->
            <article class="mini-post">
                <header>
                    <h3><a href="<?= Url::toRoute(['site/single', 'id'=>$article->id]); ?>"><?= $article->title ?></a></h3>
                    <time class="published" datetime="2015-10-20"><?= $article->getDate() ?></time>

                </header>
                <a href="<?= Url::toRoute(['site/single', 'id'=>$article->id]); ?>" class="image"><img src="<?= $article->getImage(); ?>" alt="" /></a>
            </article>
            <?php endforeach; ?>

        </div>
    </section>

    <!-- Posts List -->
    <section>
        <h2>Последние публикации</h2>
        <ul class="posts">
            <?php foreach ($recent as $article): ?>
            <li>
                <article>
                    <header>
                        <h3><a href="<?= Url::toRoute(['site/single', 'id'=>$article->id]); ?>"><?= $article->title ?></a></h3>
                        <time class="published" datetime="2015-10-20"><?= $article->getDate() ?></time>
                    </header>
                    <a href="<?= Url::toRoute(['site/single', 'id'=>$article->id]); ?>" class="image"><img src="<?= $article->getImage(); ?>" alt="" /></a>
                </article>
            </li>
            <?php endforeach; ?>
        </ul>
    </section>

    <!-- Footer -->
    <section id="footer">
        <p class="copyright">&copy; Untitled.</p>
    </section>

</section>
