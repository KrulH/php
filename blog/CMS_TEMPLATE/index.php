<?php include "../includes/db.php";?>
<?php include "../includes/header.php";?>



<!-- Navigation -->
<?php include "../includes/nav.php";?>

<!-- Page Content -->
<div class="container">

    <div class="row">

        <!-- Blog Entries Column -->
        <div class="col-md-8">
            <?php
            $query = "SELECT * FROM posts";
            $result = mysqli_query($connection, $query);
            while($row = mysqli_fetch_assoc($result)){
                $post_id = $row["post_id"];
                $post_title = $row["post_title"];
                $post_auhor = $row["post_auhor"];
                $post_date = $row["post_date"];
                $post_content = substr($row["post_content"],0,50);
                $post_image = $row["post_image"];
                $post_status = $row["post_status"];
                if($post_status !== 'published'){
                    echo " <h1>NO Post Sorry</h1>";
                    break;
                }else{
                    ?>
                    <h1 class="page-header">
                        Page Heading
                        <small>Secondary Text</small>
                    </h1>

                    <!-- First Blog Post -->
                    <h2>
                        <a href="post.php?p_id=<?php echo "{$post_id}"; ?>"><?php echo " {$post_title}"; ?></a>
                    </h2>
                    <p class="lead">
                        by <a href="index.php"><?php echo " {$post_auhor}"; ?></a>
                    </p>
                    <p><span class="glyphicon glyphicon-time"></span> <?php echo " {$post_date}"; ?></p>
                    <hr>
                    <img class="img-responsive" src="admin/images/<?php echo $post_image; ?>" alt="">
                    <hr>
                    <p><?php echo " {$post_content}"; ?></p>
                    <a class="btn btn-primary" href="#">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>

                    <hr>

                <?php }} ?>
        </div>

        <!-- Blog Sidebar Widgets Column -->
        <?php include "../includes/sidebar.php";?>

    </div>
    <!-- /.row -->

    <hr>

    <?php include "../includes/footer.php";?>
