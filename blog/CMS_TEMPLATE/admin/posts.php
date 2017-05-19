<?php //ob_start(); ?>
<?php include "includes/header.php";?>
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                    Welcome to Admin
                    <small>Author</small>
                </h1>
                <?php
                if(isset($_GET['source'])){
                    $source = $_GET['source'];
                }else{
                    $source = "";
                }

                switch($source){
                    case 'add_post';
                        include "includes/add_post.php";
                        break;
                    case 'edit_post';
                        include "includes/edit_post.php";
                        break;
                    default:
                        include "includes/view_all.posts.php";
                }

                ?>

            </div>
        </div>
    </div>
</div>
<?php include "includes/footer.php";?>
