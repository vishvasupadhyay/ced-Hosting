
<?php 
  
   if(isset($_GET['id'])){
		$id=$_GET['id'];
		session_start();
    include_once('classes/Product.php');
        
        $db= new Dbcon();
		$product = new Product();
		if(isset($_SESSION['id'])){
			if($_SESSION['is_admin']=='1'){
				header("location:admin/index.php");
			}
		}
		if(isset($_GET['prodid'])){
			if(isset($_SESSION['cart'])){
				$flag=0;
			// 	$_SESSION['cart'] = array();
			// 	$_SESSION['cart'][] = array('id'=>$_GET['id']);
			// }else{
				foreach($_SESSION['cart'] as $key=> $value){
					if($value['id'] == $_GET['prodid']){
						$flag=1;
						echo "<script>alert('product already added');window.location.href = 'cart.php';</script>";
					}
						// $_SESSION['cart'][] = array('id'=>$_GET['id']);
					
				}
			if($flag==0){
				$_SESSION['cart'][] = array('id'=>$_GET['prodid']);
			}
		}else{
			$_SESSION['cart'][] = array('id'=>$_GET['prodid']);
		}
			// header("location:cart.php");
	 }	
}  
 ?> 
 <?php include "header.php";?>   
 <?php
        $sql= $product->select_product1($id,$db->conn);
          foreach($sql as $item){
           echo $item['html'];
        }
       
   
   
   $sq=$product->cont_dyn($id,$db->conn);
    
