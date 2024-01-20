

    <div class="card"> 
    <div class="card-body">
    <form method="post" action="<?= base_url("user"); ?>"> 
    <h1>Informacje o użytkowniku</h1>
 
    <input required id="id" name="id" type="hidden" class="form-control" id="id" value="<?= $user->id; ?>" />
  
    <div class="mb-3">
        <label for="name" class="form-label">Imię</label>
        <input required id="name" name="name" type="text" class="form-control" id="name" value="<?= $user->name; ?>" />
    </div>

    <div class="mb-3">
        <label for="surname" class="form-label">Nazwisko</label>
        <input required id="surname" name="surname" type="text" class="form-control" id="surname" value="<?= $user->surname; ?>" />
    </div>

    <div class="mb-3">
        <label for="email" class="form-label">Adres email</label>
        <input required  id="email" name="email" type="email" class="form-control" id="email" value="<?= $user->email; ?>" />
    </div>

    <div class="mb-3">
        <label for="name" class="form-label">Adres zamieszkania</label>
        <input required id="adres" name="adres" type="text" class="form-control" id="adres" value="<?= $user->adres; ?>" />
    </div>

    <div class="mb-3">
        <label for="name" class="form-label">Nr telefonu</label>
        <input required id="telefon" name="telefon" type="text" class="form-control" id="telefon" value="<?= $user->phone; ?>" />
    </div>

    <div class="mb-3">
        <label for="password" class="form-label">Hasło</label>
        <input required  id="password" name="password" type="password" class="form-control" id="password" placeholder="Wpisz hasło" />        
    </div>
    <div class="mb-3">
        <input type="submit" value="Aktualizacja danych" class="btn btn-primary" />
    </div>
    </form>
    </div>
    </div>
    

