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
                    <h2>Результаты по запросу "<?php echo h($search) ?>"</h2>
                    <?php $this->getPart('/parts/products_loop', compact('products')) ?>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-3"></div>
            <div class="col-9">
                <div class="d-flex justify-content-center mt-4"><?php echo $pagination ?></div>
            </div>
        </div>
    </div>
</div>