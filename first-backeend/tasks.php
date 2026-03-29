<?php
session_start();
require_once 'db.php';

if($_SERVER['REQUEST_METHOD']=='POST'){

    if(!isset($_SESSION['user_id'])){
        die("You must login first");
    }

    $Name = $_POST['task_name'];
    $Date = $_POST['task_date'];
    $Description = $_POST['task_description'];
    if(empty($Name) || empty($Date) || empty($Description)){
        die("All fields are required");
    }
    $user_id = $_SESSION['user_id'];

$sql = "INSERT INTO tasks(TaskName,TaskDate,TaskDescription,Userid,status) VALUES (?,?,?,?,?)";
$status= 'pending';
$stmt = $conn->prepare($sql);
$stmt->bind_param("sssis",$Name,$Date,$Description,$user_id,$status);
    if($stmt->execute()){
        header("Location: ../front-end/tasks.php?success=1");
        exit();
    } else {
        echo "Error: " . $conn->error;
    }
$stmt->close();
$conn->close();
}else{
    die(" Somthing Wrong!");
}

?>