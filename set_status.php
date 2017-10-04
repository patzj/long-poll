<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Set Status</title>
    </head>
    <body>
        <form action="set_status.php" method="post">
            <input type="hidden" name="id" value="1" />
            <label>Status: </label>
            <select name="status">
                <option value="New">New</option>
                <option value="Pending">Pending</option>
                <option value="Cancelled">Cancelled</option>
                <option value="Completed">Completed</option>
            </select><br />
            <button type="submit" name="save">Save</button>
        </form>

        <?php
        if(isset($_POST['save'])) {
            require_once 'connect.php';

            $status = $_POST['status'];
            $id = $_POST['id'];
            $sql = "UPDATE Orders SET status='$status' WHERE id=$id";

            if($conn->query($sql) === true) {
                echo "status changed";
            } else {
                echo "error";
            }

            $conn->close();
        }
        ?>
    </body>
</html>
