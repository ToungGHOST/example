<?php
$conn = mysqli_connect("localhost","tobedev","dev.1234");

if (!$conn->set_charset("utf8")) {
    printf("Error loading character set utf8: %s\n", $conn->error);
    exit();
}

$conn->select_db("test");
$conn->select_db("dev_database");

?>
