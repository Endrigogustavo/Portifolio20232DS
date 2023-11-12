<?php
session_start();
$con = mysqli_connect("localhost", "root", "", "ecom_store");


function getRealUserIp() {
    switch(true) {
        case (!empty($_SERVER['HTTP_X_REAL_IP'])) : return $_SERVER['HTTP_X_REAL_IP'];
        case (!empty($_SERVER['HTTP_CLIENT_IP'])) : return $_SERVER['HTTP_CLIENT_IP'];
        case (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) : return $_SERVER['HTTP_X_FORWARDED_FOR'];
        default : return $_SERVER['REMOTE_ADDR'];
    }
}

// Obtém o endereço IP do usuário
$ip_add = getRealUserIp();



// Verifica a conexão com o banco de dados
if (!$con) {
    die("Falha na conexão com o banco de dados: " . mysqli_connect_error());
}

// Lógica para verificar se o usuário tem itens no carrinho
$temItensNoCarrinho = false;

if (isset($_SESSION['customer_email'])) {
    $customer_email = $_SESSION['customer_email']; // Obtém o email do cliente da variável de sessão
    $select_cart = "SELECT * FROM customers WHERE customer_email='$customer_email'";
    
   // Agora você pode usar $ip_add na sua consulta SQL
$get_cart = "SELECT * FROM cart WHERE ip_add='$ip_add'";
$run_cart = mysqli_query($con, $get_cart);

    // Verifica se a consulta foi bem-sucedida
    if (!$run_cart) {
        die("Erro na consulta: " . mysqli_error($con));
    }
    
    
    // Verifica se há itens no carrinho do usuário
    if (mysqli_num_rows($run_cart) > 0) {
        $temItensNoCarrinho = true;
    }
}
?>

<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/Site/ecommerce-website-php/styles/load.css">
    <link rel="icon" href="images/logo.png">
    <title>ADAPLAY</title>
</head>
<body>
    <style>@import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@500&display=swap');

* {
  box-sizing: border-box;
}

body {
  width: 100%;
  height: 100vh;
  display: flex;
  justify-content: center;
  align-items: center;
  background-image: radial-gradient( circle farthest-corner at 10% 20%, #ff9900, #ff8800, #ff7700, #ff6600, #ff5500, #ff4400, #ff3300, #ff4400, #ff5500, #ff6600 94.2% );
  background-size: 100%;
  font-family: 'Montserrat', sans-serif;
  overflow: hidden;
}

.loading-container {
  width: 100%;
  max-width: 520px;
  text-align: center;
  color: #fff;
  position: relative;
  margin: 0 32px;
}

.loading-container:before {
  content: '';
  position: absolute;
  width: 100%;
  height: 3px;
  background-color: #fff;
  bottom: 0;
  left: 0;
  border-radius: 10px;
  animation: movingLine 2.4s infinite ease-in-out;
}

@keyframes movingLine {
  0% {
    opacity: 0;
    width: 0;
  }
  33.3%, 66% {
    opacity: 0.8;
    width: 100%;
  }
  85% {
    width: 0;
    left: initial;
    right: 0;
    opacity: 1;
  }
  100% {
    opacity: 0;
    width: 0;
  }
}

.loading-text {
  font-size: 5vw;
  line-height: 64px;
  letter-spacing: 10px;
  margin-bottom: 32px;
  display: flex;
  justify-content: space-evenly;
}

.loading-text span {
  animation: moveLetters 2.4s infinite ease-in-out;
  transform: translateX(0);
  position: relative;
  display: inline-block;
  opacity: 0;
  text-shadow: 0px 2px 10px rgba(46, 74, 81, 0.3);
}

.loading-text span:nth-child(1) {
  animation-delay: 0.1s;
}
.loading-text span:nth-child(2) {
  animation-delay: 0.2s;
}
.loading-text span:nth-child(3) {
  animation-delay: 0.3s;
}
.loading-text span:nth-child(4) {
  animation-delay: 0.4s;
}
.loading-text span:nth-child(5) {
  animation-delay: 0.5s;
}
.loading-text span:nth-child(6) {
  animation-delay: 0.6s;
}
.loading-text span:nth-child(7) {
  animation-delay: 0.7s;
}

@keyframes moveLetters {
  0% {
    transform: translateX(-15vw);
    opacity: 0;
  }
  33.3%, 66% {
    transform: translateX(0);
    opacity: 1;
  }
  100% {
    transform: translateX(15vw);
    opacity: 0;
  }
}

.socials {
  position: fixed;
  bottom: 16px;
  right: 16px;
  display: flex;
  align-items: center;
}

.social-link {
  color: #fff;
  display: flex;
  align-items: center;
  cursor: pointer;
  text-decoration: none;
  margin-right: 12px;
}</style>
    <div class="loading-container">
        <div class="loading-text">
            <span>L</span>
            <span>O</span>
            <span>A</span>
            <span>D</span>
            <span>I</span>
            <span>N</span>
            <span>G</span>
        </div>
    </div>

    <script>
       document.querySelector('.loading-container').style.display = 'flex';

// Simula o carregamento dos dados (pode ser uma requisição assíncrona, por exemplo)
setTimeout(function() {
    // Após o carregamento dos dados, oculta a tela de carregamento
    document.querySelector('.loading-container').style.display = 'none';

    <?php
    // Verifica se há itens no carrinho antes de redirecionar
    if ($temItensNoCarrinho) {
        echo "window.location = '/Adaplay/checkout.php'";
    } else {
        echo "window.location = '/Adaplay/customer/my_account.php'";
    }
    ?>
}, 3000);
    </script>
</body>
</html>