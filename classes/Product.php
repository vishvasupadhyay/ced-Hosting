<?php
require_once ('Dbcon.php');
if(!isset($_SESSION)){
    session_start();
}

class Product {
    function select_category($conn) {
        $sql = "SELECT * FROM `tbl_product` WHERE `prod_parent_id` = '0'";
        $run = mysqli_query($conn, $sql);
        $rows = mysqli_num_rows($run);
        if($rows>0) {
            return $run;
        } else {
            return '0';
        }
    }

    function insert_subcategory($subcategory, $conn) {
        $html = str_replace(" ","",strtolower($subcategory));
        $html = $html.".php";
        $sql = "INSERT INTO `tbl_product`(`prod_parent_id`, `prod_name`, `html`, `prod_available`, `prod_launch_date`) VALUES('1', '$subcategory', '$html', '1', NOW())";
        $run = mysqli_query($conn, $sql);
        if($run == 1) {
            echo "<script>alert('SubCategory Added Successfully');window.location.href = 'createcategory.php';</script>";
        } else {
            echo "<script>alert('Please add a unique category');window.location.href = 'createcategory.php';</script>";
        }  
    }

    function select_subcategory($conn) {
        $sql = "SELECT * FROM `tbl_product` WHERE `prod_parent_id` = '1'";
        $run = mysqli_query($conn, $sql);
        $rows = mysqli_num_rows($run);
        if($rows>0) {
            return $run;
        } else {
            return '0';
        }
    }

    function select_parentname($id, $conn) {
        $sql = "SELECT * FROM `tbl_product` WHERE `id` = '$id'";
        $run = mysqli_query($conn, $sql);
        $rows = mysqli_num_rows($run);
        if($rows>0) {
            return $run;
        } else {
            return '0';
        }
    }

    function update_product($id, $name, $isavail, $conn) {
        $qry = "UPDATE `tbl_product` SET `prod_name` = '$name', `prod_available` = '$isavail' WHERE `id` = '$id'";
        $run = mysqli_query($conn, $qry);
        if($run == 1) {
            echo "<script>alert('Data Updated successfully');</script>";
            echo "<script>window.location.href = 'createcategory.php'; </script>";
        } else {
            echo "<script>alert('Some error occured!'); </script>";
            echo "<script>window.location.href = 'createcategory.php'; </script>";
        }
    }

    function delete_subcategory($id, $conn) {
        $qry = "DELETE FROM `tbl_product` WHERE `id` = '$id'";
        $run = mysqli_query($conn, $qry);
        if($run == 1) {
            echo "<script>alert('Data Deleted successfully');</script>";
            echo "<script>window.location.href = 'createcategory.php'; </script>";
        } else {
            echo "<script>alert('Some error occured!'); window.location.href = admin/createcategory.php;</script>";
        }
    }

