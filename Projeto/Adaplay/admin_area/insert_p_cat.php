<?php

if (!isset($_SESSION['admin_email'])) {

    echo "<script>window.open('login.php','_self')</script>";
} else {


?>
    <!-- Início da 1ª linha -->

    <div class="row"><!-- 1 linha começa -->

        <!-- Início da coluna-lg-12 -->
        <div class="col-lg-12"><!-- col-lg-12 Inicia -->

            <!-- Início da trilha de navegação -->
            <ol class="breadcrumb"><!-- breadcrumb Inicia -->

                <li>

                    <i class="fa fa-dashboard"></i> Dashboard / Inserir Categoria de Produtos

                </li>

                /ol><!-- breadcrumb Termina -->
                <!-- Fim da trilha de navegação -->

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
                <div class="panel-heading"><!-- panel-heading Inicia -->

                    <!-- Início do título do painel -->
                    <h3 class="panel-title"><!-- panel-title Inicia -->

                        <i class="fa fa-money fa-fw"></i> Inserir Categoria de Produtos

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

                            <label class="col-md-3 control-label">Título da Categoria de Produtos</label>

                            <div class="col-md-6">

                                <input type="text" name="p_cat_title" class="form-control">

                            </div>

                        </div><!-- form-group Termina -->
                        <!-- Fim do grupo de formulário -->

                        <!-- Início do grupo de formulário -->
                        <div class="form-group"><!-- form-group Inicia -->

                            <label class="col-md-3 control-label">Mostrar como Categoria De Produto Principal</label>

                            <div class="col-md-6">

                                <input type="radio" name="p_cat_top" value="sim">

                                <label> Sim </label>

                                <input type="radio" name="p_cat_top" value="não">

                                <label> Não </label>

                            </div>

                        </div><!-- form-group Termina -->
                        <!-- Fim do grupo de formulário -->

                        <!-- Início do grupo de formulário -->
                        <div class="form-group"><!-- form-group Inicia -->

                            <label class="col-md-3 control-label"> Selecione a Imagem da Categoria de Produtos</label>

                            <div class="col-md-6">

                                <input type="file" name="p_cat_image" class="form-control">

                            </div>

                        </div><!-- form-group Termina -->
                        <!-- Fim do grupo de formulário -->

                        <!-- Início do grupo de formulário -->
                        <div class="form-group"><!-- form-group Inicia -->

                            <label class="col-md-3 control-label"></label>

                            <div class="col-md-6">

                                <input type="submit" name="submit" value="Enviar Agora" class="btn btn-primary form-control">

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

        $p_cat_title = $_POST['p_cat_title'];

        $p_cat_top = $_POST['p_cat_top'];

        $p_cat_image = $_FILES['p_cat_image']['name'];

        $temp_name = $_FILES['p_cat_image']['tmp_name'];

        move_uploaded_file($temp_name, "other_images/$p_cat_image");

        $insert_p_cat = "insert into product_categories (p_cat_title,p_cat_top,p_cat_image) values ('$p_cat_title','$p_cat_top','$p_cat_image')";

        $run_p_cat = mysqli_query($con, $insert_p_cat);

        if ($run_p_cat) {

            echo "<script>alert('Nova categoria de produto foi inserida')</script>";

            echo "<script>window.open('index.php?view_p_cats','_self')</script>";
        }
    }



    ?>


<?php } ?>