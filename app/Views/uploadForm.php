
<?php
helper('form');
?>


<?php if(isset($errors)){
    foreach ($errors as $error): ?>
        <div class="alert alert-danger" role="alert"><?= esc($error) ?></div>
    <?php
    endforeach;

} ?>


<?= form_open_multipart(base_url('upload/upload')) ?>

<div class="mb-3">
    <label for="formFile" class="form-label">Wybierz plik do wgrania na serwer:</label>
    <input class="form-control" type="file" id="userfile" name="userfile" size="20">
</div>


<div class="col-auto">
    <button type="submit" value="upload" class="btn btn-primary mb-3">Upload</button>
</div>
<?= form_close(); ?>
