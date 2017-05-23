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
            if(isset($_GET['p_id'])){
               $the_post_id = $_GET['p_id'];
            }
            $query = "SELECT * FROM posts WHERE post_id = $the_post_id";
            $result = mysqli_query($connection, $query);
            while($row = mysqli_fetch_assoc($result)){

                $post_title = $row["post_title"];
                $post_author = $row["post_auhor"];
                $post_date = $row["post_date"];
                $post_content = $row["post_content"];
                $post_image = $row["post_image"];
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
                    by <a href="index.php"><?php echo " {$post_author}"; ?></a>
                </p>
                <p><span class="glyphicon glyphicon-time"></span> <?php echo " {$post_date}"; ?></p>
                <hr>
                <img class="img-responsive" src="admin/images/<?php echo $post_image; ?>" alt="">
                <hr>
                <p><?php echo " {$post_content}"; ?></p>
                <a class="btn btn-primary" href="#">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>

                <hr>

            <?php } ?>
            <!-- Comments Form -->
            <?php

            if(isset($_POST["create_comment"])){
                $comment_author  = $_POST["author_name"];
                $comment_email   = $_POST["comment_email"];
                $comment_content = $_POST["comment_content"];
                $the_post_id     = $_GET["p_id"];
                // insert new comment into comments table
                $query = "INSERT INTO comments (com_post_id, date, author, email, content, status)";
                $query .= "VALUES ($the_post_id, now(), '{$comment_author}', '{$comment_email}', '{$comment_content}', 'unapproved')";
                $create_comment_query = mysqli_query($connection,$query);
                if(!$create_comment_query){
                    die("Query Failed: " . mysqli_error($connection));
                }
                // Query to increment comment count each time a comment is added
                $query = "UPDATE posts SET post_comment_count = post_comment_count + 1 ";
                $query .= "WHERE post_id = {$the_post_id} ";
                $increment_comment_count = mysqli_query($connection,$query);
            }
            ?>
            <div class="well">
                <h4>Leave a Comment:</h4>
                <form role="form" method="post" action="">
                    <div class="form-group">
                        <label for="author_name">Name</label>
                        <input name="author_name" type="text" class="form-control" placeholder="Fred Flinstone">
                    </div>
                    <div class="form-group">
                        <label for="comment_email">Email Address</label>
                        <input name="comment_email" class="form-control" type="email" placeholder="fart@example.com">
                    </div>

                    <div class="form-group">
                        <label for="comment_content">Comment</label>
                        <textarea class="form-control" rows="3" name="comment_content" placeholder="Blah Blah Blah.."></textarea>
                    </div>
                    <button type="submit" name="create_comment" class="btn btn-primary">Submit</button>
                </form>
            </div>

            <hr>
            <!-- Posted Comments -->
            <?php
            // QUERY to select all approved comments for this post.
            $query = "SELECT * FROM comments WHERE com_post_id = {$the_post_id} ";
            $query .= "AND status = 'approved' ";
            $query .= "ORDER BY comment_id DESC";
            $select_comment_query = mysqli_query($connection,$query);
            if(!$select_comment_query){
                die("ERROR: " . mysqli_error($connection));
            }
            while($row = mysqli_fetch_assoc($select_comment_query)){
            $comment_date    = $row['date'];
            $comment_content = $row['content'];
            $comment_author = $row['author'];
            ?>
            <!-- Comment -->
                <div class="media">
                    <a class="pull-left" href="#">
                        <img class="media-object" src="http://placehold.it/64x64" alt="">
                    </a>
                    <div class="media-body">
                        <h4 class="media-heading"><?php echo $comment_author; ?>
                            <small>Published on: <?php echo $comment_date; ?></small>
                        </h4>
                        <?php echo $comment_content; ?>
                    </div>
                </div>

<?php } ?>
        </div>

        <!-- Blog Sidebar Widgets Column -->
        <?php include "../includes/sidebar.php";?>

    </div>
    <!-- /.row -->

    <hr>

    <?php include "../includes/footer.php";?>
