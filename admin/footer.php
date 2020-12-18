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
        $("#submit10").attr("disabled",true)
        $(this).css('border', 'solid 3px red');
    } else {
        $("#prodCategory").hide();
        $(this).css('border', 'solid 2px green');
        $("#submit10").attr("disabled",false)
    }
    
});

$(".productname").focusout(function() {
    $productname = $(".productname").val();
    var ans1 = $productname.replace(/ /g, '');
    var ans2 = Number(ans1);
    if ($productname == "" || $productname == null) {
        $("#productname").html("*Enter Product Name");
        $("#productname").show();
        $("#submit10").attr("disabled",true)
        $(this).css('border', 'solid 3px red');
    } else if (!$productname.match(/^[a-zA-Z0-9-]+( [a-zA-Z0-9]+)*$/)) {
        $("#productname").html("*Product Name can be alpha-numeric/only alphabetic and one space between words allowed");
        $("#productname").show();
        $("#submit10").attr("disabled",true)
        $(this).css('border', 'solid 3px red');
    } else if (Number.isInteger(ans2)) {
        $("#productname").html("*Product Name can be alpha-numeric/only alphabetic and one space between words allowed");
        $("#productname").show();
        $("#submit10").attr("disabled",true)
        $(this).css('border', 'solid 3px red');
    } else {
        $("#productname").hide();
        $(this).css('border', 'solid 2px green');
         $("#submit10").attr("disabled",false)
    }

});



$(".mpriceid").focusout(function() {
    $mprice = $(".mpriceid").val();
    $first = $mprice.substr(0, 1);
    $second = $mprice.substr(1, 1);
    if ($mprice == "" || $mprice == 0) {
        $("#lablemprice").html("*Enter Monthly Price");
        $("#lablemprice").show();
        $("#submit10").attr("disabled",true)
        $(this).css('border', 'solid 3px red');
    } else if (!$mprice.match(/^[0-9]\d{0,14}(\.\d+)?$/)) {
        $("#lablemprice").html("*Price can be only integer and only one dot(.) allowed and max length 15");
        $("#lablemprice").show();
        $("#submit10").attr("disabled",true)
        $(this).css('border', 'solid 3px red');
    } else if ($first == 0 && $second == 0) {
        $("#lablemprice").html("*In starting you cant have two zero");
        $("#lablemprice").show();
        $("#submit10").attr("disabled",true)
        $(this).css('border', 'solid 3px red');
    } else {
        $("#lablemprice").hide();
        $(this).css('border', 'solid 2px green');
         $("#submit10").attr("disabled",false)
    }
   
  })


$(".apriceid").focusout(function() {
    $aprice = $(".apriceid").val();
    $first = $aprice.substr(0, 1);
    $second = $aprice.substr(1, 1);
    if ($aprice == "" || $aprice == 0) {
        $("#lableaprice").html("*Enter annual Price");
        $("#lableaprice").show();
        $("#submit10").attr("disabled",true)
        $(this).css('border', 'solid 3px red');
    } else if (!$aprice.match(/^[0-9]\d{0,14}(\.\d+)?$/)) {
        $("#lableaprice").html("*Price can be only integer and only one dot(.) allowed and max length 15");
        $("#lableaprice").show();
        $("#submit10").attr("disabled",true)
        $(this).css('border', 'solid 3px red');
    } else if ($first == 0 && $second == 0) {
        $("#lableaprice").html("*In starting you cant have two zero");
        $("#lableaprice").show();
        $("#submit10").attr("disabled",true)
        $(this).css('border', 'solid 3px red');
    } else {
        $("#lableaprice").hide();
        $(this).css('border', 'solid 2px green');
         $("#submit10").attr("disabled",false)
    }
})

