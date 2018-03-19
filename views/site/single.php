    <?php
    use yii\helpers\Url;
    use yii\widgets\ActiveForm;
    ?>
    <body class="single" xmlns="http://www.w3.org/1999/html">

				<!-- Main -->
					<div id="main">
						<!-- Post -->
							<article class="post">
								<header>
									<div class="title">
										<h2><a href="#"><?= $article->title ?></a></h2>
									</div>
									<div class="meta">
										<time class="published" datetime="2015-11-01"></time>
										<a href="#" class="author"><span class="name">Jane Doe</span><img src="<?= $article->getImage(); ?>" alt="" /></a>
                                        <time class="published" datetime="2015-11-01"><?= $article->getDate() ?></time>
									</div>
								</header>
								<span class="image featured"><img height="400" width="200" src="<?= $article->getImage(); ?>" alt="" /></span>
								<p><?= $article->content ; ?></p>
								<footer>
									<ul class="stats">
										<li><a href="<?= Url::toRoute(['site/category', 'id'=>$article->category->id]); ?>">Категория: <?= $article->category->title ?></a></li>
										<li>Просмотры: 22</li>
										<li><a href="#" class="icon fa-comment">128</a></li>
									</ul>

								</footer>
                                <div>
                                    <h2>Комментарии</h2>
                                    <?php
                                    $form = ActiveForm::begin([
                                        'action'  => ['site/comment','id'=>$article->id],
                                        'options' => ['class'=>'form-horizontal contact-form', 'role'=> 'form']
                                    ]) ?>

                                    <?= $form->field($commentForm,'comment')->textarea(['class'=>'form-control','placeholder'=>'Write message'])->label(false) ?>
                                    <p><button type="submit" class="btn send-btn">Отправить</button></p>
                                    <?php ActiveForm::end(); ?>
                                    <section >
                                        <div class="comment">
                                            <ul class="posts">
                                                <?php if(!empty($comments)): ?>
                                                    <?php foreach ($comments as $comment): ?>
                                                        <li>
                                                            <article>
                                                                <header>
                                                                    <h3><?= $comment->user->name ; ?></h3>
                                                                    <time class="published" datetime="2015-10-20"><?= $comment->getDate() ?></time>
                                                                </header>
                                                                <a href="#" class="image"><img src="<?= $comment->user->image; ?>" alt="" /></a>

                                                            </article>
                                                            <p class="comment"><?= $comment->text ?></p>
                                                        </li>
                                                    <?php endforeach; ?>
                                                <?php endif; ?>
                                            </ul>
                                        </div>
                                    </section>
                                </div>
							</article>

					</div>

				<!-- Footer -->
					<section id="footer">
						<p class="copyright">&copy; по всем вопросам пишите по адресу zolowkin.nikita@yandex.ru</p>
					</section>

    </body>