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
<form class="form">
    <div class="container">
        <h1>Új Könyv</h1>
        <hr style="width: 50% ; text-align: left; margin-left: 0">

        <div class="form-group">
            <label>Cím</label>
            <input class="form-control input" type="text" placeholder="Harry Potter">
        </div>

        <div class="form-group">
            <label>Szerző</label>
            <input class="form-control input" type="text" placeholder="J.K.Rowling">
        </div>

        <div class="form-group">
            <label>ISBN</label>
            <input class="form-control input" type="text" placeholder="1234567891234" ">
        </div>

        <div class="form-group">
            <label>Kategória</label>
            <input class="form-control input" type="text" placeholder="Akcio" ">
        </div>

        <div class="form-group">
            <label>Borítókép URL</label>
            <input class="form-control input" type="url" placeholder="https://images.gr-assets.com/books/1474154022l/3.jpg" ">
        </div>

        <div class="form-group">
            <label>Tartalom</label>
            <textarea class="form-control input" id="" cols="30" rows="10"></textarea>
        </div>

        <button class="btn btn-primary" type="button">Kész</button>

    </div>
</form>
<script src="/../assets/js/jquery.min.js"></script>
<script src="/../assets/bootstrap/js/bootstrap.min.js"></script>
<script src="/../assets/js/bs-animation.js"></script>
</body>

</html>