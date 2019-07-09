<?php
include('config.php');
include('session.php');
require "app/View/layout/header.php";

if (isset($_GET['edit'])) {
    $updateNews = $userNews->show($_SESSION['id'],$_GET['edit']);
    //$_SESSION['news'] = $_GET['edit'];
}

?>
<div class="container">
    <div class="row">
        <div class="col-md-offset-4 col-md-8">
            <form action="submit.php" method="post">
                <div class="form-group">
                    <input name="title" type="name" class="form-control" id="exampleFormControlInput1"
                           placeholder="Add Tittle and remember to attract attention!" value="<?php
                    if(isset($updateNews)) {
                        echo $updateNews[0]['name'];
                    }
                    ?>">
                </div>
                <div class="form-group">
                    <textarea name="description" class="form-control" id="exampleFormControlTextarea1" rows="10" placeholder="Write something not stupid"><?php
                    if (isset($updateNews)) {
                        echo $updateNews[0]['description'];
                    }?></textarea>
                </div>
                <div class="form-group">
                    <div class="form-check">
                        <?php if (isset($updateNews) && $updateNews[0]['is_active'] == 1) { ?>
                            <input class="form-check-input" type="checkbox" id="gridCheck" name="active" checked>
                        <?php } else {?>
                            <input class="form-check-input" type="checkbox" id="gridCheck" name="active">
                        <?php }?>

                        <label class="form-check-label" for="gridCheck">
                            Active
                        </label>
                    </div>
                </div>
                    <?php if (isset($updateNews)) { ?>
                        <button type="submit" class="btn btn-primary" name="newsUpdateSubmit" value="Signup">Update</button>
                    <?php } else {?>
                        <button type="submit" class="btn btn-primary" name="newsSubmit" value="Signup">Save</button>
                    <?php }?>
            </form>
        </div>
    </div>
</div>
