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
        //$data = mysqli_fetch_assoc($result)   ;
        while($row=mysqli_fetch_assoc($result)){
            $id = $row['id'];
            $countProduct++;
            echo'
            <tr>
                    <th scope="row">'.$countProduct.'</th>
                    <td><img src="../assets/upload/'.$row['image'].'" style="width: 90px;"></td>
                    <td>'.$row['title'].'</td>
                    <td>'.$row['category_name'].'</td>
                    <td>'.$row['quantity'].'</td>
                    <td>'.$row['price'].'</td>
                    <td><a href="../functions/Edit.php?id='.$row['id'].'"><span onclick="editProduct()" class="btn btn-success text-black"><i class="fas fa-edit"></i></span></a></td>
                    
                    <td><a href="../functions/delete.php?id='.$row['id'].'"><span class="btn btn-danger text-black"><i class="fas fa-trash"></i></span></a></td>
                  </tr>
            ';
          }
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
