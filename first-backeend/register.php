<?php
require_once 'db.php';
if(isset($_POST['signup_btn'])){
$fullname =$_POST['fullname'];
$email = $_POST['user_email'];
$password = $_POST['user_password'];
$hashedpassword =password_hash($password, PASSWORD_DEFAULT);

$sql ="INSERT INTO users(fullname,Useremail,Userpassword) VALUES(?,?,?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("sss", $fullname, $email, $hashedpassword);

if($stmt->execute()){
        // Success! Redirect to login
        header("Location: ../front-end/auth.php?status=success");
        exit();
    } else {
        echo "Something went wrong: " . $conn->error;
    }

    $stmt->close();
    $conn->close();
}
?>