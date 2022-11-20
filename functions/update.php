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
        $sql = "UPDATE product SET title = '$title',category = '$categorie',quantity = '$quantity',price = '$price' WHERE id = '$id' ";
        $result = mysqli_query($conn,$sql);
        if($result){
            header('location: ../pages/dashboard.php');
        }
     }