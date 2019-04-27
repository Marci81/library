<!DOCTYPE html>
<html>

<?php $this->load->view('partials/nav'); ?>

<form class="form" action="/books/add" method="post">
    <div class="container">
        <h1>Új Könyv</h1>
        <hr style="width: 50% ; text-align: left; margin-left: 0">

        <div class="form-group">
            <label>Cím</label>
            <input class="form-control input" type="text" name="cim" placeholder="Harry Potter">
        </div>

        <div class="form-group">
            <label>Szerző</label>
            <input class="form-control input" type="text" name="szerzo_neve" placeholder="J.K.Rowling">
        </div>

        <div class="form-group">
            <label>ISBN</label>
            <input class="form-control input" type="text" name="isbn" placeholder="1234567891234" ">
        </div>

        <div class="form-group">
            <label>Kategória</label>
            <input class="form-control input" type="text" name="kategoria_neve" placeholder="Akcio" ">
        </div>

        <div class="form-group">
            <label>Borítókép URL</label>
            <input class="form-control input" type="text" name="borito_url" placeholder="https://images.gr-assets.com/books/1474154022l/3.jpg" ">
        </div>

        <div class="form-group">
            <label>Tartalom</label>
            <textarea class="form-control input" id="" name="tartalom" cols="30" rows="10"></textarea>
        </div>

        <input  class="btn btn-primary" type="submit">

    </div>
</form>

<?php $this->load->view('partials/footer'); ?>

<script src="/../assets/js/jquery.min.js"></script>
<script src="/../assets/bootstrap/js/bootstrap.min.js"></script>
<script src="/../assets/js/bs-animation.js"></script>
</body>

</html>