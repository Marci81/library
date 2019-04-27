<!DOCTYPE html>
<html lang="hu">

<?php $this->load->view('partials/nav'); ?>

<form class="form" action="/users/register" method="post">
    <div class="container">
        <h1>Regisztráció</h1>
        <hr style="width: 50% ; text-align: left; margin-left: 0">

        <div class="form-group">
            <label>Felhasználó Név</label>
            <input class="form-control input" type="text" required name="felhasznalo_neve" placeholder="Felhasználó Név">
        </div>

        <div class="form-group">
            <label>Jelszó</label>
            <input class="form-control input" type="password" required name="jelszo" placeholder="">
        </div>


        <div class="form-group">
            <label>Teljes Név</label>
            <input class="form-control input" type="text" required name="kolcsonzo_neve"
                   placeholder="Teljes Név" ">
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

