<?php
session_start();
include "./lib/dbconnect.php";
if (isset($_GET['Message'])) {
    print '<script type="text/javascript">
               alert("' . $_GET['Message'] . '");
           </script>';
}

if (isset($_GET['response'])) {
    print '<script type="text/javascript">
               alert("' . $_GET['response'] . '");
           </script>';
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Books">
    <title>Online Bookstore</title>
    <!-- Bootstrap -->
    <link href="./resource/static/css/bootstrap.min.css" rel="stylesheet">
    <link href="./resource/static/css/my.css" rel="stylesheet">
    <link href="./resource/static/css/style.css" rel="stylesheet">
    <link rel="icon" type="image/x-icon" href="favicon.png">
    <style>
        .modal-body ul{list-style:none;}
        .modal .btn {background:#e48cff;
            color:#fff;}
        .modal a{color:#e48cff;}
        #login_button,#register_button{background:none;
            color: #ffffff !important;}
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
            <a class="navbar-brand" href="#" style="padding: 1px;"><img class="img-responsive" alt="Brand" src="./resource/media/img/logo.png"  style="width: 147px;margin: 0px;"></a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right">
                <?php
                if ((isset($_SESSION["role_id"])) && ($_SESSION["role_id"] == ADMIN_ROLE_ID)) {
                    echo' <li> <a href="#" class="btn btn-lg"> Hello ' .$_SESSION['first_name']. '.</a></li>';
                ?>
                    <li> <a href="index.php" class="btn btn-lg">Cataloge</a> </li>;
                    <li> <a href="admin/dashboard.php" class="btn btn-lg"> Admin Home </a> </li>;
                    <li> <a href="admin/add-book.php" class="btn btn-lg"> Add Book </a> </li>;
                    <li> <a href="user/reset.php" class="btn btn-lg"> Settings </a> </li>;
                    <li> <a href="destroy.php" class="btn btn-lg"> LogOut </a> </li>';
                    <?php
                }
                else {
                ?>

                <?php
                if(!isset($_SESSION['email']))
                {
                    echo'
            <li>
                <a href="login/login.php" id="login_button" class="btn btn-lg" >Login</a>
            </li>
            <li>
              <a href="signup/signup.php"  id="register_button" class="btn btn-lg" >Sign Up</a>
                </div>
            </li>';
                }
                else
                {   echo' <li> <a href="#" class="btn btn-lg"> Hello ' .$_SESSION['first_name']. '.</a></li>
                     <li> <a href="./user/reset.php" class="btn btn-lg"> Settings </a> </li>;
                    <li> <a href="cart.php" class="btn btn-lg"> Cart </a> </li>; 
                    <li> <a href="destroy.php" class="btn btn-lg"> LogOut </a> </li>';
                }
                }
                ?>
            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>


<div id="top" >
    <div id="searchbox" class="container-fluid" style="width:112%;margin-left:-6%;margin-right:-6%;">
        <div>
            <form role="search" method="POST" action="Result.php">
                <input type="text" class="form-control" name="keyword" style="width:80%;margin:20px 10% 20px 10%;" placeholder="Search for a Book , Author Or Category">
            </form>
        </div>
    </div>

    <div class="container-fluid" id="header">
        <div class="row">
            <div class="col-md-3 col-lg-3" id="category">
                <div style="background:#e48cff;color:#fff;font-weight:800;border:none;padding:15px;"> The Book Shop </div>
                <ul>
                    <li> <a href="Product.php?value=entrance%20exam"> EXAM books </a> </li>
                    <li> <a href="Product.php?value=Literature%20and%20Fiction"> Graphic Novel </a> </li>
                    <li> <a href="Product.php?value=Academic%20and%20Professional"> Academic & Professional </a> </li>
                    <li> <a href="Product.php?value=Biographies%20and%20Auto%20Biographies"> Biographies & Auto Biographies </a> </li>
                    <li> <a href="Product.php?value=Children%20and%20Teens"> Children & Teens </a> </li>
                    <li> <a href="Product.php?value=Regional%20Books"> Romans </a> </li>
                    <li> <a href="Product.php?value=Business%20and%20Management"> Business & Management </a> </li>
                    <li> <a href="Product.php?value=Health%20and%20Cooking"> Health and Cooking </a> </li>

                </ul>
            </div>
            <div class="col-md-6 col-lg-6">
                <div id="myCarousel" class="carousel slide carousel-fade" data-ride="carousel">
                    <!-- Indicators -->
                    <ol class="carousel-indicators">
                        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                        <li data-target="#myCarousel" data-slide-to="1"></li>
                        <li data-target="#myCarousel" data-slide-to="2"></li>
                        <li data-target="#myCarousel" data-slide-to="3"></li>
                        <li data-target="#myCarousel" data-slide-to="4"></li>
                        <li data-target="#myCarousel" data-slide-to="5"></li>
                    </ol>

                    <!-- Wrapper for slides -->
                    <div class="carousel-inner" role="listbox">
                        <div class="item active">
                            <img class="img-responsive" src="./resource/media/img/carousel/5.jpg">
                        </div>

                        <div class="item">
                            <img class="img-responsive "src="./resource/media/img/carousel/1.jpg">
                        </div>

                        <div class="item">
                            <img class="img-responsive" src="./resource/media/img/carousel/3.jpg">
                        </div>

                        <div class="item">
                            <img class="img-responsive"src="./resource/media/img/carousel/4.jpg">
                        </div>

                        <div class="item">
                            <img class="img-responsive" src="./resource/media/img/carousel/2.jpg">
                        </div>

                        <div class="item">
                            <img class="img-responsive" src="./resource/media/img/carousel/6.jpg">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-lg-3" id="offer">
                <a href="Product.php?value=Regional%20Books">              <img class="img-responsive center-block" src="./resource/media/img/offers/1.png"></a>
                <a href="Product.php?value=Health%20and%20Cooking">        <img class="img-responsive center-block" src="./resource/media/img/offers/2.png"></a>
                <a href="Product.php?value=Academic%20and%20Professional"> <img class="img-responsive center-block" src="./resource/media/img/offers/3.png"></a>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid text-center" id="new">
    <div class="row">
        <div class="col-sm-6 col-md-3 col-lg-3">
            <a href="description.php?ID=NEW-1&category=new">
                <div class="book-block">
                    <div class="tag">New</div>
                    <div class="tag-side"><img src="./resource/media/img/tag.png"></div>
                    <img class="book block-center img-responsive" src="./resource/media/img/new/1.png">
                    <hr>
                    Lulepashka e Artikut <br>
                    Roman
                    <span style="color:white; background-color: #e48cff; padding: 2px; border-radius: 5px;"> 450 leke </span>
                </div>
            </a>
        </div>
        <div class="col-sm-6 col-md-3 col-lg-3">
            <a href="description.php?ID=NEW-2&category=new">
                <div class="book-block">
                    <div class="tag">New</div>
                    <div class="tag-side"><img src="./resource/media/img/tag.png"></div>
                    <img class="block-center img-responsive" src="./resource/media/img/new/2.png">
                    <hr>
                    Gjuetari i balonave <br>
                    Roman
                    <span style="color:white; background-color: #e48cff; padding: 2px; border-radius: 5px;"> 1500 leke </span>
                </div>
            </a>
        </div>
        <div class="col-sm-6 col-md-3 col-lg-3">
            <a href="description.php?ID=NEW-3&category=new">
                <div class="book-block">
                    <div class="tag">New</div>
                    <div class="tag-side"><img src="./resource/media/img/tag.png"></div>
                    <img class="block-center img-responsive" src="./resource/media/img/new/3.png">
                    <hr>
                    Nje mije diej vezullues <br>
                    Roman
                    <span style="color:white; background-color: #e48cff; padding: 2px; border-radius: 5px;"> 1000 leke </span>
                </div>
            </a>
        </div>
        <div class="col-sm-6 col-md-3 col-lg-3">
            <a href="description.php?ID=NEW-4&category=new">
                <div class="book-block">
                    <div class="tag">New</div>
                    <div class="tag-side"><img src="./resource/media/img/tag.png"></div>
                    <img class="block-center img-responsive" src="./resource/media/img/new/4.png">
                    <hr>
                    Daniel Pennac Si nje roman : <br>
                    Roman
                    <span style="color:white; background-color: #e48cff; padding: 2px; border-radius: 5px;"> 500 leke </span>
                </div>
            </a>
        </div>
    </div>
</div>

<div class="container-fluid" id="author">
    <h3 style="color:#e48cff;"> POPULAR AUTHORS </h3>
    <div class="row">
        <div class="col-sm-5 col-md-3 col-lg-3">
            <a href="Author.php?value=Nre%20Mjeda"><img class="img-responsive center-block" src="./resource/media/img/popular-author/0.jpg"></a>
        </div>
        <div class="col-sm-6 col-md-3 col-lg-3">
            <a href="Author.php?value=Chetan%20Bhagat"><img class="img-responsive center-block" src="./resource/media/img/popular-author/1.jpg"></a>
        </div>
        <div class="col-sm-6 col-md-3 col-lg-3">
            <a href="Author.php?value=Dan%20Brown"><img class="img-responsive center-block" src="./resource/media/img/popular-author/2.jpg"></a>
        </div>
        <div class="col-sm-6 col-md-3 col-lg-3">
            <a href="Author.php?value=Ravinder%20Singh"><img class="img-responsive center-block" src="./resource/media/img/popular-author/3.jpg"></a>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-5 col-md-3 col-lg-3">
            <a href="Author.php?value=Jeffrey%20Archer"><img class="img-responsive center-block" src="./resource/media/img/popular-author/4.jpg"></a>
        </div>
        <div class="col-sm-6 col-md-3 col-lg-3">
            <a href="Author.php?value=Salman%20Rushdie"><img class="img-responsive center-block" src="./resource/media/img/popular-author/5.jpg"><a>
        </div>
        <div class="col-sm-6 col-md-3 col-lg-3">
            <a href="Author.php?value=J%20K%20Rowling"><img class="img-responsive center-block" src="./resource/media/img/popular-author/6.jpg"></a>
        </div>
        <div class="col-sm-6 col-md-3 col-lg-3">
            <a href="Author.php?value=Subrata%20Roy"><img class="img-responsive center-block" src="./resource/media/img/popular-author/7.jpg"></a>
        </div>
    </div>
</div>


<?php
require_once("./lib/footer.php");
?>


<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="./resource/static/js/bootstrap.min.js"></script>
</body>
</html>