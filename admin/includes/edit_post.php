<?php

    if(isset($_GET['post_id'])){
        $post_id = $_GET['post_id'];

        $query = "SELECT * FROM posts where post_id = {$post_id}";
        $posts_result = mysqli_query($connection, $query);
        while ($row = mysqli_fetch_assoc($posts_result)) {
            $post_id = $row['post_id'];
            $post_title = $row['post_title'];
            $post_author = $row['post_author'];
            $post_content = $row['post_content'];
            $post_date = $row['post_date'];
            $post_image = $row['post_image'];
            $post_status = $row['post_status'];
            $post_comment_count = $row['post_comment_count'];
            $post_tags = $row['post_tags'];
            $post_category_id = $row['post_category_id'];
        }
    }

    if(isset($_POST['update_post'])){
        $post_title = $_POST['post_title'];
        $post_author = $_POST['post_author'];
        $post_status = $_POST['post_status'];
        $post_tags = $_POST['post_tags'];
        $post_category_id = $_POST['post_category'];
        $post_content = $_POST['post_content'];
        //$post_date = date('d-m-y');
        $post_image = $_FILES['image']['name'];
        $post_image_temp = $_FILES['image']['tmp_name'];
        //$post_comment_count = 4;
        
        move_uploaded_file($post_image_temp, "../images/$post_image");

        if(empty($post_image)){
            $query = "SELECT * from posts WHERE post_id = {$post_id}";
            $select_image = mysqli_query($connection, $query);
            confirmQuery($select_image);
            while ($row = mysqli_fetch_assoc($select_image)) {
                $post_image = $row['post_image'];
            }
        }

        $query = "UPDATE posts SET post_title= '{$post_title}', post_author= '{$post_author}', post_category_id={$post_category_id}, post_status= '{$post_status}', ";
        $query .= "post_tags = '{$post_tags}', post_content = '{$post_content}', post_image= '{$post_image}', post_date = now()";
        $query .= "WHERE post_id = {$post_id}";

        $update_query = mysqli_query($connection, $query);
        confirmQuery($update_query);
    
    }

?>


<form action="" method="post" enctype="multipart/form-data">

    <div class="form-group">
        <label for="post_title">Post Title</label>
        <input type="text" class="form-control" name="post_title" value="<?php echo $post_title; ?>">    
    </div>

    <div class="form-group">
        <select name="post_category" id="">
            <?php
                $query = "SELECT * FROM categories";
                $catagories_result = mysqli_query($connection, $query);
                confirmQuery($catagories_result);
                while ($row = mysqli_fetch_assoc($catagories_result)) {
                    $cat_title = $row['cat_title'];
                    $cat_id = $row['cat_id'];

                    echo "<option value='{$cat_id}'> {$cat_title} </option>";
                }
            ?>
        </select>
    </div>

    <div class="form-group">
        <label for="post_author">Post Author</label>
        <input type="text" class="form-control" name="post_author" value="<?php echo $post_author; ?>">    
    </div>

    <div class="form-group">
        <label for="post_status">Post Status</label>
        <input type="text" class="form-control" name="post_status" value=<?php echo $post_status; ?>>    
    </div>

    <div class="form-group">
        <!--<label for="post_image">Post Image</label> -->
        <img width=100 src="../images/<?php echo $post_image; ?>">
        <input type="file"  name="image">
    </div>

    <div class="form-group">
        <label for="post_tags">Post Tags</label>
        <input type="text" class="form-control" name="post_tags" value="<?php echo $post_tags; ?>">    
    </div>

    <div class="form-group">
        <label for="post_content">Post Content</label>
        <textarea class="form-control" name="post_content" cols="30" rows="10"><?php echo $post_content; ?> </textarea>    
    </div>

    <div class="form-group">
        <input type="submit" class="btn btn-primary" value="Update Post" name="update_post">    
    </div>
    
</form>