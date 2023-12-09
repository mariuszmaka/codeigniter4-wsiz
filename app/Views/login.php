<div class="card">
    <div class="card-body">
        <form method="post" action="<?= base_url("login"); ?>">
            <h1>Logowanie</h1>

            <div class="mb-3">
                <label for="email" class="form-label">Adres email</label>
                <input id="email" name="email" type="email" class="form-control" id="email"
                    placeholder="nazwa@domena.pl" />
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">Hasło</label>
                <input id="password" name="password" type="password" class="form-control" id="password"
                    placeholder="Wpisz hasło" />
            </div>
            <div class="mb-3">
                <input type="submit" value="Logowanie" class="btn btn-primary" />
            </div>
        </form>
    </div>
</div>