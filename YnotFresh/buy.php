<?php
session_start();
require_once("dbcontroller.php");
$db_handle = new DBController();
if(!empty($_GET["action"])) {
switch($_GET["action"]) {
	case "add":
		if(!empty($_POST["quantity"])) {
			$productByCode = $db_handle->runQuery("SELECT * FROM tblproduct WHERE code='" . $_GET["code"] . "'");
			$itemArray = array($productByCode[0]["code"]=>array('name'=>$productByCode[0]["name"], 'code'=>$productByCode[0]["code"], 'quantity'=>$_POST["quantity"], 'price'=>$productByCode[0]["price"], 'image'=>$productByCode[0]["image"]));
			
			if(!empty($_SESSION["cart_item"])) {
				if(in_array($productByCode[0]["code"],array_keys($_SESSION["cart_item"]))) {
					foreach($_SESSION["cart_item"] as $k => $v) {
							if($productByCode[0]["code"] == $k) {
								if(empty($_SESSION["cart_item"][$k]["quantity"])) {
									$_SESSION["cart_item"][$k]["quantity"] = 0;
								}
								$_SESSION["cart_item"][$k]["quantity"] += $_POST["quantity"];
							}
					}
				} else {
					$_SESSION["cart_item"] = array_merge($_SESSION["cart_item"],$itemArray);
				}
			} else {
				$_SESSION["cart_item"] = $itemArray;
			}
		}
	break;
	case "remove":
		if(!empty($_SESSION["cart_item"])) {
			foreach($_SESSION["cart_item"] as $k => $v) {
					if($_GET["code"] == $k)
						unset($_SESSION["cart_item"][$k]);				
					if(empty($_SESSION["cart_item"]))
						unset($_SESSION["cart_item"]);
			}
		}
	break;
	case "empty":
		unset($_SESSION["cart_item"]);
	break;	
}
}
?>
<HTML>
<head>


<title>YnotFresh</title>
<link href="style.css" type="text/css" rel="stylesheet" />
<link href="css/models.css" rel="stylesheet">
<link rel="icon"type="image/png" sizes="16x16" href="product-images/apple.jpg">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>
<body>

<nav class="nav-menu">
    <div class="topnav" id="navbar" class="navbar-collapse collapse" >

     

            <a class="Side-bar" href="#about"><i class="fa fa-fw fa-envelope"></i>About</a>
            <a class="Side-bar" href="#contact"><i class="	fa fa-thumbs-up"></i>Service</a>
            <a class="Side-bar" href="buy.php"><i class="fa fa-bullhorn"></i>Buy Now</a>
            <a class="Side-bar" href="index.php"><i class="fa fa-fw fa-home"></i>Home</a>
            <div class="Social-med">
              <a href="https://www.youtube.com/user/ragadesigners" target="_blank" ><i class="fa fa-youtube"></i></a>
              <a href="https://www.linkedin.com/feed/ "id="lkn" target="_blank"  ><i class="fa fa-linkedin"></i></a>
              <a href="https://www.facebook.com/Ragadesigner/"id="fb" target="_blank" ><i class="fa fa-facebook"></i></a>
              <a href="https://twitter.com/RagaDesigners" id="" target="_blank" ><i class="fa fa-twitter" ></i></a>
              <a href="https://www.instagram.com/" id=" "target="_blank" ><i class="fa fa-instagram"></i></a>
            </div>
          <!-- <div class="logo">
            <a href="https://www.fokre.com/"><img src="FokreLogo1.png" style="height:60px;width:100px;"></a>
          </div> -->
      </div>
</nav>



<div id="shopping-cart">
<div class="txt-heading fut-cele">Shopping Cart For Monthely</div>

