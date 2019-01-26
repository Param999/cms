<?php

function confirmQuery($result){
    global $connection;

    if(!$result){
        die("Query failed " . mysqli_error($connection));
    }
}

function insertCategories()
{
    global $connection;
    if (isset($_POST['submit'])) {
        $cat_title = $_POST['cat_title'];

        if ($cat_title == "" | empty($cat_title)) {
            echo "<h4>Shouldn't be empty bro!</h4>";
        } else {
            $query = "INSERT INTO categories(cat_title) VALUE('{$cat_title}')";
            $catagories_result = mysqli_query($connection, $query);

            if (!$catagories_result) {
                die("Insert failed!" . mysqli_error($connection));
            }
        }
    }
}

function deleteCategories()
{
    global $connection;
    if (isset($_GET['delete'])) {
        $del_cat_id = $_GET['delete'];
        $query = "DELETE FROM categories WHERE cat_id = {$del_cat_id}";
        $del_query_result = mysqli_query($connection, $query);
        if (!$del_query_result) {
            die('Delete failed!' . mysqli_error($connection));
        } else {
            header("Location: categories.php");
        }
    }
}

function fetchAllCategories()
{
    global $connection;
    $query = "SELECT * FROM categories";
    $catagories_result = mysqli_query($connection, $query);
    while ($row = mysqli_fetch_assoc($catagories_result)) {
        $cat_title = $row['cat_title'];
        $cat_id = $row['cat_id'];

        echo "<tr>";
        echo "<td>{$cat_id}</td>";
        echo "<td>{$cat_title}</td>";
        echo "<td><a href='categories.php?edit={$cat_id}'>Edit</a></td>";
        echo "<td><a href='categories.php?delete={$cat_id}'>Delete</a></td>";
        echo "</tr>";

    }
}

function deletePost(){
    global $connection;
    if(isset($_GET['delete'])){
        $del_post_id = $_GET['delete'];
        $query = "DELETE FROM posts where post_id = {$del_post_id}";
        $del_query_result = mysqli_query($connection, $query);
        if (!$del_query_result) {
            die('Delete failed!' . mysqli_error($connection));
        } else {
            header("Location: posts.php");
        }
    }
}

function deleteComment(){
    global $connection;
    if(isset($_GET['delete'])){
        $del_comment_id = $_GET['delete'];
        $query = "DELETE FROM comments where comment_id = {$del_comment_id}";
        $del_query_result = mysqli_query($connection, $query);
        if (!$del_query_result) {
            die('Delete failed!' . mysqli_error($connection));
        } else {
            header("Location: comments.php");
        }
    }
}

function approveComment(){
    global $connection;
    if(isset($_GET['approve'])){
        $comment_id = $_GET['approve'];
        $query = "UPDATE comments SET comment_status = 'approved' WHERE comment_id = {$comment_id}";
        $comment_result = mysqli_query($connection, $query);
        if (!$comment_result) {
            die('Query failed!' . mysqli_error($connection));
        } else {
            header("Location: comments.php");
        }
    }
}

function unapproveComment(){
    global $connection;
    if(isset($_GET['unapprove'])){
        $comment_id = $_GET['unapprove'];
        $query = "UPDATE comments SET comment_status = 'unapproved' WHERE comment_id = {$comment_id}";
        $comment_result = mysqli_query($connection, $query);
        if (!$comment_result) {
            die('Query failed!' . mysqli_error($connection));
        } else {
            header("Location: comments.php");
        }
    }
}

function deleteUser(){
    global $connection;
    if(isset($_GET['delete'])){
        $del_user_id = $_GET['delete'];
        $query = "DELETE FROM users where user_id = {$del_user_id}";
        $del_query_result = mysqli_query($connection, $query);
        if (!$del_query_result) {
            die('Delete failed!' . mysqli_error($connection));
        } else {
            header("Location: users.php");
        }
    }
}

function makeAdmin(){
    global $connection;
    if(isset($_GET['admin'])){
        $user_id = $_GET['admin'];
        $query = "UPDATE users SET user_role = 'admin' WHERE user_id = {$user_id}";
        $result = mysqli_query($connection, $query);
        if (!$result) {
            die('Query failed!' . mysqli_error($connection));
        } else {
            header("Location: users.php");
        }
    }
}

function makeSub(){
    global $connection;
    if(isset($_GET['sub'])){
        $user_id = $_GET['sub'];
        $query = "UPDATE users SET user_role = 'subscriber' WHERE user_id = {$user_id}";
        $result = mysqli_query($connection, $query);
        if (!$result) {
            die('Query failed!' . mysqli_error($connection));
        } else {
            header("Location: users.php");
        }
    }
}

function countRows($table){
    global $connection;
    $query = "SELECT * FROM {$table}";
    $result = mysqli_query($connection, $query);
    confirmQuery($result);
    $count = mysqli_num_rows($result);
    return $count;
}

?>