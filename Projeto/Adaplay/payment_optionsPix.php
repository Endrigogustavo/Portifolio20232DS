<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="images/logo.png">
    <link rel="stylesheet" href="styles/Pix.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <title>Qr Code - Gerador</title>
</head>

<body>

    <?php
    session_start();
    include("includes/db.php");
    include("functions/functions.php");
    ?>

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

    <?php
    while ($row_cart = mysqli_fetch_array($run_cart)) {
        $pro_qty = $row_cart['qty'];
        $pro_price = $row_cart['p_price'];

        // Calcula o valor total para este item no carrinho.
        $item_total = $pro_qty * $pro_price;
        $total_amount += $item_total;
    }
    // Exibe informações detalhadas do produto.
    ?>

    <div class="wrapper">
        <div class="header-form">
            <div class="header">
                <h1>Gerador de QRCode</h1>
                <p>Pagamento Simples e Rápido</p>
            </div>
            <div class="form">
                <input type="text" name="" id="inputValue" value="<?php echo number_format($total_amount, 2, ',', '.'); ?>" readonly>
                <button id="btnValue">Gerar QRcode</button>
                <form action="order.php?c_id=<?php echo $customer_id; ?>" method="post" id="payment-form">
                    <button type="submit" id="btnPagar">Pago</button>
                </form>
                <a href="select_payment.php">
                    <button id="btnRetornar">
                        <i class="fa fa-arrow-left"></i> Retornar
                    </button>
                </a>
            </div>
        </div>
        <div class="qr-code">
            <img src="" id="imgQrCode" alt="">
        </div>
    </div>

    <script>
        const inputValue = document.querySelector('#inputValue');
        const btnValue = document.querySelector('#btnValue');
        const imgQrCode = document.querySelector('#imgQrCode');
        const wrapper = document.querySelector('.wrapper');
        const btnPagar = document.querySelector('#btnPagar');
        const btnRetornar = document.querySelector('#btnRetornar');
        let valueDefault;

        // https://api.qrserver.com/v1/create-qr-code/?size=150x150&data=Example 

        btnValue.addEventListener('click', () => {
            let qrcodeValue = inputValue.value.trim();
            if (!qrcodeValue || qrcodeValue === valueDefault) return;
            valueDefault = qrcodeValue;
            btnValue.innerText = 'Gerando QR Code...'
            imgQrCode.src = `https://api.qrserver.com/v1/create-qr-code/?size=150x150&data=${valueDefault}`
            imgQrCode.addEventListener('load', () => {
                wrapper.classList.add('active');
                btnValue.innerText = 'Gerar QRCode';
                // Habilitar o botão "Pagar" quando o QR Code for gerado
                btnValue.style.display = 'none'; // Ocultar o botão "Gerar QRCode"
                btnPagar.style.display = 'block';
                btnRetornar.style.display = 'block'; // Mostrar o botão "Retornar"
            });
        });

        btnPagar.addEventListener('click', () => {
            // Redirecionar para a página de pagamento
            window.location.href = 'order.php';
        });
    </script>

</body>

</html>