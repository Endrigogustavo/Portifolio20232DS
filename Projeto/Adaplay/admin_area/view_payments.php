<?php


if (!isset($_SESSION['admin_email'])) {

    echo "<script>window.open('login.php','_self')</script>";
} else {


?>


    <div class="row"><!-- 1 linha começa -->

        <div class="col-lg-12"><!-- col-lg-12 Inicia -->

            <ol class="breadcrumb"><!-- breadcrumb Inicia -->

                <li class="active">

                    <i class="fa fa-dashboard"></i> Dashboard / Ver Pagamentos

                </li>

            </ol><!-- breadcrumb Termina -->

        </div><!-- col-lg-12 Termina -->

    </div><!-- Fim de 1 linha -->


    <div class="row"><!-- Início de 2 linhas -->

        <div class="col-lg-12"><!-- col-lg-12 Inicia -->

            <div class="panel panel-default"><!-- panel panel-default Inicia -->

                <div class="panel-heading"><!-- panel-heading Inicia -->

                    <h3 class="panel-title"><!-- panel-title Inicia -->

                        <i class="fa fa-money fa-fw"> </i> Ver Pagamentos
                    </h3><!-- panel-title Termina -->

                </div><!-- cabeçalho do painel Termina -->

                <div class="panel-body"><!-- panel-body Inicia -->

                    <div class="table-responsive"><!-- table-responsive Inicia -->

                        <table class="table table-hover table-bordered table-striped">
                            <!-- table table-hover table-bordered table-striped Starts -->

                            <thead><!-- thead Inicia -->

                                <tr>

                                    <th>#</th>
                                    <th>Fatura</th>
                                    <th>Quantia Paga</th>
                                    <th>Metodo de Pagamento</th>
                                    <th>Referencia #</th>
                                    <th>Código do Pagamento</th>
                                    <th>Data do Pagamento</th>
                                    <th>Ação</th>

                                </tr>

                            </thead><!-- thead Termina -->

                            <tbody><!-- tbody Inicia -->

                                <?php

                                $i = 0;

                                $get_payments = "select * from payments";

                                $run_payments = mysqli_query($con, $get_payments);

                                while ($row_payments = mysqli_fetch_array($run_payments)) {

                                    $payment_id = $row_payments['payment_id'];

                                    $invoice_no = $row_payments['invoice_no'];

                                    $amount = $row_payments['amount'];

                                    $payment_mode = $row_payments['payment_mode'];

                                    $ref_no = $row_payments['ref_no'];

                                    $code = $row_payments['code'];

                                    $payment_date = $row_payments['payment_date'];

                                    $i++;


                                ?>


                                    <tr>

                                        <td>
                                            <?php echo $i; ?>
                                        </td>

                                        <td bgcolor="yellow">
                                            <?php echo $invoice_no; ?>
                                        </td>

                                        <td>R$
                                            <?php echo $amount; ?>
                                        </td>

                                        <td>
                                            <?php echo $payment_mode; ?>
                                        </td>

                                        <td>
                                            <?php echo $ref_no; ?>
                                        </td>

                                        <td>
                                            <?php echo $code; ?>
                                        </td>

                                        <td>
                                            <?php echo $payment_date; ?>
                                        </td>

                                        <td>

                                            <a href="index.php?payment_delete=<?php echo $payment_id; ?>">

                                                <i class="fa fa-trash-o"></i> Deletar

                                            </a>

                                        </td>


                                    </tr>


                                <?php } ?>

                            </tbody><!-- tbody Termina -->

                        </table><!-- table table-hover table-bordered table-striped Ends -->

                    </div><!-- Fim responsivo à tabela -->

                </div><!-- painel-body Termina -->

            </div><!-- painel panel-default Termina -->

        </div><!-- col-lg-12 Termina -->

    </div><!-- Fim de 2 linhas -->


<?php } ?>