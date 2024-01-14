<div class="card">
    <div class="card-body">
        <form method="get" action="<?= base_url("search"); ?>">
            <h1>Wyszukiwanie</h1>

            <div class="input-group mb-3">
                <form>
                    <input id="search" name="search" type="text" class="form-control" placeholder="<?php echo (isset($_GET['search']))?$_GET['search'] : 'Szukaj';?>" />
                    <input type="submit" value="Szukaj" class="btn btn-primary" />
                </form>
            </div>
        </form>
    </div>

    <?php if (isset($data)): ?>
    <div class="card-body">

        <?php

        ?>
        <?php foreach ($data as $row): ?>


                <div class="card mb-3" style="width: 49%; display: inline-block;">
                <div class="row g-0">
                    <div class="col-md-4">
                    <img src="<?php echo $row->img; ?>" class="img-fluid rounded-start" alt="<?php echo $row->title; ?>">
                    </div>
                    <div class="col-md-8">
                    <div class="card-body">
                        <h5 class="card-title">
                        <?php echo $row->title; ?>
                        </h5>
                        <p class="card-text">Autor:
                        <?php //echo $row->name; ?>&nbsp;
                        <?php //echo $row->surname; ?>
                        </p>
                        <p class="card-text">
                        <?php echo $row->description; ?>
                        </p>
                        <p class="card-text">
                        <small class="text-muted">
                            ISBN:
                            <?php echo $row->isbn; ?>
                            , stron:
                            <?php echo $row->pages; ?>
                            , data publikacji:
                            <?php echo $row->publish_date; ?>
                        </small>
                        </p>
                        <p class="card-text">
                        <a href="<?php echo base_url() . '/book/' . $row->book_id; ?>" class="btn btn-primary">Więcej</a>
                        </p>

                    </div>
                    </div>
                </div>

                </div>

                <?php endforeach; ?>
        <div class="d-flex justify-content-end">
            <?php echo($pager_links);  ?>
        </div>
    </div>
    <?php endif; ?>
</div>