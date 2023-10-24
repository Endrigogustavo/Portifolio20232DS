<div class="box"><!-- Inicia um contêiner -->
  
  <?php
  // Obtém o email do cliente da sessão.
  $session_email = $_SESSION['customer_email'];
  
  // Consulta o banco de dados para obter informações do cliente com base no email.
  $select_customer = "select * from customers where customer_email='$session_email'";
  $run_customer = mysqli_query($con, $select_customer);
  $row_customer = mysqli_fetch_array($run_customer);
  
  // Obtém o ID do cliente.
  $customer_id = $row_customer['customer_id'];
  ?>

  <h1 class="text-center">Pagamentos para você</h1>
  
  <p class="lead text-center">
    <!-- Cria um link para pagamento offline, passando o ID do cliente como parâmetro. -->
    <a href="order.php?c_id=<?php echo $customer_id; ?>">Pay Off line</a>
  </p>
  
  <center>

    <!-- Formulário de pagamento via PayPal -->
    <form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
      <input type="hidden" name="cmd" value="_s-xclick">
      <input type="hidden" name="hosted_button_id" value="9PWJZYVQH8KGU">
      <input type="image" src="https://www.paypalobjects.com/en_US/i/btn/btn_buynow_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
      <img alt="" borde="0" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" width="1" height="1">
    </form>

    <?php
    // Inicializa uma variável de contagem.
    $i = 0;

    // Obtém o endereço IP do usuário.
    $ip_add = getRealUserIp();
    
    // Consulta o carrinho do usuário com base no endereço IP.
    $get_cart = "select * from cart where ip_add='$ip_add'";
    $run_cart = mysqli_query($con, $get_cart);
    
    // Loop para processar cada item no carrinho.
    while ($row_cart = mysqli_fetch_array($run_cart)) {
      $pro_id = $row_cart['p_id'];
      $pro_qty = $row_cart['qty'];
      $pro_price = $row_cart['p_price'];
      
      // Consulta informações do produto com base no ID.
      $get_products = "select * from products where product_id='$pro_id'";
      $run_products = mysqli_query($con, $get_products);
      $row_products = mysqli_fetch_array($run_products);
      $product_title = $row_products['product_title'];
      
      // Incrementa a variável de contagem.
      $i++;
    ?>

      <!-- Campos ocultos com informações do produto para o PayPal -->
      <input type="hidden" name="item_name_<?php echo $i; ?>" value="<?php echo $product_title; ?>">
      <input type="hidden" name="item_number_<?php echo $i; ?>" value="<?php echo $i; ?>">
      <input type="hidden" name="amount_<?php echo $i; ?>" value="<?php echo $pro_price; ?>">
      <input type="hidden" name="quantity_<?php echo $i; ?>" value="<?php echo $pro_qty; ?>">
    
    <?php } ?>

    <!-- Botão de pagamento do PayPal -->
    <input type="image" name="submit" width="500" height="270" src="images/paypal.png">

    </form><!-- Fecha o formulário -->

  </center>

</div><!-- Fecha o contêiner -->
