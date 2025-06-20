<?php
// echo json_encode($_REQUEST);
header("Access-Control-Allow-Origin:*");
header("Access-Control-Allow-Methods: PUT, DELETE");
if($_SERVER['REQUEST_METHOD'] == 'GET') {
    echo "1";
}else if($_SERVER['REQUEST_METHOD'] == 'POST') {
    echo "2";
}else if($_SERVER['REQUEST_METHOD'] == 'PUT') {
    echo "3";
}else if($_SERVER['REQUEST_METHOD'] == "DELETE") {
    echo "4";
}