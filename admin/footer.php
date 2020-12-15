<!-- Footer -->
<footer class="footer pt-0">
        <div class="row align-items-center justify-content-lg-between">
          <div class="col-lg-6">
            <div class="copyright text-center  text-lg-left  text-muted">
              &copy; 2020 <a href="https://www.creative-tim.com" class="font-weight-bold ml-1" target="_blank">Creative Tim</a>
            </div>
          </div>
          <div class="col-lg-6">
            <ul class="nav nav-footer justify-content-center justify-content-lg-end">
              <li class="nav-item">
                <a href="https://www.creative-tim.com" class="nav-link" target="_blank">Creative Tim</a>
              </li>
              <li class="nav-item">
                <a href="https://www.creative-tim.com/presentation" class="nav-link" target="_blank">About Us</a>
              </li>
              <li class="nav-item">
                <a href="http://blog.creative-tim.com" class="nav-link" target="_blank">Blog</a>
              </li>
              <li class="nav-item">
                <a href="https://github.com/creativetimofficial/argon-dashboard/blob/master/LICENSE.md" class="nav-link" target="_blank">MIT License</a>
              </li><p id="productname"></p>
            </ul>
          </div>
        </div>
      </footer>
    </div>
  </div>
  <!-- Argon Scripts -->
  <!-- Core -->
  <script src="assets/vendor/jquery/dist/jquery.min.js"></script>
  <script src="assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/js-cookie/js.cookie.js"></script>
  <script src="assets/vendor/jquery.scrollbar/jquery.scrollbar.min.js"></script>
  <script src="assets/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js"></script>
  <!-- Optional JS -->
  <script src="assets/vendor/chart.js/dist/Chart.min.js"></script>
  <script src="assets/vendor/chart.js/dist/Chart.extension.js"></script>
  <!-- Argon JS -->
  <script src="assets/js/argon.js?v=1.2.0"></script>
  <script>
    $(".select").focusout(function() {
    $category = $(".select").val();
    if ($category == "" || $category== null) {
        $("#productcategory").html("*Select Category");
        $("#productcategory").show();
        $(this).css('border', 'solid 3px red');
    } else {
        $("#prodCategory").hide();
        $(this).css('border', 'solid 3px green');
    }
});

$(".productname").focusout(function() {
    $productname = $(".productname").val();
    var ans1 = $productname.replace(/ /g, '');
    var ans2 = Number(ans1);
    if ($productname == "" || $productname == null) {
        $("#productname").html("*Enter Product Name");
        $("#productname").show();
        $(this).css('border', 'solid 3px red');
    } else if (!$productname.match(/^[a-zA-Z0-9]+( [a-zA-Z0-9]+)*$/)) {
        $("#productname").html("*Product Name can be alpha-numeric/only alphabetic and one space between words allowed");
        $("#productname").show();
        $(this).css('border', 'solid 3px red');
    } else if (Number.isInteger(ans2)) {
        $("#productname").html("*Product Name can be alpha-numeric/only alphabetic and one space between words allowed");
        $("#productname").show();
        $(this).css('border', 'solid 3px red');
    } else {
        $("#productname").hide();
        $(this).css('border', 'solid 3px green');
    }
});



$(".mpriceid").focusout(function() {
    $mprice = $(".mpriceid").val();
    $first = $mprice.substr(0, 1);
    $second = $mprice.substr(1, 1);
    if ($mprice == "" || $mprice == 0) {
        $("#lablemprice").html("*Enter Monthly Price");
        $("#lablemprice").show();
        $(this).css('border', 'solid 3px red');
    } else if (!$mprice.match(/^[0-9]\d*(\.\d+)?$/)) {
        $("#lablemprice").html("*Price can be only integer and only one dot(.) allowed");
        $("#lablemprice").show();
        $(this).css('border', 'solid 3px red');
    } else if ($first == 0 && $second == 0) {
        $("#lablemprice").html("*In starting you cant have two zero");
        $("#lablemprice").show();
        $(this).css('border', 'solid 3px red');
    } else {
        $("#lablemprice").hide();
        $(this).css('border', 'solid 3px green');
    }
  })


