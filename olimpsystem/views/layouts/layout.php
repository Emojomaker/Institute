<?php

/* @var $this \yii\web\View */
/* @var $content string */

use app\assets\PublicAsset;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\helpers\Url;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
use app\widgets\Alert;
use app\modules\admin\rbac\Rbac as AdminRbac;

PublicAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<nav class="navbar main-menu navbar-default">
    <div class="container">
        <div class="menu-content">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                        data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="/main/default/index"><img src="/public/images/logos.png" alt=""></a>
            </div>


            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

                <div class="i_con">
                    <ul class="nav navbar-nav text-uppercase">
                        <?php if(Yii::$app->user->isGuest):?>
                             <li><a href="<?= Url::toRoute(['/main/contact/index'])?>">Обратная связь</a></li>
                            <li><a href="<?= Url::toRoute(['/user/default/signup'])?>">Регистрация</a></li>
                            <li><a href="<?= Url::toRoute(['/user/default/login'])?>">Вход</a></li>
                         <?php elseif(Yii::$app->user->can(AdminRbac::PERMISSION_ADMIN_PANEL)):?>
                            <li><a href="<?= Url::toRoute(['/admin/default/index'])?>">Управление</a></li>
                             <?= Html::beginForm(['/user/default/logout'], 'post')
                            . Html::submitButton(
                                'Выход (' . Yii::$app->user->identity->username . ')',
                                ['class' => 'btn btn-link logout', 'style'=>"padding-rigth:1px;"]
                            )
                            . Html::endForm() ?>
                        <?php elseif(!Yii::$app->user->isGuest):?>
                         <li><a href="<?= Url::toRoute(['/user/profile/index'])?>">Профиль</a></li>
                         <li><a href="<?= Url::toRoute(['/user/article/create'])?>">Публикация работ</a></li>
                         <li><a href="<?= Url::toRoute(['/user/works/index'])?>">Мои работы</a></li>
                            <?= Html::beginForm(['/user/default/logout'], 'post')
                            . Html::submitButton(
                                'Выход (' . Yii::$app->user->identity->username . ')',
                                ['class' => 'btn btn-link logout', 'style'=>"padding-rigth:1px;"]
                            )
                            . Html::endForm() ?>
                        <?php endif;?>
                    </ul>
                </div>

            </div>
            <!-- /.navbar-collapse -->
        </div>
    </div>
    <!-- /.container-fluid -->
</nav>

<div class="container">
 
    <?= Alert::widget() ?>
    <?= $content ?>
</div>


<footer class="footer-widget-section">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <aside class="footer-widget">
                    <div class="about-img"><img src="/public/images/logos.png" alt=""></div>
                    <div class="about-content">Дистанционные олимпиады по информационным технологиям
                    </div>
                    <div class="address">
                        <h4 class="text-uppercase">Контактные данные</h4>

                        <p> г. Волжский, ул. Камская, 6, РФ</p>

                        <p> Phone: (8443) 41-22-62</p>

                        <p>olimpvolpi.ru</p>
                    </div>
                </aside>
            </div>

            
       
        </div>
    </div>

</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
