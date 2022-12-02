<?php if (isset($category['children'])) : ?>
    <li class="list-group-item">
        <h2><a href=""><?php echo $category['title'] ?></a></h2>
        <ul class="list-group list-group-flush">
            <?= $this->getMenuHtml($category['children']) ?>
        </ul>
    </li>
<?php else : ?>
    <li class="list-group-item"><a href=""><?php echo $category['title'] ?></a></li>
<?php endif; ?>