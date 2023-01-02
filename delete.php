<?php require "db_connection.php"; ?>

<?php
	if (isset($_GET['id'])){
		$id = $_GET['id'];
	}
	$query = "delete from `tasks_list` where `id`='$id'";
	$result = mysqli_query($connection,$query);
	if ($result){
		header('location:index.php?delete_msg=Task has been successfully deleted');
	}

?>