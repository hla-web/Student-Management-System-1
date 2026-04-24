<?php include('header.php'); ?>
<?php include('jk.php'); ?>

<?php
$id = $_GET['id'];

$query = "SELECT * FROM students WHERE id='$id'";
$result = mysqli_query($connection, $query);
$row = mysqli_fetch_assoc($result);
?>

<div class="container mt-5">

<h2>UPDATE STUDENT</h2>

<form method="POST">

<input type="text" name="first_name" value="<?php echo $row['first_name']; ?>" class="form-control mb-2">
<input type="text" name="last_name" value="<?php echo $row['last_name']; ?>" class="form-control mb-2">
<input type="number" name="age" value="<?php echo $row['age']; ?>" class="form-control mb-2">

<input type="submit" name="update" class="btn btn-primary" value="UPDATE">

</form>

</div>

<?php
if (isset($_POST['update'])) {

    $query = "UPDATE students SET 
    first_name='{$_POST['first_name']}',
    last_name='{$_POST['last_name']}',
    age='{$_POST['age']}'
    WHERE id='$id'";

    mysqli_query($connection, $query);

    header("location:index.php?update_msg=Data updated successfully");
}
?>

<?php include('footer.php'); ?>