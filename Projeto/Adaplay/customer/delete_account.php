<center>

    <h1>Você realmente quer deletar sua conta?</h1>

    <form action="" method="post">

        <input class="btn btn-danger" type="submit" name="yes" value="Sim, eu quero deletar">

        <input class="btn btn-primary" type="submit" name="no" value="Não, eu não quero deletar">

    </form>

</center>

<?php
// Obtém o endereço de e-mail do cliente da sessão
$c_email = $_SESSION['customer_email'];
// Verifica se o botão "yes" foi submetido via POST
if (isset($_POST['yes'])) {
// Cria uma consulta SQL para excluir o cliente com base no endereço de e-mail
    $delete_customer = "delete from customers where customer_email='$c_email'";
 // Executa a consulta SQL usando a conexão $con
    $run_delete = mysqli_query($con, $delete_customer);
 // Se a exclusão for bem-sucedida, destrói a sessão do cliente e exibe uma mensagem de alerta
    if ($run_delete) {

        session_destroy();

        echo "<script>alert('Sua conta foi deletada! ')</script>";

        echo "<script>window.open('../index.php','_self')</script>";
    }
}
// Se o botão "no" foi submetido via POST, redireciona de volta para a página "my_account.php?my_orders"
if (isset($_POST['no'])) {

    echo "<script>window.open('my_account.php?my_orders','_self')</script>";
}


?>