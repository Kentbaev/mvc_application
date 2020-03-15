<?php require_once 'header.php'; ?>

<div class="user_auth">
    <form class="form-signin" method="post" action="<?=HOST;?>user/auth">
        <div class="text-center mb-4">
            <img class="mb-4" src="/docs/4.4/assets/brand/bootstrap-solid.svg" alt="" width="72" height="72">
            <h1 class="h3 mb-3 font-weight-normal">CRM</h1>
            <p>Автоматизация Бизнеса</a></p>
        </div>
        <?=$_COOKIE['errors'] ?? ''; ?>
        <?=$pageData['er'] ?? ''; ?>
        <div class="form-label-group">
            <input class="form-control user" name="user" type="text" placeholder="Введите логин">
        </div>
        <div class="form-label-group">
            <input class="form-control password" name="password" type="text" placeholder="Введите пароль">
        </div>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Войти</button>
        <p class="mt-5 mb-3 text-muted text-center">&copy; 2017-2020</p>
    </form>
</div>

<?php require_once 'footer.php'; ?>