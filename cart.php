<?php 
include_once("classes/Product.php");
$product = new Product();
$db = new Dbcon();
if(isset($_SESSION['id'])) {
	if($_SESSION['is_admin'] == '1') {
	header("location: admin/index.php");
	}
}
//     if(isset($_GET['id'])){
//     $data=$_GET['id'];bhai yar kyun aisa kartew ho
//     }
//     header('location:cart.php');
// }






include('header.php');
?>
<div class="content">
    <div class="about-section">
        <div class="container">
            <h2>Cart</h2>
            <div class="about-grids text-center">
             <?php
                    if(!isset($_SESSION['cart']) || count($_SESSION['cart']) == 0){
                        ?>
                            <h3>Looks like the cart is empty!</h3>
                            <p>Not a problem, let's find a plan that will fit your project best. <a href="catpage.php">Click Here</a> </p>
                        <?php
                    } else {
                ?>
                <table>
                    <thead>
                        <tr>
                            <th>PRODUCT SKU</th>
                            <th>PRODUCT NAME</th>
                            <th>MONTHLY SUBSCRIPTION</th>
                            <th>ANNUAL SUBSCRIPTION</th>
                            <th>TOTAL DISK SPACE</th>
                            <th>TOTAL DATA TRANSFER</th>
                            <th>TOTAL DOMAIN</th>
                            <th>TOTAL TECHNOLOGY</th>
                            <th>MAIL BOX</th>
            
                            <th>REMOVE</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        // print_r($_SESSION['cart']);
                        // die();
                            foreach($_SESSION['cart'] as $key => $value) {
                                $cart = $product->selectproductwithid($value['id'], $db->conn);
                                foreach($cart as $data){
                                    $decodeData = json_decode($data['description']);
                                    ?>
                                        <tr>
                                            <td><?php echo $data['sku']; ?></td>
                                            <td><?php echo $data['prod_name']; ?> </td>
                                            <td><?php echo $data['mon_price']; ?> INR</td>
                                            <td><?php echo $data['annual_price']; ?> INR</td>
                                            <td><?php echo $decodeData->webspaces; ?> GB</td>
                                            <td><?php echo $decodeData->bandwidth; ?> GB</td>
                                            <td><?php echo $decodeData->domain; ?></td>
                                            <td><?php echo $decodeData->language; ?></td>
                                            <td><?php echo $decodeData->mailbox; ?></td>
                                            <td><a onclick='return confirm("Are you sure, you want to Delete?")'  href="cart.php?prod_id=<?php echo $value['id']; ?>" class="btn btn-danger btn-sm">Remove</a></td>
                                           
                                        </tr>
                                    <?php
                                }
                            }
                        ?>
                    </tbody>
                </table>
                        <?php } ?>
            </div>
            <hr>
            <h4>Payment Method-</h4>
                <div class="aa-payment-method">                    
                    <label for="cashdelivery"><input type="radio" id="cashdelivery" name="optionsRadios" checked> Cash on Delivery </label>
                    <label for="paypal"><input type="radio" id="paypal" name="optionsRadios" > Via Paypal </label>
                    <img src="https://www.paypalobjects.com/webstatic/mktg/logo/AM_mc_vs_dc_ae.jpg" alt="PayPal Acceptance Mark">    
                    <input type="submit" value="Place Order" class="aa-browse-btn">                
                </div>
                
            
            <div class="clearfix"></div>
        </div>
    </div>
</div>
<?php include('footer.php');?>