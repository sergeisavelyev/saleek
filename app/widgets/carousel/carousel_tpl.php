<div class="col-8 h-100 border">
    <div id="carouselExampleIndicators" class="carousel carousel-dark slide mb-3" data-bs-ride="true">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <?php foreach ($this->images as $id => $image) : ?>
                <?php if ($id == 0) continue; ?>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="<?php echo $id ?>" aria-label="Slide <?php echo $id + 1 ?>"></button>
            <?php endforeach; ?>
        </div>

        <div class="carousel-inner">
            <?php foreach ($this->images as $id => $image) : ?>
                <div class="carousel-item carousel-product <?php if ($id == 0) echo 'active' ?>">
                    <img src="<?php echo PATH . $image['image'] ?>" class="item " alt="...">
                </div>
            <?php endforeach; ?>

        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Предыдущий</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Следующий</span>
        </button>
    </div>
</div>