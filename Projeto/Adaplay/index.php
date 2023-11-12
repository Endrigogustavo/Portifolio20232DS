<?php

session_start();

//Variáveis de Link
$index = "#";
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

<link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">


<!-- Cobrir -->


<section class="carouselbanner swiper mySwiper">
  <div class="wrapperzin swiper-wrapper">

    <div class="slidezin swiper-slide">
      <img src="images/Carrossel/1r.png" alt="" class="image" />
      <div class="image-data">
        <h2>ADAPLAY</h2>
        <span class="text">Fazendo o mundo um lugar mais inclusivo para todos</span>
        <br>
        <a href="about.php" class="button">Sobre Nós</a>
      </div>
    </div>

    <div class="slidezin swiper-slide">
      <img src="images/Carrossel/2.jpg" alt="" class="image" />
      <div class="image-data">
        <h2>Bandai Namco</h2>
        <span class="text">Direto da terra do Sol nascente pro Ociente, aproveite agora os lançamentos </span>
        <br>
        <a href="shop.php" class="button">Confira</a>
      </div>
    </div>

    <div class="slidezin swiper-slide">
      <img src="images/Carrossel/3.jpg" alt="" class="image" />
      <div class="image-data">
        <h2>Brinquedos Adaptados </h2>
        <span class="text">Não existe nada como a imaginação de uma criança, e por isso não deve ser impedida</span>
        <br>
        <a href="shop.php" class="button">Confira</a>
      </div>

    </div>
  </div>

  <div class="swiper-button-next nav-btn"></div>
  <div class="swiper-button-prev nav-btn"></div>
  <div class="swiper-pagination"></div>
</section>


<div class="logosom">
  <div class="logosom-slide">
    <img src="images/logos/1.png" />
    <img src="images/logos/2.png" />
    <img src="images/logos/3.png" />
    <img src="images/logos/4.png" />
    <img src="images/logos/5.png" />
    <img src="images/logos/6.png" />
    <img src="images/logos/7.png" />
    <img src="images/logos/8.png" />
    <img src="images/logos/9.png" />
    <img src="images/logos/10.png" />
    <img src="images/logos/11.png" />
  </div>
</div>

<div class="graphicbanner">
  <div class="bannertext">
    <h1>Brinque sem Limites</h1>
    <p>
      Nossa primeira loja foi concebida com adaptações tanto nos produtos quanto no site, visando oferecer a melhor
      experiência aos clientes,
      tornando a compra mais acessível e conveniente.
    </p>
    <a href="about.php"><button href="about.php">Sobre nós</button></a>
  </div>
  <div class="imagem">
    <img src="images/banner1.png" alt="Produtos da Loja">
  </div>
</div>

<section class="simplecards">
  <div class="textosin">
    <h1>Categorias</h1>
  </div>

  <div class="conteudoscategoria">
    <div class="categorias">

      <div class="card">

        <div class="card-content">

          <h1>Adaptados</h1>
          <p>Brinque sem Limites</p>
          <a href="shop.php"><i class='bx bx-chevron-right'></i></a>

        </div>


        <div class="card-img">
          <img src="images/cards/card1.png">

        </div>

      </div>

      <div class="card">

        <div class="card-content">

          <h1>Super Herói</h1>
          <p>Brinque com Imaginação</p>
          <a href="shop.php"><i class='bx bx-chevron-right'></i></a>

        </div>

        <div class="card-img">
          <img src="images/cards/card2.png">

        </div>

      </div>

      <div class="card">

        <div class="card-content">

          <h1>Esportes</h1>
          <p>Brinque como profissional</p>
          <a href="shop.php"><i class='bx bx-chevron-right'></i></a>

        </div>


        <div class="card-img">
          <img src="images/cards/card3.png">

        </div>

      </div>

      <div class="card">

        <div class="card-content">

          <h1>Recém Lançados</h1>
          <p>Brinque com novidade</p>
          <a href="shop.php"><i class='bx bx-chevron-right'></i></a>

        </div>


        <div class="card-img">
          <img src="images/cards/card4.png">

        </div>

      </div>

    </div>

    <div class="cards3dcontainer">
      <div class="card3d">
        <div class="wrapper3d">
          <img src="images/cards/3dcards/1a.png" class="cover-image" />
        </div>

        <img src="images/cards/3dcards/1b.png" class="character" />
      </div>

      <div class="card3d">
        <div class="wrapper3d">
          <img src="images/cards/3dcards/2a.png" class="cover-image" />
        </div>

        <img src="images/cards/3dcards/2b.png" class="character" />
      </div>

      <div class="card3d">
        <div class="wrapper3d">
          <img src="images/cards/3dcards/3a.png" class="cover-image" />
        </div>

        <img src="images/cards/3dcards/3b.png" class="character" />
      </div>
    </div>

  </div>
