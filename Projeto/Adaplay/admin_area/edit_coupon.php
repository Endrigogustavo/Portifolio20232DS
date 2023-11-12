<?php


if (!isset($_SESSION['admin_email'])) {

    echo "<script>window.open('login.php','_self')</script>";
} else {


?>

    <?php

    if (isset($_GET['edit_coupon'])) {

        $edit_id = $_GET['edit_coupon'];

        $edit_coupon = "select * from coupons where coupon_id='$edit_id'";

        $run_edit = mysqli_query($con, $edit_coupon);

        $row_edit = mysqli_fetch_array($run_edit);

        $c_id = $row_edit['coupon_id'];

        $c_title = $row_edit['coupon_title'];

        $c_price = $row_edit['coupon_price'];

        $c_code = $row_edit['coupon_code'];

        $c_limit = $row_edit['coupon_limit'];

        $c_used = $row_edit['coupon_used'];

        $p_id = $row_edit['product_id'];

        $get_products = "select * from products where product_id='$p_id'";

        $run_products = mysqli_query($con, $get_products);

        $row_products = mysqli_fetch_array($run_products);

        $product_id = $row_products['product_id'];

        $product_title = $row_products['product_title'];
    }


    ?>

    <div class="row"><!-- 1 row Começa -->

        <div class="col-lg-12"><!-- col-lg-12 Começa -->

            <ol class="breadcrumb"><!-- breadcrumb Começa -->

                <li class="active">

                    <i class="fa fa-dashboard"> </i> Painel / Editar Cupom

                </li>

            </ol><!-- breadcrumb Termina -->

        </div><!-- col-lg-12 Termina -->

    </div><!-- 1 row Termina -->

    <div class="row"><!-- 2 row Começa --->

        <div class="col-lg-12"><!-- col-lg-12 Começa -->

            <div class="panel panel-default"><!-- panel panel-default Começa -->

                <div class="panel-heading"><!-- panel-heading Começa -->

                    <h3 class="panel-title"><!-- panel-title Começa -->

                        <i class="fa fa-money fa-fw"> </i> Editar Cupom

                    </h3><!-- panel-title Termina -->

                </div><!-- panel-heading Termina -->

                <div class="panel-body"><!--panel-body Começa -->

                    <form class="form-horizontal" method="post" action=""><!-- form-horizontal Começa -->

                        <div class="form-group"><!-- form-group Começa -->

                            <label class="col-md-3 control-label"> Título do Cupom </label>

                            <div class="col-md-6">

                                <input type="text" name="coupon_title" class="form-control" value="<?php echo $c_title; ?>">

                            </div>

                        </div><!-- form-group Termina -->

                        <div class="form-group"><!-- form-group Começa -->

                            <label class="col-md-3 control-label"> Preço do Cupom </label>

                            <div class="col-md-6">

                                <input type="text" name="coupon_price" class="form-control" value="<?php echo $c_price; ?>">

                            </div>

                        </div><!-- form-group Termina -->

                        <div class="form-group"><!-- form-group Começa -->

                            <label class="col-md-3 control-label"> Código do Cupom </label>

                            <div class="col-md-6">

                                <input type="text" name="coupon_code" class="form-control" value="<?php echo $c_code; ?> ">

                            </div>

                        </div><!-- form-group Termina -->

                        <div class="form-group"><!-- form-group Começa -->

                            <label class="col-md-3 control-label"> Limite do Cupom </label>

                            <div class="col-md-6">

                                <input type="number" name="coupon_limit" value="<?php echo $c_limit; ?>" class="form-control">

                            </div>

                        </div><!-- form-group Termina -->

                        <div class="form-group"><!-- form-group Começa -->

                            <label class="col-md-3 control-label"> Selecione o Cupom para Produto ou Pacote </label>

                            <div class="col-md-6">

                                <select name="product_id" class="form-control">

                                    <option value="<?php echo $product_id; ?>"> <?php echo $product_title; ?> </option>


                                    <?php

                                    $get_p = "select * from products where status='product'";

                                    $run_p = mysqli_query($con, $get_p);

                                    while ($row_p = mysqli_fetch_array($run_p)) {

                                        $p_id = $row_p['product_id'];

                                        $p_title = $row_p['product_title'];

                                        echo "<option value='$p_id'> $p_title </option>";
                                    }

                                    ?>

                                    <option></option>

                                    <option>Selecionar Cupom para pacote</option>

                                    <option></option>

                                    <?php

                                    $get_p = "select * from products where status='bundle'";

                                    $run_p = mysqli_query($con, $get_p);

                                    while ($row_p = mysqli_fetch_array($run_p)) {

                                        $p_id = $row_p['product_id'];

                                        $p_title = $row_p['product_title'];

                                        echo "<option value='$p_id'> $p_title </option>";
                                    }

                                    ?>

                                </select>

                            </div>

                        </div><!-- form-group Termina -->

                        <div class="form-group"><!-- form-group Começa -->

                            <label class="col-md-3 control-label"> </label>

                            <div class="col-md-6">

                                <input type="submit" name="update" class=" btn btn-primary form-control" value=" Atualizar Cupom ">

                            </div>

                        </div><!-- form-group Termina -->

                    </form><!-- form-horizontal Termina -->

                </div><!--panel-body Termina -->

            </div><!-- panel panel-default Termina -->

        </div><!-- col-lg-12 Termina -->

    </div><!-- 2 row Termina --->

    <?php

    if (isset($_POST['update'])) {

        $coupon_title = $_POST['coupon_title'];

        $coupon_price = $_POST['coupon_price'];

        $coupon_code = $_POST['coupon_code'];

        $coupon_limit = $_POST['coupon_limit'];

        $product_id = $_POST['product_id'];

        $update_coupon = "update coupons set product_id='$product_id',coupon_title='$coupon_title',coupon_price='$coupon_price',coupon_code='$coupon_code',coupon_limit='$coupon_limit',coupon_used='$c_used' where coupon_id='$c_id'";

        $run_coupon = mysqli_query($con, $update_coupon);


        if ($run_coupon) {

            echo "<script>alert('Um Cupom Foi Atualizado')</script>";

            echo "<script>window.open('index.php?view_coupons','_self')</script>";
        }
    }

    ?>

<?php } ?>