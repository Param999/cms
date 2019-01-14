<?php

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
        echo "<td><a href='categories.php?delete={$cat_id}'>Delete</a></td>";
        echo "<td><a href='categories.php?edit={$cat_id}'>Edit</a></td>";
        echo "</tr>";

    }
}

?>