<a id="btnEmpty" href="buy.php?action=empty">Empty Cart</a>
<?php
if(isset($_SESSION["cart_item"])){
    $total_quantity = 0;
    $total_price = 0;
?>	
<table class="tbl-cart" cellpadding="10" cellspacing="1">
<tbody>
<tr>
<th style="text-align:left;">Name</th>
<th style="text-align:left;">Code</th>
<th style="text-align:right;" width="5%">Quantity</th>
<th style="text-align:right;" width="10%">Unit Price</th>
<th style="text-align:right;" width="10%">Price</th>
<th style="text-align:center;" width="5%">Remove</th>
</tr>	
<?php		
    foreach ($_SESSION["cart_item"] as $item){
        $item_price = $item["quantity"]*$item["price"];
		?>
				<tr>
				<td><img src="<?php echo $item["image"]; ?>" class="cart-item-image" /><?php echo $item["name"]; ?></td>
				<td><?php echo $item["code"]; ?></td>
				<td style="text-align:right;"><?php echo $item["quantity"]; ?></td>
				<td  style="text-align:right;"><?php echo "₹ ".$item["price"]; ?></td>
				<td  style="text-align:right;"><?php echo "₹ ". number_format($item_price,2); ?></td>
				<td style="text-align:center;"><a href="buy.php?action=remove&code=<?php echo $item["code"]; ?>" class="btnRemoveAction"><img src="icon-delete.png" alt="Remove Item" /></a></td>
				</tr>
				<?php
				$total_quantity += $item["quantity"];
				$total_price += ($item["price"]*$item["quantity"]);
		}
		?>

<tr>
<td colspan="2" align="right">Total:</td>
<td align="right"><?php echo $total_quantity; ?></td>
<td align="right" colspan="2"><strong><?php echo "₹ ".number_format($total_price, 2); ?></strong></td>
<td></td>
</tr>
</tbody>
</table>		
  <?php
} else {
?>
<div class="no-records">Your Cart is Empty</div>
<?php 
}
?>
</div>

<div id="product-grid">
	<div class="txt-heading">Your Products</div>
	<?php
	$product_array = $db_handle->runQuery("SELECT * FROM tblproduct ORDER BY id ASC");
	if (!empty($product_array)) { 
		foreach($product_array as $key=>$value){
	?>
		<div class="product-item"style="background: beige;">
			<form method="post" action="buy.php?action=add&code=<?php echo $product_array[$key]["code"]; ?>">
			<div class="product-image"><img src="<?php echo $product_array[$key]["image"]; ?>"width="280px" height="200px"></div>
			<div class="product-tile-footer">
			<div class="product-title" style="font-weight: 700;color:black;"><?php echo $product_array[$key]["name"]; ?></div>
			<div class="product-price"style="font-weight: 700;color:black;"><?php echo "$".$product_array[$key]["price"]; ?></div>
			<div class="cart-action"><input type="text" class="product-quantity" name="quantity" value="1" size="2" style="width:40%;" /><input type="submit" value="Add to Cart"  class="btnAddAction btn-success" /></div>
			</div>
			</form>
		</div>
	<?php
		}
	}
	?>
</div>



<footer class="about-page">
    <div class="About" id="about">
        <div class="about-1">
          <h2 class="abt-title"style="text-align: center; padding:10px;">About</h2>
          <p class="abt-cont" style="font-size: 14px;">Organic farmers and food producers grow and produce food without using synthetic chemicals such as pesticides and artificial fertilisers. They do not use genetically modified (GM) components or expose food to irradiation. Animal welfare and environmental sustainability are important issues for organic farmers</p>
        </div>
        <div class="about-2">
          <h2 class="abt-title" style="text-align: center; padding:10px;">Contacts</h2>
          <p class="abt-cont" style="font-size: 15px;"><i class="fa fa-phone-square"></i> Mobile :+91 <No:>9962856406</No:></p>
          <p class="abt-cont" style="font-size: 14px;"><i class="material-icons">&#xe55f;</i> Location:000, Anna Nagar,<br>Race Course Road
           ,<br> Chennai-600 001, India</p>
          <p class="abt-cont" style="font-size: 14px;"><i class="fa fa-envelope-open"style="font-size:20px"></i>  Mail : shreeragadesigners@gmail.com</p>
        </div>
        <div class="about-3">
          <h2 class="abt-title"style="text-align: center; padding:10px;">Subscribe</h2>
          <p class="abt-cont" style="font-size: 14px;">So why wait when you can Buy with the Farmers Food ! Contact us today.</p>
          
          <div class="About-med">
            <a href="https://www.youtube.com/" target="_New" ><i class="fa fa-youtube"style="font-size:20px;color:white"></i></a>
            <a href="https://www.linkedin.com/feed/"id="lkn" target="_New" ><i class="fa fa-linkedin"style="font-size:20px;color:white"></i></a>
            <a href="https://www.facebook.com/Ragadesigner/"id="fb"target="_New" ><i class="fa fa-facebook"style="font-size:20px;color:white"></i></a>
          </div>
        </div>
      </div> 
    </footer>
    <div class="whata-app">
      <a href="https://wa.me/917094592282/?text=Hello, i visited your website" target="_blank"><img class="whats-icon" src="https://cdn-icons-png.flaticon.com/512/124/124034.png"></a>
    </div>

</body>
</html>