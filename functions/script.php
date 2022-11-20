<?php 
include 'database.php';
session_start();

if(isset($_POST['signup'])) signUp();
if(isset($_POST['signin'])) login();


function signUp(){
    global $conn;

    $username = $_POST['userName'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $sql = "SELECT *  FROM admin WHERE email = '$email' ";
    $result = mysqli_query($conn,$sql);
    $countAccount = mysqli_num_rows($result);
    if($countAccount == 0){
        $sql ="INSERT INTO admin (`username`, `email`, `password`) VALUES ('$username','$email','$password')";
        $result = mysqli_query($conn,$sql);
        if($result) { 
            $_SESSION['createdAccount'] = 'your account has been created successfully';
            header('location: ../pages/login.php'); 
        }
    }else{
        $_SESSION['existingEmail']='this email already exist';
        header('location: ../pages/signup.php');
    }     
}


function login(){
    global $conn;

     $email = $_POST["email"];
     $password = $_POST["password"];

    $sql = "SELECT username FROM admin WHERE email = '$email' AND password = '$password' ";
    $result = mysqli_query($conn,$sql);
    $countAccount = mysqli_num_rows($result);
    $data = mysqli_fetch_assoc($result);
    if ($countAccount != 0) {
        // login success ! 
       $_SESSION['email'] = $email;
       $_SESSION['username'] = $data['username'];
       header('location: ../pages/dashboard.php'); 
    }else {
        $_SESSION['loginErrorMessage'] = "username or passsword invalid";
        header('location: ../pages/login.php'); 
    }
}