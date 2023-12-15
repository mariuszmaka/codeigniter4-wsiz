<?= $pager->links() ?>
<table class="table">
    <thead>
    <tr>
        <th scope="col">ID</th>
        <th scope="col">Imię</th>
        <th scope="col">Nazwisko</th>
        <th scope="col">Email</th>
        <th scope="col">Adres</th>
        <th scope="col">Telefon</th>
        <th scope="col">Rola</th>
        <th scope="col">Operacje</th>
    </tr>
    </thead>
    <tbody>
    <?php
    if (isset($data)) {
        foreach ($data as $row) {
            ?>


            <tr>
                <th scope="row"><?= $row->id; ?></th>
                <td><?= $row->name; ?></td>
                <td><?= $row->surname; ?></td>
                <td><?= $row->email; ?></td>
                <td><?= $row->adres; ?></td>
                <td><?= $row->phone; ?></td>
                <td><?= $row->role; ?></td>
                <td>
                    <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                        <button type="button" class="btn btn-danger">Usuń</button>
                        <button type="button" class="btn btn-warning">Edycja</button>
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
