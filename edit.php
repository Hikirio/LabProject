<?php
try {
    require_once 'ConnectDb.php';
    $show = new ConnectDb();

    if ($_GET['edit_id'] ?? false) {
        $show->edit();
    }

} catch (Exception $exception) {
    echo '<pre>';
    var_dump($exception);
    die;
}
?>
<? $results = $show->getAccountInfo(); ?>
<div class="content-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <form enctype="multipart/form-data" action="edit.php" method="get">
                    <div class="form-group">
                        <label for="id">ID</label>
                        <input type="text" class="form-control" id="id" value="<?= $_GET['edit_id'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="name">Name:</label>
                        <label>
                            <input type="text" class="form-control" name="name" value="<?= $results->name ?>">
                        </label>
                    </div>
                    <div class="form-group">
                        <label for="name">Surname:</label>
                        <label>
                            <input type="text" class="form-control" name="surname" value="<?= $_GET['surname'] ?>">
                        </label>
                    </div>
                    <div class="form-group">
                        <label for="name">Photo:</label>
                        <label>
                            <input type="text" class="form-control" name="name" value="<?= $_GET['name'] ?>">
                        </label>
                    </div>


                    <form action="/">
                        <input type="hidden" value="<?= $_GET['id'] ?>" name="id">
                        <input type="hidden" value="<?= $_GET['name'] ?>" ">
                        <input type="hidden" value="<?= $_GET['surname'] ?>">
                        <input type="hidden" value="<?= $_FILES['photo'] ?>" ">
                        <button type="submit"
                        >Save
                        </button>
                    </form>
                </form>
                <a href="/">Вернуться</a>

                <?php
                print_r($_GET);
                ?>
            </div>
        </div>
