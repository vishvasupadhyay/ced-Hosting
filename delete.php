<?php
session_start();

    if(isset($_GET['id'])){
    $cart=$_GET['id'];
    echo $cart;
    foreach ($_SESSION['cart'] as $key=>$data){
    unset($_SESSION['id'][$cart]);
    }
    header('location:cart.php');
}

?> 