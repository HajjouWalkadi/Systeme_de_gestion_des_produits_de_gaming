<?php

include '../functions/statistiquescript.php';

$rowProduct = TotalProduct();
$rowCategory = TotalGategorie();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	  <link rel="stylesheet" href="../assets/css/style.css">

    <title>Statistics</title>

  </head>
<body >
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    

      <a class="navbar-brand"  href="#" class="origingamer" fw-5>Origin Gamer</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
     




     <!-- <nav class="navbar navbar-light bg-light">
  <div class="container-fluid">
    <form class="d-flex">
      <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-search" type="submit">Search</button>
    </form>
  </div>
</nav> -->

    <div class="collapse navbar-collapse col-2 " id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">Dashboard</a>
        </li>
         <li class="nav-item">
          <a class="nav-link" href="#">Products</a>
        </li> 
        <li class="nav-item">
          <a class="nav-link" href="#"><?php
          if(isset($_SESSION['username'] )){
            echo $_SESSION['username'] ;
          }
          ?></a>
        </li>
        
      </ul>
    </div>
  </div>
</nav>
<div class="container-fluid">
    <div class="row flex-nowrap">
        <div class="col-auto col-md-3 col-xl-2 px-sm-2  px-0 bg-dark">
            <div class="d-flex flex-column align-items-center align-items-sm-start px-3 pt-2 text-white min-vh-100">
                <a href="/" class="d-flex align-items-center pb-3 mb-md-0 me-md-auto text-white text-decoration-none">
                    <span class="fs-5 d-none d-sm-inline"></span>
                </a>
                <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start" id="menu">
                    <!-- <li class="nav-item">
                        <a href="dashboard.php" class="nav-link align-middle px-0">
                            <i class="fs-4 bi-house"></i> <span class="origingamer ms-1 d-none d-sm-inline text-white">Home</span>
                        </a>
                    </li> -->
                    <li>
                        <a href="dashboard.php" class="nav-link px-0 align-middle">
                            <i class="fs-4 bi-speedometer2"></i> <span class="ms-1 d-none d-sm-inline text-white">Dashboard</span> </a>
                       
                    </li>                  
                    <li>
                        <a href="statistique.php"  class="nav-link px-0 align-middle">
                            <i class="fs-4 bi-speedometer2"></i> <span class="ms-1 d-none d-sm-inline text-white">Statistics</span> </a>
                       
                    </li>                  
                    <li>
                        <a href="logout.php" class="nav-link px-0 align-middle">
                           <span class="ms-1 d-none d-sm-inline text-white">Logout</span></a>
                    </li>
                   
                </ul>
            </div>
        </div>
        <div class="d-flex p-5 row gap-3" style="height: 50%;">
            <div class="card col-6" style="width: 18rem;">
                <div class="card-body">
                    <h5 class="card-title">Total Product</h5>
                    <p class="card-text justify-content"><?php echo $rowProduct["total"]; ?></p>
                </div>
            </div>
            <div class="card col-6" style="width: 18rem;">
                <div class="card-body">
                    <h5 class="card-title">Total Categorie</h5>
                    <p class="card-text"><?php echo $rowCategory["total"]; ?></p>
                </div>
            </div>
        </div>
        </div>
        </div>
         
</body>
</html>