<table class="table table-bordered table-hover">
    <thead>
        <tr>
            <th>Id</th>
            <th>Username</th>
            <th>Firstname</th>
            <th>Lastname</th>
            <th>Email</th>
            <th>Role</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody>

        <?php
            $query = "SELECT * FROM users";
            $users_result = mysqli_query($connection, $query);

            while ($row = mysqli_fetch_assoc($users_result)) {
                $user_id = $row['user_id'];
                $username = $row['username'];
                $user_firstname = $row['user_firstname'];
                $user_lastname = $row['user_lastname'];
                $user_email = $row['user_email'];
                $user_role = $row['user_role'];
               
                echo "<tr>";
                echo "<td>{$user_id}</td>";
                echo "<td>{$username}</td>";
                echo "<td>{$user_firstname}</td>";
                echo "<td>{$user_lastname}</td>";
                echo "<td>{$user_email}</td>";
                echo "<td>{$user_role}</td>";
                echo "<td><a href='users.php?source=edit_user&uid={$user_id}'>Edit</a></td>";
                echo "<td><a href='users.php?delete={$user_id}'>Delete</a></td>";
                echo "<td><a href='users.php?admin={$user_id}'>Admin</a></td>";
                echo "<td><a href='users.php?sub={$user_id}'>Subscriber</a></td>";
                echo "</tr>";
            }
        ?>

        <?php
            makeAdmin();
            makeSub();
            deleteUser();
        ?>

    </tbody>
</table>