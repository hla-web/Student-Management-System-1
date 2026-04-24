<?php
include('jk.php');

$id = $_GET['id'];

$query = "DELETE FROM students WHERE id='$id'";
mysqli_query($connection, $query);

header("location:index.php?delete_msg=Data deleted successfully");
?>