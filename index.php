<?php
try {
    require_once 'ConnectDb.php';
    $show = new ConnectDb();

    if ($_GET['del_id'] ?? false) {
        $show->delete();
    }

} catch (Exception $exception) {
    echo '<pre>';
    var_dump($exception);
    die;
}

?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css"/>

<!-- Bootstrap шаблон... -->
<header>
    <h1 align="center">Laba #1</h1>
    <div align="center">
        <nav><a href="registration.php">REGISTRAION</a> <a href="login.php">LOGIN</a></nav>
    </div>
</header>
<hr>
<div align="center" class="container">
    <div class="col-sm-offset-2 col-sm-8">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h1>All Users</h1>
            </div>
            <hr>
            <div class="panel-body">
                <table align="center" class="table table-striped task-table">
                    <!-- Тело таблицы -->
                    <tbody>
                    <thead>
                    <tr>
                        <th>id</th>
                        <th>Name</th>
                        <th>Surname</th>
                        <th>Photo</th>

                        <th>Action</th>

                    </tr>
                    </thead>
                    <? $results = $show->getAccountInfo(); ?>
                    <? foreach ($results

                    as $value) : ?>

                    <tr>
                        <!-- Имя задачи -->
                        <td class="table-text">
                            <div><?= $value->id ?></div>
                        </td>

                        <td class="table-text">
                            <div><?= $value->name ?></div>
                        </td>
                        <td class="table-text">
                            <div><?= $value->surname ?></div>
                        </td>
                        <td class="table-text">
                            <div><?= $value->photo ?></div>
                        </td>
                        <!-- Task Delete Button -->

                        <td><a href="index.php?del_id=<?= $id = $value->id ?>">DELETE </a></td>
                        <td><a href="edit.php?edit_id=<?= $id = $value->id ?>">Edit</a></td>
                        <!--                            <td><a href="edit.php?id=-->
                        <? //= $id = $value->id ?><!--">Edit </a>-->


                        <? endforeach ?>

                </table>
                <hr>
            </div>
        </div>
    </div

