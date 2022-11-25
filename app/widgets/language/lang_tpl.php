<div class="ms-3 dropdown">
    <a class="nav-link dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
        <i class="fa-solid fa-globe"></i> <?= core\App::$app->getProperty('language')['title']; ?>
    </a>
    <ul class="dropdown-menu" id="languages">
        <?php foreach ($this->languages as $k => $v) : ?>
            <?php if ($k == core\App::$app->getProperty('language')['code']) continue; ?>
            <li><a class="dropdown-item" data-langcode="<?= $k ?>" href="#"><?= $v['title'] ?></a></li>
        <?php endforeach; ?>
    </ul>
</div>