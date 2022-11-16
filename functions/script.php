<?php 
include 'database.php';
session_start();

if(isset($_POST['signup'])) signUp();




function signUp(){
    global $conn;

    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $passwordCheck = $_POST['passwordCheck'];

    $sql = "SELECT *  FROM admin WHERE email = '$email' ";
    $result = mysqli_query($conn,$sql);
    $countAccount = mysqli_num_rows($result);

    if($countAccount == 0){
        // $sql = "INSERT INTO admin (`username`,`email`,`password`) VALUES ('$username','$email','$password')";
        $sql ="INSERT INTO admin (`username`, `email`, `password`) VALUES ('$username','$email','$password')";
        $result = mysqli_query($conn,$sql);

        $_SESSION['createdAccount'] = 'your account has been created successfully';
        header('location: ../pages/login.php');
    }else{
        $_SESSION['existingEmail']='this email is already exist';
        header('location: ../pages/signup.php');
    }
    
}