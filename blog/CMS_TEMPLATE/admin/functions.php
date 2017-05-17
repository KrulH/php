<?php
function insert_categories(){
    if(isset($_POST['submit'])){
        global $connection;
        $cat_title = $_POST['cat_title'];
        if($cat_title == "" || empty($cat_title)){
            echo "<h1>Can not be empty</h1>";
        }else{
            $query = "INSERT INTO category(cat_title) VALUE('{$cat_title}')";
            $result = mysqli_query($connection, $query);
            if(!$result) {
                die("Query failed". mysqli_error($connection));
            }
        }
    }
}

function findAllCategories(){
    global $connection;
    $query = "SELECT * FROM category";
    $result = mysqli_query($connection, $query);
    while($row = mysqli_fetch_assoc($result)){
        $cat_title = $row["cat_title"];
        $cat_id = $row["cat_id"];
        echo "<tr>";
        echo "<td>{$cat_id}</td>";
        echo "<td>{$cat_title}</td>";
        echo "<td><a href='categories.php?delete={$cat_id}'>Delete</a></td>";
        echo "<td><a href='categories.php?edit={$cat_id}'>Update</a></td>";
        echo "</tr>";
    }

}
function deleteCategory(){
    global $connection;
    if(isset($_GET['delete'])){
        $cat_id = $_GET['delete'];
        $query = "DELETE FROM category WHERE cat_id = {$cat_id}";
        $result = mysqli_query($connection, $query);
        header("Location: categories.php");
    }
}

function confirm($result) {
    // function used to return error if there is a connection issue
    global $connection;
    if(!$result) {
        die("Query Failed, " . mysqli_error($connection));
    }}
?>