<?php

     include 'database.php';
     if(isset($_POST["updateProduct"]))  update();

     function update(){
        global $conn;
        $id = $_POST["id"];
        $title = $_POST["productTitle"];
        $categorie = $_POST["productCategory"];
        $quantity = $_POST["productQuantity"];
        $price = $_POST["productPrice"];
        $image = uploadimage();
        if($image == ''){
            $sql = "UPDATE product SET title = '$title',category = '$categorie',quantity = '$quantity',price = '$price' WHERE id = '$id' ";
        }else{
            $sql = "UPDATE product SET title = '$title',category = '$categorie',quantity = '$quantity',price = '$price',image = '$image' WHERE id = '$id' ";        }
        
        $result = mysqli_query($conn,$sql);
        
        if($result){
            header('location: ../pages/dashboard.php');
        }
     }
     
     // FUNCTION ADD IMAGE 
     function uploadimage(){
        if(isset($_FILES['my_image'])){
       
           $img_name = $_FILES['my_image']['name'];
           $img_size = $_FILES['my_image']['size'];
           $tmp_name = $_FILES['my_image']['tmp_name'];
           $error = $_FILES['my_image']['error'];
   
               if ($error === 0)
               {   
                   if ($img_size > 1000000) 
                   {
                       $_SESSION['Error'] = "Sorry, your file is too large.";
                     header('location: ../pages/dashboard.php');
                   }
                   else
                   {
                       $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);// return extension of image
                       $img_ex_lc = strtolower($img_ex);
   
                       $allowed_exs = array("jpg", "jpeg", "png"); 
   
                           if (in_array($img_ex_lc, $allowed_exs)) 
                           {
                               $new_img_name = uniqid("IMG-", true).'.'.$img_ex_lc;
                               $img_upload_path = '../assets/upload/'.$new_img_name;
                               move_uploaded_file($tmp_name, $img_upload_path);
                           }
                           else {
                               $_SESSION['Error'] = "You can't upload files of this type";
                               header('location: ../pages/dashboard.php');
                           }
                   }
                   }
               else
               {
                   $_SESSION['Error'] = 'unknown error occurred!';
                   header('location: ../pages/dashboard.php');
   
                   
               }
       }
       return $new_img_name ;
   } 