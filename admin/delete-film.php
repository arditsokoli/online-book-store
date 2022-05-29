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
?>

    <a class="btn btn-primary" href="../admin/dashboard.php">Go back</a>
</body>
</html>
