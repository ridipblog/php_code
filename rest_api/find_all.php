<?php
include "config.php";
header("Content-Type:application/json");
if ($_SERVER['REQUEST_METHOD'] === "GET") {
    $sql = "SELECT * FROM users";
    $result = $conn->query($sql);
    $rows = $result->fetch_all(MYSQLI_ASSOC);
    $conn->close();
    echo json_encode(array('status' => 200, 'message' => $rows));
}
