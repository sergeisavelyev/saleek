<div class="container-lg d-flex flex-column align-items-center mt-2 height-100">
    <form method="post" class="p-5 border white neon user-action" id="signup">
        <h2><?php __('user_signup_welcome') ?></h2>
        <p><?php __('user_signup_btn') ?> <?php __('user_signup_or') ?> <a href="/user/login" class="text-decoration-underline"><?php __('user_signup_login_btn') ?></a></p>
        <div class="mb-2">
            <label class="form-label"><?php __('tpl_user_signup_input_email') ?></label>
            <input type="text" class="form-control" name="email" id="email" required>
        </div>
        <div class="mb-2">
            <label class="form-label"><?php __('tpl_user_signup_input_login') ?></label>
            <input type="text" class="form-control" name="login" id="login" required>
        </div>
        <div class="mb-2">
            <label class="form-label"><?php __('tpl_user_signup_input_password') ?></label>
            <input type="password" class="form-control" name="password" id="password" required>
        </div>
        <button type="submit" class="btn btn-outline-warning w-100 mt-3"><?php __('user_signup_btn') ?></button>
    </form>
</div>