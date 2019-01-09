<?php include "includes/admin_header.php";?>

    <div id="wrapper">

        <!-- Navigation -->
        <?php include "includes/admin_navigation.php";?>

        <div id="page-wrapper">


            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Welcome to Admin Page
                            <small>PHP rocks!</small>
                        </h1>

                       
                        <div class="col-xs-6">
                        <?php
                            if(isset($_POST['submit'])){
                                $cat_title = $_POST['cat_title'];

                                if($cat_title == "" | empty($cat_title)){
                                    echo "<h1>Shouldn't be empty bro!</h1>";
                                }else{
                                    $query = "INSERT INTO categories(cat_title) VALUE('{$cat_title}')";
                                    $catagories_result = mysqli_query($connection, $query);

                                    if(!$catagories_result){
                                        die("Insert failed!" . mysqli_error($connection));
                                    }
                                }
                            }
                        ?>

                            <form action="" method="POST">
                                <div class="form-group">
                                    <label for="cat_title">Add Category</label>
                                    <input type="text" class="form-control" name="cat_title" >
                                </div>
                                <div class="form-group">
                                <input type="submit" class="btn btn-primary" value="submit" name="submit">
                                </div>
                            </form>
                        </div>

                        <div class="col-xs-6">
                        <?php
                            $query = "SELECT * FROM categories";
                            $catagories_result = mysqli_query($connection, $query);
                        ?>
                            <table class="table table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Category Title</th>
                                </tr>
                                </thead>
                                <tbody>
                                   
                                    <?php
                                        while($row = mysqli_fetch_assoc($catagories_result)){
                                            $cat_title = $row['cat_title']; 
                                            $cat_id = $row['cat_id']; 
                                            
                                            echo "<tr>";
                                            echo "<td>{$cat_id}</td>";
                                            echo "<td>{$cat_title}</td>"; 
                                            echo "</tr>";

                                        } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

        <?php include "includes/admin_footer.php";?>