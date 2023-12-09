<div class="card">
  <div class="card-body">
    <h1>Lista książek</h1>


    <?php //var_dump($data); die();?>

    <?php if ($data): ?>
      <?php foreach ($data as $row): ?>
        <?php //print_r($row); die(); ?>
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
                  <?php echo $row->name; ?>&nbsp;
                  <?php echo $row->surname; ?>
                </p>
                <p class="card-text" style=" overflow: hidden;">
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
                    , dostepna ilość:
                    <?php echo $row->amount; ?>
                  </small>
                </p>
                <p class="card-text">
                  <a href="<?php echo base_url() . '/book/' . $row->id; ?>" class="btn btn-primary">Więcej</a>
                </p>

              </div>
            </div>
          </div>
        </div>

      <?php endforeach; ?>
    <?php endif; ?>

    <!-- Pagination -->
    <div class="d-flex justify-content-end">
      <?php $pager->links() ?>
    </div>

  </div>
</div>