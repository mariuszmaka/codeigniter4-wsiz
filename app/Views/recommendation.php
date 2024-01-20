
<div class="card">
  <div class="card-body">
    <h1>Rekomendacje (na podstawie Twoich ocen)</h1>


    <?php if ($data): ?>
      <?php foreach ($data as $row): ?>
        <div class="card mb-3" style="width: 49%; display: inline-block;">

          <div class="row g-0">
            <div class="col-md-4">
              <img src="<?php echo $row['book']->img; ?>" class="img-fluid rounded-start" alt="<?php echo $row['book']->title; ?>">
            </div>
            <div class="col-md-8">
              <div class="card-body">
                <h5 class="card-title">
                  <?php echo $row['book']->title; ?>
                </h5>
                <p class="card-text">Autor:
                  <?php   ?>&nbsp;
                  <?php //echo $row->surname; ?>
                </p>
                <p class="card-text" style=" overflow: hidden;">
                  <?php echo $row['book']->description; ?>
                </p>
                <p class="card-text">
                  <small class="text-muted">
                    ISBN:
                    <?php echo $row['book']->isbn; ?>
                    , stron:
                    <?php echo $row['book']->pages; ?>
                    , data publikacji:
                    <?php echo $row['book']->publish_date; ?>
                    , dostepna ilość:
                    <?php echo $row['book']->amount; ?>
                  </small>
                </p>
                <p class="card-text">
                  <a href="<?php echo base_url() . 'book/' . $row['book']->book_id; ?>" class="btn btn-primary">Więcej</a>
                  <a href="<?php echo base_url() . 'book/' . $row['book']->book_id; ?>" class="btn btn-success"><?=$row['score'];?></a>
                </p>

              </div>
            </div>
          </div>
        </div>

      <?php endforeach; ?>
    <?php endif; ?>

    <!-- Pagination -->
    <div class="d-flex justify-content-end">
 
    </div>

  </div>
</div>