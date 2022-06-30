<?php 
require_once '../../Controllers/Election_controllers.php';
$election = new Election_controller;
$elections=$election->electionbrows($_GET['id']);
$alcandidate=$election->selelectcandidate($_GET['id']);
// foreach($alcandidate as $al){
//     print_r($al);
// }

// die;

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
    <nav class="navbar navbar-light navbar-expand-md navigation-clean-search" style="background-color: #cccccc;width: 6630;">
        <div class="container"><a class="navbar-brand" href="#">E-Voting</a><a class="btn btn-light tada animated action-button" role="button" href="Elections%20List.html">Home</a>
            <div>
                <div class="input-group" style="width: 345px;"><input class="bg-light border rounded border-primary form-control-sm flex-fill border-0 small" type="text" placeholder="Search for Election...." style="filter: blur(0px);" autocomplete="on">
                    <div class="input-group-append"><button class="btn btn-primary btn-sm border rounded-circle py-0" type="button"><i class="fas fa-search"></i></button></div>
                </div>
            </div><a class="btn btn-light tada animated action-button" role="button" href="election_list.php">Logout</a></div>
    </nav>
    <div class="team-boxed">
        <div class="container">
            <div class="intro">
                <h2 class="text-center"><?=$elections[0]['Name']?></h2>
                <p class="text-center">Elections Description</p>
            </div>
            <?php foreach($alcandidate as $data):?>
            <div class="row people">
                <div class="col-md-6 col-lg-4 item">
                    <div class="box"><img class="rounded-circle" src="<?=$data['Photo']?>">
                        <h3 class="name"><?=$data['FirstName']?></h3>
                        <p class="title">Musician</p>
                        <p class="description">Aenean tortor est, vulputate quis leo in, vehicula rhoncus lacus. Praesent aliquam in tellus eu gravida. Aliquam varius finibus est, et interdum justo suscipit id. Etiam dictum feugiat tellus, a semper massa. </p>
                        <div class="social">
                            <div class="form-check"><input class="form-check-input rubberBand animated" type="checkbox" id="formCheck-1"><label class="form-check-label" for="formCheck-1">Vote</label></div>
                        </div>
                    </div>
                </div>
            </div>
            <?php endforeach?>
        </div>
    </div>
    <div class="footer-basic" style="height: 343px;margin: 0px;">
        <footer>
            <div class="text-center social" style="height: 223px;"><img style="height: 183px;width: 183px;margin: 5px;"></div>
            <div class="text-center social" style="height: 62px;"><button class="btn btn-primary btn-sm text-center border rounded" type="button" style="height: 60px;width: 191px;">Uplaod Fingerprint Photo</button></div>
        </footer>
    </div>
    <div class="footer-basic" style="height: 261px;margin: 0;">
        <footer>
            <div class="text-center social" style="height: 119px;margin: 14px;"><button class="btn btn-primary btn-lg text-center border rounded" data-bs-hover-animate="pulse" type="submit" style="height: 47px;width: 191px;">Submit!</button></div>
            <p class="copyright">FCAI-HU© 2022</p>
        </footer>
    </div>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/bs-init.js"></script>
</body>

</html>