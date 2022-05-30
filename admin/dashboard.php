<?php
session_start();
require("../lib/dbconnect.php");

// redirect if not admin
if (!isset($_SESSION["role_id"]) || $_SESSION["role_id"] != ADMIN_ROLE_ID) {
    header("Location: ../login/login.php?err=Only admin is allowed");
    die();
}
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
    <meta name="author" content="Shivangi Gupta">
    <link rel="icon" type="image/x-icon" href="favicon.png">
    <title>Online Bookstore</title>
    <!-- Bootstrap -->
    <link href="../resource/static/css/bootstrap.min.css" rel="stylesheet">
    <link href="../resource/static/css/my.css" rel="stylesheet">

    <link href="../resource/static/css/style.css" rel="stylesheet">
    <link href="../resource/static/css/admin.css" rel="stylesheet">

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
                {   echo' <li > <a href="#" style="font-size: 20px;"> Hello ' .$_SESSION['first_name']. '.</a></li>
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
        <div class="div-body">
            <h2>Data:</h2>
            <ul>
                <li>User ID: <?php echo $_SESSION["user_id"] ?></li>
                <li>First name: <?php echo $_SESSION["first_name"] ?></li>
                <li>Last name: <?php echo $_SESSION["last_name"] ?></li>
                <li>Email: <?php echo $_SESSION["email"] ?></li>
            </ul>
        </div>

        <div class="div-body">
            <table style="margin-top: 0;">
                <thead>
                <tr>
                    <th class="th-table">ID</th>
                    <th>Title</th>
                    <th colspan="3">Action</th>
                </tr>
                </thead>
                <tbody>
                <?php
                $query = "select `PID`,`title` from `products`;";

                $res = mysqli_query($conn, $query);
                if ($res) {
                    while ($arr = mysqli_fetch_assoc($res)) {
                        $id = $arr["PID"];
                        $title = $arr["title"];
                        // TODO
                        $show_path = "../description.php";
                        $edit_path = "../admin/edit-book.php";
                        $delete_path = "../admin/delete-book.php";
                        ?>
                        <tr>
                            <td class="th-table"><?php echo $id; ?></td>
                            <td class="left-th"><?php echo $title; ?></td>
                            <!-- CRUD operations -->
                            <td>
                                <a class="btn btn-outline-primary"
                                   href=<?php printf("\"%s?ID=%s\"", $show_path, $id); ?>
                                >
                                    Show
                                </a>
                            </td>
                            <td>
                                <a class="btn btn-outline-secondary"
                                   href=<?php printf("\"%s?ID=%s\"", $edit_path, $id); ?>
                                >
                                    Edit
                                </a>
                            </td>
                            <td>
                                <a class="btn btn-outline-danger"
                                   href=<?php printf("\"%s?id=%s\"", $delete_path, $id); ?>
                                >
                                    Delete
                                </a>
                            </td>
                        </tr>
                        <?php
                    }
                }
                ?>
                </tbody>
            </table>

        </div>
    </div>
</div>
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
