<?php 
session_start();
include('../classes/Product.php');
if (!isset($_SESSION['id'])) {
  header("location: ../login.php");
} elseif(isset($_SESSION['id'])){
    if($_SESSION['is_admin'] == '0') {
        header("location:../index.php");
    }
}
$product = new Product();
$db = new Dbcon();
if(isset($_POST['submit'])) {
    $id = $_POST['id'];
    $category = $_POST['category'];
    $productname = $_POST['productname'];
    $pageurl = $_POST['pageurl'];
    $availablity = $_POST['availability'];
    $monthlyprice = $_POST['monthlyprice'];
    $annualprice = $_POST['annualprice'];
    $sku = $_POST['sku'];
    $webspaces = $_POST['webspaces'];
    $bandwidth = $_POST['bandwidth'];
    $domain = $_POST['domain'];
    $language = $_POST['language'];
    $mailbox = $_POST['mailbox'];
    $arr = array("webspaces"=>$webspaces, "bandwidth"=>$bandwidth, "domain"=>$domain, "language"=>$language, "mailbox"=>$mailbox);
    $featuresEncoded = json_encode($arr);
    $insert = $product->update_product1($id, $category, $productname, $pageurl, $monthlyprice, $annualprice, $sku, $featuresEncoded, $availablity, $db->conn);
}

if(isset($_GET['update'])) {
  $id = $_GET['id'];
  $sql = $product->selectproductwithid($id, $db->conn);
  // foreach($sql as $item) {
  //   echo $item['description']."<br>";
  // } die();
}
?>
  
