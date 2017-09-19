<?php if (!empty($alert)) { ?>
    <div class="alert alert-warning" role="alert"><?= $alert ?></div>
<?php } ?>
<?php if (empty($tasks)) { ?>
    <br>
    <div class="col-md-3"></div>
    <div class="col-md-6">
        <form class="form-horizontal" method="post">
            <span class="heading">АВТОРИЗАЦИЯ</span>
            <div class="form-group">
                <input type="text" class="form-control" name="user" placeholder="E-mail">
                <i class="fa fa-user"></i>
            </div>
            <div class="form-group help">
                <input type="password" class="form-control" name="pass" placeholder="Password">
                <i class="fa fa-lock"></i>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-default">УВІЙТИ</button>
            </div>
        </form>
    </div>
<?php } else { ?>
    <br>
    <table class="table table-bordered table-striped">
        <thead>
        <tr>
            <th class="text-center">Статус</th>
            <th class="text-center">І'мя</th>
            <th class="text-center">Емайл</th>
            <th class="text-center">Створено</th>
            <th></th>
        </tr>
        <tr>
            <td></td>
            <td><input type="text" id="name_search"></td>
            <td><input type="text" id="email_search"></td>
            <td><input type="text" id="date_search"></td>
            <td></td>
        </tr>
        </thead>
        <tbody>
            <?php foreach ($tasks as $task): ?>
                <tr>
                    <td>
                        <?php if ($task['status'] == null) {
                            ?>
                            <span class="label label-danger">Не виконано</span>
                        <?php } else {
                            ?>
                            <span class="label label-success">Виконано</span>
                        <?php } ?>
                    </td>
                    <td><?= $task['name'] ?></td>
                    <td><?= $task['e-mail'] ?></td>
                    <td><?= $task['Date_create'] ?></td>
                    <td><a href="#edit<?= $task['id'] ?>" class="fancybox"><i class="fa fa-pencil"
                                                                              aria-hidden="true"></i></a>
                        <a href="#viev<?= $task['id'] ?>" class="fancybox"><i class="fa fa-eye"
                                                                              aria-hidden="true"></i></a>
                        <a href="/admin?do=<?= $task['id'] ?>"><i class="fa fa-trash" aria-hidden="true"></i></a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <?php foreach ($tasks as $task): ?>
        <div class="hidden">
            <form id="viev<?= $task['id'] ?>">
                <div class="col-md-12 center-block">
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
            </form>
        </div>
        <div class="hidden">
            <form id="edit<?= $task['id'] ?>" method="post">
                <div class="col-md-12 center-block">
                    <div class="panel panel-primary">
                        <div class="panel-heading"><?= $task['name'] ?></div>
                        <div class="panel-body">
                            <img src="/public/images/tasks/<?= $task['img_url'] ?>" class="img-responsive">
                            <textarea class="form-control" rows="5" name="text"><?= $task['txt'] ?></textarea>
                            <span class="label label-info">E-mail: <?= $task['e-mail'] ?></span><br><br>
                            <span class="label label-warning">Статус:</span> <?php if ($task['status'] == null) {
                                ?>
                                <input type="checkbox" name="sucses"><span class="label label-danger"> Виконано</span>
                            <?php } else {
                                ?>
                                <input type="checkbox" name="sucses" checked>  <span
                                        class="label label-success">Виконано</span>
                            <?php } ?>
                            <input type="text" value="<?= $task['id'] ?>" name="id" hidden>
                        </div>
                    </div>
                    <div class="text-center"><input type="submit" class="btn btn-success text-center" value="Змінити">
                    </div>
                </div>
            </form>
        </div>
    <?php endforeach; ?>
<?php } ?>