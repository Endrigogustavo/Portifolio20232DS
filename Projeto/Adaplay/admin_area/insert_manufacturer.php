<?php


if (!isset($_SESSION['admin_email'])) {

    echo "<script>window.open('login.php','_self')</script>";
} else {


?>
    <!-- Início da 1ª linha -->
    <div class="row"><!-- 1 linha começa -->


        <!-- Início da coluna-lg-12 -->
        <div class="col-lg-12"><!-- col-lg-12 Inicia -->

            <!-- Início da trilha -->
            <ol class="breadcrumb"><!-- breadcrumb Inicia -->

                <li class="active">

                    <i class="fa fa-dashboard"></i> Dashboard / Inserir Fabricante

                </li>

            </ol><!-- breadcrumb Termina -->
            <!-- Fim da trilha -->
        </div><!-- col-lg-12 Termina -->
        <!-- Fim da coluna-lg-12 -->

    </div><!-- Fim de 1 linha -->
    <!-- Fim da 1ª linha -->


    <!-- Início da 2ª linha -->
    <div class="row"><!-- Início de 2 linhas -->

        <!-- Início da coluna-lg-12 -->
        <div class="col-lg-12"><!-- col-lg-12 Inicia -->

            <!-- Início do painel padrão -->
            <div class="panel panel-default"><!-- panel panel-default Inicia -->

                <!-- Início do cabeçalho do painel -->
                <div class="panel-heading"><!-- cabeçalho do painel Inicia -->

                    <!-- Início do título do painel -->
                    <h3 class="panel-title"><!-- panel-title Inicia -->

                        <i class="fa fa-money fa-fw"> </i> Inserir Fabricante

                    </h3><!-- panel-title Termina -->
                    <!-- Fim do título do painel -->

                </div><!-- cabeçalho do painel Termina -->
                <!-- Fim do cabeçalho do painel -->

                <!-- Início do corpo do painel -->
                <div class="panel-body"><!-- panel-body Inicia -->

                    <!-- Início do formulário horizontal -->
                    <form class="form-horizontal" action="" method="post" enctype="multipart/form-data"><!-- form-horizontal Starts -->

                        <!-- Início do grupo de formulário -->
                        <div class="form-group"><!-- form-group Inicia -->

                            <label class="col-md-3 control-label"> Nome do Fabricante </label>

                            <div class="col-md-6">

                                <input type="text" name="manufacturer_name" class="form-control">

                            </div>

                        </div><!-- form-group Termina -->
                        <!-- Fim do grupo de formulário -->

                        <!-- Início do grupo de formulário -->
                        <div class="form-group"><!-- form-group Inicia -->

                            <label class="col-md-3 control-label"> Mostrar como Principais Fabricantes </label>

                            <div class="col-md-6">

                                <input type="radio" name="manufacturer_top" value="sim">

                                <label> Sim </label>

                                <input type="radio" name="manufacturer_top" value="não">

                                <label> Não </label>

                            </div>

                        </div><!-- form-group Termina -->
                        <!-- Fim do grupo de formulário -->

                        <!-- Início do grupo de formulário -->
                        <div class="form-group"><!-- form-group Inicia -->

                            <label class="col-md-3 control-label"> Selecione a Imagem do Fabricante </label>

                            <div class="col-md-6">

                                <input type="file" name="manufacturer_image" class="form-control">

                            </div>

                        </div><!-- form-group Termina -->
                        <!-- Fim do grupo de formulário -->

                        <!-- Início do grupo de formulário -->
                        <div class="form-group"><!-- form-group Inicia -->

                            <label class="col-md-3 control-label"> </label>

                            <div class="col-md-6">

                                <input type="submit" name="submit" class="form-control btn btn-primary" value=" Inserir Fabricante ">

                            </div>
                        </div><!-- form-group Termina -->
                        <!-- Fim do grupo de formulário -->

                    </form><!-- form-horizontal Termina -->
                    <!-- Fim do formulário horizontal -->

                </div><!-- painel-body Termina -->
                <!-- Fim do corpo do painel -->

            </div><!-- painel panel-default Termina -->
            <!-- Fim do painel padrão -->

        </div><!-- col-lg-12 Termina -->
        <!-- Fim da coluna-lg-12 -->

    </div><!-- Fim de 2 linhas -->
    <!-- Fim da 2ª linha -->
    <?php

    if (isset($_POST['submit'])) {

        $manufacturer_name = $_POST['manufacturer_name'];

        $manufacturer_top = $_POST['manufacturer_top'];

        $manufacturer_image = $_FILES['manufacturer_image']['name'];

        $tmp_name = $_FILES['manufacturer_image']['tmp_name'];

        move_uploaded_file($tmp_name, "other_images/$manufacturer_image");

        $insert_manufacturer = "insert into manufacturers (manufacturer_title,manufacturer_top,manufacturer_image) values ('$manufacturer_name','$manufacturer_top','$manufacturer_image')";

        $run_manufacturer = mysqli_query($con, $insert_manufacturer);

        if ($run_manufacturer) {

            echo "<script>alert('Novo fabricante foi inserido')</script>";

            echo "<script>window.open('index.php?view_manufacturers','_self')</script>";
        }
    }

    ?>

<?php } ?>