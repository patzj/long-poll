<?php
if($_POST['status']) {
    $status = $_POST['status'];
    $id = $_POST['id'];

    $new_status = getStatus($id); // initial db query

    // check if status will change
    while($status === $new_status) {
        usleep(1000000);
        $new_status = getStatus($id); // re-query from db
    }

    echo $new_status; // return new status
}


function getStatus($id) {
    require 'connect.php';
    $sql = "SELECT * FROM Orders WHERE id=$id";
    $result = $conn->query($sql);

    if($result->num_rows === 1) {
        $row = $result->fetch_assoc();
        $data = $row['status'];
    } else {
        $data = 'Error';
    }

    $conn->close();
    return $data;
}

?>
