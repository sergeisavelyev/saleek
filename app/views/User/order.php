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
                                <th scope="col"><?php __('user_order_product') ?></th>
                                <th scope="col"><?php __('user_order_price') ?></th>
                                <th scope="col"><?php __('user_order_count') ?></th>
                                <th scope="col"><?php __('user_order_sum') ?></th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <?php foreach ($order as $item) : ?>
                            <tbody>
                                <td><?= $item['title'] ?></td>
                                <td>₽ <?= $item['price'] ?></td>
                                <td><?= $item['qty'] ?></td>
                                <td>₽ <?= $item['sum'] ?></td>
                            </tbody>
                        <?php endforeach; ?>
                    </table>
                    <h3><?php __('user_order_details') ?></h3>
                    <table class="table cart-table">
                        <tr>
                            <td><?php __('user_order_number_order') ?></td>
                            <td><?= $order[0]['order_id'] ?></td>
                        </tr>
                        <tr>
                            <td><?php __('user_order_status_order') ?></td>
                            <td><?= __("user_order_status_{$order[0]['status']}")  ?></td>
                        </tr>
                        <tr>
                            <td><?php __('user_order_created_order') ?></td>
                            <td><?= $order[0]['created_at'] ?></td>
                        </tr>
                        <tr>
                            <td><?php __('user_order_update_order') ?></td>
                            <td><?= $order[0]['updated_at'] ?></td>
                        </tr>
                        <tr>
                            <td><?php __('user_order_note_order') ?></td>
                            <td><?= $order[0]['note'] ?></td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>