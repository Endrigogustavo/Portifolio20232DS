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
$checkout = "checkout.php";


include("includes/db.php");
include("includes/header.php");
include("functions/functions.php");
include("includes/main.php");




?>

<main>
  <!-- HERÓI -->
  <div class="nero">
    <div class="nero__heading">
      <span class="nero__bold">Sobre</span> Nós
    </div>
    <p class="nero__text">
    </p>
  </div>
</main>

<div id="content"><!-- Conteúdo começa -->
  <div class="container"><!-- Container começa -->

    <div class="col-md-12"><!-- Coluna de 12 começa -->

      <div class="box"><!-- Caixa começa -->

        <?php

        $get_about_us = "select * from about_us"; // Consulta SQL para obter informações "Sobre Nós" do banco de dados.

        $run_about_us = mysqli_query($con, $get_about_us); // Executa a consulta SQL.

        $row_about_us = mysqli_fetch_array($run_about_us); // Obtém os resultados da consulta.

        $about_heading = $row_about_us['about_heading']; // Obtém o título "Sobre Nós".
        $about_short_desc = $row_about_us['about_short_desc']; // Obtém uma breve descrição "Sobre Nós".
        $about_desc = $row_about_us['about_desc']; // Obtém a descrição completa "Sobre Nós".

        ?>

        <h1> <?php echo $about_heading; ?> </h1> <!-- Exibe o título "Sobre Nós". -->

        <p class="lead"> <?php echo $about_short_desc; ?> </p> <!-- Exibe a breve descrição "Sobre Nós". -->

        <p> <?php echo $about_desc; ?> </p> <!-- Exibe a descrição completa "Sobre Nós". -->

      </div><!-- Caixa termina -->

    </div><!-- Coluna de 12 termina -->

  </div><!-- Container termina -->
</div><!-- Conteúdo termina -->

<?php

include("includes/footer.php"); // Inclui o rodapé da página.

?>

<script src="js/jquery.min.js"> </script> <!-- Inclui o arquivo JavaScript jQuery -->
<script src="js/bootstrap.min.js"></script> <!-- Inclui o arquivo JavaScript Bootstrap -->

</body>

</html>