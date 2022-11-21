<?php 
session_start();
include '../functions/script.php';
$erreur="";
$error="";
@$signup=$_POST["signup"];
if(isset($signup)){

    @$username = $_POST['userName'];
    
    @$password = md5($_POST['password']);
    // @$email = $_POST['email'];
    @$email =filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);

    if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
      // $_SESSION['emailValide'] = 'this email not valid';
      $error='this email not valid';

    }else{
    $sql = "SELECT *  FROM admin WHERE email = '$email' ";
    $result = mysqli_query($conn,$sql);
    $countAccount = mysqli_num_rows($result);
    if($countAccount == 0){
      $sql ="INSERT INTO admin (`username`, `email`, `password`) VALUES ('$username','$email','$password')";
      $result = mysqli_query($conn,$sql);
          header('location: ../pages/login.php'); 
  }else{
      $erreur="This email already exist";
  } 
}
// header('location: signup.php');   
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="../assets/css/style.css">
  <link rel="stylesheet" href="https://parsleyjs.org/src/parsley.css">
    <script defer src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script defer src="https://parsleyjs.org/dist/parsley.min.js"></script>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    
    <title>SignUp</title>
</head>
<body class="bgimage row m-0">
  
<form class=" col-lg-4 col-md-5 col-11 m-auto p-2 px-4 signupform" action="signup.php" method="post" data-parsley-validate>
  <!-- Email input -->
  <div class="text-center">
  <p class="text-danger"><?= $erreur; ?></p>
  </div>
  <h1 class="text-center mt-2">Create An Account</h1>
  <!-- ********************************************************** -->

  <div class="form-outline mb-4">
    <input type="text" id="userName" name="userName" class="form-control" placeholder="Enter username" required />
    <label class="form-label" for="form2Example1">Username</label>
  </div>
  <div class="form-outline mb-4">
    <input type="email" id="email" name="email" class="form-control" placeholder="Enter your address email" data-parsley-type="email" required />
    <label class="form-label" for="form2Example2">Email address</label>
  </div>

  <!-- Password input -->
  <div class="form-outline mb-4">
    <input type="password" id="password" name="password" class="form-control" placeholder="Password" required data-parsley-length="[8, 16]" data-parsley-trigger="keyup" required />
    <label class="form-label" for="form2Example3">Password</label>
  </div>
  <div class="form-outline mb-4">
    <input type="password" id="passwordCheck" name="passwordCheck" class="form-control" placeholder="Confirm Password" data-parsley-equalto="#password" data-parsley-trigger="keyup" required />
    <label class="form-label" for="form2Example4">Confirm Password</label>
  </div>
  
  <!-- µµµµµµµµµµµµµµµµµµµµµµµµµµµµµµµµ******************* -->

 
  <!-- µµµµµµµµµµµµµµµµµµµµµµµµµµµµµµµµ******************* -->

  
  <!-- Submit button -->
  <button type="submit" name="signup" class="btn btn-primary btn-block mb-4 text-center col-4 offset-4">Sign in</button>
  <p>Already have an account ? <a href="../pages/login.php"> Log in</a></p>
  <!-- Register buttons -->
  <div class="text-center">
    <p>sign up with:</p>
    <button type="button" class="btn btn-link btn-floating mx-1">
      <i class="fab fa-facebook-f"></i>
    </button>

    <button type="button" class="btn btn-link btn-floating mx-1">
      <i class="fab fa-google"></i>
    </button>

    <button type="button" class="btn btn-link btn-floating mx-1">
      <i class="fab fa-twitter"></i>
    </button>

    <button type="button" class="btn btn-link btn-floating mx-1">
      <i class="fab fa-github"></i>
    </button>
  </div>
</form>
<script src="../assets/js/main.js"></script>

</body>
</html>