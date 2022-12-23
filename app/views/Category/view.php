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
                    <div><?php new \app\widgets\menu\Menu([
                                'tpl' => 'category_menu_tpl.php',
                                'cache' => '0',
                                'route' => $this->route['slug'],
                            ]) ?>
                    </div>
                    <div class="input-group mb-3">
                        <label class="input-group-text" for="form-select">Сортировка <i class="ms-1 fa-solid fa-arrow-down-short-wide"></i></i></label>
                        <select class="form-select" name="form-select" id="input-sort">
                            <option selected="" disabled>По умолчанию</option>
                            <option value="sort=price_desc" <?php if (isset($_GET['sort']) && $_GET['sort'] == 'price_desc') echo 'selected' ?>>По цене (сначала дороже)</option>
                            <option value="sort=price_asc" <?php if (isset($_GET['sort']) && $_GET['sort'] == 'price_asc') echo 'selected' ?>>По цене (сначала дешевле)</option>
                            <option value="sort=title_asc" <?php if (isset($_GET['sort']) && $_GET['sort'] == 'title_asc') echo 'selected' ?>>По алфавиту (А-Я)</option>
                            <option value="sort=title_desc" <?php if (isset($_GET['sort']) && $_GET['sort'] == 'title_desc') echo 'selected' ?>>По алфавиту (Я-А)</option>
                        </select>
                    </div>
                    <?php $this->getPart('/parts/products_loop', compact('products')) ?>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-3"></div>
            <div class="col-9">
                <div class="d-flex justify-content-center mt-4"><?php echo $paginationHtml ?></div>
            </div>
        </div>
    </div>
</div>