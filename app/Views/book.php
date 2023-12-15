<?php if ($data): ?>


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
                <div class="col-md-6 card-text">
                    <?php
                    if (session()->has('user')) {
                        if ($data->type == '0') {
                            echo '<a href="' . base_url('bookPDF/') . $data->book_id . '" target="_blank" rel="noopener noreferrer" type="button" class="btn btn-success">Pobierz książkę w formacie PDF z naniesionymi informacjami personalnymi</a>';
                        } else {
                            ?>

                            <h5>Aby zamówić tę książkę, wypełnij poniższy formularz a my wyślemy ją pod wskazany
                                adres.</h5>
                            <form method="post" action="<?= base_url("order"); ?>">
                                <input type="hidden" name="user_id" value="<?= session()->get('user')->id; ?>">
                                <input type="hidden" name="book_id" value="<?= $data->book_id; ?>">
                                <button type="submit" class="btn btn-primary">Zamawiam</button>
                            </form>

                            <?php

                        }

                    } else {
                        echo '<button type="button" class="btn btn-primary">Aby wypożyczyć musisz być zalogowany</button>';
                    }
                    ?>
                </div>
                <div class="col-md-6">
                        <div class="container">
                            <div class="row"><div class="col"><h5>Oceń książkę</h5></div></div>
                            <div class="row"><div class="col mb-3 text-center">
                                    <select class="form-control" id="exampleFormControlSelect1">
                                        <option value="1">Polecam</option>
                                        <option value="2">Nie polecam</option>

                                    </select>
                                </div></div>
                            <div class="row"><div class="col"><button type="button" class="btn btn-primary">Oceń</button></div>
                            </div>

                            </div>
                        </div>



                </div>
            </div>
        </div>
    </div>
<?php endif; ?>