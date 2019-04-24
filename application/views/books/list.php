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
                        <a class="nav-link active" href="#all-books">Összes könyv</a>
                    </li>

                    <li class="nav-item" role="presentation"><a class="nav-link" href="<?= site_url('books/add') ?>">Új Könyv</a>
                    </li>

                    <li class="nav-item" role="presentation"><a class="nav-link" href="<?= site_url('file/downloadFile') ?>">Forrás Kód Letöltése</a>
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
<div class="container">
    <div class="jumbotron">
        <h1>Nem tudod hogy mit olvass ?</h1>
        <p class="p">Mindenképpen nézz körül nálunk!</p>
        <p><a class="btn btn-primary" role="button" href="#all-books">Összes Könyv</a></p>
    </div>
</div>

<?php if ($items != null && !empty($items)): ?>

    <div class="container " id="all-books">
        <hr class="hr">
    </div>
    <?php foreach ($items as $item): ?>
        <div class="szekcio">
            <div class="container">
                <div class="row">
                    <div class="col-sm-6 col-md-5 col-lg-5"><img
                                src="<?= $item['borito_url'] ?>"></div>
                    <div class="col-sm-6 col-md-7 col-lg-7">

                        <h2><?= $item['cim'] ?></h2>
                        <p><?= $item['tartalom'] ?></p>

                        <a href="<?= site_url('books/' . $item['id']) ?>">
                            <button class="btn btn-primary" type="button">Kölcsönzés</button>
                        </a>
                        <a href="<?= site_url('books/delete/' . $item['id']) ?>">
                            <button class="btn btn-danger" type="button">Törlés</button>
                        </a>
                        <a href="<?= site_url('books/edit/' . $item['id']) ?>">
                            <button class="btn btn-info" type="button">Szerkeszt</button>
                        </a>
                    </div>
                </div>
                <hr class="hr">
            </div>
        </div>
    <?php endforeach; ?>
<?php endif; ?>

<div>
    <div class="container">
        <div class="row">
            <div class="col-md-6"></div>
            <div class="col-md-6">
                <a class="nav-link" href="<?= site_url('books/add') ?>"><h3
                            class="text-center bg-secondary border rounded border-dark pulse"
                            data-bs-hover-animate="pulse"
                            style="margin-top: 15px;">Új Könyv</h3></a></li>
            </div>
        </div>
    </div>
</div>


<script src="/../assets/js/jquery.min.js"></script>
<script src="/../assets/bootstrap/js/bootstrap.min.js"></script>
<script src="/../assets/js/bs-animation.js"></script>
</body>

</html>