</section>

<!-- Swiper JS -->
<script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>
<script src="js/home.js"></script>

<br>
<div id="content" class="container"><!-- Início do Container -->

  <div class="row"><!-- Início da Coluna -->

    <?php

    getPro();

    ?>

  </div><!-- Fim da Coluna -->

</div><!-- Fim do Container -->
<div class="line-footer">
  <hr>
</div>

<!-- FOOTER -->
<footer class="page-footer">

  <div class="footer-nav">
    <div class="container clearfix">

      <div class="footer-nav__col footer-nav__col--info">
        <div class="footer-nav__heading">Informação</div>
        <ul class="footer-nav__list">
          <li class="footer-nav__item">
            <a href="#" class="footer-nav__link">Marca</a>
          </li>
          <li class="footer-nav__item">
            <a href="#" class="footer-nav__link">Serviço Customizado</a>
          </li>
          <li class="footer-nav__item">
            <a href="#" class="footer-nav__link">Privacy &amp; Cookies</a>
          </li>
          <li class="footer-nav__item">
            <a href="#" class="footer-nav__link">Posição Geográfica</a>
          </li>
        </ul>
      </div>

      <div class="footer-nav__col footer-nav__col--whybuy">
        <div class="footer-nav__heading">Por que Comprar Conosco?</div>
        <ul class="footer-nav__list">
          <li class="footer-nav__item">
            <a href="#" class="footer-nav__link">Envio &amp; Retorno</a>
          </li>
          <li class="footer-nav__item">
            <a href="#" class="footer-nav__link">Segurança do Envio</a>
          </li>
          <li class="footer-nav__item">
            <a href="#" class="footer-nav__link">FeedBack</a>
          </li>
          <li class="footer-nav__item">
            <a href="#" class="footer-nav__link">Premiado</a>
          </li>
          <li class="footer-nav__item">
            <a href="#" class="footer-nav__link">Negociação Ética</a>
          </li>
        </ul>
      </div>

      <div class="footer-nav__col footer-nav__col--account">
        <div class="footer-nav__heading">Sua Conta
        </div>
        <ul class="footer-nav__list">
          <li class="footer-nav__item">
            <a href="#" class="footer-nav__link">Login</a>
          </li>
          <li class="footer-nav__item">
            <a href="#" class="footer-nav__link">Registrar</a>
          </li>
          <li class="footer-nav__item">
            <a href="#" class="footer-nav__link">Ver Carrinho</a>
          </li>
          <li class="footer-nav__item">
            <a href="#" class="footer-nav__link">Rastrear um pedido</a>
          </li>
          <li class="footer-nav__item">
            <a href="#" class="footer-nav__link">Atualizar Informações</a>
          </li>
        </ul>
      </div>


      <div class="footer-nav__col footer-nav__col--contacts">
        <div class="footer-nav__heading">Detalhes de Contato</div>
        <address class="address">
          Head Office: Avenida ADAPLAY.<br>
          180-182 Rua Teste, São Paulo.
        </address>
        <div class="phone">
          Telephone:
          <a class="phone__number" href="tel:0123456789">0123-456-789</a>
        </div>
        <div class="email">
          Email:
          <a href="mailto:support@yourwebsite.com" class="email__addr">support@yourwebsite.com</a>
        </div>
      </div>

    </div>
  </div>

  <div class="line-footer">
    <hr>
  </div>

  <div class="page-footer__subline">
    <div class="container clearfix">

      <div class="copyright">
        &copy;
        <?php echo date("Y"); ?> ADAPLAY&trade;
      </div>


    </div>
  </div>
</footer>
</body>

</html>