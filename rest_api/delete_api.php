<?php
include "config.php";
header("Content-Type:application/json");
if ($_SERVER['REQUEST_METHOD'] === "GET") {
    if (isset($_GET['id'])) {
        $result = true;
        $sql = "DELETE FROM users WHERE id=?";
        $result = $conn->prepare($sql);
        $result->bind_param('i', $_GET['id']);
        $result->execute();
        $result->close();
        echo json_encode(array('status' => 200, 'message' => 'Deleted Data'));
    } else {
        echo json_encode(array('status' => 400, 'message' => 'Send Valid Data'));
    }
}
