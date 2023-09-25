<?php
include "config.php";
header('Content-Type:application/json');
if ($_SERVER['REQUEST_METHOD'] === "POST") {
    $data = json_decode(file_get_contents('php://input'), true);
    if (isset($_GET['id'])) {
        if (isset($data['name']) && isset($data['email'])) {
            $name = $data['name'];
            $email = $data['email'];
            $id = $_GET['id'];
            $result = true;
            $sql = "UPDATE users SET name=?,email=? WHERE id=?";
            $result = $conn->prepare($sql);
            $result->bind_param('ssi', $name, $email, $id);
            $result->execute();
            $result->close();
            echo json_encode(array('status' => 200, 'message' => 'Updated Data'));
        } else {
            echo json_encode(array('status' => 400, 'message' => 'send Valid Data'));
        }
    } else {
        echo json_encode(array('status' => 400, 'message' => 'Send Valid Data'));
    }
}
