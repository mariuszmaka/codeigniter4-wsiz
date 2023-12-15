<?= $pager->links() ?>
<table class="table table-striped">
    <thead>
    <tr>
        <th scope="col">Id</th>
        <th scope="col">Tytuł</th>
        <th scope="col">Strony</th>
        <th scope="col">Isbn</th>
        <th scope="col">Opis</th>
        <th scope="col">Img</th>
        <th scope="col">Typ</th>
        <th scope="col">Ilość</th>
        <th scope="col">URL</th>
        <th scope="col">Operacje</th>
    </tr>
    </thead>
    <tbody>
    <?php
    if (isset($data)) {
        foreach ($data as $row) {
            ?>

            <tr>
                <th scope="row"><?= $row->book_id; ?></th>
                <td><?= $row->title; ?></td>
                <td><?= $row->pages; ?></td>
                <td><?= $row->isbn; ?></td>
                <td><?= $row->description; ?></td>
                <td><?= $row->img; ?></td>
                <td><?= $row->type; ?></td>
                <td><?= $row->amount; ?></td>
                <td><?= $row->url; ?></td>
                <td>
                    <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                        <a type="button" class="btn btn-danger" href="<?= base_url('admin/orders/delete'); ?>">Usuń</a>
                        <a type="button" class="btn btn-warning" href="<?= base_url('admin/orders/save') ?>">Zmień</a>
                    </div>
                </td>
            </tr>

            <?php
        }
    } else {
        echo 'Brak danych.';
    }
    ?>
    </tbody>
</table>
