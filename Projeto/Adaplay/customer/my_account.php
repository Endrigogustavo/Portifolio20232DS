<?php

session_start();
// Verifica se não há uma sessão de cliente ativa, e se não, redireciona para a página de checkout
if (!isset($_SESSION['customer_email'])) {

  echo "<script>window.open('../checkout.php','_self')</script>";
} else {
  //Variáveis de Link
  $index = "../index.php";
  $register = "../customer_register.php";
  $conta = "my_account.php?my_orders";
  $cart = "../cart.php";
  $favorites = "my_account.php?my_wishlist";
  $products = "../shop.php";
  $contato = "../contact.php";
  $logout = "../logout.php";
  $checkout = "../checkout.php";
  $sobrenos = "../about.php";

  // Inclui os arquivos de configuração, cabeçalho, funções relacionadas à conta e a estrutura principal da página
  include("../includes/db.php");
  include("../includes/header.php");
  include("../functions/functions.php");
  include("../includes/main.php");



  ?>
  <!-- A partir daqui, começa a estrutura HTML da página -->
  <main>
    <!-- HERO -->
    <div class="nero">
      <div class="nero__heading">
        <span class="nero__bold">Minha </span>Conta
      </div>
      <p class="nero__text">
      </p>
    </div>
  </main>

  <div class="myaccountpage"><!-- content Starts -->
    <div class="containeraccount"><!-- container Starts -->

      <!-- Aqui começa a coluna para exibir mensagens de confirmação do cliente -->

      <div class="col-md-12"><!-- col-md-12 Starts -->

        <?php
        // Obtém o endereço de e-mail do cliente da sessão
        $c_email = $_SESSION['customer_email'];
        // Cria uma consulta SQL para buscar informações do cliente com base no endereço de e-mail
        $get_customer = "select * from customers where customer_email='$c_email'";
        // Executa a consulta SQL
        $run_customer = mysqli_query($con, $get_customer);
        // Extrai dados do cliente do resultado da consulta
        $row_customer = mysqli_fetch_array($run_customer);
        // Obtém o código de confirmação do cliente
        $customer_confirm_code = $row_customer['customer_confirm_code'];
        // Se houver um código de confirmação não vazio, exibe uma mensagem de alerta
        $c_name = $row_customer['customer_name'];

        if (!empty($customer_confirm_code)) {

          ?>

          <div class="alert alert-danger"><!-- alert alert-danger Starts -->

            <strong> Warning! </strong> Please Confirm Your Email and if you have not received your confirmation email

            <a href="my_account.php?send_email" class="alert-link">

              Send Email Again

            </a>

          </div><!-- alert alert-danger Ends -->

        <?php } ?>

        <!-- Aqui termina a coluna para exibir mensagens de confirmação do cliente -->

        <!-- A partir daqui, são exibidos os menus e conteúdos da conta do cliente -->

      </div><!-- col-md-12 Ends -->

      <div class="col-md-3"><!-- col-md-3 Starts -->

        <?php include("../includes/sidebar_MinhaConta.php"); ?>

      </div><!-- col-md-3 Ends -->

      <div class="col-md-9"><!--- col-md-9 Starts -->

        <div class="box"><!-- box Starts -->

          <?php
          // Verifica as ações que o cliente deseja executar e inclui o conteúdo apropriado
          if (isset($_GET[$customer_confirm_code])) {
            // Atualiza o código de confirmação do cliente no banco de dados
            $update_customer = "update customers set customer_confirm_code='' where customer_confirm_code='$customer_confirm_code'";
            // Executa a consulta SQL de atualização
            $run_confirm = mysqli_query($con, $update_customer);

            echo "<script>alert('Your Email Has Been Confirmed')</script>";

            echo "<script>window.open('my_account.php?my_orders','_self')</script>";
          }
          // Se o cliente desejar enviar o e-mail de confirmação novamente
          if (isset($_GET['send_email'])) {
            // Configura o assunto, remetente e mensagem do e-mail de confirmação
            $subject = "Email Confirmation Message";

            $from = "guilhermebarreto@gmail.com";

            $message = "

<h2>
Email Confirmation By Computerfever.com $c_name
</h2>

<a href='localhost/ecom_store/customer/my_account.php?$customer_confirm_code'>

Click Here To Confirm Email

</a>

";
            // Configura os cabeçalhos do e-mail
            $headers = "From: $from \r\n";
            // Envia o e-mail de confirmação
            $headers .= "Content-type: text/html\r\n";
            // Exibe uma mensagem de alerta informando que o e-mail de confirmação foi enviado e redireciona para a página de pedidos
            mail($c_email, $subject, $message, $headers);

            echo "<script>alert('Your Confirmation Email Has Been sent to you, check your inbox')</script>";

            echo "<script>window.open('my_account.php?my_orders','_self')</script>";
          }


          // A partir daqui, verifica-se qual ação o cliente deseja realizar (por exemplo, visualizar pedidos, editar conta, etc.) e inclui o conteúdo apropriado
          if (isset($_GET['my_orders'])) {

            include("my_orders.php");
          }

          if (isset($_GET['pay_offline'])) {

            include("pay_offline.php");
          }

          if (isset($_GET['edit_account'])) {

            include("edit_account.php");
          }

          if (isset($_GET['change_pass'])) {

            include("change_pass.php");
          }

          if (isset($_GET['delete_account'])) {

            include("delete_account.php");
          }

          if (isset($_GET['my_wishlist'])) {

            include("my_wishlist.php");
          }

          if (isset($_GET['delete_wishlist'])) {

            include("delete_wishlist.php");
          }

          ?>

        </div>


      </div><!--- col-md-9 Ends -->

    </div>
  </div>


  <script src="../js/jquery.min.js"> </script>
  <script src="js/EditAccount.js"> </script>
  <script src="../js/bootstrap.min.js"></script>

  <script src="../js/navbar.js"></script>

  </body>

  </html>
<?php } ?>