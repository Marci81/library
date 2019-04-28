<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">

<head>
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

                    <li class="nav-item" role="presentation"><a class="nav-link" href="<?= site_url('books/add') ?>">Új
                            Könyv</a>
                    </li>

                    <li class="nav-item" role="presentation"><a class="nav-link" href="<?= site_url('users') ?>">Felhasználók</a>
                    </li>

                    <li class="nav-item" role="presentation"><a class="nav-link" href="<?= site_url('file/fileread') ?>">Fájlból új könyv</a>
                    </li>

                    <li class="nav-item" role="presentation"><a class="nav-link" href="<?= site_url('file/upload') ?>">Fájl feltöltés</a>
                    </li>

                </ul>
                <span class="navbar-text actions">
                    <a class="login" href="#">Bejelentkezés</a>
                    <a class="btn btn-primary" href="<?= site_url('users/register') ?>">Regisztráció</a>
                </span>
            </div>
        </div>
    </nav>
</div>
