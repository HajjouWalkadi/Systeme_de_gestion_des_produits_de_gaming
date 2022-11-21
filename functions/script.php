<?php 
session_start();

include 'database.php';

// if(isset($_POST['signup'])) signUp();
if(isset($_POST['login'])) login();


// function signUp(){
//     global $conn;

    
   
// }


function login(){
    global $conn;

     $email = $_POST["email"];
     $password = md5($_POST["password"]);

    $sql = "SELECT username FROM admin WHERE email = '$email' AND password = '$password' ";
    $result = mysqli_query($conn,$sql);
    $countAccount = mysqli_num_rows($result);
    $data = mysqli_fetch_assoc($result);
    if ($countAccount != 0) {
        // login success ! 
       $_SESSION['email'] = $email;
       $_SESSION['username'] = $data['username'];
       header('location: ../pages/dashboard.php'); 
    }
    else {
        $_SESSION['loginErrorMessage'] = "username or passsword invalid";
        header('location: ../pages/login.php'); 
    }
}