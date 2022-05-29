<?php
session_start();
require("../lib/connect.php");

// redirect if not admin
if (!isset($_SESSION["role_id"]) || $_SESSION["role_id"] != ADMIN_ROLE_ID) {
    header("Location: /login/login.php?err=Only admin is allowed");
    die();
}

require_once("../lib/header.php");
?>
<link rel="stylesheet" type="text/css" href="../resource/static/css/admin.css">
<title>Add film person entity</title>
</head>
<body>
<div class="container1">
    <div class="nav-bar" id="nav-bar">
        <a href="../index.php"><img class="logo" src="../resource/media/img/blackGold.png"></a>
        <a class="triger-a" href="javascript:void(0);" class="icon" onclick="myFunction()">
            <i class="fa fa-bars"></i>
        </a>
        <hr class="hr-nav">
        <ul class="ul-nav">
            <li><h6>Admin</h6></li>
            <li><a href="add-film-role.php"><i class="fa fa-address-book-o"></i> Add film role</a></li>
            <li><a href="add-film-genre.php"><i class="fa fa-film"></i> Add film genre</a></li>
            <li><a href="./add-film-person-entity.php"><i class="fa fa-user-o"></i> Add film person </a></li>
            <li><a href="add-film.php"><i class="fa fa-file-movie-o"></i> Add film</a></li>

            <li><h6>Dashboard</h6></li>
            <li><a href="dashboard.php"><i class="fa fa-user"></i> Profile</a></li>
            <li><a href="../index.php"><i class="fa fa-film"></i> Catalogue</a></li>
            <li><a href="../user/reset.php"><i class="fa fa-sliders"></i> Settings</a></li>
            <li><a href="../logout.php"><i class="fa fa-power-off"></i> Log Out</a></li>

        </ul>
    </div>
    <div class="container2" id="container2">
        <div class="logout-nav">
            <a class="triger-b" href="javascript:void(0);" class="icon" onclick="myFunction()">
                <i class="fa fa-bars"></i>
            </a>
            <h5> Hello <?php echo $_SESSION["first_name"] ?> <i class="fa fa-user"></i></h5>

        </div>

        <form id="role-form" class="person-name" method="post" action="process-add-film-person-entity.php">
            <h2 class="h-form">Add film person entity</h2>
            <div class="ui-message" id="uiMess"></div>
            <div>
                <label for="person-name">Person name</label>
                <input type="text" id="person-name" name="person-name" class="form-control">
                <span class="error_form"></span>
            </div>

            <div>
                <input type="submit" value="submit" class="form-control  btn-sec">
            </div>
        </form>
    </div>
</div>

<?php
require_once("../lib/footer.php");
?>
<script src="../resource/static/js/script.js"></script>
<script src="../resource/static/js/admin.js"></script>
</body>
</html>

