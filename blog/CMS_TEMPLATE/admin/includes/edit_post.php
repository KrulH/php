<?php
if(isset($_GET['p_id'])){
    $id =   $_GET['p_id'];
}
$query = "SELECT * FROM posts";
$result = mysqli_query($connection, $query);
while($row = mysqli_fetch_assoc($result)) {
    $post_title = $row["post_title"];
    $post_id = $row["post_id"];
    $post_category_id = $row["post_cat_id"];
    $post_author = $row["post_auhor"];
    $post_date = $row["post_status"];
    $post_status = $row["post_date"];
    $post_image = $row["post_image"];
    $post_content = $row["post_content"];
    $post_comment_count = $row["post_comment_count"];
    $post_tags = $row["post_tags"];
}
?>
<form action="" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label for="title">Post Title</label>
        <input value="<?php echo $post_title;?>" type="text" class="form-control" name="title">
    </div>

    <div class="form-group">
        <!--        <label for="categories">Post Category Id</label>-->
        <!--        <input value="--><?php //echo $post_category_id;?><!--" type="text" name="post_category_id" class="form-control">
-->
        <select class="form-group" name=""><?php
            $query = "SELECT * FROM category";
            $result = mysqli_query($connection, $query);
            confirm($result);
            while($row = mysqli_fetch_assoc($result)){
            $cat_title = $row["cat_title"];
            $cat_id = $row["cat_id"];
            echo "<option value=''>{$cat_title}</option>";}
            ?>
            <select/>

    </div>

    <div class="form-group">
        <label for="author">Post Author</label>
        <input value="<?php echo $post_author;?>" type="text" class="form-control" name="author">
    </div>

    <div class="form-group">
        <label for="post_status">Post Status</label>
        <input value="<?php echo $post_status;?>" type="text" class="form-control" name="post_status">
    </div>

    <div class="form-group">
        <img src="../images/<?php echo $post_image;?>" width="100">
    </div>

    <div class="form-group">
        <label for="post_tags">Post Tags</label>
        <input value="<?php echo $post_tags;?>" type="text" class="form-control" name="post_tags">
    </div>

    <div class="form-group">
        <label for="post_content">Post Content</label>
        <textarea name="post_content" id="" cols="30" rows="10" class="form-control"><?php echo $post_content;?></textarea>
    </div>

    <div class="form-group">
        <input type="submit" class="btn btn-primary" name="create_post" value="Publish Post">
    </div>
</form>