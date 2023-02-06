<div class="container-lg d-flex flex-column align-items-center mt-4 h-100">
    <form action="" class="p-5 border white neon user-action" id="login">
        <h2><?php __('user_login_welcome') ?></h2>
        <p><?php __('user_login') ?> <?php __('user_login_or') ?> <a href="/user/signup" class="text-decoration-underline"><?php __('user_login_signup') ?></a></p>
        <div class="mb-2">
            <label class="form-label"><?php __('user_login_input_email') ?></label>
            <input type="text" class="form-control" name="email" required>
        </div>
        <div class="mb-2">
            <label class="form-label"><?php __('user_login_input_password') ?></label>
            <input type="password" class="form-control" name="password" required>
        </div>
        <button type="submit" class="btn btn-outline-warning w-100 mt-3"><?php __('user_login') ?></button>
    </form>
</div>