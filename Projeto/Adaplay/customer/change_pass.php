<!-- Esta linha define um cabeçalho de nível 1 (H1) centralizado com o texto "Alteração de Senha". -->
<h1 align="center">Alteração de Senha </h1>
<!-- Aqui começa um formulário HTML com o atributo "action" vazio e o método "post". -->
<form action="" method="post">

 <!-- Esta linha cria uma seção de grupo de formulário com um rótulo "Digite Sua Senha Atual" e um campo de entrada de texto com o nome "old_pass" e a classe "form-control". O campo é marcado como obrigatório (required). -->
    <div class="form-group">

        <label>Digite Sua Senha Atual</label>

        <input type="text" name="old_pass" class="form-control" required>

    </div>

 <!-- Esta linha cria outra seção de grupo de formulário semelhante para "Digite Sua Nova Senha". -->
    <div class="form-group">

        <label>Digite Sua Nova Senha</label>

        <input type="text" name="new_pass" class="form-control" required>

    </div>

<!-- Esta linha cria uma terceira seção de grupo de formulário para "Digite Sua Nova Senha Novamente". -->
    <div class="form-group">

        <label>Digite Sua Nova Senha Novamente</label>

        <input type="text" name="new_pass_again" class="form-control" required>

    </div>
 <!-- Esta linha cria um elemento de alinhamento de texto central para centralizar o botão de envio. -->
    <div class="text-center">

        <button type="submit" name="Enviar" class="btn btn-primary">

            <i class="fa fa-user-md"> </i> Alterar Senha

        </button>

    </div>

</form>
<?php
// Verifica se o formulário foi enviado (o botão com o nome "Enviar" foi clicado).
if (isset($_POST['Enviar'])) {
 // Obtém o endereço de email do cliente da sessão.
    $c_email = $_SESSION['customer_email'];
 // Obtém a senha antiga do campo de entrada do formulário.
    $old_pass = $_POST['old_pass'];
 // Obtém a nova senha do campo de entrada do formulário.
    $new_pass = $_POST['new_pass'];
// Obtém a nova senha novamente do campo de entrada do formulário.
    $new_pass_again = $_POST['new_pass_again'];
 // Consulta para verificar se a senha antiga corresponde à senha armazenada no banco de dados.
    $sel_old_pass = "select * from customers where customer_pass='$old_pass'";
// Executa a consulta.
    $run_old_pass = mysqli_query($con, $sel_old_pass);
 // Verifica quantas linhas foram retornadas pela consulta.
    $check_old_pass = mysqli_num_rows($run_old_pass);
 // Se a senha antiga não corresponder, exibe um alerta e encerra o script.
    if ($check_old_pass == 0) {

        echo "<script>alert('Your Current Password is not valid try again')</script>";

        exit();
    }
 // Atualiza a senha do cliente no banco de dados.
    if ($new_pass != $new_pass_again) {

        echo "<script>alert('Your New Password dose not match')</script>";

        exit();
    }

    $update_pass = "update customers set customer_pass='$new_pass' where customer_email='$c_email'";

    $run_pass = mysqli_query($con, $update_pass);
 // Se a atualização for bem-sucedida, exibe um alerta e redireciona para a página 'my_account.php?my_orders'.
    if ($run_pass) {

        echo "<script>alert('Sua senha foi alterada com sucesso!')</script>";

        echo "<script>window.open('my_account.php?my_orders','_self')</script>";
    }
}



?>