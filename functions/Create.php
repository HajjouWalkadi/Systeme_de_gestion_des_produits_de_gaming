<?php
    //INCLUDE DATABASE FILE
    include '../functions/database.php';
    //SESSSION IS A WAY TO STORE DATA TO BE USED ACROSS MULTIPLE PAGES
    session_start();

    //ROUTING
    if(isset($_POST['saveProduct'])){
        // $image = $_POST['productImage'];
        $title = $_POST['productTitle'];
        $category = $_POST['productCategory'];
        $quantity = $_POST['productQuantity'];
        $price = $_POST['productPrice'];
   
        saveProductFn($title, intval($category), $quantity, $price);
    }


    function saveProductFn($title, $category, $quantity, $price)
    {        
        //CODE HERE
        //SQL INSERT
        global $conn;
        $sql = "INSERT INTO product (title, category, quantity, price) VALUES ('$title','$category','$quantity','$price')";
        mysqli_query($conn,$sql);

        // $_SESSION['message'] = "Product has been added successfully !";
        // header('location:.././pages/dashboard.php');
		
    }