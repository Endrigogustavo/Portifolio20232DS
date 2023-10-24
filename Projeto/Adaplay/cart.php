<?php
// Inicia a sessão para armazenar informações do carrinho
session_start();

//Variáveis de Link
$index= "index.php";
$register = "customer_register.php";
$conta = "customer/my_account.php?my_orders";
$cart = "#";
$favorites = "customer/my_account.php?my_wishlist";
$products = "shop.php";
$contato = "contact.php";
$logout = "logout.php";
$checkout = "checkout.php";


// Inclui o arquivo de conexão com o banco de dados
include("includes/db.php");

// Inclui o cabeçalho da página
include("includes/header.php");

// Inclui funções úteis para o carrinho de compras
include("functions/functions.php");

// Inclui o conteúdo principal da página
include("includes/main.php");
?>

<!-- MAIN -->
<main>
  <!-- HERO -->
  <div class="nero">
    <div class="nero__heading">
      <span class="hero__bold">CARRINHO</span> de Compras
    </div>
    <p class="nero__text">
    </p>
  </div>
</main>

<div id="content"><!-- conteúdo Começa -->
  <div class="container"><!-- container Começa -->
    <div class="col-md-9" id="cart"><!-- col-md-9 Começa -->
      <div class="box"><!-- caixa Começa -->
        <form action="cart.php" method="post" enctype="multipart-form-data"><!-- formulário Começa -->
          <h1> Carrinho de Compras </h1>

          <?php
          // Obtém o endereço IP do usuário atual
          $ip_add = getRealUserIp();

          // Seleciona os produtos no carrinho do usuário com base no endereço IP
          $selectCarrinho = "select * from cart where ip_add='$ip_add'";
          $runCarrinho = mysqli_query($con, $selectCarrinho);
          $count = mysqli_num_rows($runCarrinho);
          ?>

          <p class="text-muted"> Você tem atualmente <?php echo $count; ?> item(s) no seu carrinho. </p>

          <div class="table-responsive"><!-- tabela-responsiva Começa -->
            <table class="table"><!-- tabela Começa -->
              <thead><!-- cabeçalho Começa -->
                <tr>
                  <th colspan="2">Produto</th>
                  <th>Quantidade</th>
                  <th>Preço Unitário</th>
                  <th>Tamanho</th>
                  <th colspan="1">Remover</th>
                  <th colspan="2"> Subtotal </th>
                </tr>
              </thead><!-- cabeçalho Termina -->

              <tbody><!-- corpo Começa -->
                <?php
                // Inicializa o total do carrinho
                $total = 0;

                // Loop pelos produtos no carrinho
                while ($colunaCarrinho = mysqli_fetch_array($runCarrinho)) {
                  $idProduto = $colunaCarrinho['p_id'];
                  $proSize = $colunaCarrinho['size'];
                  $quantidadeProduto = $colunaCarrinho['qty'];
                  $precoUnico = $colunaCarrinho['p_price'];

                  // Obtém informações detalhadas do produto
                  $getProduto = "select * from products where product_id='$idProduto'";
                  $runProduto = mysqli_query($con, $getProduto);

                  // Loop pelos resultados do produto
                  while ($rowProducts = mysqli_fetch_array($runProduto)) {
                    $tituloProduto = $rowProducts['product_title'];
                    $produtoImagem1 = $rowProducts['product_img1'];
                    $subtotal = $precoUnico * $quantidadeProduto;

                    // Armazena a quantidade do produto na sessão
                    $_SESSION['quantidadeProduto'] = $quantidadeProduto;

                    // Atualiza o total do carrinho
                    $total += $subtotal;
                ?>
                    <tr><!-- tr Começa -->
                      <td>
                        <img src="admin_area/product_images/<?php echo $produtoImagem1; ?>">
                      </td>
                      <td>
                        <a href="#"> <?php echo $tituloProduto; ?> </a>
                      </td>
                      <td>
                        <!-- Campo de entrada para a quantidade do produto -->
                        <input type="text" name="quantity" value="<?php echo $_SESSION['quantidadeProduto']; ?>" data-product_id="<?php echo $idProduto; ?>" class="quantity form-control">
                      </td>
                      <td>
                        R$<?php echo $precoUnico; ?>,00
                      </td>
                      <td>
                        <?php echo $proSize; ?>
                      </td>
                      <td>
                        <!-- Caixa de seleção para remover o produto -->
                        <input type="checkbox" name="remove[]" value="<?php echo $idProduto; ?>">
                      </td>
                      <td>
                        R$<?php echo $subtotal; ?>,00
                      </td>
                    </tr><!-- tr Termina -->
                <?php
                  }
                }
                ?>
              </tbody><!-- corpo Termina -->

              <tfoot><!-- rodapé Começa -->
                <tr>
                  <th colspan="5"> Total </th>
                  <th colspan="2"> R$<?php echo $total; ?>,00 </th>
                </tr>
              </tfoot><!-- rodapé Termina -->
            </table><!-- tabela Termina -->

            <div class="form-inline pull-right"><!-- form-inline pull-right Começa -->
              <div class="form-group"><!-- form-group Começa -->
                <label>Código de Cupom : </label>
                <!-- Campo de entrada para código de cupom -->
                <input type="text" name="Codigo" class="form-control">
              </div><!-- form-group Termina -->
              <!-- Botão para aplicar o cupom de desconto -->
              <input class="btn btn-primary" type="submit" name="Cupom_Aplicar" value="Aplicar Cupom">
            </div><!-- form-inline pull-right Termina -->
          </div><!-- tabela-responsiva Termina -->

          <div class="box-footer"><!-- rodapé da caixa Começa -->
            <div class="pull-left"><!-- pull-left Começa -->
              <a href="index.php" class="btn btn-default">
                <i class="fa fa-chevron-left"></i> Continuar Comprando
              </a>
            </div><!-- pull-left Termina -->
            <div class="pull-right"><!-- pull-right Começa -->
              <button class="btn btn-info" type="submit" name="update">
                <i class="fa fa-refresh"></i> Atualizar Carrinho
              </button>

              <?php
              // Verifica se a quantidade de algum produto no carrinho é igual a zero.
              $quantidadeZero = false;
              $getCart = "select * from cart where ip_add='$ip_add'";
              $runCart = mysqli_query($con, $getCart);

              // Loop pelos produtos no carrinho para verificar se algum tem quantidade zero.
              while ($rowCart = mysqli_fetch_array($runCart)) {
                $quantidadeProduto = $rowCart['qty'];
                if ($quantidadeProduto == 0) {
                  $quantidadeZero = true;
                  break;
                }
              }

              // Se nenhum produto tiver quantidade igual a zero, exibe o botão de checkout.
              if (!$quantidadeZero) {
                echo '<a href="checkout.php" class="btn btn-success">
                Efetuar Check-Out <i class="fa fa-chevron-right"></i>
              </a>';
              } else {
                // Se houver algum produto com quantidade igual a zero, desabilite o botão de checkout e exiba a mensagem de erro.
                echo '<button class="btn btn-success" disabled>
                Efetuar Check-Out <i class="fa fa-chevron-right"></i>
              </button>
              <script>alert("Selecione uma quantidade válida para todos os produtos antes de prosseguir com o Checkout.")</script>';
              }
              ?>
            </div><!-- pull-right Termina -->
          </div><!-- rodapé da caixa Termina -->
        </form><!-- formulário Termina -->
      </div><!-- caixa Termina -->

      <?php
      // Lógica para aplicar um cupom de desconto
      if (isset($_POST['Cupom_Aplicar'])) {
        $Codigo = $_POST['Codigo'];
        if ($Codigo == "") {
          // Nenhum código de cupom fornecido
        } else {
          // Verificar se o código de cupom é válido
          $getCupom = "select * from coupons where coupon_code='$Codigo'";
          $runCupom = mysqli_query($con, $getCupom);
          $checarCupom = mysqli_num_rows($runCupom);
          if ($checarCupom == 1) {
            $colunaCupons = mysqli_fetch_array($runCupom);
            $produtoCupom = $colunaCupons['product_id'];
            $valorCupom = $colunaCupons['coupon_price'];
            $limiteCupom = $colunaCupons['coupon_limit'];
            $cupomUtilizado = $colunaCupons['coupon_used'];
            if ($limiteCupom == $cupomUtilizado) {
              // Cupom atingiu seu limite de uso
              echo "<script>alert('Infelizmente seu código de cupom expirou.')</script>";
            } else {
              // Verificar se o produto associado ao cupom está no carrinho
              $getCart = "select * from cart where p_id='$produtoCupom' AND ip_add='$ip_add'";
              $runCarrinho = mysqli_query($con, $getCart);
              $checkCart = mysqli_num_rows($runCarrinho);
              if ($checkCart == 1) {
                // Incrementar o uso do cupom e calcular o desconto
                $addUsed = "update coupons set coupon_used=coupon_used+1 where coupon_code='$Codigo'";
                $runUsed = mysqli_query($con, $addUsed);
                $valorCupom = min($valorCupom, $precoUnico);
                // Aplica o desconto proporcional à quantidade de produtos no carrinho
                $descontoPorProduto = $valorCupom / $quantidadeProduto;
                $precoUnico = $precoUnico - $descontoPorProduto;
                // Atualizar o preço do produto no carrinho com o desconto
                $updateCart = "UPDATE cart SET p_price = '$precoUnico' WHERE p_id='$produtoCupom' AND ip_add='$ip_add'";
                $runUpdate = mysqli_query($con, $updateCart);
                echo "<script>alert('Seu cupom foi aplicado com sucesso.')</script>";
                echo "<script>window.open('cart.php','_self')</script>";
              } else {
                // Produto associado ao cupom não encontrado no carrinho
                echo "<script>alert('Não encontramos o respectivo cupom para este produto.')</script>";
              }
            }
          } else {
            // Cupom inválido ou digitado incorretamente
            echo "<script> alert('Seu cupom está inválido ou foi digitado incorretamente.') </script>";
          }
        }
      }
      ?>

      <?php
      // Função para atualizar o carrinho de compras
      function updateCart()
      {
        global $con;
        if (isset($_POST['update'])) {
          foreach ($_POST['remove'] as $removeId) {
            // Remove o produto do carrinho
            $deleteProduct = "delete from cart where p_id='$removeId'";
            $runDelete = mysqli_query($con, $deleteProduct);
            if ($runDelete) {
              echo "<script>window.open('cart.php','_self')</script>";
            }
          }
        }
      }
      // Chama a função para atualizar o carrinho de compras
      echo @$upCart = updateCart();
      ?>

      <div id="row same-height-row"><!-- linha same-height-row Começa -->
        <div class="col-md-3 col-sm-6"><!-- col-md-3 col-sm-6 Começa -->
          <div class="box same-height headline"><!-- caixa same-height headline Começa -->
            <h3 class="text-center"> Você pode gostar destes produtos </h3>
          </div><!-- caixa same-height headline Termina -->
        </div><!-- col-md-3 col-sm-6 Termina -->

        <?php
        // Seleciona produtos aleatórios para exibir como recomendações
        $getProduto = "select * from products order by rand() LIMIT 0,3";
        $runProduto = mysqli_query($con, $getProduto);

        // Loop pelos produtos recomendados
        while ($rowProducts = mysqli_fetch_array($runProduto)) {
          $idProduto = $rowProducts['product_id'];
          $tituloProduto = $rowProducts['product_title'];
          $precoProduto = $rowProducts['product_price'];
          $produtoImagem1 = $rowProducts['product_img1'];
          $produtoRotulo = $rowProducts['product_label'];
          $idFabricante = $rowProducts['manufacturer_id'];
          $getManufacturer = "select * from manufacturers where manufacturer_id='$idFabricante'";
          $runManufacturer = mysqli_query($db, $getManufacturer);
          $rowManufacturer = mysqli_fetch_array($runManufacturer);
          $nomeFabricante = $rowManufacturer['manufacturer_title'];
          $proPspPrice = $rowProducts['product_psp_price'];
          $proUrl = $rowProducts['product_url'];

          // Lógica para exibir preço com desconto se houver rótulo "Oferta" ou "Presente"
          if ($produtoRotulo == "Oferta" or $produtoRotulo == "Presente") {
            $productPrice = "<del> R$$precoProduto </del>";
            $productPspPrice = "| R$$proPspPrice";
          } else {
            $productPspPrice = "";
            $productPrice = "R$$precoProduto";
          }

          // Lógica para exibir rótulo de oferta se aplicável
          if ($produtoRotulo == "") {
          } else {
            $productLabel = "
<a class='label sale' href='#' style='color:black;'>
<div class='thelabel'>$produtoRotulo</div>
<div class='label-background'> </div>
</a>
";
          }

          // Exibe os produtos recomendados
          echo "
<div class='col-md-3 col-sm-6 center-responsive' >
<div class='product' >
<a href='$proUrl' >
<img src='admin_area/product_images/$produtoImagem1' class='img-responsive' >
</a>
<div class='text' >
<center>
<p class='btn btn-warning'> $nomeFabricante </p>
</center>
<hr>
<h3><a href='$proUrl' >$tituloProduto</a></h3>
<p class='price' > $productPrice $productPspPrice </p>
<p class='buttons' >
<a href='$proUrl' class='btn btn-danger'>Detalhes do Produto</a>
</p>
</div>
$productLabel
</div>
</div>
";
        }
        ?>
      </div><!-- linha same-height-row Termina -->
    </div><!-- col-md-9 Termina -->

    <div class="col-md-3"><!-- col-md-3 Começa -->
      <div class="box" id="order-summary"><!-- caixa Começa -->
        <div class="box-header"><!-- caixa-header Começa -->
          <h3>
            Resumo do Pedido</h3>
        </div><!-- caixa-header Termina -->
        <p class="text-muted">
          Os custos de envio e adicionais são calculados com base nos valores que você inseriu.
        </p>
        <div class="table-responsive"><!-- tabela-responsiva Começa -->
          <table class="table"><!-- tabela Começa -->
            <tbody><!-- corpo Começa -->
              <tr>
                <td> Subtotal do Pedido </td>
                <th> R$<?php echo $total; ?>,00 </th>
              </tr>
              <tr>
                <td> Envio e manipulação </td>
                <th>R$0,00</th>
              </tr>
              <tr>
                <td>Taxa</td>
                <th>R$0,00</th>
              </tr>
              <tr class="total">
                <td>Total</td>
                <th>R$<?php echo $total; ?>,00</th>
              </tr>
            </tbody><!-- corpo Termina -->
          </table><!-- tabela Termina -->
        </div><!-- tabela-responsiva Termina -->
      </div><!-- caixa Termina -->
    </div><!-- col-md-3 Termina -->
  </div><!-- container Termina -->
</div><!-- conteúdo Termina -->

<!-- Scripts JavaScript -->
<script src="js/jquery.min.js"> </script>
<script src="js/bootstrap.min.js"></script>
<script>
  $(document).ready(function(data) {
    $(document).on('keyup', '.quantity', function() {
      var id = $(this).data("product_id");
      var quantity = $(this).val();
      if (quantity != '') {
        $.ajax({
          url: "change.php",
          method: "POST",
          data: {
            id: id,
            quantity: quantity
          },
          success: function(data) {
            $("body").load('cart.php');
          }
        });
      }
    });
  });
</script>
</body>

</html>