    function insert_product($category, $productname, $pageurl, $monthlyprice, $annualprice, $sku, $featuresEncoded, $conn){

        $prodQuery = mysqli_query($conn, "INSERT INTO `tbl_product`(`prod_parent_id`, `prod_name`, `html`, `prod_available`, `prod_launch_date`) VALUES ('$category', '$productname', '$pageurl', '1', NOW())");
        $id = mysqli_insert_id($conn);
        if($prodQuery){
            $DescQuery = mysqli_query($conn, "INSERT INTO `tbl_product_description`(`prod_id`, `description`, `mon_price`, `annual_price`, `sku`) VALUES ('$id', '$featuresEncoded', '$monthlyprice', '$annualprice', '$sku')");
            if($DescQuery) {
                echo "<script>alert('Product Inserted successfully');</script>";
                echo "<script>window.location.href = 'addproduct.php'; </script>";
            } else {
                echo mysqli_error($conn);
            }
        } else {
            return false;
        }
        
    }
    function select_product($conn) {
        $sql = mysqli_query($conn, "SELECT * FROM `tbl_product_description` INNER JOIN `tbl_product` ON tbl_product_description.prod_id = tbl_product.id");
        $rows = mysqli_num_rows($sql);
        if($rows>0) {
            return $sql;
        } else {
            return '0';
        }
        function insert_product($category, $productname, $pageurl, $monthlyprice, $annualprice, $sku, $featuresEncoded, $conn){

        $prodQuery = mysqli_query($conn, "INSERT INTO `tbl_product`(`prod_parent_id`, `prod_name`, `html`, `prod_available`, `prod_launch_date`) VALUES ('$category', '$productname', '$pageurl', '1', NOW())");
        $id = mysqli_insert_id($conn);
        if($prodQuery){
            $DescQuery = mysqli_query($conn, "INSERT INTO `tbl_product_description`(`prod_id`, `description`, `mon_price`, `annual_price`, `sku`) VALUES ('$id', '$featuresEncoded', '$monthlyprice', '$annualprice', '$sku')");
            if($DescQuery) {
                echo "<script>alert('Product Inserted successfully');</script>";
                echo "<script>window.location.href = 'addproduct.php'; </script>";
            } else {
                echo mysqli_error($conn);
            }
            echo "<script>alert('Product Deleted successfully');</script>";
            echo "<script>window.location.href = 'viewproducts.php'; </script>";
        } else {
            echo "<script>alert('Some error occured!'); window.location.href = admin/viewproducts.php;</script>";
        }
    }
     }
        function delete_product($id, $conn) {
        $sql = mysqli_query($conn,"DELETE `tbl_product`, `tbl_product_description` FROM `tbl_product` INNER JOIN `tbl_product_description` ON `tbl_product`.`id` = `tbl_product_description`.`prod_id` WHERE `tbl_product`.`id` = '$id'");
        if($sql == 1) {
            echo "<script>alert('Product Deleted successfully');</script>";
            echo "<script>window.location.href = 'viewproducts.php'; </script>";
        } else {
            echo "<script>alert('Some error occured!'); window.location.href = admin/viewproducts.php;</script>";
        }
    }

    function selectproductwithid($id, $conn) {
        $sql = mysqli_query($conn, "SELECT * FROM `tbl_product_description` INNER JOIN `tbl_product` ON tbl_product_description.prod_id = tbl_product.id WHERE `prod_id` = '$id'");
        // print_r($sql);
        // die();
        $rows = mysqli_num_rows($sql);
        if($rows>0) {
            return $sql;
        } else {
            echo "<script>alert('Some error occured!'); window.location.href = admin/viewproducts.php;</script>";
        }
    }

    function update_product1($id, $category, $productname, $pageurl, $monthlyprice, $annualprice, $sku, $featuresEncoded, $availablity, $conn) {
        $sql=mysqli_query($conn, "UPDATE tbl_product_description INNER JOIN tbl_product ON tbl_product_description.prod_id = tbl_product.id SET tbl_product.prod_name = '$productname', tbl_product.prod_parent_id ='$category', tbl_product.html = '$pageurl', tbl_product.prod_available = '$availablity', tbl_product_description.description = '$featuresEncoded', tbl_product_description.mon_price ='$monthlyprice', tbl_product_description.annual_price = '$annualprice', tbl_product_description.sku = '$sku' WHERE tbl_product.id='$id'");
        if($sql == 1) {
            echo "<script>alert('Product Updated successfully');</script>";
            echo "<script>window.location.href = 'viewproducts.php'; </script>";
        } else {
            echo "<script>alert('Some error occured!'); window.location.href = admin/editproduct.php?update=1&id=$id;</script>";
        }
    }

    function select_product1($id,$conn){
            $sql= "SELECT * FROM tbl_product Where id='".$id."'";
             $run = mysqli_query($conn, $sql);
                $rows = mysqli_num_rows($run);
                if($rows>0) {
                    return $run;
                } else {
                    return '0';
                }

            }

            function cont_dyn($id,$conn){
       
            $sql="SELECT * FROM tbl_product
            INNER JOIN tbl_product_description ON tbl_product.id = tbl_product_description.prod_id WHERE `prod_parent_id`='$id'";
            $run = mysqli_query($conn, $sql);
            $rows = mysqli_num_rows($run);
            if($rows>0) {
                return $run;
            } else {
                return '0';
            }
        }
}

?>