?>

			<div class="content">
				<div class="tab-prices">
						<div class="container">
							<div class="bs-example bs-example-tabs" role="tabpanel" data-example-id="togglable-tabs">
								<ul id="myTab" class="nav nav-tabs left-tab" role="tablist">
									<li role="presentation" class="active"><a href="#home" id="home-tab" role="tab" data-toggle="tab" aria-controls="home" aria-expanded="true">IN Hosting</a></li>
									<li role="presentation"><a href=".linux-top" role="tab" id="profile-tab" data-toggle="tab" aria-controls="profile">US Hosting</a></li>
									</ul>
								<div id="myTabContent" class="tab-content">
									<div role="tabpanel" class="tab-pane fade in active" id="home" aria-labelledby="home-tab">
										<div class="linux-prices">
										<?php
									if ($sq !='0'){	 
									foreach($sq as $item) {
										$data = json_decode($item['description']);
										?>
  
									            <div class="col-md-3 linux-price">
												<div class="linux-top">
                        
                                            
												<h4><?php echo $item['prod_name'];?></h4>
												</div>
												<div class="linux-bottom">
													<h5><?php echo $item['mon_price']; ?> INR. <span class="month">per month</span></h5>
													<h5><?php echo $item['annual_price'];?> INR. <span class="month">per year</span></h5>
													<h6><?php echo $data->domain;?> Domain</h6>
													<ul>
													<li><strong?><?php echo $data->webspaces?> GB </strong>Disk Space</li>
                                                    <li><strong><?php echo $item['sku']?> </strong>SKU</li>
													<li><strong><?php echo $data->bandwidth?> GB </strong> Data Transfer</li>
													<li><strong><?php echo $data->mailbox?> </strong>Email Accounts</li>
													<li><strong><?php echo $data->domain?> </strong>Global CDN</li>
													<li><strong><?php echo $data->language?> </strong>Servers</li>
													<li><strong>location</strong> : <img src="images/india.png"></li>
													</ul>
												</div>
												<a href="catpage.php?id=<?php echo $id; ?>&prodid=<?php echo $item['prod_id'];?>">Add To Cart</a>
											</div>
											<?php
									}	
									  }else{
										  echo "No Data Available";
									  }
								
									  
									?>
									</div>
									</div>
										
											<div class="col-md-3 linux-price">
												<!-- <div class="linux-top">
												<h4>Advanced</h4>
												</div>
												<div class="linux-bottom">
													<h5>$279 <span class="month">per month</span></h5>
													<h6>2 Domain</h6>
													<ul>
													<li><strong>Unlimited</strong> Disk Space</li>
													<li><strong>Unlimited</strong> Data Transfer</li>
													<li><strong>Unlimited</strong> Email Accounts</li>
													<li><strong>Includes </strong>  Global CDN</li>
													<li><strong>High Performance</strong>  Servers</li>
													<li><strong>location</strong> : <img src="images/india.png"></li>
													</ul>
												</div>
												<a href="#">buy now</a>
											</div> -->
											<div class="col-md-3 linux-price">
												<!-- <div class="linux-top">
												<h4>Business</h4>
												</div>
												<div class="linux-bottom">
													<h5>$279 <span class="month">per month</span></h5>
													<h6>3 Domain</h6>
													<ul>
													<li><strong>Unlimited</strong> Disk Space</li>
													<li><strong>Unlimited</strong> Data Transfer</li>
													<li><strong>Unlimited</strong> Email Accounts</li>
													<li><strong>Includes </strong>  Global CDN</li>
													<li><strong>High Performance</strong>  Servers</li>
													<li><strong>location</strong> : <img src="images/india.png"></li>
													</ul>
												</div>
												<a href="#">buy now</a>
											</div> -->
											<div class="col-md-3 linux-price">
												<!-- <div class="linux-top">
												<h4>Pro</h4>
												</div>
												<div class="linux-bottom">
													<h5>$259 <span class="month">per month</span></h5>
													<h6>Unlimited Domains</h6>
													<ul>
													<li><strong>Unlimited</strong> Disk Space</li>
													<li><strong>Unlimited</strong> Data Transfer</li>
													<li><strong>Unlimited</strong> Email Accounts</li>
													<li><strong>Includes </strong>  Global CDN</li>
													<li><strong>High Performance</strong>  Servers</li>
													<li><strong>location</strong> : <img src="images/india.png"></li>
													</ul>
												</div>
												<a href="#">buy now</a>
											</div> -->
											<div class="clearfix"></div>
										</div>
									</div>
									<!-- <div role="tabpanel" class="tab-pane fade" id="profile" aria-labelledby="profile-tab">
									<div class="linux-prices">
											<div class="col-md-3 linux-price">
												<div class="linux-top us-top">
												<h4>Standard</h4>
												</div>
												<div class="linux-bottom us-bottom">
													<h5>$259 <span class="month">per month</span></h5>
													<h6>Single Domain</h6>
													<ul>
													<li><strong>Unlimited</strong> Disk Space</li>
													<li><strong>Unlimited</strong> Data Transfer</li>
													<li><strong>Unlimited</strong> Email Accounts</li>
													<li><strong>Includes </strong>  Global CDN</li>
													<li><strong>High Performance</strong>  Servers</li>
													<li><strong>location</strong> : <img src="images/us.png"></li>
													</ul>
												</div>
												<a href="#" class="us-button">buy now</a>
											</div>
											<div class="col-md-3 linux-price">
												<div class="linux-top us-top">
												<h4>Advanced</h4>
												</div>
												<div class="linux-bottom us-bottom">
													<h5>$359 <span class="month">per month</span></h5>
													<h6>2 Domains</h6>
													<ul>
													<li><strong>Unlimited</strong> Disk Space</li>
													<li><strong>Unlimited</strong> Data Transfer</li>
													<li><strong>Unlimited</strong> Email Accounts</li>
													<li><strong>Includes </strong>  Global CDN</li>
													<li><strong>High Performance</strong>  Servers</li>
													<li><strong>location</strong> : <img src="images/us.png"></li>
													</ul>
												</div>
												<a href="#" class="us-button">buy now</a>
											</div>
											<div class="col-md-3 linux-price">
												<div class="linux-top us-top">
												<h4>Business</h4>
												</div>
												<div class="linux-bottom us-bottom">
													<h5>$539 <span class="month">per month</span></h5>
													<h6>3 Domains</h6>
													<ul>
													<li><strong>Unlimited</strong> Disk Space</li>
													<li><strong>Unlimited</strong> Data Transfer</li>
													<li><strong>Unlimited</strong> Email Accounts</li>
													<li><strong>Includes </strong>  Global CDN</li>
													<li><strong>High Performance</strong>  Servers</li>
													<li><strong>location</strong> : <img src="images/us.png"></li>
													</ul>
												</div>
												<a href="#" class="us-button">buy now</a>
											</div>
											<div class="col-md-3 linux-price">
												<div class="linux-top us-top">
												<h4>Pro</h4>
												</div>
												<div class="linux-bottom us-bottom">
													<h5>$639 <span class="month">per month</span></h5>
													<h6>Unlimited Domains</h6>
													<ul>
													<li><strong>Unlimited</strong> Disk Space</li>
													<li><strong>Unlimited</strong> Data Transfer</li>
													<li><strong>Unlimited</strong> Email Accounts</li>
													<li><strong>Includes </strong>  Global CDN</li>
													<li><strong>High Performance</strong>  Servers</li>
													<li><strong>location</strong> : <img src="images/us.png"></li>
													</ul>
												</div>
												<a href="#" class="us-button">buy now</a>
											</div> -->
											<div class="clearfix"></div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!-- clients -->
				<div class="clients">
					<div class="container">
						<h3>Some of our satisfied clients include...</h3>
						<ul>
							<li><a href="#"><img src="images/c1.png" title="disney" /></a></li>
							<li><a href="#"><img src="images/c2.png" title="apple" /></a></li>
							<li><a href="#"><img src="images/c3.png" title="microsoft" /></a></li>
							<li><a href="#"><img src="images/c4.png" title="timewarener" /></a></li>
							<li><a href="#"><img src="images/c5.png" title="disney" /></a></li>
							<li><a href="#"><img src="images/c6.png" title="sony" /></a></li>
						</ul>
					</div>
				</div>
       <!-- clients -->
					<!-- Wordpress Features -->
					<!-- <div class="features">
						<div class="container">
							<h3>Wordpress Features</h3>
							<div class="features-grids">
								<div class="col-md-4 features-grid">
									<img src="images/f1.png">
										<h4>Expert Web Design</h4>
										<p>Lorem ipsum dolor sit amet conse ctetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore </p>
									</div>
									<div class="col-md-4 features-grid">
										<img src="images/f2.png">
										<h4>Expert Web Design</h4>
										<p>Lorem ipsum dolor sit amet conse ctetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore </p>
									</div>
									<div class="col-md-4 features-grid">
										<img src="images/f3.png">
										<h4>Expert Web Design</h4>
										<p>Lorem ipsum dolor sit amet conse ctetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore </p>
									</div>
								<div class="clearfix"></div>
							</div>
							<div class="features-grids">
								<div class="col-md-4 features-grid">
									<img src="images/f4.png">
										<h4>Expert Web Design</h4>
										<p>Lorem ipsum dolor sit amet conse ctetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore </p>
									</div>
									<div class="col-md-4 features-grid">
										<img src="images/f5.png">
										<h4>Expert Web Design</h4>
										<p>Lorem ipsum dolor sit amet conse ctetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore </p>
									</div>
									<div class="col-md-4 features-grid">
										<img src="images/f6.png">
										<h4>Expert Web Design</h4>
										<p>Lorem ipsum dolor sit amet conse ctetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore </p>
									</div>
								<div class="clearfix"></div>
							</div>
						</div>
					</div> -->
					<!-- Wordpress Features -->
				</div>








<?php include "footer.php"?>