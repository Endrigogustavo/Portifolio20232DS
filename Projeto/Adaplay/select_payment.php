<!--Font Awesome CDN-->
<?php

if (!isset($_SESSION['customer_email'])) {

    echo "<script>window.open('checkout.php','_self')</script>";
} else {
}

// Inclui os arquivos de configuração, cabeçalho, funções relacionadas à conta e a estrutura principal da página

?>
 <link rel="icon" href="images/logo.png">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="stylesheet" href="styles/payment.css">
<title>Selecionar Pagamento</title>

<div class="container">
    <div class="title">
        <h4>Selecione o <span style="color: #ff7f32">Método de</span> Pagamento</h4>
    </div>

    <form action="#">
        <input type="radio" name="payment" id="visa">
        <input type="radio" name="payment" id="mastercard">
        <input type="radio" name="payment" id="Pix">
        <input type="radio" name="payment" id="AMEX">


        <div class="category">
            <label for="visa" class="visaMethod">
                <div class="imgName">
                    <div class="imgContainer visa">
                        <img src="images/Visa-Card.png" alt="">
                    </div>
                    <span class="name">VISA</span>
                </div>
                <span class="check"><i class="fa-solid fa-circle-check" style="color: #ff7f32;"></i></span>
            </label>

            <label for="mastercard" class="mastercardMethod">
                <div class="imgName">
                    <div class="imgContainer mastercard">
                        <img src="images/mastercard.jpg" alt="">
                    </div>
                    <span class="name">Mastercard</span>
                </div>
                <span class="check"><i class="fa-solid fa-circle-check" style="color: #ff7f32;"></i></span>
            </label>

            <label for="Pix" class="PixMethod">
                <div class="imgName">
                    <div class="imgContainer Pix">
                        <img src="images/pix-106.png" alt="">
                    </div>
                    <span class="name">Pix</span>
                </div>
                <span class="check"><i class="fa-solid fa-circle-check" style="color: #ff7f32;"></i></span>
            </label>

            <label for="AMEX" class="amexMethod">
                <div class="imgName">
                    <div class="imgContainer AMEX">
                        <img src="images/American-Express.jpg" alt="">
                    </div>
                    <span class="name">AMEX</span>
                </div>
                <span class="check"><i class="fa-solid fa-circle-check" style="color: #ff7f32;"></i></span>
            </label>
        </div>
    </form>

    <div class="Botao">
        <div style="text-align: center;">
            <button id="continueButton" disabled>Continuar</button>
            <a href="cart.php"><button id="returnButton">Retornar</button></a>
        </div>
    </div>
</div>



<script>
    // Adicione um evento de clique para cada input radio
    const radioInputs = document.querySelectorAll('input[type="radio"]');
    radioInputs.forEach(input => {
        input.addEventListener('change', updateContinueButton);
    });

    // Função para atualizar o estado do botão de continuação
    function updateContinueButton() {
        const continueButton = document.getElementById('continueButton');
        const selectedPayment = document.querySelector('input[name="payment"]:checked');

        // Habilitar o botão de continuação se um método de pagamento estiver selecionado
        if (selectedPayment) {
            continueButton.disabled = false;
        } else {
            continueButton.disabled = true;
        }
    }

    // Adicione um evento de clique para o botão de continuação
    const continueButton = document.getElementById('continueButton');
    continueButton.addEventListener('click', redirectToPaymentPage);

    // Função para redirecionar para a página de pagamento com base no método selecionado
    function redirectToPaymentPage() {
        const selectedPayment = document.querySelector('input[name="payment"]:checked');
        if (selectedPayment) {
            const paymentMethod = selectedPayment.id;

            switch (paymentMethod) {
                case "visa":
                    window.location.href = "payment_options.php";
                    break;
                case "mastercard":
                    window.location.href = "payment_optionsMaster.php";
                    break;
                case "Pix":
                    window.location.href = "payment_optionsPix.php";
                    break;
                case "AMEX":
                    window.location.href = "payment_optionsAmex.php";
                    break;
                default:
                    break;
            }
        }
    }
</script>
</div>