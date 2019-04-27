<!DOCTYPE html>
<html>

<?php $this->load->view('partials/nav'); ?>

<div id="empresa" style="padding:20px;margin:1px;">
    <div class="container">
        <div class="row">
            <div class="col-sm-6 col-md-5 col-lg-5"><img
                        src="<?= $konyv['borito_url'] ?>"></div>
            <div class="col-sm-6 col-md-7 col-lg-7">
                <h2><?= $konyv['cim'] ?></h2>
                <p><?= $konyv['tartalom'] ?></p>
                <hr>
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
                    <form action="/books/rent" method="post">
                    <input type="submit" class="submit"  name="konyv_id" value="<?= $konyv['id'] ?>">
                    </form>

                    <h3 class="text-center bg-secondary border rounded border-dark pulse" data-bs-hover-animate="pulse"
                        style="margin-top: 15px;">Kölcsönzés</h3>
                </div>
                <div class="col-md-6">
                    <a href="<?= site_url('file/fileWrite/' . $konyv['id']) ?>">
                        <h3 class="text-center bg-secondary border rounded border-dark pulse"
                            data-bs-hover-animate="pulse"
                            style="margin-top: 15px;">Kiirás Fájlba
                        </h3>
                    </a>
                </div>
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