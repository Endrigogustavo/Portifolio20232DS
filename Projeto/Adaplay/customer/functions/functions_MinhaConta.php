<?php

$db = mysqli_connect("localhost", "root", "", "ecom_store");

/// IP address code starts /////
function getRealUserIp()
{
  switch (true) {
    case (!empty($_SERVER['HTTP_X_REAL_IP'])):
      return $_SERVER['HTTP_X_REAL_IP'];
    case (!empty($_SERVER['HTTP_CLIENT_IP'])):
      return $_SERVER['HTTP_CLIENT_IP'];
    case (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])):
      return $_SERVER['HTTP_X_FORWARDED_FOR'];
    default:
      return $_SERVER['REMOTE_ADDR'];
  }
}
/// IP address code Ends /////

// items function Starts ///

function items()
{

  global $db;

  $ip_add = getRealUserIp();

  $get_items = "select * from cart where ip_add='$ip_add'";

  $run_items = mysqli_query($db, $get_items);

  $count_items = mysqli_num_rows($run_items);

  echo $count_items;
}


// items function Ends ///

// total_price function Starts //