<?php include_once('header.php');?>
  <!-- Main content -->
  <div class="main-content" id="panel">
    <!-- Topnav -->
    <nav class="navbar navbar-top navbar-expand navbar-dark bg-primary border-bottom">
      <div class="container-fluid">
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <!-- Search form -->
          <form class="navbar-search navbar-search-light form-inline mr-sm-3" id="navbar-search-main">
            <div class="form-group mb-0">
              <div class="input-group input-group-alternative input-group-merge">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="fas fa-search"></i></span>
                </div>
                <input class="form-control" placeholder="Search" type="text">
              </div>
            </div>
            <button type="button" class="close" data-action="search-close" data-target="#navbar-search-main" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </form>
          <!-- Navbar links -->
          <ul class="navbar-nav align-items-center  ml-md-auto ">
            <li class="nav-item d-xl-none">
              <!-- Sidenav toggler -->
              <div class="pr-3 sidenav-toggler sidenav-toggler-dark" data-action="sidenav-pin" data-target="#sidenav-main">
                <div class="sidenav-toggler-inner">
                  <i class="sidenav-toggler-line"></i>
                  <i class="sidenav-toggler-line"></i>
                  <i class="sidenav-toggler-line"></i>
                </div>
              </div>
            </li>
            <li class="nav-item d-sm-none">
              <a class="nav-link" href="#" data-action="search-show" data-target="#navbar-search-main">
                <i class="ni ni-zoom-split-in"></i>
              </a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="ni ni-bell-55"></i>
              </a>
              <div class="dropdown-menu dropdown-menu-xl  dropdown-menu-right  py-0 overflow-hidden">
                <!-- Dropdown header -->
                <div class="px-3 py-3">
                  <h6 class="text-sm text-muted m-0">You have <strong class="text-primary">13</strong> notifications.</h6>
                </div>
                <!-- List group -->
                <div class="list-group list-group-flush">
                  <a href="#!" class="list-group-item list-group-item-action">
                    <div class="row align-items-center">
                      <div class="col-auto">
                        <!-- Avatar -->
                        <img alt="Image placeholder" src="assets/img/theme/team-1.jpg" class="avatar rounded-circle">
                      </div>
                      <div class="col ml--2">
                        <div class="d-flex justify-content-between align-items-center">
                          <div>
                            <h4 class="mb-0 text-sm">John Snow</h4>
                          </div>
                          <div class="text-right text-muted">
                            <small>2 hrs ago</small>
                          </div>
                        </div>
                        <p class="text-sm mb-0">Let's meet at Starbucks at 11:30. Wdyt?</p>
                      </div>
                    </div>
                  </a>
                  <a href="#!" class="list-group-item list-group-item-action">
                    <div class="row align-items-center">
                      <div class="col-auto">
                        <!-- Avatar -->
                        <img alt="Image placeholder" src="assets/img/theme/team-2.jpg" class="avatar rounded-circle">
                      </div>
                      <div class="col ml--2">
                        <div class="d-flex justify-content-between align-items-center">
                          <div>
                            <h4 class="mb-0 text-sm">John Snow</h4>
                          </div>
                          <div class="text-right text-muted">
                            <small>3 hrs ago</small>
                          </div>
                        </div>
                        <p class="text-sm mb-0">A new issue has been reported for Argon.</p>
                      </div>
                    </div>
                  </a>
                  <a href="#!" class="list-group-item list-group-item-action">
                    <div class="row align-items-center">
                      <div class="col-auto">
                        <!-- Avatar -->
                        <img alt="Image placeholder" src="assets/img/theme/team-3.jpg" class="avatar rounded-circle">
                      </div>
                      <div class="col ml--2">
                        <div class="d-flex justify-content-between align-items-center">
                          <div>
                            <h4 class="mb-0 text-sm">John Snow</h4>
                          </div>
                          <div class="text-right text-muted">
                            <small>5 hrs ago</small>
                          </div>
                        </div>
                        <p class="text-sm mb-0">Your posts have been liked a lot.</p>
                      </div>
                    </div>
                  </a>
                  <a href="#!" class="list-group-item list-group-item-action">
                    <div class="row align-items-center">
                      <div class="col-auto">
                        <!-- Avatar -->
                        <img alt="Image placeholder" src="assets/img/theme/team-4.jpg" class="avatar rounded-circle">
                      </div>
                      <div class="col ml--2">
                        <div class="d-flex justify-content-between align-items-center">
                          <div>
                            <h4 class="mb-0 text-sm">John Snow</h4>
                          </div>
                          <div class="text-right text-muted">
                            <small>2 hrs ago</small>
                          </div>
                        </div>
                        <p class="text-sm mb-0">Let's meet at Starbucks at 11:30. Wdyt?</p>
                      </div>
                    </div>
                  </a>
                  <a href="#!" class="list-group-item list-group-item-action">
                    <div class="row align-items-center">
                      <div class="col-auto">
                        <!-- Avatar -->
                        <img alt="Image placeholder" src="assets/img/theme/team-5.jpg" class="avatar rounded-circle">
                      </div>
                      <div class="col ml--2">
                        <div class="d-flex justify-content-between align-items-center">
                          <div>
                            <h4 class="mb-0 text-sm">John Snow</h4>
                          </div>
                          <div class="text-right text-muted">
                            <small>3 hrs ago</small>
                          </div>
                        </div>
                        <p class="text-sm mb-0">A new issue has been reported for Argon.</p>
                      </div>
                    </div>
                  </a>
                </div>
                <!-- View all -->
                <a href="#!" class="dropdown-item text-center text-primary font-weight-bold py-3">View all</a>
              </div>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="ni ni-ungroup"></i>
              </a>
              <div class="dropdown-menu dropdown-menu-lg dropdown-menu-dark bg-default  dropdown-menu-right ">
                <div class="row shortcuts px-4">
                  <a href="#!" class="col-4 shortcut-item">
                    <span class="shortcut-media avatar rounded-circle bg-gradient-red">
                      <i class="ni ni-calendar-grid-58"></i>
                    </span>
                    <small>Calendar</small>
                  </a>
                  <a href="#!" class="col-4 shortcut-item">
                    <span class="shortcut-media avatar rounded-circle bg-gradient-orange">
                      <i class="ni ni-email-83"></i>
                    </span>
                    <small>Email</small>
                  </a>
                  <a href="#!" class="col-4 shortcut-item">
                    <span class="shortcut-media avatar rounded-circle bg-gradient-info">
                      <i class="ni ni-credit-card"></i>
                    </span>
                    <small>Payments</small>
                  </a>
                  <a href="#!" class="col-4 shortcut-item">
                    <span class="shortcut-media avatar rounded-circle bg-gradient-green">
                      <i class="ni ni-books"></i>
                    </span>
                    <small>Reports</small>
                  </a>
                  <a href="#!" class="col-4 shortcut-item">
                    <span class="shortcut-media avatar rounded-circle bg-gradient-purple">
                      <i class="ni ni-pin-3"></i>
                    </span>
                    <small>Maps</small>
                  </a>
                  <a href="#!" class="col-4 shortcut-item">
                    <span class="shortcut-media avatar rounded-circle bg-gradient-yellow">
                      <i class="ni ni-basket"></i>
                    </span>
                    <small>Shop</small>
                  </a>
                </div>
              </div>
            </li>
          </ul>
          <ul class="navbar-nav align-items-center  ml-auto ml-md-0 ">
            <li class="nav-item dropdown">
              <a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <div class="media align-items-center">
                  <span class="avatar avatar-sm rounded-circle">
                    <img alt="Image placeholder" src="assets/img/theme/team-4.jpg">
                  </span>
                  <div class="media-body  ml-2  d-none d-lg-block">
                    <span class="mb-0 text-sm  font-weight-bold"><?php echo "admin"; ?></span>
                  </div>
                </div>
              </a>
              <div class="dropdown-menu  dropdown-menu-right ">
                <div class="dropdown-header noti-title">
                  <h6 class="text-overflow m-0">Welcome!</h6>
                </div>
                <a href="#!" class="dropdown-item">
                  <i class="ni ni-single-02"></i>
                  <span>My profile</span>
                </a>
                <a href="#!" class="dropdown-item">
                  <i class="ni ni-settings-gear-65"></i>
                  <span>Settings</span>
                </a>
                <a href="#!" class="dropdown-item">
                  <i class="ni ni-calendar-grid-58"></i>
                  <span>Activity</span>
                </a>
                <a href="#!" class="dropdown-item">
                  <i class="ni ni-support-16"></i>
                  <span>Support</span>
                </a>
                <div class="dropdown-divider"></div>
                <a href="../logout.php" class="dropdown-item">
                  <i class="ni ni-user-run"></i>
                  <span>Logout</span>
                </a>
              </div>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <!-- Header -->
    <!-- Header -->
    <div class="header bg-primary pb-6">
      <div class="container-fluid">
        <div class="header-body">
          <div class="row align-items-center py-4">
            <div class="col-lg-6 col-7">
              <h6 class="h2 text-white d-inline-block mb-0">Add Products</h6>
              <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                  <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
                  <li class="breadcrumb-item"><a href="#">Products</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Add Products</li>
                </ol>
              </nav>
            </div>
            <div class="col-lg-6 col-5 text-right">
              <a href="#" class="btn btn-sm btn-neutral">New</a>
              <a href="#" class="btn btn-sm btn-neutral">Filters</a>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Page content -->
    <div class="container-fluid mt--6">
      <div class="row justify-content-center">
        <div class="col-md-2 col-lg-2"></div>
        <div class="col-md-8 col-lg-8">
          <div class="card">
            <div class="card-header bg-transparent">
              <h1 class="mb-0">Update Product</h1>
            </div>
            <div class="card-body">
                <form action="editproduct.php" method="post" id="basic-form">
                <?php  
                  if(isset($_GET['update'])) {
                  $id = $_GET['id'];
                  $sql = $product->selectproductwithid($id, $db->conn);
                  foreach($sql as $data) {
                    $decodedData = json_decode($data['description']);
                ?>
                    <input type="hidden" name="id" value="<?php echo $_GET['id'];?>">
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Select Category <span style="color:red">*</span></label>
                        <select class="form-control select" name="category"  required>
                            <option value="">Select Product Category</option>
                            <?php 
                                $sql = $product->select_subcategory($db->conn);
                                if($sql != 0) {
                                    foreach($sql as $item) {
                                        ?>
                                            <option value="<?php echo $item['id'];?>" <?php if($data['prod_parent_id'] == $item['id']) { echo "selected"; } ?>><?php echo $item['prod_name'];?></option>
                                        <?php
                                    }
                                }
                            ?>
                        </select>
                        <small id="productcategory"></small>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Enter Product Name <span style="color:red">*</span></label>
                        <input type="text" class="form-control productname"  name="productname" pattern='^([A-Za-z]+ )+[A-Za-z-0-9]+$|^[A-Za-z0-9]+$' required placeholder="Add Product Name" value="<?php echo $data['prod_name']; ?>">
                        <small id="productnameError"></small>
                    </div>
                    <p id="productname"></p>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Page Url <span style="color:red">*</span></label>
                        <input type="url" class="form-control" id="pageurl"  name="pageurl" placeholder="Add Page Url"  value="<?php echo $data['html']; ?>">
                        <small id="pageurlError"></small>
                    </div>

                    <hr>

                    <div class="card-header bg-transparent">
                        <h2 class="mb-0">Product Description</h2>
                        <p>Enter Product Description Below</p>
                    </div>
                    <br>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Enter Monthly Price <span style="color:red">*</span></label>
                        <input type="text" class="form-control mpriceid"  name="monthlyprice" required placeholder="ex. 23" value="<?php echo $data['mon_price']; ?>">
                        <small>This would be monthly plan</small><br>
                        <small id="lablemprice"></small>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Enter Annual Price <span style="color:red">*</span></label>
                        <input type="text" class="form-control apriceid"  name="annualprice" required placeholder="ex. 23" value="<?php echo $data['annual_price']; ?>">
                        <small>This would be Annual plan</small><br>
                        <small id="lableaprice"></small>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">SKU <span style="color:red">*</span></label>
                        <input type="text" class="form-control sku"  name="sku" required placeholder="" value="<?php echo $data['sku']; ?>">
                        <small id="sku"></small>
                    </div>

                    <hr>

                    <div class="card-header bg-transparent">
                        <h2 class="mb-0">Features</h2>
                    </div>
                    <br>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Web Spaces(in GB) <span style="color:red">*</span></label>
                        <input type="text" class="form-control webid"  name="webspaces" required value="<?php echo $decodedData->webspaces; ?>">
                        <small>Enter 0.5 for 512 MB</small><br>
                        <small id="lableweb"></small>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Bandwidth (in GB) <span style="color:red">*</span></label>
                        <input type="text" class="form-control bandid"  name="bandwidth" required value="<?php echo $decodedData->bandwidth; ?>">
                        <small>Enter 0.5 for 512 MB</small><br>
                        <small id="lableband"></small>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Free Domain <span style="color:red">*</span></label>
                        <input type="text" class="form-control domainid"  id="profree"  name="domain" required value="<?php echo $decodedData->domain; ?>">
                        <small>Enter 0 if no domain available in this service</small><br>
                        <small id="prodfree"></small>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Language/Technology Supporty <span style="color:red">*</span></label>
                        <input type="text"class="form-control prolang" name="language" id="prolang" required value="<?php echo $decodedData->language; ?>">
                        <small>Separate by (,) Ex: PHP, MySQL, MongoDB</small><br>
                        <small id="prodlang"></small>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Mailbox <span style="color:red">*</span></label>
                        <input type="text" class="form-control promail" id="promail"  name="mailbox" required value="<?php echo $decodedData->mailbox; ?>">
                        <small>Enter Number of mailbox will be provided, enter 0 if none</small><br>
                        <small  id="prodmail"></small>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Select Category <span style="color:red">*</span></label>
                        <select class="form-control" name="availability" id="availability" onblur ="forminputs(this.id)" required>
                            <option value="">Select Product Category</option>
                            <option value="0" <?php if($data['prod_available'] == '1') { echo "selected"; } ?>>Available</option>
                            <option value="1" <?php if($data['prod_available'] == '0') { echo "selected"; } ?>>Unavailable</option>
                        </select>
                        <small id="categoryError"></small>
                    </div>
                    <div class="form-group">
                        <input type="submit" id="submit" class="btn btn-primary" value="Update Product" name="submit">
                    </div>
                    <?php } 
                  }?>
                </form>
            </div>
          </div>
        </div>
        <div class="col-md-2 col-lg-2"></div>
      </div>

<?php include_once('footer.php');?>  
