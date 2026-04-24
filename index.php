<?php include('header.php'); ?>
<?php include('jk.php'); ?>

<div class="container mt-5">

<?php
if (isset($_GET['message'])) {
    echo "<h6 class='text-danger text-center'>".$_GET['message']."</h6>";
}
if (isset($_GET['insert_msg'])) {
    echo "<h6 class='text-success text-center'>".$_GET['insert_msg']."</h6>";
}
if (isset($_GET['update_msg'])) {
    echo "<h6 class='text-primary text-center'>".$_GET['update_msg']."</h6>";
}
if (isset($_GET['delete_msg'])) {
    echo "<h6 class='text-danger text-center'>".$_GET['delete_msg']."</h6>";
}
?>

<div class="box1 mb-4">
    <h2>ALL STUDENTS</h2>
    <button class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
        ADD STUDENTS
    </button>
</div>

<table class="table table-hover table-bordered table-striped">
<thead>
<tr>
<th>ID</th>
<th>First Name</th>
<th>Last Name</th>
<th>Age</th>
<th>Edit</th>
<th>Delete</th>
</tr>
</thead>

<tbody>

<?php
$query = "SELECT * FROM students";
$result = mysqli_query($connection, $query);

if (!$result) {
    die("Query Failed: " . mysqli_error($connection));
}

while ($row = mysqli_fetch_assoc($result)) {
?>
<tr>
<td><?php echo $row['id']; ?></td>
<td><?php echo $row['first_name']; ?></td>
<td><?php echo $row['last_name']; ?></td>
<td><?php echo $row['age']; ?></td>

<td>
<a href="update.php?id=<?php echo $row['id']; ?>" class="btn btn-success btn-sm">Edit</a>
</td>

<td>
<a href="delete.php?id=<?php echo $row['id']; ?>" class="btn btn-danger btn-sm">Delete</a>
</td>

</tr>
<?php } ?>

</tbody>
</table>

</div>

<!-- MODAL -->
<div class="modal fade" id="exampleModal">
<div class="modal-dialog">
<div class="modal-content">

<div class="modal-header">
<h5 class="modal-title">ADD STUDENTS</h5>
<button type="button" class="close" data-dismiss="modal">&times;</button>
</div>

<form action="insert.php" method="POST">
<div class="modal-body">

<div class="form-group">
<label>First Name</label>
<input type="text" name="first_name" class="form-control">
</div>

<div class="form-group">
<label>Last Name</label>
<input type="text" name="last_name" class="form-control">
</div>

<div class="form-group">
<label>Age</label>
<input type="number" name="age" class="form-control">
</div>

</div>

<div class="modal-footer">
<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
<input type="submit" name="add_students" value="ADD" class="btn btn-success">
</div>
</form>

</div>
</div>
</div>

<?php include('footer.php'); ?>