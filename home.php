<?php
include('config.php');
include('session.php');
$userDetails = $userClass->userDetails($session_uid);
require "app/View/layout/header.php";
$news = $userNews->show($session_uid);
?>

<div class="container">
    <?php foreach ($news as $new) { ?>
        <div class="row mt-4 justify-content-center">
            <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <ul class="nav nav-pills card-header-pills">
                        <li class="nav-item">
                            <a class="nav-link" href="news.php?edit=<?php echo $new['id']; ?>">Edit</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Remove</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link disabled" href="#">Disabled</a>
                        </li>
                    </ul>
                </div>
                <div class="card-body">
                    <h5 class="card-title"><?php echo $new['name']; ?></h5>
                    <blockquote class="blockquote mb-0">
                        <p><?php echo $new['description']; ?></p>
                        <footer class="blockquote-footer">Added by <?php echo $userDetails->first_name; ?></p></footer>
                    </blockquote>
                </div>
                <div class="card-footer text-muted text-right">
                    <?php
                    echo date_format(date_create($new['created_at']), "H:i Y/m/d"); ?>
                </div>
            </div>
            </div>
         </div>
    <?php } ?>
</div>