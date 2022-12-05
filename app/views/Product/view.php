<div class="container-lg">
    <?php foreach ($productInfo as $product) : ?>
        <nav style="--bs-breadcrumb-divider: '';" aria-label="breadcrumb" class="mt-2">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Главная</a></li>
                <li class="breadcrumb-item active" aria-current="page">Смартфоны</li>
            </ol>
        </nav>
        <div class="row">

            <?php new app\widgets\carousel\Carousel($this->route['id']) ?>
            <!-- <div class="col-8 h-100 border">
                <div id="carouselExampleIndicators" class="carousel carousel-dark slide mb-3" data-bs-ride="true">
                    <div class="carousel-indicators">
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="3" aria-label="Slide 4"></button>
                    </div>
                    <div class="carousel-inner">
                        <div class="carousel-item carousel-product active">
                            <img src="<?php PATH ?>/public/uploads/images/smartphones/1/1.jpg" class="item " alt="...">
                        </div>
                        <div class="carousel-item carousel-product">
                            <img src="<?php PATH ?>/public/uploads/images/smartphones/1/2.jpg" class="item  " alt="...">
                        </div>
                        <div class="carousel-item carousel-product">
                            <img src="<?php PATH ?>/public/uploads/images/smartphones/1/3.jpg" class="item " alt="...">
                        </div>
                        <div class="carousel-item carousel-product">
                            <img src="<?php PATH ?>/public/uploads/images/smartphones/1/5.jpg" class="item " alt="...">
                        </div>
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
            </div> -->
            <div class="col-4 product-sidebar h-500">
                <button type="button" class="btn btn-lg btn-warning w-100 mb-2"><i class="fa-solid fa-pen"></i> <?php __('product_view_contact') ?></button>
                <button type="button" class="btn btn-lg btn-outline-secondary w-100 mb-2"><i class="fa-solid fa-heart"></i> <?php __('product_view_add_to_wishlist') ?></button>
                <button type="button" class="btn btn-lg btn-outline-secondary w-100 mb-2"><i class="fa-solid fa-phone"></i> <?php __('product_view_call') ?></button>
                <div class="seller p-3">
                    <p><?php __('product_view_about_seller') ?></p>
                    <h4 class="mb-2"><i class="fa-regular fa-user"></i> User_test</h4>
                    <div class="rating d-flex mb-2">
                        <div><?php __('product_view_about_seller_rating') ?>: 5 <i class="fa-regular fa-star"></i></div><a class="ms-2" href="">3 <?php __('product_view_about_seller_rewiev') ?></a>
                    </div>
                    <div class="mb-2"><?php __('product_view_about_seller_reg_date') ?> 17.05.2018</div>
                    <hr>
                    <div class="d-flex align-items-center justify-content-between">
                        <div><?php __('product_view_about_seller_count') ?> 4</div>
                        <button class="btn btn-lg btn-outline-secondary"><i class="fa-solid fa-plus"></i> <?php __('product_view_about_seller_subscribe') ?></button>
                    </div>
                </div>
                <div class="seller p-3 my-2">
                    <?php __('product_view_about_seller_id_ad') ?>: <?php echo h($product['id']) ?>
                </div>
            </div>
            <div class="row">
                <div class="col-8">
                    <div class="mt-3">
                        <h3><?php echo h($product['title']) ?></h3>
                        <hr>
                        <div class="d-flex">
                            <div class="col">
                                <h3 class="head-price">₽ <?php echo $product['price'] ?></h3>
                                <p><?php __('product_view_desc_appr_price') ?> $ 1258</p>
                            </div>
                            <div class="col d-inline-flex flex-column">
                                <p>[<?php __('product_view_desc_views') ?>: 13]</p>
                                <button type="button" class="w-50 btn btn-lg btn-outline-secondary mb-2"><?php __('product_view_desc_add_to_cart') ?></button>
                            </div>
                        </div>
                        <hr>
                        <div class="d-flex">
                            <!-- <p class="me-3">Осталось времени: 4 дня 12 часов</p> -->
                            <p><?php __('product_view_desc_date_add') ?>: <?php echo h($product['add_date']) ?> </p>
                            <p><i class="fa-regular fa-eye ms-2"></i> 185</p>
                        </div>
                        <div class="desc p-3 mb-3">
                            <div class="row">
                                <div class="col-6 d-flex justify-content-between">
                                    <h6><?php __('product_view_desc_brand') ?>:</h6>
                                    <p>Apple</p>
                                </div>
                                <div class="col-6 d-flex justify-content-between">
                                    <h6><?php __('product_view_desc_model') ?>:</h6>
                                    <p>13 Pro</p>
                                </div>
                                <div class="col-6 d-flex justify-content-between">
                                    <h6><?php __('product_view_desc_cond') ?>:</h6>
                                    <p>Новый</p>
                                </div>
                            </div>
                        </div>
                        <div class="desc p-3">
                            <div class="row">
                                <div class="col-12">
                                    <h6><?php __('product_view_desc') ?></h6>
                                </div>
                                <div class="col-12">
                                    <?php echo h($product['description']) ?>
                                </div>
                            </div>
                        </div>
                        <br>
                        <br>
                        <br>
                        <br>
                        <br>


                    </div>
                </div>
            </div>
            <div class="container">
                <h4><?php __('product_view_similar') ?></h4>
                <div class="row">
                    <div class="col-12 border similar mb-2">
                        <div class="row">
                            <div class="col-3">
                            </div>
                        </div>
                    </div>
                    <div class="col-12 border similar mb-2">
                        <div class="row">
                            <div class="col-3">
                            </div>
                        </div>
                    </div>
                    <div class="col-12 border similar">
                        <div class="row">
                            <div class="col-3">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <br>
            <br>
        </div>
    <?php endforeach; ?>
</div>