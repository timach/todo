<h1>Создать задачу</h1>

<form class="row g-3" method="POST">
    <input type="hidden" name="token" value="<?php echo $_SESSION['token'] ?? '' ?>">
    <input type="hidden" name="action" value="create">
    <input type="hidden" name="controller" value="tasks">

    <div class="col-md-6">
        <label for="validationDefault01" class="form-label">Имя пользователя</label>
        <input type="text" name="user_name" class="form-control" id="validationDefault01" value="Mark" required>
    </div>

    <div class="col-md-6">
        <label for="exampleInputEmail1" class="form-label">Email</label>
        <input type="email" name="email" class="form-control" id="exampleInputEmail1" value="test@test.ru" aria-describedby="emailHelp" required>
    </div>

    <div class="col-md-6">
        <label for="exampleInputText1" class="form-label">Описание задачи</label>
        <textarea class="form-control" name="task_test" aria-label="With textarea" id="" required>New task!</textarea>
    </div>
    
    <div class="col-12">
        <button class="btn btn-primary" type="submit">Сохранить</button>
    </div>
</form>