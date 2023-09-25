<?php
include "config.php";
header("Content-Type: application/json");
if ($_SERVER['REQUEST_METHOD'] === "POST") {
    $data = json_decode(file_get_contents("php://input"), true);
    $name = $data['name'];
    $email = $data['email'];
    $result = array(
        "name" => $name,
        "email" => $email
    );
    echo json_encode($result);
}
if ($_SERVER['REQUEST_METHOD'] === "GET") {
    $id = $_GET['id'];
    $result = array(
        "param" => $id
    );
    echo json_encode($result);
}
