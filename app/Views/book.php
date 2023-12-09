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
            <?php echo $data->name; ?>&nbsp;
            <?php echo $data->surname; ?>
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
    <p class="card-text">
            <?php
            if (session()->has('user')) {
              if ($data->type == '0') {
                echo '<button type="button" class="btn btn-success">Pobierz książkę w formacie PDF z naniesionymi informacjami personalnymi</button>';
              } else {
                ?>

              <h5>Aby zamówić tę książkę, wypełnij poniższy formularz a my wyślemy ją pod wskazany adres.</h5>
              <form>
                <div class="mb-3">
                  <label for="name" class="form-label">Imię i nazwisko</label>
                  <input type="text" class="form-control" id="name" aria-describedby="Imię i nazwisko">
                </div>
                <div class="mb-3">
                  <label for="adress" class="form-label">Adres</label>
                  <input type="text" class="form-control" id="adress" aria-describedby="Adres">
                </div>
                <div class="mb-3">
                  <label for="phone" class="form-label">Nr telefonu</label>
                  <input type="text" class="form-control" id="phone" aria-describedby="Telefon">
                </div>

                <button type="submit" class="btn btn-primary">Zamawiam</button>
              </form>

              <?php

              }

            } else {
              echo '<button type="button" class="btn btn-primary">Aby wypożyczyć musisz być zalogowany</button>';
            }
            ?>

          </p>
    </div>
  </div>
<?php endif; ?>