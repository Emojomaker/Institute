<?php

use app\modules\admin\Module;
use app\modules\user\Module as UserModule;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model \app\modules\user\models\backend\User */

$this->title = Module::t('module', 'ADMIN');
?>
<div class="admin-default-index">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(UserModule::t('module', 'ADMIN_USERS'), ['user/default/index'], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(UserModule::t('module', 'Статьи'), ['article/index'], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(UserModule::t('module', 'Работы'), ['works/index'], ['class' => 'btn btn-primary']) ?>
         <?= Html::a(UserModule::t('module', 'Категории'), ['category/index'], ['class' => 'btn btn-primary']) ?>

          <?= Html::a(UserModule::t('module', 'Теги'), ['tag/index'], ['class' => 'btn btn-primary']) ?>
          <?= Html::a(UserModule::t('module', 'Комментарии'), ['comment/index'], ['class' => 'btn btn-primary']) ?>
          

    </p>
</div>


</script>
