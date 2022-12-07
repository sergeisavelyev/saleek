<li class="<?php if (isset($category['children'])) echo 'sub-menu'; ?>">
    <a href="<?= base_url() . "category/{$category['slug']}" ?>" class="<?php if ($category['parent_id']) echo 'sub-' ?>menu-link"> <?php echo $category['title'] ?><?php if (isset($category['children'])) echo '&#187;'; ?></a>
    <?php if (isset($category['children'])) : ?>
        <ul class="sub-menu-list">
            <?= $this->getMenuHtml($category['children']); ?>
        </ul>
    <?php endif; ?>
</li>