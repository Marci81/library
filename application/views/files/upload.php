<!DOCTYPE html>
<html lang="hu">

<?php $this->load->view('partials/nav'); ?>

<form class="form" action="<?= site_url('file/uploadFile') ?>" method="post" enctype="multipart/form-data">

    <h1>Borítókép feltöltés</h1>
    <hr style="width: 50% ; text-align: left; margin-left: 0">

    <div class="form-group">
        <label>Fájl</label>
        <br>
        <input type="file" name="userfile" "/>
    </div>

    <input class="btn btn-primary" type="submit" value="Feltöltés"/>


</form>

<?php $this->load->view('partials/footer'); ?>

</body>
</html>