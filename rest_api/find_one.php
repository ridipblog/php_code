<?php
include "config.php";
header("Content-Type:application/json");
if ($_SERVER['REQUEST_METHOD'] === "GET") {
    if (isset($_GET['email'])) {
        $email = $_GET['email'];
        $sql = "SELECT * FROM users WHERE email=?";
        $result = true;
        $result = $conn->prepare($sql);
        $result->bind_param('i', $email);
        $result->execute();
        $data = $result->get_result();
        $rows = $data->fetch_all(MYSQLI_ASSOC);
        echo json_encode(array('status' => 200, 'message' => $rows));
    } else {
        echo json_encode(array('status' => 400, 'message' => 'Send Valid Data'));
    }
}
