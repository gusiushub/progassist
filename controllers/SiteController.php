<?php

namespace app\controllers;

use app\models\Article;
use app\models\Category;
use app\models\CommentForm;
use app\models\Login;
use app\models\Signup;
use Yii;
use yii\data\Pagination;
use yii\web\Controller;


class SiteController extends Controller
{

    public function actionIndex()
    {
        $data = Article::getAll();
        //популярные статьи
        $popular = Article::getPopular();
        //сортировка по дате
        $recent = Article::getRecent();
        $category = Category::getAll();
        return $this->render('index',[
            'articles'   =>  $data['articles'],
            'pagination' =>  $data['pagination'],
            'popular'    =>  $popular,
            'recent'     =>  $recent,
            'category'   =>  $category,
        ]);
    }

    //регистрация
    public function actionSignup()
    {
        $model = new Signup();
        if(isset($_POST['Signup']))
        {
            $model->attributes = Yii::$app->request->post('Signup');
            if($model->validate() && $model->signup())
            {
                return $this->goHome();
            }
        }
        return $this->render('signup',['model'=>$model]);
    }

    //авторизация
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest){
            return $this->goHome();
        }
        $login_model = new Login();
        if (Yii::$app->request->post('Login')){
            $login_model->attributes = Yii::$app->request->post('Login');
            if ($login_model->validate()){
                Yii::$app->user->login($login_model->getUser());
                return $this->goHome();
            }
        }
        return $this->render('login',['login_model'=>$login_model]);
    }

    //выход с аккаунта
    public function actionLogout()
    {
        if (!Yii::$app->user->isGuest){
            Yii::$app->user->logout();
            return $this->redirect(['login']);
        }
    }

    public function actionSetCategory($id)
    {
        $article = $this->findModel($id);
        return $this->render('category',['article'=>$article,]);
    }

    public function actionSingle($id)
    {
        //вытаскиваем статью по id
        $article = Article::findOne($id);
        $categories = Category::getAll();
        $commets = $article->comments;
        $commentForm = new CommentForm();

        return $this->render('single',[
            'article'   =>  $article,
            'categories'=>  $categories,
            'comments' => $commets,
            'commentForm' => $commentForm,
            ]);
    }

    public function actionAbout()
    {
        return $this->render('about');
    }

    public function actionCategory($id)
    {
        // build a DB query to get all articles with status = 1
        $query = Article::find()->where(['category_id'=>$id]);

        // get the total number of articles (but do not fetch the article data yet)
        $count = $query->count();

        // create a pagination object with the total count
        $pagination = new Pagination(['totalCount' => $count , 'pageSize'=>6]);

        // limit the query using the pagination and retrieve the articles
        $articles = $query->offset($pagination->offset)
            ->limit($pagination->limit)
            ->all();

        $data['articles'] = $articles;
        $data['pagination'] = $pagination;


        return $this->render('category',[
            'articles'   =>  $data['articles'],
            'pagination' =>  $data['pagination'],
            'recent'     =>  $recent,
            'category'   =>  $category,
            ]);
    }

    public function actionSnake()
    {
        return $this->render('snake');
    }

    public function actionCross()
    {
        return$this->render('cross');
    }

    public function actionComment($id)
    {
        $model = new CommentForm();

        if (Yii::$app->request->isPost)
        {
            $model->load(Yii::$app->request->post());
            if ($model->saveComment($id))
            {
                return $this->redirect(['site/view','id'=>$id]);
            }
        }
    }

}
