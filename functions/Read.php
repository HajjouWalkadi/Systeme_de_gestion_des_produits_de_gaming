<?php
    //INCLUDE DATABASE FILE
    include '../functions/database.php';



//____________**fonction afficher:**__________________________________________________________________________________
// _______________________________________________________________________________________________________________
    
    function getProduct(){
        global $conn;
        $countProduct=0;

        $sql="SELECT product.id,title,price,quantity,category_name ,image FROM product,categorie WHERE category = categorie.id;";

        $result=mysqli_query($conn,$sql);
        return $result;
        //$data = mysqli_fetch_assoc($result)   ;
        }
        

        
        function selectCategory(){
          global $conn;
          $sql = "SELECT * FROM categorie";
          $result=mysqli_query($conn,$sql);
          $row=mysqli_fetch_assoc($result);
          while($row=mysqli_fetch_assoc($result)){
            echo "<option value='$row[id]'>$row[category_name]</option>";
          }
          
        }
       
?>
