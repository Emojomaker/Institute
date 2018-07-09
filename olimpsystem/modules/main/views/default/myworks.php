<?php

use yii\helpers\Url;
use yii\widgets\LinkPager;

?>

<!--main content start-->
<div class="main-content">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <?php foreach($works as $work):?>
                

                <article class="post">
                    <div class="post-thumb">
                        <a href="<?= Url::toRoute(['default/view', 'id'=>$works->id]);?>"><img src="<?=$work->getImage();?>" alt=""></a>

                        <a href="<?= Url::toRoute(['default/view', 'id'=>$works->id]);?>" class="post-thumb-overlay text-center">
                            <div class="text-uppercase text-center">Посмотреть</div>
                        </a>
                    </div>
                    <div class="post-content">
                        <header class="entry-header text-center text-uppercase">
                            <h6><a href="<?=Url::toRoute(['/main/default/category', 'id'=>$work->category->id])?>"><?=$work->category->title?></a></h6>

                            <h1 class="entry-title"><a href="<?= Url::toRoute(['default/view', 'id'=>$work->id]);?>"><?=$work->title?></a></h1>


                        </header>
                        <div class="entry-content">
                            <p>
                                <?=$work->description?>
                            </p>

                            <div class="btn-continue-reading text-center text-uppercase">
                                <a href="<?= Url::toRoute(['default/view', 'id'=>$work->id]);?>" class="more-link">Читать далее</a>
                            </div>
                        </div>
                        <div class="social-share">
                            <span class="social-share-title pull-left text-capitalize">от <a href="#"><?=$work->author->username?></a> On <?=$work->getDate();?></span>
                            <ul class="text-center pull-right">
                                <li><a class="s-facebook" href="#"><i class="fa fa-eye"></i></a></li><?=(int) $work->viewed?>
                            </ul>
                        </div>
                    </div>
                </article>
                <?php endforeach; ?>
               <?php

                    echo LinkPager::widget([
                        'pagination'=>$pagination,
                    ]);
               ?>
            </div>
            <?=$this->render('/partials/sidebar', [
                 'popular'=>$popular,
                 'recent'=>$recent,
                 'categories'=>$categories
      
            ])?>
        </div>
    </div>
</div>
<!-- end main content-->
<!--footer start-->