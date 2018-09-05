<div class="container-fuild conteneur">
    <div class="container bloc-single">
        <div class="col-sm-12">
            <div class="single-image">
                <img src="<?= $post->getImage();?>"/>
            </div>
            <h1><?= $post->getTitle();?></h1>
            <small>
            Par <?= $post->getAuthor();?>, le <?= $post->getDay() .' '.$post->getMonth().' '.$post->getYear();?>
            </small>
            <p class="single-intro"><?= $post->getIntro();?></p>
            <p><?= $post->getContent();?></p>
        </div>
        <div class="col-sm-12">
            <legend>Commentaires</legend>
            <?php
            echo '<div class="alert alert-danger">Vous devez être connecté pour envoyer un commentaire</div>';
            ?>
        </div>
    </div>
</div>