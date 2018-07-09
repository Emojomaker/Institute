<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel app\models\CategorySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

?>
<div class="user-default-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?php if(!empty($works)):?>

        <table class="table">
            <thead>
                <tr>
                    <td>№</td>
                    <td>Заголовок</td>
                    <td>Текст</td>
                    <td>Действие</td>
                </tr>
            </thead>

            <tbody>
                <?php foreach($works as $work):?>
                    <tr>
                        <td><?= $work->id?></td>
                        <td><?= $work->user->username?></td>
                        <td><?= $work->title?></td>
                        <td>
                            <?php if($comment->isAllowed()):?>
                                <a class="btn btn-warning" href="<?= Url::toRoute(['comment/disallow', 'id'=>$comment->id]);?>">Запретить</a>
                            <?php else:?>
                                <a class="btn btn-success" href="<?= Url::toRoute(['comment/allow', 'id'=>$comment->id]);?>">Разрешить</a>
                            <?php endif?>
                            <a class="btn btn-danger" href="<?= Url::toRoute(['comment/delete', 'id' => $comment->id]); ?>">Удалить</a>
                        </td>
                    </tr>
                <?php endforeach;?>
            </tbody>
        </table>

    <?php endif;?>
</div>
