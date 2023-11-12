<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" href="images/logo.png">
  <link rel="stylesheet" href="styles/creditcard.css">
  <title>Tela de Pagamento</title>
</head>

<body>
  <div class="container">
    <?php
    session_start();
    include("includes/db.php");
    include("functions/functions.php");
    ?>

    <div class="payment-method">
      <h1 class="text-center">Pagamento: Cartão de Crédito (Visa)</h1>

      <?php
      // Obtém o email do cliente da sessão.
      $session_email = $_SESSION['customer_email'];

      // Consulta o banco de dados para obter informações do cliente com base no email.
      $select_customer = "select * from customers where customer_email='$session_email'";
      $run_customer = mysqli_query($con, $select_customer);
      $row_customer = mysqli_fetch_array($run_customer);

      // Obtém o ID do cliente.
      $customer_id = $row_customer['customer_id'];

      // Inicializa uma variável de contagem.
      $i = 0;

      // Obtém o endereço IP do usuário.
      $ip_add = getRealUserIp();

      // Consulta o carrinho do usuário com base no endereço IP.
      $get_cart = "select * from cart where ip_add='$ip_add'";
      $run_cart = mysqli_query($con, $get_cart);

      // Variável para armazenar o valor total do pedido
      $total_amount = 0;
      ?>

      <div class="order-summary">
        <h2>Resumo do(s) Pedido(s)</h2>
        <?php
        while ($row_cart = mysqli_fetch_array($run_cart)) {
          $pro_id = $row_cart['p_id'];
          $pro_qty = $row_cart['qty'];
          $pro_price = $row_cart['p_price'];

          // Consulta informações do produto com base no ID.
          $get_products = "select * from products where product_id='$pro_id'";
          $run_products = mysqli_query($con, $get_products);
          $row_products = mysqli_fetch_array($run_products);
          $product_title = $row_products['product_title'];
          $product_img1 = $row_products['product_img1'];

          // Calcula o valor total para este item no carrinho.
          $item_total = $pro_qty * $pro_price;
          $total_amount += $item_total;

          // Exibe informações detalhadas do produto.
        ?>
          <div class="order-item">
            <div class="product-info">
              <img src="admin_area/product_images/<?php echo $product_img1; ?>" alt="<?php echo $product_title; ?>" class="product-image">
              <div class="product-title-container">
                <ul class="product-details">
                  <li><span class="product-title"><?php echo $product_title; ?></span></li>
                  <li><span>Quantidade: <?php echo $pro_qty; ?></span></li>
                  <li><span>Preço: R$<?php echo number_format($pro_price, 2, ',', '.'); ?></span></li>
                </ul>
              </div>
            </div>
          </div>
        <?php } ?>
        <div class="order-item">
          <span>Total:</span>
          <span>R$<?php echo number_format($total_amount, 2, ',', '.'); ?></span>
        </div>
      </div>

      <!-- Campos de pagamento fictícios para simulação -->
      <div class="payment-details">
        <h2>Informações de Pagamento</h2>
        <div class="creditcard">
          <div class="card-container">

            <div class="front">
              <div class="image">
                <img src="images/chip.png" alt="">
                <img src="images/visa_Cartao.png" alt="">
              </div>
              <div class="card-number-box">################</div>
              <div class="flexbox">
                <div class="box">
                  <span>TITULAR DO CARTÃO</span>
                  <div class="card-holder-name">NOME COMPLETO</div>
                </div>
                <div class="box">
                  <span>EXPIRAÇÃO</span>
                  <div class="expiration">
                    <span class="exp-month">MM /</span>
                    <span class="exp-year">YY</span>
                  </div>
                </div>
              </div>
            </div>

            <div class="back">
              <div class="stripe"></div>
              <div class="box">
                <span>cvv</span>
                <div class="cvv-box"></div>
                <img src="images/visa_Cartao.png" alt="">
              </div>
            </div>

          </div>

          <form action="order.php?c_id=<?php echo $customer_id; ?>" method="post" id="payment-form">
            <div class="inputBox">
              <span>NÚMERO DO CARTÃO</span>
              <input type="text" maxlength="16" class="card-number-input">
            </div>
            <div class="inputBox">
              <span>TITULAR DO CARTÃO</span>
              <input type="text" class="card-holder-input">
            </div>
            <div class="flexbox">
              <div class="inputBox">
                <span>EXPIRAÇÃO "MM"</span>
                <select name="" id="" class="month-input">
                  <option value="month" selected disabled>MÊS</option>
                  <option value="01">01</option>
                  <option value="02">02</option>
                  <option value="03">03</option>
                  <option value="04">04</option>
                  <option value="05">05</option>
                  <option value="06">06</option>
                  <option value="07">07</option>
                  <option value="08">08</option>
                  <option value="09">09</option>
                  <option value="10">10</option>
                  <option value="11">11</option>
                  <option value="12">12</option>
                </select>
              </div>
              <div class="inputBox">
                <span>EXPIRAÇÃO "YY"</span>
                <select name="" id="" class="year-input">
                  <option value="year" selected disabled>ANO</option>
                  <option value="2023">2023</option>
                  <option value="2024">2024</option>
                  <option value="2025">2025</option>
                  <option value="2026">2026</option>
                  <option value="2027">2027</option>
                  <option value="2028">2028</option>
                  <option value="2029">2029</option>
                  <option value="2030">2030</option>
                  <option value="2031">2031</option>
                  <option value="2032">2032</option>
                </select>
              </div>
              <div class="inputBox">
                <span>CVV</span>
                <input type="text" maxlength="3" class="cvv-input">
              </div>
            </div>
          </form>
          <p class="error-message" id="error-message"></p>
          <p class="lead text-center">
            <!-- Cria um link para pagamento offline, passando o ID do cliente como parâmetro. -->
            <a type="button" onclick="validatePayment()">Pagar Agora</a>
            <a href="select_payment.php">Retornar</a>
          </p>
        </div>

        <script>
          document.querySelector('.card-number-input').oninput = () => {
            document.querySelector('.card-number-box').innerText = document.querySelector('.card-number-input').value;
          }

          document.querySelector('.card-holder-input').oninput = () => {
            document.querySelector('.card-holder-name').innerText = document.querySelector('.card-holder-input').value;
          }

          document.querySelector('.month-input').oninput = () => {
            document.querySelector('.exp-month').innerText = document.querySelector('.month-input').value;
          }

          document.querySelector('.year-input').oninput = () => {
            document.querySelector('.exp-year').innerText = document.querySelector('.year-input').value;
          }

          document.querySelector('.cvv-input').onmouseenter = () => {
            document.querySelector('.front').style.transform = 'perspective(1000px) rotateY(-180deg)';
            document.querySelector('.back').style.transform = 'perspective(1000px) rotateY(0deg)';
          }

          document.querySelector('.cvv-input').onmouseleave = () => {
            document.querySelector('.front').style.transform = 'perspective(1000px) rotateY(0deg)';
            document.querySelector('.back').style.transform = 'perspective(1000px) rotateY(180deg)';
          }

          document.querySelector('.cvv-input').oninput = () => {
            document.querySelector('.cvv-box').innerText = document.querySelector('.cvv-input').value;
          }
        </script>
      </div>
    </div>

    <script>
      function validatePayment() {
        // Obtenha os valores dos campos de entrada
        const cardNumber = document.querySelector('.card-number-input');
        const cardHolder = document.querySelector('.card-holder-input');
        const month = document.querySelector('.month-input');
        const year = document.querySelector('.year-input');
        const cvv = document.querySelector('.cvv-input');
        const errorMessage = document.getElementById('error-message');

        // Valide se os campos são preenchidos
        if (cardNumber.value === '') {
          cardNumber.classList.add('invalid');
        } else {
          cardNumber.classList.remove('invalid');
        }

        if (cardHolder.value === '') {
          cardHolder.classList.add('invalid');
        } else {
          cardHolder.classList.remove('invalid');
        }

        if (month.value === 'month') {
          month.classList.add('invalid');
        } else {
          month.classList.remove('invalid');
        }

        if (year.value === 'year') {
          year.classList.add('invalid');
        } else {
          year.classList.remove('invalid');
        }

        if (cvv.value === '') {
          cvv.classList.add('invalid');
        } else {
          cvv.classList.remove('invalid');
        }

        // Verifique se algum campo está inválido
        if (cardNumber.value === '' || cardHolder.value === '' || month.value === 'month' || year.value === 'year' || cvv.value === '') {
          errorMessage.textContent = 'Preencha todos os campos do cartão de crédito.';
        } else {
          errorMessage.textContent = '';

          // Submeta o formulário se os campos estiverem preenchidos
          document.getElementById('payment-form').submit();
        }
      }
    </script>

  </div>
</body>

</html>