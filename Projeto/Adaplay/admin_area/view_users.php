<?php



if (!isset($_SESSION['admin_email'])) {

    echo "<script>window.open('login.php','_self')</script>";
} else {

?>
    <div class="row"><!-- 1 linha começa -->

        <div class="col-lg-12"><!-- col-lg-12 Inicia -->

            <ol class="breadcrumb"><!-- breadcrumb Inicia -->

                <li class="active">

                    <i class="fa fa-dashboard"></i> Dashboard / Ver Usuários

                </li>

            </ol><!-- breadcrumb Termina -->


        </div><!-- col-lg-12 Termina -->

    </div><!-- Fim de 1 linha -->


    <div class="row"><!-- Início de 2 linhas -->

        <div class="col-lg-12"><!-- col-lg-12 Inicia -->

            <div class="panel panel-default"><!-- panel panel-default Inicia -->

                <div class="panel-heading"><!-- panel-heading Inicia -->

                    <h3 class="panel-title"><!-- panel-title Inicia -->

                        <i class="fa fa-money fa-fw"></i> Ver Usuários

                    </h3><!-- panel-title Termina -->


                </div><!-- cabeçalho do painel Termina -->

                <div class="panel-body"><!-- panel-body Inicia -->

                    <div class="table-responsive"><!-- table-responsive Inicia -->

                        <table class="table table-bordered table-hover table-striped">
                            <!-- table table-bordered table-hover table-striped Inicia -->

                            <thead><!-- thead Inicia -->

                                <tr>

                                    <th>Nome do Usuário</th>

                                    <th>Email</th>

                                    <th>Imagem</th>

                                    <th>País</th>

                                    <th>Emprego</th>

                                    <th>Deletar</th>


                                </tr>

                            </thead><!-- thead Termina -->

                            <tbody><!-- tbody Inicia -->

                                <?php

                                $get_admin = "select * from admins";

                                $run_admin = mysqli_query($con, $get_admin);

                                while ($row_admin = mysqli_fetch_array($run_admin)) {

                                    $admin_id = $row_admin['admin_id'];

                                    $admin_name = $row_admin['admin_name'];

                                    $admin_email = $row_admin['admin_email'];

                                    $admin_image = $row_admin['admin_image'];

                                    $admin_country = $row_admin['admin_country'];

                                    $admin_job = $row_admin['admin_job'];





                                ?>

                                    <tr>

                                        <td>
                                            <?php echo $admin_name; ?>
                                        </td>

                                        <td>
                                            <?php echo $admin_email; ?>
                                        </td>

                                        <td><img src="admin_images/<?php echo $admin_image; ?>" width="60" height="60"></td>

                                        <td>
                                            <?php echo $admin_country; ?>
                                        </td>

                                        <td>
                                            <?php echo $admin_job; ?>
                                        </td>

                                        <td>

                                            <a href="index.php?user_delete=<?php echo $admin_id; ?>">

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