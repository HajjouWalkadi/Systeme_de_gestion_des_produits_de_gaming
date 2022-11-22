<?php
    //INCLUDE DATABASE FILE
    include '../functions/database.php';
    //SESSSION IS A WAY TO STORE DATA TO BE USED ACROSS MULTIPLE PAGES
    session_start();

    //ROUTING
    if(isset($_POST['saveProduct'])){
        $title = $_POST['productTitle'];
        $category = $_POST['productCategory'];
        $quantity = $_POST['productQuantity'];
        $price = $_POST['productPrice'];
        $image = uploadimage();
   
        saveProductFn($image,$title, intval($category), $quantity, $price);
    }


    function saveProductFn($image,$title, $category, $quantity, $price)
    {        
        //CODE HERE
        //SQL INSERT
        global $conn;
        $sql = "INSERT INTO product (title, category, quantity, price,image) VALUES ('$title','$category','$quantity','$price','$image')";
        mysqli_query($conn,$sql);
        header('location: ../pages/dashboard.php');
        // $_SESSION['message'] = "Product has been added successfully !";
        // header('location:.././pages/dashboard.php');
    }



    // FUNCTION ADD IMAGE 
    function uploadimage(){
     if(isset($_FILES['my_image'])){
    
        global $conn;
        $img_name = $_FILES['my_image']['name'];
        $img_size = $_FILES['my_image']['size'];
        $tmp_name = $_FILES['my_image']['tmp_name'];
        $error = $_FILES['my_image']['error'];

            if ($error === 0)
            {   
                if ($img_size > 170000) 
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