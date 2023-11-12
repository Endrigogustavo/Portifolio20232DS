<?php

if (!isset($_SESSION['admin_email'])) {

    echo "<script>window.open('login.php','_self')</script>";
} else {


?>


    <div class="row"><!-- 1 linha começa -->

        <div class="col-lg-12"><!-- col-lg-12 Inicia -->

            <ol class="breadcrumb"><!-- breadcrumb Inicia -->

                <li class="active">

                    <i class="fa fa-dashboard"></i> Dashboard / Ver Clientes

                </li>
            </ol><!-- breadcrumb Termina -->

        </div><!-- col-lg-12 Termina -->

    </div><!-- Fim de 1 linha -->

    <div class="row"><!-- Início de 2 linhas -->

        <div class="col-lg-12"><!-- col-lg-12 Inicia -->

            <div class="panel panel-default"><!-- panel panel-default Inicia -->

                <div class="panel-heading"><!-- panel-heading Inicia -->

                    <h3 class="panel-title">
                        <!-- panel-title Inicia -->

                        <i class="fa fa-money fa-fw"></i> Ver Clientes

                    </h3><!-- panel-title Termina -->

                </div><!-- cabeçalho do painel Termina -->


                <div class="panel-body"><!-- panel-body Inicia -->

                    <div class="table-responsive"><!-- table-responsive Inicia -->

                        <table class="table table-bordered table-hover table-striped">
                            <!-- table table-bordered table-hover table-striped Inicia -->

                            <thead><!-- thead Inicia -->

                                <tr>

                                    <th>#</th>
                                    <th>Nome</th>
                                    <th>Email</th>
                                    <th>Imagem</th>
                                    <th>País</th>
                                    <th>Cidade</th>
                                    <th>Número de Telefone</th>
                                    <th>Deletar</th>


                                </tr>

                            </thead><!-- thead Termina -->


                            <tbody><!-- tbody Inicia -->

                                <?php

                                $i = 0;

                                $get_c = "select * from customers";

                                $run_c = mysqli_query($con, $get_c);

                                while ($row_c = mysqli_fetch_array($run_c)) {

                                    $c_id = $row_c['customer_id'];

                                    $c_name = $row_c['customer_name'];

                                    $c_email = $row_c['customer_email'];

                                    $c_image = $row_c['customer_image'];

                                    $c_country = $row_c['customer_country'];

                                    $c_city = $row_c['customer_city'];

                                    $c_contact = $row_c['customer_contact'];

                                    $i++;




                                ?>

                                    <tr>

                                        <td><?php echo $i; ?></td>

                                        <td><?php echo $c_name; ?></td>

                                        <td><?php echo $c_email; ?></td>

                                        <td><img src="../customer/customer_images/<?php echo $c_image; ?>" width="60" height="60"></td>

                                        <td><?php echo $c_country; ?></td>

                                        <td><?php echo $c_city; ?></td>

                                        <td><?php echo $c_contact; ?></td>

                                        <td>

                                            <a href="index.php?customer_delete=<?php echo $c_id; ?>">

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