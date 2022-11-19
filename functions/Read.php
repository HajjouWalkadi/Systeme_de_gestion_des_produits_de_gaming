<?php
    //INCLUDE DATABASE FILE
    include('database.php');



//____________**fonction afficher:**__________________________________________________________________________________
// _______________________________________________________________________________________________________________
    
    function getProduct(){
        global $conn;
        $countProduct=0;
        $sql="SELECT * FROM product";
        $result=mysqli_query($conn,$sql);
        while($row=mysqli_fetch_assoc($result)){
            $countProduct++;
            echo'
            <tr>
                    <th scope="row">'.$countProduct.'</th>
                    <td>'.$row['title'].'</td>
                    <td>'.$row['category'].'</td>
                    <td>'.$row['quantity'].'</td>
                    <td>'.$row['price'].'</td>
                    <td><span onclick="editProduct()" class="btn btn-success text-black"><i class="fas fa-edit"></i></span></td>
                    <td><span onclick="deleteProduct()" class="btn btn-danger text-black"><i class="fas fa-trash"></i></span></td>
                  </tr>
            ';
        }
        }