<?php
session_start();

$form_url = "./add-film-role.php";
if (!(
    isset($_SESSION["email"]) &&
    isset($_POST["role-name"])
)) {
    header("Location: " . $form_url);
    die();
}

require_once("../lib/connect.php");


function redirect($field, $msg) {
    $url = sprintf("/admin/add-film-role.php?field=%s&msg=%s", $field, $msg);
    header("Location: " . $url);
    die();
}

$role = mysqli_real_escape_string($conn, trim($_POST["role-name"]));


if ($_SESSION["role_id"] != ADMIN_ROLE_ID) {
    header("Location: /login/login.php?err=" . "Only admin is allowed to enter this url");
    die();
}


$query = sprintf("select count(*) as cnt from `film_role` where `film_role`.`name` = \"%s\";", $role);
$result = mysqli_query($conn, $query);
$arr = mysqli_fetch_array($result);

if ($arr["cnt"] != 0) {
    redirect("film_role", "Already exists");
}
else {
    $insert = sprintf(
        <<<QUERY
        insert into `film_role`(`name`)
        values("%s");
        QUERY,
        mysqli_real_escape_string($conn, trim($_POST["role-name"]))
    );
    if (!mysqli_query($conn, $insert)) {
        header("Location: ./add-film-role.php?err=Database error");
        die();
    }
    else {
        header("Location: ./dashboard.php?ok=Role added");
        die();
    }
}
