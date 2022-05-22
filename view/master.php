<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= @$title ?></title>
    <link rel="stylesheet" href="<?= "assets/css/main.css" ?>">
</head>

<body>
    <div class="navbar">
        <div class="navbar-brand">
            <a href="index.php?page=home" class="logo">Annuaire</a>
        </div>
        <ul class="navbar-link">
            <?php if (empty($_SESSION['id'])) { ?>
                <li>
                    <a href="index.php?page=login" class="btn btn-primary">Connexion</a>
                </li>
            <?php } ?>
            <?php if (!empty($_SESSION['id'])) { ?>
                <li>
                    <a href="index.php?page=upload" class="btn btn-primary">Ajouter un diplome</a>
                </li>
                <li>
                    <a href="index.php?page=logout">Deconexion</a>
                </li>
            <?php } ?>
        </ul>
    </div>
    <main>
        <div class="container">
            <?php if (!empty($_SESSION['id'])) { ?>
                <div class="area floating btn">
                    <div class="user-info">
                        <img src="assets/icon/user.png" class="avatar" alt="">
                        <span><?= $_SESSION['id']['nom'] ?></span>
                    </div>
                </div>
            <?php } ?>
            <div class="msg">
                <?php if (@$err) { ?>
                    <div class="alert alert-error w100"><?= @$errMsg ?></div>
                <?php } ?>
                <?php if (@$suc) { ?>
                    <div class="alert alert-success w100"><?= @$sucMsg ?></div>
                <?php } ?>
            </div>
            <div class="view">
                <?= @$view ?>
            </div>
        </div>
    </main>
</body>

</html>