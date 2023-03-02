<div class="height-100">
    <div class="container-lg">
        <div class="row">
            <nav aria-label="breadcrumb" class="mt-2">
                <ol class="breadcrumb">
                    <li class='breadcrumb-item'><a href='<?php base_url() ?>'><?php __('tpl_breadcrumbs_home') ?></a></li>
                    <li class='breadcrumb-item'><?php __('tpl_profile_orders') ?></li>
                </ol>
            </nav>
            <div class="col-3 sidebar d-none d-lg-block">
                <ul class="list-group list-group-flush ">
                    <li class="list-group-item height-100">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item"><a href="<?php base_url() ?> user/orders">Покупки</a></li>
                            <li class="list-group-item"><a href="<?php base_url() ?> wishlist">Список желаний</a></li>
                            <li class="list-group-item"><a href="<?php base_url() ?> user/data">Учетные данные</a></li>
                            <li class="list-group-item"><a href="<?php base_url() ?> user/logout">Выйти</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
            <div class="col-9">
                <div class="row">
                    <table class="table cart-table">
                        <thead>
                            <tr>
                                <th scope="col"><?php __('user_orders_number_order') ?></th>
                                <th scope="col"><?php __('user_orders_status_order') ?></th>
                                <th scope="col"><?php __('user_orders_price_order') ?></th>
                                <th scope="col"><?php __('user_orders_created_order') ?></th>
                                <th scope="col"><?php __('user_orders_update_order') ?></th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($orders as $order) : ?>
                                <tr>
                                    <td><?= h($order['id']) ?></td>
                                    <td><?= __("user_orders_status_{$order['status']}") ?></td>
                                    <td>₽ <?= $order['total'] ?></td>
                                    <td><?= $order['created_at'] ?></td>
                                    <td><?= $order['updated_at'] ?></td>
                                    <td><a href="<?= base_url() . "user/order/?id={$order['id']}" ?>" data-id="<?php echo $order['id'] ?>"><i class="fa-solid fa-eye"></i></a></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>