<?php



if (!isset($_SESSION['admin_email'])) {

    echo "<script>window.open('login.php','_self')</script>";
} else {

?>
    <div class="row"><!-- 1 linha começa -->

        <div class="col-lg-12"><!-- col-lg-12 Inicia -->

            <ol class="breadcrumb"><!-- breadcrumb Inicia -->

                <li class="active">

                    <i class="fa fa-dashboard"></i> Dashboard / Ver Categorias

                </li>

            </ol><!-- breadcrumb Termina -->


        </div><!-- col-lg-12 Termina -->

    </div><!-- Fim de 1 linha -->

    <div class="row"><!-- Início de 2 linhas -->

        <div class="col-lg-12"><!-- col-lg-12 Inicia -->

            <div class="panel panel-default"><!-- panel panel-default Inicia -->

                <div class="panel-heading"><!-- panel-heading Inicia -->

                    <h3 class="panel-title">

                        <i class="fa fa-money fa-fw"></i> Ver Categorias

                    </h3>
                </div><!-- cabeçalho do painel Termina -->

                <div class="panel-body"><!-- panel-body Inicia -->

                    <div class="table-responsive"><!-- table-responsive Inicia -->

                        <table class="table table-bordered table-hover table-striped"><!-- table-bordered table-hover table-striped Inicia -->

                            <thead><!-- thead Inicia -->

                                <tr>

                                    <th>#</th>
                                    <th>Nome da Categoria</th>
                                    <th>Deletar</th>
                                    <th>Editar</th>



                                </tr>

                            </thead><!-- thead Termina -->

                            <tbody><!-- tbody Inicia -->

                                <?php

                                $i = 0;

                                $get_cats = "select * from categories";

                                $run_cats = mysqli_query($con, $get_cats);

                                while ($row_cats = mysqli_fetch_array($run_cats)) {

                                    $cat_id = $row_cats['cat_id'];

                                    $cat_title = $row_cats['cat_title'];


                                    $i++;



                                ?>

                                    <tr>

                                        <td><?php echo $i; ?></td>

                                        <td><?php echo $cat_title; ?></td>


                                        <td>

                                            <a href="index.php?delete_cat=<?php echo $cat_id; ?>">

                                                <i class="fa fa-trash-o"></i> Deletar

                                            </a>

                                        </td>

                                        <td>

                                            <a href="index.php?edit_cat=<?php echo $cat_id; ?>">

                                                <i class="fa fa-pencil"></i> Editar

                                            </a>

                                        </td>

                                    </tr>


                                <?php } ?>

                            </tbody><!-- tbody Termina -->

                        </table><!-- table-bordered table-hover table-striped Ends -->


                    </div><!-- Fim responsivo à tabela -->

                </div><!-- painel-body Termina -->

            </div><!-- painel panel-default Termina -->

        </div><!-- col-lg-12 Termina -->

    </div><!-- Fim de 2 linhas -->

<?php } ?>