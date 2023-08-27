<?php

if (isset($_REQUEST['user_name']) && $_REQUEST['user_pass']) {
    echo json_encode(array('status' => 200, 'message' => 'Ok'));
} else {
    echo json_encode(array('status' => 400, 'message' => 'Not Ok'));
}