$(".apriceid").focusout(function() {
    $aprice = $(".apriceid").val();
    $first = $aprice.substr(0, 1);
    $second = $aprice.substr(1, 1);
    if ($aprice == "" || $aprice == 0) {
        $("#lableaprice").html("*Enter annual Price");
        $("#lableaprice").show();
        $(this).css('border', 'solid 3px red');
    } else if (!$aprice.match(/^[0-9]\d*(\.\d+)?$/)) {
        $("#lableaprice").html("*Price can be only integer and only one dot(.) allowed");
        $("#lableaprice").show();
        $(this).css('border', 'solid 3px red');
    } else if ($first == 0 && $second == 0) {
        $("#lableaprice").html("*In starting you cant have two zero");
        $("#lableaprice").show();
        $(this).css('border', 'solid 3px red');
    } else {
        $("#lableaprice").hide();
        $(this).css('border', 'solid 3px green');
    }
})

$(".sku").focusout(function() {
    $sku = $(".sku").val();
    if ($sku == "" || $sku == null) {
        $("#sku").html("*Enter SKU");
        $("#sku").show();
        $(this).css('border', 'solid 3px red');
    } else if (!$sku.match(/^(?=.*\d)(?=.*[a-zA-Z])(?=.*[#-]).{1,}$/)) {
        $("#sku").html("*SKU can be combination of Alphanumeric/specail character Not only Special character");
        $("#sku").show();
        $(this).css('border', 'solid 3px red');
    } else {
        $("#sku").hide();
        $(this).css('border', 'solid 3px green');
    }
});

$(".webid").focusout(function() {
    $web = $(".webid").val();
    $first = $web.substr(0, 1);
    $second = $web.substr(1, 1);
    if ($web == "" || $web == 0) {
        $("#lableweb").html("*Enter web space.");
        $("#lableweb").show();
        $(this).css('border', 'solid 3px red');
    } else if (!$web.match(/^[0-9]\d*(\.\d+)?$/)) {
        $("#lableweb").html("*Web Space can be only integer and only one dot(.) allowed");
        $("#lableweb").show();
        $(this).css('border', 'solid 3px red');
    } else if ($first == 0 && $second == 0) {
        $("#lableweb").html("*In starting you cant have two zero");
        $("#lableweb").show();
        $(this).css('border', 'solid 3px red');
    } else {
        $("#lableweb").hide();
        $(this).css('border', 'solid 3px green');
    }
})



$(".bandid").focusout(function() {
    $band = $(".bandid").val();
    $first = $band.substr(0, 1);
    $second = $band.substr(1, 1);
    if ($band == "" || $band == 0) {
        $("#lableband").html("*Enter  bandwidth.");
        $("#lableband").show();
        $(this).css('border', 'solid 3px red');
    } else if (!$band.match(/^[0-9]\d*(\.\d+)?$/)) {
        $("#lableband").html("*Bandwidth can be only integer and only one dot(.) allowed");
        $("#lableband").show();
        $(this).css('border', 'solid 3px red');
    } else if ($first == 0 && $second == 0) {
        $("#lableband").html("*In starting you cant have two zero");
        $("#lableband").show();
        $(this).css('border', 'solid 3px red');
    } else {
        $("#lableband").hide();
        $(this).css('border', 'solid 3px green');
    }
})


$(".domainid").focusout(function() {
    $domain = $(".domainid").val();
     $first = $band.substr(0, 1);
    // $second = $band.substr(1, 1);
    if ($domain == "" || $domain == null) {
        $("#labledomain").html("*Enter  No of domain.");
        $("#labledomain").show();
        $(this).css('border', 'solid 3px red');
    } else if (!$domain.match(/^[0-9]\d*?$/)) {
        $("#labledomain").html("*Domain can be only Numeric and dot(.) not allowed");
        $("#labledomain").show();
        $(this).css('border', 'solid 3px red');
    } else {
        $("#labledomain").hide();
        $(this).css('border', 'solid 3px green');
    }

});












   

   

  </script>
</body>

</html>