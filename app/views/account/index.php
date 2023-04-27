<div class="col-md-offset-3 col-md-6">
    <?php if(!$isAdmin){?>
    <form method="POST">
        <input type="hidden" name="token" value="<?=$csrf?>">
        <div class="mb-3">
            <label for="validationTooltipUsername" class="form-label">Логин</label>
            <div class="input-group has-validation">
                <span class="input-group-text" id="validationTooltipUsernamePrepend">@</span>
                <input type="text" name="login" class="form-control" id="validationTooltipUsername" aria-describedby="validationTooltipUsernamePrepend" required>
            </div>
        </div>

        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Пароль</label>
            <input type="password" name="password" class="form-control" id="exampleInputPassword1">
        </div>

        <button type="submit" class="btn btn-primary">Войти</button>
    </form>
    <?php }else{ ?>
        <div class="mb-3">Вы вошли администратор <a href="/?controller=account&action=logout" class="btn btn-primary">Выйти</a></div>
    <?php } ?>
</div>
