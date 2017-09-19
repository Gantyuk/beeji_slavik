<?php
if (!empty($alert)):?>
    <h3><?= $alert; ?></h3>
    <?php
endif;
?>
<br>
<form action="/">
    <select name="order" class="btn btn-success">
        <option selected="selected" hidden><?= $select ?></option>
        <option value="name">Ім'я</option>
        <option value="e-mail">Емайл</option>
        <option value="status">Статус</option>
    </select>
    <input class="btn btn-primary" type="submit" value="сортувати">
</form><br>
<div class="center-block">
    <?php foreach ($tasks as $task): ?>
        <div class="col-md-4 center-block">
            <div class="panel panel-primary">
                <div class="panel-heading"><?= $task['name'] ?></div>
                <div class="panel-body">
                    <img src="/public/images/tasks/<?= $task['img_url'] ?>" class="img-responsive">
                    <p><?= $task['txt'] ?></p>
                    <span class="label label-info">E-mail: <?= $task['e-mail'] ?></span><br><br>
                    <span class="label label-warning">Статус:</span> <?php if ($task['status'] == null) {
                        ?>
                        <span class="label label-danger">Не виконано</span>
                    <?php } else {
                        ?>
                        <span class="label label-success">Виконано</span>
                    <?php } ?>
                </div>
            </div>
        </div>
    <?php endforeach; ?>

</div>
<div class="text-center marg_botom navbar-fixed-bottom">
    <nav aria-label="Page navigation">
        <ul class="pagination">
            <?php for ($page = 1; $page <= $number_of_pages; $page++) { ?>
                <li><a href="/?page=<?= $page ?>&order=<?= $order ?>"><?= $page ?></a></li>
            <?php } ?>
        </ul>
    </nav>
</div>