<?php

include_once "db_connection.php";

$connection = openConnection();

$table = "CREATE TABLE tasks_details (id SERIAL, task varchar(255))";
$connection->query($table);

$task = $_POST['task'];

    if (isset($_POST['submit']) && !empty($task)) {
        $select = "SELECT task FROM tasks_details WHERE task='$task'";
        $value = $connection->query($select);
        if (!empty($task) && $value->num_rows === 0) {
                $insert = "INSERT INTO tasks_details (task) VALUES ('$task')";
                $connection->query($insert);
            }
        }
    }

function getData($connection){
    $data = "SELECT * FROM tasks_details";
    $tasks = $connection->query($data);
    while($row=$tasks->fetch_assoc()){
        echo $row['task'];
        echo "<br />";
    }
    return $tasks;
}



?>





<!DOCTYPE html>
<html>
<head>
    <title>TODO-List</title>
</head>
<body>
<div style='color:black;text-align:center;border: 2px solid black;border-radius: 20px;background-color: red; font-size: 40px;'>TODO List</div>
<br />
<form method="post" action="index.php" class="formstyle">
    <input type="text" name="task" class="inputbox">
    <button type="submit" name="submit" class="addtask">Add Task</button>
</form>
<?php addTask(); ?>

<div style="display:flex;">
    <div><?php ?></div>
    <div></div>
</div>

</body>
</html>

<style>
    .inputbox{
        width:75%;
        height:15px;
        padding:10px;
        border:2px solid black;
        border-radius:10px;
    }
    .addtask{
        font-size: 20px;
        height:40px;
        /*width:100px;*/
        padding-left: 10px;
        padding-right: 10px;
        color:black;
        background-color: red;
        border:2px solid black;
        border-radius:10px;
    }
    .formstyle{
        display:flex;
        justify-content: center;
        gap:10px;
    }
    .errormsg{
        color:red;
        margin-left: 100px;
        text-align:center;
    }
</style>

<?php

function openConnection(){
    $dbhost = "localhost";
    $dbuser = "root";
    $dbpasswd = "";
    $dbname = "todo-list";

    $connection = new mysqli($dbhost, $dbuser, $dbpasswd, $dbname);

    if ($connection->connect_error){
        die("Connection Failed : ". $connection->connect_error);
    }

    return $connection;
}

function closeConnection($connection){
    $connection->close();
}

?>
