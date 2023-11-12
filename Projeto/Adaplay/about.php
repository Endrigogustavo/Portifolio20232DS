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
$sobrenos = "#";


include("includes/db.php");
include("includes/header.php");
include("functions/functions.php");
include("includes/main.php");




?>

<section class="timeline-section">
  <h1><span class="fancy">Sobre Nós</span></h1>
  <div class="timeline-items">
    <div class="timeline-item">

      <div class="timeline-dot"></div>
      <div class="timeline-date">2022-2°Semestre</div>
      <div class="timeline-content">
        <img src="images/Timeline/timeline1.png">
        <h3>Surgimento da Ideia</h3>
        <p>A ideia original do trabalho foi criada ali, em ser uma loja de brinquedos que oferecesse tanto brinquedos
          comuns quanto adaptados,
          e sua primeira versão surgiu nesse ano. </p>
      </div>
    </div>

    <div class="timeline-item">
      <div class="timeline-dot"></div>
      <div class="timeline-date">Fim-2022</div>
      <div class="timeline-content">
      <img src="images/Timeline/timeline2.png">
        <h3>AFFORDABLE TOYS</h3>
        <p>Esse foi o protótipo inicial do projeto, no qual já apresentava os recursos de forma visual (devido a
          utilizar apenas frontend)
          e serviria como base para o atual. </p>
      </div>
    </div>

    <div class="timeline-item">
      <div class="timeline-dot"></div>
      <div class="timeline-date">2023-1°Semestre</div>
      <div class="timeline-content">
        <img src="images/Timeline/timeline3.png">
        <h3>ReBrand (Recomeço)</h3>
        <p>Após o fim do primeiro ano do projeto, para que ele continuasse evoluindo, ocorreu um processo de Rebranding,
          que consistia na mudança da logo e das cores,
          a fim de proporcionar uma experiência inclusiva em todo o site.</p>
      </div>
    </div>

    <div class="timeline-item">
      <div class="timeline-dot"></div>
      <div class="timeline-date">2023-2°Semestre</div>
      <div class="timeline-content">
      <img src="images/Timeline/timeline4.jpg">
        <h3>Final do Projeto</h3>
        <p>Após dois anos desde a concepção da ideia de uma loja de brinquedos adaptada, o projeto chegou ao fim neste
          ano.
          Entretanto, marcou uma jornada de aprendizado ao longo de dois anos do curso DS-AMS
        </p>
      </div>
    </div>


  </div>
</section>





<script src="js/jquery.min.js"> </script> <!-- Inclui o arquivo JavaScript jQuery -->
<script src="js/bootstrap.min.js"></script> <!-- Inclui o arquivo JavaScript Bootstrap -->

</body>

</html>