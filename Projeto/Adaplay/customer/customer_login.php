<div class="box2"><!--Inicio da Box -->
    <link href="styles/Login2.css" rel="stylesheet">
    <link rel="icon" href="../images/logo.png">

    <div class="box-header"><!-- Inicio da box-header  -->

    </div><!-- fim da box-header  -->

    <div class="caixa-Login">


        <!-- enviando informaçoes para  checkout.php-->
        <form action="checkout.php" method="post"><!--Inicio do forms-->
            <h2>Login</h2>
            <div class="form-group"><!--Inicio do form-group-->

                <label>Email</label>

                <input type="text" class="form-control" name="c_email" required>

            </div><!-- fim form-group  -->

            <div class="form-group"><!--inicio da form-group  -->

                <label>Senha</label>

                <input type="password" class="form-control" name="c_pass" required>

                <!--<h4 align="center">

                    <a href="forgot_pass.php"> Esqueci minha senha </a>

                </h4>-->

            </div><!-- form-group - Final -->

            <div class="text-center"><!-- incio datext-center -->

                <button name="login" value="Login" class="btn btn-primary">

                    <i class="fa fa-sign-in"></i> Entrar


                </button>

            </div><!-- text-center final -->

            <div class="registro">
                <a href="customer_register.php">
                    <h3>Novo ? Registre-se aqui</h3>
                </a>
            </div>

    </div>
    </form><!--form final -->






</div><!-- box final -->

<?php

if (isset($_POST['login'])) {
    // Verifica se o formulário de login foi submetido

    $customer_email = $_POST['c_email'];
    // Obtém o valor do campo de email do formulário

    $customer_pass = $_POST['c_pass'];
    // Obtém o valor do campo de senha do formulário

    $select_customer = "select * from customers where customer_email='$customer_email' AND customer_pass='$customer_pass'";
    // Cria uma consulta SQL para verificar se o email e a senha correspondem a um registro na tabela de clientes

    $run_customer = mysqli_query($con, $select_customer);
    // Executa a consulta SQL usando a conexão com o banco de dados ($con)

    //$senha = $run_customer->fetch_assoc();
    //password_verify($c_pass,$senha['c_pass'];

    $get_ip = getRealUserIp();
    // Obtém o endereço IP real do usuário

    $check_customer = mysqli_num_rows($run_customer);
    // Verifica quantas linhas correspondem à consulta SQL, ou seja, se o login foi bem-sucedido

    $select_cart = "select * from cart where ip_add='$get_ip'";
    // Cria uma consulta SQL para buscar informações do carrinho com base no endereço IP do usuário

    $run_cart = mysqli_query($con, $select_cart);
    // Executa a consulta no banco de dados para o carrinho

    $check_cart = mysqli_num_rows($run_cart);
    // Verifica quantas linhas foram retornadas pela consulta do carrinho


    if ($check_customer == 0) {
        // Se nenhum cliente corresponder ao email e senha fornecidos

        echo "<script>alert('Senha ou Email incorretos.')</script>";
        // Exibe um alerta informando que a senha ou o email estão incorretos
        exit();
        // Encerra o script
    }

    if ($check_customer == 1 and $check_cart == 0) {
        // Se um cliente corresponder e não houver itens no carrinho

        $_SESSION['customer_email'] = $customer_email;
        // Define a variável de sessão 'customer_email' com o valor do email do cliente


        echo "<script>window.open('customer/load.php?my_orders','_self')</script>";
        // Redireciona o cliente para a página 'LOAD.php' 
    } else {
        // Se um cliente corresponder e houver itens no carrinho

        $_SESSION['customer_email'] = $customer_email;
        // Define a variável de sessão 'customer_email' com o valor do email do cliente

        echo "<script>window.open('customer/load.php?my_orders','_self')</script>";
        // Redireciona o cliente para a página 'Load.php'
    }
}

?>