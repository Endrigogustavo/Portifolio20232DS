<?php



if (!isset($_SESSION['admin_email'])) {

    echo "<script>window.open('login.php','_self')</script>";
} else {




?>

    <div class="row"><!-- 1 linha começa -->

        <div class="col-lg-12"><!-- col-lg-12 Inicia -->

        <!-- <h1 class="page-header">Painel</h1> -->
            <ol class="breadcrumb"><!-- breadcrumb Inicia -->

                <li class="active">

                    <i class="fa fa-dashboard"></i>Painel

                </li>

            </ol><!-- breadcrumb Termina -->

        </div><!-- col-lg-12 Termina -->

    </div><!-- Fim de 1 linha -->


    <div class="row"><!-- Início de 2 linhas -->

        <div class="col-lg-3 col-md-6"><!-- col-lg-3 col-md-6 Inicia -->

            <div class="panel panel-primary"><!-- panel panel-primary Inicia -->

                <div class="panel-heading"><!-- cabeçalho do painel Inicia -->

                    <div class="row"><!-- linha do cabeçalho do painel começa -->

                        <div class="col-xs-3"><!-- col-xs-3 Inicia -->

                            <i class="fa fa-tasks fa-5x"> </i>

                        </div><!-- col-xs-3 Termina -->

                        <div class="col-xs-9 text-right"><!-- col-xs-9 text-right Inicia -->

                            <div class="huge"> <?php echo $count_products; ?> </div>

                            <div>Produtos</div>

                        </div><!-- col-xs-9 text-right Termina -->

                    </div><!-- fim da linha do cabeçalho do painel -->

                </div><!-- cabeçalho do painel Termina -->

                <a href="index.php?view_products">

                    <div class="panel-footer"><!-- panel-footer Inicia -->

                        <span class="pull-left">Ver detalhes </span>

                        <span class="pull-right"> <i class="fa fa-arrow-circle-right"></i> </span>

                        <div class="clearfix"></div>

                    </div><!-- panel-footer Termina -->

                </a>

            </div><!-- painel painel-primário Termina -->

        </div><!-- col-lg-3 col-md-6 Termina -->


        <div class="col-lg-3 col-md-6"><!-- col-lg-3 col-md-6 Inicia -->

            <div class="panel panel-green"><!-- panel panel-green Inicia -->

                <div class="panel-heading"><!-- cabeçalho do painel Inicia -->

                    <div class="row"><!-- linha do cabeçalho do painel começa -->

                        <div class="col-xs-3"><!-- col-xs-3 Inicia -->

                            <i class="fa fa-comments fa-5x"> </i>

                        </div><!-- col-xs-3 Termina -->

                        <div class="col-xs-9 text-right"><!-- col-xs-9 text-right Inicia -->

                            <div class="huge"> <?php echo $count_customers; ?> </div>

                            <div>Clientes</div>

                        </div><!-- col-xs-9 text-right Termina -->

                    </div><!-- fim da linha do cabeçalho do painel -->

                </div><!-- cabeçalho do painel Termina -->

                <a href="index.php?view_customers">

                    <div class="panel-footer"><!-- panel-footer Inicia -->

                        <span class="pull-left">Ver detalhes </span>

                        <span class="pull-right"> <i class="fa fa-arrow-circle-right"></i> </span>

                        <div class="clearfix"></div>

                    </div><!-- panel-footer Termina -->

                </a>

            </div><!-- painel painel-verde Termina -->

        </div><!-- col-lg-3 col-md-6 Termina -->


        <div class="col-lg-3 col-md-6"><!-- col-lg-3 col-md-6 Inicia -->

            <div class="panel panel-yellow"><!-- painel painel-amarelo Inicia -->

                <div class="panel-heading"><!-- cabeçalho do painel Inicia -->

                    <div class="row"><!-- linha do cabeçalho do painel começa -->

                        <div class="col-xs-3"><!-- col-xs-3 Inicia -->

                            <i class="fa fa-shopping-cart fa-5x"> </i>

                        </div><!-- col-xs-3 Termina -->

                        <div class="col-xs-9 text-right"><!-- col-xs-9 text-right Inicia -->

                            <div class="huge"> <?php echo $count_p_categories; ?> </div>

                            <div>Categoria de Produtos</div>

                        </div><!-- col-xs-9 text-right Termina -->

                    </div><!-- fim da linha do cabeçalho do painel -->

                </div><!-- cabeçalho do painel Termina -->

                <a href="index.php?view_p_cats">

                    <div class="panel-footer"><!-- panel-footer Inicia -->

                        <span class="pull-left"> Ver detalhes</span>

                        <span class="pull-right"> <i class="fa fa-arrow-circle-right"></i> </span>

                        <div class="clearfix"></div>

                    </div><!-- panel-footer Termina -->

                </a>

            </div><!-- painel painel-amarelo Termina -->

        </div><!-- col-lg-3 col-md-6 Termina -->


        <div class="col-lg-3 col-md-6"><!-- col-lg-3 col-md-6 Inicia -->

            <div class="panel panel-red"><!-- panel panel-red Inicia -->

                <div class="panel-heading"><!-- cabeçalho do painel Inicia -->

                    <div class="row"><!-- linha do cabeçalho do painel começa -->

                        <div class="col-xs-3"><!-- col-xs-3 Inicia -->

                            <i class="fa fa-support fa-5x"> </i>

                        </div><!-- col-xs-3 Termina -->

                        <div class="col-xs-9 text-right"><!-- col-xs-9 text-right Starts -->

                            <div class="huge"> <?php echo $count_total_orders; ?> </div>

                            <div>Pedidos</div>

                        </div><!-- col-xs-9 text-right Termina -->

                    </div><!-- fim da linha do cabeçalho do painel -->

                </div><!-- cabeçalho do painel Termina -->

                <a href="index.php?view_orders">

                    <div class="panel-footer"><!-- panel-footer Inicia -->
                        <span class="pull-left"> Ver detalhes</span>

                        <span class="pull-right"> <i class="fa fa-arrow-circle-right"></i> </span>

                        <div class="clearfix"></div>

                    </div><!-- panel-footer Termina -->

                </a>

            </div><!-- painel painel-vermelho Extremidades -->

        </div><!-- col-lg-3 col-md-6 Termina -->


    </div><!-- Fim de 2 linhas -->
    <div class="row">
        <div class="col-lg-3 col-md-6"><!-- col-lg-3 col-md-6 Inicia -->

            <div class="panel panel-success"><!-- panel panel-red Inicia -->

                <div class="panel-heading"><!-- cabeçalho do painel Inicia -->

                    <div class="row"><!-- linha do cabeçalho do painel começa -->

                        <div class="col-xs-3"><!-- col-xs-3 Inicia -->

                            <i class="fa fa-dollar fa-5x"> </i>

                        </div><!-- col-xs-3 Termina -->

                        <div class="col-xs-9 text-right"><!-- col-xs-9 text-right Inicia -->

                            <div class="huge"> <?php echo $count_total_earnings ?> </div>

                            <div>Ganhos</div>

                        </div><!-- col-xs-9 text-right Termina -->

                    </div><!-- fim da linha do cabeçalho do painel -->

                </div><!-- cabeçalho do painel Termina -->

                <a href="index.php?view_orders">

                    <div class="panel-footer"><!-- panel-footer Inicia -->

                        <span class="pull-left"> Ver detalhes </span>

                        <span class="pull-right"> <i class="fa fa-arrow-circle-right"></i> </span>

                        <div class="clearfix"></div>

                    </div><!-- panel-footer Termina -->

                </a>

            </div><!-- painel painel-vermelho Extremidades -->

        </div><!-- col-lg-3 col-md-6 Termina -->


        <div class="col-lg-3 col-md-6"><!-- col-lg-3 col-md-6 Inicia -->

            <div class="panel panel-warning"><!-- panel panel-red Inicia -->

                <div class="panel-heading"><!-- cabeçalho do painel Inicia -->

                    <div class="row"><!-- linha do cabeçalho do painel começa -->

                        <div class="col-xs-3"><!-- col-xs-3 Inicia -->

                            <i class="fa fa-spinner fa-5x"> </i>

                        </div><!-- col-xs-3 Termina -->

                        <div class="col-xs-9 text-right"><!-- col-xs-9 text-right Inicia -->

                            <div class="huge"> <?php echo $count_pending_orders ?> </div>

                            <div>Ordens pendentes</div>

                        </div><!-- col-xs-9 text-right Termina -->

                    </div><!-- fim da linha do cabeçalho do painel -->

                </div><!-- cabeçalho do painel Termina -->

                <a href="index.php?view_orders">

                    <div class="panel-footer"><!-- panel-footer Inicia -->

                        <span class="pull-left"> Visualizar detalhes </span>

                        <span class="pull-right"> <i class="fa fa-arrow-circle-right"></i> </span>

                        <div class="clearfix"></div>

                    </div><!-- panel-footer Termina -->

                </a>

            </div><!-- painel painel-vermelho Extremidades -->

        </div><!-- col-lg-3 col-md-6 Termina -->



        <div class="col-lg-3 col-md-6"><!-- col-lg-3 col-md-6 Inicia -->

            <div class="panel panel-info"><!-- panel panel-red Inicia -->

                <div class="panel-heading"><!-- cabeçalho do painel Inicia -->

                    <div class="row"><!-- linha do cabeçalho do painel começa -->

                        <div class="col-xs-3"><!-- col-xs-3 Inicia -->

                            <i class="fa fa-check fa-5x"> </i>

                        </div><!-- col-xs-3 Termina -->

                        <div class="col-xs-9 text-right"><!-- col-xs-9 text-right Inicia -->

                            <div class="huge"> <?php echo $count_completed_orders ?> </div>

                            <div>Pedidos concluídos</div>

                        </div><!-- col-xs-9 text-right Termina -->

                    </div><!-- fim da linha do cabeçalho do painel -->

                </div><!-- cabeçalho do painel Termina -->

                <a href="index.php?view_orders">

                    <div class="panel-footer"><!-- panel-footer Inicia -->

                        <span class="pull-left"> Ver detalhes</span>

                        <span class="pull-right"> <i class="fa fa-arrow-circle-right"></i> </span>

                        <div class="clearfix"></div>

                    </div><!-- panel-footer Termina -->

                </a>

            </div><!-- painel painel-vermelho Extremidades -->

        </div><!-- col-lg-3 col-md-6 Ends -->



        <div class="col-lg-3 col-md-6"><!-- col-lg-3 col-md-6 Inicia -->

            <div class="panel panel-danger"><!-- col-lg-3 col-md-6 Inicia -->

                <div class="panel-heading"><!-- cabeçalho do painel Inicia -->
                    <div class="row"><!-- linha do cabeçalho do painel começa -->

                        <div class="col-xs-3"><!-- col-xs-3 Inicia -->

                            <i class="fa fa-percent fa-5x"> </i>

                        </div><!-- col-xs-3 Termina -->

                        <div class="col-xs-9 text-right"><!-- col-xs-9 text-right Inicia -->

                            <div class="huge"> <?php echo $count_coupons; ?> </div>

                            <div>Total de cupons</div>

                        </div><!-- col-xs-9 text-right Termina -->

                    </div><!-- fim da linha do cabeçalho do painel -->

                </div><!-- cabeçalho do painel Termina -->

                <a href="index.php?view_orders">

                    <div class="panel-footer"><!-- panel-footer Inicia -->

                        <span class="pull-left">Ver detalhes </span>

                        <span class="pull-right"> <i class="fa fa-arrow-circle-right"></i> </span>

                        <div class="clearfix"></div>

                    </div><!-- panel-footer Termina -->

                </a>

            </div><!-- painel painel-vermelho Extremidades -->

        </div><!-- col-lg-3 col-md-6 Termina -->
    </div>

    <div class="row"><!-- Início de 3 linhas -->

        <div class="col-lg-12"><!-- col-lg-8 Inicia -->

            <div class="panel panel-primary"><!-- panel panel-primary Inicia -->

                <div class="panel-heading"><!-- cabeçalho do painel Inicia -->

                    <h3 class="panel-title"><!-- panel-title Inicia -->

                        <i class="fa fa-money fa-fw"></i> Novos Pedidos

                    </h3><!-- panel-title Termina -->

                </div><!-- panel-heading Ends -->

                <div class="panel-body"><!-- panel-body Starts -->

                    <div class="table-responsive"><!-- Início responsivo à tabela -->

                        <table class="table table-bordered table-hover table-striped"><!-- table table-bordered table-hover table-striped Inicia -->

                            <thead><!-- thead Inicia -->

                                <tr>
                                    <th>Pedido nº</th>
                                    <th>Cliente</th>
                                    <th>Número da fatura</th>
                                    <th>ID do produto</th>
                                    <th>Quantidade</th>
                                    <th>Tamanho</th>
                                    <th>Status</th>


                                </tr>

                            </thead><!-- thead Termina -->

                            <tbody><!-- tbody Inicia -->

                                <?php

                                $i = 0;

                                $get_order = "select * from pending_orders order by 1 DESC LIMIT 0,5";
                                $run_order = mysqli_query($con, $get_order);

                                while ($row_order = mysqli_fetch_array($run_order)) {


                                    $order_id = $row_order['order_id'];

                                    $c_id = $row_order['customer_id'];

                                    $invoice_no = $row_order['invoice_no'];

                                    $product_id = $row_order['product_id'];

                                    $qty = $row_order['qty'];

                                    $size = $row_order['size'];

                                    $order_status = $row_order['order_status'];


                                    $i++;

                                ?>

                                    <tr>

                                        <td><?php echo $i; ?></td>

                                        <td>
                                            <?php

                                            $get_customer = "select * from customers where customer_id='$c_id'";
                                            $run_customer = mysqli_query($con, $get_customer);
                                            $row_customer = mysqli_fetch_array($run_customer);
                                            $customer_email = $row_customer['customer_email'];
                                            echo $customer_email;
                                            ?>
                                        </td>

                                        <td><?php echo $invoice_no; ?></td>
                                        <td><?php echo $product_id; ?></td>
                                        <td><?php echo $qty; ?></td>
                                        <td><?php echo $size; ?></td>
                                        <td>
                                            <?php
                                            if ($order_status == 'pending') {

                                                echo $order_status = 'pending';
                                            } else {

                                                echo $order_status = 'Complete';
                                            }

                                            ?>
                                        </td>

                                    </tr>

                                <?php } ?>

                            </tbody><!-- tbody Termina -->



                        </table><!-- table table-bordered table-hover table-striped Ends -->

                    </div><!-- extremidades responsivas à tabela -->

                    <div class="text-right"><!-- text-right Inicia -->

                        <a href="index.php?view_orders">

                          Ver todos os pedidos <i class="fa fa-arrow-circle-right"></i>

                        </a>

                    </div><!-- text-right Termina -->


                </div><!-- panel-body Termina -->
            </div><!-- painel painel-primário Termina -->

        </div><!-- col-lg-8 Termina -->

        <div class="col-md-4"><!-- col-md-4 Inicia -->

            <div class="panel"><!-- painel Inicia -->



            </div><!-- painel Termina -->

        </div><!-- col-md-4 Termina -->

    </div><!-- 3 row Ends -->

<?php } ?>