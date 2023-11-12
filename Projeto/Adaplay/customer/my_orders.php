<center>

    <h1>Meus Pagamentos</h1>

    <p class="lead"> Todos os seus pagamentos em um só lugar.</p>

    <p class="text-muted">
        Se você tiver alguma dúvida, sinta-se à vontade para entrar em <a href="../contact.php">contato</a> conosco, nosso centro de atendimento ao cliente está trabalhando para você 24 horas por dia, 7 dias por semana.
    </p>

</center>

<hr>

<div class="table-responsive">
    <?php
    $customer_session = $_SESSION['customer_email'];

    // Obtém informações do cliente com base no endereço de email da sessão.
    $get_customer = "select * from customers where customer_email='$customer_session'";
    $run_customer = mysqli_query($con, $get_customer);
    $row_customer = mysqli_fetch_array($run_customer);
    $customer_id = $row_customer['customer_id'];

    // Obtém os pedidos do cliente com base no seu ID.
    $get_orders = "select * from customer_orders where customer_id='$customer_id'";
    $run_orders = mysqli_query($con, $get_orders);

    if (mysqli_num_rows($run_orders) > 0) {
        // Exibe a tabela apenas se houver pedidos.
    ?>
        <table class="table table-bordered table-hover">
            <tbody>
                <?php
                $i = 0;
                // Loop para exibir os dados dos pedidos.
                while ($row_orders = mysqli_fetch_array($run_orders)) {
                    $order_id = $row_orders['order_id'];
                    $due_amount = $row_orders['due_amount'];
                    $invoice_no = $row_orders['invoice_no'];
                    $qty = $row_orders['qty'];
                    $size = $row_orders['size'];
                    $order_date = substr($row_orders['order_date'], 0, 11);
                    $order_status = $row_orders['order_status'];
                    $i++;

                    // Condição para determinar o status do pedido.
                    if ($order_status == 'Pago') {
                        $order_status = "<b style='color:green;'>Pago</b>";
                    } else {
                        $order_status = "<b style='color:red;'>Pendente</b>";
                    }
                ?>
                    <tr>
                        <!-- Tabela -->
                        <th><?php echo $i; ?></th>
                        <td>R$<?php echo $due_amount; ?></td>
                        <td><?php echo $invoice_no; ?></td>
                        <td><?php echo $qty; ?></td>
                        <td><?php echo $size; ?></td>
                        <td><?php echo $order_date; ?></td>
                        <td><?php echo $order_status; ?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    <?php
    } else {
        // Exibe uma mensagem se não houver pedidos.
        echo "<p class='text-center'>Você não possui pagamentos registrados.</p>";
    }
    ?>
</div>