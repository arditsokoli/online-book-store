<?php
define('DB_HOST', 'sql303.unaux.com');
define('DB_NAME', 'unaux_31637256_b');
define('DB_USER','unaux_31637256');
define('DB_PASSWORD','sdgs1233nj2');

$conn=mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD) or die("Failed to connect to MySQL: " . mysql_error());
$db=mysqli_select_db($conn,DB_NAME) or die("Failed to connect to MySQL: " . mysql_error());

$__admin_role_id = mysqli_fetch_assoc(mysqli_query(
    $conn,
    <<<ADMIN
    select `role`.`id`
    from `role`
    where `role`.`name` = "admin";
    ADMIN
));

define("ADMIN_ROLE_ID", $__admin_role_id["id"]);
?>



