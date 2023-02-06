<div class="modal-body">
    <?php if (empty($_SESSION['cart'])) : ?>
        <h1><?php __('tpl_cart_empty') ?></h1>
    <?php else : ?>
        <table class="table table-borderless cart-table">
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
</div>
<div class="modal-footer">
    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal"><?php __('tpl_cart_continue') ?></button>
    <button id="clear-cart" type="button" class="btn btn-outline-secondary"><?php __('tpl_cart_trash') ?></button>
    <button type="button" class="btn btn-warning"><a href="cart/view"><?php __('tpl_cart_checkout') ?></a></button>
</div>