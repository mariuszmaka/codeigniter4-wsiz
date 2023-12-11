<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js"></script>



<nav class="navbar navbar-expand-lg bg-dark navbar-dark">
  <div class="container">
    <a class="navbar-brand" href="<?=base_url() ?>">Cyfrowa Biblioteka</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <!--
          <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="<?=base_url() ?>">Home</a>
        </li>
        -->
        <li class="nav-item">
          <a class="nav-link" href="<?=base_url("catalog") ?>">Katalog książek</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?=base_url("search") ?>">Wyszukiwarka</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?=base_url("login") ?>">Logowanie</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?=base_url("registration") ?>">Rejestracja</a>
        </li>
        <li>
          <!-- short if if ? yes : no -->
            <?php echo (isset(session('user')->name) ? 
            '<a class="nav-link" href="' .base_url('user')  .'">Moje dane ('.session('user')->name. ' '.session('user')->surname.')</a>'
            : ''); ?>
        </li>
        <li>
          <!-- short if if ? yes : no -->
            <?php echo (isset(session('user')->name) ? 
            '<a class="nav-link" href="' .base_url('/logout') .'">Wyloguj</a>'
            : ''); ?>
        </li>
      </ul>
    </div>
  </div>
</nav>


<div class="container mt-3 mb-3"> 