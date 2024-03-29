<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="<?= base_url('assets/star-rating.css') ?>" rel="stylesheet" type="text/css"/>
    <title>Biblioteka cyfrowa</title>
</head>
<body>


<nav class="navbar navbar-expand-lg bg-dark navbar-dark">
    <div class="container">
        <a class="navbar-brand" href="<?= base_url() ?>">Cyfrowa Biblioteka</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url("catalog") ?>">Katalog książek</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url("search") ?>">Wyszukiwarka</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url("recommendation") ?>">Rekomendacje</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<nav class="navbar navbar-expand-lg navbar-light bg-light" style="background-color: #e3f2fd !important;">
    <div class="container">
        <span class="navbar-brand">Administartor</span>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url("admin/users") ?>">Użytkownicy</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url("admin/books") ?>">Książki</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url("admin/orders") ?>">Zamówienia</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url("admin/upload") ?>">Wgrywanie plików</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url("upload/fileList") ?>">Lista plików</a>
                </li>
            </ul>
        </div>
    </div>
</nav>


<div class="container mt-3 mb-3"> 