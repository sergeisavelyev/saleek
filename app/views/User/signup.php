<div class="container-lg d-flex flex-column align-items-center mt-2 h-100 ">
    <form method="post" class="p-5 border white neon user-action" id="signup">
        <h2>Добро пожаловать!</h2>
        <p>Зарегистрироваться или <a href="/user/login" class="text-decoration-underline">войти в аккаунт</a></p>
        <div class="mb-2">
            <label class="form-label">Адрес электронной почты</label>
            <input type="text" class="form-control" name="email" id="email">
        </div>
        <div class="mb-2">
            <label class="form-label">Имя пользователя</label>
            <input type="text" class="form-control" name="login" id="login">
        </div>
        <div class="mb-2">
            <label class="form-label">Пароль</label>
            <input type="password" class="form-control" name="password" id="password">
        </div>
        <button type="submit" class="btn btn-outline-warning w-100 mt-3">Войти</button>
    </form>
</div>