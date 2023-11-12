<?php


if (!isset($_SESSION['admin_email'])) {

    echo "<script>window.open('login.php','_self')</script>";
} else {


?>

    <div class="row"><!-- 1 linha começa -->

        <div class="col-lg-12"><!-- col-lg-12 Inicia -->

            <ol class="breadcrumb"><!-- breadcrumb Inicia -->

                <li class="active">

                    <i class="fa fa-dashboard"></i> Dashboard / Ver Cupons

                </li>

            </ol><!-- breadcrumb Termina -->

        </div><!-- col-lg-12 Termina -->

    </div><!-- Fim de 1 linha -->

    <div class="row"><!-- Início de 2 linhas -->

        <div class="col-lg-12"><!-- col-lg-12 Inicia -->

            <div class="panel panel-default"><!-- panel panel-default Inicia -->

                <div class="panel-heading"><!-- panel-heading Inicia -->

                    <h3 class="panel-title"><!-- panel-title Inicia -->

                        <i class="fa fa-money fa-fw"></i> Ver Cupons

                    </h3><!-- panel-title Termina -->

                </div><!-- cabeçalho do painel Termina -->

                <div class="panel-body"><!-- panel-body Inicia -->

                    <div class="table-responsive"><!-- Início responsivo à tabela -->

                        <table class="table table-bordered table-hover table-striped">
                            <!-- table table-bordered table-hover table-striped Inicia -->

                            <thead><!-- thead Inicia -->

                                <tr>

                                    <th>#</th>
                                    <th>Título </th>
                                    <th>Produto </th>
                                    <th>Preço do Cupom</th>
                                    <th>Código </th>
                                    <th>Limite </th>
                                    <th>Utilizado </th>
                                    <th>Deletar </th>
                                    <th>Editar </th>

                                </tr>

                            </thead><!-- thead Termina -->
                            <tbody><!-- tbody Inicia -->
                                <?php

                                $i = 0;

                                $get_coupons = "select * from coupons";

                                $run_coupons = mysqli_query($con, $get_coupons);

                                while ($row_coupons = mysqli_fetch_array($run_coupons)) {

                                    $coupon_id = $row_coupons['coupon_id'];

                                    $product_id = $row_coupons['product_id'];

                                    $coupon_title = $row_coupons['coupon_title'];

                                    $coupon_price = $row_coupons['coupon_price'];

                                    $coupon_code = $row_coupons['coupon_code'];

                                    $coupon_limit = $row_coupons['coupon_limit'];

                                    $coupon_used = $row_coupons['coupon_used'];


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
                                            <?php echo $coupon_title; ?>
                                        </td>

                                        <td>
                                            <?php echo $product_title; ?>
                                        </td>

                                        <td>
                                            <?php echo "R$$coupon_price"; ?>
                                        </td>

                                        <td>
                                            <?php echo $coupon_code; ?>
                                        </td>

                                        <td>
                                            <?php echo $coupon_limit; ?>
                                        </td>

                                        <td>
                                            <?php echo $coupon_used; ?>
                                        </td>

                                        <td>

                                            <a href="index.php?delete_coupon=<?php echo $coupon_id; ?>">

                                                <i class="fa fa-trash-o"></i> Deletar

                                            </a>

                                        </td>

                                        <td>

                                            <a href="index.php?edit_coupon=<?php echo $coupon_id; ?>">

                                                <i class="fa fa-pencil"></i> Editar

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