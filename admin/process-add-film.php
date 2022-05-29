<?php
session_start();

$form_url = "./add-film.php";
if (!(
        isset($_POST["title"]) &&
        isset($_POST["authori"]) &&
        isset($_POST["mrp"]) &&
        isset($_POST["price"]) &&
        isset($_POST["discount"]) &&
        isset($_POST["available"]) &&
        isset($_POST["publisher"]) &&
        isset($_POST["edition"]) &&
        isset($_POST["category"]) &&
        isset($_POST["description"]) &&
        isset($_POST["language"]) &&
        isset($_POST["page"]) &&
        isset($_POST["weight"])
    )) {
    header("Location: " . $form_url);
    die();
}

if ($_POST["exists"]) {
    $form_url = "./edit-film.php?id=" . $_POST["id"] . "&err=";
}
else {
    $form_url = $form_url . "?err=";
}

require_once("../lib/dbconnect.php");

if ($_SESSION["role_id"] != ADMIN_ROLE_ID) {
    header("Location: ../login/login.php?err=" . "Only admin is allowed to enter this url");
    die();
}


/// Functions

function escape($str) {
    return mysqli_real_escape_string($GLOBALS["conn"], $str);
}


function structure_data($conn) {
    $data = array(
        "valid" => null,
        "pid" => null,
        "title" => null,
        "author" => null,
        "mrp" => null,
        "price" => null,
        "discount" => null,
        "available" => null,
        "publisher" => null,
        "edition" => null,
        "category" => null,
        "description" => null,
        "language" => null,
        "page" => null,
        "weight" => null,
    );

    // title
    $title= trim($_POST["title"]);
    if (strlen($title) > 320000) {
        $data["valid"] = "Too long";
        return $data;
    }
    else {
        $data["title"] = escape($title);
    }

    // Author
    $author= trim($_POST["authori"]);
    if (strlen($title) > 320) {
        $data["valid"] = "Too long";
        return $data;
    }
    else {
        $data["author"] = escape($author);
    }

    // Mrp
    $mrp = (int) $_POST["mrp"];
    if ($mrp <= 0) {
        $data["valid"] = "Must be positive";
        return $data;
    } else {
    $data["mrp"] =  escape($mrp);
    }


    // discount
    $discount = (int) $_POST["discount"];
    if ($discount <= 0) {
        $data["valid"] = "Must be positive";
        return $data;
    } else {
        $data["discount"] =  escape($discount);
    }

    // available
    $available = (int) $_POST["available"];
    if ($available <= 0) {
        $data["valid"] = "Must be positive";
        return $data;
    } else {
        $data["available"] =  escape($available);
    }

    // publisher
    $publisher= trim($_POST["publisher"]);
    if (strlen($publisher) > 320) {
        $data["valid"] = "Too long";
        return $data;
    }
    else {
        $data["publisher"] = escape($publisher);
    }

    // edition
    $edition = (int) $_POST["edition"];
    if ($edition <= 0) {
        $data["valid"] = "Must be positive";
        return $data;
    } else {
        $data["edition"] =  escape($edition);
    }

    // category
    $category= trim($_POST["category"]);
    if (strlen($category) > 32) {
        $data["valid"] = "Too long";
        return $data;
    }
    else {
        $data["category"] = escape($category);
    }

    // description
    $description= trim($_POST["description"]);
    if (strlen($description) > 50000) {
        $data["valid"] = "Too long";
        return $data;
    }
    else {
        $data["description"] = escape($description);
    }


    // publisher
    $language= trim($_POST["language"]);
    if (strlen($language) > 32) {
        $data["valid"] = "Too long";
        return $data;
    }
    else {
        $data["language"] = escape($language);
    }

    // page
    $page = (int) $_POST["page"];
    if ($page <= 0) {
        $data["valid"] = "Must be positive";
        return $data;
    } else {
        $data["page"] =  escape($page);
    }

    // weight
    $weight = (int) $_POST["weight"];
    if ($weight <= 0) {
        $data["valid"] = "Must be positive";
        return $data;
    } else {
        $data["weight"] =  escape($weight);
    }

    // Price
    $price = (int) $_POST["price"];
    if ($price <= 0) {
        $data["valid"] = "Must be positive";
        return $data;
    } else {
        $data["price"] =  escape($price);
    }




    // post.er
    if (isset($_FILES["poster"]) && $_FILES["poster"]["name"] != null) {
        $dir        = "/img/books/";
        $extensions = array("jpg");
        $file_name  = $_FILES['poster']['name'];
        $file_size  = $_FILES['poster']['size'];
        $file_tmp   = $_FILES['poster']['tmp_name'];
        $file_type  = $_FILES['poster']['type'];
        $a = explode('.', $_FILES['poster']['name']);
        $ext = end($a);
        $file_ext   = strtolower($ext);

        if (!in_array($file_ext, $extensions)) {
            $data["valid"] = "Unsupported file extension";
            return $data;
        }
        if ($file_size > 10 * (2 << 20)) {
            $data["valid"] = "File must be <= 10MB";
            return $data;
        }

        $location = $dir . $a[0] . "." . $file_ext;
        $pid = $a[0];

        $data["pid"] = $pid;
        move_uploaded_file($file_tmp, ".." . $location);
    }else{
        $data["pid"] = $_POST["id"];
    }
    return $data;
}


function generate_insert_query($data, $start, $end) {
    $insert = "insert into `products`(";
    $values = "values(";

    $key = array_keys($data);
    $val = array_values($data);

    for ($i = $start; $i < $end - 1; $i++) {
        $insert = $insert . "`" . $key[$i] . "`, ";
        $quote = "'";
        if ($val[$i] == null) {
            $values = $values . "null, ";
        }
        else {
            $values = $values . "'" . $val[$i] . "', ";
        }
    }

    $insert = $insert . "`" . $key[$end - 1] . "`)\n";
    $i = $end - 1;
    if ($val[$i] == null) {
        $values = $values . "null);";
    }
    else {
        $values = $values . "'" . $val[$end - 1] . "');";
    }

    return $insert . $values;
}

function generate_update_query($data, $start, $end) {
    $update = "update `products` set";
    $key = array_keys($data);
    $val = array_values($data);

    for ($i = $start; $i < $end - 1; $i++) {
        $update = $update . " `products`.`" . $key[$i] ."` = '" . $val[$i] . "',";
    }
    $update = $update . " `products`.`" . $key[$end - 1] ."` = '" . $val[$end - 1] . "'";
    return $update . " where `products`.`PID` = '". escape($_POST["id"]) . "';";

}

function generate_query($data, $start, $end) {
    if ($_POST["exists"]) {
        return generate_update_query($data, $start, $end - 2);
    }
    return generate_insert_query($data, $start, $end);
}



/// Main

$data = structure_data($conn);
if ($data["valid"] != null) {
    header("Location: $form_url" . $data["valid"]);
    die();
}

$query = generate_query($data, 1, count($data));
print "<br>" . $query . "<br>";

if (mysqli_query($conn, $query)) {
    header("Location: ./dashboard.php?Message=Film added !!!");
    die();
}
else {
    header("Location: $form_url" . "Some error occurred");
    die();
}

