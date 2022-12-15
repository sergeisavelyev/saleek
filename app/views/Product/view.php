<div class="container-lg">
    <?php foreach ($productInfo as $product) : ?>
        <nav aria-label="breadcrumb" class="mt-2">
            <ol class="breadcrumb">
                <?= $breadcrumbs ?>
            </ol>
        </nav>
        <div class="row">

            <?php new app\widgets\carousel\Carousel($this->route['id']) ?>

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
                        <div class="my-2" id="cart-info">

                        </div>
                        <h3><?php echo h($product['title']) ?></h3>
                        <hr>
                        <div class="d-flex">
                            <div class="col">
                                <h3 class="head-price">₽ <?php echo $product['price'] ?></h3>
                                <p><?php __('product_view_desc_appr_price') ?> $ 1258</p>
                            </div>
                            <div class="col d-inline-flex flex-column">
                                <p>[<?php __('product_view_desc_views') ?>: 13]</p>
                                <a href="<?= base_url() . "cart/add/?id={$product['id']}" ?>" id="add-to-cart" data-id="<?php echo $product['id'] ?>">
                                    <button type="button" class="w-50 btn btn-lg btn-outline-secondary mb-2">
                                        <?php __('product_view_desc_add_to_cart'); ?>
                                    </button>
                                </a>
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