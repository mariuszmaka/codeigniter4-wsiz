<?= $pager->links() ?>
<table class="table">
    <thead>
    <tr>
        <th scope="col">Numer zamówienia</th>
        <th scope="col">Id książki</th>
        <th scope="col">Tytuł</th>
        <th scope="col">Id użytkownika</th>
        <th scope="col">Imię</th>
        <th scope="col">Nazwisko</th>
        <th scope="col">Telefon</th>
        <th scope="col">Data</th>
        <th scope="col">Status</th>
        <th scope="col">Operacje</th>
    </tr>
    </thead>
    <tbody>
    <?php
    if (isset($data)) {
        foreach ($data as $row) {
            ?>

            <tr>
                <th scope="row"><?= $row['id_order']; ?></th>
                <td><?= $row['book_id']; ?></td>
                <td><?= $row['title']; ?></td>
                <td><?= $row['user_id']; ?></td>
                <td><?= $row['name']; ?></td>
                <td><?= $row['surname']; ?></td>
                <td><?= $row['phone']; ?></td>
                <td><?= $row['date']; ?></td>
                <td>
                    <select class="form-select">
                        <option value="nowe" <?= ($row['status']=='nowe' ? ' selected' : '' ); ?>>Nowe</option>
                        <option value="wysłane" <?= ($row['status']=='wysłane' ? ' selected' : '' ); ?>>Wysłane</option>

                    </select>
                </td>
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
