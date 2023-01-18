<!DOCTYPE html>
<html lang="en">

<head>
    <base href="<?= base_url() ?>">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@100;300;400;600;700;900&family=Rubik:wght@300;400;500;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?= PATH ?>/assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= PATH ?>/assets/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="<?= PATH ?>/assets/css/main.css">
    <link rel="icon" sizes="32x32" href="<?= PATH ?>/assets/icon.png">
    <?= $this->getMeta(); ?>
</head>

<body>
    <header>
        <div class="top-header">
            <div class="container-lg">
                <div class="row justify-content-between">
                    <div class="col-4">
                        <?php __('tpl_hello') ?>! <a href="user/login"><?php __('tpl_login') ?></a> <?php __('tpl_or') ?> <a href="user/signup"><?php __('tpl_signup') ?></a>
                    </div>
                    <div class="col-6 d-none d-lg-block">
                        <div class="d-flex justify-content-end">
                            <div class="ms-3 nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    <?php __('tpl_profile') ?>
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <li><a class="dropdown-item" href="#">Действие</a></li>
                                    <li><a class="dropdown-item" href="#">Другое действие</a></li>
                                    <li>
                                        <hr class="dropdown-divider">
                                    </li>
                                    <li><a class="dropdown-item" href="#">Что-то еще здесь</a></li>
                                </ul>
                            </div>
                            <div class="">
                                <?php new \app\widgets\language\Language(); ?>
                            </div>
                            <div class="ms-3"><i class="fa-solid fa-heart"></i> <?php __('tpl_wishlist') ?></div>
                            <div class="ms-3"><a href="<?= base_url() . "cart/show" ?>" id="cart-show" data-bs-toggle="modal" data-bs-target="#cart-modal"><i class="fa-solid fa-cart-shopping"></i> <?php __('tpl_cart') ?></a></div>
                        </div>
                    </div>
                    <div class="col-5 d-lg-none d-flex justify-content-end">
                        <nav class="navbar navbar-light light-blue lighten-4">
                            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                                <span class="navbar-toggler-icon"></span>
                            </button>
                            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                                <ul class="navbar-nav mr-auto">
                                    <li class="nav-item active">
                                        <div class="col-4 nav-item dropdown">
                                            <a class="nav-link dropdown-toggle" href="" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                Мой Saleek</i>
                                            </a>
                                            <ul class="dropdown-menu " aria-labelledby="navbarDropdown">
                                                <li><a class="dropdown-item" href="#">Действие</a></li>
                                                <li><a class="dropdown-item" href="#">Другое действие</a></li>
                                                <li>
                                                    <hr class="dropdown-divider">
                                                </li>
                                                <li><a class="dropdown-item" href="#">Что-то еще здесь</a></li>
                                            </ul>
                                        </div>
                                    </li>
                                    <li class="nav-item">
                                        <div class="col-4"><i class="fa-solid fa-heart"></i> Список желаний</div>
                                    </li>
                                    <li class="nav-item">
                                        <div class="col-4"><a href="" data-bs-toggle="modal" data-bs-target="#cart-modal"><i class="fa-solid fa-cart-shopping"></i> Корзина</a></div>
                                    </li>
                                </ul>
                            </div>
                        </nav>
                    </div>
                </div>
            </div>
        </div>

        <nav class="navv bg-light p-2 d-flex align-items-center menu">
            <div class="container-lg">
                <div class="row align-items-center">
                    <div class="col-lg-2 col-sm-5">
                        <a class="logo" href="<?= base_url() ?>">
                            <img src="<?= PATH ?>/assets/icon.png" alt="" width="40" height="45" class="mb-2 me-2">
                            Saleek
                        </a>
                    </div>
                    <div class="col-lg-3 col-sm-7">
                        <button class="category btn btn-outline-secondary " id="dropdown-menu"><?php __('tpl_search_category') ?></button>
                        <div class="drop-menu">
                            <div class="container-lg">
                                <?php new \app\widgets\menu\Menu([
                                    'cache' => '0',
                                ]); ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-7 col">
                        <form class="d-flex search" role="search" action="search">
                            <input class="form-control me-2" id="livesearch" name="search" placeholder="<?php __('tpl_search') ?>" aria-label="Поиск">
                            <button class="btn btn-outline-warning" type="submit"><?php __('tpl_search') ?></button>
                        </form>
                        <div id="drop-livesearch" class="drop-livesearch">
                            <div class="container-lg">
                                <div id="search-result"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </nav>
    </header>