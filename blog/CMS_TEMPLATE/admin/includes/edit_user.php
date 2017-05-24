<?php

if(isset($_GET["edit_user"])){
    $edit_user_id = $_GET["edit_user"];

    $query = "SELECT * FROM users WHERE id = $edit_user_id";
    $select_user = mysqli_query($connection, $query);

    while($row = mysqli_fetch_assoc($select_user)){

        $user_firstname = $row["firstname"];
        $user_lastname  = $row["lastname"];
        $user_role      = $row["role"];
        $username       = $row["username"];
        $user_email     = $row["email"];
        $user_password  = $row["password"];
    }

}
if (isset($_POST['update_user'])){

    $user_firstname   = $_POST['user_firstname'];
    $user_lastname    = $_POST['user_lastname'];
    $user_role        = $_POST['user_role'];

    $username         = $_POST['username'];
    $user_email       = $_POST['user_email'];
    $user_password    = $_POST['user_password'];

    $query = "UPDATE users SET ";
    $query .= "firstname = '{$user_firstname}', ";
    $query .= "lastname = '{$user_lastname}', ";
    $query .= "role = '{$user_role}', ";
    $query .= "username = '{$username}', ";
    $query .= "email = '{$user_email}', ";
    $query .= "password= '{$user_password} ' ";
    $query .= "WHERE id = '{$edit_user_id}'";


    $update_user_query = mysqli_query($connection, $query);
    confirm($update_user_query);

}


?>
<form action="" method="post" enctype="multipart/form-data">

    <div class="form-group">
        <label for="author">First Name</label>
        <input value="<?php echo $user_firstname; ?>" type="text" class="form-control" name="user_firstname">
    </div>

    <div class="form-group">
        <label for="post_status">Last Name</label>
        <input value="<?php echo $user_lastname; ?>" type="text" class="form-control" name="user_lastname">
    </div>

    <div class="form-group">
        <label for="categories">User Role</label>

        <select name="user_role" class="form-control">
            <option value="<?php echo $user_role; ?>"><?php echo $user_role; ?></option>
            <?php
            if($user_role == "admin"){
                echo "<option value='subscriber'>subscriber</option>";
            } else {
                echo "<option value='admin'>admin</option>";
            }

            ?>
        </select>
    </div>



    <!--
        <div class="form-group">
            <label for="post_image">User Image</label>
            <input type="file" name="user_image">
            <p class="help-block">Select a profile picture.</p>
        </div>
    -->

    <div class="form-group">
        <label for="post_tags">Username</label>
        <input value="<?php echo $username; ?>" type="text" class="form-control" name="username">
    </div>

    <div class="form-group">
        <label for="post_content">User Email</label>
        <input value="<?php echo $user_email; ?>" type="email" class="form-control" name="user_email">
    </div>

    <div class="form-group">
        <label for="password">Password</label>
        <input value="<?php echo $user_password; ?>" type="password" class="form-control" name="user_password">
    </div>

    <div class="form-group">
        <input type="submit" class="btn btn-primary" name="update_user" value="Update User">
    </div>
</form>