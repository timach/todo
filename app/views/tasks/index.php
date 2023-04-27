<h1>Список задач</h1>

<?php 
  function getOrderType($colName, $order, $order_type, $html=false)
  {

    if($colName != $order){
      if($html) return '';
      return 'ASC';
    }

    if($order_type == 'ASC'){
      if($html) return '&#8595;';
      return 'DESC';
    }else{
      if($html) return '&#8593;';
      return 'ASC';
    }
  }
?>

<table class="table">
  <thead>
    <tr>
      <th scope="col"><a href="?order=id&order_type=<?=getOrderType('id', $order, $order_type)?>"># <?=getOrderType('id', $order, $order_type, true)?></a></th>
      <th scope="col"><a href="?order=user_name&order_type=<?=getOrderType('user_name', $order, $order_type)?>">Имя пользователя <?=getOrderType('user_name', $order, $order_type, true)?></a></th>
      <th scope="col"><a href="?order=email&order_type=<?=getOrderType('email', $order, $order_type)?>">Email <?=getOrderType('email', $order, $order_type, true)?></a></th>
      <th scope="col">Текст задачи</th>
      <th scope="col"><a href="?order=status&order_type=<?=getOrderType('status', $order, $order_type)?>">Статус <?=getOrderType('status', $order, $order_type, true)?></a></th>
      <?php if($isAdmin){ ?>
        <th scope="col">Действия админа</th>
      <?php } ?>
    </tr>
  </thead>
  <tbody>
    <?php foreach($tasks as $task){ ?>
    <tr>
      <th scope="row"><?=$task->id?></th>
      <td><?=$task->user_name?></td>
      <td><?=$task->email?></td>
      <td class="text-justify"><?=$task->task_text?></td>
      <td><?php if(!$task->status){ echo "&#10003;"; } ?> <?php if($task->edited){ echo "&#9998;"; } ?></td>
      <?php if($isAdmin){ ?>
      <td>
        <a href="?controller=tasks&action=edit&id=<?=$task->id?>" class="btn btn-primary">&#9998;</a>
        <?php if($task->status){ ?><a href="?controller=tasks&action=success&id=<?=$task->id?>" class="btn btn-success">&#10003;</a><?php } ?>
      </td>
      <?php } ?>
    </tr>
    <?php } ?>
  </tbody>
</table>

<nav aria-label="Page navigation example">
  <ul class="pagination">
    <?php for ($pageNum = 1; $pageNum <= ceil($count/3); $pageNum++): ?>
      <li class="page-item">
        <a href="?page=<?=$pageNum?>&order=<?=$order?>&order_type=<?=$order_type?>" class="page-link <?= $pageNum == $page ? 'active' : '' ?>"><?= $pageNum ?></a>
      </li>
    <?php endfor; ?>
  </ul>
</nav>