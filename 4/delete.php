<?php
    include "connection.php";

    $id = $_GET['id'];
    mysqli_query($conn, "DELETE FROM user_tb WHERE user_id=$id");
    header('Location: index.php');

?>