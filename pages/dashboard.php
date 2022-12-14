<?php

include '../functions/Create.php';
include '../functions/Read.php';
include '../functions/script.php';
include '../functions/statistiquescript.php';

$rowProduct = TotalProduct();
$rowCategory = TotalGategorie();

if (!isset($_SESSION['username'])) {
  header('location: login.php'); 
}

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
<body style="height: 100vh;">
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
  <!-- ********::Sidebar::******************************************************* -->
   <div class="container-fluid ">
      <div class="row flex-nowrap">
          <div class="col-auto col-md-3 col-xl-2 px-sm-2  px-0 bg-dark">
              <div class="d-flex flex-column align-items-center align-items-sm-start px-3 pt-2 text-white ">
                  <a href="/" class="d-flex align-items-center pb-3 mb-md-0 me-md-auto text-white text-decoration-none">
                      <span class="fs-5 d-none d-sm-inline"></span>
                  </a>
                  <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start" id="menu">
                  <li class="nav-item">
                          <a href="#" class="nav-link align-middle px-0">
                              <i class="fas fa-house"></i> <span class="origingamer ms-1 d-none d-md-inline text-white">Menu</span>
                          </a>
                      </li>
                      <li>
                          <a href="#submenu1" data-bs-toggle="collapse" class="nav-link px-0 align-middle">
                              <i class="fas fa-dashboard"></i> <span class="ms-1 d-none d-md-inline text-white">Dashboard</span> </a>
                        
                      </li>                  
                      
                      <li>
                          <a href="logout.php" class="nav-link px-0 align-middle">
                          <i class="fas fa-lock"></i><span class="ms-1 d-none d-md-inline text-white">Logout</span></a>
                      </li>
                    
                  </ul>
                
                
                </div>
            </div>
          
          <!-- Button Add product -->
   
      <div class="col">
            <div class="d-flex justify-content-lg-end ps-2 mt-3">
              <button type="button" class="btn btn-dark fw-bold p-2" data-bs-toggle="modal" data-bs-target="#modal-game">
                Add Product
              </button>
            </div>

            
            
            <!-- statistiques -->
            <div class="container-fluid mt-5">
              <div class="row gap-3 p-4" >
              <!-- Total Product -->
              <div class="card col-10 col-md-5 col-lg-3 shadow pt-3 mb-4">
                <div class="card-body">
                  <div class="bg-gradient bg-secondary p-3 rounded-3 shadow position-absolute" style="top: -30px;">
                      <i class="fa-solid fa-gamepad text-white fa-lg"></i>
                  </div>
                  <h5 class="card-title">Total Product</h5>
                  <p class="card-text justify-content"><?php echo $rowProduct["total"]; ?></p>
                </div>
              </div>
              <!--Toatal for each category  -->
              <div class="card col-10 col-md-5 col-lg-3 shadow pt-3  mb-4">
              <div class="card-body">
              <div class="bg-gradient bg-secondary p-3 rounded-3 shadow position-absolute" style="top: -30px;">
                      <i class="fa-solid fa-cubes text-white fa-lg"></i>
                  </div>
                <h5 class="card-title">Toatal for each category</h5>
                <?php 
                  global $conn;
                  $sql="SELECT category FROM product";
                  $result=mysqli_query($conn,$sql);
                  $games = 0;
                  $mouses = 0;
                  $laptops = 0;
                  $keyboards = 0;
                  $headphones = 0;
                  while( $product=mysqli_fetch_assoc($result)){
                    if($product['category'] == 1){ 
                      $laptops++;
                    }else if($product['category'] == 2){ 
                      $keyboards++;
                      }else if($product['category'] == 3){ 
                        $mouses++;
                      }else if($product['category'] == 4){ 
                        $games++;
                      }else if($product['category'] == 5){ 
                        $headphones++;
                      }   }; ?>
                  <span>laptops : <span><?= $laptops ?></span></span><br>      
                  <span>keyboards : <span><?= $keyboards ?></span></span><br>  
                  <span>mouses : <span><?= $mouses ?></span></span><br>
                  <span>games : <span><?= $games ?></span></span> <br>      
                  <span>headphones : <span><?= $headphones ?></span></span><br>       
                </div>          
              </div>
              <!-- Products out of stock -->
              <div class="card col-10 col-md-5 col-lg-3 shadow pt-3  mb-4">
                <div class="card-body">
                <div class="bg-gradient bg-secondary p-3 rounded-3 shadow position-absolute" style="top: -30px;">
                      <i class="fa-solid fa-shop text-white fa-lg"></i>
                  </div>
                  <h5 class="card-title">Products out of stock</h5>
                  <?php 
                  global $conn;
                  $sql="SELECT title,quantity FROM product";
                  $result=mysqli_query($conn,$sql);
                  while( $product=mysqli_fetch_assoc($result)){
                    if($product['quantity'] == 0){  ?>
                        <span class="card-text">_ <?php echo $product["title"]; ?></span>
                        <br>
                        <?php } }; ?>
                  </div>          
              </div>
            </div>
            
      
              <!-- Tableau des elements -->
              
              <div class="overflow-scroll tab1 w-100" style="height:27rem;">
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
                      <td><a href="../functions/Edit.php?id=<?= $row['id'] ?>"><span onclick="editProduct()" class="btn btn-success text-black"><i class="fas fa-edit text-white"></i></span></a></td>
                            
                      <td>
                        <a href="#" onclick="if(confirm('Are you sure want to delete this record !')){ document.querySelector('#delete-product-<?= $row['id']?>').submit();}"><span class="btn btn-danger text-black"><i class="fas fa-trash text-white"></i></span></a>
                              <form action="../functions/delete.php" method="post" id="delete-product-<?= $row['id']?>">
                                <input type="hidden" name="delete" value="<?= $row['id'] ?>">
                              </form>
                            </td>
                          </tr>
                          <?php } ?> 
                  </tbody>
              </table>   
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
                          <input type="file" class="form-control" name="my_image" id="product-image"/>
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
              </div>    
  </div>
</body>
</html>