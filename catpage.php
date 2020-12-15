<?php include "header.php" ?>



  <?php 
  
        if(isset($_GET['id'])){
        $id=$_GET['id'];
        
        require_once('classes/Product.php');
        require_once('classes/Dbcon.php');
        $db= new Dbcon();
        $product = new Product();
       
        $sql= $product->select_product1($id,$db->conn);
          foreach($sql as $item){
           echo $item['html'];
        }
    }



  
  ?>









<?php include "footer.php"?>