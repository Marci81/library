<!DOCTYPE html>
<html lang="hu">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Kölcsönzés</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.0/animate.min.css">
    <link href="https://fonts.googleapis.com/css?family=Goudy+Bookletter+1911" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Permanent+Marker" rel="stylesheet">
    <link rel="stylesheet" href="/../assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="/../assets/fonts/fontawesome-all.min.css">
    <link rel="stylesheet" href="/../assets/css/styles.css">
</head>

<body>

<div>
    <nav class="navbar navbar-light navbar-expand-md navigation-clean-button" id="navigation-bar">
        <div class="container"><a class="navbar-brand" href="<?= base_url('') ?>">
                <i class="fas fa-book-open"></i>Könyvtár.hu</a>
            <button data-toggle="collapse" class="navbar-toggler" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span
                        class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navcol-1">
                <ul class="nav navbar-nav mr-auto">
                    <li class="nav-item" role="presentation">
                        <a class="nav-link active" href=""<?= base_url('') ?>">Összes könyv</a>
                    </li>

                    <li class="nav-item" role="presentation"><a class="nav-link" href="<?= site_url('books/add') ?>">Új
                            Könyv</a>
                    </li>

                    <li class="nav-item" role="presentation"><a class="nav-link"
                                                                href="<?= site_url('file/downloadFile') ?>">Forrás Kód
                            Letöltése</a>
                    </li>

                </ul>
                <span class="navbar-text actions">
                    <a class="login" href="#">Bejelentkezés</a>
                    <a class="btn btn-primary" href="#">Regisztráció</a>
                </span>
            </div>
        </div>
    </nav>
</div>

<?php if ($users != null && !empty($users)): ?>

    <div class="container users-headings ">

        <div class="row">

            <div class="col-md-2">
                <h5>Felhasználónév</h5>
            </div>
            <div class="col-md-2">
                <h5>Admin</h5>
            </div>
            <div class="col-md-2">
                <h5>Kölcsönzönév</h5>
            </div>
            <div class="col-md-2">
                <h5></h5>
            </div>
            <div class="col-md-2">
                <h5></h5>
            </div>
            <div class="col-md-2">
                <h5></h5>
            </div>
        </div>

        <hr class="hr">

    </div>
    <?php foreach ($users as $user): ?>
        <div class="szekcio">
            <div class="container">

                <div class="row user-info">

                    <div class="col-md-2">
                        <p><?= $user['felhasznalo_neve'] ?></p>
                    </div>

                    <div class="col-md-2">
                        <?php if ($user['admin'] == 1) : ?>
                            <p>igen</p>
                        <?php else: ?>
                            <p>nem</p>
                        <?php endif; ?>
                    </div>
                    <div class="col-md-2">
                        <p><?= $kolcsonzo[$user['kolcsonzo_id']-1]['kolcsonzo_neve'] ?></p>
                    </div>

                    <div class="col-md-2">
                        <a href=""><p>Kölcsönzések</p></a>
                    </div>

                    <div class="col-md-2">
                        <a href=""><p>Szerkeszt</p></a>
                    </div>

                    <div class="col-md-2">
                        <a href=""> <p>Törlés</p></a>
                    </div>


                </div>

                <hr class="hr">

            </div>
        </div>
    <?php endforeach; ?>
<?php endif; ?>


<footer>
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <h5>Források</h5>
                <hr class="nav-hr">
                <p><a href="<?= site_url('file/downloadFile') ?>"><i class="fas fa-code"></i>Forrás kód</p></a>
                <p><a target="_blank" href="https://github.com/Marci81/library"><i class="fab fa-github"></i>GitHub
                </p></a>
            </div>
            <div class="col-md-3">
                <h5>Készítette</h5>
                <hr class="nav-hr">
                <p><a target="_blank" href="https://github.com/Marci81"><i class="far fa-paper-plane"></i> Marci
                </p></a>
            </div>


        </div>
    </div>
</footer>


<script src="/../assets/js/jquery.min.js"></script>
<script src="/../assets/bootstrap/js/bootstrap.min.js"></script>
<script src="/../assets/js/bs-animation.js"></script>
</body>

</html>