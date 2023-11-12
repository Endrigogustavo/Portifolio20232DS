<?php


if (!isset($_SESSION['admin_email'])) {

    echo "<script>window.open('login.php','_self')</script>";
} else {


    ?>

    <div class="row"><!-- 1 linha começa -->

        <div class="col-lg-12"><!-- col-lg-12 Inicia -->

            <ol class="breadcrumb"><!-- breadcrumb Inicia --->

            <li class="active">

                <i class="fa fa-dashboard"></i> Dashboard / Ver Pedidos

            </li>

        </ol><!-- breadcrumb Termina --->

    </div><!-- col-lg-12 Termina -->

    </div><!-- Fim de 1 linha -->


    <div class="row"><!-- Início de 2 linhas -->

        <div class="col-lg-12"><!-- col-lg-12 Inicia -->

            <div class="panel panel-default"><!-- panel panel-default Inicia -->

                <div class="panel-heading"><!-- panel-heading Inicia -->
                    <h3 class="panel-title"><!-- panel-title Inicia -->

                        <i class="fa fa-money fa-fw"></i> Ver Pedidos

                    </h3><!-- panel-title Termina -->

                </div><!-- cabeçalho do painel Termina -->

                <div class="panel-body"><!-- panel-body Inicia -->

                    <div class="table-responsive"><!-- table-responsive Inicia -->

                        <table class="table table-bordered table-hover table-striped">
                            <!-- table table-bordered table-hover table-striped Starts -->

                            <thead><!-- thead Starts -->

                                <tr>

                                    <th>#</th>
                                    <th>Cliente</th>
                                    <th>Fatura</th>
                                    <th>Produto</th>
                                    <th>Quantidade</th>
                                    <th>Tamanho</th>
                                    <th>Dia do Pedido</th>
                                    <th>Preço Total</th>
                                    <th>Status</th>
                                    <th>Acão</th>


                                </tr>

                            </thead><!-- thead Termina -->

                            <tbody><!-- tbody Inicia -->

                                <?php

                                $i = 0;

                                $get_orders = "select * from pending_orders";

                                $run_orders = mysqli_query($con, $get_orders);

                                while ($row_orders = mysqli_fetch_array($run_orders)) {

                                    $order_id = $row_orders['order_id'];

                                    $c_id = $row_orders['customer_id'];

                                    $invoice_no = $row_orders['invoice_no'];

                                    $product_id = $row_orders['product_id'];

                                    $qty = $row_orders['qty'];

                                    $size = $row_orders['size'];

                                    $order_status = $row_orders['order_status'];

                                    $get_products = "select * from products where product_id='$product_id'";

                                    $run_products = mysqli_query($con, $get_products);

                                    $row_products = mysqli_fetch_array($run_products);

                                    $product_title = $row_products['product_title'];

                                    $i++;

                                    ?>

                                    <tr>

                                        <td>
                                            <?php echo $i; ?>
                                        </td>

                                        <td>
                                            <?php

                                            $get_customer = "select * from customers where customer_id='$c_id'";

                                            $run_customer = mysqli_query($con, $get_customer);

                                            $row_customer = mysqli_fetch_array($run_customer);

                                            $customer_email = $row_customer['customer_email'];

                                            echo $customer_email;

                                            ?>
                                        </td>

                                        <td bgcolor="orange">
                                            <?php echo $invoice_no; ?>
                                        </td>

                                        <td>
                                            <?php echo $product_title; ?>
                                        </td>

                                        <td>
                                            <?php echo $qty; ?>
                                        </td>

                                        <td>
                                            <?php echo $size; ?>
                                        </td>

                                        <td>
                                            <?php

                                            $get_customer_order = "select * from customer_orders where order_id='$order_id'";

                                            $run_customer_order = mysqli_query($con, $get_customer_order);

                                            $row_customer_order = mysqli_fetch_array($run_customer_order);

                                            $order_date = $row_customer_order['order_date'];

                                            $due_amount = $row_customer_order['due_amount'];

                                            echo $order_date;

                                            ?>
                                        </td>

                                        <td>R$
                                            <?php echo $due_amount; ?>
                                        </td>

                                        <td>
                                            <?php

                                            if ($order_status == 'Pago') {

                                                echo $order_status = '<div style="color:green;">Pago</div>';
                                            } else {

                                                echo $order_status = 'Pendente';
                                            }


                                            ?>
                                        </td>

                                        <td>

                                            <a href="index.php?order_delete=<?php echo $order_id; ?>">

                                                <i class="fa fa-trash-o"></i> Deletar

                                            </a>

                                        </td>


                                    </tr>

                                <?php } ?>

                            </tbody><!-- tbody Termina -->

                        </table><!-- table table-bordered table-hover table-striped Ends -->

                    </div><!-- Fim responsivo à tabela -->

                </div><!-- painel-body Termina -->

            </div><!-- painel panel-default Termina -->

        </div><!-- col-lg-12 Termina -->

    </div><!-- Fim de 2 linhas -->

<?php } ?>