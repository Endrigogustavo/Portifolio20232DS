<?php

session_start();
// Verifica se a variável de sessão 'customer_email' não está definida, o que significa que o usuário não está logado.
if (!isset($_SESSION['customer_email'])) {
 // Redireciona o usuário para a página de checkout se ele não estiver logado.
    echo "<script>window.open('../checkout.php','_self')</script>";
} else {
// Se o usuário estiver logado, o código abaixo será executado.
    include("../includes/db.php");
    include("../includes/header.php");
    include("functions/functions_MinhaConta.php");
    include("../includes/main.php");

    // Verifica se o parâmetro 'order_id' foi passado na URL
    if (isset($_GET['order_id'])) {
        $order_id = $_GET['order_id'];
        // Consulta o banco de dados para obter o valor devido para o pedido especificado.
        $query = "SELECT due_amount FROM customer_orders WHERE order_id = $order_id";
        $result = mysqli_query($con, $query);
    // Obtém o valor devido do resultado da consulta.
        if ($row = mysqli_fetch_assoc($result)) {
            $due_amount = $row['due_amount'];
        } else {
            echo "Erro ao finalizar a compra.";
        }
    } else {
        echo "ERRO"; // Caso o parâmetro order_id não seja passado corretamente, redirecione ou mostre uma mensagem de erro.
    }


?>



    <div id="content">
        <div class="container">


            <div class="col-md-3"><!-- col-md-3 Starts -->

                <?php include("../includes/sidebar_MinhaConta.php"); ?>

            </div><!-- col-md-3 Ends -->

            <div class="col-md-9"><!-- col-md-9 Starts -->

                <div class="box">

                    <form action="confirm.php?update_id=<?php echo $order_id; ?>" method="post" enctype="multipart/form-data">

                        <div class="form-group">

                            <label>Invoice No:</label>

                            <input type="text" class="form-control" name="invoice_no" required>

                        </div>


                        <div class="form-group">

                            <label>Amount Sent:</label>

                            <input type="text" class="form-control" name="amount_sent" value="<?php echo $due_amount; ?>" disabled>

                        </div>

                        <div class="form-group">

                            <label>Select Payment Mode:</label>

                            <select name="payment_mode" class="form-control">

                                <option>Select Payment Mode</option>
                                <option>Bank Code</option>
                                <option>UBL/Omni</option>
                                <option>Western Union</option>

                            </select>

                        </div>

                        <div class="form-group">

                            <label>Transaction/Reference Id:</label>

                            <input type="text" class="form-control" name="ref_no" required>

                        </div>


                        <div class="form-group">

                            <label>Omni Code:</label>

                            <input type="text" class="form-control" name="code" required>

                        </div>


                        <div class="form-group">

                            <label>Payment Date:</label>

                            <input type="date" class="form-control" name="date" required>

                        </div>

                        <div class="text-center">

                            <button type="submit" name="confirm_payment" class="btn btn-primary btn-lg">

                                <i class="fa fa-user-md"></i> Confirm Payment

                            </button>

                        </div>

                    </form>

                    <?php
                // Aqui começa o código PHP relacionado ao formulário.

                // Verifica se o formulário foi submetido (o botão "confirm_payment" foi clicado).

                    if (isset($_POST['confirm_payment'])) {
                // Obtém o 'update_id' da URL.
                        $update_id = $_GET['update_id'];

                        $invoice_no = $_POST['invoice_no'];

                        $amount = $_POST['amount_sent'];

                        $payment_mode = $_POST['payment_mode'];

                        $ref_no = $_POST['ref_no'];

                        $code = $_POST['code'];

                        $payment_date = $_POST['date'];

                        $complete = "Complete";
                // Insere os detalhes do pagamento no banco de dados.
                        $insert_payment = "insert into payments (invoice_no,amount,payment_mode,ref_no,code,payment_date) values ('$invoice_no','$amount','$payment_mode','$ref_no','$code','$payment_date')";

                        $run_payment = mysqli_query($con, $insert_payment);
                // Atualiza o status do pedido do cliente para "Complete" no banco de dados.
                        $update_customer_order = "update customer_orders set order_status='$complete' where order_id='$update_id'";

                        $run_customer_order = mysqli_query($con, $update_customer_order);
                // Atualiza o status do pedido pendente para "Complete" no banco de dados.
                        $update_pending_order = "update pending_orders set order_status='$complete' where order_id='$update_id'";

                        $run_pending_order = mysqli_query($con, $update_pending_order);

                          // Se o pedido pendente for atualizado com sucesso, exibe uma mensagem de sucesso e redireciona para 'my_account.php?my_orders'.
                        if ($run_pending_order) {

                            echo "<script>alert('Seu pagamento foi recebido, o pedido será concluído dentro de 24 horas.')</script>";

                            echo "<script>window.open('my_account.php?my_orders','_self')</script>";
                        }
                    }



                    ?>


                </div>

            </div><!-- col-md-9 Ends -->

        </div>
    </div>


    <script src="../js/jquery.min.js"> </script>

    <script src="../js/bootstrap.min.js"></script>

    </body>

    </html>

<?php } ?>