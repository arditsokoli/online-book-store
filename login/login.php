<?php
session_start();
include "../lib/dbconnect.php";
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
                    <li> <a href="cart.php" class="btn btn-lg"> Cart </a> </li>; 
                    <li> <a href="../destroy.php" class="btn btn-lg"> LogOut </a> </li>';
                }
                ?>
            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>

<div>


    <main>
        <div class="div-form" style="margin-top: 100px;">
            <form id="login-form" class="form-login" method="post" action="./process-login.php">
                <h2 class="h-form">Log In</h2>

                <div class="ui-message" id="uiMessage_Login">
                    Sorry, we can't find an account with this email address.
                    Please try again or <a href="../signup/signup.php">create a new account</a>.
                </div>
                <div>
                    <label for="email">Email:</label>
                    <input type="text" id="email" name="email" class="form-control">
                    <span class="error_form"></span>
                </div>
                <div>
                    <label for="password">Password:</label>
                    <input type="password" id="password" name="password" class="form-control">
                    <span class="error_form"></span>
                </div>

                <div>
                    <input type="submit" value="Log In" class="form-control  btn-sec">
                    </br>
                    <div class="orLine">
                        <span class="or">or</span>
                    </div>
                    </br>
                    <div id="name"></div>
                    <script>startApp();</script> <!--google aouth if success login-->
                    <div id="fb-root"></div> <!--google aouth if success login-->

                    <div class="row ">
                        <div class="faButtons">
                            <button type="button" id="customBtn" class="buttonText google" data-onsuccess="onSignIn">
                                <i class="fa fa-google"> Google</i>
                            </button>
                            <button type="button" class="facebook" data-onsuccess="onSignIn">
                                <i class="fa fa-facebook"> Facebook</i>
                            </button>
                        </div>
                    </div>
                    <a class="a_signup" href="../signup/signup.php">Sign up now</a>
                </div>
            </form>
        </div>
    </main>


    <?php
    require_once("../lib/footer.php");
    ?>
    <!-- Validimet -->
    <script src="../resource/static/js/script.js"></script>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="../resource/static/js/bootstrap.min.js"></script>
</body>
</html>