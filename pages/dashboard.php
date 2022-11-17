<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Dashboard</title>
<?php session_start(); ?>
  </head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid d-flex justify-content-beween row">
    <div class="col-10">

      <a class="navbar-brand " href="#">Origin Gamer</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
    </div>
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
          <a class="nav-link active" aria-current="page" href="#">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Gategories</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#"><?= $_SESSION['username'] ?></a>
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
                    <li class="nav-item">
                        <a href="#" class="nav-link align-middle px-0">
                            <i class="fs-4 bi-house"></i> <span class="ms-1 d-none d-sm-inline">Home</span>
                        </a>
                    </li>
                    <li>
                        <a href="#submenu1" data-bs-toggle="collapse" class="nav-link px-0 align-middle">
                            <i class="fs-4 bi-speedometer2"></i> <span class="ms-1 d-none d-sm-inline">Dashboard</span> </a>
                       
                    </li>
                    <li>
                        <a href="#" class="nav-link px-0 align-middle">
                            <i class="fs-4 bi-table"></i> <span class="ms-1 d-none d-sm-inline">Orders</span></a>
                    </li>
                  
                    <li>
                        <a href="#submenu3" data-bs-toggle="collapse" class="nav-link px-0 align-middle">
                            <i class="fs-4 bi-grid"></i> <span class="ms-1 d-none d-sm-inline">Categories</span> </a>
                            <ul class="collapse nav flex-column ms-1" id="submenu3" data-bs-parent="#menu">
                            <li class="w-100">
                                <a href="#" class="nav-link px-0"> <span class="d-none d-sm-inline">Product</span> 1</a>
                            </li>
                            <li>
                                <a href="#" class="nav-link px-0"> <span class="d-none d-sm-inline">Product2</span> 2</a>
                            </li>
                            <li>
                                <a href="#" class="nav-link px-0"> <span class="d-none d-sm-inline">Product3</span> 3</a>
                            </li>
                            <li>
                                <a href="#" class="nav-link px-0"> <span class="d-none d-sm-inline">Product4</span> 4</a>
                            </li>
                        </ul>
                    </li>
                   
                </ul>
               
             
            </div>
        </div>
        <!-- Game MODAL -->


	<div class="modal fade" id="modal-game">
		<div class="modal-dialog">
			<div class="modal-content">
				<form method="POST" id="form-game">
					<div class="modal-header">
						<h5 class="modal-title">Add Product</h5>
						<a href="#" class="btn-close" data-bs-dismiss="modal"></a>
					</div>
					<div class="modal-body">
							<!-- This Input Allows Storing Task Index  -->
							<input type="hidden" id="product-id" name="productId">
							<div class="mb-3">
								<label class="form-label">Image</label>
								<input type="file" class="form-control" name="productImage" id="product-image" required/>
							</div>

              <div class="mb-3">
								<label class="form-label">Title</label>
								<input type="text" class="form-control" name="productTitle" id="product-title" required/>
							</div>

							<div class="mb-3">
								<label class="form-label">Quantity</label>
								<input type="text" class="form-control" name="productQuantity" id="product-quantity" required/>
							</div>
							
                <div class="mb-3">
                  <label class="form-label">Category</label>
                  <select class="form-select" name= "productCategory" id="product-category" required>
                    <option value="" selected disabled>Please select</option>
                    <option value="1">Laptop</option>
                    <option value="2">Keyboard</option>
                    <option value="3">Mouse</option>
									<option value="4">Games</option>
									<option value="5">Headphones</option>
								</select>
							</div>
              
							
              <div class="mb-3">
								<label class="form-label">Price</label>
								<input type="text" class="form-control" name="productQuantity" id="product-quantity" required/>
							</div>
						
					</div>
					<div class="modal-footer">
						<a href="#" class="btn btn-white" data-bs-dismiss="modal">Cancel</a>
						<button type="button" name="delete" class="btn btn-danger task-action-btn" id="task-delete-btn2">Delete</button>
						<button type="submit" name="delete" id="task-delete-btn" hidden></button> 
						<button type="submit" name="update" class="btn btn-warning task-action-btn" id="task-update-btn">Update</button>
						<button type="submit" name="saveTask" class="btn btn-primary task-action-btn" id="task-save-btn">Save</button>
					</div> 
					<!-- name="delete"  onclick="ddelete();" -->
				</form>
			</div>
		</div>
	</div>

      <div class="col py-3 border border-2">
        <button type="button" class="btn btn-dark float-right fw-bold p-2" data-bs-toggle="modal" data-bs-target="#modal-game" style="float:right;">
            Add Product
          </button>
        <table class="table">
          <thead>
            <tr>
              <th scope="col">Image</th>
              <th scope="col">Title</th>
              <th scope="col">Quantity</th>
              <th scope="col">Price</th>
              <th scope="col">Edit</th>
              <th scope="col">Delete</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <th scope="row">1</th>
              <td>Mark</td>
              <td>Otto</td>
              <td>@mdo</td>
              <td><i class=" fa-solid fa-edit"></i></td>
              <td><i class=" fa-solid fa-trash"></td>
             
            </tr>
            
            
          </tbody>
        </table>
      
       
    </div>    
</body>
</html>