<?php



if (!isset($_SESSION['admin_email'])) {

    echo "<script>window.open('login.php','_self')</script>";
} else {

?>


    <div class="row"><!-- 1 linha começa -->

        <div class="col-lg-12"><!-- col-lg-12 Inicia -->

            <ol class="breadcrumb"><!-- breadcrumb Inicia -->


                <li class="active">

                    <i class="fa fa-dashboard"></i> Dashboard / Inserir Usuário

                </li>



            </ol><!-- breadcrumb Termina -->

        </div><!-- col-lg-12 Termina -->

    </div><!-- Fim de 1 linha -->

    <div class="row"><!-- Início de 2 linhas -->

        <div class="col-lg-12"><!-- col-lg-12 Inicia -->

            <div class="panel panel-default"><!-- panel panel-default Inicia -->

                <div class="panel-heading"><!-- cabeçalho do painel Inicia -->

                    <h3 class="panel-title">

                        <i class="fa fa-money fa-fw"></i> Inserir Usuário

                    </h3>


                </div><!-- cabeçalho do painel Termina -->


                <div class="panel-body"><!-- panel-body Inicia -->

                    <form class="form-horizontal" method="post" enctype="multipart/form-data"><!-- form-horizontal Inicia -->

                        <div class="form-group"><!-- form-group Inicia -->

                            <label class="col-md-3 control-label">Nome do Usuário: </label>

                            <div class="col-md-6"><!-- col-md-6 Inicia -->

                                <input type="text" name="admin_name" class="form-control" required>

                            </div><!-- col-md-6 Termina -->

                        </div><!-- form-group Termina -->


                        <div class="form-group"><!-- form-group Inicia -->

                            <label class="col-md-3 control-label">Email do Usuário: </label>

                            <div class="col-md-6"><!-- col-md-6 Inicia -->

                                <input type="text" name="admin_email" class="form-control" required>
                            </div><!-- col-md-6 Termina -->

                        </div><!-- form-group Termina -->


                        <div class="form-group"><!-- form-group Inicia -->

                            <label class="col-md-3 control-label">Senha do Usuário: </label>

                            <div class="col-md-6"><!-- col-md-6 Inicia -->

                                <input type="password" name="admin_pass" class="form-control" required>

                            </div><!-- col-md-6 Termina -->

                        </div><!-- form-group Termina -->

                        <div class="form-group"><!-- form-group Inicia -->

                            <label class="col-md-3 control-label">País do Usuário </label>

                            <div class="col-md-6"><!-- col-md-6 Inicia -->

                                <input type="text" name="admin_country" class="form-control" required>

                            </div><!-- col-md-6 Termina -->

                        </div><!-- form-group Termina -->


                        <div class="form-group"><!-- form-group Inicia -->

                            <label class="col-md-3 control-label">Trabalho do usuário: </label>

                            <div class="col-md-6"><!-- col-md-6 Inicia -->

                                <input type="text" name="admin_job" class="form-control" required>

                            </div><!-- col-md-6 Termina -->

                        </div><!-- form-group Termina -->


                        <div class="form-group"><!-- form-group Inicia -->

                            <label class="col-md-3 control-label">Contato do Usuário: </label>

                            <div class="col-md-6"><!-- col-md-6 Inicia -->

                                <input type="text" name="admin_contact" class="form-control" required>

                            </div><!-- col-md-6 Termina -->

                        </div><!-- form-group Termina -->


                        <div class="form-group"><!-- form-group Inicia -->

                            <label class="col-md-3 control-label">Sobre o Usuário: </label>

                            <div class="col-md-6"><!-- col-md-6 Inicia -->

                                <textarea name="admin_about" class="form-control" rows="3"> </textarea>

                            </div><!-- col-md-6 Termina -->

                        </div><!-- form-group Termina -->

                        <div class="form-group"><!-- form-group Inicia -->

                            <label class="col-md-3 control-label">Imagem do Usuário: </label>

                            <div class="col-md-6"><!-- col-md-6 Inicia -->

                                <input type="file" name="admin_image" class="form-control" required>

                            </div><!-- col-md-6 Termina -->

                        </div><!-- form-group Termina -->


                        <div class="form-group"><!-- form-group Inicia -->

                            <label class="col-md-3 control-label"></label>

                            <div class="col-md-6"><!-- col-md-6 Inicia -->

                                <input type="submit" name="submit" value="Inserir Usuário" class="btn btn-primary form-control">

                            </div><!-- col-md-6 Termina -->

                        </div><!-- form-group Termina -->


                    </form><!-- form-horizontal Termina -->

                </div><!-- painel-body Termina -->

            </div><!-- painel panel-default Termina -->

        </div><!-- col-lg-12 Termina -->


    </div><!-- Fim de 2 linhas -->

    <?php

    if (isset($_POST['submit'])) {

        $admin_name = $_POST['admin_name'];

        $admin_email = $_POST['admin_email'];

        $admin_pass = $_POST['admin_pass'];

        $admin_country = $_POST['admin_country'];

        $admin_job = $_POST['admin_job'];

        $admin_contact = $_POST['admin_contact'];

        $admin_about = $_POST['admin_about'];


        $admin_image = $_FILES['admin_image']['name'];

        $temp_admin_image = $_FILES['admin_image']['tmp_name'];

        move_uploaded_file($temp_admin_image, "admin_images/$admin_image");

        $insert_admin = "insert into admins (admin_name,admin_email,admin_pass,admin_image,admin_contact,admin_country,admin_job,admin_about) values ('$admin_name','$admin_email','$admin_pass','$admin_image','$admin_contact','$admin_country','$admin_job','$admin_about')";

        $run_admin = mysqli_query($con, $insert_admin);


        if ($run_admin) {

            echo "<script>alert('Um usuário foi inserido com sucesso')</script>";

            echo "<script>window.open('index.php?view_users','_self')</script>";
        }
    }


    ?>



<?php }  ?>