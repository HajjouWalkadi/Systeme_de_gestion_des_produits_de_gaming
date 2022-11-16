<?php

$conn = mysqli_connect("localhost","root","","gaming");

if(!$conn){
    echo "connexion failed";
}