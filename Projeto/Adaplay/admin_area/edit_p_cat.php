<?php

if (!isset($_SESSION['admin_email'])) {

    echo "<script>window.open('login.php','_self')</script>";
} else {


?>

    <?php

    if (isset($_GET['edit_p_cat'])) {

        $edit_p_cat_id = $_GET['edit_p_cat'];

        $edit_p_cat_query = "select * from product_categories where p_cat_id='$edit_p_cat_id'";

        $run_edit = mysqli_query($con, $edit_p_cat_query);

        $row_edit = mysqli_fetch_array($run_edit);

        $p_cat_id = $row_edit['p_cat_id'];

        $p_cat_title = $row_edit['p_cat_title'];

        $p_cat_top = $row_edit['p_cat_top'];

        $p_cat_image = $row_edit['p_cat_image'];

        $new_p_cat_image = $row_edit['p_cat_image'];
    }


    ?>
    <div class="row"><!-- 1 row Começa -->

        <div class="col-lg-12"><!-- col-lg-12 Começa -->

            <ol class="breadcrumb"><!-- breadcrumb Começa -->

                <li>

                    <i class="fa fa-dashboard"></i> Painel / Editar Categoria de Produto

                </li>

            </ol><!-- breadcrumb Termina -->

        </div><!-- col-lg-12 Termina -->

    </div><!-- 1 row Termina -->

    <div class="row"><!-- 2 row Começa -->

        <div class="col-lg-12"><!-- col-lg-12 Começa -->

            <div class="panel panel-default"><!-- panel panel-default Começa -->

                <div class="panel-heading"><!-- panel-heading Começa -->

                    <h3 class="panel-title"><!-- panel-title Começa -->

                        <i class="fa fa-money fa-fw"></i> Editar Categoria de Produto

                    </h3><!-- panel-title Termina -->


                </div><!-- panel-heading Termina -->


                <div class="panel-body"><!-- panel-body Começa -->

                    <form class="form-horizontal" action="" method="post" enctype="multipart/form-data"><!-- form-horizontal Começa -->

                        <div class="form-group"><!-- form-group Começa -->

                            <label class="col-md-3 control-label">Título da Categoria de Produto</label>

                            <div class="col-md-6">

                                <input type="text" name="p_cat_title" class="form-control" value="<?php echo $p_cat_title; ?>">

                            </div>

                        </div><!-- form-group Termina -->

                        <div class="form-group"><!-- form-group Começa -->

                            <label class="col-md-3 control-label">Mostrar como Categoria de Produto Principal</label>

                            <div class="col-md-6">

                                <input type="radio" name="p_cat_top" value="sim" <?php if ($p_cat_top == 'não') {
                                                                                    } else {
                                                                                        echo "checked='checked'";
                                                                                    } ?>>

                                <label> Sim </label>

                                <input type="radio" name="p_cat_top" value="não" <?php if ($p_cat_top == 'não') {
                                                                                        echo "checked='checked'";
                                                                                    } else {
                                                                                    } ?>>

                                <label> Não </label>

                            </div>

                        </div><!-- form-group Termina -->

                        <div class="form-group"><!-- form-group Começa -->

                            <label class="col-md-3 control-label"> Selecionar Imagem da Categoria de Produto</label>

                            <div class="col-md-6">

                                <input type="file" name="p_cat_image" class="form-control">

                                <br>

                                <img src="other_images/<?php echo $p_cat_image; ?>" width="70" height="70">

                            </div>

                        </div><!-- form-group Termina -->

                        <div class="form-group"><!-- form-group Começa -->

                            <label class="col-md-3 control-label"></label>

                            <div class="col-md-6">

                                <input type="submit" name="update" value="Atualizar Agora" class="btn btn-primary form-control">

                            </div>

                        </div><!-- form-group Termina -->

                    </form><!-- form-horizontal Termina -->

                </div><!-- panel-body Termina -->


            </div><!-- panel panel-default Termina -->

        </div><!-- col-lg-12 Termina -->

    </div><!-- 2 row Termina -->

    <?php

    if (isset($_POST['update'])) {

        $p_cat_title = $_POST['p_cat_title'];

        $p_cat_top = $_POST['p_cat_top'];

        $p_cat_image = $_FILES['p_cat_image']['name'];

        $temp_name = $_FILES['p_cat_image']['tmp_name'];


        move_uploaded_file($temp_name, "other_images/$p_cat_image");

        if (empty($p_cat_image)) {

            $p_cat_image = $new_p_cat_image;
        }

        $update_p_cat = "update product_categories set p_cat_title='$p_cat_title',p_cat_top='$p_cat_top',p_cat_image='$p_cat_image' where p_cat_id='$p_cat_id'";

        $run_p_cat = mysqli_query($con, $update_p_cat);

        if ($run_p_cat) {

            echo "<script>alert('Categoria de Produto foi Atualizada')</script>";

            echo "<script>window.open('index.php?view_p_cats','_self')</script>";
        }
    }

    ?>

<?php } ?>