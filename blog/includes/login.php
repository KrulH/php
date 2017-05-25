<?php include "db.php"; ?>
<?php session_start(); ?>
<?php
if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $username = mysqli_real_escape_string($connection, $username);
    $password = mysqli_real_escape_string($connection, $password);

    $query = "SELECT * FROM users WHERE username = '{$username}'";

    $select_user_query = mysqli_query($connection, $query);
    if(!$select_user_query){
        die("Failed: " . mysqli_error($connection));
    }

    while($row = mysqli_fetch_assoc($select_user_query)){

        $db_user_id         = $row['id'];
        $db_username        = $row['username'];
        $db_user_password   = $row['password'];
        $db_user_firstname  = $row['firstname'];
        $db_user_lastname   = $row['lastname'];
        $db_user_role       = $row['role'];

    }

    if($username == $db_username && $password == $db_user_password){

        $_SESSION['username']  = $db_username;
        $_SESSION['firstname'] = $db_user_firstname;
        $_SESSION['lastname']  = $db_user_lastname;
        $_SESSION['role']      = $db_user_role;


        header("Location: ../CMS_TEMPLATE/admin/index.php");

    } else {

        header("Location: ../index.php");
    }
}

?>
