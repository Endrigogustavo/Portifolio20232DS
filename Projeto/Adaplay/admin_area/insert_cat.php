<?php

if (!isset($_SESSION['admin_email'])) {

    echo "<script>window.open('login.php','_self')</script>";
} else {


?>

    <div class="row"><!-- 1 linha começa -->

        <div class="col-lg-12"><!-- col-lg-12 Inicia -->

            <ol class="breadcrumb"><!-- breadcrumb Inicia -->
                <li>

                    <i class="fa fa-dashboard"></i> Dashboard / Inserir Categoria

                </li>

            </ol><!-- breadcrumb Termina -->

        </div><!-- col-lg-12 Termina -->

    </div><!-- Fim de 1 linha -->


    <div class="row"><!-- Início de 2 linhas -->

        <div class="col-lg-12"><!-- col-lg-12 Inicia -->

            <div class="panel panel-default"><!-- panel panel-default Inicia -->

                <div class="panel-heading"><!-- cabeçalho do painel Inicia -->

                    <h3 class="panel-title"><!-- panel-title Inicia -->
                        <i class="fa fa-money fa-fw"></i> Inserir Categoria

                    </h3><!-- panel-title Termina -->

                </div><!-- cabeçalho do painel Termina -->

                <div class="panel-body"><!-- panel-body Inicia -->

                    <form class="form-horizontal" action="" method="post" enctype="multipart/form-data"><!-- form-horizontal Inicia -->

                        <div class="form-group"><!-- form-group Inicia -->

                            <label class="col-md-3 control-label">Titulo da Categoria</label>

                            <div class="col-md-6">

                                <input type="text" name="cat_title" class="form-control">

                            </div>

                        </div><!-- form-group Termina -->

                        <div class="form-group"><!-- form-group Inicia -->

                            <label class="col-md-3 control-label">Mostrar como Categoria Principal</label>

                            <div class="col-md-6">

                                <input type="radio" name="cat_top" value="sim">

                                <label>Sim</label>

                                <input type="radio" name="cat_top" value="não">

                                <label>Não</label>

                            </div>

                        </div><!-- form-group Termina -->

                        <div class="form-group"><!-- form-group Inicia -->

                            <label class="col-md-3 control-label">Selecione a Imagem da Categoria</label>

                            <div class="col-md-6">

                                <input type="file" name="cat_image" class="form-control">

                            </div>

                        </div><!-- form-group Termina -->

                        <div class="form-group"><!-- form-group Inicia -->

                            <label class="col-md-3 control-label"></label>

                            <div class="col-md-6">

                                <input type="submit" name="submit" value="Inserir Categoria" class="btn btn-primary form-control">

                            </div>
                 </div><!-- form-group Termina -->

                </form><!-- form-horizontal Termina -->

                </div><!-- painel-body Termina -->

                </div><!-- painel panel-default Termina -->

                </div><!-- col-lg-12 Termina -->

                </div><!-- Fim de 2 linhas -->

    <?php

    if (isset($_POST['submit'])) {

        $cat_title = $_POST['cat_title'];

        $cat_top = $_POST['cat_top'];

        $cat_image = $_FILES['cat_image']['name'];

        $temp_name = $_FILES['cat_image']['tmp_name'];

        move_uploaded_file($temp_name, "other_images/$cat_image");

        $insert_cat = "insert into categories (cat_title,cat_top,cat_image) values ('$cat_title','$cat_top','$cat_image')";

        $run_cat = mysqli_query($con, $insert_cat);

        if ($run_cat) {

            echo "<script> alert('Nova categoria foi inserida')</script>";

            echo "<script> window.open('index.php?view_cats','_self') </script>";
        }
    }



    ?>

<?php } ?>