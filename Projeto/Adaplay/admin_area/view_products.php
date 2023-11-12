<?php



if (!isset($_SESSION['admin_email'])) {

    echo "<script>window.open('login.php','_self')</script>";
} else {

?>

    <div class="row"><!-- 1 linha começa -->

        <div class="col-lg-12"><!-- col-lg-12 Inicia -->

            <ol class="breadcrumb"><!-- breadcrumb Inicia -->
                <li class="active">

                    <i class="fa fa-dashboard"></i> Dashboard / Ver Produtos

                </li>


            </ol><!-- breadcrumb Termina -->

        </div><!-- col-lg-12 Termina -->

    </div><!-- Fim de 1 linha -->

    <div class="row"><!-- Início de 2 linhas -->
        <div class="col-lg-12"><!-- col-lg-12 Inicia -->

            <div class="panel panel-default"><!-- panel panel-default Inicia -->

                <div class="panel-heading"><!-- panel-heading Inicia -->

                    <h3 class="panel-title"><!-- panel-title Inicia -->

                        <i class="fa fa-money fa-fw"></i> Ver Produtos

                    </h3><!-- panel-title Termina -->


                </div><!-- cabeçalho do painel Termina -->

                <div class="panel-body"><!-- panel-body Inicia -->

                    <div class="table-responsive"><!-- table-responsive Inicia -->

                        <table class="table table-bordered table-hover table-striped">
                            <!-- table table-bordered table-hover table-striped Inicia -->

                            <thead>

                                <tr>
                                    <th>#</th>
                                    <th>Título</th>
                                    <th>Imagem</th>
                                    <th>Preço</th>
                                    <th>Vendido</th>
                                    <th>Palavras-Chave</th>
                                    <th>Data</th>
                                    <th>Deletar</th>
                                    <th>Editar</th>



                                </tr>

                            </thead>

                            <tbody>

                                <?php

                                $i = 0;

                                $get_pro = "select * from products where status='product'";

                                $run_pro = mysqli_query($con, $get_pro);

                                while ($row_pro = mysqli_fetch_array($run_pro)) {

                                    $pro_id = $row_pro['product_id'];

                                    $pro_title = $row_pro['product_title'];

                                    $pro_image = $row_pro['product_img1'];

                                    $pro_price = $row_pro['product_price'];

                                    $pro_keywords = $row_pro['product_keywords'];

                                    $pro_date = $row_pro['date'];

                                    $i++;

                                ?>

                                    <tr>

                                        <td>
                                            <?php echo $i; ?>
                                        </td>

                                        <td>
                                            <?php echo $pro_title; ?>
                                        </td>

                                        <td><img src="product_images/<?php echo $pro_image; ?>" width="60" height="60"></td>

                                        <td>R$
                                            <?php echo $pro_price; ?>
                                        </td>

                                        <td>
                                            <?php

                                            $get_sold = "select * from pending_orders where product_id='$pro_id'";
                                            $run_sold = mysqli_query($con, $get_sold);
                                            $count = mysqli_num_rows($run_sold);
                                            echo $count;
                                            ?>
                                        </td>

                                        <td>
                                            <?php echo $pro_keywords; ?>
                                        </td>

                                        <td>
                                            <?php echo $pro_date; ?>
                                        </td>

                                        <td>

                                            <a href="index.php?delete_product=<?php echo $pro_id; ?>">

                                                <i class="fa fa-trash-o"> </i> Deletar

                                            </a>

                                        </td>

                                        <td>

                                            <a href="index.php?edit_product=<?php echo $pro_id; ?>">

                                                <i class="fa fa-pencil"> </i> Editar

                                            </a>

                                        </td>

                                    </tr>

                                <?php } ?>


                            </tbody>


                        </table><!-- table table-bordered table-hover table-striped Ends -->

                    </div><!-- Fim responsivo à tabela -->

                </div><!-- painel-body Termina -->

            </div><!-- painel panel-default Termina -->

        </div><!-- col-lg-12 Termina -->

    </div><!-- Fim de 2 linhas -->



<?php } ?>