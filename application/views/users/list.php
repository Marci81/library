<!DOCTYPE html>
<html lang="hu">

<?php $this->load->view('partials/nav'); ?>

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


<?php $this->load->view('partials/footer'); ?>


<script src="/../assets/js/jquery.min.js"></script>
<script src="/../assets/bootstrap/js/bootstrap.min.js"></script>
<script src="/../assets/js/bs-animation.js"></script>
</body>

</html>