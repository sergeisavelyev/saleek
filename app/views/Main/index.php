<div class="container-lg">
    <div id="carouselExampleFade" class="carousel slide carousel-fade mb-3" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="<?= PATH . '/public/uploads/images/carousel/1.jpg' ?>" class="d-block w-100" alt="#">
            </div>
            <div class="carousel-item">
                <img src="<?= PATH . '/public/uploads/images/carousel/2.jpg' ?>" class="d-block w-100" alt="#">
            </div>
            <div class="carousel-item">
                <img src="<?= PATH . '/public/uploads/images/carousel/3.jpg' ?>" class="d-block w-100" alt="#">
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Предыдущий</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Следующий</span>
        </button>
    </div>
    <div class="row">
        <div class="col-3 sidebar d-none d-lg-block">
            <?php new \app\widgets\menu\Menu([
                'tpl' => 'sidebar_menu_tpl.php',
                'class' => 'list-group list-group-flush',
                'cache' => '0',
            ]) ?>
        </div>
        <div class="col-lg-9">
            <a href="" class="d-flex align-items-baseline my-2">
                <h2>Электроника & смартфоны</h2>
                <div class="mx-1">смотреть больше </div><i class="fa-solid fa-arrow-right"></i>
            </a>
            <div class="row">
                <?php $this->getPart('parts/products_loop', compact('products')); ?>
            </div>

            <a href="" class="d-flex align-items-baseline my-2">
                <h2>Авто и мото</h2>
                <div class="mx-1">смотреть больше </div><i class="fa-solid fa-arrow-right"></i>
            </a>
            <div class="row">
                <?php $this->getPart('parts/products_loop', compact('products')); ?>
            </div>
        </div>
    </div>
</div>