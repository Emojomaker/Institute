<!--main content start-->
<?php
use yii\helpers\Url;
?>
<div class="main-content">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <article class="post">
                    <div class="post-thumb">
                        <a href="<?= Url::toRoute(['default/view', 'id'=>$article->id]);?>"><img src="<?=$article->getImage();?>" alt=""></a>
                    </div>
                    <div class="post-content">
                        <header class="entry-header text-center text-uppercase">
                            <h6><a href="<?= Url::toRoute(['default/view', 'id'=>$article->id]);?>"><?=$article->category->title?></a></h6>

                            <h1 class="entry-title"><a href="<?=Url::toRoute(['/main/default/category', 'id'=>$article->id])?>"><?=$article->title?></a></h1>


                        </header>
                        <div class="entry-content">
                            <?=$article->content?>
                        </div>
                        <div class="decoration">
                            <a href="#" class="btn btn-default">Новости</a>
                            <a href="#" class="btn btn-default">Олимпиады</a>
                        </div>

                        <div class="social-share">
							<span
                                    class="social-share-title pull-left text-capitalize">От <?=$article->author->username?> On <?=$article->getDate();?></span>
                            <ul class="text-center pull-right">
                                <li><a class="s-facebook" href="#"><i class="fa fa-facebook"></i></a></li>
                                <li><a class="s-twitter" href="#"><i class="fa fa-twitter"></i></a></li>
                                <li><a class="s-google-plus" href="#"><i class="fa fa-google-plus"></i></a></li>
                                <li><a class="s-linkedin" href="#"><i class="fa fa-linkedin"></i></a></li>
                                <li><a class="s-instagram" href="#"><i class="fa fa-instagram"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </article>
               
               
                

                
                <!-- end bottom comment-->

  <?= $this->render('/partials/comment', [
                 'article'=>$article,
                 'comments'=>$comments,
                 'commentForm'=>$commentForm
             ])?>

      
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