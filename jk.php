<?php
$connection = mysqli_connect("localhost", "root", "", "crud_operation");

if (!$connection) {
    die("Connection Failed: " . mysqli_connect_error());
}
?>