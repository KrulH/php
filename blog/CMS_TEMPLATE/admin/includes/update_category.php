<form action="#" method="post">
    <div class="form-group">
        <label for="cat-title">Edit a Category Title</label>
        <?php
        if(isset($_GET['edit'])){
            $cat_id = $_GET['edit'];
            $query = "SELECT * FROM category where cat_id = $cat_id";
            $result = mysqli_query($connection, $query);
            while($row = mysqli_fetch_assoc($result)){
                $cat_title = $row["cat_title"];
                $cat_id = $row["cat_id"];
                ?>
                <input value="<?php if(isset($cat_title)){echo $cat_title;} ;?>" class="form-control" type="text" name="cat_title">
            <?php   }}?>
        <?php
        if(isset($_POST['update_category'])){
            $cat_title = $_POST['cat_title'];
            $query = "UPDATE category SET cat_title = '{$cat_title}' WHERE cat_id = {$cat_id} ";
            $result = mysqli_query($connection, $query);
            header("Location: categories.php");
        }
        ?>
    </div>
    <div class="form-group">
        <input class="btn-primary" type="submit" name="update_category" value="Update Category">
    </div>
</form>