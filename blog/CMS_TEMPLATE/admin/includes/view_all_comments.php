<table class="table table-bordered table-hover ">
    <thead>
    <tr>
        <th><input id="selectAllBoxes" type="checkbox"></th>
        <th>Id</th>
        <th>Author</th>
        <th>Comment</th>
        <th>Email</th>
        <th>Status</th>
        <th>In Response To</th>
        <th>Date</th>
        <th>Approve</th>
        <th>Unapprove</th>
        <th>Delete</th>
    </tr>
    </thead>
    <tbody>
    <?php
    $query = "SELECT * FROM comments";
    $result = mysqli_query($connection, $query);
    while($row = mysqli_fetch_assoc($result)) {
        $comment_id = $row["comment_id"];
        $comment_post_id = $row["com_post_id"];
        $comment_author = $row["author"];
        $comment_status = $row["status"];
        $comment_email = $row["email"];
        //$comment_status = $row["status"];
        $comment_date = $row["date"];
        $comment_content = $row["content"];
        echo "<tr>";
        echo "<td><input class='checkBoxes' id='' type='checkbox' name='checkBoxArray[]' value='$comment_id'></td>";
        echo "<td>{$comment_post_id}</td>";
        echo "<td>{$comment_author}</td>";
        echo "<td>{$comment_content}</td>";
        echo "<td>{$comment_email}</td>";
        echo "<td>{$comment_status}</td>";

        $query = "SELECT * FROM posts WHERE post_id = $comment_post_id";

        $select_post_id = mysqli_query($connection,$query);

        while($row = mysqli_fetch_assoc($select_post_id)){
            $post_title = $row['post_title'];
            $post_id = $row['post_id'];


            echo "<td><a href='../post.php?p_id=$post_id'>{$post_title}</a></td>";
        }
        echo "<td>{$comment_date}</td>";
        echo "<td class='btn-toolbar'><a href='posts.php?delete={$post_id}' class='btn btn-danger'>Approve</a>";
        echo "<td class='btn-toolbar'><a href='posts.php?source=edit_post&p_id={$post_id}' class='btn btn-info'>Unapprove</a></td>";
        echo "<td class='btn-toolbar'><a href='comment.php?delete={$comment_id}' class='btn btn-danger'>Delete</a>";
        echo "<tr>";

    if(isset($_GET['delete'])){
        $delete_comment = $_GET['delete'];
        $query = "DELETE FROM comments WHERE comment_id = {$comment_id}";
        $result = mysqli_query($connection, $query);
        header("location: comment.php");
    }}
    ?>
    </tbody>
</table>