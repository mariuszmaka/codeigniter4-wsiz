<div class="card">
    <div class="card-body">
        <h1>Kategorie</h1>


        <?php if ($data): ?>
            <?php foreach ($data as $row): ?>
                <div class="car d mb-3" style="width: 49%; display: inline-block;">
                    <div class="row g-0">
                        <div class="col-md-4">
                            <h5><a type="button" class="" href="<?php echo base_url('catalog/'. $row->category_id); ?>"><?php echo $row->name; ?></a></h5>
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