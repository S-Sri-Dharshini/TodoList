<?php
    define("hostname","localhost");
    define("username","root");
    define("password","");
    define("database","todo-list");

    $connection = mysqli_connect(hostname, username, password, database);

    if(!$connection){
        die("Connection Failed");
    }

    $query = "create table `tasks_list`(id SERIAL, task_name varchar(255))";
    $result = mysqli_query($connection,$query);


?>