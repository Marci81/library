<!DOCTYPE html>
<html lang="hu">

<?php $this->load->view('partials/nav'); ?>

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

<?php $this->load->view('partials/footer'); ?>

<script src="/../assets/js/jquery.min.js"></script>
<script src="/../assets/bootstrap/js/bootstrap.min.js"></script>
<script src="/../assets/js/bs-animation.js"></script>
</body>

</html>