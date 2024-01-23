<?php if ($data): ?>

    <?php

    $book_id = null;
    $user_id = $data->book_id;

    ?>
    <div class="card mb-3" style="max-width: 100%;">
        <div class="card-header">
            <h5>
                <?php echo $data->title; ?>
            </h5>
        </div>

        <div class="row g-0">

            <div class="col-md-4 text-center pt-4 pb-4">
                <img src="<?php echo $data->img; ?>" class="img-fluid" alt="<?php echo $data->title; ?>">
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <h5 class="card-title">
                        <?php echo $data->title; ?>
                    </h5>
                    <p class="card-text">Autor:
                        <?php echo $data->authors; ?>
                    </p>
                    <p class="card-text">
                        <?php echo $data->description; ?>
                    </p>
                    <p class="card-text">
                        <small class="text-muted">
                            ISBN:
                            <?php echo $data->isbn; ?>
                            , stron:
                            <?php echo $data->pages; ?>
                            , data publikacji:
                            <?php echo $data->publish_date; ?>
                            , wersja:
                            <?php echo ($data->type == '0') ? 'elektroniczna' : 'papierowa'; ?>
                        </small>
                    </p>

                </div>
            </div>
        </div>
        <div class="card-footer">
            <div class="row">

                <?php
                if (session()->has('user')) {
                    if ($data->type == '0') {
                        echo '<div class="col-md-6 card-text">
                                    <a href="' . base_url('bookPDF/') . $data->book_id . '" target="_blank" 
                                    rel="noopener noreferrer" type="button" class="btn btn-success">
                                    Pobierz książkę w formacie PDF z&nbsp;naniesionymi informacjami personalnymi
                                    </a>
                              </div>';
                    } else {
                        ?>

                        <div class="col-md-6 card-text">

                            <h5>Aby zamówić tę książkę, wypełnij poniższy formularz a my wyślemy ją pod wskazany
                                adres.</h5>
                            <form method="post" action="<?= base_url("order"); ?>">
                                <input type="hidden" name="user_id" value="<?= session()->get('user')->id; ?>">
                                <input type="hidden" name="book_id" value="<?= $data->book_id; ?>">
                                <button type="submit" class="btn btn-primary">Zamawiam</button>
                            </form>

                            <?php
                            //data for recommendation
                            $book_id = session()->get('user')->id;
                            if(isset($data->id))
                            $user_id = $data->id;
                            ?>
                        </div>

                        <?php } ?>
                        <div class="col-md-6">
                            <div class="container">
                                <form method="post" action="<?= base_url("recommendation"); ?>">
                                    <div class="row">
                                        <div class="col"><h5>Oceń książkę</h5></div>
                                    </div>
                                    <div class="row">
                                        <div class="col mb-3 text-center">
                                            <input type="hidden" name="user_id" value="<?= session()->get('user')->id; ?>">
                                            <input type="hidden" name="book_id" value="<?= $data->book_id; ?>">
                                            <select name="score" class="form-control">
                                                <option value="1.0">Gorąco polecam</option>
                                                <option value="0.66">Warto przeczytać</option>
                                                <option value="0.33">Nie jest zła, ale to nie dla mnie</option>
                                                <option value="0">Stanowczo odradzam</option>
                                            </select>

                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <button type="submit" class="btn btn-primary">Oceń</button>
                                        </div>
                                    </div>

                                </form>
                            </div>
                        </div>
                        <?php


                } else {
                    echo '<button type="button" class="btn btn-primary">Aby wypożyczyć lub ocenić książkę musisz być zalogowany</button>';
                }
                ?>

            </div>
        </div>
    </div>

<?php endif; ?>