<?php require "db_connection.php"; ?>

<?php
	if (isset($_GET['id'])){
		$id = $_GET['id'];
		$query = "select * from `tasks_list` where `id` = '$id' ";
		$result = mysqli_query($connection,$query);
		// print_r($result);
		if ($result){
			$row = mysqli_fetch_assoc($result);
		}
	}
?>

<?php 
	if(isset($_POST['update'])){
		$task = $_POST['task'];
		if (isset($_GET['id'])){
			$id = $_GET['id'];
		}
		$query = "update `tasks_list` set `task_name` = '$task' where `id` = '$id'";
		$result = mysqli_query($connection,$query);
		if ($result){
			header('location:index.php?update_msg=Task has been updated successfully');
		}
	}

?>




<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="style.css" />
</head>
<body>
<div class="heading">TODO List</div>

<form action="update.php?id=<?php echo $id; ?>" method="post">
    <label for="task">Update the task</label>
    <input type="text" name="task" value="<?php echo $row['task_name']; ?>">
    <input type="submit" class="add_btn" name="update" value="Update Task">
</form>
</body>
</html>


