<?php if(!empty($comments)):?>

    <?php foreach($comments as $comment):?>
        <div class="bottom-comment"><!--bottom comment-->
            <div class="comment-img">
                <img width="50" class="img-circle" src="<?= $comment->user->image; ?>" alt="">
            </div>

            <div class="comment-text">
                <a href="#" class="replay btn pull-right"> Replay</a>
                <h5><?= $comment->user->username;?></h5>

                <p class="comment-date">
                    <?= $comment->getDate();?>
                </p>


                <p class="para"><?= $comment->text; ?></p>
            </div>
        </div>
    <?php endforeach;?>

<?php endif;?>
<!-- end bottom comment-->

<?php if(!Yii::$app->user->isGuest):?>
    <div class="leave-comment"><!--leave comment-->
        <h4>Комментарии</h4>
        <?php if(Yii::$app->session->getFlash('comment')):?>
            <div class="alert alert-success" role="alert">
                <?= Yii::$app->session->getFlash('comment'); ?>
            </div>
        <?php endif;?>
        <?php $form = \yii\widgets\ActiveForm::begin([
            'action'=>['default/comment', 'id'=>$article->id],
            'options'=>['class'=>'form-horizontal contact-form', 'role'=>'form']])?>
        <div class="form-group">
            <div class="col-md-12">
                <?= $form->field($commentForm, 'comment')->textarea(['class'=>'form-control','placeholder'=>'Введите своё сообщение'])->label(false)?>
            </div>
        </div>
        <button type="submit" class="btn send-btn">Отправить</button>
        <?php \yii\widgets\ActiveForm::end();?>
    </div><!--end leave comment-->
<?php endif;?>