<?php
include('../class/db_class.php');
$conn = new Database();
$username = $_POST['username'];
$password = $_POST['password'];
$conn->proses_login($username,$password);

?>