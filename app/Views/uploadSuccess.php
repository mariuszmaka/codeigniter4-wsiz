<h3>Poprawnie wgrano!</h3>

<ul>
    <li>name: <?= esc($uploaded_fileinfo->getBasename()) ?></li>
    <li>size: <?= esc($uploaded_fileinfo->getSizeByUnit('kb')) ?> KB</li>
    <li>extension: <?= esc($uploaded_fileinfo->guessExtension()) ?></li>
</ul>

<p><a href="<?= base_url('panel'); ?>" type="submit" class="btn btn-primary mb-3">Dodaj kolejne pliki</a> </p>