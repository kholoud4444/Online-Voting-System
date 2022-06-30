<?php
 
  require_once '../../Controllers/CandidateController.php';
require_once '../../Models/Candidate.php';
$candidateController = new CandidateController;
if( isset($_POST['FirstName']) && isset($_POST['LastName'])   && isset($_FILES["image"]) && isset($_POST['ElectionId'])){
    if (!empty($_POST['FirstName']) && !empty($_POST['LastName'])   && !empty($_FILES["image"])  && !empty($_POST['ElectionId']) )
{
    $candidate=new Candidate;
    $candidate->FirstName=$_POST['FirstName'];
    $candidate->LastName=$_POST['LastName'];
    $candidate->ElectionId =$_POST['ElectionId'];
    $location = "../image/ " .$_FILES["image"]["name"];

    if (move_uploaded_file($_FILES["image"]["tmp_name"], $location)) {
        $candidate->Photo = $location;
        if ($candidateController->addCandidate($candidate)) {
            header("location: candidate.php");
        } else {
            $errMsg = "Something went wrong... try again";
        }
         
    } 
    else {
        $errMsg = "Error in Upload";
    }
}
}
$candidateController2 = new CandidateController;
if(isset($_POST['update'])){
    $candidate2=new Candidate;
    $candidate2->FirstName=$_POST['FName'];
    $candidate2->LastName=$_POST['LName'];
    $candidate2->ElectionId =$_POST['EId'];
    
   if ($candidateController2->updateCandidate($candidate2)) {
    header("location: candidate.php");
}
     
    else {
        $errMsg = "Error in Upload";
    }

}

$candidates=$candidateController->getCandidates();

if(isset($_POST['delete'])){
    $candidateController->deleteCandidate($_POST['candidateid']);
    
    }

 
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Login - Brand</title>
    <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i">
    <link rel="stylesheet" href="../assets/fonts/fontawesome-all.min.css">
</head>