$(".sku").focusout(function() {
    $sku = $(".sku").val();
    if ($sku == "" || $sku == null) {
        $("#sku").html("*Enter SKU");
        $("#sku").show();
        $("#submit10").attr("disabled",true)
        $(this).css('border', 'solid 3px red');
    } else if (!$sku.match(/^[a-zA-Z0-9#](?:[a-zA-Z0-9_-]*[a-zA-Z0-9])?$/)) {
        $("#sku").html("*SKU can be combination of Alphanumeric/specail character Not only Special character");
        $("#sku").show();
        $("#submit10").attr("disabled",true)
        $(this).css('border', 'solid 3px red');
    } else {
        $("#sku").hide();
        $(this).css('border', 'solid 2px green');
         $("#submit10").attr("disabled",false)
    }
    
});

$(".webid").focusout(function() {
    $web = $(".webid").val();
    $first = $web.substr(0, 1);
    $second = $web.substr(1, 1);
    if ($web == "" || $web == 0) {
        $("#lableweb").html("*Enter web space.");
        $("#lableweb").show();
        $("#submit10").attr("disabled",true)
        $(this).css('border', 'solid 3px red');
    } else if (!$web.match(/^\d{1,14}(\.\d+)?$/)) {
        $("#lableweb").html("*Web Space can be only integer and only one dot(.) allowed");
        $("#lableweb").show();
        $("#submit10").attr("disabled",true)
        $(this).css('border', 'solid 3px red');
    } else if ($first == 0 && $second == 0) {
        $("#lableweb").html("*In starting you cant have two zero");
        $("#lableweb").show();
        $("#submit10").attr("disabled",true)
        $(this).css('border', 'solid 3px red');
    } else {
        $("#lableweb").hide();
        $(this).css('border', 'solid 2px green');
         $("#submit10").attr("disabled",false)
    }
    
})



$(".bandid").focusout(function() {
    $band = $(".bandid").val();
    $first = $band.substr(0, 1);
    $second = $band.substr(1, 1);
    if ($band == "" || $band == 0) {
        $("#lableband").html("*Enter  bandwidth.");
        $("#lableband").show();
        $("#submit10").attr("disabled",true);
        $(this).css('border', 'solid 3px red');
    } else if (!$band.match(/^\d{1,14}(\.\d+)?$/)) {
        $("#lableband").html("*Bandwidth can be only integer and only one dot(.) allowed");
        $("#lableband").show();
        $("#submit10").attr("disabled",true);
        $(this).css('border', 'solid 3px red');
    } else if ($first == 0 && $second == 0) {
        $("#lableband").html("*In starting you cant have two zero");
        $("#lableband").show();
        $("#submit10").attr("disabled",true);
        $(this).css('border', 'solid 3px red');
    } else {
        $("#lableband").hide();
        $(this).css('border', 'solid 2px green');
         $("#submit10").attr("disabled",false)
    }
 
})


$(".domainid").focusout(function() {
$profree = $("#profree").val();
$first=$profree.substr(0,1);
console.log($first);

if($first.match(/^[a-zA-Z]+$/))
{
$pattern=/^[a-zA-Z]+$/;
}
else if($first.match(/^[0-9]+$/))
{
$pattern=/^[0-9]+$/;
}
if ($profree == "") {
$("#prodfree").html("*Select Free Domain as 0 if not required");
$("#prodfree").show();
$("#submit10").attr("disabled",true);

$(this).css('border', 'solid 3px red');
count7=0;
}
else if(!$profree.match($pattern))
{
$("#prodfree").html("*Select Valid Free Domain");
$("#prodfree").show();
$("#submit10").attr("disabled",true);

$(this).css('border', 'solid 3px red');
count7=0;
}




else {

$("#prodfree").hide();
$(this).css('border', 'solid 2px green');
count7=1;
$("#submit10").attr("disabled",false)
}
});


$(".prolang").focusout(function() {
$prolang = $("#prolang").val();
if ($prolang == "") {
$("#prodlang").html("*Select lang Space in G.B");
$("#prodlang").show();
$("#submit10").attr("disabled",true);

$(this).css('border', 'solid 3px red');
count8=0;
}
else if(!$prolang.match("^[a-zA-Z0-9]*[a-zA-Z]+[0-9]*(,?([a-zA-Z0-9]*[a-zA-Z]+[0-9]*)+)*$"))
{
$("#prodlang").html("*Select Valid language");
$("#prodlang").show();
$("#submit10").attr("disabled",true);

$(this).css('border', 'solid 3px red');
count8=0;
}

else {

$("#prodlang").hide();
$(this).css('border', 'solid 2px green');
count8=1;
 $("#submit10").attr("disabled",false)
}



});


$(".promail").focusout(function() {
$promail = $("#promail").val();
if ($promail == "") {
$("#prodmail").html("*Select Mail");
$("#prodmail").show();
$("#submit10").attr("disabled",true);

$(this).css('border', 'solid 3px red');
count9=0;
}
else if(!$promail.match(/^[0-9]+$/))
{
$("#prodmail").html("*Select Valid Mail box");
$("#prodmail").show();
$("#submit10").attr("disabled",true);

$(this).css('border', 'solid 3px red');
count9=0;
}



else {

$("#prodmail").hide();
$(this).css('border', 'solid 2px green');
count9=1;
 $("#submit10").attr("disabled",false)

}




});


</script>
</body>

</html>