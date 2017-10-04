<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Long Poll</title>
        <script src="assets/js/jquery-3.2.1.min.js" charset="utf-8"></script>
        <script src="assets/js/main.js" charset="utf-8" defer></script>
    </head>
    <body>
        <?php
        require_once 'connect.php';

        $sql = "SELECT * FROM Orders WHERE id=1";
        $result = $conn->query($sql);

        if($result->num_rows === 1) {
            $row = $result->fetch_assoc();
        }

        $conn->close();
        ?>
        <h1>
            Status: <span id="status" style="color: red;"><?php echo $row['status']; ?></span>
            <input type="hidden" id="id" value="<?php echo $row['id']; ?>" />
        </h1>
        <input type="text" placeholder="type anything..." />
    </body>
</html>