<body class="bg-gradient-primary">
    <div id="wrapper">
        <nav class="navbar navbar-dark align-items-start sidebar sidebar-dark accordion bg-gradient-primary p-0">
            <div class="container-fluid d-flex flex-column p-0">
                <a class="navbar-brand d-flex justify-content-center align-items-center sidebar-brand m-0" href="#">
                    <div class="sidebar-brand-icon rotate-n-15"><i class="fas fa-laugh-wink"></i></div>
                    <div class="sidebar-brand-text mx-3"><span>Brand</span></div>
                </a>
                <hr class="sidebar-divider my-0">
                <ul class="nav navbar-nav text-light" id="accordionSidebar">
                    <li class="nav-item" role="presentation"><a class="nav-link" href="index.php"><i
                                class="fas fa-tachometer-alt"></i><span>Dashboard</span></a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link" href="voter.php"><i
                                class="fas fa-user"></i><span>voters</span></a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link" href="election.php"><i
                                class="fas fa-table"></i><span>Elections</span></a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link active" href="candidate.php"><i
                                class="far fa-user-circle"></i><span>Candidates</span></a></li>
                    <li class="nav-item" role="presentation"></li>
                </ul>
                <div class="text-center d-none d-md-inline"><button class="btn rounded-circle border-0"
                        id="sidebarToggle" type="button"></button></div>
            </div>
        </nav>
        <div class="d-flex flex-column" id="content-wrapper">
            <div id="content">
                <nav class="navbar navbar-light navbar-expand bg-white shadow mb-4 topbar static-top">
                    <div class="container-fluid"><button class="btn btn-link d-md-none rounded-circle mr-3"
                            id="sidebarToggleTop" type="button"><i class="fas fa-bars"></i></button>
                        <form
                            class="form-inline d-none d-sm-inline-block mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                            <div class="input-group">
                                <div class="input-group-append"></div>
                            </div>
                        </form>
                        <ul class="nav navbar-nav flex-nowrap ml-auto">
                            <li class="nav-item dropdown d-sm-none no-arrow"><a class="dropdown-toggle nav-link"
                                    data-toggle="dropdown" aria-expanded="false" href="#"><i
                                        class="fas fa-search"></i></a>
                                <div class="dropdown-menu dropdown-menu-right p-3 animated--grow-in" role="menu"
                                    aria-labelledby="searchDropdown">
                                    <form class="form-inline mr-auto navbar-search w-100">
                                        <div class="input-group"><input class="bg-light form-control border-0 small"
                                                type="text" placeholder="Search for ...">
                                            <div class="input-group-append"><button class="btn btn-primary py-0"
                                                    type="button"><i class="fas fa-search"></i></button></div>
                                        </div>
                                    </form>
                                </div>
                            </li>
                            <li class="nav-item dropdown no-arrow mx-1" role="presentation">
                                <div class="nav-item dropdown no-arrow"><a class="dropdown-toggle nav-link"
                                        data-toggle="dropdown" aria-expanded="false" href="#"></a>
                                    <div class="dropdown-menu dropdown-menu-right dropdown-list dropdown-menu-right animated--grow-in"
                                        role="menu">
                                        <h6 class="dropdown-header">alerts center</h6>
                                        <a class="d-flex align-items-center dropdown-item" href="#">
                                            <div class="mr-3">
                                                <div class="bg-primary icon-circle"><i
                                                        class="fas fa-file-alt text-white"></i></div>
                                            </div>
                                            <div><span class="small text-gray-500">December 12, 2019</span>
                                                <p>A new monthly report is ready to download!</p>
                                            </div>
                                        </a>
                                        <a class="d-flex align-items-center dropdown-item" href="#">
                                            <div class="mr-3">
                                                <div class="bg-success icon-circle"><i
                                                        class="fas fa-donate text-white"></i></div>
                                            </div>
                                            <div><span class="small text-gray-500">December 7, 2019</span>
                                                <p>$290.29 has been deposited into your account!</p>
                                            </div>
                                        </a>
                                        <a class="d-flex align-items-center dropdown-item" href="#">
                                            <div class="mr-3">
                                                <div class="bg-warning icon-circle"><i
                                                        class="fas fa-exclamation-triangle text-white"></i></div>
                                            </div>
                                            <div><span class="small text-gray-500">December 2, 2019</span>
                                                <p>Spending Alert: We've noticed unusually high spending for your
                                                    account.</p>
                                            </div>
                                        </a><a class="text-center dropdown-item small text-gray-500" href="#">Show All
                                            Alerts</a>
                                    </div>
                                </div>
                            </li>
                            <li class="nav-item dropdown no-arrow mx-1" role="presentation">
                                <div class="nav-item dropdown no-arrow"><a class="dropdown-toggle nav-link"
                                        data-toggle="dropdown" aria-expanded="false" href="#"></a>
                                    <div class="dropdown-menu dropdown-menu-right dropdown-list dropdown-menu-right animated--grow-in"
                                        role="menu">
                                        <h6 class="dropdown-header">alerts center</h6>
                                        <a class="d-flex align-items-center dropdown-item" href="#">
                                            <div class="dropdown-list-image mr-3"><img class="rounded-circle"
                                                    src="../assets/img/avatars/avatar4.jpeg">
                                                <div class="bg-success status-indicator"></div>
                                            </div>
                                            <div class="font-weight-bold">
                                                <div class="text-truncate"><span>Hi there! I am wondering if you can
                                                        help me with a problem I've been having.</span></div>
                                                <p class="small text-gray-500 mb-0">Emily Fowler - 58m</p>
                                            </div>
                                        </a>
                                        <a class="d-flex align-items-center dropdown-item" href="#">
                                            <div class="dropdown-list-image mr-3"><img class="rounded-circle"
                                                    src="../assets/img/avatars/avatar2.jpeg">
                                                <div class="status-indicator"></div>
                                            </div>
                                            <div class="font-weight-bold">
                                                <div class="text-truncate"><span>I have the photos that you ordered last
                                                        month!</span></div>
                                                <p class="small text-gray-500 mb-0">Jae Chun - 1d</p>
                                            </div>
                                        </a>
                                        <a class="d-flex align-items-center dropdown-item" href="#">
                                            <div class="dropdown-list-image mr-3"><img class="rounded-circle"
                                                    src="../assets/img/avatars/avatar3.jpeg">
                                                <div class="bg-warning status-indicator"></div>
                                            </div>
                                            <div class="font-weight-bold">
                                                <div class="text-truncate"><span>Last month's report looks great, I am
                                                        very happy with the progress so far, keep up the good
                                                        work!</span></div>
                                                <p class="small text-gray-500 mb-0">Morgan Alvarez - 2d</p>
                                            </div>
                                        </a>
                                        <a class="d-flex align-items-center dropdown-item" href="#">
                                            <div class="dropdown-list-image mr-3"><img class="rounded-circle"
                                                    src="../assets/img/avatars/avatar5.jpeg">
                                                <div class="bg-success status-indicator"></div>
                                            </div>
                                            <div class="font-weight-bold">
                                                <div class="text-truncate"><span>Am I a good boy? The reason I ask is
                                                        because someone told me that people say this to all dogs, even
                                                        if they aren't good...</span></div>
                                                <p class="small text-gray-500 mb-0">Chicken the Dog · 2w</p>
                                            </div>
                                        </a><a class="text-center dropdown-item small text-gray-500" href="#">Show All
                                            Alerts</a>
                                    </div>
                                </div>
                                <div class="shadow dropdown-list dropdown-menu dropdown-menu-right"
                                    aria-labelledby="alertsDropdown"></div>
                            </li>
                            <div class="d-none d-sm-block topbar-divider"></div>
                            <li class="nav-item dropdown no-arrow" role="presentation">
                                <div class="nav-item dropdown no-arrow"><a class="dropdown-toggle nav-link"
                                        data-toggle="dropdown" aria-expanded="false" href="#"><span
                                            class="d-none d-lg-inline mr-2 text-gray-600 small">Valerie Luna</span><img
                                            class="border rounded-circle img-profile"
                                            src="../assets/img/avatars/avatar1.jpeg"></a>
                                    <div class="dropdown-menu shadow dropdown-menu-right animated--grow-in" role="menu">
                                        <a class="dropdown-item" role="presentation" href="#"><i
                                                class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>&nbsp;Profile</a><a
                                            class="dropdown-item" role="presentation" href="#"><i
                                                class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>&nbsp;Settings</a>
                                        <a class="dropdown-item" role="presentation" href="#"><i
                                                class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>&nbsp;Activity
                                            log</a>
                                        <div class="dropdown-divider"></div><a class="dropdown-item" role="presentation"
                                            href="#"><i
                                                class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>&nbsp;Logout</a>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </nav>
                <div class="container-fluid">
                    <h3 class="text-dark mb-4">Candidate List</h3>
                    <div class="card shadow" style="background-color: rgb(239,239,241);">
                        <div style="display:inline;" class="card-header py-3"><button class="btn btn-primary" type="button"
                                onclick="Fun_show1()">New</button>
                                <button class="btn btn-primary" type="button"
                                                    style="margin-right: 10px;"
                                                    onclick="Fun_show3()">Edit</button>
                            <p class="text-primary m-0 font-weight-bold"></p>
                        </div>

                        <div id="new" style="
                    display:none;
                    height: 210px;
                    width:1100px;
                    position:fixed;
                      top:100px;
                      left:250px;
                      background-color: white;
                      box-shadow: 10px 10px 10px 0px gray;
                    ">
                            <form action="candidate.php" method="POST" enctype="multipart/form-data">
                                <h3 style=" margin-left: 10px;">Add Candidate</h3>
                                <hr>
                                <table>
                                    <thead>
                                        <tr>
                                            <th style="margin-left: 10px; color: rgb(6,34,242);">First_Name</th>
                                            <th style=" margin-left: 10px;color: rgb(4,33,251);">Last_Name</th>
                                            <th style=" margin-left: 10px; color: rgb(3,31,245);">Photo</th>
                                            <th style=" margin-left: 10px;color: rgb(8,35,238);">Election</th>


                                        </tr>

                                    </thead>

                                    <tbody style=" margin-left: 10px;">
                                     
                                        <tr>
                                            
                                       
                                            <td><input class="form-control form-control-user" type="text"
                                                    placeholder="First Name" name="FirstName"></input></td>

                                            <td><input class="form-control form-control-user" type="text"
                                                    placeholder="Last Name" name="LastName"> </input></td>
                                            <td><input type="file" name="image"> </input></td>
                                            <td><input class="form-control form-control-user" type="text"
                                                    placeholder="Election" name="ElectionId"> </input></td>
                                        </tr>
                                        
                                    </tbody>

                                </table>

                                <hr>
                                <button class="btn btn-primary" role="button"
                                    style="color: rgb(252,252,252); margin-left: 10px;" type="submit"
                                    onclick="Fun_hide1()">Save</button>
                            </form>
                        </div>



                        <div class="card-body">
                            <div class="table-responsive table mt-2" id="dataTable" role="grid"
                                aria-describedby="dataTable_info">
                                <table class="table dataTable my-0" id="dataTable">
                                    <thead>
                                        <tr>
                                            <th style="color: rgb(6,34,242);">First Name</th>
                                            <th style="color: rgb(4,33,251);">Last Name</th>
                                            <th style="color: rgb(3,31,245);">Tools</th>
                                            <th style="color: rgb(6,36,255);">Photo</th>
                                            <th style="color: rgb(8,35,238);">Election</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php foreach($candidates as $cand):?>
                                        
                                        <tr>
                                            <td style="color: rgb(66,85,232);"><?=$cand['FirstName']?></td>
                                            <td style="color: rgb(66,85,232);"><?=$cand['LastName']?></td>
                                            
                                                    
                                                   <td> <form style="display:inline;" action="Candidate.php" method="post">
                                                     <input   type="hidden" name="candidateid" value="<?=$cand['Id'] ?>">
                                                     <button  name="delete"  class="btn btn-primary"
                                                    style="margin-right: 10px;color: rgb(245,245,245);">delete</button>
                                             </form></td>
                                            <td style="color: rgb(66,85,232);"><img width="50px" height="50px" src="<?=$cand['Photo']?>" ></td>
                                            <td style="color: rgb(66,85,232);"><?=$cand['ElectionId']?><br></td>
                                        </tr>
                                        <?php endforeach?>
                                    </tbody>
                                    <tfoot>
                                        <tr></tr>
                                    </tfoot>
                                </table>
                            </div>


                            <div id="edit2" style="
                        display:none;
                        height: 210px;
                        width:900px;
                        position:fixed;
                          top:100px;
                          left:250px;
                          background-color: white;
                          box-shadow: 10px 10px 10px 0px gray;
                        ">
                                <form method="POST" action="candidate.php">
                                    <h3 style=" margin-left: 10px;">Edit Candidate</h3>
                                    <hr>
                                    <table>
                                        <thead>
                                            <tr>
                                                <th style="margin-left: 10px; color: rgb(6,34,242);  ">First_Name</th>
                                                <th style=" margin-left: 10px;color: rgb(4,33,251);">Last_Name</th>
                                                <th style=" margin-left: 10px;color: rgb(8,35,238);">Election</th>


                                            </tr>

                                        </thead>
                              <?php  foreach ($candidates as $cand): ?>
                                        <tbody style=" margin-left: 10px;">
                                            <tr>
                                                <td><input class="form-control form-control-user" type="text" name="FName"
                                                        placeholder="First Name" value="<?=$cand['FirstName']?>" > </input></td>

                                                <td><input class="form-control form-control-user" type="text"
                                                        placeholder="Last Name" name="LName" value="<?=$cand['LastName']?>"> </input></td>
                                                 
                                                <td><input class="form-control form-control-user" name="EId" type="text" value="<?=$cand['ElectionId']?>">
                                                    </input></td>


                                            </tr>
                                            <?php endforeach ?>
                                        </tbody>

                                    </table>

                                    <hr>
                                    <button class="btn btn-primary" role="button"
                                        style="color: rgb(252,252,252); margin-left: 10px;" type="submit" name="update"
                                        onclick="Fun_hide2()">Update</button>
                                </form>
                            </div>
                             
                            

                            <div class="row">
                                <div class="col-md-6 align-self-center">
                                    <p id="dataTable_info" class="dataTables_info" role="status" aria-live="polite">
                                        Showing 1 to 10 of 27</p>
                                </div>
                                <div class="col-md-6">
                                    <nav
                                        class="d-lg-flex justify-content-lg-end dataTables_paginate paging_simple_numbers">
                                        <ul class="pagination">
                                            <li class="page-item disabled"><a class="page-link" href="#"
                                                    aria-label="Previous"><span aria-hidden="true">«</span></a></li>
                                            <li class="page-item active"><a class="page-link" href="#">1</a></li>
                                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                                            <li class="page-item"><a class="page-link" href="#" aria-label="Next"><span
                                                        aria-hidden="true">»</span></a></li>
                                        </ul>
                                    </nav>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <footer class="bg-white sticky-footer">
                <div class="container my-auto">
                    <div class="text-center my-auto copyright"><span>Copyright © Brand 2022</span></div>
                </div>
            </footer>
        </div><a class="border rounded d-inline scroll-to-top" href="#page-top"><i class="fas fa-angle-up"></i></a>
    </div>
    <script src="../assets/js/jquery.min.js"></script>
    <script src="../assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.js"></script>
    <script src="../assets/js/theme.js"></script>
</body>
<script>
    function Fun_show1() {
        var x = document.getElementById("new");
        x.style.display = "block";
    }
    function Fun_hide1() {
        var x = document.getElementById("new");
        x.style.display = "none";
    }
    function Fun_show2() {
        var x = document.getElementById("edit1");
        x.style.display = "block";
    }
    function Fun_hide2() {
        var x = document.getElementById("edit1");
        x.style.display = "none";
    }
    function Fun_show3() {
        var x = document.getElementById("edit2");
        x.style.display = "block";
    }
    function Fun_hide3() {
        var x = document.getElementById("edit2");
        x.style.display = "none";
    }
</script>

</html>