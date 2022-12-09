<footer class="py-3 mt-4 ">
    <ul class="nav justify-content-center border-bottom pb-3 mb-3 text-light">
        <li class="nav-item"><a href="#" class="nav-link px-2 text-light">Главная</a></li>
        <li class="nav-item"><a href="#" class="nav-link px-2 text-light">Информация</a></li>
        <li class="nav-item"><a href="#" class="nav-link px-2 text-light">Контакты</a></li>
        <li class="nav-item"><a href="#" class="nav-link px-2 text-light">Ответы и вопросы</a></li>
        <li class="nav-item"><a href="#" class="nav-link px-2 text-light">О нас</a></li>
    </ul>
    <p class="text-center text-light">© 2021 Saleek</p>
</footer>

<!-- Модальное окно -->
<div class="modal fade" id="cart-modal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Корзина</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Закрыть"></button>
            </div>
            <div class="modal-cart-content">

            </div>
        </div>
    </div>
</div>

<script>
    const PATH = '<?= PATH ?>';
</script>
<script src="https://kit.fontawesome.com/d75bf2db6b.js" crossorigin="anonymous"></script>
<script src="<?= PATH ?>/assets/js/jquery.js"></script>
<script src="<?= PATH ?>/assets/js/main.js"></script>
<script src="<?= PATH ?>/assets/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>

</html>