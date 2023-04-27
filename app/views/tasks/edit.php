<h1>Редактировать задачу <?=$task->id?></h1>
<? l($task); ?>
<form class="row g-3" method="POST">
    <input type="hidden" name="token" value="<?=$csrf?>">
    <input type="hidden" name="action" value="edit">
    <input type="hidden" name="controller" value="tasks">

    <div class="col-md-6">
        <label for="validationDefault01" class="form-label">Имя пользователя</label>
        <input type="text" name="user_name" class="form-control" id="validationDefault01" value="<?=$task->user_name?>" required>
    </div>

    <div class="col-md-6">
        <label for="exampleInputEmail1" class="form-label">Email</label>
        <input type="email" name="email" class="form-control" id="exampleInputEmail1" value="<?=$task->email?>" aria-describedby="emailHelp" required>
    </div>

    <div class="col-md-6">
        <label for="exampleInputText1" class="form-label">Описание задачи</label>
        <textarea class="form-control" name="task_test" aria-label="With textarea" id="" required><?=$task->task_text?></textarea>
    </div>
    
    <div class="col-12">
        <button class="btn btn-primary" type="submit">Сохранить</button>
    </div>
</form>