<?php
use yii\helpers\Url;
use yii\widgets\LinkPager;

?>
<body class="single">

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
                <a  href="<?= Url::toRoute(['site/single', 'id'=>$article->id]); ?>" class="image featured"><img height="380" src="<?= $article->getImage(); ?>" alt="" /></a>
                <p><?= $article->content ?></p>
                <footer>
                    <ul class="actions">
                        <li><a href="<?= Url::toRoute(['site/single', 'id'=>$article->id]); ?>" class="button big">Подробнее</a></li>
                    </ul>
                    <ul class="stats">
                        <li><a href="#"><?= $article->category->title ?></a></li>
                        <li><a href="#" class="icon fa-heart">28</a></li>
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
    <!-- Footer -->
    <section id="footer">
        <p class="copyright">&copy; Личный блог</p>
    </section>

</body>
