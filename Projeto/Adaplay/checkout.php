<?php

session_start();

//Variáveis de Link
$index= "index.php";
$register = "customer_register.php";
$conta = "customer/my_account.php?my_orders";
$cart = "cart.php";
$favorites = "customer/my_account.php?my_wishlist";
$products = "shop.php";
$contato = "contact.php";
$logout = "logout.php";
$checkout = "#";


include("includes/db.php");
include("includes/header.php");
include("functions/functions.php");
include("includes/main.php");



?>






<div id="content"><!-- Início da classe Content -->
  <div class="container"><!-- Início da classe Container -->




    <div class="col-md-12"><!-- início da col-md-12  -->

      <?php

      if (!isset($_SESSION['customer_email'])) {

        include("customer/customer_login.php");
      } else {

        include("payment_options.php");
      }



      ?>


    </div><!-- Fim da col-md-12 -->


  </div><!-- Fim do Container -->
</div><!-- Fim do content -->




<script src="js/jquery.min.js"> </script>

<script src="js/bootstrap.min.js"></script>

</body>

</html>