<?php

namespace app\modules\main\controllers;
use yii;
use yii\web\Controller;
use app\models\Article;
use app\models\Category;
use app\models\CommentForm;
use yii\data\Pagination;

class DefaultController extends Controller
{
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }

    public function actionIndex()
    {
       
       $data = Article::getAll(1);

        $popular = Article::getPopular();
        $recent = Article::getRecent();
        $categories = Category::getAll();
        return $this->render('index', [
            'articles'=>$data['articles'],
            'pagination'=>$data['pagination'],
            'popular'=>$popular,
            'recent'=>$recent,
            'categories'=>$categories
        ]);

    }

    public function actionView($id)

    {
        $article = Article::findOne($id);
        $popular = Article::getPopular();
        $recent = Article::getRecent();
        $categories = Category::getAll();
        $comments = $article->getArticleComments();
        $commentForm = new CommentForm();
        $article->viewedCounter();
        
        return $this->render('single', [
            'article'=>$article,
            'popular'=>$popular,
            'recent'=>$recent,
            'categories'=>$categories,
            'comments'=>$comments,
            'commentForm'=>$commentForm
        ]);
    }

     public function actionCategory($id)

    {

        $data = Category::getArticlesByCategory($id);
        $popular = Article::getPopular();
        $recent = Article::getRecent();
        $categories = Category::getAll();

        return $this->render('category',[
            'articles'=>$data['articles'],
            'pagination'=>$data['pagination'],
            'popular'=>$popular,
            'recent'=>$recent,
            'categories'=>$categories
        ]);
    }

    public function actionComment($id)
    {
        $model = new CommentForm();

        if (Yii::$app->request->isPost)
        {
            $model->load(Yii::$app->request->post());
            if($model->saveComment($id))
            {
                Yii::$app->getSession()->setFlash('comment','Ваш комментарий будет скоро добавлен');
                return $this->redirect(['default/view', 'id'=>$id]);
            }
        }
    }
}
