<?php
  include 'database.php';

  function TotalProduct(){
    global $conn;
    $sql="SELECT count(*) as total FROM product";
    $result=mysqli_query($conn, $sql);
    $row=mysqli_fetch_assoc($result);
    return $row;
  }

  function TotalGategorie(){
    global $conn;
    $sql="SELECT count(*) as total FROM categorie";
    $result=mysqli_query($conn, $sql);
    $row=mysqli_fetch_assoc($result);
    return $row;
  }


  