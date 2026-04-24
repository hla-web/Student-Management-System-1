<?php
include('jk.php');

if (isset($_POST['add_students'])) {

    $first_name = $_POST['first_name'];
    $last_name  = $_POST['last_name'];
    $age        = $_POST['age'];

    if ($first_name == "") {
        header("location:index.php?message=You need to fill in the first name!");
    } else {

        $query = "INSERT INTO students (first_name, last_name, age)
                  VALUES ('$first_name', '$last_name', '$age')";

        $result = mysqli_query($connection, $query);

        if (!$result) {
            die("Insert Failed: " . mysqli_error($connection));
        }

        header("location:index.php?insert_msg=Your data has been added successfully");
    }
}
?>