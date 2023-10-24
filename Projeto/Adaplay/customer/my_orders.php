<center>

    <h1>Meus Pagamentos</h1>

    <p class="lead"> Todos os seus pagamentos em um só lugar.</p>

    <p class="text-muted">

    Se você tiver alguma dúvida, sinta-se à vontade para entrar em  <a href="../contact.php"> contato  </a> conosco, nosso centro de atendimento ao cliente está trabalhando para você 24 horas por dia, 7 dias por semana.


    </p>


</center>

<hr>

<div class="table-responsive">

    <table class="table table-bordered table-hover">



        <tbody>

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
                if ($order_status == 'pending') {

                    $order_status = "<b style='color:red;'>Unpaid</b>";
                } else {

                    $order_status = "<b style='color:green;'>Paid</b>";
                }

            ?>

                <tr>
                    <!-- Tabela -->
                    <th><?php echo $i; ?></th>

                    <td>$<?php echo $due_amount; ?></td>

                    <td><?php echo $invoice_no; ?></td>

                    <td><?php echo $qty; ?></td>

                    <td><?php echo $size; ?></td>

                    <td><?php echo $order_date; ?></td>

                    <td><?php echo $order_status; ?></td>

                    <td>
                        <a href="confirm.php?order_id=<?php echo $order_id; ?>" target="blank" class="btn btn-success btn-xs">Confirme se pago </a>
                        <!-- Um botão que permite confirmar se o pagamento foi feito. Ele aponta para "confirm.php" com o ID do pedido na URL. -->
                    </td>


                </tr>

            <?php } ?>

        </tbody>


    </table>

</div>