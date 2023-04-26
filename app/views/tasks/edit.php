<form class="row g-3">
  <div class="col-md-3">
    <label for="validationDefault01" class="form-label">Имя пользователя</label>
    <input type="text" class="form-control" id="validationDefault01" value="Mark" required>
  </div>
  <div class="col-md-3">
    <label for="exampleInputEmail1" class="form-label">Email</label>
    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
  </div>
  
  <div class="col-md-3">
    <label for="validationDefault04" class="form-label">Статус</label>
    <select class="form-select" id="validationDefault04" required>
        <option value="0">Не выполнено</option>
        <option value="1">Выполнено</option>
    </select>
  </div>

  <div class="col-md-3">
    <label for="exampleInputEmail1" class="form-label">Описание задачи</label>
    <textarea class="form-control" aria-label="With textarea" id=""></textarea>
  </div>
  <div class="col-12">
    <button class="btn btn-primary" type="submit">Сохранить</button>
  </div>
</form>