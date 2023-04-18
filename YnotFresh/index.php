<!doctype html>
<html>
<head>
<title>YnotFresh</title>
<link rel="icon"type="image/png" sizes="16x16" href="product-images/apple.jpg">
<link href="css/models.css" rel="stylesheet">
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
            <a class="Side-bar" href="#home"><i class="fa fa-fw fa-home"></i>Home</a>
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

 <section class="slidee">  
  <div id="slider"> 
 <div class="slides"> 
   <img src="product-images/slide4.jpg" width="100%" height="500px" />
 </div>  
  <div class="slides"> 
   <img src="product-images/slide3.jpg" width="100%" height="500px" />
</div>   
 <div class="slides">  
  <img src="product-images/slide4.jpg" width="100%" height="500px" />
</div>    
 <div class="slides">   
 <img src="product-images/slide3.jpg" width="100%" height="500px" />
</div>
<div class="slides">   
 <img src="product-images/slide4.jpg" width="100%" height="500px" />
</div>    
  <div id="dot"><span class="dot"></span><span class="dot"></span><span class="dot">
</span>
<span class="dot"></span><span class="dot">
</span>
</div> 
</div>  
  </section>
    <section class="Featured-Cele">
        <h2 class="fut-cele">Fresh Vegetables & Fruits<h2>
        <div class="Featured-models">
            <img src="https://cdn.winsightmedia.com/platform/files/public/fsd/main/articles/local-produce.jpg">
            <img src="https://s.abcnews.com/images/GMA/organic-produce-01-sh-iwb-220810_1660138683424_hpMain_1x1_608.jpg">
            <img src="https://previews.123rf.com/images/monticello/monticello1508/monticello150800111/44285585-fresh-organic-vegetables-and-fruits-in-the-garden-balanced-diet.jpg">
            <img src="https://blog.realplasticfree.com/wp-content/uploads/2019/05/iStock-1138363364-1024x683.jpg">
        </div>
        <div class="View-All" style="margin:10px;">
          <center>
            <a href="buy.php" target="_self">Buy ALL fresh organic vegetables, fruits and groceries</a>
          </center>
        </div>
    </section>
    <section class="Booking">
      <div id="cele-book">
        <h1 id="cele-text" > Feed Back Now! </h1>
        <b style="text-align:center; color: rgb(189, 12, 21);">Receive Information About Price And Availability In Less Then 24 Hours</b>

        <?php
include 'dbcontroller.php';
if(isset($_POST['now'])){
  /*  if($mysqli->connect_errno ) {
  //  printf("Connect failed: %s<br />", $mysqli->connect_error);
    exit();
    } 
  //  printf('Connected successfully.<br />');*/

    $name=$_POST['name'];
    $email=$_POST['email'];
    $subject=$_POST['num'];
    $message=$_POST['message'];

    $sql="insert into visit_info(name,email,number,message)values('$name','$email','$subject','$message')";
        //$stmt->bind_param("ssssisss",$firstname,$email,$number,$influ,$password);
     if($conn->query($sql) === TRUE){
        echo "Feed_Back Successfully....";
    }else{
     echo "Error: " . $sql . "<br>" . $conn->error;
    }
    $conn->close();
    }
    
?>
 <form action="<?php $_PHP_SELF ?>" method="post">
            <div class="Booknow">
                <label>Name </label>
                <input type="text" class="form-control" placeholder="Enter Your Name" name="name" required>
                <label>E-Mail </label> 
                <input type="text" class="form-control" placeholder="@mail.com" name="email" required>
                <label>Mobile Number</label>
                <input type="text" class="form-control" placeholder="Mobile No" name="num"required>
                <label>Comment</label>
                <textarea cols="30" rows="5" class="form-control" placeholder="Command" name="message" required>  
                 </textarea>  
                <button type="submit" class="btn btn-success" style="display:block; margin:8px auto;" name="now">Submit</button> 
            </div>
