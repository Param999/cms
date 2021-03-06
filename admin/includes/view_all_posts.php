<table class="table table-bordered table-hover">
    <thead>
        <tr>
            <th>Id</th>
            <th>Author</th>
            <th>Title</th>
            <th>Category</th>
            <th>Status</th>
            <th>Image</th>
            <th>Tags</th>
            <th>Comments</th>
            <th>Date</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody>

        <?php
            $query = "SELECT * FROM posts";
            $posts_result = mysqli_query($connection, $query);

            while ($row = mysqli_fetch_assoc($posts_result)) {
                $post_id = $row['post_id'];
                $post_title = $row['post_title'];
                $post_author = $row['post_author'];
                $post_date = $row['post_date'];
                $post_image = $row['post_image'];
                $post_status = $row['post_status'];
                $post_comment_count = $row['post_comment_count'];
                $post_tags = $row['post_tags'];
                $post_category_id = $row['post_category_id'];
            
                echo "<tr>";
                echo "<td>{$post_id}</td>";
                echo "<td>{$post_author}</td>";
                echo "<td><a href='../post.php?post_id=$post_id'>{$post_title}</a></td>";

                $query = "SELECT cat_title FROM categories WHERE cat_id = $post_category_id";
                $catagories_result = mysqli_query($connection, $query);
                while ($row = mysqli_fetch_assoc($catagories_result)) {
                    $cat_title = $row['cat_title'];
                    //$cat_id = $row['cat_id'];

                echo "<td>{$cat_title}</td>";
                }
                echo "<td>{$post_status}</td>";
                echo "<td><img width='100' src='../images/{$post_image}'></td>";
                echo "<td>{$post_tags}</td>";
                echo "<td>{$post_comment_count}</td>";
                echo "<td>{$post_date}</td>";
                echo "<td><a href='posts.php?source=edit_post&post_id={$post_id}'>Edit</a></td>";
                echo "<td><a href='posts.php?delete={$post_id}'>Delete</a></td>";
                echo "</tr>";
            }
        ?>

        <?php
            deletePost();
        ?>

    </tbody>
</table>