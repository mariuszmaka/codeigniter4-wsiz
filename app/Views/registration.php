
    <div class="card"> 
    <div class="card-body">
    <form method="post" action="<?= base_url("registration"); ?>"> 
    <h1>Rejestracja</h1>

    <div class="mb-3">
        <label for="name" class="form-label">Imię</label>
        <input required id="name" name="name" type="name" class="form-control" id="name" placeholder="Imię" />
    </div>

    <div class="mb-3">
        <label for="email" class="form-label">Adres email</label>
        <input required  id="email" name="email" type="email" class="form-control" id="email" placeholder="nazwa@domena.pl" />
    </div>

    <div class="mb-3">
        <label for="password" class="form-label">Hasło</label>
        <input required  id="password" name="password" type="text" class="form-control" id="password" placeholder="Wpisz hasło" />        
    </div>
    <div class="mb-3">
        <input type="submit" value="Rejestracja" class="btn btn-primary" />
    </div>
    </form>
    </div>
</div>


