<?php 

require_once "../database/connection.php";


if (isset($_POST['status']) && isset($_POST['id'])) {
    $status = intval($_POST['status']);
    $id = intval($_POST['id']);
    $update = mysqli_query($conn,"UPDATE `users` SET `role`='$status' WHERE id = '$id'");
}

?>