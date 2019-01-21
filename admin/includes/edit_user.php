<?php
    if(isset($_GET['uid'])){
        $user_id = $_GET['uid'];
        
        $query = "SELECT * FROM users WHERE user_id = {$user_id}";
        $users_result = mysqli_query($connection, $query);

        while ($row = mysqli_fetch_assoc($users_result)) {
            //$user_id = $row['user_id'];
            $username = $row['username'];
            $user_firstname = $row['user_firstname'];
            $user_lastname = $row['user_lastname'];
            $user_email = $row['user_email'];
            $user_role = $row['user_role'];
            $user_password = $row['user_password'];
        }
    }
    
    if(isset($_POST['update_user'])){
        $user_firstname = $_POST['user_firstname'];
        $user_lastname = $_POST['user_lastname'];
        $user_role = $_POST['user_role'];
        $username = $_POST['username'];
        $user_password = $_POST['user_password'];
        $user_email = $_POST['user_email'];

        //move_uploaded_file($post_image_temp, "../images/$post_image");

        $query = "UPDATE users SET user_firstname = '{$user_firstname}', user_lastname = '{$user_lastname}', user_role ='{$user_role}', username = '{$username}', ";
        $query .= "user_password = '{$user_password}', user_email = '{$user_email}' ";
        $query .= "WHERE user_id = {$user_id}";

        $update_query = mysqli_query($connection, $query);
        confirmQuery($update_query);

    }
?>

<form action="" method="post" enctype="multipart/form-data">

    <div class="form-group">
        <label for="user_firstname">First Name</label>
        <input type="text" class="form-control" name="user_firstname" value="<?php echo $user_firstname; ?>">    
    </div>

    <div class="form-group">
        <label for="user_lastname">Last Name</label>
        <input type="text" class="form-control" name="user_lastname" value="<?php echo $user_lastname; ?>">    
    </div>

    <div class="form-group">
        <select name="user_role" id="">
           <option value="<?php echo $user_role; ?>"><?php echo $user_role; ?></option>

           <?php
                if($user_role == "admin"){
                    echo "<option value='subscriber'>subscriber</option>";
                }else{
                    echo "<option value='admin'>admin</option>";
                }
           ?>
          
        </select>
    </div>

    <div class="form-group">
        <label for="username">Username</label>
        <input type="text" class="form-control" name="username" value="<?php echo $username; ?>">    
    </div>

    <div class="form-group">
        <label for="user_password">Password</label>
        <input type="password" class="form-control" name="user_password" value="<?php echo $user_password; ?>>    
    </div>

    <div class="form-group">
        <label for="user_email">Email</label>
        <input type="email" class="form-control" name="user_email" value="<?php echo $user_email; ?>">    
    </div>

    <div class="form-group">
        <input type="submit" class="btn btn-primary" value="Update user" name="update_user">    
    </div>
    
</form>