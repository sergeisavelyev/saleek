<div class="height-100">
    <div class="container-lg">
        <div class="row">
            <div class="col-3 sidebar d-none d-lg-block">
                <?php new \app\widgets\menu\Menu([
                    'tpl' => 'sidebar_menu_tpl.php',
                    'class' => 'list-group list-group-flush',
                    'cache' => '0',
                ]) ?>
            </div>
            <div class="col-9">
                <div class="row">
                    <nav aria-label="breadcrumb" class="mt-2">
                        <ol class="breadcrumb">
                            <li class='breadcrumb-item'><a href='<?php base_url() ?>'><?php __('tpl_breadcrumbs_home') ?></a></li>
                            <li class='breadcrumb-item'><?php __('wishlist_index_title') ?></li>
                        </ol>
                    </nav>
                    <?php $this->getPart('/parts/products_loop', compact('products')) ?>
                </div>
            </div>
        </div>
    </div>
</div>