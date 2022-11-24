<?php foreach ($products as $product) : ?>
    <div class="col-lg-4 col-sm-6 mb-3 px-1">
        <div class="product p-2">
            <a href="">
                <img src="<?= PATH . $product['img'] ?>" class="img img-fluid mb-2" alt="#">
                <h6 class="card-title my-2"><?= $product['title'] ?></h6>
                <div class="product-info d-flex">
                    <div class="d-flex flex-column">
                        <div class="price my-1">₽<?= $product['price'] ?></div>
                        <div class="price">$185</div>
                    </div>
                    <div class="d-flex flex-column">
                        <p class="price my-1">5 ставок</p>
                        <p class="price">До конца: 54ч 23м</p>
                    </div>
                </div>
            </a>
        </div>
    </div>
<?php endforeach; ?>