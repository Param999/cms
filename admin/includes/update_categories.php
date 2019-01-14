<form action="" method="POST">
    <div class="form-group">
        <label for="cat_title">Edit Category</label>

        <?php
            if (isset($_GET['edit'])) {
                $edit_cat_id = $_GET['edit'];
                $query = "SELECT cat_title FROM categories WHERE cat_id = $edit_cat_id";
                $edit_catagories_result = mysqli_query($connection, $query);
                while ($row = mysqli_fetch_assoc($edit_catagories_result)) {
                    $cat_title = $row['cat_title'];
                    //$cat_id = $row['cat_id'];
        ?>

        <input value="<?php if (isset($cat_title)) {echo $cat_title;}?>" type="text" class="form-control" name="cat_title">

        <?php }}?>

        <?php 
            if(isset($_POST['update'])){
                $cat_title = $_POST['cat_title'];
                $query = "UPDATE categories SET cat_title = '{$cat_title}' WHERE cat_id = {$cat_id}";
                $update_categories_result = mysqli_query($connection, $query);
                if(!$update_categories_result){
                    die('Update failed!' . mysqli_error($connection));
                }else{
                    header("Location: categories.php");
                }
            }
        
        ?>
    </div>
    <div class="form-group">
        <input type="submit" class="btn btn-primary" value="Update" name="update">
    </div>
</form>