<?php

require_once '../../Controllers/Election_controllers.php';
$election = new Election_controller;
$elections=$election->getElections();




?>


<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>E-Voting</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic">
    <link rel="stylesheet" href="assets/fonts/fontawesome-all.min.css">
    <link rel="stylesheet" href="assets/fonts/simple-line-icons.min.css">
    <link rel="stylesheet" href="assets/css/Footer-Basic.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
    <link rel="stylesheet" href="assets/css/Team-Boxed.css">
    <link rel="stylesheet" href="assets/css/untitled.css">
</head>

<body>
    <nav class="navbar navbar-light navbar-expand-md navigation-clean-search" style="background-color: #cccccc;">
        <div class="container"><a class="navbar-brand" href="#">E-Voting</a><button class="navbar-toggler" data-toggle="collapse"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button><a class="btn btn-light action-button" role="button"
                href="Elections%20List.html" style="background-color: 0,123,255;">Home</a>
            <div class="input-group" style="width: 345px;"><input class="bg-light border rounded border-primary form-control-sm flex-fill border-0 small" type="text" placeholder="Search for Election...." style="width: 295px;filter: blur(0px);" autocomplete="on">
                <div class="input-group-append"><button class="btn btn-primary btn-sm border rounded-circle py-0" type="button"><i class="fas fa-search"></i></button></div>
            </div><a class="btn btn-light action-button" role="button" href="election_list.php" style="background-color: 0,123,255;">logout</a></div>
    </nav>
    <div class="team-boxed">
        <div class="container">
            <div class="intro">
                <h2 class="text-center"></h2>
            </div>
        <?php foreach($elections as $elc): ?>
            <div class="row people">
                <div style="height: 50vh; width : 50%;  margin-left :300px;" class="row-md-6 row-lg-4 item">
                    <div class="box">
                        <h3 class="name"><?=$elc['Name']?></h3>
                        <p class="title" style="color: #f4476b;font-size: 22px;"><?=$elc['EndDate']?></p>
                        <p class="description">Aenean tortor est, vulputate quis leo in, vehicula rhoncus lacus. Praesent aliquam in tellus eu gravida. Aliquam varius finibus est, et interdum justo suscipit id. Etiam dictum feugiat tellus, a semper massa. </p>
                        <div class="social"><button class="btn btn-primary" type="button"><a  class="social"href="electionCandidate.php?id=<?= $elc['Id']?>">Vote Now!</a></button></div>
                    </div>
                </div>
            </div>
            <?php endforeach ?>
        </div>
    </div>
    <div class="footer-basic">
        <footer>
            <div class="text-center social" style="height: 47px;"></div>
            <p class="copyright">FCAI-HU© 2022.&nbsp; &nbsp;All Rights Reserved.</p>
        </footer>
    </div>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/bs-init.js"></script>
</body>

</html>