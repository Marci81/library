<!DOCTYPE html>
<html>

<?php $this->load->view('partials/nav'); ?>

<form class="form" action="/books/update/<?= $konyv['id'] ?>" method="post">
    <div class="container">
        <h1>Frissítsd a <?= $konyv['cim'] ?></h1>
        <hr style="width: 50% ; text-align: left; margin-left: 0">

        <div class="form-group">
            <label>Cím</label>
            <input class="form-control input" type="text" name="cim" value="<?= $konyv['cim'] ?>">
        </div>

        <div class="form-group">
            <label>Szerző</label>
            <?php foreach ($szerzok as $szerzo): ?>
                <input class="form-control input" type="text" name="szerzo_neve" value="<?= $szerzo['szerzo_neve'] ?>">
            <?php endforeach; ?>
        </div>

        <div class="form-group">
            <label>ISBN</label>
            <input class="form-control input" type="text" name="isbn" value="<?= $konyv['isbn'] ?>" ">
        </div>

        <div class="form-group">
            <label>Kategória</label>
            <?php foreach ($kategoriak as $kategoria): ?>
                <input class="form-control input" type="text" name="kategoria_neve"
                       value="<?= $kategoria['kategoria_neve'] ?>" ">
            <?php endforeach; ?>
        </div>

        <div class="form-group">
            <label>Borítókép URL</label>
            <input class="form-control input" type="text" name="borito_url" value="<?= $konyv['borito_url'] ?>" ">
        </div>

        <div class="form-group">
            <label>Tartalom</label>
            <textarea class="form-control input" id="" name="tartalom" cols="30"
                      rows="10"><?= $konyv['tartalom'] ?></textarea>
        </div>

        <input class="btn btn-primary" type="submit">

    </div>
</form>

<?php $this->load->view('partials/footer'); ?>

<script src="/../assets/js/jquery.min.js"></script>
<script src="/../assets/bootstrap/js/bootstrap.min.js"></script>
<script src="/../assets/js/bs-animation.js"></script>
</body>

</html>