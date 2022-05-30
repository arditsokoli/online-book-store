<?php
require("../lib/auth-admin-action.php");

if ($allow) {
    $id = mysqli_real_escape_string($conn, $_GET["id"]);
    $query = "delete from `products` where `products`.`PID` = '$id'";

    if (mysqli_query($conn, $query)) {
        ?>
        <p>products deleted</p>
        <?php
    }
    else {
        ?>
        <h2>Database error, cannot delete!</h2>
        <?php
    }
}

if (mysqli_query($conn, $query)) {
    header("Location: ./dashboard.php?Message=Product deleted !!!");
    die();
}
else {
    header("Location: ./dashboard.php?Message=Cannot deleted !!!");
    die();
}
?>

