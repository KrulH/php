<?php include "includes/header.php";?>

        <div id="page-wrapper">
<?php //if($connection){echo "it is ok";}else{echo "not ok";} ?>
            <div class="container-fluid">

                <!-- Page Heading -->
                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Welcome to Admin

                            <small><?php echo $_SESSION['username']; ?></small>

                        </h1>

                    </div>
                </div>
                <!-- /.row -->
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

<?php include "includes/footer.php";?>
