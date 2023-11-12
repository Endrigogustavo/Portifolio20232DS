<?php

session_start();

//Variáveis de Link
$index = "index.php";
$register = "customer_register.php";
$conta = "customer/my_account.php?my_orders";
$cart = "cart.php";
$favorites = "customer/my_account.php?my_wishlist";
$products = "shop.php";
$contato = "contact.php";
$logout = "logout.php";
$checkout = "checkout.php";
$sobrenos = "about.php";

include("includes/db.php");
include("includes/header.php");
include("functions/functions.php");
include("includes/main.php");



?>

<?php


$product_id = @$_GET['pro_id'];

$get_product = "select * from products where product_url='$product_id'";

$run_product = mysqli_query($con, $get_product);

$check_product = mysqli_num_rows($run_product);

if ($check_product == 0) {

  echo "<script> window.open('index.php','_self') </script>";
} else {



  $row_product = mysqli_fetch_array($run_product);

  $p_cat_id = $row_product['p_cat_id'];

  $pro_id = $row_product['product_id'];

  $pro_title = $row_product['product_title'];

  $pro_price = $row_product['product_price'];

  $pro_desc = $row_product['product_desc'];

  $pro_img1 = $row_product['product_img1'];

  $pro_img2 = $row_product['product_img2'];

  $pro_img3 = $row_product['product_img3'];

  $pro_label = $row_product['product_label'];

  $pro_psp_price = $row_product['product_psp_price'];

  $pro_features = $row_product['product_features'];

  $pro_video = $row_product['product_video'];

  $status = $row_product['status'];

  $pro_url = $row_product['product_url'];

  if ($pro_label == "") {
  } else {

    $product_label = "

<a class='label sale' href='#' style='color:black;'>

<div class='thelabel'>$pro_label</div>

<div class='label-background'> </div>

</a>

";
  }

  $get_p_cat = "select * from product_categories where p_cat_id='$p_cat_id'";

  $run_p_cat = mysqli_query($con, $get_p_cat);

  $row_p_cat = mysqli_fetch_array($run_p_cat);

  $p_cat_title = $row_p_cat['p_cat_title'];




  ?>

  <main>
    <!-- HERO -->
    <div class="nero">
      <div class="nero__heading">
        <span class="nero__bold">Ver | </span>Produto
      </div>
      <p class="nero__text">
      </p>
    </div>
  </main>

  <div id="content"><!-- conteúdo Inicia -->
    <div class="container"><!-- contêiner inicia -->





      <div class="col-md-12"><!-- col-md-12 Inicia -->

        <div class="row" id="productMain"><!-- row Starts -->

          <div class="col-sm-6"><!-- col-sm-6 Inicia -->

            <div id="mainImage"><!-- mainImage inicia -->

              <div id="myCarousel" class="carousel slide" data-ride="carousel">

                <ol class="carousel-indicators"><!-- indicadores de carrossel Inicia -->

                  <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                  <li data-target="#myCarousel" data-slide-to="1"></li>
                  <li data-target="#myCarousel" data-slide-to="2"></li>


                </ol><!-- indicadores de carrossel Terminam -->

                <div class="carousel-inner"><!-- carousel-inner Inicia -->

                  <div class="item active">

                    <img src="admin_area/product_images/<?php echo $pro_img1; ?>" class="img-responsive">

                  </div>

                  <div class="item">

                    <img src="admin_area/product_images/<?php echo $pro_img2; ?>" class="img-responsive">

                  </div>

                  <div class="item">

                    <img src="admin_area/product_images/<?php echo $pro_img3; ?>" class="img-responsive">

                  </div>

                </div><!-- carousel-inner Termina -->

                <a href="#myCarousel" class="left carousel-control"
                  data-slide="prev"><!-- left carousel-control Inicia -->

                  <span class="glyphicon glyphicon-chevron-left"> </span>

                  <span class="sr-only"> Anterior </span>

                </a><!-- controle esquerdo do carrossel Termina -->

                <a class="right carousel-control" href="#myCarousel"
                  data-slide="next"><!-- right carousel-control Inicia -->

                  <span class="glyphicon glyphicon-chevron-right"> </span>

                  <span class="sr-only"> Próximo </span>

                </a><!-- controle do carrossel à direita Termina -->

              </div>

            </div><!-- mainImage Termina -->

            <?php echo $product_label; ?>

          </div><!-- col-sm-6 Termina -->


          <div class="col-sm-6"><!-- col-sm-6 Inicia -->

            <div class="box"><!-- box Inicia -->

              <h1 class="text-center">
                <?php echo $pro_title; ?>
              </h1>

              <?php


              if (isset($_POST['add_cart'])) {

                $ip_add = getRealUserIp();

                $p_id = $pro_id;

                $product_qty = $_POST['product_qty'];

                $product_size = $_POST['product_size'];


                $check_product = "select * from cart where ip_add='$ip_add' AND p_id='$p_id'";

                $run_check = mysqli_query($con, $check_product);

                if (mysqli_num_rows($run_check) > 0) {

                  echo "<script>alert('Este produto já está adicionado ao carrinho.')</script>";

                  echo "<script>window.open('$pro_url','_self')</script>";
                } else {

                  $get_price = "select * from products where product_id='$p_id'";

                  $run_price = mysqli_query($con, $get_price);

                  $row_price = mysqli_fetch_array($run_price);

                  $pro_price = $row_price['product_price'];

                  $pro_psp_price = $row_price['product_psp_price'];

                  $pro_label = $row_price['product_label'];

                  if ($pro_label == "Oferta" or $pro_label == "Presente") {

                    $product_price = $pro_psp_price;
                  } else {

                    $product_price = $pro_price;
                  }

                  $query = "insert into cart (p_id,ip_add,qty,p_price,size) values ('$p_id','$ip_add','$product_qty','$product_price','$product_size')";

                  $run_query = mysqli_query($db, $query);

                  echo "<script>window.open('$pro_url','_self')</script>";
                }
              }


              ?>

              <form action="" method="post" class="form-horizontal"><!-- form-horizontal Inicia -->

                <?php

                if ($status == "product") {

                  ?>

                  <div class="form-group"><!-- form-group Inicia -->

                    <label class="col-md-5 control-label">Quantidade do Produto </label>

                    <div class="col-md-7"><!-- col-md-7 Inicia -->

                      <select name="product_qty" class="form-control">

                        <?php
                        $Valor_Quantidade = 1;
                        $String_Texto = "Definir Quantidade";
                        ?>

                        <option value="<?php echo $Valor_Quantidade; ?>">
                          <?php echo $String_Texto; ?>
                        </option>
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                        <option>5</option>


                      </select>


                    </div><!-- col-md-7 Termina -->

                  </div><!-- form-group Termina -->

                  <div class="form-group"><!-- form-group Inicia -->

                    <label class="col-md-5 control-label">Tamanho do Produto</label>

                    <div class="col-md-7"><!-- col-md-7 Inicia -->

                      <select name="product_size" class="form-control">

                        <?php

                        $Valor_Tamanho = "Pequeno";
                        $String_Texto_Tamanho = "Definir Tamanho";

                        ?>

                        <option value="<?php echo $Valor_Tamanho; ?>">
                          <?php echo $String_Texto_Tamanho ?>
                        </option>
                        <option>Pequeno</option>
                        <option>Médio</option>
                        <option>Grande</option>


                      </select>

                    </div><!-- col-md-7 Termina -->


                  </div><!-- form-group Termina -->
                <?php } else { ?>


                 <!--  <div class="form-group">

                    <label class="col-md-5 control-label">Bundle Quantity </label>

                    <div class="col-md-7"> 

                      <select name="product_qty" class="form-control">

                        <option>Select quantity</option>
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                        <option>5</option>


                      </select>

                    </div> col-md-7 Termina 

                  </div> form-group Termina

                  <div class="form-group"> form-group Inicia

                    <label class="col-md-5 control-label">Tamanho do pacote</label>

                    <div class="col-md-7"> col-md-7 Inicia 

                      <select name="product_size" class="form-control">

                        <option>Selecione um tamanho</option>
                        <option>Pequeno</option>
                        <option>Médio</option>
                        <opção>Grande</opção>


                      </select>


                    </div>col-md-7 Termina -->


                 <!-- </div>form-group Termina -->


                <?php } ?>


                <?php

                if ($status == "product") {




                  if ($pro_label == "Oferta" or $pro_label == "Presente") {

                    echo "

<p class='price'>
Preço Antigo : <del> R$$pro_price </del><br>

Preço Atual : R$$pro_psp_price

</p>

";
                  } else {

                    echo "

<p class='price'>

Preço: R$$pro_price

</p>

";
                  }
                } else {


                  if ($pro_label == "Oferta" or $pro_label == "Presente") {

                    echo "

<p class='price'>

Preço Antigo : <del> R$$pro_price </del><br>

Preço Atual : R$$pro_psp_price

</p>

";
                  } else {

                    echo "

<p class='price'>

Preço do Pacote: $$pro_price

</p>

";
                  }
                }

                ?>

                <p class="text-center buttons"><!-- botões centrais de texto Inicia -->
                  <button class="btn btn-danger" type="submit" name="add_cart">

                    <i class="fa fa-shopping-cart"></i> Adicionar ao Carrinho

                  </button>

                  <button class="btn btn-warning" type="submit" name="add_wishlist">

                    <i class="fa fa-heart"></i> Adicionar a Lista de Desejos

                  </button>


                  <?php

                  if (isset($_POST['add_wishlist'])) {

                    if (!isset($_SESSION['customer_email'])) {

                      echo "<script>alert('Você deve fazer login para adicionar o produto à lista de desejos.')</script>";

                      echo "<script>window.open('checkout.php','_self')</script>";
                    } else {

                      $customer_session = $_SESSION['customer_email'];

                      $get_customer = "select * from customers where customer_email='$customer_session'";

                      $run_customer = mysqli_query($con, $get_customer);

                      $row_customer = mysqli_fetch_array($run_customer);

                      $customer_id = $row_customer['customer_id'];

                      $select_wishlist = "select * from wishlist where customer_id='$customer_id' AND product_id='$pro_id'";

                      $run_wishlist = mysqli_query($con, $select_wishlist);

                      $check_wishlist = mysqli_num_rows($run_wishlist);

                      if ($check_wishlist == 1) {

                        echo "<script>alert('Este produto já foi adicionado à lista de desejos.')</script>";

                        echo "<script>window.open('$pro_url','_self')</script>";
                      } else {

                        $insert_wishlist = "insert into wishlist (customer_id,product_id) values ('$customer_id','$pro_id')";

                        $run_wishlist = mysqli_query($con, $insert_wishlist);

                        if ($run_wishlist) {

                          echo "<script> alert('O produto foi inserido na lista de desejos.') </script>";

                          echo "<script>window.open('$pro_url','_self')</script>";
                        }
                      }
                    }
                  }

                  ?>

                </p><!-- botões text-center Terminais -->

              </form><!-- form-horizontal Termina -->

            </div><!-- fim da caixa -->


            <div class="row" id="thumbs"><!-- row Inicia -->

              <div class="col-xs-4"><!-- col-xs-4 Inicia -->

                <a href="#" class="thumb">

                  <img src="admin_area/product_images/<?php echo $pro_img1; ?>" class="img-responsive">

                </a>


              </div><!-- col-xs-4 Termina -->

              <div class="col-xs-4"><!-- col-xs-4 Inicia -->

                <a href="#" class="thumb">

                  <img src="admin_area/product_images/<?php echo $pro_img2; ?>" class="img-responsive">

                </a>

              </div><!-- col-xs-4 Termina -->

              <div class="col-xs-4"><!-- col-xs-4 Inicia -->

                <a href="#" class="thumb">

                  <img src="admin_area/product_images/<?php echo $pro_img3; ?>" class="img-responsive">

                </a>

              </div><!-- col-xs-4 Termina -->


            </div><!-- Fim da linha -->


          </div><!-- col-sm-6 Termina -->


        </div><!-- Fim da linha -->

        <div class="box" id="details"><!-- box Inicia -->

          <a class="btn btn-info tab" style="margin-bottom:10px;" href="#description"
            data-toggle="tab"><!-- btn btn-primary tab Inicia -->

            <?php

            if ($status == "product") {

              echo "Descrição do Produto";
            } else {

              echo "Descrição do Pacote";
            }

            ?>

          </a><!-- btn btn-primary tab Termina -->

          <a class="btn btn-info tab" style="margin-bottom:10px;" href="#features"
            data-toggle="tab"><!-- btn btn-primary tab Inicia -->

            Características

          </a><!-- btn btn-primary tab Termina -->

          <a class="btn btn-info tab" style="margin-bottom:10px;" href="#video"
            data-toggle="tab"><!-- btn btn-primary tab Starts -->

            Sons e Vídeos

          </a><!-- btn btn-primary tab Termina -->

          <hr style="margin-top:0px;">

          <div class="tab-content"><!-- tab-content Inicia -->

            <div id="description" class="tab-pane fade in active" style="margin-top:7px;">
              <!-- descrição do painel da guia desaparece nas partidas ativas -->

              <?php echo $pro_desc; ?>

            </div><!-- painel da guia de descrição desaparece nas extremidades ativas -->
            <div id="features" class="tab-pane fade in" style="margin-top:7px;"><!-- features tab-pane fade in  Starts -->

              <?php echo $pro_features; ?>

            </div><!-- apresenta o fade do painel de guias nas extremidades -->
            <div id="video" class="tab-pane fade in" style="margin-top:7px;"><!-- video tab-pane fade in Starts -->

              <?php echo $pro_video; ?>


            </div><!-- painel da guia de vídeo desaparece nas extremidades -->


          </div><!-- tab-content Termina -->

        </div><!-- fim da caixa -->
        <div id="row same-height-row"><!-- row same-height-row Inicia -->

          <?php

          if ($status == "product") {



            ?>


            <div class="col-md-3 col-sm-6"><!-- col-md-3 col-sm-6 Inicia -->

              <div class="box Same-Height Headline"><!-- Box Same-Height Headlines Começa -->

                <h3 class="text-center"> Você também pode gostar destes produtos: Nós fornecemos os 3 principais itens de
                  produtos. </h3>

              </div><!-- título da mesma altura da caixa Termina -->

            </div><!-- col-md-3 col-sm-6 Termina -->

            <?php

            $get_products = "select * from products order by rand() LIMIT 0,3";

            $run_products = mysqli_query($con, $get_products);

            while ($row_products = mysqli_fetch_array($run_products)) {

              $pro_id = $row_products['product_id'];

              $pro_title = $row_products['product_title'];

              $pro_price = $row_products['product_price'];

              $pro_img1 = $row_products['product_img1'];

              $pro_label = $row_products['product_label'];

              $manufacturer_id = $row_products['manufacturer_id'];

              $get_manufacturer = "select * from manufacturers where manufacturer_id='$manufacturer_id'";

              $run_manufacturer = mysqli_query($db, $get_manufacturer);

              $row_manufacturer = mysqli_fetch_array($run_manufacturer);

              $manufacturer_name = $row_manufacturer['manufacturer_title'];

              $pro_psp_price = $row_products['product_psp_price'];

              $pro_url = $row_products['product_url'];


              if ($pro_label == "Oferta" or $pro_label == "Presente") {

                $product_price = "<del> R$$pro_price </del>";

                $product_psp_price = "| R$$pro_psp_price";
              } else {

                $product_psp_price = "";

                $product_price = "R$$pro_price";
              }


              if ($pro_label == "") {
              } else {

                $product_label = "

<a class='label sale' href='#' style='color:black;'>

<div class='thelabel'>$pro_label</div>

<div class='label-background'> </div>

</a>

";
              }


              echo "

<div class='col-md-3 col-sm-6 center-responsive' >

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


            ?>

          <?php } else { ?>


            <div class="box same-height"><!-- box same-height Inicia -->

              <h3 class="text-center"> Pacote de produtos </h3>

            </div><!-- box de mesma altura Termina -->

            <?php

            $get_bundle_product_relation = "select * from bundle_product_relation where bundle_id='$pro_id'";

            $run_bundle_product_relation = mysqli_query($con, $get_bundle_product_relation);

            while ($row_bundle_product_relation = mysqli_fetch_array($run_bundle_product_relation)) {

              $bundle_product_relation_product_id = $row_bundle_product_relation['product_id'];

              $get_products = "select * from products where product_id='$bundle_product_relation_product_id'";


              $run_products = mysqli_query($con, $get_products);

              while ($row_products = mysqli_fetch_array($run_products)) {
                $pro_id = $row_products['product_id'];

                $pro_title = $row_products['product_title'];

                $pro_price = $row_products['product_price'];

                $pro_img1 = $row_products['product_img1'];

                $pro_label = $row_products['product_label'];

                $manufacturer_id = $row_products['manufacturer_id'];

                $get_manufacturer = "select * from manufacturers where manufacturer_id='$manufacturer_id'";

                $run_manufacturer = mysqli_query($db, $get_manufacturer);

                $row_manufacturer = mysqli_fetch_array($run_manufacturer);

                $manufacturer_name = $row_manufacturer['manufacturer_title'];

                $pro_psp_price = $row_products['product_psp_price'];

                $pro_url = $row_products['product_url'];


                if ($pro_label == "Oferta" or $pro_label == "Presente") {

                  $product_price = "<del> R$$pro_price </del>";

                  $product_psp_price = "| R$$pro_psp_price";
                } else {

                  $product_psp_price = "";

                  $product_price = "R$$pro_price";
                }


                if ($pro_label == "") {
                } else {

                  $product_label = "

<a class='label sale' href='#' style='color:black;'>

<div class='thelabel'>$pro_label</div>

<div class='label-background'> </div>

</a>

";
                }


                echo "

<div class='col-md-3 col-sm-6 center-responsive' >

<div class='product' >

<a href='$pro_url' >

<img src='admin_area/product_images/$pro_img1' class='img-responsive' >

</a>

<div class='text' >

<center>

<p class='btn btn-primary'> $manufacturer_name </p>

</center>

<hr>

<h3><a href='$pro_url' >$pro_title</a></h3>

<p class='price' > $product_price $product_psp_price </p>

<p class='buttons' >

<a href='$pro_url' class='btn btn-default' >View details</a>

<a href='$pro_url' class='btn btn-primary'>

<i class='fa fa-shopping-cart'></i> Add to cart

</a>


</p>

</div>

$product_label


</div>

</div>

";
              }
            }



            ?>


          <?php } ?>

        </div><!-- linha com a mesma altura da linha Termina -->

      </div><!-- col-md-12 Termina -->


    </div><!-- container Termina -->
  </div><!-- conteúdo termina -->



  <?php

  include("includes/footer.php");

  ?>

  <script src="js/jquery.min.js"> </script>

  <script src="js/bootstrap.min.js"></script>

  </body>

  </html>

<?php } ?>