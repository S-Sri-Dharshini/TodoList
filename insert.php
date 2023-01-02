<?php

	require('db_connection.php');
	if (isset($_POST['add'])){
	// echo "Welcome";

		$task = $_POST['task'];
		if (empty($task)){
			header('location:index.php?task_msg=Please enter a task');
		}else{
			$query="insert into tasks_list (task_name) values ('$task')";
			// echo $query;

			$result=mysqli_query($connection,$query);
			// echo $result;

			if (!$result){
				echo "error";
			}else{
				header('location:index.php?insert_msg=Data Insertion Successful');
			}
		}
	}
?>