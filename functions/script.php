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
    // $passwordCheck = $_POST['passwordCheck'];

    try {
        $sql = "SELECT *  FROM admin WHERE email = '$email' ";
        $result = mysqli_query($conn,$sql);
        $countAccount = mysqli_num_rows($result);
    } catch (mysqli_sql_exception $e){
        echo "erreur de la base de données";
        exit;
    }

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

    try {
        $sql = "SELECT username FROM admin WHERE email = '$email' AND password = '$password' ";
        $result = mysqli_query($conn,$sql);
        $countAccount = mysqli_num_rows($result);
        $data = mysqli_fetch_assoc($result);
        if ($countAccount != 0) {
            // login success ! 
            $_SESSION['email'] = $email;
            $_SESSION['username'] = $data['username'];
            $_SESSION['id'] = $data['id'];
            header('location: ../pages/dashboard.php'); 
        } else {
            $_SESSION['loginErrorMessage'] = "username or passsword invalid";
            header('location: ../pages/login.php'); 
        }
    } catch (mysqli_sql_exception $e){
        echo "erreur de la base de données <br>" . $e;
        exit;
    }
}