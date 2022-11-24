<?php
    //INCLUDE DATABASE FILE
    include '../functions/Read.php';
    include '../functions/database.php';
    include '../functions/update.php';

if(isset($_GET['id'])){

$id=$_GET['id'];
$sql="SELECT * FROM product WHERE id='$id' ";
$result=mysqli_query($conn, $sql);
$row=mysqli_fetch_assoc($result);
$title=$row['title'];
$category=$row['category'];
$quantity=$row['quantity'];
$price=$row['price'];

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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Dashboard</title>

  </head>
<body>
        <div class="container"> 
        <div class="col-10 mx-auto p-4 my-5 rounded"> 
    
				<form action="" method="POST" id="form-game" enctype="multipart/form-data">
				<input type="hidden" name="id" value="<?php echo $id?>">
					<div class="modal-header">
						<h5 class="modal-title">Edit Product</h5>
						<a href="../pages/dashboard.php" class="btn-close" data-bs-dismiss="modal"></a>
					</div>
					<div class="modal-body">
							<!-- This Input Allows Storing Task Index  -->
							<input type="hidden" id="product-id" name="productId">
							<div class="mb-3">
								<label class="form-label">Image</label>
								<input type="file" class="form-control" name="my_image" id="product-image"/>
							</div>
              <div class="mb-3">
								<label class="form-label">Title</label>
								<input type="text" class="form-control" value="<?php echo $title?>" name="productTitle" id="product-title" required/>
							</div>
              <div class="mb-3">
                  <label class="form-label">Category</label>
                  <select class="form-select" name= "productCategory" id="product-category" required>
                    <option value="" selected disabled>Please select</option>
                    <option value="1" <?php echo ($category == 1)  ? 'selected' : '';?> >Laptop</option>
                    <option value="2" <?php echo ($category == 2)  ? 'selected' : '';?> >Keyboard</option>
                    <option value="3" <?php echo ($category == 3)  ? 'selected' : '';?> >Mouse</option>
					<option value="4" <?php echo ($category == 4)  ? 'selected' : '';?> >Games</option>
					<option value="5" <?php echo ($category == 5)  ? 'selected' : '';?> >Headphones</option>
					</select>
				</div>

				<div class="mb-3">
					<label class="form-label">Quantity</label>
					<input type="text" class="form-control" name="productQuantity" value="<?php echo $quantity?>" id="product-quantity" required/>
				</div>
							
							
              <div class="mb-3">
								<label class="form-label">Price</label>
								<input type="text" class="form-control" name="productPrice" value="<?php echo $price?>" id="product-quantity" required/>
							</div>
						
					</div>
					<div class="modal-footer">
						<a href="../pages/dashboard.php" class="btn btn-white" data-bs-dismiss="modal">Cancel</a>
						<button type="submit" name="updateProduct" class="btn btn-primary task-action-btn" id="product-update-btn">Update</button>
					</div> 
					
				</form>
                </div>
                </div>


          <?php }else header('location:.././pages/dashboard.php');
        ?>
        </body>
</html>