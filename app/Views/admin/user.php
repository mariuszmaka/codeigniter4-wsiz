<?php
# error show
if(isset($msg))
    echo '<div class="alert alert-warning" role="alert">'.$msg.'</div>';
?>


<?= $pager->links() ?>
<table class="table">
    <thead>
    <tr>
        <th scope="col">ID</th>
        <th scope="col">Imię</th>
        <th scope="col">Nazwisko</th>
        <th scope="col">Email</th>
        <th scope="col">Hasło</th>
        <th scope="col">Adres</th>
        <th scope="col">Telefon</th>
        <th scope="col">Rola</th>
        <th scope="col" colspan="2">Operacje</th>
    </tr>
    </thead>
    <tbody>
    <?php
    if (isset($data)) {
        foreach ($data as $row) {
            ?>
            <tr>
                <th scope="row">
                    <form method="post" action="<?= base_url("admin/usersEdit"); ?>"><input type="hidden" name="id" value="<?= $row->id; ?>"> <?= $row->id; ?>
                </th>
                <td>
                    <label>
                        <input name="name" type="text" class="form-control" value="<?= $row->name; ?>">
                    </label>
                </td>
                <td>
                    <label>
                        <input name="surname" type="text" class="form-control" value="<?= $row->surname; ?>">
                    </label>
                </td>
                <td>
                    <label>
                        <input name="email" type="text" class="form-control" value="<?= $row->email; ?>">
                    </label>
                </td>
                <td>
                    <label>
                        <input name="password" type="text" class="form-control" value="<?= $row->password; ?>">
                    </label>
                </td>
                <td>
                    <label>
                        <input name="adres" type="text" class="form-control" value="<?= $row->adres; ?>">
                    </label>
                </td>
                <td>
                    <label>
                        <input name="phone" type="text" class="form-control" value="<?= $row->phone; ?>">
                    </label>
                </td>
                <td>
                    <label>
                        <select name="role" class="form-select">
                            <option value="user" <?= ($row->role=='user' ? ' selected' : '' ); ?>>user</option>
                            <option value="admin" <?= ($row->role=='admin' ? ' selected' : '' ); ?>>admin</option>
                        </select>
                    </label>
                </td>
                <td>
                    <button type="submit" class="btn btn-warning" title="Zapisz zmiany">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-floppy" viewBox="0 0 16 16">
                            <path d="M11 2H9v3h2z"/>
                            <path d="M1.5 0h11.586a1.5 1.5 0 0 1 1.06.44l1.415 1.414A1.5 1.5 0 0 1 16 2.914V14.5a1.5 1.5 0 0 1-1.5 1.5h-13A1.5 1.5 0 0 1 0 14.5v-13A1.5 1.5 0 0 1 1.5 0M1 1.5v13a.5.5 0 0 0 .5.5H2v-4.5A1.5 1.5 0 0 1 3.5 9h9a1.5 1.5 0 0 1 1.5 1.5V15h.5a.5.5 0 0 0 .5-.5V2.914a.5.5 0 0 0-.146-.353l-1.415-1.415A.5.5 0 0 0 13.086 1H13v4.5A1.5 1.5 0 0 1 11.5 7h-7A1.5 1.5 0 0 1 3 5.5V1H1.5a.5.5 0 0 0-.5.5m3 4a.5.5 0 0 0 .5.5h7a.5.5 0 0 0 .5-.5V1H4zM3 15h10v-4.5a.5.5 0 0 0-.5-.5h-9a.5.5 0 0 0-.5.5z"/>
                        </svg>
                    </button>
                    <i class="bi bi-save"></i>
                    </form>
                </td>
                <td>
                    <form method="post" action="<?= base_url("admin/usersDelete"); ?>">
                        <input type="hidden" name="id" value="<?= $row->id; ?>">
                        <button type="submit" class="btn btn-danger" title="Usuń">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z"/>
                                <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z"/>
                            </svg>
                        </button>
                    </form>
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
