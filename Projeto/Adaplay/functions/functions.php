<?php

$db = mysqli_connect("localhost", "root", "", "ecom_store");

/// O código do endereço IP começa /////
function getRealUserIp()
{
  // Função para obter o endereço IP real do usuário.
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


function items()
{

  // Função para contar a quantidade de itens no carrinho de compras do usuário.
  global $db;

  $ip_add = getRealUserIp();

  $get_items = "select * from cart where ip_add='$ip_add'";

  $run_items = mysqli_query($db, $get_items);

  $count_items = mysqli_num_rows($run_items);

  echo $count_items;
}

// função de itens Termina ///

// função total_price começa //


function total_price()
{
// Função para calcular o preço total dos itens no carrinho de compras do usuário.
  global $db;

  $ip_add = getRealUserIp();

  $total = 0;

  $select_cart = "select * from cart where ip_add='$ip_add'";

  $run_cart = mysqli_query($db, $select_cart);

  while ($record = mysqli_fetch_array($run_cart)) {

    $pro_id = $record['p_id'];

    $pro_qty = $record['qty'];


    $sub_total = $record['p_price'] * $pro_qty;

    $total += $sub_total;
  }

  echo "R$" . $total;
}



// total_price function Ends //

// getPro function Starts //

function getPro()
{
// Função para obter e exibir produtos na página.
  global $db;

  $get_products = "select * from products order by 1 DESC LIMIT 0,6";

  $run_products = mysqli_query($db, $get_products);


  while ($row_products = mysqli_fetch_array($run_products)) {
 // Obtém informações do produto.
    $pro_id = $row_products['product_id'];

    $pro_title = $row_products['product_title'];

    $pro_price = $row_products['product_price'];

    $pro_img1 = $row_products['product_img1'];

    $pro_label = $row_products['product_label'];

    $manufacturer_id = $row_products['manufacturer_id'];
 
   // Obtém o nome do fabricante.
    $get_manufacturer = "select * from manufacturers where manufacturer_id='$manufacturer_id'";

    $run_manufacturer = mysqli_query($db, $get_manufacturer);

    $row_manufacturer = mysqli_fetch_array($run_manufacturer);

    $manufacturer_name = $row_manufacturer['manufacturer_title'];

    $pro_psp_price = $row_products['product_psp_price'];

    $pro_url = $row_products['product_url'];
// Verifica e formata o preço com base na etiqueta do produto.
    if ($pro_label == "Oferta" or $pro_label == "Presente") {

      $product_price = "<del> R$$pro_price </del>";

      $product_psp_price = "| R$$pro_psp_price";
    } else {

      $product_psp_price = "";

      $product_price = "R$$pro_price";
    }

 // Cria um rótulo de oferta se aplicável.
    if ($pro_label == "") {
    } else {

      $product_label = "

<a class='label sale' href='#' style='color:black;'>

<div class='thelabel'>$pro_label</div>

<div class='label-background'> </div>

</a>

";
    }

 // Exibe o produto na página.
    echo "

<div class='col-md-4 col-sm-6 single' >

<div class='product' >

<a href='$pro_url' >

<img src='admin_area/product_images/$pro_img1' class='img-responsive' >

</a>

<div class='text' >

<center>

<p class='btn btn-warning'> $manufacturer_name </p>

</center>

<hr>

<h3><a href='$pro_url' >$pro_title</a></h3>

<p class='price' > $product_price $product_psp_price </p>

<p class='buttons' >

<a href='$pro_url' class='btn btn-danger'>Detalhes do Produto</a>



</p>

</div>

$product_label


</div>

</div>

";
  }
}

// getPro function Ends //


/// getProducts Function Starts ///

function getProducts()
{

   // Função para obter e exibir produtos com base em filtros.

  global $db;

  $aWhere = array();

  // Lógica para filtrar produtos por fabricante, categoria de produto e categoria.

  if (isset($_REQUEST['man']) && is_array($_REQUEST['man'])) {

    foreach ($_REQUEST['man'] as $sKey => $sVal) {

      if ((int)$sVal != 0) {

        $aWhere[] = 'manufacturer_id=' . (int)$sVal;
      }
    }
  }

  /// Manufacturers Code Ends ///

  /// Products Categories Code Starts ///

  if (isset($_REQUEST['p_cat']) && is_array($_REQUEST['p_cat'])) {

    foreach ($_REQUEST['p_cat'] as $sKey => $sVal) {

      if ((int)$sVal != 0) {

        $aWhere[] = 'p_cat_id=' . (int)$sVal;
      }
    }
  }

  /// Products Categories Code Ends ///

  /// Categories Code Starts ///

  if (isset($_REQUEST['cat']) && is_array($_REQUEST['cat'])) {

    foreach ($_REQUEST['cat'] as $sKey => $sVal) {

      if ((int)$sVal != 0) {

        $aWhere[] = 'cat_id=' . (int)$sVal;
      }
    }
  }

  /// Categories Code Ends ///

  $per_page = 6;

  if (isset($_GET['page'])) {

    $page = $_GET['page'];
  } else {

    $page = 1;
  }

  $start_from = ($page - 1) * $per_page;

  $sLimit = " order by 1 DESC LIMIT $start_from,$per_page";

  $sWhere = (count($aWhere) > 0 ? ' WHERE ' . implode(' or ', $aWhere) : '') . $sLimit;

  $get_products = "select * from products  " . $sWhere;

  $run_products = mysqli_query($db, $get_products);

     // Obtém informações do produto.
  while ($row_products = mysqli_fetch_array($run_products)) {

    $pro_id = $row_products['product_id'];

    $pro_title = $row_products['product_title'];

    $pro_price = $row_products['product_price'];

    $pro_img1 = $row_products['product_img1'];

    $pro_label = $row_products['product_label'];

    $manufacturer_id = $row_products['manufacturer_id'];

     // Obtém o nome do fabricante.
    $get_manufacturer = "select * from manufacturers where manufacturer_id='$manufacturer_id'";

    $run_manufacturer = mysqli_query($db, $get_manufacturer);

    $row_manufacturer = mysqli_fetch_array($run_manufacturer);

    $manufacturer_name = $row_manufacturer['manufacturer_title'];

    $pro_psp_price = $row_products['product_psp_price'];

    $pro_url = $row_products['product_url'];

 // Verifica e formata o preço com base na etiqueta do produto.
    if ($pro_label == "Oferta" or $pro_label == "Presente") {

      $product_price = "<del> R$$pro_price </del>";

      $product_psp_price = "| R$$pro_psp_price";
    } else {

      $product_psp_price = "";

      $product_price = "R$$pro_price";
    }

// Cria um rótulo de oferta se aplicável.
    if ($pro_label == "") {
    } else {

      $product_label = "

<a class='label sale' href='#' style='color:black;'>

<div class='thelabel'>$pro_label</div>

<div class='label-background'> </div>

</a>

";
    }

 // Exibe o produto na página.
    echo "

<div class='col-md-4 col-sm-6 center-responsive' >

<div class='product' >

<a href='$pro_url' >

<img src='admin_area/product_images/$pro_img1' class='img-responsive' >

</a>

<div class='text' >

<center>

<p class='btn btn-warning'> $manufacturer_name </p>

</center>

<hr>

<h3><a href='$pro_url' >$pro_title</a></h3>

<p class='price' > $product_price $product_psp_price </p>

<p class='buttons' >

<a href='$pro_url' class='btn btn-danger' >Detalhes do Produto</a>

</p>

</div>

$product_label


</div>

</div>

";
  }
/// função getProducts Código Termina ///



}


// função de itens Termina ///

// função total_price começa //

function getPaginator()
{

// Função para gerar a navegação de paginação.

  $per_page = 6;

  global $db;

  $aWhere = array();

  $aPath = '';

  // Lógica para filtrar produtos por fabricante, categoria de produto e categoria.

  if (isset($_REQUEST['man']) && is_array($_REQUEST['man'])) {

    foreach ($_REQUEST['man'] as $sKey => $sVal) {

      if ((int)$sVal != 0) {

        $aWhere[] = 'manufacturer_id=' . (int)$sVal;

        $aPath .= 'man[]=' . (int)$sVal . '&';
      }
    }
  }

// função de itens Termina ///

// função total_price começa //

  if (isset($_REQUEST['p_cat']) && is_array($_REQUEST['p_cat'])) {

    foreach ($_REQUEST['p_cat'] as $sKey => $sVal) {

      if ((int)$sVal != 0) {

        $aWhere[] = 'p_cat_id=' . (int)$sVal;

        $aPath .= 'p_cat[]=' . (int)$sVal . '&';
      }
    }
  }

// função de itens Termina ///

// função total_price começa //

  if (isset($_REQUEST['cat']) && is_array($_REQUEST['cat'])) {

    foreach ($_REQUEST['cat'] as $sKey => $sVal) {

      if ((int)$sVal != 0) {

        $aWhere[] = 'cat_id=' . (int)$sVal;

        $aPath .= 'cat[]=' . (int)$sVal . '&';
      }
    }
  }

  /// Categories Code Ends ///

  $sWhere = (count($aWhere) > 0 ? ' WHERE ' . implode(' or ', $aWhere) : '');

  $query = "select * from products " . $sWhere;

  $result = mysqli_query($db, $query);

  $total_records = mysqli_num_rows($result);

  $total_pages = ceil($total_records / $per_page);

  echo "<li><a href='shop.php?page=1";

  if (!empty($aPath)) {
    echo "&" . $aPath;
  }

  echo "' >" . 'Primeira Página' . "</a></li>";

  for ($i = 1; $i <= $total_pages; $i++) {

    echo "<li><a href='shop.php?page=" . $i . (!empty($aPath) ? '&' . $aPath : '') . "' >" . $i . "</a></li>";
  };

  echo "<li><a href='shop.php?page=$total_pages";

  if (!empty($aPath)) {
    echo "&" . $aPath;
  }

  echo "' >" . 'Ùltima Página' . "</a></li>";

  /// getPaginator Function Code Ends ///

}

/// getPaginator Function Ends ///
