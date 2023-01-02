<?php include('db_connection.php'); ?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="style.css" />
    <title>TODO-List</title>
</head>
<body>
<div class="heading">TODO List</div>

<form action="insert.php" method="post">
    <label for="task">Enter the task</label>
    <input type="text" name="task">
    <input type="submit" class="add_btn" name="add" value="Add Task">
</form>

<?php
    if (isset($_GET['task_msg'])){
        echo "<h3 class='task_msg'>".$_GET['task_msg']."</h3>";
    }
    if (isset($_GET['insert_msg'])){
        echo "<h3 class='insert_msg'>".$_GET['insert_msg']."</h3>";
    }
    if (isset($_GET['update_msg'])){
        echo "<h3 class='update_msg'>".$_GET['update_msg']."</h3>";
    }
    if (isset($_GET['delete_msg'])){
        echo "<h3 class='delete_msg'>".$_GET['delete_msg']."</h3>";
    }
?>

<table>
    <thead>
    <tr>
        <th>ID</th>
        <th>Task Name</th>
        <th>Update</th>
        <th>Delete</th>
    </tr>
    </thead>

    <tbody>
    <?php
    $query = "SELECT * FROM `tasks_list`";
    $result = mysqli_query($connection, $query);
    // print_r($result);
    while($row=mysqli_fetch_assoc($result)){
    ?>

    <tr>
        <td><?php echo $row['id']; ?></td>
        <td><?php echo $row['task_name']; ?></td>
        <td><a class='update_btn' href="update.php?id=<?php echo $row['id']; ?>">Update</a></td>
        <td><a class='delete_btn' href="delete.php?id=<?php echo $row['id']; ?>">Delete</a></td>
    </tr>

    <?php } ?>

    </tbody>
</table>
</body>
</html>
