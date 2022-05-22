<div class="howeView">
    <section class="articles">
        <div class="row-c">
            <?php
            global $articles;
            foreach ($articles as $article) { ?>
                <article class="article-view">
                    <a class="article card" href="index.php?page=article&article=<?= $article['id'] ?>">
                        <div class="card-img">
                            <img src="assets/icon/pdf.png" class="fw pdf">
                        </div>
                        <div class="card-content">
                            <div class="card-title"><?= short($article["titre"], 50) ?></div>
                            <div class="card-body"><?= short($article["matricule"], 140) ?></div>
                        </div>
                    </a>
                    <?php if (!empty($_SESSION['id'])) { ?>
                        <a href="index.php?page=home&remove=<?= $article['id'] ?>" class="btn btn-secondary">retirer ce diplome</a>
                    <?php } ?>
                </article>
            <?php } ?>
        </div>
    </section>
</div>