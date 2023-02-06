<div class="container-lg height-100">
    <div class="row">
        <h1 class="text-center"><?php __('tpl_cart') ?></h1>
        <br>
        <hr>
        <?php if (empty($_SESSION['cart'])) : ?>
            <h1><?php __('tpl_cart_empty') ?></h1>
        <?php else : ?>
            <table class="table cart-table">
                <thead>
                    <tr>
                        <th scope="col"></th>
                        <th scope="col"><?php __('tpl_cart_product') ?></th>
                        <th scope="col"><?php __('tpl_cart_price') ?></th>
                        <th scope="col"><i class="fa-solid fa-trash"></i></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($_SESSION['cart'] as $product) : ?>
                        <tr>
                            <th scope="row"><img class="" src="<?php echo h($product['img']) ?>" alt=""></th>
                            <td><?php echo h($product['title']) ?></td>
                            <td>₽ <?php echo h($product['price']) ?></td>
                            <td><a class="delete-from-cart" href="<?= base_url() . "cart/delete/?id={$product['id']}" ?>" data-id="<?php echo $product['id'] ?>"><i class="fa-solid fa-trash"></i></a></td>
                        </tr>
                    <?php endforeach; ?>
                    <tr>
                        <th scope="row"></th>
                        <td></td>
                        <td></td>
                        <td><?php __('tpl_cart_sum') ?></td>
                    </tr>
                    <tr>
                        <th scope="row"></th>
                        <td></td>
                        <td></td>
                        <td>₽ <?php echo $_SESSION['cart.sum'] ?></td>
                    </tr>
                </tbody>
            </table>
        <?php endif; ?>
        <?php if (empty($_SESSION['user'])) : ?>
            <div class="container-lg d-flex flex-column align-items-center mt-2 h-100 ">
                <form method="post" class="p-5 border white  user-action" id="signup">
                    <h2><?php __('cart_view_input_title') ?></h2>
                    <div class="mb-2">
                        <label class="form-label"><?php __('cart_view_email_input') ?></label>
                        <input type="text" class="form-control" name="email" id="email" required>
                    </div>
                    <div class="mb-2">
                        <label class="form-label"><?php __('cart_view_name_input') ?></label>
                        <input type="text" class="form-control" name="login" id="login" required>
                    </div>
                    <div class="mb-2">
                        <label class="form-label"><?php __('cart_view_password_input') ?></label>
                        <input type="password" class="form-control" name="password" id="password" required>
                    </div>
                    <button type="submit" class="btn btn-outline-warning w-100 mt-3"><?php __('cart_view_order_btn') ?></button>
                </form>
            </div>
        <?php else : ?>
        <?php endif; ?>
    </div>
</div>