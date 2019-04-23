<!DOCTYPE html>
<html>

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
<nav class="navbar navbar-light navbar-expand-md navigation-clean-button" id="navigation-bar"
     style="background-color: rgb(225,224,195);margin-top: 0;width: 100%;margin-right: auto;margin-left: auto;margin-bottom: 40px;">
    <div class="container"><a class="navbar-brand" href="<?= base_url('') ?>"><i class="fas fa-book-open"
                                                                                 style="margin-right: 12px;"></i>Könyvtár.hu</a>
        <button data-toggle="collapse" class="navbar-toggler" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span
                    class="navbar-toggler-icon"></span></button>
        <div
                class="collapse navbar-collapse" id="navcol-1">
            <ul class="nav navbar-nav mr-auto">
                <li class="nav-item" role="presentation"><a class="nav-link active" href="<?= base_url('') ?>">Összes
                        könyv</a></li>
                <li class="nav-item" role="presentation"><a class="nav-link" href="#">Új Könyv</a></li>
            </ul>
            <span class="navbar-text actions"> <a class="login" href="#">Bejelentkezés</a><a
                        class="btn btn-light action-button" role="button" href="#">Regisztráció</a></span></div>
    </div>
</nav>
<div id="empresa" style="padding:20px;margin:1px;">
    <div class="container">
        <div class="row">
            <div class="col-sm-6 col-md-5 col-lg-5"><img
                        src="<?= $konyv['borito_url'] ?>"></div>
            <div class="col-sm-6 col-md-7 col-lg-7">
                <h2><?= $konyv['cim'] ?></h2>
                <p><?= $konyv['tartalom'] ?></p>
            </div>
        </div>
    </div>
    <div style="margin-top: 10px ">
        <div class="container">
            <div class="row">
                <div class="col-md-3"><strong>Szerző(k)</strong>
                    <?php foreach ($szerzok as $szerzo): ?>
                        <p><?= $szerzo['szerzo_neve'] ?></p>
                    <?php endforeach; ?>
                </div>
                <div class="col-md-3"><strong>ISBN</strong>
                    <p><?= $konyv['isbn'] ?></p>
                </div>
                <div class="col-md-3"><strong>Kategória</strong>
                    <?php foreach ($kategoriak as $kategoria): ?>
                        <p><?= $kategoria['kategoria_neve'] ?></p>
                    <?php endforeach; ?>
                </div>
                <div class="col-md-3"><strong>Kölcsönözhető</strong>
                    <p class="pulse">IGEN</p>
                </div>
            </div>
        </div>
    </div>
    <div>
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <h3 class="text-center bg-secondary border rounded border-dark pulse" data-bs-hover-animate="pulse"
                        style="margin-top: 15px;">Kölcsönzés</h3>
                </div>
                <div class="col-md-6"></div>
            </div>
        </div>
    </div>
</div>

<script src="/../assets/js/jquery.min.js"></script>
<script src="/../assets/bootstrap/js/bootstrap.min.js"></script>
<script src="/../assets/js/bs-animation.js"></script>
</body>

</html>