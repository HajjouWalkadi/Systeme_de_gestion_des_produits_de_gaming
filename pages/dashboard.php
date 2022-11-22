<?php

include '../functions/Create.php';
include '../functions/Read.php';
include '../functions/script.php';

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

    <title>Dashboard</title>

  </head>
<body >
  <!-- ***************************************::NAVBAR::***************************************************** -->
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    

      <a class="navbar-brand"  href="#" class="origingamer">Origin Gamer</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

    <div class="collapse navbar-collapse col-2 " id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">Dashboard</a>
        </li>
         <li class="nav-item">
          <a class="nav-link text-dark" href="#">Products</a>
        </li> 
        <li class="nav-item">
          <a class="nav-link text-primary bolder" href="#"><?php
          if(isset($_SESSION['username'] )){
            echo $_SESSION['username'] ;
          }
          ?></a>
        </li>
        
      </ul>
    </div>
  </div>
</nav>
<!-- ***************************************************::Sidebar::******************************************************* -->
<div class="container-fluid">
    <div class="row flex-nowrap">
        <div class="col-auto col-md-3 col-xl-2 px-sm-2  px-0 bg-dark vh-100">
            <div class="d-flex flex-column align-items-center align-items-sm-start px-3 pt-2 text-white ">
                <a href="/" class="d-flex align-items-center pb-3 mb-md-0 me-md-auto text-white text-decoration-none">
                    <span class="fs-5 d-none d-sm-inline"></span>
                </a>
                <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start" id="menu">
                    <li>
                        <a href="#submenu1" data-bs-toggle="collapse" class="nav-link px-0 align-middle">
                            <i class="fs-4 bi-speedometer2"></i> <span class="ms-1 d-none d-sm-inline text-white">Dashboard</span> </a>
                       
                    </li>                  
                    <li>
                        <a href="statistique.php" class="nav-link px-0 align-middle">
                            <i class="fs-4 bi-speedometer2"></i> <span class="ms-1 d-none d-sm-inline text-white">Statistics</span> </a>
                       
                    </li>                  
                    <li>
                        <a href="logout.php" class="nav-link px-0 align-middle">
                           <span class="ms-1 d-none d-sm-inline text-white">Logout</span></a>
                    </li>
                   
                </ul>
               
             
            </div>
        </div>

        <!-- Game Product MODAL -->

        <div class="modal fade" id="modal-game">
          <div class="modal-dialog">
            <div class="modal-content">
              <form action="../functions/Create.php" method="POST" id="form-game" enctype="multipart/form-data">
                <div class="modal-header">
                  <h5 class="modal-title">Add Product</h5>
                  <a href="#" class="btn-close" data-bs-dismiss="modal"></a>
                </div>
                <div class="modal-body">
                    <!-- This Input Allows Storing Product Index  -->
                    <input type="hidden" id="product-id" name="productId">
                    <div class="mb-3">
                      <label class="form-label">Image</label>
                      <input type="file" class="form-control" name="my_image" id="product-image" required/>
                    </div>

                    <div class="mb-3">
                      <label class="form-label">Title</label>
                      <input type="text" class="form-control" name="productTitle" id="product-title" required/>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Category</label>
                        <select class="form-select" name= "productCategory" id="product-category" required>
                          <option value="" selected disabled>Please select</option>
                          <?php selectCategory() ?>
                      </select>
                    </div>

                    <div class="mb-3">
                      <label class="form-label">Quantity</label>
                      <input type="text" class="form-control" name="productQuantity" id="product-quantity" required/>
                    </div>
                    
                    
                    <div class="mb-3">
                      <label class="form-label">Price</label>
                      <input type="text" class="form-control" name="productPrice" id="product-quantity" required/>
                    </div>
                  
                </div>
                <div class="modal-footer">
                  <a href="#" class="btn btn-white" data-bs-dismiss="modal">Cancel</a>
                  <button type="submit" name="saveProduct" class="btn btn-primary task-action-btn" id="product-save-btn">Save</button>
                </div> 
              </form>
            </div>
          </div>
        </div>

  <!-- Button Add product -->

      <div class="col py-3 table-responsive border-2">
        <button type="button" class="btn btn-dark float-right fw-bold p-2" data-bs-toggle="modal" data-bs-target="#modal-game" style="float:right;">
            Add Product
          </button>
          <!-- Tableau des elements -->
        <table class="table-striped  table table-hover">
          <thead>
            <tr>
             <th scope="col">#<?php echo statisticsCount(); ?></th> 
              <th scope="col">Image</th>
              <th scope="col">Title</th>
              <th scope="col">Category</th>
              <th scope="col">Quantity</th>
              <th scope="col">Price</th>
              <th scope="col">Edit</th>
              <th scope="col">Delete</th>
            </tr>
          </thead>
          <tbody>
            <?php 
            $result = getProduct();
            
        $countProduct=0;
        while($row=mysqli_fetch_assoc($result)){
          $id = $row['id'];
          $countProduct++; ?>
          <tr>
                  <th scope="row"><?= $countProduct ?></th>
                  <td><img src="../assets/upload/<?= $row['image'] ?>" style="width: 90px;"></td>
                  <td><?= $row['title'] ?></td>
                  <td><?= $row['category_name'] ?></td>
                  <td><?= $row['quantity'] ?></td>
                  <td><?= $row['price'] ?></td>
                  <td><a href="../functions/Edit.php?id<?= $row['id'] ?>"><span onclick="editProduct()" class="btn btn-success text-black"><i class="fas fa-edit"></i></span></a></td>
                  
                  <td>
                    <a href="#" onclick="if(confirm('Are you sure want to delete this record !')){ document.querySelector('#delete-product-<?= $row['id']?>').submit();}"><span class="btn btn-danger text-black"><i class="fas fa-trash"></i></span></a>
                    <form action="../functions/delete.php" method="post" id="delete-product-<?= $row['id']?>">
                      <input type="hidden" name="delete" value="<?= $row['id'] ?>">
                    </form>
                  </td>
          </tr>
                <?php } ?>
            
            
          </tbody>
        </table>       
    </div>    
</body>
</html>