<?php

if (!isset($_SESSION['admin_email'])) {

    echo "<script>window.open('login.php','_self')</script>";
} else {


?>

    <?php

    if (isset($_GET['edit_cat'])) {

        $edit_id = $_GET['edit_cat'];

        $edit_cat = "select * from categories where cat_id='$edit_id'";

        $run_edit = mysqli_query($con, $edit_cat);

        $row_edit = mysqli_fetch_array($run_edit);

        $c_id = $row_edit['cat_id'];

        $c_title = $row_edit['cat_title'];

        $c_top = $row_edit['cat_top'];

        $c_image = $row_edit['cat_image'];

        $new_c_image = $row_edit['cat_image'];
    }

    ?>

    <div class="row"><!-- 1 linha começa -->

        <div class="col-lg-12"><!-- col-lg-12 Inicia -->

            <ol class="breadcrumb"><!-- breadcrumb Inicia -->

                <li>

                    <i class="fa fa-dashboard"></i> Painel / Editar categoria

                </li>

            </ol><!-- breadcrumb Termina -->

        </div><!-- col-lg-12 Termina -->

    </div><!-- Fim de 1 linha -->


    <div class="row"><!-- Início de 2 linhas -->

        <div class="col-lg-12"><!-- col-lg-12 Inicia -->

            <div class="panel panel-default"><!-- panel panel-default Inicia -->

                <div class="panel-heading"><!-- cabeçalho do painel Inicia -->

                    <h3 class="panel-title"><!-- panel-title Inicia -->

                        <i class="fa fa-money fa-fw"></i> Editar categoria

                    </h3><!-- panel-title Termina -->

                </div><!-- panel-heading Ends -->

                <div class="panel-body"><!-- panel-body Inicia -->

                    <form class="form-horizontal" action="" method="post" enctype="multipart/form-data"><!-- form-horizontal Starts -->

                        <div class="form-group"><!-- form-group Starts -->

                            <label class="col-md-3 control-label">Título da categoria</label>

                            <div class="col-md-6">

                                <input type="text" name="cat_title" class="form-control" value="<?php echo $c_title; ?>">

                            </div>

                        </div><!-- form-group Termina -->

                        <div class="form-group"><!-- form-group Inicia -->

                            <label class="col-md-3 control-label">Mostrar como categoria superior</label>

                            <div class="col-md-6">

                                <input type="radio" name="cat_top" value="sim" <?php if ($c_top == 'não') {
                                                                                } else {
                                                                                    echo "checked='checked'";
                                                                                } ?>>

                                <label>Sim</label>

                                <input type="radio" name="cat_top" value="não" <?php if ($c_top == 'não') {
                                                                                    echo "checked='checked'";
                                                                                } else {
                                                                                } ?>>

                                <label>Não</label>

                            </div>

                        </div>
                        <!-- form-group Termina -->

                        <div class="form-group"><!-- form-group Starts -->

                            <label class="col-md-3 control-label">Selecione a imagem da categoria</label>

                            <div class="col-md-6">

                                <input type="file" name="cat_image" class="form-control">

                                <br>

                                <img src="other_images/<?php echo $c_image; ?>" width="70" height="70">

                            </div>

                        </div><!-- form-group Termina -->


                        <div class="form-group"><!-- form-group Inicia -->

                            <label class="col-md-3 control-label"></label>

                            <div class="col-md-6">

                                <input type="submit" name="update" value="Atualizar Categoria" class="btn btn-primary form-control">

                            </div>

                        </div><!-- form-group Termina -->

                    </form><!-- form-horizontal Termina -->

                </div><!-- panel-body Termina -->

            </div><!-- panel panel-default Termina -->

        </div><!-- col-lg-12 Termina -->

    </div><!-- 2 row Termina -->

    <?php

    if (isset($_POST['update'])) {

        $cat_title = $_POST['cat_title'];

        $cat_top = $_POST['cat_top'];

        $cat_image = $_FILES['cat_image']['name'];

        $temp_name = $_FILES['cat_image']['tmp_name'];

        move_uploaded_file($temp_name, "other_images/$cat_image");

        if (empty($cat_image)) {

            $cat_image = $new_c_image;
        }

        $update_cat = "update categories set cat_title='$cat_title',cat_top='$cat_top',cat_image='$cat_image' where cat_id='$c_id'";

        $run_cat = mysqli_query($con, $update_cat);

        if ($run_cat) {

            echo "<script>alert('Uma categoria foi atualizada')</script>";

            echo "<script>window.open('index.php?view_cats','_self')</script>";
        }
    }



    ?>

<?php } ?>