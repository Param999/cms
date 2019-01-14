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
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>127</td>
                                <td>Param</td>
                                <td>PHP</td>
                                <td>Programming</td>
                                <td>Approved</td>
                                <td>img</td>
                                <td>PHP,Param</td>
                                <td>Awesome</td>
                                <td>15-1-2019</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- /.row -->

        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- /#page-wrapper -->

    <?php include "includes/admin_footer.php";?>