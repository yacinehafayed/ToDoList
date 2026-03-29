<?php
session_start();
require_once 'db.php';

if($_SERVER['REQUEST_METHOD'] === 'POST'){

    if(!isset($_SESSION['user_id'])){
        die("Unauthorized");
    }

    $action = $_POST['action'] ?? '';

    if($action === 'delete'){
        $task_id = $_POST['task_id'];

        $sql = "DELETE FROM tasks WHERE TaskId = ? AND UserId = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ii", $task_id, $_SESSION['user_id']);
        $stmt->execute();

        header("Location: ../front-end/tasks.php");
        exit();
    }

    if($action === 'update'){
        $task_id = $_POST['task_id'];
        $name = $_POST['task_name'];
        $date = $_POST['task_date'];
        $desc = $_POST['task_description'];

        $sql = "UPDATE tasks 
                SET TaskName=?, TaskDate=?, TaskDescription=? 
                WHERE TaskId=? AND UserId=?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sssii", $name, $date, $desc, $task_id, $_SESSION['user_id']);
        $stmt->execute();

        header("Location: ../front-end/tasks.php");
        exit();
    }

if($action === 'finish'){
    $task_id = $_POST['task_id'];
    $user_id = $_SESSION['user_id'];

    $sql = "UPDATE tasks SET status='finished' WHERE TaskId=? AND UserId=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ii", $task_id, $user_id);
    $stmt->execute();

    header("Location: ../front-end/tasks.php");
    exit();
}


}


?>