<?php

include 'mysql_connect.php';
$conn->select_db("dev_database");

$name = $_POST['txt_name'];
$detail = $_POST['txt_detail'];
$sex = $_POST['sex'];
$date = date('Y-m-d H:i:s');

$sql = "INSERT INTO `comments` 
			(`id`, `name`, `detail`, `sex`, `date_record`) 
			VALUES 
			(NULL, '$name', '$detail', '$sex', '$date');";
//echo $sql;
$query = $conn->query($sql);

if (!$query) {
    printf("Error : ", $conn->error);
    exit();
}

printf ("New Record has id %d.\n", $conn->insert_id);

?>