</form>
      </div>
    </section>
    <article class="flow" id="Models">
      <h1 class="top-3">Fresh Organic</h1>
      <div class="auto-grid">
     
      <div>
         <a href="buy.php" target="_New" class="profile">
              <h2 class="profile__name">Price Rs-300</h2>
              <p class="celebriti-prof">Fresh Organic</p>
              <img alt="Profile shot for Celina Harris" src="https://harvest2u.com/wp-content/uploads/2016/08/Family-Harvest-218868.jpg" />
            </a>
          </div>
          <div>
          <a href="buy.php" target="_New" class="profile">
          <h2 class="profile__name">Price Rs-300</h2>
              <p class="celebriti-prof">Fresh Organic</p>
              <img alt="Profile shot for Ruby Morris" src="https://cdn.shopify.com/s/files/1/0296/0909/9357/t/3/assets/Veg.jpg?v=1594917491" />
            </a>
          </div>
          <div>
          <a href="buy.php" target="_New" class="profile">
          <h2 class="profile__name">Price Rs-300</h2>
                        <p class="celebriti-prof">Fresh Organic</p>
              <img alt="Profile shot for Nicholas Castro" src="https://www.onmycanvas.com/wp-content/uploads/2021/04/organic-vegetables-in-bangalore.jpeg" />
            </a>
          </div>
          <div>
          <a href="buy.php" target="_New" class="profile">
          <h2 class="profile__name">Price Rs-300</h2>
              <p class="celebriti-prof">Fresh Organic</p>
              <img alt="Profile shot for Marc Dixon" src="https://d2gg9evh47fn9z.cloudfront.net/1600px_COLOURBOX17902427.jpg" />
            </a>
            
          </div>
          <div>
          <a href="buy.php" target="_New" class="profile">
          <h2 class="profile__name">Price Rs-300</h2>
              <p class="celebriti-prof">Fresh Organic</p>
              <img alt="Profile shot for Chad" src="https://5.imimg.com/data5/QG/ZM/IS/SELLER-9623709/organic-alphonso-mango-500x500.jpg" >
            </a>
          </div>
          <div>
          <a href="buy.php" target="_New" class="profile">
          <h2 class="profile__name">Price Rs-300</h2>
              <p class="celebriti-prof">IFresh Organic</p>
              <img alt="Profile shot for Chad" src="https://vijaykarnataka.com/thumb/73184817/73184817.jpg?imgsize=893263&width=540&height=405&resizemode=75" >
            </a>
          </div>
          <div>
          <a href="buy.php" target="_New" class="profile">
          <h2 class="profile__name">Price Rs-300</h2>
              <p class="celebriti-prof">Fresh Organic</p>
              <img alt="Profile shot for Chad" src="https://cdn.shopify.com/s/files/1/0589/6991/5576/products/2020-10-24-02-38-091580_1080x_9d9f3c2f-6017-4324-832c-5381eb3146d5_large.jpg?v=1667233060" >
            </a>
          </div>
          
      </div>
    </article>
    <aside class="Service" >
      <div class="Service-Tap">
        <h3 class="Service-Heading" id="contact" style="letter-spacing: 10px;text-shadow: 4px 3px 5px #717171;color: rgb(126, 25, 25); text-align: center;">Services</h3>
        <div class="Multi-Service">
          <div class="Ser" style="margin-right: 50px;">
            <img src="https://marketplace.magento.com/media/catalog/product/0/f/0f99_order-on-whatsapp_3.png">
            <h4 class="Service-Title">Easy Order</h4>
          </div>
          <div class="Ser" style="margin-right: 50px;">
            <img src="https://blog.ipleaders.in/wp-content/uploads/2016/08/trust-1.jpg">
            <h4 class="Service-Title">Service on Trust</h4>
          </div>
          <div class="Ser" style="margin-right: 50px;">
            <img src="https://w7.pngwing.com/pngs/67/521/png-transparent-computer-icons-offers-text-logo-discount-thumbnail.png">
            <h4 class="Service-Title">Film Promotions</h4>
          </div>
          <div class="Ser">
            <img src="https://previews.123rf.com/images/faysalfarhan/faysalfarhan1605/faysalfarhan160501142/56217357-events-calendar-icon-black-glossy-round-button.jpg">
            <h4 class="Service-Title">Special events</h4>
          </div>
        </div>
      </div>
    </aside>
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
</div>

<script>




// Collapse accordion every time dropdown is shown
$('.dropdown-accordion').on('show.bs.dropdown', function (event) {
  var accordion = $(this).find($(this).data('accordion'));
  accordion.find('.panel-collapse.in').collapse('hide');
});

// Prevent dropdown to be closed when we click on an accordion link
$('.dropdown-accordion').on('click', 'a[data-toggle="collapse"]', function (event) {
  event.preventDefault();
  event.stopPropagation();
  $($(this).data('parent')).find('.panel-collapse.in').collapse('hide');
  $($(this).attr('href')).collapse('show');
});





var index = 0;
var slides = document.querySelectorAll(".slides");
var dot = document.querySelectorAll(".dot");
function changeSlide()
{ 
 if(index<0)
{    index = slides.length-1; 
 }  
  if(index>slides.length-1)
{    index = 0; 
 }   
 for(let i=0;i<slides.length;i++)
{    slides[i].style.display = "none"; 
   dot[i].classList.remove("active"); 
 }    slides[index].style.display= "block"; 
 dot[index].classList.add("active"); 
   index++;   
 setTimeout(changeSlide,2000); 
 }
changeSlide();





</script>


</body>
</html>