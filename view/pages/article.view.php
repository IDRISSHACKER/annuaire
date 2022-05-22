<?php
global $article;
global $title;
$title = $article["titre"];
?>

<div class="article-area">
    <div class="row-a">
        <div class="card article-title mt3">
            <img src="assets/icon/user.png" class="avatar" alt="">
            <div><?= @$article["titre"] ?></div>
        </div>
        <div class="article-display card">
            <div class="article-img img-show">
                <img src="assets/icon/pdf.png" class="fw pdf-view">
            </div>
            <div class="article-text">
                <p>Matricule: <span class="badge"><?= @$article["matricule"] ?></span></p>
                <br />
                <p>
                    <a href="files/post/<?= @$article['apercu'] ?>" download="<?= @$article['apercu'] ?>" class="btn btn-primary btns-icon">
                        <img src="assets/icon/archive.png" class="btn-icon" alt="">
                        <span>Telecharger le diplome</span>
                    </a>
                </p>
            </div>
        </div>
    </div>
</div>