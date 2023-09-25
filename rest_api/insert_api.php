<?php
include "config.php";
header("Content-Type:application/json");
if ($_SERVER['REQUEST_METHOD'] === "POST") {
    $data = json_decode(file_get_contents('php://input'), true);
    $name = $data['name'];
    $email = $data['email'];
    if (isset($name) && isset($email)) {
        $result = true;
        $sql = "INSERT INTO users(name,email)VALUES(?,?)";
        $result = $conn->prepare($sql);
        $result->bind_param('ss', $name, $email);
        $result->execute();
        $result->close();
        $message = array(
            'name' => $name,
            'email' => $email
        );
        echo json_encode(array('status' => 200, 'message' => $message));
    } else {
        echo json_encode(array('status' => 400, "message" => 'Send Valid Data'));
    }
}
