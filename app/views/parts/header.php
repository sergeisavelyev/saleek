<!DOCTYPE html>
<html lang="en">

<head>
    <base href="/">
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
                        Привет! <a href="">Войти</a> или <a href="">Зарегистрироваться</a>
                    </div>
                    <div class="col-5 d-none d-lg-block">
                        <div class="row justify-content-end">
                            <div class="col-4 nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    Мой Saleek</i>
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
                            <div class="col-4"><i class="fa-solid fa-heart"></i> Список желаний</div>
                            <div class="col-4"><i class="fa-solid fa-cart-shopping"></i> Корзина</div>
                        </div>
                    </div>
                    <div class="col-5 d-lg-none">
                        <nav class="navbar navbar-light light-blue lighten-4">
                            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                                <span class="navbar-toggler-icon"></span>
                            </button>
                            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                                <ul class="navbar-nav mr-auto">
                                    <li class="nav-item active">
                                        <div class="col-4 nav-item dropdown">
                                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                Мой Saleek</i>
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
                                    </li>
                                    <li class="nav-item">
                                        <div class="col-4"><i class="fa-solid fa-heart"></i> Список желаний</div>
                                    </li>
                                    <li class="nav-item">
                                        <div class="col-4"><i class="fa-solid fa-cart-shopping"></i> Корзина</div>
                                    </li>
                                </ul>
                            </div>
                        </nav>
                    </div>
                </div>
            </div>
        </div>

        <nav class="navv bg-light p-2 d-flex align-items-center">
            <div class="container-lg">
                <div class="row align-items-center">
                    <div class="col-lg-2 col-sm-5">
                        <a class="logo" href="#">
                            <img src="<?= PATH ?>/assets/icon.png" alt="" width="40" height="45" class="mb-2 me-2">
                            Saleek
                        </a>
                    </div>
                    <div class="col-lg-3 col-sm-7">
                        <select class="form-select" aria-label="Пример выбора по умолчанию">
                            <option selected>Поиск по категории</option>
                            <option value="1">Один</option>
                            <option value="2">Два</option>
                            <option value="3">Три</option>
                        </select>
                    </div>
                    <div class="col-lg-7 col">
                        <form class="d-flex search" role="search">
                            <input class="form-control me-2" type="search" placeholder="Поиск" aria-label="Поиск">
                            <button class="btn btn-outline-warning" type="submit">Поиск</button>
                        </form>
                    </div>
                </div>
            </div>
        </nav>
    </header>