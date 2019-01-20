<?php
    if(isset($_POST['create_post'])){
        $post_title = $_POST['post_title'];
        $post_author = $_POST['post_author'];
        $post_status = $_POST['post_status'];
        $post_tags = $_POST['post_tags'];
        $post_category_id = $_POST['post_category'];
        $post_content = $_POST['post_content'];
        $post_date = date('d-m-y');
        $post_image = $_FILES['image']['name'];
        $post_image_temp = $_FILES['image']['tmp_name'];
        //$post_comment_count = 4;
        
        move_uploaded_file($post_image_temp, "../images/$post_image");

        $query = "INSERT INTO posts(post_category_id, post_title, post_author, post_date, post_image, post_content,post_tags, post_status)";
        $query .= "VALUES({$post_category_id}, '{$post_title}', '{$post_author}', now(), '{$post_image}', '{$post_content}','{$post_tags}', '{$post_status}')";

        $result = mysqli_query($connection, $query);
        confirmQuery($result);

    }
?>

<form action="" method="post" enctype="multipart/form-data">

    <div class="form-group">
        <label for="user_firstname">First Name</label>
        <input type="text" class="form-control" name="user_firstname">    
    </div>

    <div class="form-group">
        <label for="user_lastname">Last Name</label>
        <input type="text" class="form-control" name="user_lastname">    
    </div>

    <div class="form-group">
        <select name="user_role" id="">
           <option value="admin">Admin</option>
           <option value="subscriber">Subscriber</option>
        </select>
    </div>

    <div class="form-group">
        <label for="username">Username</label>
        <input type="text" class="form-control" name="username">    
    </div>

    <div class="form-group">
        <label for="user_password">Password</label>
        <input type="password" class="form-control" name="user_password">    
    </div>

    <div class="form-group">
        <label for="user_email">Email</label>
        <input type="email" class="form-control" name="user_email">    
    </div>

    <div class="form-group">
        <input type="submit" class="btn btn-primary" value="Add user" name="add_user">    
    </div>
    
</form>