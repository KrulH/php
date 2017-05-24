<?php include "../includes/header.php"; ?>
<table class="table table-bordered table-hover">
    <thead>
    <tr>
        <th>Id</th>
        <th>Username</th>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Email</th>
        <th>Role</th>
    </tr>
    </thead>
    <tbody>
    <?php
    $query = "SELECT * FROM users";
    $get_all_users = mysqli_query($connection, $query);

    while($row = mysqli_fetch_assoc($get_all_users)) {
        $user_id        = $row['id'];
        $username       = $row['username'];
        $user_password  = $row['password'];
        $user_firstname = $row['firstname'];
        $user_lastname  = $row['lastname'];
        $user_email     = $row['email'];
        $user_image     = $row['user_img'];
        $user_role      = $row['role'];

        echo "<tr>";
        echo "<td>{$user_id}</td>";
        echo "<td>{$username}</td>";
        echo "<td>{$user_firstname}</td>";

        echo "<td>{$user_lastname}</td>";
        echo "<td>{$user_email}</td>";
        echo "<td>{$user_role}</td>";

        echo "<td><a href='users.php?change_to_admin=$user_id' class='btn btn-success'>Admin</a></td>";
        echo "<td><a href='users.php?change_to_sub=$user_id' class='btn btn-warning'>Subscriber</a></td>";

        echo "<td><a href='users.php?source=edit_user&edit_user=$user_id' class='btn btn-default'>Edit</a></td>";

        echo "<td><a href='users.php?delete={$user_id}' class='btn btn-danger'>Delete</a></td>";

        echo "</tr>";
    }




    ?>
    </tbody>
</table>


<?php

if (isset($_GET['delete'])){
    $del_user_id = $_GET['delete'];

    $query = "DELETE FROM users WHERE id={$del_user_id} ";
    $delete_query = mysqli_query($connection, $query);
    header("Location: users.php");
}

if (isset($_GET['change_to_admin'])){
    $admin_id = $_GET['change_to_admin'];

    $query = "UPDATE users SET role = 'admin' WHERE id = $admin_id";
    $admin_query = mysqli_query($connection, $query);
    header("Location: users.php");
}

if (isset($_GET['change_to_sub'])){
    $sub_id = $_GET['change_to_sub'];

    $query = "UPDATE users SET role = 'subscriber' WHERE id = $sub_id";
    $sub_query = mysqli_query($connection, $query);
    header("Location: users.php");
}
?>









