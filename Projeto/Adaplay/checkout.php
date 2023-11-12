<?php

session_start();

include("includes/db.php");
include("functions/functions.php");

?>

<head>
  <link rel="icon" href="images/logo.png">
  <meta http-equiv="x-ua-compatible" content="IE=edge, chrome=1">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>



<?php

if (!isset($_SESSION['customer_email'])) {

  include("customer/customer_login.php");
} else {

  include("select_payment.php");
}



?>



<script src="js/jquery.min.js"> </script>

<script src="js/bootstrap.min.js"></script>