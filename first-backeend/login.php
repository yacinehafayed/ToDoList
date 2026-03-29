<?php
session_start();
require_once 'db.php';

if($_SERVER['REQUEST_METHOD'] == 'POST'){
$email = trim($_POST['login_email'] ?? '');
$password = trim($_POST['login_password'] ?? '');

if (empty($email) || empty($password)) {
    $error = "Please fill in all fields";
}else{
$sql="SELECT * FROM users WHERE UserEmail=?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s",$email);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 1) {
        $user = $result->fetch_assoc();
        if (password_verify($password, $user['UserPassword'])) {          
            $_SESSION['user_id'] = $user['UserId'];
            $_SESSION['user_name'] = $user['fullname'];
            header("Location: ../front-end/index.php");
            exit();
        } else {
            $error = "Incorrect password";
        }
    } else {
        $error = "Invalid email or password";

    }
    $stmt->close();
    $conn->close();
}}
else{
    die("Access denied");
}
?>