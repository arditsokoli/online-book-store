<?php
session_start();
require("../lib/dbconnect.php");

// redirect if not admin
if (!isset($_SESSION["role_id"]) || $_SESSION["role_id"] != ADMIN_ROLE_ID) {
    header("Location: ../login/login.php?err=Only admin is allowed");
    die();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Books">
    <meta name="author" content="Shivangi Gupta">
    <link rel="icon" type="image/x-icon" href="favicon.png">
    <title>Online Bookstore</title>
    <!-- Bootstrap -->
    <link href="../resource/static/css/bootstrap.min.css" rel="stylesheet">
    <link href="../resource/static/css/my.css" rel="stylesheet">

    <link href="../resource/static/css/style.css" rel="stylesheet">
    <link href="../resource/static/css/admin.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../resource/static/css/admin.css">

    <style>
        .modal-body ul {
            list-style: none;
        }

        .modal .btn {
            background: #e48cff;
            color: #fff;
        }

        .modal a {
            color: #e48cff;
        }

        #login_button, #register_button {
            background: none;
            color: #ffffff !important;
        }
    </style>
</head>


<body>
<nav class="navbar navbar-default navbar-fixed-top navbar-inverse">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="../index.php" style="padding: 1px;"><img class="img-responsive" alt="Brand" src="../resource/media/img/logo.png"  style="width: 147px;margin: 0px;"></a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right">
                <?php
                if(!isset($_SESSION['email']))
                {
                    echo'
            <li>
                <a href="login.php" id="login_button" class="btn btn-lg" >Login</a>
            </li>
            <li>
              <a href="../signup/signup.php"  id="register_button" class="btn btn-lg" >Sign Up</a>
                </div>
            </li>';
                }
                else
                {   echo' <li> <a href="#" class="btn btn-lg"> Hello ' .$_SESSION['first_name']. '.</a></li>
                    <li> <a href="../index.php" class="btn btn-lg">Cataloge</a> </li>;
                    <li> <a href="dashboard.php" class="btn btn-lg"> Admin Home </a> </li>; 
                    <li> <a href="add-book.php" class="btn btn-lg"> Add Book </a> </li>; 
                    <li> <a href="../user/reset.php" class="btn btn-lg"> Settings </a> </li>; 
                    <li> <a href="../destroy.php" class="btn btn-lg"> LogOut </a> </li>';
                }
                ?>
            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>

<div>

            <?php
            $exists = false;
            $id = "";
            $title = '';
            $author = '';
            $mrp = '';
            $price ='';
            $discount = '';
            $available = '';
            $publisher = '';
            $edition ='';
            $category = '';
            $description= '';
            $language = '';
            $page = '';
            $weight = '';
            require_once("../lib/film-form.php");
            ?>

    </div>


    <?php
    require_once("../lib/footer.php");
    ?>

    <script src="../resource/static/js/admin.js"></script>
</body>
</html>


