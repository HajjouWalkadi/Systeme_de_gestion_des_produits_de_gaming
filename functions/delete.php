<?php
      include 'database.php';

      global $conn;

      $id = $_GET['id'];
      $sql = "DELETE FROM product WHERE id = '$id' ";
      $result = mysqli_query($conn,$sql);

      header('location: ../pages/dashboard.php');
