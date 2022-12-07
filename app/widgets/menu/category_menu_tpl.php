<?php if ($category['slug'] == $this->route && isset($category['children'])) : ?>
    <h1 class="text-center"><?php echo $category['title'] ?></h1>
    <hr>
    <div class="row row-cols-3">
        <?php foreach ($category['children'] as $children) : ?>
            <p><a href="<?= base_url() . "category/{$children['slug']}" ?>"><?php echo $children['title'] ?></a></p>
        <?php endforeach; ?>
    </div>
    <hr>
<?php elseif ($category['slug'] == $this->route) : ?>
    <h1 class="text-center"><?php echo $category['title'] ?></h1>
<?php endif; ?>
<?php if (isset($category['children'])) : ?>
    <?= $this->getMenuHtml($category['children']) ?>
<?php endif; ?>