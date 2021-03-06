<?php
require_once("dbconnect.php");
?>

<form id="role-form" class="cataloge" method="post" action="../admin/process-add-book.php" enctype="multipart/form-data">

    <h2 class="h-form">Add film</h2>
    <div class="container-fluid " id="new">
        <div class="row">
            <div class="col-sm-6 col-md-6 col-lg-6">
                <input type="hidden" id="exists" name="exists" value=<?php echo "\"$exists\"" ?>>
    <?php
    if ($exists) {
        ?>
        <input type="hidden" id="id" name="id" value=<?php echo "\"$id\"" ?>>
        <?php
    }
    ?>

    <div>
        <label for="title">Title</label>
        <textarea type="text"
            id="title"
            name="title"
            class="form-control2"
        ><?php echo "\"$title\"" ?></textarea>
        <span class="error_form"></span>
    </div>
                <div>
                    <label for="authori">Author</label>
                    <input type="text"
                           id="authori"
                           name="authori"
                           class="form-control2"
                           value=<?php echo "\"$author\"" ?>
                           required
                    >
                    <span class="error_form"></span>
                </div>

                <div>
                    <label for="mrp">MRP</label>
                    <input type="number"
                           id="mrp"
                           name="mrp"
                           class="form-control2"
                           value=<?php echo "\"$mrp\"" ?>
                           min="1"
                           required
                    >
                    <span class="error_form"></span>
                </div>

                <div>
                    <label for="price">Price</label>
                    <input type="number"
                           id="price"
                           name="price"
                           class="form-control2"
                           value=<?php echo "\"$price\"" ?>
                           min="1"
                           required
                    >
                    <span class="error_form"></span>
                </div>
                <div>
                    <label for="discount">Discount</label>
                    <input type="number"
                           id="discount"
                           name="discount"
                           class="form-control2"
                           value=<?php echo "\"$discount\"" ?>
                           min="1"
                           required
                    >
                    <span class="error_form"></span>
                </div>

                <div>
                    <label for="available">Available</label>
                    <input type="number"
                           id="available"
                           name="available"
                           class="form-control2"
                           value=<?php echo "\"$available\"" ?>
                           min="1"
                           required
                    >
                    <span class="error_form"></span>
                </div>
                <div>
                <label for="publisher">Publisher</label>
                <input type="text"
                       id="publisher"
                       name="publisher"
                       class="form-control2"
                       value=<?php echo "\"$publisher\"" ?>
                       required
                >
                <span class="error_form"></span>
            </div>

            <div>
                <label for="edition">Edition</label>
                <input type="number"
                       id="edition"
                       name="edition"
                       class="form-control2"
                       value=<?php echo "\"$edition\"" ?>
                       min="1"
                       required
                >
                <span class="error_form"></span>
            </div>
            </div>
            <div class="col-sm-6 col-md-6 col-lg-6">
            <div>
            <label for="category">Category</label>
            <input type="text"
                   id="category"
                   name="category"
                   class="form-control2"
                   value=<?php echo "\"$category\"" ?>
                   required
            >
            <span class="error_form"></span>
        </div>

            <div>
                <label for="description">Description</label>

                <textarea type="text"
                          id="description"
                          name="description"
                          class="form-control2" rows="7"
                ><?php echo "\"$description\"" ?></textarea>
                <span class="error_form"></span>
            </div>

            <div>
                <label for="language">Language</label>
                <input type="text"
                       id="language"
                       name="language"
                       class="form-control2"
                       value=<?php echo "\"$language\"" ?>
                       required
                >
                <span class="error_form"></span>
            </div>
            <div>
                <label for="page">Page</label>
                <input type="number"
                       id="page"
                       name="page"
                       class="form-control2"
                       value=<?php echo "\"$page\"" ?>
                       min="1"
                       required
                >
                <span class="error_form"></span>
            </div>
            <div>
                <label for="weight">Weight</label>
                <input type="number"
                       id="weight"
                       name="weight"
                       class="form-control2"
                       value=<?php echo "\"$weight\"" ?>
                       min="1"
                       required
                >
                <span class="error_form"></span>
            </div>

    <div>
        <label for="price">Price</label>
        <input type="number"
            id="price"
            name="price"
            class="form-control2"
            value=<?php echo "\"$price\"" ?>
            min="1" 
            required
        >
        <span class="error_form"></span>
    </div>


    <?php
    if (!$exists) {
        ?>
        <div>
            <label for="poster">Poster</label>
            <input type="file"
                id="poster"
                name="poster"
                class="form-control2"
                accept="image/jpg"
                required
            >
                    <span class="error_form"></span>
        </div>

        <?php
    }
    ?>
    <div class="film-submit">
    <input type="submit" value="submit"  class="form-control2 btn-sec">
    </div>
   </div>
    </div>
    </div>
    </div>
</form>

