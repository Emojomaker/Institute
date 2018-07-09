<?php

namespace app\modules\user\controllers\frontend;

use app\modules\user\models\Works;
use yii\web\Controller;

class WorksController extends Controller
{
    public function actionIndex()
    {
        $works = Works::find()->orderBy('id desc')->all();
        
        return $this->render('index',['works'=>$works]);
    }

    public function actionDelete($id)
    {
        $work = Works::findOne($id);
        if($work->delete())
        {
            return $this->redirect(['works/index']);
        }
    }

    public function actionAllow($id)
    {
        $work = Works::findOne($id);
        if($work->allow())
        {
            return $this->redirect(['index']);
        }
    }
    
    public function actionDisallow($id)
    {
        $work = Works::findOne($id);
        if($work->disallow())
        {
            return $this->redirect(['index']);
        }
    }
}
