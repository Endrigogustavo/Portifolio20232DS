<?php


if (!isset($_SESSION['admin_email'])) {

    echo "<script>window.open('login.php','_self')</script>";
} else {


?>
    <div class="row"><!-- Início da 1ª linha -->

        <div class="col-lg-12"><!-- Início da coluna-lg-12 -->

            <ol class="breadcrumb"><!-- Início da trilha -->

                <li class="active">

                    <i class="fa fa-dashboard"> </i> Painel / Inserir Cupons

                </li>

            </ol><!-- Fim da trilha -->

        </div><!-- Fim da coluna-lg-12 -->

    </div><!-- Fim da 1ª linha -->

    <div class="row"><!-- Início da 2ª linha -->

        <div class="col-lg-12"><!-- Início da coluna-lg-12 -->

            <div class="panel panel-default"><!-- Início do painel padrão -->

                <div class="panel-heading"><!-- Início do cabeçalho do painel -->

                    <h3 class="panel-title"><!-- Início do título do painel -->

                        <i class="fa fa-money fa-fw"> </i> Inserir Cupons

                    </h3><!-- Fim do título do painel -->

                </div><!-- Fim do cabeçalho do painel -->

                <div class="panel-body"><!-- Início do corpo do painel -->

                    <form class="form-horizontal" method="post" action=""><!-- Início do formulário horizontal -->

                        <div class="form-group"><!-- Início do grupo de formulário -->

                            <label class="col-md-3 control-label"> Título do Cupom </label>

                            <div class="col-md-6">

                                <input type="text" name="coupon_title" class="form-control">

                            </div>

                        </div><!-- Fim do grupo de formulário -->

                        <div class="form-group"><!-- Início do grupo de formulário -->

                            <label class="col-md-3 control-label"> Preço do Cupom </label>

                            <div class="col-md-6">

                                <input type="text" name="coupon_price" class="form-control">

                            </div>

                        </div><!-- Fim do grupo de formulário -->

                        <div class="form-group"><!-- Início do grupo de formulário -->

                            <label class="col-md-3 control-label"> Código do Cupom </label>

                            <div class="col-md-6">

                                <input type="text" name="coupon_code" class="form-control">

                            </div>

                        </div><!-- Fim do grupo de formulário -->

                        <div class="form-group"><!-- Início do grupo de formulário -->

                            <label class="col-md-3 control-label"> Limite do Cupom </label>

                            <div class="col-md-6">

                                <input type="number" name="coupon_limit" value="1" class="form-control">

                            </div>

                        </div><!-- Fim do grupo de formulário -->

                        <div class="form-group"><!-- Início do grupo de formulário -->

                            <label class="col-md-3 control-label"> Qual Produto Receberá o Cupom? </label>

                            <div class="col-md-6">

                                <select name="product_id" class="form-control">

                                    <option> Selecione o Produto </option>

                                    <?php

                                    $get_p = "select * from products where status='product'";

                                    $run_p = mysqli_query($con, $get_p);

                                    while ($row_p = mysqli_fetch_array($run_p)) {

                                        $p_id = $row_p['product_id'];

                                        $p_title = $row_p['product_title'];

                                        echo "<option value='$p_id'> $p_title </option>";
                                    }

                                    ?>

                                </select>

                            </div>

                        </div><!-- Fim do grupo de formulário -->

                        <div class="form-group"><!-- Início do grupo de formulário -->

                            <label class="col-md-3 control-label"> </label>

                            <div class="col-md-6">

                                <input type="submit" name="submit" class="btn btn-primary form-control" value=" Inserir Cupom ">

                            </div>

                        </div><!-- Fim do grupo de formulário -->

                    </form><!-- Fim do formulário horizontal -->

                </div><!-- Fim do corpo do painel -->

            </div><!-- Fim do painel padrão -->

        </div><!-- Fim da coluna-lg-12 -->

    </div><!-- Fim da 2ª linha -->

    <?php

    if (isset($_POST['submit'])) {

        $coupon_title = $_POST['coupon_title'];

        $coupon_price = $_POST['coupon_price'];

        $coupon_code = $_POST['coupon_code'];

        $coupon_limit = $_POST['coupon_limit'];

        $product_id = $_POST['product_id'];

        $coupon_used = 0;

        $get_coupons = "select * from coupons where product_id='$product_id' or coupon_code='$coupon_code'";

        $run_coupons = mysqli_query($con, $get_coupons);

        $check_coupons = mysqli_num_rows($run_coupons);

        if ($check_coupons == 1) {

            echo "<script>alert('Código de cupom ou produto já adicionado Escolha outro código de cupom ou produto.')</script>";
        } else {

            $insert_coupon = "insert into coupons (product_id,coupon_title,coupon_price,coupon_code,coupon_limit,coupon_used) values ('$product_id','$coupon_title','$coupon_price','$coupon_code','$coupon_limit','$coupon_used')";

            $run_coupon = mysqli_query($con, $insert_coupon);

            if ($run_coupon) {

                echo "<script>alert('Novo cupom foi inserido')</script>";

                echo "<script>window.open('index.php?view_coupons','_self')</script>";
            }
        }
    }

    ?>

<?php } ?>